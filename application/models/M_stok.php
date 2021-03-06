<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_stok extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	// =============== Get Fungsi ===============
		public function get_bagian($id)
		{
			$hasil = $this->db->query("SELECT * FROM tbl_bagian WHERE id_unit='$id'");
			return $hasil->result(); 
		}
		public function get_idjenis(){
			return $this->db->order_by('id_jnsbrng','asc')->get('tbl_jenis_barang');
		}
		public function get_idgroup(){
			return $this->db->order_by('id_group','asc')->get('tbl_group');
		}
		public function get_satuan(){
			return $this->db->order_by('nm_satuan','asc')->get('tbl_satuan');
		}
	// ==========================================
	// ========================================================= Master Data ===================================================================
	// --------------- Satuan ------------------
		public function v_satuan()
		{
			$hasil = $this->db->get('tbl_satuan');
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function s_satuan($data){
			$this->db->insert('tbl_satuan', $data);
		}

		public function ve_satuan($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_satuan');
			$this->db->where('id_satuan', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function e_satuan($id,$data){
			$this->db->where('id_satuan',$id)->update('tbl_satuan', $data);
		}

		public function h_satuan($id)
		{
			$this->db->where('id_satuan',$id)->delete('tbl_satuan');
		}
	// -----------------------------------------
	// ---------------BARANG--------------------
		public function v_barang()
		{
			/*$hasil = $this->db->get('tbl_nama_barang');
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}*/
			$sql = "SELECT a.id_barang,a.nm_barang,b.nm_jnsbrng,a.kel_barang,c.nm_satuan,d.nm_satuan as nm_satuan2 FROM tbl_nama_barang as a join tbl_jenis_barang as b on a.id_jnsbrng=b.id_jnsbrng join tbl_satuan as c on a.sat1_barang=c.id_satuan join tbl_satuan as d on a.sat2_barang=d.id_satuan order by a.id_barang asc";
			$data = $this->db->query($sql);
			return $data->result();
		}

		public function ve_barang($id)
		{
			/*$this->db->select('*');
			$this->db->from('tbl_nama_barang');
			$this->db->where('id_barang', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}*/
			$sql = "SELECT a.id_barang,a.nm_barang,b.nm_jnsbrng,a.kel_barang,a.no_barang,a.sat1_barang,a.sat2_barang,a.id_group,a.id_jnsbrng,a.ket_barang,c.nm_satuan,f.nm_group,d.nm_satuan as nm_satuan2 FROM tbl_nama_barang as a 
				join tbl_jenis_barang as b on a.id_jnsbrng=b.id_jnsbrng 
				join tbl_satuan as c on a.sat1_barang=c.id_satuan 
				join tbl_satuan as d on a.sat2_barang=d.id_satuan
				join tbl_jenis_barang as e on a.id_jnsbrng=e.id_jnsbrng
				join tbl_group as f on a.id_group=f.id_group
				where a.id_barang = '$id'";
			$data = $this->db->query($sql);
			return $data->result();
		}
		public function s_barang($data){
			$this->db->insert('tbl_nama_barang ', $data);
		}
		public function e_barang($id,$data){
			$this->db->where('id_barang',$id)->update('tbl_nama_barang', $data);
		}
		public function h_barang($id)
		{
			$this->db->where('id_barang',$id)->delete('tbl_nama_barang');
		}
	// -----------------------------------------
	//=========================================================================================================================================
	// ========================================================= Pemesanan ====================================================================
	// --------------- Pesanan Baru ------------
		public function v_pesbaru()
		{
			$sql = "SELECT a.id_permintaan,a.nota_minta,a.tgl_minta,b.nm_bagian,a.ket_minta,a.selesai_minta FROM tbl_permintaan as a join tbl_bagian as b on a.id_bagian=b.id_bagian where a.selesai_minta != 'Y' order by a.tgl_minta asc";
			$data = $this->db->query($sql);
			return $data->result();
		}
		function k_pesbaru()
		{
			/*$this->db->select('RIGHT(tbl_permintaan.id_permintaan, 13) as kode', FALSE);  
			$this->db->order_by('id_permintaan','DESC');   
			$this->db->limit(1);
			$query = $this->db->get('tbl_permintaan'); 
				 
				if($query->num_rows() <> 0){ 
					$data = $query->row();   
				    $kode = intval($data->kode) + 1; 
				}else{ 
				    $kode = 1; 
				} 
				 $kodemax = str_pad($kode, 13, "0", STR_PAD_LEFT);   $kodejadi = "PR".$kodemax; 
				 
	 		 return $kodejadi;*/

	 		$CI =& get_instance();
			$CI->load->database('default');
			//rancangan kode GL
			$kode_PR="PR".date('ym')."%";
			$sql="SELECT SUBSTRING(MAX(id_permintaan),7,4) AS maxNo FROM tbl_permintaan where id_permintaan like('$kode_PR')";
			$row = $CI->db->query($sql);
			foreach ($row->result_array() as $rowmax)
			{	
			}
			//buat noPO baru dengan noPO terbesar+1
			$noPR_tmp		=$rowmax['maxNo'];
			$noPR			=$noPR_tmp+1;	
			$kode_tanggal	=date("ym");
			if(strlen($noPR)==1){
				$kode_permintaan="PR".$kode_tanggal."000".$noPR;
			}elseif(strlen($noPR)==2){
				$kode_permintaan="PR".$kode_tanggal."00".$noPR;
			}elseif(strlen($noPR)==3){
				$kode_permintaan="PR".$kode_tanggal."0".$noPR;
			}elseif(strlen($noPR)==4){
				$kode_permintaan="PR".$kode_tanggal.$noPR;
			}
			
			return $kode_permintaan;
		}
		function pesbaru_barang()
		{
			$hasil = $this->db->query("SELECT a.id_barang, a.nm_barang, b.nm_jnsbrng, c.nm_group FROM tbl_nama_barang as a join tbl_jenis_barang as b on a.id_jnsbrng=b.id_jnsbrng join tbl_group as c on a.id_group=c.id_group order by a.id_barang, ABS(a.nm_barang)");
			return $hasil; 
		}

		function s_pesbar($data)
		{
			return $this->db->insert('tbl_permintaan', $data);
		}

		function s_pesbar_dtl_batch($data)
		{
			return $this->db->insert_batch('tbl_dtl_permintaan', $data);
		}
		function ve_id_pesbar($id)
		{
			$this->db->select('tgl_minta,nota_minta');
			$this->db->from('tbl_permintaan');
			$this->db->where('id_permintaan', $id);
			$this->db->limit(1);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}
		function v_dtl_pesbar($id)
		{
			$sql = "SELECT a.id_dtl_permintaan,a.id_permintaan,a.tgl_dtl_perlu,a.jml_dtl_minta,b.nm_barang,a.ket_dtl_minta ,a.selesai_dtl_minta
					FROM tbl_dtl_permintaan as a 
					join tbl_nama_barang as b on a.id_barang=b.id_barang 
					where a.id_permintaan = '$id'
					order by a.tgl_dtl_perlu asc";
			$data = $this->db->query($sql);
			return $data->result();
		}
		function ve_pesbar($id)
		{
			$sql = "SELECT a.id_dtl_permintaan,a.nota_dtl_minta,a.id_permintaan,a.id_barang as id_dtl_barang,a.tgl_dtl_perlu,a.jml_dtl_minta,a.stkunit_dtl_minta,a.stkgdng_dtl_minta,a.ket_dtl_minta,b.tgl_minta,b.id_unit,b.id_bagian,b.ket_minta,c.nm_barang
					FROM tbl_dtl_permintaan as a 
					join tbl_permintaan as b on a.id_permintaan=b.id_permintaan
					join tbl_nama_barang as c on a.id_barang=c.id_barang 
					join tbl_bagian as d on b.id_bagian=d.id_bagian
					join tbl_unit as e on b.id_unit=e.id_unit
					where a.id_dtl_permintaan = '$id'
					order by a.tgl_dtl_perlu asc";
			$data = $this->db->query($sql);
			return $data->result();
		}
		function e_pesbar($id,$data)
		{
			$this->db->where('id_dtl_permintaan',$id)->update('tbl_dtl_permintaan', $data);
		}
		function h_pesbar($id)
		{
			$this->db->where('id_permintaan',$id)->delete('tbl_permintaan');
		}
		function h_pesbardet($id)
		{
			$this->db->where('id_permintaan',$id)->delete('tbl_dtl_permintaan');			
		}
		function h_pesbar_detail($id)
		{
			$this->db->where('id_dtl_permintaan',$id)->delete('tbl_dtl_permintaan');			
		}
	// -----------------------------------------
	// ----------- Pesanan Selesai -------------
		public function v_pesselesai()
		{
			$sql = "SELECT a.id_permintaan,a.nota_minta,a.tgl_minta,b.nm_bagian,a.ket_minta,a.selesai_minta FROM tbl_permintaan as a join tbl_bagian as b on a.id_bagian=b.id_bagian where a.selesai_minta = 'Y' order by a.tgl_minta desc";
			$data = $this->db->query($sql);
			return $data->result();
		}
		function ve_id_pessel($id)
		{
			$this->db->select('tgl_minta,nota_minta');
			$this->db->from('tbl_permintaan');
			$this->db->where('id_permintaan', $id);
			$this->db->where('selesai_minta', "Y");
			$this->db->limit(1);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}
		function ve_pessel($id)
		{
			$sql = "SELECT a.id_dtl_permintaan,a.id_permintaan,a.tgl_dtl_perlu,a.jml_dtl_minta,b.nm_barang,a.ket_dtl_minta,c.selesai_minta,a.selesai_dtl_minta
					FROM tbl_dtl_permintaan as a 
					join tbl_nama_barang as b on a.id_barang=b.id_barang 
					join tbl_permintaan as c on a.id_permintaan=c.id_permintaan
					where a.id_permintaan = '$id' AND
					c.selesai_minta = 'Y'
					order by a.tgl_dtl_perlu asc";
			$data = $this->db->query($sql);
			return $data->result();
		}
	// -----------------------------------------
	// =========================================================================================================================================

	// --------------- Stok Barang ------------------
		public function v_stok()
		{
			$sql = "SELECT a.id_stok,a.id_barang,c.nm_barang,a.id_brngmsk,
					SUM(a.stok_masuk) AS sisa_stok,SUM(a.stok_keluar) AS stok_keluar,a.id_bagian 
					FROM tbl_stok_barang AS a 
					JOIN tbl_nama_barang AS c ON a.id_barang=c.id_barang
					JOIN tbl_barang_masuk AS b ON a.id_brngmsk=b.id_brngmsk
					GROUP BY a.id_barang
					ORDER BY a.tgl_brngmsk DESC";
			$data = $this->db->query($sql);
			return $data->result();
		}

	// -----------------------------------------
	// =========================================================================================================================================

	// --------------- Barang Masuk ------------------
		public function v_barangmasuk()
		{
			$sql = "SELECT a.id_brngmsk,c.nm_barang,a.tgl_brngmsk,a.stok_brngmsk,b.hrg_stok,a.tothrg_brngmasuk,a.id_bagian
					FROM tbl_barang_masuk AS a
					JOIN tbl_stok_barang AS b ON a.id_brngmsk=b.id_brngmsk
					JOIN tbl_nama_barang AS c ON c.id_barang=b.id_barang
					ORDER BY a.tgl_brngmsk DESC";
			$data = $this->db->query($sql);
			return $data->result();
		}

	// -----------------------------------------
	// =========================================================================================================================================

	// --------------- Barang Keluar ------------------
		public function v_barangkeluar()
		{
			$sql = "SELECT a.id_brngkel,a.tgl_brngkel,b.nm_barang,c.jumlah_brngkel,c.tothrg_brngkel
					FROM tbl_dtl_barang_keluar AS a
					JOIN tbl_nama_barang AS b ON a.id_barang=b.id_barang
					JOIN tbl_barang_keluar AS c ON a.id_brngkel=c.id_brngkel
					GROUP BY a.id_brngkel
					ORDER BY a.tgl_brngmsk DESC";
			$data = $this->db->query($sql);
			return $data->result();

		}

		function k_barkel()
		{
			$CI =& get_instance();
			$CI->load->database('default');
			//rancangan kode GL
			$kode_BK="BK".date('ym')."%";
			$sql="SELECT SUBSTRING(MAX(id_brngkel),7,5) AS maxNo FROM tbl_barang_keluar where id_brngkel like('$kode_BK')";
			$row = $CI->db->query($sql);
			foreach ($row->result_array() as $rowmax)
			{	
			}
			//buat noPO baru dengan noPO terbesar+1
			$noBK_tmp		=$rowmax['maxNo'];
			$noBK			=$noBK_tmp+1;	
			$kode_tanggal	=date("ym");
			if(strlen($noBK)==1){
				$kode_brgkel="BK".$kode_tanggal."0000".$noBK;
			}elseif(strlen($noBK)==2){
				$kode_brgkel="BK".$kode_tanggal."000".$noBK;
			}elseif(strlen($noBK)==3){
				$kode_brgkel="BK".$kode_tanggal."00".$noBK;
			}elseif(strlen($noBK)==4){
				$kode_brgkel="BK".$kode_tanggal."0".$noBK;
			}elseif(strlen($noBK)==5){
				$kode_brgkel="BK".$kode_tanggal.$noBK;
			}
			
			return $kode_brgkel;
		}

		function barkel_barang()
		{
			$sql = "SELECT a.id_brngmsk,c.id_barang,c.nm_barang,a.tgl_brngmsk,b.id_stok,sum(b.stok_masuk) as stok_masuk,b.hrg_stok
			FROM tbl_barang_masuk AS a
			JOIN tbl_stok_barang AS b ON a.id_brngmsk=b.id_brngmsk
			JOIN tbl_nama_barang AS c ON b.id_barang=c.id_barang
			Where b.stok_masuk > 0
			GROUP BY b.id_barang";
			$data = $this->db->query($sql);
			return $data->result();
		}

		public function get_cek_ketersedian()
		{
			$this->db->select('id_barang,sum(stok_masuk) as stok');
			$this->db->from('tbl_stok_barang');
			$this->db->group_by('id_barang');
			$query = $this->db->get(); 
	        return $query->result();
		}

				// perhitungan barang keluar
		public function jmlh_stok($id_barang)
		{
			$sql = "SELECT SUM(stok_masuk) AS stok FROM tbl_stok_barang WHERE id_barang = '$id_barang'";
			$data = $this->db->query($sql);
			return $data->result();
		}

		public function stok_urut_tgl($id_barang)
		{
			$sql = "SELECT id_brngmsk,id_stok,tgl_brngmsk,stok_masuk,id_barang,hrg_stok FROM tbl_stok_barang WHERE id_barang = '$id_barang' AND stok_masuk > 0 ORDER BY tgl_brngmsk ASC";
			$data = $this->db->query($sql);
			return $data->result();
		}

		public function simpan_dtl_barang_kel($data)
		{
			$this->db->insert('tbl_dtl_barang_keluar', $data);
		}

		public function simpan_barang_keluar($data)
		{
			$this->db->insert('tbl_barang_keluar', $data);
		}

		public function delete_barang_keluar($id)
		{
			$this->db->where('id_brngkel', $id)
			->delete('tbl_barang_keluar');
		}

		public function delete_dtl_stok_barang($id)
		{
			$this->db->where('id_brngkel', $id)
			->delete('tbl_dtl_barang_keluar');
		}


		function ve_brngkel($id)
		{
			$sql = "SELECT a.id_brngkel,a.tgl_brngkel,a.jumlah_brngkel,c.nm_barang,b.id_barang,b.id_brngmsk,SUM(d.stok_masuk) AS stok_masuk
					FROM tbl_barang_keluar AS a 
					JOIN tbl_dtl_barang_keluar AS b ON a.id_brngkel=b.id_brngkel
					JOIN tbl_nama_barang AS c ON b.id_barang=c.id_barang
					JOIN tbl_stok_barang AS d ON b.id_stok=d.id_stok
					where a.id_brngkel = '$id'
					GROUP BY a.id_brngkel,a.tgl_brngkel,a.jumlah_brngkel";
			$data = $this->db->query($sql);
			return $data->result();
		}

		function e_brngkel($id,$data)
		{
			$this->db->where('id_brngkel',$id)->update('tbl_barang_keluar', $data);
		}
}

/* End of file M_stok.php */
/* Location: ./application/models/M_stok.php */