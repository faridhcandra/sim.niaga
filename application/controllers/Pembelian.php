<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_pembelian');
	}

	public function index()
	{
		$data['menutitle'] 	= 'Dashboard';
		$data['menu'] 		= 'Home';
		$data['submenu'] 	= 'Dashboard';

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/template/content');
		$this->load->view('pembelian/template/footer');
	}

	// ================ Get Fungsi =====================
	function get_kabupaten(){
		$id = $this->input->post('prov');
		$data = $this->M_pembelian->get_kab($id);
		echo json_encode($data);
	}
	// =================================================

	// ========================================================== MENU MASTER =================================================================
	// -------------- satuan Barang ------------------
	public function view_satuan()
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Satuan Barang';

		$isi['isi'] = $this->M_pembelian->v_satuan();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/satuan/view',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function t_satuan()
	{
		$cek = $this->db->query("SELECT nm_satuan FROM tbl_satuan where nm_satuan='".$this->input->post('satuan',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array ('nm_satuan' => $this->input->post('satuan'));
			$sql = $this->M_pembelian->s_satuan($data);

			$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_satuan')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('pembelian/view_satuan','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/view_satuan')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('pembelian/view_satuan','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Nama Satuan Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('pembelian/view_satuan').'")';
			echo '</script>';
		}
	}
	public function u_satuan($id='')
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Edit Satuan Barang';

		$isi['isi'] = $this->M_pembelian->ve_satuan($id);

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/satuan/edit',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function satuan_u($id)
	{
		$this->form_validation->set_rules('satuan','Satuan','required');
		if($this->form_validation->run() == TRUE){
			$cek = $this->db->query("SELECT nm_satuan FROM tbl_satuan where nm_satuan='".$this->input->post('satuan',TRUE)."'")->num_rows();
			if($cek <= 0){
				$data = array(
								'nm_satuan' => $this->input->post('satuan')							
							 );
				$sql = $this->M_pembelian->e_satuan($id, $data);
				$allsql = array($sql);
					if($allsql){ // Jika sukses
						// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_satuan')."';</script>";
						$this->session->set_flashdata('success', 'Data berhasil diubah');
						redirect('pembelian/view_satuan','refresh');
					}else{ // Jika gagal
						// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_satuan')."';</script>";
						$this->session->set_flashdata('error', 'Data gagal diubah');
						redirect('pembelian/view_satuan','refresh');
					}
				}else{
					echo '<script language="javascript">';
					echo 'alert("Maaf Nama Satuan Sudah Ada")';
					echo '</script>';
					echo '<script language="javascript">';
					echo 'window.location=("'.site_url('pembelian/view_satuan').'")';
					echo '</script>';
				}
		}else{
			// echo "<script>alert('Maaf Nama Satuan tidak ditemukan');window.location = '".site_url('pembelian/view_satuan')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Nama Satuan tidak ditemukan');
			redirect('pembelian/view_satuan','refresh');
		}
	}
	public function h_satuan($id)
	{
		$sql = $this->M_pembelian->h_satuan($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('pembelian/view_satuan')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('pembelian/view_satuan','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal di hapus');window.location = '".site_url('pembelian/view_satuan')."';</script>";
			$this->session->set_flashdata('error', 'Data berhasil dihapus');
			redirect('pembelian/view_satuan','refresh');
		}
	}
	// ----------------------------------------------
	// -------------- Jenis barang ------------------
	public function view_jenisbrng()
	{
		$data['menutitle'] 	= 'Data Jenis Barang';
		$data['menu'] 		= 'Data Master';
		$data['submenu'] 	= 'Jenis Barang';

		$isi['isi'] = $this->M_pembelian->v_jenisbrng();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/jenis_barang/view',$isi);
		$this->load->view('pembelian/template/footer');
	}

	public function t_jenisbrng()
	{
		$cek = $this->db->query("SELECT nm_jnsbrng FROM tbl_jenis_barang where nm_jnsbrng='".$this->input->post('jenis',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array ('nm_jnsbrng' => $this->input->post('jenis',TRUE));
			$sql = $this->M_pembelian->s_jenisbrng($data);

			$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('pembelian/view_jenisbrng','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('pembelian/view_jenisbrng','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Jenis Barang Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('pembelian/view_jenisbrng').'")';
			echo '</script>';
		}
	}

	public function u_jenisbrng($id='')
	{
		$data['menutitle'] 	= 'Edit Jenis Barang';
		$data['menu'] 		= 'Data Master';
		$data['submenu'] 	= 'Jenis Barang';

		$isi['isi'] = $this->M_pembelian->ve_jenisbrng($id);

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/jenis_barang/edit',$isi);
		$this->load->view('pembelian/template/footer');
	}

	public function jenisbrng_u($id)
	{
		$this->form_validation->set_rules('jenis','Jenis','required');
		if($this->form_validation->run() == TRUE){
			$cek = $this->db->query("SELECT nm_jnsbrng FROM tbl_jenis_barang where nm_jnsbrng='".$this->input->post('jenis',TRUE)."'")->num_rows();
			if($cek <= 0){
				$data = array(
								'nm_jnsbrng' => $this->input->post('jenis',TRUE)							
							 );
				$sql = $this->M_pembelian->e_jenisbrng($id, $data);
				$allsql = array($sql);
					if($allsql){ // Jika sukses
						// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
						$this->session->set_flashdata('success', 'Data berhasil diubah');
						redirect('pembelian/view_jenisbrng','refresh');
					}else{ // Jika gagal
						// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
						$this->session->set_flashdata('error', 'Data gagal diubah');
						redirect('pembelian/view_jenisbrng','refresh');
					}
				}else{
					echo '<script language="javascript">';
					echo 'alert("Maaf Nama Jenis Barang Sudah Ada")';
					echo '</script>';
					echo '<script language="javascript">';
					echo 'window.location=("'.site_url('pembelian/view_jenisbrng').'")';
					echo '</script>';
				}
		}else{
			// echo "<script>alert('Maaf Nama Jenis Barang tidak ditemukan');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Nama Jenis Barang tidak ditemukan');
			redirect('pembelian/view_jenisbrng','refresh');
		}
	}

	public function h_jenisbrng($id)
	{
		$sql = $this->M_pembelian->h_jenisbrng($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil di hapus');
			redirect('pembelian/view_jenisbrng','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal di hapus');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal di hapus');
			redirect('pembelian/view_jenisbrng','refresh');
		}
	}
	// ------------------------------------------
	// --------------- Group Barang -------------
	public function view_groupbrng()
	{
		$data['menutitle'] 	= 'Data Group Barang';
		$data['menu'] 		= 'Data Master';
		$data['submenu'] 	= 'Group Barang';

		$isi['isi'] = $this->M_pembelian->v_groupbrng();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/group_barang/view',$isi);
		$this->load->view('pembelian/template/footer');
	}

	public function t_groupbrng()
	{
		$cek = $this->db->query("SELECT nm_group FROM tbl_group where nm_group='".$this->input->post('group',TRUE)."'")->num_rows();
		if($cek <= 0){
		$data = array(
						'nm_group' => $this->input->post('group',TRUE),
						'rek_group' => $this->input->post('rek',TRUE)
					 );
		$sql = $this->M_pembelian->s_groupbrng($data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('pembelian/view_groupbrng','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('pembelian/view_groupbrng','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Group Barang Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('pembelian/view_groupbrng').'")';
			echo '</script>';
		}
	}

	public function u_groupbrng($id='')
	{
		$data['menutitle'] 	= 'Edit Group Barang';
		$data['menu'] 		= 'Data Master';
		$data['submenu'] 	= 'Group Barang';

		$isi['isi'] = $this->M_pembelian->ve_groupbrng($id);

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/group_barang/edit',$isi);
		$this->load->view('pembelian/template/footer');
	}

	public function groupbrng_u($id)
	{
		$this->form_validation->set_rules('group','Group','required');
		if($this->form_validation->run() == TRUE){
			$cek = $this->db->query("SELECT nm_group FROM tbl_group where nm_group='".$this->input->post('group',TRUE)."'")->num_rows();
			if($cek <= 0){
				$data = array(
								'nm_group' => $this->input->post('group',TRUE),							
								'rek_group' => $this->input->post('rek',TRUE)							
							 );
				$sql = $this->M_pembelian->e_groupbrng($id, $data);
				$allsql = array($sql);
					if($allsql){ // Jika sukses
						// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
						$this->session->set_flashdata('success', 'Data berhasil diubah');
						redirect('pembelian/view_groupbrng','refresh');
					}else{ // Jika gagal
						// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_groupbrng')."';</script>";
						$this->session->set_flashdata('error', 'Data gagal diubah');
						redirect('pembelian/view_groupbrng','refresh');
					}
				}else{
					echo '<script language="javascript">';
					echo 'alert("Maaf Nama Group Barang Sudah Ada")';
					echo '</script>';
					echo '<script language="javascript">';
					echo 'window.location=("'.site_url('pembelian/view_groupbrng').'")';
					echo '</script>';
				}
		}else{
			// echo "<script>alert('Maaf Group Barang tidak ditemukan');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Group Barang tidak ditemukan');
			redirect('pembelian/view_groupbrng','refresh');
		}
	}

	public function h_groupbrng($id)
	{
		$sql = $this->M_pembelian->h_groupbrng($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil di hapus');
			redirect('pembelian/view_groupbrng','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal di hapus');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal di hapus');
			redirect('pembelian/view_groupbrng','refresh');
		}
	}
	// ------------------------------------------
	// ----------------- Barang ---------------------
	public function view_barang()
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Data Barang';

		$isi['isi'] =  $this->M_pembelian->v_barang();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/barang/view',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function t_barang()
	{ 

		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Tambah barang';

		$isi['get_jnsbrng'] = $this->M_pembelian->get_idjenis();
		$isi['get_group'] = $this->M_pembelian->get_idgroup();
		$isi['get_satuan'] = $this->M_pembelian->get_satuan();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/barang/tambah',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function barang_t()
	{
		$cek = $this->db->query("SELECT id_barang FROM tbl_nama_barang where id_barang='".$this->input->post('id_barang',TRUE)."' OR nm_barang='".$this->input->post('nama_barang',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array ('id_barang' => $this->input->post('id_barang'),
							'id_jnsbrng' => $this->input->post('id_jnsbrng'),
							'id_group' => $this->input->post('id_group'),
							'nm_barang' => $this->input->post('nama_barang'),
							'kel_barang' => $this->input->post('kel_barang'),
							'ket_barang' => $this->input->post('ket_barang'),
							'no_barang' => $this->input->post('no_barang'),
							'sat1_barang' => $this->input->post('sat1'),
							'sat2_barang' => $this->input->post('sat2'),
							'updated_barang' => date('Y-m-d')
               				);
			$sql = $this->M_pembelian->s_barang($data);

			$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_barang')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('pembelian/view_barang','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/view_barang')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('pembelian/view_barang','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Nama Satuan Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('pembelian/view_barang').'")';
			echo '</script>';
		}
	}
	public function u_barang($id='')
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Edit Barang';

		$isi['get_jnsbrng'] = $this->M_pembelian->get_idjenis();
		$isi['get_group'] = $this->M_pembelian->get_idgroup();
		$isi['get_satuan'] = $this->M_pembelian->get_satuan();
		$isi['isi'] = $this->M_pembelian->ve_barang($id);

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/barang/edit',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function barang_u($id)
	{
		$this->form_validation->set_rules('id_barang','id_barang','required');
		if($this->form_validation->run() == TRUE){
			/*$cek = $this->db->query("SELECT id_barang FROM tbl_nama_barang where id_barang='".$this->input->post('id_barang',TRUE)."'")->num_rows();
			if($cek <= 0){*/
				$data = array(
							'id_barang' => $this->input->post('id_barang'),
							'id_jnsbrng' => $this->input->post('id_jnsbrng'),
							'id_group' => $this->input->post('id_group'),
							'nm_barang' => $this->input->post('nama_barang'),
							'kel_barang' => $this->input->post('kel_barang'),
							'ket_barang' => $this->input->post('ket_barang'),
							'no_barang' => $this->input->post('no_barang'),
							'sat1_barang' => $this->input->post('sat1'),
							'sat2_barang' => $this->input->post('sat2'),
							'updated_barang' => date('Y-m-d')							
							 );
				$sql = $this->M_pembelian->e_barang($id, $data);
				$allsql = array($sql);
				if($allsql){ // Jika sukses
					// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_barang')."';</script>";
					$this->session->set_flashdata('success', 'Data berhasil diubah');
					redirect('pembelian/view_barang','refresh');
				}else{ // Jika gagal
					// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_barang')."';</script>";
					$this->session->set_flashdata('error', 'Data gagal diubah');
					redirect('pembelian/u_barang','refresh');
				}
			/*}else{
				echo '<script language="javascript">';
				echo 'alert("Maaf Id Barang Sudah Ada")';
				echo '</script>';
				echo '<script language="javascript">';
				echo 'window.location=("'.site_url('pembelian/view_barang').'")';
				echo '</script>';
			}*/
		}else{
			// echo "<script>alert('Maaf Nama Barang tidak ditemukan');window.location = '".site_url('pembelian/view_barang')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Nama Barang tidak ditemukan');
			redirect('pembelian/view_barang','refresh');
		}
	}
	public function h_barang($id)
	{
		$sql = $this->M_pembelian->h_barang($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('pembelian/view_barang')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('pembelian/view_barang','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal di hapus');window.location = '".site_url('pembelian/view_barang')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('pembelian/u_barang','refresh');
		}
	}
	// ----------------------------------------------
	// --------------- Supplier -----------------
	public function view_supplier()
	{
		$data['menutitle'] 	= 'Data Supplier';
		$data['menu'] 		= 'Data Master';
		$data['submenu'] 	= 'Supplier';

		$isi['isi'] = $this->M_pembelian->v_supplier();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/supplier/view',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function t_supplier()
	{
		$data['menutitle'] 	= 'Tambah Supplier';
		$data['menu'] 		= 'Data Master';
		$data['submenu'] 	= 'Supplier';

		$isi['get_prov'] = $this->M_pembelian->get_prov();
		// $isi['isi'] = $this->M_pembelian->ve_metpem($id);

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/supplier/tambah',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function supplier_t()
	{
		$cek = $this->db->query("SELECT id_supplier FROM tbl_supplier where id_supplier='".$this->input->post('kode',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array( 'id_supplier' 		=> $this->input->post('kode',TRUE),
							'nm_supplier' 		=> $this->input->post('nama',TRUE),
							'notelp_supplier' 	=> $this->input->post('telp',TRUE),
							'fax_supplier' 		=> $this->input->post('fax',TRUE),
							'id_provinsi' 		=> $this->input->post('prov',TRUE),
							'id_kabupaten' 		=> $this->input->post('kab',TRUE),
							'almt_supplier' 	=> $this->input->post('alamat',TRUE),
							'email_supplier' 	=> $this->input->post('email',TRUE),
							'attn_supplier' 	=> $this->input->post('attn',TRUE),
							'npwp_supplier' 	=> $this->input->post('npwp',TRUE)
							/*'telppim_supplier' 	=> $this->input->post('telp_pim',TRUE),
							'nmcp_supplier' 	=> $this->input->post('nama_cp',TRUE),
							'almtcp_supplier' 	=> $this->input->post('almt_cp',TRUE),
							'telpcp_supplier' 	=> $this->input->post('telp_cp',TRUE)*/							
						 );
			$sql = $this->M_pembelian->s_supplier($data);
			$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_supplier')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('pembelian/view_supplier','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/t_supplier')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('pembelian/view_supplier','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode Supplier Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('pembelian/view_supplier').'")';
			echo '</script>';
		}
	}
	public function u_supplier($id='')
	{
		$data['menutitle'] 	= 'Edit Supplier';
		$data['menu'] 		= 'Data Master';
		$data['submenu'] 	= 'Supplier';

		$isi['isi'] = $this->M_pembelian->ve_supplier($id);
		$isi['get_prov'] = $this->M_pembelian->get_prov();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/supplier/edit',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function supplier_u($id)
	{
		$this->form_validation->set_rules('kode','Kode','required');
		if($this->form_validation->run() == TRUE){
			/*$cek = $this->db->query("SELECT nm_supplier FROM tbl_supplier where nm_supplier='".$this->input->post('metode',TRUE)."'")->num_rows();
			if($cek <= 0){*/
				$data = array(	'id_supplier' 		=> $this->input->post('kode',TRUE),
								'nm_supplier' 		=> $this->input->post('nama',TRUE),
								'notelp_supplier' 	=> $this->input->post('telp',TRUE),
								'fax_supplier' 		=> $this->input->post('fax',TRUE),
								'id_provinsi' 		=> $this->input->post('prov',TRUE),
								'id_kabupaten' 		=> $this->input->post('kab',TRUE),
								'almt_supplier' 	=> $this->input->post('alamat',TRUE),
								'email_supplier'	=> $this->input->post('email',TRUE),
								'attn_supplier' 	=> $this->input->post('attn',TRUE),
								'npwp_supplier' 	=> $this->input->post('npwp',TRUE)
							 );
				$sql = $this->M_pembelian->e_supplier($id, $data);
				$allsql = array($sql); 
					if($allsql){ // Jika sukses
						// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_supplier')."';</script>";
						$this->session->set_flashdata('success', 'Data berhasil diubah');
						redirect('pembelian/view_supplier','refresh');
					}else{ // Jika gagal
						// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/view_supplier')."';</script>";
						$this->session->set_flashdata('error', 'Data gagal diubah');
						redirect('pembelian/view_supplier','refresh');
					}
				/*}else{
					echo '<script language="javascript">';
					echo 'alert("Maaf Nmaa Supplier Sudah Ada")';
					echo '</script>';
					echo '<script language="javascript">';
					echo 'window.location=("'.site_url('pembelian/view_metpemb').'")';
					echo '</script>';
				}*/
		}else{
			// echo "<script>alert('Maaf Supplier tidak ditemukan');window.location = '".site_url('pembelian/view_supplier')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Supplier tidak ditemukan');
			redirect('pembelian/view_supplier','refresh');
		}
	}
	// ------------------------------------------	
	// ----------- Metode Pembelian -------------
	public function view_metpemb()
	{
		$data['menutitle'] 	= 'Data Metode Pembelian';
		$data['menu'] 		= 'Data Master';
		$data['submenu'] 	= 'Metode Pembelian';

		$isi['isi'] = $this->M_pembelian->v_metpemb();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/metode_pembelian/view',$isi);
		$this->load->view('pembelian/template/footer');
	}

	public function t_metpemb()
	{
		$cek = $this->db->query("SELECT nm_metbyr FROM tbl_metode_bayar where nm_metbyr='".$this->input->post('metode',TRUE)."'")->num_rows();
		if($cek <= 0){
		$data = array('nm_metbyr' => $this->input->post('metode',TRUE));
		$sql = $this->M_pembelian->s_metpemb($data);
		$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('pembelian/view_metpemb','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('pembelian/view_metpemb','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Metode Pembelian Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('pembelian/view_metpemb').'")';
			echo '</script>';
		}
	}

	public function u_metpemb($id='')
	{
		$data['menutitle'] 	= 'Edit Metode Pembelian';
		$data['menu'] 		= 'Data Master';
		$data['submenu'] 	= 'Metode Pembelian';

		$isi['isi'] = $this->M_pembelian->ve_metpem($id);

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/metode_pembelian/edit',$isi);
		$this->load->view('pembelian/template/footer');
	}

	public function metpemb_u($id)
	{
		$this->form_validation->set_rules('metode','Metode','required');
		if($this->form_validation->run() == TRUE){
			$cek = $this->db->query("SELECT nm_metbyr FROM tbl_metode_bayar where nm_metbyr='".$this->input->post('metode',TRUE)."'")->num_rows();
			if($cek <= 0){
				$data = array('nm_metbyr' => $this->input->post('metode',TRUE));
				$sql = $this->M_pembelian->e_metpemb($id, $data);
				$allsql = array($sql); 
					if($allsql){ // Jika sukses
						// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
						$this->session->set_flashdata('success', 'Data berhasil diubah');
						redirect('pembelian/view_metpemb','refresh');
					}else{ // Jika gagal
						// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
						$this->session->set_flashdata('error', 'Data gagal diubah');
						redirect('pembelian/view_metpemb','refresh');
					}
				}else{
					echo '<script language="javascript">';
					echo 'alert("Maaf Metode Pembelian Sudah Ada")';
					echo '</script>';
					echo '<script language="javascript">';
					echo 'window.location=("'.site_url('pembelian/view_metpemb').'")';
					echo '</script>';
				}
		}else{
			// echo "<script>alert('Maaf Metode Pembelian tidak ditemukan');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Metode Pembelian tidak ditemukan');
			redirect('pembelian/view_metpemb','refresh');
		}
	}

	public function h_metpemb($id)
	{
		$sql = $this->M_pembelian->h_metpemb($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('pembelian/view_metpemb','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal di hapus');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('pembelian/view_metpemb','refresh');
		}
	}
	// ------------------------------------------
	// ========================================================================================================================================

	// ======================================================== Verifikasi Data ===============================================================
	// --------------------- Pesanan Baru -------------------------
	public function v_verpesbaru()
	{
		$data['menutitle'] 	= 'Verifikasi Data Pesanan';
		$data['menu'] 		= 'Verifilkasi';
		$data['submenu'] 	= 'Pesanan Baru';

		$isi['isi'] = $this->M_pembelian->v_verpesbar();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/pesanan_baru/view',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function v_ver_pesbaru($id)
	{
		$data['menutitle'] 	= 'Detail Data Pesanan';
		$data['menu'] 		= 'Verifikasi';
		$data['submenu'] 	= 'Verifikasi Detail Pesanan';

		$isi['judul'] = $this->M_pembelian->v_ver_idpesbar($id);
		$isi['isi'] = $this->M_pembelian->v_ver_dtlpesbar($id);

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/pesanan_baru/view_detail',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function v_ver_konfirmasi($id)
	{
		$id 	= $this->input->post('kode');
		$verif 	= $this->input->post('verif');

		$data 	= array('selesai_minta' => $verif);
		$sql 	= $this->M_pembelian->v_ver_konfirmasi($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dikonfirmasi');window.location = '".site_url('pembelian/v_verpesbaru')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dikonfirmasi');
			redirect('pembelian/v_verpesbaru','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dikonfirmasi');window.location = '".site_url('pembelian/v_verpesbaru')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dikonfirmasi');
			redirect('pembelian/v_verpesbaru','refresh');
		}
	}
	public function ver_konfirmasi($id)
	{
		$id 	= $this->input->post('kode');
		$verif 	= $this->input->post('verif');
		$idper 	= $this->input->post('kode_permin');

		$data 	= array('selesai_dtl_minta' => $verif);
		$sql 	= $this->M_pembelian->ver_konfirmasi($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dikonfirmasi');window.location = '".site_url('pembelian/v_ver_pesbaru/'.$idper)."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dikonfirmasi');
			redirect('pembelian/v_ver_pesbaru/'.$idper,'refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dikonfirmasi');window.location = '".site_url('pembelian/v_ver_pesbaru/'.$idper)."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dikonfirmasi');
			redirect('pembelian/v_ver_pesbaru/'.$idper,'refresh');
		}
	}
	// ------------------------------------------------------------
	// ----------------------- Stok Barang ------------------------
	public function v_stok()
	{
		$data['menutitle'] = 'Data Stok Barang';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Stok Barang';

		$isi['isi'] = $this->M_pembelian->v_stok();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/stok_barang/view',$isi);
		$this->load->view('pembelian/template/footer');
	}
	// ------------------------------------------------------------
	// ========================================================================================================================================

	// ========================================================== Data Transaksi ==============================================================
	// ----------------------- Rencana Pembelian ------------------
	public function v_pembelian()
	{
		$data['menutitle'] 	= 'Transaksi Pembelian';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Renc. Pembelian';

		$isi['isi'] = $this->M_pembelian->v_pembelian();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/pembelian/view',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function t_pembelian()
	{
		$data['menutitle'] 	= 'Tambah Transaksi Pembelian';
		$data['menu'] 		= 'Pembelian';
		$data['submenu'] 	= 'Renc. Pembelian';

		$isi['kode'] = $this->M_pembelian->k_pembelian();
		$isi['get_mint'] = $this->M_pembelian->get_pembpes();
		$isi['get_dtlmint'] = $this->M_pembelian->get_pembdtlpes('');

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/pembelian/tambah',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function pembelian_t()
	{
		$cek = $this->db->query("SELECT * FROM tbl_pembelian where nota_beli='".$this->input->post('nopesbaru', TRUE)."' ")->num_rows();
		if($cek <= 0){
			$kd 		= $this->input->post('kode');
			$notabeli 	= $this->input->post('nobeli');
			$tglbeli 	= $this->input->post('tglbeli');
			$ket 		= $this->input->post('ket');
			$idpes 		= $this->input->post('idpes');
			$idunit 	= $this->input->post('idunit');
			$idbag 		= $this->input->post('idbag');
			$iddtlpes 	= $this->input->post('iddtlpes');
			$idbrng 	= $this->input->post('idbrng');
			$jmlpes 	= $this->input->post('jmlpes');
			$jmlrenbeli = $this->input->post('jmlrenbeli');
			$hrgrencbeli = $this->input->post('hrgrencbeli');
			$tglrenc 	= $this->input->post('tglrenc');
			$sungbeli 	= $this->input->post('sungbeli');
			$ketdtlbeli = $this->input->post('ketdtlbeli');
			// sub beli
			$subpemb 	= $this->input->post('subpemb');
			$subppnpemb = $this->input->post('subppnpemb');
			$subtotpemb = $this->input->post('subtotpemb');
			// total beli
			$subtotal 	= $this->input->post('subrencbeli');
			$ppn 		= $this->input->post('ppnrencbeli');
			$total 		= $this->input->post('totrencbeli');

			$data1 = array(
							'id_pembelian' 	=> $kd,
							'id_permintaan' => $idpes,
							'id_bagian' 	=> $idbag,
							'id_unit' 		=> $idunit,
							'nota_beli' 	=> $notabeli,
							'tgl_beli' 		=> $tglbeli,
							'ppn_beli' 		=> $ppn,
							'total_beli'	=> $subtotal,
							'ket_beli'		=> $ket,
							'totalhrg_beli' => $total
			);
			$sql1 = $this->M_pembelian->s_pembelian($data1);

			$data2 = array();
			$i = 0;
			if(is_array($iddtlpes)){
				foreach ($iddtlpes as $datadtlpes) {
					array_push($data2, array(
						'id_pembelian' 		=> $kd,
						'id_dtl_permintaan' => $datadtlpes,
						'id_barang' 		=> $idbrng[$i],
						'nota_dtl_beli' 	=> $notabeli,
						'jml_dtl_minta' 	=> $jmlpes[$i],
						'ppn_dtl_beli' 		=> $subppnpemb[$i],
						'total_dtl_beli' 	=> $subpemb[$i],
						'totalhrg_dtl_beli' => $subtotpemb[$i],
						'tgl_renc_beli' 	=> $tglrenc[$i],
						'jml_renc_beli' 	=> $jmlrenbeli[$i],
						'hrg_renc_beli' 	=> $hrgrencbeli[$i],
						'ket_dtl_beli'		=> $ketdtlbeli[$i],
						'langsung_beli'		=> $sungbeli[$i]
					));
					$i++;
				}
			}
			$sql2 = $this->M_pembelian->s_dtl_pembelian_batch($data2);

			$allsql = array($sql1,$sql2);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('pembelian/v_pembelian','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('pembelian/v_pembelian','refresh');
			}

		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf No Pembelian Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('pembelian/v_pembelian').'")';
			echo '</script>';
		}
	}
	public function v_dtl_pemb($id)
	{
		$data['menutitle'] 	= 'Detail Data Renc. Pembelian';
		$data['menu'] 		= 'Renc. Pembelian';
		$data['submenu'] 	= 'Renc. Pembelian';

		$isi['judul'] = $this->M_pembelian->v_dtl_idpemb($id);
		$isi['isi'] = $this->M_pembelian->v_dtl_pemb($id);
		$isi['get_rppemb'] = $this->M_pembelian->get_rppemb($id);		

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/pembelian/view_detail',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function v_konfpemb($id)
	{
		$id 	= $this->input->post('kode');
		$ubah 	= $this->input->post('ubah');

		$data 	= array('selesai_beli' => $ubah);
		$sql 	= $this->M_pembelian->v_konfpemb($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('pembelian/v_pembelian','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal diubah');
			redirect('pembelian/v_pembelian','refresh');
		}
	}
	public function v_dtl_konfpemb($id)
	{
		$id 	= $this->input->post('kode');
		$ubah 	= $this->input->post('ubah');
		$idpemb = $this->input->post('kode_permin');

		$data 	= array('langsung_beli' => $ubah);
		$sql 	= $this->M_pembelian->v_dtl_konfpemb($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_dtl_pemb/'.$idpemb)."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('pembelian/v_dtl_pemb/'.$idpemb,'refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/v_dtl_pemb/'.$idpemb)."';</script>";
			$this->session->set_flashdata('error', 'Data gagal diubah');
			redirect('pembelian/v_dtl_pemb/'.$idpemb,'refresh');
		}
	}
	public function u_rencpemb($id='')
	{
		$data['menutitle'] 	= 'Edit Renc. Pembelian';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Renc. Pembelian';

		$isi['isi'] = $this->M_pembelian->ve_rencpemb($id);
		$isi['get_mint'] = $this->M_pembelian->get_pembpes();
		$isi['get_dtlmint'] = $this->M_pembelian->get_pembdtlpes();
		
		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/pembelian/edit',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function rencoemb_u($id)
	{
		$this->form_validation->set_rules('kdpemb','Kdpemb','required');
		if($this->form_validation->run() == TRUE){
			$ids  			= $this->input->post('kdpemb');
			$nobeli 		= $this->input->post('nobeli');
			$tglbeli 		= $this->input->post('tglbeli');
			$ket  			= $this->input->post('ket');
			// $id2  			= $this->input->post('iddtlpes');
			$idbrng  		= $this->input->post('idbrng');
			$jmlpes  		= $this->input->post('jmlpes');
			$jmlrencbeli  	= $this->input->post('jmlrencbeli');
			$hrgrencbeli  	= $this->input->post('hrgrencbeli');
			$tglrenc  		= $this->input->post('tglrenc');
			$subpemb  		= $this->input->post('subpemb');
			$subppnpemb  	= $this->input->post('subppnpemb');
			$subtotpemb  	= $this->input->post('subtotpemb');
			$ketdtlbeli  	= $this->input->post('ketdtlbeli');

			$sql2 = $this->M_pembelian->e_rencpemb($ids,$id,$subppnpemb,$subpemb,$subtotpemb,$nobeli,$tglbeli,$ket);
			$data1 = array( 'id_dtl_permintaan' => $id,
						    'id_barang' 		=> $idbrng,
						    'jml_dtl_minta' 	=> $jmlpes,
						    'tgl_renc_beli' 	=> $tglrenc,
						    'jml_renc_beli' 	=> $jmlrencbeli,
						    'hrg_renc_beli' 	=> $hrgrencbeli,
						    'ppn_dtl_beli' 		=> $subppnpemb,
						    'total_dtl_beli' 	=> $subpemb,
						    'totalhrg_dtl_beli'	=> $subtotpemb,
						    'ket_dtl_beli' 		=> $ketdtlbeli 
						  );
			$sql1 = $this->M_pembelian->e_dtlrencpemb($id,$data1);

			$allsql = array($sql1,$sql2); 
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_dtl_pemb/'.$ids)."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('pembelian/v_dtl_pemb/'.$ids,'refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_rencpemb/'.$id)."';</script>";
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('pembelian/u_rencpemb/'.$id,'refresh');
			}
		}
	}
	public function rencpemb_h($id)
	{
		$a = $this->M_pembelian->h_rencpemb($id);
		$b = $this->M_pembelian->h_dtlrencpemb($id);
		$all = array($a,$b);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('pembelian/v_pembelian','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dihapus');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('pembelian/v_pembelian','refresh');
		}
	}
	// ------------------------------------------------------------
	// ----------------- Surat Pesanan Barang ---------------------
	public function v_spb()
	{
		$data['menutitle'] 	= 'Transaksi Surat Pesanan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Surat Pesanan Barang';

		$isi['isi'] = $this->M_pembelian->v_spb();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/surat_pesanan_barang/view',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function t_spb()
	{
		$data['menutitle'] 	= 'Tambah Surat Pesanan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Surat Pesanan Barang';

		$isi['kode'] = $this->M_pembelian->k_spb();
		$isi['get_supplier'] = $this->M_pembelian->get_supplier();
		$isi['get_rencpemb'] = $this->M_pembelian->get_rencpemb();
		$company = $this->M_pembelian->get_company();
		foreach ($company as $row) {
			$get_company = $row->nm_company;
		}
		$isi['get_company'] = $get_company;

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/surat_pesanan_barang/tambah',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function v_dtl_spb($id)
	{
		$data['menutitle'] 	= 'Detail Data Surat Pesanan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Surat Pesanan Barang';

		$isi['judul'] = $this->M_pembelian->v_dtl_idspb($id);
		$isi['isi'] = $this->M_pembelian->v_dtl_spb($id);
		$isi['get_rpspb'] = $this->M_pembelian->get_rpspb($id);
		$get_id = $this->M_pembelian->v_dtl_spb($id);
		foreach ($get_id as $s) {
			$id_ne = $s->id_spb;
		}
		$isi['get_idspb'] = $s->id_spb;

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/surat_pesanan_barang/view_detail',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function spb_t()
	{
		$cek = $this->db->query("SELECT * FROM tbl_spb where nota_spb='".$this->input->post('nospb', TRUE)."' ")->num_rows();
		if($cek <= 0){

			$nospb 			= $this->input->post('nospb');
			$kode 			= $this->input->post('kode');
			$tglspb 		= $this->input->post('tglspb');
			$kurs 			= $this->input->post('kurs');
			$kdlever 		= $this->input->post('kdlever');
			$tglserah 		= $this->input->post('tglserah');
			$ketserah 		= $this->input->post('ketserah');
			$haribayar 		= $this->input->post('haribayar');
			$ketbayar 		= $this->input->post('ketbayar');
			$ketgudang 		= $this->input->post('ketgudang');
			$ketspb 		= $this->input->post('ketspb');
			// detail 
			$kdrencbel 		= $this->input->post('kddtlrenc');
			$nobeli 		= $this->input->post('nobeli');
			$kdbrng 		= $this->input->post('kdbrng');
			$harga 			= $this->input->post('harga');			
			$jumlah 		= $this->input->post('jml');			
			$satuan 		= $this->input->post('sat');	
			// sub beli
			$subtotal 		= $this->input->post('subtotal');			
			$subppn 		= $this->input->post('subppn');			
			$subtothrg 		= $this->input->post('subtotahrg');
			// total beli
			$total 			= $this->input->post('total');
			$ppn 			= $this->input->post('ppn');
			$totalharga 	= $this->input->post('tatalharga');

			$data1 = array(
							'id_spb' 			=> $kode,
							'nota_spb' 			=> $nospb,
							'tgl_spb' 			=> $tglspb,
							'id_supplier' 		=> $kdlever,
							'total_spb' 		=> $total,
							'ppn_spb' 			=> $ppn,
							'totalharga_spb' 	=> $totalharga,
							'kurs_spb'			=> $kurs,
							'tgl_serahspb'		=> $tglserah,
							'ket_serahspb' 		=> $ketserah,
							'haribayar_spb' 	=> $haribayar,
							'ket_bayar' 		=> $ketbayar,
							'ket_gudangspb' 	=> $ketgudang,
							'ket_spb' 			=> $ketspb
			);
			$sql1 = $this->M_pembelian->s_spb($data1);

			$data2 = array();
			$i = 0;
			if(is_array($kdrencbel)){
				foreach ($kdrencbel as $datakdrencbel) {
					array_push($data2, array(
						'id_spb' 			=> $kode,
						'nota_dtl_spb' 		=> $nospb,
						'tgl_dtl_spb' 		=> $tglspb,
						'id_barang' 		=> $kdbrng[$i],
						'jmlbrng_spb' 		=> $jumlah[$i],
						'satuanbrng_spb' 	=> $satuan[$i],
						'hargabrng_spb' 	=> $harga[$i],
						'dtltotal_spb' 		=> $subtotal[$i],
						'dtlppn_spb' 		=> $subppn[$i],
						'dtltotalhrg_spb' 	=> $subtothrg[$i],
						'kurs_dtl_spb' 		=> $kurs,
						'id_dtl_pembelian'	=> $datakdrencbel,
						'nota_beli'			=> $nobeli[$i]
					));
					$i++;
				}
			}
			$sql2 = $this->M_pembelian->s_dtl_spb_batch($data2);

			$allsql = array($sql1,$sql2);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/v_spb')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('pembelian/v_spb','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/v_spb')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('pembelian/v_spb','refresh');
			}

		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf No Surat Pesanan Barang Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('pembelian/v_spb').'")';
			echo '</script>';
		}
	}
	public function v_dtl_konfspb($id)
	{
		$id 	= $this->input->post('kode');
		$ubah 	= $this->input->post('ubah');
		$idspb 	= $this->input->post('kode_spb');

		$data 	= array('selesai_dtl_spb' => $ubah);
		$sql 	= $this->M_pembelian->v_dtl_konfspb($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_dtl_spb/'.$idspb)."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('pembelian/v_dtl_spb/'.$idspb,'refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/v_dtl_spb/'.$idspb)."';</script>";
			$this->session->set_flashdata('error', 'Data gagal diubah');
			redirect('pembelian/v_dtl_spb/'.$idspb,'refresh');
		}
	}
	public function u_nospb($id='')
	{
		$data['menutitle'] 	= 'Edit Surat Pesanan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Surat Pesanan barang';

		$isi['isi'] = $this->M_pembelian->ve_nospb($id);
		$isi['get_supplier'] = $this->M_pembelian->get_supplier();
		$company = $this->M_pembelian->get_company();
		foreach ($company as $row) {
			$get_company = $row->nm_company;
		}
		$isi['get_company'] = $get_company;
		
		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/surat_pesanan_barang/edit_nospb',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function nospb_u($id)
	{
		$this->form_validation->set_rules('kode','Kode','required');
		if($this->form_validation->run() == TRUE){
			$data = array(	'nota_spb' 		=> $this->input->post('nospb',TRUE),
							'tgl_spb' 		=> $this->input->post('tglspb',TRUE),
							'id_supplier' 	=> $this->input->post('kdlever',TRUE),
							'kurs_spb' 		=> $this->input->post('kurs',TRUE),
							'tgl_serahspb' 	=> $this->input->post('tglserah',TRUE),
							'ket_serahspb' 	=> $this->input->post('ketserah',TRUE),
							'haribayar_spb' => $this->input->post('haribayar',TRUE),
							'ket_bayar'		=> $this->input->post('ketbayar',TRUE),
							'ket_gudangspb' => $this->input->post('ketgudang',TRUE),
							'ket_spb' 		=> $this->input->post('ketspb',TRUE)
						 );
			$sql = $this->M_pembelian->e_nospb($id, $data);
			
			$data2 = array( 'nota_dtl_spb'	=> $this->input->post('nospb',TRUE),
							'tgl_dtl_spb' 	=> $this->input->post('tglspb',TRUE),
							'kurs_dtl_spb' 	=> $this->input->post('kurs',TRUE)
						  );
			$sql2 = $this->M_pembelian->e_dtl_nospb($id,$data2);

			$allsql = array($sql,$sql2); 
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_dtl_spb/'.$id)."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('pembelian/v_dtl_spb/'.$id,'refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_nospb/'.$id)."';</script>";
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('pembelian/u_nospb/'.$id,'refresh');
			}
		}else{
			// echo "<script>alert('Maaf SPB tidak ditemukan');window.location = '".site_url('pembelian/v_spb')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf SPB tidak ditemukan');
			redirect('pembelian/v_spb','refresh');
		}
	}
	public function u_spb($id='')
	{
		$data['menutitle'] 	= 'Edit Surat Pesanan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Surat Pesanan barang';

		$isi['isi'] = $this->M_pembelian->ve_spb($id);
		$isi['get_supplier'] = $this->M_pembelian->get_supplier();
		$isi['get_rencpemb'] = $this->M_pembelian->get_rencpemb();
		$company = $this->M_pembelian->get_company();
		foreach ($company as $row) {
			$get_company = $row->nm_company;
		}
		$isi['get_company'] = $get_company;
		
		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/surat_pesanan_barang/edit',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function spb_u($id)
	{
		$this->form_validation->set_rules('kddtlrenc','Kddtlrenc','required');
		if($this->form_validation->run() == TRUE){

			$idspb 	= $this->input->post('spb',TRUE);
			$sub 	= $this->input->post('subtotal',TRUE);
			$ppn 	= $this->input->post('subppn',TRUE);
			$total 	= $this->input->post('subtotahrg',TRUE);
			
			$sql2 	= $this->M_pembelian->e_spb($idspb,$id,$ppn,$sub,$total);

			$data = array(	'id_barang' 		=> $this->input->post('kdbrng',TRUE),
							'jmlbrng_spb' 		=> $this->input->post('jml',TRUE),
							'satuanbrng_spb' 	=> $this->input->post('sat',TRUE),
							'hargabrng_spb' 	=> $this->input->post('harga',TRUE),
							'dtltotal_spb' 		=> $this->input->post('subtotal',TRUE),
							'dtlppn_spb' 		=> $this->input->post('subppn',TRUE),
							'dtltotalhrg_spb' 	=> $this->input->post('subtotahrg',TRUE),
							'id_dtl_pembelian'	=> $this->input->post('kddtlrenc',TRUE),
							'nota_beli' 		=> $this->input->post('nobeli',TRUE)
						 );
			$sql = $this->M_pembelian->e_dtl_spb($id, $data);

			$allsql = array($sql,$sql2); 
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_dtl_spb/'.$idspb)."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('pembelian/v_dtl_spb/'.$idspb,'refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_nospb/'.$id)."';</script>";
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('pembelian/u_nospb/'.$id,'refresh');
			}
		}else{
			// echo "<script>alert('Maaf Detail SPB tidak ditemukan');window.location = '".site_url('pembelian/v_spb')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Detail SPB tidak ditemukan');
			redirect('pembelian/v_spb','refresh');
		}
	}
	public function spb_h($id)
	{
		$a = $this->M_pembelian->h_spb($id);
		$b = $this->M_pembelian->h_dtlspb($id);
		$all = array($a,$b);
		if($all){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".site_url('pembelian/v_spb')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('pembelian/v_spb','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dihapus');window.location = '".site_url('pembelian/v_spb')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('pembelian/v_spb','refresh');
		}
	}
	// ------------------------------------------------------------
	// -------------- Nota Penerimaan Barang (NPB)-----------------
	public function v_npb()
	{
		$data['menutitle'] 	= 'Transaksi Nota Penerimaan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Nota Penerimaan Barang';

		$isi['isi'] = $this->M_pembelian->v_npb();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/nota_penerimaan_barang/view',$isi);
		$this->load->view('pembelian/template/footer');
	}
	
	public function u_npb($id='')
	{
		$data['menutitle'] 	= 'Edit Nota Penerimaan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Nota Penerimaan Barang';

		$isi['isi'] = $this->M_pembelian->ve_npb($id);
		$isi['isi_detail'] = $this->M_pembelian->ve_detl_npb($id);
		$isi['get_spb'] = $this->M_pembelian->get_spbnpb();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/nota_penerimaan_barang/edit',$isi);
		$this->load->view('pembelian/template/footer');
	}

	public function npb_u($id)
	{
		$this->form_validation->set_rules('kode','Kode','required');
		if($this->form_validation->run() == TRUE){

			// Table utama penerimaan
			// $idnpb 		= $this->input->post('kode');
			$jnskurs 	= $this->input->post('kurs');
			$jmlkurs 	= $this->input->post('jmlkurs');
			$lunas 		= $this->input->post('pelunasan');
			$kdspb 		= $this->input->post('kdspb');
			$nospb 		= $this->input->post('nospb');
			$hrjt 		= $this->input->post('hrijt');
			$tgljt 		= $this->input->post('tgljt');
			$ket 		= $this->input->post('ket');
			$byangkut 	= $this->input->post('byangkut');
			$subasing 	= $this->input->post('subtotasing');
			$subrp 		= $this->input->post('subtotrp');
			$appnasing 	= $this->input->post('ppnasing');
			$appnrp		= $this->input->post('ppnrp');
			$totaasing 	= $this->input->post('totasing');
			$totrp 		= $this->input->post('totrp');

			// Table Detail Penerimaan 
			$id_dtlterima 	= $this->input->post('dtl_idterima');
			// $hrgasing 		= $this->input->post('dtl_hargaasing');
			$hrgrp 			= $this->input->post('dtl_hargarp');
			$jml1 			= $this->input->post('dtl_jml1');
			$sat1 			= $this->input->post('dtl_sat1');
			$jml2 			= $this->input->post('dtl_jml2');
			$sat2 			= $this->input->post('dtl_sat2');
			$jmlasing 		= $this->input->post('dtl_jmlasing');
			$jmlrp 			= $this->input->post('dtl_jmlrp');
			$ppnasing 		= $this->input->post('dtl_ppnasing');
			$ppnrp 			= $this->input->post('dtl_ppnrp');
			$byangkut_dtl 	= $this->input->post('dtl_angkut');
			$tothrgasing 	= $this->input->post('dtl_tothrgasing');
			$tothrgrp 		= $this->input->post('dtl_tothrgrp');

			$totjmlasing 	= $subasing!= null?$subasing : 0;
			$totjmlrp		= $subrp!= null?$subrp : 0;
			$totppnasing 	= $appnasing!= null?$appnasing : 0;
			$totppnrp 		= $appnrp!= null?$appnrp : 0;
			$totangkut		= $byangkut!= null?$byangkut : 0;
			$totasinghrg	= $totaasing!= null?$totaasing : 0;
			$totrphrg		= $totrp!= null?$totrp : 0;
			$tgljtnya 		= $tgljt!= null? $tgljt : "0000-00-00";

			$sql1 = $this->M_pembelian->e_npb($id,$jnskurs,$jmlkurs,$lunas,$kdspb,$nospb,$hrjt,$tgljtnya,$ket,$totangkut,$totjmlrp,$totppnrp,$totrphrg,$totjmlasing,$totppnasing,$totasinghrg);

			$data2 = array();
			
			for ($i=0; $i < sizeof($id_dtlterima); $i++) { 
				$data2[] = array(  'id_dtl_penerimaan' 		=> $id_dtlterima[$i],
								   /*'' => $hrgasing[$i],*/
								   'harga_dtlterima' 		=> $hrgrp[$i],
								   'jml1_dtlterima' 		=> $jml1[$i],
								   'sat1_dtlterima' 		=> $sat1[$i],
								   'jml2_dtlterima' 		=> $jml2[$i],
								   'sat2_dtlterima' 		=> $sat2[$i],
								   'k_subtotal_dtlterima' 	=> $jmlasing[$i],
								   'subtotal_dtlterima' 	=> $jmlrp[$i],
								   'k_ppn_dtlterima' 		=> $ppnasing[$i],
								   'ppn_dtlterima' 			=> $ppnrp[$i],
								   'angkut_dtlterima' 		=> $byangkut_dtl[$i],
								   'k_totalharga_dtlterima' => $tothrgasing[$i],
								   'totalharga_dtlterima' 	=> $tothrgrp[$i]
				);
			}		

			$sql2 = $this->db->update_batch('tbl_dtl_penerimaan', $data2, 'id_dtl_penerimaan');

			$allsql = array($sql1,$sql2); 
			if($allsql){ // Jika sukses
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('pembelian/v_npb','refresh');
			}else{ // Jika gagal
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('pembelian/v_npb','refresh');
			}

		}else{
			$this->session->set_flashdata('warning', 'Maaf Detail NPB tidak ditemukan');
			redirect('pembelian/v_npb','refresh');
		}
	}
	public function v_konfnpb($id)
	{
		$id 	= $this->input->post('kode');
		$ubah 	= $this->input->post('ubah');

		$data 	= array('verif_terima' => $ubah);
		$sql 	= $this->M_pembelian->v_konfnpb($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil Terverifikasi');
			redirect('pembelian/v_npb','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal Terverivikasi');
			redirect('pembelian/v_npb','refresh');
		}
	}

	// ------------------------------------------------------------
	// ========================================================================================================================================
}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */