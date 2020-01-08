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
		$hasil = $this->db->get('tbl_supplier');
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
		$this->db->select('*');
		$this->db->from('tbl_supplier');
		$this->db->where('id_supplier', $id);
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
}

/* End of file M_pembelian.php */
/* Location: ./application/models/M_pembelian.php */