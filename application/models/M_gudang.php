<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_gudang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	// ============== Fungsi Get Data ===============
	function get_rekening()
	{
		return $this->db->order_by('abs(id_rekening) asc')->get('tbl_rekening'); 
	}
	function get_unit()
	{
		return $this->db->order_by('abs(id_unit) asc')->get('tbl_unit'); 
	}
	function get_jenis_barang()
	{
		return $this->db->order_by('abs(id_jnsbrng) asc')->get('tbl_jenis_barang'); 
	}
	// ==============================================
	// ======================================================== DATA MASTER ===================================================================
	// ------------ Kode Rekening Akuntansi ---------------
		public function v_koderekakt()
		{
			$hasil = $this->db->order_by('abs(id_rekening) asc')->get('tbl_rekening');
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function s_koderekakt($data)
		{
			$this->db->insert('tbl_rekening', $data);
		}

		public function ve_koderekakt($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_rekening');
			$this->db->where('no_rekening', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function e_koderekakt($id,$data)
		{
			$this->db->where('no_rekening',$id)->update('tbl_rekening', $data);
		}

		public function h_koderekakt($id)
		{
			$this->db->where('no_rekening',$id)->delete('tbl_rekening');
		}
	// ----------------------------------------------------
	// ---------------- Jenis Barang Akuntansi ------------
		public function v_jenisbrngakt()
		{
			$sql = "SELECT a.id_jnsbrngakt,a.no_jnsbrngakt,a.nm_jnsbrngakt,a.group_jnsbrngakt,b.nm_jnsbrng,c.nm_unit,d.id_rekening,d.nm_rekening FROM tbl_barang_akutansi as a join tbl_jenis_barang as b on a.id_jnsbrng=b.id_jnsbrng join tbl_unit as c on a.id_unit=c.id_unit join tbl_rekening as d on a.no_rekening=d.no_rekening order by a.no_jnsbrngakt asc";
			$data = $this->db->query($sql);
			return $data->result();
		}
		public function s_jenisbrngakt($data)
		{
			return $this->db->insert_batch('tbl_barang_akutansi', $data);
		}
		public function ve_jenisbrngakt($id)
		{
			/*$sql = "SELECT id_jnsbrngakt,no_jnsbrngakt,nm_jnsbrngakt,id_jnsbrng,id_unit,id_rekening FROM tbl_barang_akutansi where id_jnsbrngakt=''$id'";
			$data = $this->db->query($sql);
			return $data->result();*/
			$this->db->select('*');
			$this->db->from('tbl_barang_akutansi');
			$this->db->where('id_jnsbrngakt', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}
		public function e_jenisbrngakt($id,$data)
		{
			$this->db->where('id_jnsbrngakt',$id)->update('tbl_barang_akutansi', $data);
		}
		public function h_jenisbrngakt($id)
		{
			$this->db->where('id_jnsbrngakt',$id)->delete('tbl_barang_akutansi');
		}
	// ----------------------------------------------------
	// ========================================================================================================================================
		
	// ======================================================== Verifikasi Data ===============================================================
	// --------------------- Pesanan Baru -------------------------
		public function v_verpesbar()
		{
			$sql = "SELECT a.id_permintaan,a.nota_minta,a.tgl_minta,b.nm_bagian,a.ket_minta,a.selesai_minta FROM tbl_permintaan as a join tbl_bagian as b on a.id_bagian=b.id_bagian order by a.tgl_minta desc";
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
}

/* End of file M_gudang.php */
/* Location: ./application/models/M_gudang.php */