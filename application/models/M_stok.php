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
			$hasil = $this->db->get('tbl_nama_barang');
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function ve_barang($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_nama_barang');
			$this->db->where('id_barang', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function e_barang($id,$data){
			$this->db->where('id_barang',$id)->update('tbl_nama_barang', $data);
		}

		public function h_barang($id)
		{
			$this->db->where('id_barang',$id)->delete('tbl_nama_barang');
		}

		public function s_barang($data){
			$this->db->insert('tbl_nama_barang ', $data);
		}

		public function get_idjenis(){
			return $this->db->order_by('id_jnsbrng','asc')->get('tbl_jenis_barang');
		}

		public function get_idgroup(){
			return $this->db->order_by('id_group','asc')->get('tbl_group');
		}
	// -----------------------------------------
	// =========================================================================================================================================
	// ========================================================= Pemesanan =====================================================================
	// --------------- Pesanan Baru ------------
		public function v_pesbaru()
		{
			$sql = "SELECT a.id_permintaan,a.nota_minta,a.tgl_minta,b.nm_bagian,a.ket_minta,a.selesai_minta FROM tbl_permintaan as a join tbl_bagian as b on a.id_bagian=b.id_bagian where a.selesai_minta != 'Y' order by a.tgl_minta desc";
			$data = $this->db->query($sql);
			return $data->result();
		}
		function k_pesbaru()
		{
			$this->db->select('RIGHT(tbl_permintaan.id_permintaan, 13) as kode', FALSE);  
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
				 
	 		 return $kodejadi;
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
			$sql = "SELECT a.id_dtl_permintaan,a.id_permintaan,a.tgl_dtl_perlu,a.jml_dtl_minta,b.nm_barang,a.ket_dtl_minta 
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
			$sql = "SELECT a.id_dtl_permintaan,a.id_permintaan,a.tgl_dtl_perlu,a.jml_dtl_minta,b.nm_barang,a.ket_dtl_minta,c.selesai_minta
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
}

/* End of file M_stok.php */
/* Location: ./application/models/M_stok.php */