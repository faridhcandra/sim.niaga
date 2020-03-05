<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_gudang');
	}

	public function index()
	{
		$data['menutitle'] = 'Dashboard';
		$data['menu'] = 'Home';
		$data['submenu'] = 'Dashboard';

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/template/content');
		$this->load->view('gudang/template/footer');
	}
	// ======================================================== DATA MASTER ===================================================================
	// ------------------- kode Rekening Akuntansi -----------------
	public function v_koderekakt()
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Kode Rekening Akuntansi';

		$isi['isi'] = $this->M_gudang->v_koderekakt();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/kode_rekening/view',$isi);
		$this->load->view('gudang/template/footer');
	}
	public function koderekakt_t()
	{
		$cek = $this->db->query("SELECT id_rekening,nm_rekening FROM tbl_rekening where id_rekening='".$this->input->post('kode',TRUE)."' OR nm_rekening='".$this->input->post('nama',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array (	'id_rekening' => $this->input->post('kode'),
							'nm_rekening' => $this->input->post('nama')
						  );
			$sql = $this->M_gudang->s_koderekakt($data);

			$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('gudang/v_koderekakt')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('gudang/v_koderekakt','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('gudang/v_koderekakt')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('gudang/v_koderekakt','refresh');
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode atau Nama Rekening Akutansi Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('gudang/v_koderekakt').'")';
			echo '</script>';
		}
	}
	public function u_koderekakt($id='')
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Ubah Kode Rekening Akuntansi';

		$isi['isi'] = $this->M_gudang->ve_koderekakt($id);

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/kode_rekening/edit',$isi);
		$this->load->view('gudang/template/footer');
	}
	public function koderekakt_u($id)
	{
		$this->form_validation->set_rules('kode','Kode','required');
		if($this->form_validation->run() == TRUE){
			/*$cek = $this->db->query("SELECT id_rekening FROM tbl_satuan where nm_satuan='".$this->input->post('satuan',TRUE)."'")->num_rows();
			if($cek <= 0){*/
				$data = array(	'id_rekening' => $this->input->post('kode'),
								'nm_rekening' => $this->input->post('nama')							
							 );

				$sql = $this->M_gudang->e_koderekakt($id, $data);
				
				$allsql = array($sql);
				if($allsql){ // Jika sukses
					// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('gudang/v_koderekakt')."';</script>";
					$this->session->set_flashdata('success', 'Data berhasil diubah');
					redirect('gudang/v_koderekakt','refresh');
				}else{ // Jika gagal
					// echo "<script>alert('Data gagal diubah');window.location = '".site_url('gudang/v_koderekakt')."';</script>";
					$this->session->set_flashdata('error', 'Data gagal diubah');
					redirect('gudang/v_koderekakt','refresh');
				}
			/*}else{
				echo '<script language="javascript">';
				echo 'alert("Maaf Kode atau Nama Rekening Satuan Sudah Ada")';
				echo '</script>';
				echo '<script language="javascript">';
				echo 'window.location=("'.site_url('stok/view_satuan').'")';
				echo '</script>';
			}*/
		}else{
			// echo "<script>alert('Maaf Kode Rekening Akuntansi tidak ditemukan');window.location = '".site_url('gudang/v_koderekakt')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Kode Rekening Akuntansi tidak ditemukan');
					redirect('gudang/v_koderekakt','refresh');
		}
	}
	public function h_koderekakt($id)
	{
		$sql = $this->M_gudang->h_koderekakt($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".site_url('gudang/v_koderekakt')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('gudang/v_koderekakt','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dihapus');window.location = '".site_url('gudang/v_koderekakt')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal diubah');
			redirect('gudang/v_koderekakt','refresh');
		}
	}
	// -------------------------------------------------------------
	// --------------------- Jenis BArang Akuntansi ----------------
	public function v_jenisbrngakt()
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Jenis Barang Akuntansi';

		$isi['isi'] = $this->M_gudang->v_jenisbrngakt();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/jenis_barang_akt/view',$isi);
		$this->load->view('gudang/template/footer');
	}
	public function t_jenisbrngakt()
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Tambah Jenis Barang Akuntansi';

		// $isi['isi'] = $this->M_gudang->v_koderekakt();
		$isi['get_rek'] = $this->M_gudang->get_rekening();
		$isi['get_unit'] = $this->M_gudang->get_unit();
		$isi['get_jenis'] = $this->M_gudang->get_jenis_barang();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/jenis_barang_akt/tambah',$isi);
		$this->load->view('gudang/template/footer');
	}
	public function jenisbrngakt_t()
	{
			$kd 	= $this->input->post('kode');
			$nm 	= $this->input->post('nama');
			$brng 	= $this->input->post('barang');
			$unit 	= $this->input->post('unit');
			$rek 	= $this->input->post('rek');
			/*$kd 	= $this->input->post('nopesbaru');*/

			$data = array();
			$i = 0;
			if(is_array($kd)){
				foreach ($kd as $datakd) {
					$cek = $this->db->query("SELECT * FROM tbl_barang_akutansi where no_jnsbrngakt='$datakd' ")->num_rows();
					if($cek <= 0){
						array_push($data, array(
							'no_jnsbrngakt'	=> $datakd,
							'nm_jnsbrngakt'	=> $nm[$i],
							'id_jnsbrng'	=> $brng[$i],
							'id_unit'		=> $unit[$i],
							'no_rekening'	=> $rek[$i]
						));
						$i++;
					}else{
						echo '<script language="javascript">';
						echo 'alert("Maaf Kode Jenis Barang Akuntansi Sudah Ada")';
						echo '</script>';
						echo '<script language="javascript">';
						echo 'window.location=("'.site_url('gudang/v_jenisbrngakt').'")';
						echo '</script>';
					}
				}
			}
			$sql = $this->M_gudang->s_jenisbrngakt($data);

			$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('gudang/v_jenisbrngakt')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('gudang/v_jenisbrngakt','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('gudang/v_jenisbrngakt')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('gudang/v_jenisbrngakt','refresh');
			}
	}
	public function u_jenisbrngakt($id='')
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Ubah Jenis Barang Akuntansi';

		$isi['isi'] = $this->M_gudang->ve_jenisbrngakt($id);
		$isi['get_rek'] = $this->M_gudang->get_rekening();
		$isi['get_unit'] = $this->M_gudang->get_unit();
		$isi['get_jenis'] = $this->M_gudang->get_jenis_barang();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/jenis_barang_akt/edit',$isi);
		$this->load->view('gudang/template/footer');
	}
	public function jenisbrngakt_u($id)
	{
		$this->form_validation->set_rules('kode','Kode','required');
		if($this->form_validation->run() == TRUE){
			$data = array(	'no_jnsbrngakt' => $this->input->post('kode'),
							'id_jnsbrng' 	=> $this->input->post('barang'),
							'id_unit' 		=> $this->input->post('unit'),
							'no_rekening' 	=> $this->input->post('rek'),
							'nm_jnsbrngakt' => $this->input->post('nama')
						 );
			$sql = $this->M_gudang->e_jenisbrngakt($id, $data);
			
			$allsql = array($sql);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('gudang/v_jenisbrngakt')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('gudang/v_jenisbrngakt','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal diubah');window.location = '".site_url('gudang/v_jenisbrngakt')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('gudang/v_jenisbrngakt','refresh');
			}
		}else{
			// echo "<script>alert('Maaf Kode Jenis Barang Akuntansi tidak ditemukan');window.location = '".site_url('gudang/v_jenisbrngakt')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Kode Jenis Barang Akuntansi tidak ditemukan');
			redirect('gudang/v_jenisbrngakt','refresh');
		}
	}
	public function h_jenisbrngakt($id)
	{
		$sql = $this->M_gudang->h_jenisbrngakt($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".site_url('gudang/v_jenisbrngakt')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('gudang/v_jenisbrngakt','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal di hapus');window.location = '".site_url('gudang/v_jenisbrngakt')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('gudang/v_jenisbrngakt','refresh');
		}
	}
	// -------------------------------------------------------------
	// ========================================================================================================================================

	// ======================================================== Verifikasi Data ===============================================================
	// --------------------- Pesanan Baru -------------------------
	public function v_verpesbaru()
	{
		$data['menutitle'] = 'Verifikasi Data Pesanan';
		$data['menu'] = 'Verifilkasi';
		$data['submenu'] = 'Pesanan Ke Gudang';

		$isi['isi'] = $this->M_gudang->v_verpesbar();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/pesanan_baru/view',$isi);
		$this->load->view('gudang/template/footer');
	}
	public function v_ver_pesbaru($id)
	{
		$data['menutitle'] = 'Detail Data Pesanan';
		$data['menu'] = 'Verifikasi';
		$data['submenu'] = 'Verifikasi Detail Pesanan';

		$isi['judul'] = $this->M_gudang->v_ver_idpesbar($id);
		$isi['isi'] = $this->M_gudang->v_ver_dtlpesbar($id);

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/pesanan_baru/view_detail',$isi);
		$this->load->view('gudang/template/footer');
	}
	public function v_ver_konfirmasi($id)
	{
		$id 	= $this->input->post('kode');
		$verif 	= $this->input->post('verif');

		$data 	= array('selesai_minta' => $verif);
		$sql 	= $this->M_gudang->v_ver_konfirmasi($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dikonfirmasi');window.location = '".site_url('gudang/v_verpesbaru')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dikonfirmasi');
			redirect('gudang/v_verpesbaru','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dikonfirmasi');window.location = '".site_url('gudang/v_verpesbaru')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dikonfirmasi');
			redirect('gudang/v_verpesbaru','refresh');
		}
	}
	public function ver_konfirmasi($id)
	{
		$id 	= $this->input->post('kode');
		$verif 	= $this->input->post('verif');
		$idper 	= $this->input->post('kode_permin');

		$data 	= array('selesai_dtl_minta' => $verif);
		$sql 	= $this->M_gudang->ver_konfirmasi($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dikonfirmasi');window.location = '".site_url('gudang/v_ver_pesbaru/'.$idper)."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dikonfirmasi');
			redirect('gudang/v_ver_pesbaru/'.$idper,'refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dikonfirmasi');window.location = '".site_url('gudang/v_ver_pesbaru/'.$idper)."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dikonfirmasi');
			redirect('gudang/v_ver_pesbaru/'.$idper,'refresh');
		}
	}
	// ------------------------------------------------------------
	// ========================================================================================================================================


}

/* End of file Gudang.php */
/* Location: ./application/controllers/Gudang.php */