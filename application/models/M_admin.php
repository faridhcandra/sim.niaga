<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	// ========= Fungsi Get ==========
		public function get_unit()
		{
			return $this->db->order_by('id_unit','asc')->get('tbl_unit');
		}
		public function get_kab()
		{
			return $this->db->order_by('id_kabupaten','asc')->get('tbl_kabupaten');
		}
		public function get_prov()
		{
			return $this->db->order_by('id_provinsi','asc')->get('tbl_provinsi');
		}
	// ===============================

	// ========================================================= Master Data ==================================================================
	// --------------- Bagian ------------------
		public function v_bagian()
		{
			$this->db->select('a.id_bagian,a.nm_bagian,b.nm_unit');
			$this->db->from('tbl_bagian as a');
			$this->db->join('tbl_unit as b','a.id_unit=b.id_unit');
			$this->db->order_by('a.id_bagian', 'asc'); 

			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function s_bagian($data){
			$this->db->insert('tbl_bagian', $data);
		}

		public function ve_bagian($id)
		{
			$this->db->select('a.id_bagian,a.nm_bagian,b.nm_unit,b.id_unit');
			$this->db->from('tbl_bagian as a');
			$this->db->join('tbl_unit as b', 'a.id_unit = b.id_unit');
			$this->db->where('a.id_bagian', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function e_bagian($id,$data){
			$this->db->where('id_bagian',$id)->update('tbl_bagian', $data);
		}

		public function h_bagian($id)
		{
			$this->db->where('id_bagian',$id)->delete('tbl_bagian');
		}
	// ---------------------------------------
	// --------------- Unit ------------------
		public function v_unit()
		{
			$hasil = $this->db->order_by('nm_unit','asc')->get('tbl_unit');
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function s_unit($data){
			$this->db->insert('tbl_unit', $data);
		}

		public function ve_unit($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_unit');
			$this->db->where('id_unit', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function e_unit($id,$data){
			$this->db->where('id_unit',$id)->update('tbl_unit', $data);
		}

		public function h_unit($id)
		{
			$this->db->where('id_unit',$id)->delete('tbl_unit');
		}
	// ---------------------------------------
	// --------------- Kabupaten ----------------
		public function v_kabupaten()
		{
			$this->db->select('a.id_kabupaten,a.nm_kabupaten,b.nm_provinsi');
			$this->db->from('tbl_kabupaten as a');
			$this->db->join('tbl_provinsi as b','a.id_provinsi=b.id_provinsi');
			$this->db->order_by('b.id_provinsi', 'asc'); 

			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function s_kabupaten($data){
			$this->db->insert('tbl_kabupaten', $data);
		}

		public function ve_kabupaten($id)
		{
			$this->db->select('a.id_kabupaten,a.nm_kabupaten,b.nm_provinsi,b.id_provinsi');
			$this->db->from('tbl_kabupaten as a');
			$this->db->join('tbl_provinsi as b', 'a.id_provinsi = b.id_provinsi');
			$this->db->where('a.id_kabupaten', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function e_kabupaten($id,$data){
			$this->db->where('id_kabupaten',$id)->update('tbl_kabupaten', $data);
		}

		public function h_kabupaten($id)
		{
			$this->db->where('id_kabupaten',$id)->delete('tbl_kabupaten');
		}
	// ------------------------------------------
	// --------------- provinsi -----------------
		public function v_provinsi()
		{
			$hasil = $this->db->order_by('nm_provinsi','asc')->get('tbl_provinsi');
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function s_provinsi($data){
			$this->db->insert('tbl_provinsi', $data);
		}

		public function ve_provinsi($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_provinsi');
			$this->db->where('id_provinsi', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function e_provinsi($id,$data){
			$this->db->where('id_provinsi',$id)->update('tbl_provinsi', $data);
		}

		public function h_provinsi($id)
		{
			$this->db->where('id_provinsi',$id)->delete('tbl_provinsi');
		}
	// ------------------------------------------
	// ========================================================================================================================================

	// ========================================================= Pengaturan ===================================================================
	// ----------- Jabatan --------------
		public function v_jabatan()
		{
			$hasil = $this->db->get('tbl_pejabat');
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}
		public function ve_jabatan()
		{
			$hasil = $this->db->where('id_pejabat','niagagkbi')->get('tbl_pejabat');
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}
		public function e_jabatan($data){
			$this->db->where('id_pejabat', 'niagagkbi')->update('tbl_pejabat', $data);
		}
	// ----------------------------------
	// ----------- Perusahaan -----------
		public function v_perusahaan()
		{
			$this->db->select('a.nm_company,a.almt_company,a.telp_company,a.fax_company,a.email_company,a.npwp_company,a.noseri_company,b.nm_provinsi,c.nm_kabupaten,d.nm_pejabat1,d.posisi_pejabat1,d.nm_pejabat2,d.posisi_pejabat2,d.nm_pejabat3,d.posisi_pejabat3,d.nm_pejabat4,d.posisi_pejabat4,d.nm_pejabat5,d.posisi_pejabat5');
			$this->db->from('tbl_company as a');
			$this->db->join('tbl_provinsi as b','a.id_provinsi=b.id_provinsi');
			$this->db->join('tbl_kabupaten as c','a.id_kabupaten=c.id_kabupaten');
			$this->db->join('tbl_pejabat as d','a.id_pejabat=d.id_pejabat');
			$this->db->where('a.id_company', 'GKBI');

			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}
		public function ve_perusahaan()
		{
			$this->db->select('a.nm_company,a.almt_company,a.telp_company,a.fax_company,a.email_company,a.npwp_company,a.noseri_company,b.nm_provinsi,a.id_provinsi,c.nm_kabupaten,a.id_kabupaten');
			$this->db->from('tbl_company as a');
			$this->db->join('tbl_provinsi as b','a.id_provinsi=b.id_provinsi');
			$this->db->join('tbl_kabupaten as c','a.id_kabupaten=c.id_kabupaten');
			$this->db->where('a.id_company', 'GKBI');

			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}
		public function e_perusahaan($data){
			$this->db->where('id_company', 'GKBI')->update('tbl_company', $data);
		}
	// ----------------------------------
	// ========================================================================================================================================

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */