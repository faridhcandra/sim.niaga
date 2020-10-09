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
	// =================================================

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

	// ------------------- Barang Rekening Akuntansi ---------------
	public function v_barangakt(){
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Penyesuaian Barang Akuntansi';

		$isi['isi'] = $this->M_gudang->v_brngakt();
		$isi['cari_kodeakt'] = $this->M_gudang->cari_kodeakt();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/data_barang/view',$isi);
		$this->load->view('gudang/template/footer');
	}

	public function v_edit_brngakt($id)
	{
		$id 	= $this->input->post('kode');
		$verif 	= $this->input->post('kode_akt');

		$data 	= array('id_jnsbrngakt' => $verif);
		$sql 	= $this->M_gudang->v_edit_barangakt($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil dikonfirmasi');window.location = '".site_url('pembelian/v_verpesbaru')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			redirect('gudang/v_barangakt','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dikonfirmasi');window.location = '".site_url('pembelian/v_verpesbaru')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal ditambahkan');
			redirect('gudang/v_barangakt','refresh');
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
	// =====================================================================================================================================
    // =========================================================== Transaksi ===============================================================
	// --------------------- Penerimaan -------------------------
	public function v_penerimaan()
	{
		$data['menutitle'] = 'Data Penerimaan';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Penerimaan';

		
		$isi['isi'] = $this->M_gudang->v_penerimaan();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/penerimaan/view',$isi);
		$this->load->view('gudang/template/footer');
	}

	public function t_penerimaan()
	{
		$data['menutitle'] = 'Data Penerimaan';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Tambah Penerimaan';

		$isi['kode'] = $this->M_gudang->k_penerimaan();
		$isi['get_sup'] = $this->M_gudang->get_supplier();
		$isi['get_notabeli'] = $this->M_gudang->get_notabeli();
		$isi['get_dtlbeli'] = $this->M_gudang->get_dtlbeli();
		$isi['get_unit'] = $this->M_gudang->get_units();

		// $isi['get_jenis'] = $this->M_gudang->get_jenis_barang();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/penerimaan/tambah',$isi);
		$this->load->view('gudang/template/footer');
	} 

	public function penerimaan_t()
	{
		$cek = $this->db->query("SELECT * FROM tbl_penerimaan where nota_terima='".$this->input->post('noterima', TRUE)."' ")->num_rows();
		if($cek <= 0){
			$kd 				= $this->input->post('kode');
			$nota_terima 		= $this->input->post('nota_terima');
			$tgl_terima 		= $this->input->post('tgl_terima');
			$idsup 				= $this->input->post('idsup');
			$id_pembelian 		= $this->input->post('id_pembelian');
			$nota_beli	 		= $this->input->post('nota_beli');
			$nota_cek 			= $this->input->post('nota_cek');
			$tgl_cek 			= $this->input->post('tgl_cek');
			$idunt 				= $this->input->post('idunt');
			$suratjln_terima 	= $this->input->post('suratjln_terima');
			$tgljln_terima 		= $this->input->post('tgljln_terima');
			$idbag 				= $this->input->post('idbag');
			$jns_brng  			= $this->input->post('jns_brng');
			$tgljt_terima 		= $this->input->post('tgljt_terima');
			$ket_terima 		= $this->input->post('ket_terima');
			$ppn_terima 		= $this->input->post('ppn_terima');
			$subtotal_trm 		= $this->input->post('subtotal_trm');
			$totalhrg_trm 		= $this->input->post('totalhrg_trm');
			// sub terima
			$id_dtl_pembelian 	= $this->input->post('id_dtl_pembelian');
			$nota_dtlterima 	= $this->input->post('nota_terima');
			$tgl_dtlterima 		= $this->input->post('tgl_terima');
			$id_jbrngakt 		= $this->input->post('id_jbrngakt');
			$id_barang 			= $this->input->post('id_barang');
			$id_group 			= $this->input->post('id_group');
			$jml1 				= $this->input->post('jml1');
			$sat1 				= $this->input->post('sat1');
			$jml2 				= $this->input->post('jml2');
			$sat2 				= $this->input->post('sat2');
			$harga_dtlterima	= $this->input->post('harga_dtlterima');
			$ppn_trm 			= $this->input->post('ppn_trm');
			$sub_trm 			= $this->input->post('sub_trm');
			$tot_hrg_trm 		= $this->input->post('tot_hrg_trm');
			// // total beli
			// $subtotal 	= $this->input->post('subrencbeli');
			// $ppn 		= $this->input->post('ppnrencbeli');
			// $total 		= $this->input->post('totrencbeli');

			$data1 = array(
							'id_penerimaan' 	=> $kd,
							'nota_terima' 		=> $nota_terima,
							'tgl_terima' 		=> $tgl_terima,
							'id_supplier'		=> $idsup,
							'id_pembelian'		=> $id_pembelian,
							'nota_beli'			=> $nota_beli,
							'nota_cek'			=> $nota_cek,
							'tgl_cek'			=> $tgl_cek,
							'id_unit' 			=> $idunt,
							'srtjalan_terima' 	=> $suratjln_terima,
							'tgljalan_terima' 	=> $tgljln_terima,
							'id_bagian' 		=> $idbag,
							'id_jnsbrng' 		=> $jns_brng,
							'tgljt_terima' 		=> $tgljt_terima,
							'ket_terima' 		=> $ket_terima,
							'ppn_terima'		=> $ppn_terima,
							'subtotal_terima'	=> $subtotal_trm,
							'totalharga_terima' => $totalhrg_trm
			);
			$sql1 = $this->M_gudang->s_penerimaan($data1);

			$data2 = array();
			$i = 0;
			if(is_array($id_dtl_pembelian)){
				foreach ($id_dtl_pembelian as $datadtltrm) {
					array_push($data2, array(
						'id_penerimaan' 			=> $kd,
						'id_dtl_pembelian' 			=> $datadtltrm,
						'nota_dtlterima'			=> $nota_terima,
						'tgl_dtlterima' 			=> $tgl_terima,
						'id_jnsbrngakt' 			=> $id_jbrngakt[$i],
						'id_barang' 				=> $id_barang[$i],
						'id_group' 					=> $id_group[$i],
						'jml1_dtlterima' 			=> $jml1[$i],
						'sat1_dtlterima' 			=> $sat1[$i],
						'jml2_dtlterima' 			=> $jml2[$i],
						'sat2_dtlterima' 			=> $sat2[$i],
						'harga_dtlterima'			=> $harga_dtlterima[$i],
						'ppn_dtlterima' 			=> $ppn_trm[$i],
						'subtotal_dtlterima'		=> $sub_trm[$i],
						'totalharga_dtlterima'		=> $tot_hrg_trm[$i]
					));
					$i++;
				}
			}
			$sql2 = $this->M_gudang->s_dtl_penerimaan_batch($data2);

			$allsql = array($sql1,$sql2);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('gudang/v_penerimaan','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('gudang/v_penerimaan','refresh');
			}

		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf No Pembelian Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('gudang/v_penerimaan').'")';
			echo '</script>';
		}
	}
	
	public function v_dtl_terima($id)
	{
		$data['menutitle'] 	= 'Detail Data Penerimaan';
		$data['menu'] 		= 'Penerimaan';
		$data['submenu'] 	= 'Penerimaan';

		$isi['judul'] = $this->M_gudang->v_dtl_idtrm($id);
		$isi['isi'] = $this->M_gudang->v_dtl_penerimaan($id);
		$isi['get_rptrm'] = $this->M_gudang->get_rptrm($id);
		$isi['isi'] = $this->M_gudang->v_dtl_penerimaan($id);

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/penerimaan/view_detail',$isi);
		$this->load->view('gudang/template/footer');
	}

	public function u_penerimaan($id='')
	{
		$data['menutitle'] 	= 'Edit Penerimaan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Edit Penerimaan';

		$isi['isi'] = $this->M_gudang->ve_penerimaan($id);
		$isi['get_sup'] = $this->M_gudang->get_supplier();
		$isi['get_notabeli'] = $this->M_gudang->get_notabeli();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/penerimaan/edit',$isi);
		$this->load->view('gudang/template/footer');
	}
	public function penerimaan_u($id)
	{
		$this->form_validation->set_rules('kode','Kode','required');
		if($this->form_validation->run() == TRUE){

			$data = array(	'nota_terima' 		=> $this->input->post('nota_terima',TRUE),
							'tgl_terima' 		=> $this->input->post('tgl_terima',TRUE),
							'id_supplier' 		=> $this->input->post('idsup',TRUE),
							'id_pembelian' 		=> $this->input->post('id_pembelian',TRUE),
							'id_unit' 			=> $this->input->post('idunt',TRUE),
							'id_bagian' 		=> $this->input->post('idbag',TRUE),
							'id_jnsbrng'		=> $this->input->post('jns_brng',TRUE),
							'nota_cek' 			=> $this->input->post('nota_cek',TRUE),
							'tgl_cek'			=> $this->input->post('tgl_cek',TRUE),
							'srtjalan_terima'	=> $this->input->post('suratjln_terima',TRUE),
							'tgljalan_terima' 	=> $this->input->post('tgljalan_terima',TRUE),
							'tgljt_terima' 		=> $this->input->post('tgljt_terima',TRUE),
							'ket_terima' 		=> $this->input->post('ket_terima',TRUE)
						 );
			$sql = $this->M_gudang->e_penerimaan($id, $data);
			
			$data2 = array( 'nota_dtlterima'	=> $this->input->post('nota_terima',TRUE),
							'tgl_dtlterima' 	=> $this->input->post('tgl_terima',TRUE)
						  );
			$sql2 = $this->M_gudang->e_dtl_penerimaan($id,$data2);

			$allsql = array($sql,$sql2); 
			if($allsql){ // Jika sukses
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('gudang/v_penerimaan/'.$id,'refresh');
			}else{ // Jika gagal
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('gudang/u_penerimaan/'.$id,'refresh');
			}
		}else{
			$this->session->set_flashdata('warning', 'Maaf Nota Penerimaan tidak ditemukan');
			redirect('gudang/v_penerimaan','refresh');
		}
	}

	public function u_dtlpenerimaan($id='')
	{
		$data['menutitle'] 	= 'Edit Detail Penerimaan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Edit Detail Penerimaan';

		$isi['isi'] = $this->M_gudang->ve_penerimaan($id);
		$isi['get_dtlbeli'] = $this->M_gudang->get_dtlbeli();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/penerimaan/edit_detail',$isi);
		$this->load->view('gudang/template/footer');
	}
	public function dtlpenerimaan_u($id)
	{
		$this->form_validation->set_rules('id_dtl_pembelian','Id_dtl_pembelian','required');
		if($this->form_validation->run() == TRUE){

			$id_penerimaan 	= $this->input->post('id_penerimaan',TRUE);
			$sub_trm 		= $this->input->post('sub_trm',TRUE);
			$ppn_trm 		= $this->input->post('ppn_trm',TRUE);
			$tot_hrg_trm 	= $this->input->post('tot_hrg_trm',TRUE);
			$sql2 			= $this->M_gudang->e_dtlpenerimaan($id_penerimaan,$id,$ppn_trm,$sub_trm,$tot_hrg_trm);

			$data = array(	'id_dtl_penerimaan'		 	=> $this->input->post('id_dtl_penerimaan',TRUE),
							'id_dtl_pembelian'		 	=> $this->input->post('id_dtl_pembelian',TRUE),
							'id_barang' 				=> $this->input->post('id_barang',TRUE),
							'nm_barang' 				=> $this->input->post('nm_barang',TRUE),
							'id_penerimaan' 			=> $this->input->post('id_penerimaan',TRUE),
							'tgl_dtlterima' 			=> $this->input->post('tgl_dtlterima',TRUE),
							'jml1_dtlterima' 			=> $this->input->post('jml1',TRUE),
							'sat1_dtlterima'			=> $this->input->post('sat1',TRUE),
							'jml2_dtlterima' 			=> $this->input->post('jml2',TRUE),
							'sat2_dtlterima' 			=> $this->input->post('sat2',TRUE),
							'subtotal_dtlterima' 		=> $this->input->post('sub_trm',TRUE),
							'ppn_dtlterima'				=> $this->input->post('ppn_trm',TRUE),
							'totalharga_dtlterima' 		=> $this->input->post('tot_hrg_trm',TRUE),
							'id_jnsbrngakt' 			=> $this->input->post('id_jbrngakt',TRUE),
							'no_jnsbrngakt'				=> $this->input->post('no_jbrngakt',TRUE),
							'id_group' 					=> $this->input->post('id_group',TRUE),
							'nm_group' 					=> $this->input->post('nm_group',TRUE)
						 );
			$sql = $this->M_pembelian->e_dtlpenerimaan($id, $data);

			$allsql = array($sql,$sql2); 
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_dtl_spb/'.$idspb)."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('gudang/v_dtl_terima/'.$id_dtl_penerimaan,'refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/u_nospb/'.$id)."';</script>";
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('gudang/u_dtlpenerimaan/'.$id,'refresh');
			}
		}else{
			// echo "<script>alert('Maaf Detail SPB tidak ditemukan');window.location = '".site_url('pembelian/v_spb')."';</script>";
			$this->session->set_flashdata('warning', 'Maaf Detail Penerimaan tidak ditemukan');
			redirect('gudang/v_dtl_terima/','refresh');
		}
	}

	public function penerimaan_h($id)
	{
		$a = $this->M_gudang->h_penerimaan($id);
		$b = $this->M_gudang->h_dtlpenerimaan($id);
		$all = array($a,$b);
		if($all){ // Jika sukses
			// echo "<script>alert('Data berhasil dihapus');window.location = '".site_url('pembelian/v_spb')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('gudang/v_penerimaan','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal dihapus');window.location = '".site_url('pembelian/v_spb')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal dihapus');
			redirect('gudang/v_penerimaan','refresh');
		}
	}
    // ----------------------------------------------------------
	// --------------------- Pengecekan -------------------------
	public function v_pengetesan()
	{
		$data['menutitle'] = 'Data Pengetesan';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Pengetesan';

		$isi['isi'] = $this->M_gudang->v_pengetesan();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/pengetesan/view', $isi);
		$this->load->view('gudang/template/footer');
	}

	public function t_pengetesan()
	{
		$data['menutitle'] = 'Data Tambah Pengetesan';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Tambah Pengetesan';

		// $isi['isi'] = $this->M_gudang->v_penerimaan();
		$isi['kode'] = $this->M_gudang->k_pengetesan();
		$isi['get_supplier'] = $this->M_gudang->get_suppliercek();
		$isi['get_notabeli'] = $this->M_gudang->get_notabeli();
		$isi['get_dtlbeli'] = $this->M_gudang->get_cekdtlbeli();
		
		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/pengetesan/tambah',$isi);
		$this->load->view('gudang/template/footer');
	}

	public function pengetesan_t()
	{
		$cek = $this->db->query("SELECT * FROM tbl_pengetesan where nota_cek='".$this->input->post('notacek', TRUE)."' ")->num_rows();
		if($cek <= 0){
			// Utama pengecekan
			$kode_cek 			= $this->input->post('kode',TRUE);
			$nota_cek 			= $this->input->post('notacek',TRUE);
			$kdlev_cek 			= $this->input->post('kdlev',TRUE);
			$tgl_cek 			= $this->input->post('tglcek',TRUE);
			$nosurat_cek 		= $this->input->post('nosurat',TRUE);
			$tglsurat_cek		= $this->input->post('tglcek_surat',TRUE);
			$noatbeli_cek 		= $this->input->post('ceknotabeli',TRUE);
			$kdbeli_cek 		= $this->input->post('cekkdbeli',TRUE);
			$kdunit_cek 		= $this->input->post('cekkdunit',TRUE);
			$kdbag_cek 			= $this->input->post('cekkdbagian',TRUE);
			$ket_cek 			= $this->input->post('cekket',TRUE);

			// Detail Pengecekan
			$kddtlpembelian_cek = $this->input->post('kdcekdtlpemb',TRUE);
			$notadtlbeli_cek	= $this->input->post('notadtlpembcek',TRUE);
			$kdbrng_cek  		= $this->input->post('kdbrngcek',TRUE);
			$jmlbrng1_cek 		= $this->input->post('jmldtlpembcek1',TRUE);
			$jmlbrng2_cek 		= $this->input->post('jmldtlpembcek2',TRUE);
			$lulus_cek 			= $this->input->post('lulusdtlcek',TRUE);
			$tgllulus_cek 		= $this->input->post('tgldtlcek',TRUE);
			$ketdtl_cek 		= $this->input->post('ketdtlcek',TRUE);
			

			$data1 = array( 'id_cek' 		=> $kode_cek,
							'nota_cek' 		=> $nota_cek,
							'tgl_cek' 		=> $tgl_cek,
							'id_pembelian' 	=> $kdbeli_cek,
							'nota_beli' 	=> $noatbeli_cek,
							'id_supplier' 	=> $kdlev_cek,
							'id_bagian' 	=> $kdbag_cek,
							'id_unit' 		=> $kdunit_cek,
							'srtjalan_cek' 	=> $nosurat_cek,
							'tgljalan_cek' 	=> $tglsurat_cek,
							'ket_cek' 		=> $ket_cek

			);
			$sql1 = $this->M_gudang->s_pengetesan($data1);

			$data2 = array();
			$i = 0;
			if(is_array($kddtlpembelian_cek)){
				foreach ($kddtlpembelian_cek as $datadtlpemb) {
					array_push($data2, array(
						'id_cek' 			=> $kode_cek,
						'nota_dtl_cek' 		=> $nota_cek,
						'tgl_dtl_cek'		=> $tgl_cek,
						'id_dtl_pembelian' 	=> $datadtlpemb,
						'nota_dtl_beli' 	=> $notadtlbeli_cek[$i],
						'id_barang' 		=> $kdbrng_cek[$i],
						'jml_cek1' 			=> $jmlbrng1_cek[$i],
						'jml_cek2' 			=> $jmlbrng2_cek[$i],
						'ket_dtl_cek' 		=> $ketdtl_cek[$i],
						'lulus_dtl_cek' 	=> $lulus_cek[$i],
						'tgl_dtl_lunas' 	=> $tgllulus_cek[$i]
					));
					$i++;
				}
			}
			$sql2 = $this->M_gudang->s_dtl_pengetesan_batch($data2);

			$allsql = array($sql1,$sql2);
			if($allsql){ // Jika sukses
				// echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('gudang/v_pengetesan','refresh');
			}else{ // Jika gagal
				// echo "<script>alert('Data gagal disimpan');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
				$this->session->set_flashdata('error', 'Data gagal disimpan');
				redirect('gudang/v_pengetesan','refresh');
			}

		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf No Nota Pengetesan Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('gudang/v_pengetesan').'")';
			echo '</script>';
		}
	}

	public function v_dtl_cek($id)
	{
		$data['menutitle'] 	= 'Detail Data Pengetesan';
		$data['menu'] 		= 'Pengetesan';
		$data['submenu'] 	= 'Pengetesan';

		$isi['judul']	 	= $this->M_gudang->v_dtl_idcek($id);
		$isi['isi'] 		= $this->M_gudang->v_dtl_pengetesan($id);
		/*$isi['get_rptrm'] 	= $this->M_gudang->get_rptrm($id);*/
		$get_id				= $this->M_gudang->v_dtl_pengetesan($id);

		foreach ($get_id as $s) {
			$id_ne = $s->id_cek;
		}
		$isi['get_idtest'] = $id_ne;

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/pengetesan/view_detail',$isi);
		$this->load->view('gudang/template/footer');
	}

	public function u_pengetesan($id='')
	{
		$data['menutitle'] 	= 'Edit Pengetesan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Edit Pengetesan';

		$isi['isi'] 		= $this->M_gudang->ve_pengetesan($id);
		$isi['get_supplier'] = $this->M_gudang->get_suppliercek();
		$isi['get_notabeli'] = $this->M_gudang->get_notabeli();
		// $isi['get_dtlbeli'] = $this->M_gudang->get_cekdtlbeli();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/pengetesan/edit',$isi);
		$this->load->view('gudang/template/footer');
	}

	public function pengetesan_u($id)
	{
		$this->form_validation->set_rules('kode','kode','required');
		if($this->form_validation->run() == TRUE){

			$nota_cek 			= $this->input->post('notacek',TRUE);
			$kdlev_cek 			= $this->input->post('kdlev',TRUE);
			$tgl_cek 			= $this->input->post('tglcek',TRUE);
			$nosurat_cek 		= $this->input->post('nosurat',TRUE);
			$tglsurat_cek		= $this->input->post('tglcek_surat',TRUE);
			$notabeli_cek 		= $this->input->post('ceknotabeli',TRUE);
			$kdbeli_cek 		= $this->input->post('cekkdbeli',TRUE);
			$kdunit_cek 		= $this->input->post('cekkdunit',TRUE);
			$kdbag_cek 			= $this->input->post('cekkdbagian',TRUE);
			$ket_cek 			= $this->input->post('cekket',TRUE);

			$data = array(	'nota_cek' 		=> $nota_cek,
							'tgl_cek' 		=> $tgl_cek,
							'id_pembelian' 	=> $kdbeli_cek,
							'nota_beli' 	=> $notabeli_cek,
							'id_supplier' 	=> $kdlev_cek,
							'id_bagian' 	=> $kdbag_cek,
							'id_unit' 		=> $kdunit_cek,
							'srtjalan_cek' 	=> $nosurat_cek,
							'tgljalan_cek' 	=> $tglsurat_cek,
							'ket_cek' 		=> $ket_cek
						 );

			$sql = $this->M_gudang->e_pengetesan($id, $data);
			
			$data2 = array( 'nota_dtl_cek' 	=> $nota_cek,
							'tgl_dtl_cek'	=> $tgl_cek
						  );

			$sql2 = $this->M_gudang->e_pengetesandtl($id,$data2);

			$allsql = array($sql,$sql2); 
			if($allsql){ // Jika sukses
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('gudang/v_dtl_cek/'.$id,'refresh');
			}else{ // Jika gagal
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('gudang/u_pengetesan/'.$id,'refresh');
			}
		}else{
			$this->session->set_flashdata('warning', 'Maaf No Pengetesan tidak ditemukan');
			redirect('gudang/v_pengetesan','refresh');
		}
	}

	public function u_pengetesandtl($id='')
	{
		$data['menutitle'] 	= 'Edit Detail Pengetesan Barang';
		$data['menu'] 		= 'Transaksi';
		$data['submenu'] 	= 'Edit Detail Pengetesan';

		$isi['isi'] 		= $this->M_gudang->ve_dtl_pengetesan($id);
		$isi['get_dtlbeli'] = $this->M_gudang->get_cekdtlbeli();

		$this->load->view('gudang/template/head');
		$this->load->view('gudang/template/navbar');
		$this->load->view('gudang/template/sidebar',$data);
		$this->load->view('gudang/pengetesan/edit_detail',$isi);
		$this->load->view('gudang/template/footer');
	}

	public function pengetesandtl_u($id)
	{
		$this->form_validation->set_rules('kdcekdtlpemb','Kdcekdtlpemb','required');
		if($this->form_validation->run() == TRUE){

			$kdcek 				= $this->input->post('kdcek',TRUE);
			// Detail Pengecekan
			$kddtlpembelian_cek = $this->input->post('kdcekdtlpemb',TRUE);
			$notadtlbeli_cek	= $this->input->post('notadtlpembcek',TRUE);
			$kdbrng_cek  		= $this->input->post('kdbrngcek',TRUE);
			$jmlbrng1_cek 		= $this->input->post('jmldtlpembcek1',TRUE);
			$jmlbrng2_cek 		= $this->input->post('jmldtlpembcek2',TRUE);
			$lulus_cek 			= $this->input->post('lulusdtlcek',TRUE);
			$tgllulus_cek 		= $this->input->post('tgldtlcek',TRUE);
			$ketdtl_cek 		= $this->input->post('ketdtlcek',TRUE);

			$data = array(	'id_dtl_pembelian' 	=> $kddtlpembelian_cek,
							'nota_dtl_beli' 	=> $notadtlbeli_cek,
							'id_barang' 		=> $kdbrng_cek,
							'jml_cek1' 			=> $jmlbrng1_cek,
							'jml_cek2' 			=> $jmlbrng2_cek,
							'ket_dtl_cek' 		=> $ketdtl_cek,
							'lulus_dtl_cek' 	=> $lulus_cek,
							'tgl_dtl_lunas' 	=> $tgllulus_cek
						 );

			$sql = $this->M_gudang->e_dtl_pengetesan($id, $data);

			$allsql = array($sql); 
			if($allsql){ // Jika sukses
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('gudang/v_dtl_cek/'.$kdcek,'refresh');
			}else{ // Jika gagal
				$this->session->set_flashdata('error', 'Data gagal diubah');
				redirect('gudang/u_pengetesan/'.$kdcek,'refresh');
			}
		}else{
			$this->session->set_flashdata('warning', 'Maaf No Pengetesan tidak ditemukan');
			redirect('gudang/v_pengetesan','refresh');
		}
	}

	public function v_konftest($id)
	{
		$id 	= $this->input->post('kode');
		$ubah 	= $this->input->post('ubah');

		$data 	= array('selesai_cek' => $ubah);
		$sql 	= $this->M_gudang->v_konftest($id,$data);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			// echo "<script>alert('Data berhasil diubah');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('gudang/v_pengetesan','refresh');
		}else{ // Jika gagal
			// echo "<script>alert('Data gagal diubah');window.location = '".site_url('pembelian/v_pembelian')."';</script>";
			$this->session->set_flashdata('error', 'Data gagal diubah');
			redirect('gudang/v_pengetesan','refresh');
		}
	}
    // ----------------------------------------------------------
	// ========================================================================================================================================
}

/* End of file Gudang.php */
/* Location: ./application/controllers/Gudang.php */