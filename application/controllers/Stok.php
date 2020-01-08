<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_stok');
	}

	public function index()
	{
		$data['menutitle'] = 'Dashboard';
		$data['menu'] = 'Home';
		$data['submenu'] = 'Dashboard';

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/template/content');
		$this->load->view('stok/template/footer');
	}
	// ======================================================== DATA MASTER ===================================================================
	// -------------- satuan Barang ------------------
	public function view_satuan()
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Satuan Barang';

		$isi['isi'] = $this->M_stok->v_satuan();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/satuan/view',$isi);
		$this->load->view('stok/template/footer');
	}

	public function t_satuan()
	{
		$cek = $this->db->query("SELECT nm_satuan FROM tbl_satuan where nm_satuan='".$this->input->post('satuan',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array ('nm_satuan' => $this->input->post('satuan'));
			$sql = $this->M_stok->s_satuan($data);

			$allsql = array($sql);
			if($allsql){ // Jika sukses
				echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('stok/view_satuan')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".base_url('stok/view_satuan')."';</script>";
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Nama Satuan Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('stok/view_satuan').'")';
			echo '</script>';
		}
	}

	public function u_satuan($id='')
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Edit Satuan Barang';

		$isi['isi'] = $this->M_stok->ve_satuan($id);

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/satuan/edit',$isi);
		$this->load->view('stok/template/footer');
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
				$sql = $this->M_stok->e_satuan($id, $data);
				$allsql = array($sql);
					if($allsql){ // Jika sukses
						echo "<script>alert('Data berhasil diubah');window.location = '".base_url('stok/view_satuan')."';</script>";
					}else{ // Jika gagal
						echo "<script>alert('Data gagal diubah');window.location = '".base_url('stok/u_satuan')."';</script>";
					}
				}else{
					echo '<script language="javascript">';
					echo 'alert("Maaf Nama Satuan Sudah Ada")';
					echo '</script>';
					echo '<script language="javascript">';
					echo 'window.location=("'.site_url('stok/view_satuan').'")';
					echo '</script>';
				}
		}else{
			echo "<script>alert('Maaf Nama Satuan tidak ditemukan');window.location = '".base_url('stok/view_satuan')."';</script>";
		}
	}

	public function h_satuan($id)
	{
		$sql = $this->M_stok->h_satuan($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".base_url('stok/view_satuan')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".base_url('stok/view_satuan')."';</script>";
		}
	}
	// ----------------------------------------------
	// -------------- Jenis Barang ------------------
	public function view_barang()
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Data Barang';

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/barang/view');
		$this->load->view('stok/template/footer');
	}
	// ----------------------------------------------
	// =========================================================================================================================================
	// =========================================================== PESANAN =====================================================================
	// ------------------ Baru ----------------------
	public function view_pesbaru()
	{
		$data['menutitle'] = 'Data Pemesanan';
		$data['menu'] = 'Pemesanan';
		$data['submenu'] = 'Pesanana Baru';

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/pesanan/baru/view');
		$this->load->view('stok/template/footer');
	}
	// ----------------------------------------------

	// =========================================================================================================================================
}

/* End of file stok.php */
/* Location: ./application/controllers/stok.php */