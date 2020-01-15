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
		public function v_pesbaru(){}

		function pesbaru_barang()
		{
			$hasil = $this->db->query("SELECT a.id_barang, a.nm_barang, b.nm_jnsbrng, c.nm_group FROM tbl_nama_barang as a join tbl_jenis_barang as b on a.id_jnsbrng=b.id_jnsbrng join tbl_group as c on a.id_group=c.id_group order by a.id_barang, ABS(a.nm_barang)");
			return $hasil; 
		}

	// =========================================================================================================================================
}

/* End of file M_stok.php */
/* Location: ./application/models/M_stok.php */