<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pembelian extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	// ============= Get Fungsi ==============
	function get_prov()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_provinsi");
		return $hasil;
	}
	function get_kab($id)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kabupaten WHERE id_provinsi='$id'");
		return $hasil->result(); 
	}
	function get_idjenis(){
		return $this->db->order_by('id_jnsbrng','asc')->get('tbl_jenis_barang');
	}
	function get_idgroup(){
		return $this->db->order_by('id_group','asc')->get('tbl_group');
	}
	function get_satuan(){
		return $this->db->order_by('nm_satuan','asc')->get('tbl_satuan');
	} 
	// =======================================
	// ========================================================= Master Data ===================================================================
	// --------------- Jenis barang --------------
	public function v_jenisbrng()
	{
		$hasil = $this->db->get('tbl_jenis_barang');
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function s_jenisbrng($data){
		$this->db->insert('tbl_jenis_barang', $data);
	}

	public function ve_jenisbrng($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_jenis_barang');
		$this->db->where('id_jnsbrng', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function e_jenisbrng($id,$data){
		$this->db->where('id_jnsbrng',$id)->update('tbl_jenis_barang', $data);
	}

	function h_jenisbrng($id)
	{
		$this->db->where('id_jnsbrng',$id)->delete('tbl_jenis_barang');
	}
	// -------------------------------------------
	// ---------------- Group Jenis --------------
	public function v_groupbrng()
	{
		$hasil = $this->db->get('tbl_group');
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function s_groupbrng($data){
		$this->db->insert('tbl_group', $data);
	}

	public function ve_groupbrng($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_group');
		$this->db->where('id_group', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function e_groupbrng($id,$data){
		$this->db->where('id_group',$id)->update('tbl_group', $data);
	}

	function h_groupbrng($id)
	{
		$this->db->where('id_group',$id)->delete('tbl_group');
	}
	// -------------------------------------------
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
			$sql = "SELECT a.id_barang,a.nm_barang,b.nm_jnsbrng,a.kel_barang,c.nm_satuan,d.nm_satuan as nm_satuan2 FROM tbl_nama_barang as a join tbl_jenis_barang as b on a.id_jnsbrng=b.id_jnsbrng join tbl_satuan as c on a.sat1_barang=c.id_satuan join tbl_satuan as d on a.sat2_barang=d.id_satuan order by a.id_barang asc";
			$data = $this->db->query($sql);
			return $data->result();
		}

		public function ve_barang($id)
		{
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
	// ------------------------------------------
	// --------------- Supplier ------------------
	public function v_supplier()
	{
		$this->db->select('a.id_supplier,a.nm_supplier, a.notelp_supplier,a.almt_supplier,a.email_supplier,a.attn_supplier');
		$this->db->from('tbl_supplier as a');
		$this->db->join('tbl_provinsi as b', 'a.id_provinsi = b.id_provinsi');
		$this->db->join('tbl_kabupaten as c', 'a.id_kabupaten = c.id_kabupaten');
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function s_supplier($data){
		$this->db->insert('tbl_supplier', $data);
	}

	public function ve_supplier($id)
	{
		$this->db->select('a.id_supplier,a.nm_supplier,a.notelp_supplier,a.fax_supplier,a.id_provinsi,b.nm_provinsi,a.id_kabupaten,c.nm_kabupaten,a.almt_supplier,a.email_supplier,a.attn_supplier,a.npwp_supplier');
		$this->db->from('tbl_supplier as a');
		$this->db->join('tbl_provinsi as b', 'a.id_provinsi = b.id_provinsi');
		$this->db->join('tbl_kabupaten as c', 'a.id_kabupaten = c.id_kabupaten');
		$this->db->where('a.id_supplier', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function e_supplier($id,$data){
		$this->db->where('id_supplier',$id)->update('tbl_supplier', $data);
	}

	function h_supplier($id)
	{
		$this->db->where('id_supplier',$id)->delete('tbl_supplier');
	}
	// -------------------------------------------
	// ------------- Metode Pembelian ------------
	public function v_metpemb()
	{
		$hasil = $this->db->get('tbl_metode_bayar');
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function s_metpemb($data){
		$this->db->insert('tbl_metode_bayar', $data);
	}

	public function ve_metpem($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_metode_bayar');
		$this->db->where('id_metbyr', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function e_metpemb($id,$data){
		$this->db->where('id_metbyr',$id)->update('tbl_metode_bayar', $data);
	}

	function h_metpemb($id)
	{
		$this->db->where('id_metbyr',$id)->delete('tbl_metode_bayar');
	}
	// -------------------------------------------
	// =========================================================================================================================================

	// ======================================================== Verifikasi Data ===============================================================
	// --------------------- Pesanan Baru -------------------------
	public function v_verpesbar()
	{
		$sql = "SELECT a.id_permintaan,a.nota_minta,a.tgl_minta,b.nm_bagian,a.ket_minta,a.selesai_minta FROM tbl_permintaan as a join tbl_bagian as b on a.id_bagian=b.id_bagian where a.selesai_minta != 'T' order by a.tgl_minta desc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function v_ver_idpesbar($id)
	{
		$this->db->select('id_permintaan,tgl_minta,nota_minta');
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
	function v_ver_dtlpesbar($id)
	{
		$sql = "SELECT a.id_dtl_permintaan,a.id_permintaan,a.tgl_dtl_perlu,a.jml_dtl_minta,b.nm_barang,a.ket_dtl_minta,a.selesai_dtl_minta,a.stkgdng_dtl_minta,a.stkunit_dtl_minta
				FROM tbl_dtl_permintaan as a 
				join tbl_nama_barang as b on a.id_barang=b.id_barang 
				where a.id_permintaan = '$id'
				order by a.tgl_dtl_perlu asc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function v_ver_konfirmasi($id,$data)
	{
		$this->db->where('id_permintaan', $id)
				 ->update('tbl_permintaan',$data);
	}
	function ver_konfirmasi($id,$data)
	{
		$this->db->where('id_dtl_permintaan', $id)
				 ->update('tbl_dtl_permintaan',$data);
	}
// ------------------------------------------------------------
// --------------- Stok Barang ------------------
	public function v_stok()
	{
		$sql = "SELECT a.id_stok,a.id_barang,c.nm_barang,a.id_brngmsk,
				SUM(a.stok_masuk) AS sisa_stok,SUM(a.stok_keluar) AS stok_keluar,a.id_bagian 
				FROM tbl_stok_barang AS a 
				JOIN tbl_nama_barang AS c ON a.id_barang=c.id_barang
				JOIN tbl_barang_masuk AS b ON a.id_brngmsk=b.id_brngmsk
				GROUP BY a.id_barang
				ORDER BY ABS(c.nm_barang) ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}
// -----------------------------------------
// ========================================================================================================================================

// ====================================================== Data Transaksi ==================================================================
// --------------------- Rencana Pembelian --------------------
	// *********** Get ***********
	function get_pembpes()
	{
		$sql = "SELECT a.id_permintaan,a.nota_minta,a.tgl_minta,a.id_unit,a.id_bagian,b.nm_unit,c.nm_bagian
				FROM tbl_permintaan as a
				join tbl_unit as b on a.id_unit=b.id_unit
				join tbl_bagian as c on a.id_bagian=c.id_bagian
				WHERE a.selesai_minta = 'P'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function get_pembdtlpes()
	{
		$sql = "SELECT a.id_dtl_permintaan,a.nota_dtl_minta,a.id_barang,a.jml_dtl_minta,a.ket_dtl_minta,b.nm_barang,b.harga_barang,d.nm_bagian
				FROM tbl_dtl_permintaan as a
				join tbl_nama_barang as b on a.id_barang=b.id_barang
				join tbl_permintaan as c on a.id_permintaan=c.id_permintaan
				join tbl_bagian as d on c.id_bagian=d.id_bagian
				WHERE a.selesai_dtl_minta != 'T' AND a.selesai_dtl_minta != 'M' AND a.selesai_dtl_minta != 'Y'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function get_rppemb($id)
	{
		$sql = "SELECT ppn_beli,total_beli,totalhrg_beli FROM tbl_pembelian WHERE id_pembelian='$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	// *****************************
	function k_pembelian()
	{
 		$CI =& get_instance();
		$CI->load->database('default');
		//rancangan kode GL
		$kode_PB="PB".date('ym')."%";
		$sql="SELECT SUBSTRING(MAX(id_pembelian),7,4) AS maxNo FROM tbl_pembelian where id_pembelian like('$kode_PB')";
		$row = $CI->db->query($sql);
		foreach ($row->result_array() as $rowmax)
		{	
		}
		//buat noPO baru dengan noPO terbesar+1
		$noPB_tmp		=$rowmax['maxNo'];
		$noPB			=$noPB_tmp+1;	
		$kode_tanggal	=date("ym");
		if(strlen($noPB)==1){
			$kode_pembelian="PB".$kode_tanggal."000".$noPB;
		}elseif(strlen($noPB)==2){
			$kode_pembelian="PB".$kode_tanggal."00".$noPB;
		}elseif(strlen($noPB)==3){
			$kode_pembelian="PB".$kode_tanggal."0".$noPB;
		}elseif(strlen($noPB)==4){
			$kode_pembelian="PB".$kode_tanggal.$noPB;
		}
		
		return $kode_pembelian;
	}
	public function v_pembelian()
	{
		$sql = "SELECT a.id_pembelian,a.tgl_beli,a.nota_beli,a.selesai_beli,a.ket_beli,a.selesai_beli,b.tgl_minta,b.nota_minta,c.nm_bagian,d.nm_unit 
				FROM tbl_pembelian as a
				join tbl_permintaan as b on a.id_permintaan=b.id_permintaan
				join tbl_bagian as c on a.id_bagian=c.id_bagian
				join tbl_unit as d on a.id_unit=d.id_unit
				order by a.tgl_beli asc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function v_dtl_idpemb($id)
	{
		$this->db->select('id_pembelian,tgl_beli,nota_beli');
		$this->db->from('tbl_pembelian');
		$this->db->where('id_pembelian', $id);
		$this->db->limit(1);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}
	function v_dtl_pemb($id)
	{
		$sql = "SELECT a.id_dtl_pembelian,a.id_pembelian,a.tgl_renc_beli,a.jml_dtl_minta,a.jml_renc_beli,a.hrg_renc_beli,a.ket_dtl_beli,a.langsung_beli,b.nm_barang 
				FROM tbl_dtl_pembelian as a
				join tbl_nama_barang as b on a.id_barang=b.id_barang
				WHERE a.id_pembelian= '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function s_pembelian($data)
	{
		return $this->db->insert('tbl_pembelian', $data);
	}
	function s_dtl_pembelian_batch($data)
	{
		return $this->db->insert_batch('tbl_dtl_pembelian', $data);
	}
	function v_konfpemb($id,$data)
	{
		$this->db->where('id_pembelian', $id)
				 ->update('tbl_pembelian',$data);
	}
	function v_dtl_konfpemb($id,$data)
	{
		$this->db->where('id_dtl_pembelian', $id)
				 ->update('tbl_dtl_pembelian',$data);
	}
	function ve_rencpemb($id)
	{
		$this->db->select('a.id_dtl_pembelian,a.id_pembelian,b.id_permintaan,b.nota_beli,b.tgl_beli,b.ket_beli,f.nota_minta,f.tgl_minta,b.id_bagian,b.id_unit,d.nm_bagian,e.nm_unit,a.id_dtl_permintaan,a.id_barang,g.nm_barang,a.jml_dtl_minta,a.jml_renc_beli,a.hrg_renc_beli,a.tgl_renc_beli,a.ket_dtl_beli,a.total_dtl_beli,a.ppn_dtl_beli,a.totalhrg_dtl_beli');
		$this->db->from('tbl_dtl_pembelian as a');
		$this->db->join('tbl_pembelian as b', 'a.id_pembelian = b.id_pembelian');
		$this->db->join('tbl_dtl_permintaan as c', 'a.id_dtl_permintaan = c.id_dtl_permintaan');
		$this->db->join('tbl_bagian as d', 'b.id_bagian = d.id_bagian');
		$this->db->join('tbl_unit as e', 'b.id_unit = e.id_unit');
		$this->db->join('tbl_permintaan as f', 'b.id_permintaan = f.id_permintaan');
		$this->db->join('tbl_nama_barang as g', 'a.id_barang = g.id_barang');
		$this->db->where('a.id_dtl_pembelian', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}
	function e_dtlrencpemb($id,$data)
	{
		$this->db->where('id_dtl_pembelian',$id)->update('tbl_dtl_pembelian', $data);
	}
	function e_rencpemb($id,$id2,$ppn,$subtotal,$total,$nota,$tgl,$ket)
	{
	 	$this->db->query( "update tbl_pembelian a join tbl_dtl_pembelian b on a.id_pembelian=b.id_pembelian
	 					   set a.nota_beli = '$nota',
	 					   a.tgl_beli = '$tgl',
	 					   a.ket_beli = '$ket',
	 					   a.ppn_beli =  (a.ppn_beli-b.ppn_dtl_beli)+$ppn,
	 					   a.total_beli = (a.total_beli-b.total_dtl_beli)+$subtotal,
	 					   a.totalhrg_beli = (a.totalhrg_beli-totalhrg_dtl_beli)+$total
	 					   where a.id_pembelian = '$id' and b.id_dtl_pembelian = '$id2'");

	}
	public function h_rencpemb($id)
	{
		$this->db->where('id_pembelian', $id)->delete('tbl_pembelian');
	}
	public function h_dtlrencpemb($id)
	{
		$this->db->where('id_pembelian', $id)->delete('tbl_dtl_pembelian');
	}
	// ------------------------------------------------------------
	// ----------------- Surat Pesanan Barang ---------------------
	// ********* GET **********
	function get_supplier()
	{
		$sql = "SELECT id_supplier,nm_supplier,attn_supplier,almt_supplier FROM tbl_supplier order by ABS(id_supplier) asc ";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function get_rencpemb()
	{
		$sql = "SELECT a.id_dtl_pembelian,a.nota_dtl_beli,a.id_barang,b.nm_barang,a.jml_renc_beli,a.hrg_renc_beli,c.nm_satuan,a.total_dtl_beli,a.ppn_dtl_beli,a.totalhrg_dtl_beli
				FROM tbl_dtl_pembelian as a 
				join tbl_nama_barang as b on a.id_barang=b.id_barang
				join tbl_satuan as c on b.sat1_barang=c.id_satuan
				join tbl_pembelian as d on a.id_pembelian=d.id_pembelian
				where d.selesai_beli = 'T'
				order by abs(nota_dtl_beli) asc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function get_company()
	{
		$sql = "SELECT nm_company FROM tbl_company WHERE id_company = 'GKBI'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function get_rpspb($id)
	{
		$sql = "SELECT total_spb,ppn_spb,totalharga_spb FROM tbl_spb WHERE id_spb='$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	// ************************
	function k_spb()
	{
 		$CI =& get_instance();
		$CI->load->database('default');
		//rancangan kode GL
		$kode_SPB="SPB".date('ym')."%";
		$sql="SELECT SUBSTRING(MAX(id_spb),8,4) AS maxNo FROM tbl_spb where id_spb like('$kode_SPB')";
		$row = $CI->db->query($sql);
		foreach ($row->result_array() as $rowmax)
		{	
		}
		//buat noPO baru dengan noPO terbesar+1
		$noSPB_tmp		=$rowmax['maxNo'];
		$noSPB			=$noSPB_tmp+1;	
		$kode_tanggal	=date("ym");
		if(strlen($noSPB)==1){
			$kode_spb="SPB".$kode_tanggal."000".$noSPB;
		}elseif(strlen($noSPB)==2){
			$kode_spb="SPB".$kode_tanggal."00".$noSPB;
		}elseif(strlen($noSPB)==3){
			$kode_spb="SPB".$kode_tanggal."0".$noSPB;
		}elseif(strlen($noSPB)==4){
			$kode_spb="SPB".$kode_tanggal.$noSPB;
		}
		
		return $kode_spb;
	}
	public function v_spb()
	{
		$sql = "SELECT a.id_spb,a.tgl_spb,a.nota_spb,b.nm_supplier,b.attn_supplier,a.total_spb,a.ppn_spb,a.totalharga_spb
				FROM tbl_spb as a
				join tbl_supplier as b on a.id_supplier=b.id_supplier
				order by a.tgl_spb desc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function s_spb($data)
	{
		return $this->db->insert('tbl_spb', $data);
	}
	function s_dtl_spb_batch($data)
	{
		return $this->db->insert_batch('tbl_dtl_spb', $data);
	}
	function v_dtl_idspb($id)
	{
		$this->db->select('a.id_spb,a.tgl_spb,a.nota_spb,b.nm_supplier');
		$this->db->from('tbl_spb as a');
		$this->db->join('tbl_supplier as b', 'a.id_supplier = b.id_supplier');
		$this->db->where('a.id_spb', $id);
		$this->db->limit(1);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}
	function v_dtl_spb($id)
	{
		$this->db->select('a.id_dtl_spb,a.id_spb,b.nm_barang,a.jmlbrng_spb,a.satuanbrng_spb,a.hargabrng_spb,a.dtltotal_spb,a.dtlppn_spb,a.dtltotalhrg_spb,a.selesai_dtl_spb');
		$this->db->from('tbl_dtl_spb as a');
		$this->db->join('tbl_nama_barang as b', 'a.id_barang = b.id_barang');
		$this->db->where('a.id_spb', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}
	function v_dtl_konfspb($id,$data)
	{
		$this->db->where('id_dtl_spb', $id)
				 ->update('tbl_dtl_spb',$data);
	}
	function ve_nospb($id)
	{
		$this->db->select('a.id_spb,a.nota_spb,a.tgl_spb,a.kurs_spb,a.tgl_serahspb,a.ket_serahspb,a.ket_gudangspb,a.ket_spb,a.haribayar_spb,a.ket_bayar,a.ket_spb,b.id_supplier,b.nm_supplier,b.attn_supplier,a.total_spb,a.ppn_spb,a.totalharga_spb');
		$this->db->from('tbl_spb as a');
		$this->db->join('tbl_supplier as b', 'a.id_supplier = b.id_supplier');
		$this->db->where('a.id_spb', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}
	function ve_spb($id)
	{
		$this->db->select('a.id_dtl_spb,a.id_spb,a.nota_dtl_spb,a.id_dtl_pembelian,a.nota_beli,d.id_barang,c.nm_barang,a.hargabrng_spb,a.jmlbrng_spb,a.satuanbrng_spb,a.dtltotal_spb,a.dtlppn_spb,a.dtltotalhrg_spb,');
		$this->db->from('tbl_dtl_spb as a');
		$this->db->join('tbl_nama_barang as c', 'a.id_barang = c.id_barang');
		$this->db->join('tbl_dtl_pembelian as d', 'a.id_dtl_pembelian = d.id_dtl_pembelian');
		$this->db->where('a.id_dtl_spb', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}
	function e_spb($id,$id2,$ppn,$subtotal,$total)
	{
		$this->db->query( "update tbl_spb a join tbl_dtl_spb b on a.id_spb=b.id_spb
	 					   set a.total_spb 		= (a.total_spb-b.dtltotal_spb)+$subtotal,
	 					   a.ppn_spb 			= (a.ppn_spb-b.dtlppn_spb)+$ppn,
						   a.totalharga_spb 	= (a.totalharga_spb-b.dtltotalhrg_spb)+$total
	 					   where a.id_spb = '$id' and b.id_dtl_spb = '$id2'");
	}
	function e_nospb($id,$data)
	{
		$this->db->where('id_spb',$id)->update('tbl_spb', $data);
	}
	function e_dtl_spb($id,$data)
	{
		$this->db->where('id_dtl_spb',$id)->update('tbl_dtl_spb', $data);
	}
	function e_dtl_nospb($id,$data)
	{
		$this->db->where('id_spb',$id)->update('tbl_dtl_spb', $data);
	}
	function h_spb($id)
	{
		$this->db->where('id_spb', $id)->delete('tbl_spb');
	}
	function h_dtlspb($id)
	{
		$this->db->where('id_spb', $id)->delete('tbl_dtl_spb');
	}
	// ------------------------------------------------------------
	// ----------- Nota Penerimaan Barang (NPB) -------------------
	public function v_npb()
	{
		$sql = "SELECT a.id_penerimaan,a.nota_terima,a.tgl_terima,a.nota_spb,b.nm_supplier,c.nm_bagian,d.nota_beli,a.srtjalan_terima,a.tgljalan_terima,e.nm_unit,a.verif_terima
				FROM tbl_penerimaan as a
				join tbl_supplier as b on a.id_supplier=b.id_supplier
				join tbl_bagian as c on a.id_bagian=c.id_bagian
				join tbl_pembelian as d on a.id_pembelian=d.id_pembelian
				join tbl_unit as e on a.id_unit=e.id_unit
				order by a.tgl_terima desc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function get_spbnpb()
	{
		$sql = "SELECT a.id_spb,a.nota_spb,a.tgl_spb,b.nm_supplier,b.attn_supplier FROM tbl_spb as a
				join tbl_supplier as b on a.id_supplier=b.id_supplier
				order by a.id_spb desc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function ve_npb($id)
	{
		$sql = "SELECT a.id_penerimaan,a.nota_terima,a.tgl_terima,a.id_supplier,e.nm_supplier,a.id_pembelian,a.nota_beli,a.id_unit,c.nm_unit,a.id_bagian,d.nm_bagian,a.id_cek,a.nota_cek,a.tgl_cek,a.srtjalan_terima,a.tgljalan_terima,a.ket_terima,a.biaya_angkut_terima,a.id_jnsbrng,g.nm_jnsbrng,a.ppn_terima,a.subtotal_terima,a.totalharga_terima,a.k_ppn_terima,a.k_subtotal_terima,a.k_totalharga_terima,a.harijt_terima,a.tgljt_terima,a.lunas_terima,a.jml_kurs_terima,a.kurs_terima
			FROM tbl_penerimaan as a 
			join tbl_dtl_penerimaan as b on a.id_penerimaan=b.id_penerimaan
			join tbl_unit as c on a.id_unit=c.id_unit
			join tbl_bagian as d on a.id_bagian=d.id_bagian
			join tbl_supplier as e on a.id_supplier=e.id_supplier
			join tbl_pembelian as f on a.id_pembelian=a.id_pembelian
			join tbl_jenis_barang as g on a.id_jnsbrng=g.id_jnsbrng
			WHERE a.id_penerimaan = '$id' 
			limit 1";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function ve_detl_npb($id)
	{
		$sql = "SELECT a.id_dtl_penerimaan,a.id_penerimaan,a.id_dtl_pembelian,a.id_barang,d.nm_barang,a.jml1_dtlterima,a.jml2_dtlterima,a.sat1_dtlterima,a.sat2_dtlterima,a.angkut_dtlterima,a.harga_dtlterima,a.ppn_dtlterima,a.subtotal_dtlterima,a.totalharga_dtlterima,a.k_ppn_dtlterima,a.k_subtotal_dtlterima,a.k_totalharga_dtlterima,a.harga_dtlterima,f.nm_satuan as nm_satuan1,g.nm_satuan as nm_satuan2
			FROM tbl_dtl_penerimaan as a 
			left join tbl_penerimaan as b on a.id_penerimaan=b.id_penerimaan
			left join tbl_group as c on a.id_group=c.id_group
			left join tbl_nama_barang as d on a.id_barang=d.id_barang
			left join tbl_dtl_pembelian as e on a.id_dtl_pembelian=e.id_dtl_pembelian
			left join tbl_satuan as f on a.sat1_dtlterima=f.id_satuan
			left join tbl_satuan as g on a.sat2_dtlterima=g.id_satuan
			WHERE a.id_penerimaan = '$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function e_npb($id,$kurs,$jml_kurs,$lunas_terima,$id_spb,$nota_spb,$hrjt,$tgljt,$ket,$byangkut,$stot,$ppn,$tothrg,$k_stot,$k_ppn,$k_tothrg)
	{
		$this->db->query( "update tbl_penerimaan a join tbl_dtl_penerimaan b on a.id_penerimaan=b.id_penerimaan
						   set a.kurs_terima = '$kurs',
						   a.jml_kurs_terima = $jml_kurs,
						   a.lunas_terima = '$lunas_terima',
						   a.id_spb = '$id_spb',
						   a.nota_spb = '$nota_spb',
						   a.harijt_terima = $hrjt,
						   a.tgljt_terima = '$tgljt',
						   a.ket_terima = '$ket',
						   a.biaya_angkut_terima = $byangkut,
						   a.subtotal_terima = $stot,
						   a.ppn_terima = $ppn,
						   a.totalharga_terima = $tothrg,
						   a.k_subtotal_terima = $k_stot,
						   a.k_ppn_terima = $k_ppn,
						   a.k_totalharga_terima = $k_tothrg
						   where a.id_penerimaan = '$id'");
	}
	function v_konfnpb($id,$data)
	{
		$this->db->where('id_penerimaan', $id)
				 ->update('tbl_penerimaan',$data);
	}
	// ------------------------------------------------------------
	// ========================================================================================================================================
}

/* End of file M_pembelian.php */
/* Location: ./application/models/M_pembelian.php */

/*
a.biaya_angkut_terima = (a.biaya_angkut_terima-b.angkut_dtlterima)+$byangkut,
						   a.subtotal_terima = (a.subtotal_terima-b.subtotal_dtlterima)+$stot,
						   a.ppn_terima = (a.ppn_terima-b.ppn_dtlterima)+$ppn,
						   a.totalharga_terima = (a.totalharga_terima-b.totalharga_dtlterima)+$tothrg,
						   a.k_subtotal_terima = (a.k_subtotal_terima-b.k_subtotal_dtlterima)+$$k_stot,
						   a.k_ppn_terima = (a.k_ppn_terima-b.k_ppn_dtlterima)+$k_ppn,
						   a.k_totalharga_terima = (a.totalharga_terima-b.k_totalharga_dtlterima)+$k_tothrg
*/