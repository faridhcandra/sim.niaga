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

	// ========================================================== MENU MASTER ==================================================================
	// -------------- Jenis barang --------------
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
			echo "<script>alert('Data berhasil dikonfirmasi');window.location = '".site_url('pembelian/v_verpesbaru')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal dikonfirmasi');window.location = '".site_url('pembelian/v_verpesbaru')."';</script>";
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
			echo "<script>alert('Data berhasil dikonfirmasi');window.location = '".site_url('pembelian/v_ver_pesbaru/'.$idper)."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal dikonfirmasi');window.location = '".site_url('pembelian/v_ver_pesbaru/'.$idper)."';</script>";
		}
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
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
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
			echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
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
			echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_dtl_pemb/'.$idpemb)."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/v_dtl_pemb/'.$idpemb)."';</script>";
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
				echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_dtl_pemb/'.$ids)."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_rencpemb/'.$id)."';</script>";
			}
		}
	}
	public function rencpemb_h($id)
	{
		$a = $this->M_pembelian->h_rencpemb($id);
		$b = $this->M_pembelian->h_dtlrencpemb($id);
		$all = array($a,$b);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil dihapus');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal dihapus');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
		}
	}
	// ------------------------------------------------------------
	// ----------------- Surat Pesanan Barang ---------------------
	public function v_spb()
	{
		$data['menutitle'] 	= 'Transaksi Surat Pesanan barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Surat Pesanan Barang';

		// $isi['isi'] = $this->M_pembelian->v_pembelian();

		$this->load->view('pembelian/template/head');
		$this->load->view('pembelian/template/navbar');
		$this->load->view('pembelian/template/sidebar',$data);
		$this->load->view('pembelian/surat_pesanan_barang/view');
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
	// ------------------------------------------------------------
	// ========================================================================================================================================
}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */