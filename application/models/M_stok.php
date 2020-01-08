<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_stok extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

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
	// =========================================================================================================================================

}

/* End of file M_stok.php */
/* Location: ./application/models/M_stok.php */