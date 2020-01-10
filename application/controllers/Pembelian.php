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
		$data['menutitle'] = 'Dashboard';
		$data['menu'] = 'Home';
		$data['submenu'] = 'Dashboard';

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

	// ========================================================== MENU MASTER ==================================================================
	// -------------- Jenis barang --------------
	public function view_jenisbrng()
	{
		$data['menutitle'] = 'Data Jenis Barang';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Jenis Barang';

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
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
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
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Edit Jenis Barang';

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
						echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
					}else{ // Jika gagal
						echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_satuan')."';</script>";
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
			echo "<script>alert('Maaf Nama Jenis Barang tidak ditemukan');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
		}
	}

	public function h_jenisbrng($id)
	{
		$sql = $this->M_pembelian->h_jenisbrng($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".site_url('pembelian/view_jenisbrng')."';</script>";
		}
	}
	// ------------------------------------------
	// --------------- Group Barang -------------
	public function view_groupbrng()
	{
		$data['menutitle'] = 'Data Group Barang';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Group Barang';

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
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
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
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Edit Group Barang';

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
						echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
					}else{ // Jika gagal
						echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_groupbrng')."';</script>";
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
			echo "<script>alert('Maaf Group Barang tidak ditemukan');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
		}
	}

	public function h_groupbrng($id)
	{
		$sql = $this->M_pembelian->h_groupbrng($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".site_url('pembelian/view_groupbrng')."';</script>";
		}
	}
	// ------------------------------------------
	// --------------- Supplier -----------------
	public function view_supplier()
	{
		$data['menutitle'] = 'Data Supplier';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Supplier';

		$isi['isi'] = $this->M_pembelian->v_supplier();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/supplier/view',$isi);
		$this->load->view('pembelian/template/footer');
	}
	public function t_supplier()
	{
		$data['menutitle'] = 'Data Supplier';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Supplier';

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
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_supplier')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/t_supplier')."';</script>";
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
		$data['menutitle'] = 'Data Supplier';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Edit Supplier';

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
						echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_supplier')."';</script>";
					}else{ // Jika gagal
						echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/view_supplier')."';</script>";
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
			echo "<script>alert('Maaf Supplier tidak ditemukan');window.location = '".site_url('pembelian/view_supplier')."';</script>";
		}
	}
	// ------------------------------------------	
	// ----------- Metode Pembelian -------------
	public function view_metpemb()
	{
		$data['menutitle'] = 'Data Metode Pembelian';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Metode Pembelian';

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
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
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
		$data['menutitle'] = 'Data Metode Pembelian';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Edit Metode Pembelian';

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
						echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
					}else{ // Jika gagal
						echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_metpemb')."';</script>";
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
			echo "<script>alert('Maaf Metode Pembelian tidak ditemukan');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
		}
	}

	public function h_metpemb($id)
	{
		$sql = $this->M_pembelian->h_metpemb($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".site_url('pembelian/view_metpemb')."';</script>";
		}
	}
	// ------------------------------------------
	// =========================================================================================================================================
}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */