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

	public function s_jenisbrng($data){
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

	public function e_jenisbrng($id,$data){
		$this->db->where('id_jnsbrng',$id)->update('tbl_jenis_barang', $data);
	}

	public function h_jenisbrng($id)
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

	public function s_groupbrng($data){
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

	public function e_groupbrng($id,$data){
		$this->db->where('id_group',$id)->update('tbl_group', $data);
	}

	public function h_groupbrng($id)
	{
		$this->db->where('id_group',$id)->delete('tbl_group');
	}
	// -------------------------------------------
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

	public function s_supplier($data){
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

	public function e_supplier($id,$data){
		$this->db->where('id_supplier',$id)->update('tbl_supplier', $data);
	}

	public function h_supplier($id)
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

	public function s_metpemb($data){
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

	public function e_metpemb($id,$data){
		$this->db->where('id_metbyr',$id)->update('tbl_metode_bayar', $data);
	}

	public function h_metpemb($id)
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
			$sql = "SELECT * FROM tbl_pembelian";
			$data = $this->db->query($sql);
			return $data->result();
		}
		public function v_dtl_pembelian()
		{
			$sql = "SELECT * FROM tbl_dtl_pembelian";
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
	// ------------------------------------------------------------
	// ========================================================================================================================================
}

/* End of file M_pembelian.php */
/* Location: ./application/models/M_pembelian.php */