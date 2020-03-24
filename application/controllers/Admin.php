<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_admin');
	}

	public function index()
	{
		$data['menutitle'] = 'Dashboard';
		$data['menu'] = 'Home';
		$data['submenu'] = 'Dashboard';

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/template/content');
		$this->load->view('admin/template/footer');
	}
	// ======================================================== DATA MASTER ===================================================================
	// ---------- Data Bagian -------------
	public function v_bagian()
	{
		$data['menutitle'] = 'Data Bagian';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Data Bagian';

		$isi['isi'] = $this->M_admin->v_bagian();
		$isi['get_unit'] = $this->M_admin->get_unit();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/bagian/view',$isi);
		$this->load->view('admin/template/footer');
	}

	public function t_bagian()
	{
		$cek = $this->db->query("SELECT * FROM tbl_bagian where id_bagian='".$this->input->post('kode',TRUE)."' or nm_bagian='".$this->input->post('nama',TRUE)."'")->num_rows();
		if($cek <= 0){
		$data = array (
						'id_bagian' => $this->input->post('kode'),
						'id_unit' 	=> $this->input->post('unit'),
						'nm_bagian' => $this->input->post('nama')
					  );
		$sql = $this->M_admin->s_bagian($data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('admin/v_bagian')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('admin/v_bagian','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".base_url('admin/v_bagian')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('admin/v_bagian','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode / Nama Bagian Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('admin/v_bagian').'")';
			echo '</script>';
		}
	}

	public function u_bagian($id='')
	{
		$data['menutitle'] = 'Data Bagian';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Ubah Data Bagian';

		$isi['isi'] = $this->M_admin->ve_bagian($id);
		$isi['getUnit'] = $this->M_admin->get_unit();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/bagian/edit',$isi);
		$this->load->view('admin/template/footer');
	}

	public function bagian_u($id)
	{
		$this->form_validation->set_rules('kode','Kode','required');
		if($this->form_validation->run() == TRUE){
			$data = array(
							'id_bagian' => $this->input->post('kode'),
							'id_unit' 	=> $this->input->post('unit'),
							'nm_bagian' => $this->input->post('nama')						
						 );
			$sql = $this->M_admin->e_bagian($id, $data);
			$allsql = array($sql);
				if($allsql){ // Jika sukses
					// echo "<script>alert('Data berhasil diubah');window.location = '".base_url('admin/v_bagian')."';</script>";
					$this->session->set_flashdata('success', 'Data berhasil diubah');
					redirect('admin/v_bagian','refresh');
				}else{ // Jika gagal
					// echo "<script>alert('Data gagal diubah');window.location = '".base_url('admin/v_bagian')."';</script>";
					$this->session->set_flashdata('error', 'Data gagal diubah');
					redirect('admin/v_bagian','refresh');
				}
		}else{
			// echo "<script>alert('Maaf Kode Bagian tidak ditemukan');window.location = '".site_url('admin/v_bagian')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Kode Bagian tidak ditemukan');
			redirect('admin/v_bagian','refresh');
		}
	}

	public function h_bagian($id)
	{
		$sql = $this->M_admin->h_bagian($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".base_url('admin/v_bagian')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('admin/v_bagian','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal di hapus');window.location = '".base_url('admin/v_bagian')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('admin/v_bagian','refresh');
		}
	}
	// ------------------------------------
	// ---------- Data Bagian -------------
	public function v_unit()
	{
		$data['menutitle'] = 'Data Unit';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Data Unit';

		$isi['isi'] = $this->M_admin->v_unit();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/unit/view',$isi);
		$this->load->view('admin/template/footer');
	}

	public function t_unit()
	{
		$cek = $this->db->query("SELECT * FROM tbl_unit where id_unit='".$this->input->post('kode',TRUE)."' or nm_unit='".$this->input->post('nama',TRUE)."'")->num_rows();
		if($cek <= 0){
		$data = array (
						'id_unit' => $this->input->post('kode'),
						'nm_unit' => $this->input->post('nama')
					  );
		$sql = $this->M_admin->s_unit($data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('admin/v_unit')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('admin/v_unit','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".base_url('admin/v_unit')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('admin/v_unit','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode / Nama Unit Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('admin/v_unit').'")';
			echo '</script>';
		}
	}

	public function u_unit($id='')
	{
		$data['menutitle'] = 'Data Unit';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Ubah Data Unit';

		$isi['isi'] = $this->M_admin->ve_unit($id);

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/unit/edit',$isi);
		$this->load->view('admin/template/footer');
	}

	public function unit_u($id)
	{
		$this->form_validation->set_rules('kode','Kode','required');
		if($this->form_validation->run() == TRUE){
		$data = array(
						'id_unit' => $this->input->post('kode'),
						'nm_unit' => $this->input->post('nama')						
					 );
		$sql = $this->M_admin->e_unit($id, $data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil diubah');window.location = '".base_url('admin/v_unit')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('admin/v_unit','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal diubah');window.location = '".base_url('admin/v_unit')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('admin/v_unit','refresh');
			}
		}else{
			// echo "<script>alert('Maaf Kode Unit tidak ditemukan');window.location = '".site_url('admin/v_unit')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Kode Unit tidak ditemukan');
			redirect('admin/v_unit','refresh');
		}
	}

	public function h_unit($id)
	{
		$sql = $this->M_admin->h_unit($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".base_url('admin/v_unit')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('admin/v_unit','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal di hapus');window.location = '".base_url('admin/v_unit')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('admin/v_unit','refresh');
		}
	}
	// ------------------------------------
	// ---------- Data Kabupaten -------------
	public function v_kabupaten()
	{
		$data['menutitle'] = 'Data Kabupaten';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Data Kabupaten';

		$isi['isi'] = $this->M_admin->v_kabupaten();
		$isi['get_prov'] = $this->M_admin->get_prov();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/kabupaten/view',$isi);
		$this->load->view('admin/template/footer');
	}

	public function t_kabupaten()
	{
		$cek = $this->db->query("SELECT * FROM tbl_kabupaten where nm_kabupaten='".$this->input->post('kab',TRUE)."'")->num_rows();
		if($cek <= 0){
		$data = array(
						'nm_kabupaten' => $this->input->post('kab'),
						'id_provinsi' => $this->input->post('prov')
					 );
		$sql = $this->M_admin->s_kabupaten($data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('admin/v_kabupaten')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('admin/v_kabupaten','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".base_url('admin/v_kabupaten')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('admin/v_kabupaten','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Nama Kabupaten Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('admin/v_kabupaten').'")';
			echo '</script>';
		}
	}

	public function u_kabupaten($id='')
	{
		$data['menutitle'] = 'Data kabupaten';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Ubah Data Kabupaten';

		$isi['isi'] = $this->M_admin->ve_kabupaten($id);
		$isi['getProv'] = $this->M_admin->get_prov();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/kabupaten/edit',$isi);
		$this->load->view('admin/template/footer');
	}

	public function kabupaten_u($id)
	{
		$this->form_validation->set_rules('kab','Kab','required');
		if($this->form_validation->run() == TRUE){
			$data = array(
							'id_provinsi' 	=> $this->input->post('prov'),
							'nm_kabupaten' => $this->input->post('kab')						
						 );
			$sql = $this->M_admin->e_kabupaten($id, $data);
			$allsql = array($sql);
				if($allsql){ // Jika sukses
					// echo "<script>alert('Data berhasil diubah');window.location = '".base_url('admin/v_kabupaten')."';</script>";
					$this->session->set_flashdata('success', 'Data berhasil diubah');
					redirect('admin/v_kabupaten','refresh');
				}else{ // Jika gagal
					// echo "<script>alert('Data gagal diubah');window.location = '".base_url('admin/u_Kabupaten')."';</script>";
					$this->session->set_flashdata('error', 'Data gagal diubah');
					redirect('admin/v_kabupaten','refresh');
				}
		}else{
			// echo "<script>alert('Maaf Nama Kabupaten tidak ditemukan');window.location = '".site_url('admin/v_Kabupaten')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Nama Kabupaten tidak ditemukan');
			redirect('admin/v_Kabupaten','refresh');
		}
	}

	public function h_kabupaten($id)
	{
		$sql = $this->M_admin->h_kabupaten($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".base_url('admin/v_Kabupaten')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('admin/v_kabupaten','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal di hapus');window.location = '".base_url('admin/v_Kabupaten')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('admin/v_kabupaten','refresh');
		}
	}
	// ---------------------------------------
	// ---------- Data Provinsi -------------
	public function v_provinsi()
	{
		$data['menutitle'] = 'Data Provinsi';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Data Provinsi';

		$isi['isi'] = $this->M_admin->v_provinsi();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/provinsi/view',$isi);
		$this->load->view('admin/template/footer');
	}

	public function t_provinsi()
	{
		$cek = $this->db->query("SELECT * FROM tbl_provinsi where nm_provinsi='".$this->input->post('prov',TRUE)."'")->num_rows();
		if($cek <= 0){
		$data = array('nm_provinsi' => $this->input->post('prov'));
		$sql = $this->M_admin->s_provinsi($data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('admin/v_provinsi')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('admin/v_provinsi','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".base_url('admin/v_provinsi')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('admin/v_provinsi','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Provinsi Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('admin/v_provinsi').'")';
			echo '</script>';
		}
	}

	public function u_provinsi($id='')
	{
		$data['menutitle'] = 'Data Provinsi';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Ubah Data provinsi';

		$isi['isi'] = $this->M_admin->ve_provinsi($id);

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/provinsi/edit',$isi);
		$this->load->view('admin/template/footer');
	}

	public function provinsi_u($id)
	{
		$this->form_validation->set_rules('prov','Prov','required');
		if($this->form_validation->run() == TRUE){
		$data = array(
						'nm_provinsi' => $this->input->post('prov')						
					 );
		$sql = $this->M_admin->e_provinsi($id, $data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil diubah');window.location = '".base_url('admin/v_provinsi')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('admin/v_provinsi','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal diubah');window.location = '".base_url('admin/v_provinsi')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('admin/v_provinsi','refresh');
			}
		}else{
			// echo "<script>alert('Maaf Nama provinsi tidak ditemukan');window.location = '".site_url('admin/v_provinsi')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Nama provinsi tidak ditemukan');
			redirect('admin/v_provinsi','refresh');
		}
	}

	public function h_provinsi($id)
	{
		$sql = $this->M_admin->h_provinsi($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".base_url('admin/v_provinsi')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('admin/v_provinsi','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dihapus');window.location = '".base_url('admin/v_provinsi')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('admin/v_provinsi','refresh');
		}
	}
	// ---------------------------------------
	// ========================================================================================================================================
	// ======================================================== Pengaturan ====================================================================
	// ------------ Jabatan ---------------
	public function v_jabatan()
	{
		$data['menutitle'] = 'Data Jabatan';
		$data['menu'] = 'Jabatan';
		$data['submenu'] = 'Data Jabatan';

		$isi['isi'] = $this->M_admin->v_jabatan();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/jabatan/view',$isi);
		$this->load->view('admin/template/footer');
	}
	public function u_jabatan()
	{
		$data['menutitle'] = 'Data Jabatan';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Ubah Data Jabatan';

		$isi['isi'] = $this->M_admin->ve_jabatan();
		// $isi['getKab'] = $this->M_admin->get_kab();
		// $isi['getProv'] = $this->M_admin->get_prov();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/jabatan/edit',$isi);
		$this->load->view('admin/template/footer');
	}

	public function jabatan_u()
	{
		$this->form_validation->set_rules('ja1','Ja1','required');
		if($this->form_validation->run() == TRUE){
		$data = array(
						'nm_pejabat1' 		=> $this->input->post('ja1'),						
						'nm_pejabat2' 		=> $this->input->post('ja2'),						
						'nm_pejabat3' 		=> $this->input->post('ja3'),						
						'nm_pejabat4' 		=> $this->input->post('ja4'),						
						'nm_pejabat5' 		=> $this->input->post('ja5'),
						'posisi_pejabat1' 	=> $this->input->post('pj1'),						
						'posisi_pejabat2' 	=> $this->input->post('pj2'),						
						'posisi_pejabat3' 	=> $this->input->post('pj3'),						
						'posisi_pejabat4' 	=> $this->input->post('pj4'),						
						'posisi_pejabat5' 	=> $this->input->post('pj5')					
					 );
		$sql = $this->M_admin->e_jabatan($data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil diubah');window.location = '".base_url('admin/v_jabatan')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('admin/v_jabatan','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal diubah');window.location = '".base_url('admin/v_jabatan')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('admin/v_jabatan','refresh');
			}
		}else{
			// echo "<script>alert('Maaf Kode tidak ditemukan');window.location = '".site_url('admin/v_jabatan')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Kode tidak ditemukan');
			redirect('admin/v_jabatan','refresh');
		}
	}
	// ------------------------------------
	// ------------ Perusahaan ------------
	public function v_perusahaan()
	{
		$data['menutitle'] = 'Data Perusahaan';
		$data['menu'] = 'Perusahaan';
		$data['submenu'] = 'Data Perusahaan';

		$isi['isi'] = $this->M_admin->v_perusahaan();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/perusahaan/view',$isi);
		$this->load->view('admin/template/footer');
	}

	public function u_perusahaan()
	{
		$data['menutitle'] = 'Data Perusahaan';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Ubah Data Perusahaan';

		$isi['isi'] = $this->M_admin->ve_perusahaan();
		$isi['getKab'] = $this->M_admin->get_kab();
		$isi['getProv'] = $this->M_admin->get_prov();

		$this->load->view('admin/template/head');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/Perusahaan/edit',$isi);
		$this->load->view('admin/template/footer');
	}

	public function perusahaan_u()
	{
		$this->form_validation->set_rules('per','Per','required');
		if($this->form_validation->run() == TRUE){
		$data = array(
						'id_provinsi' 	=> $this->input->post('prov'),						
						'id_kabupaten' 	=> $this->input->post('kab'),						
						'nm_company' 	=> $this->input->post('per'),						
						'almt_company' 	=> $this->input->post('alamat'),						
						'telp_company' 	=> $this->input->post('telp'),						
						'fax_company' 	=> $this->input->post('fax'),						
						'email_company' => $this->input->post('email'),						
						'npwp_company' 	=> $this->input->post('npwp'),						
						'noseri_company' => $this->input->post('noseri')						
					 );
		$sql = $this->M_admin->e_perusahaan($data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil diubah');window.location = '".base_url('admin/v_perusahaan')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('admin/v_perusahaan','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal diubah');window.location = '".base_url('admin/v_perusahaan')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('admin/v_perusahaan','refresh');
			}
		}else{
			// echo "<script>alert('Maaf Nama Perusahaan tidak ditemukan');window.location = '".site_url('admin/v_perusahaan')."';</script>";
			$this->session->set_flashdata('error', 'Maaf Nama Perusahaan tidak ditemukan');
			redirect('admin/v_perusahaan','refresh');
		}
	}
	// ------------------------------------
	// ========================================================================================================================================
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */