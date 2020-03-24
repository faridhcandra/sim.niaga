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

	// ============== Fungsi Get ====================
	function get_bagian(){
		$id = $this->input->post('bag');
		$data = $this->M_stok->get_bagian($id);
		echo json_encode($data);
	}
	// ==============================================
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
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('stok/view_satuan')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('stok/view_satuan')."';</script>";
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
						echo "<script>alert('Data berhasil diubah');window.location = '".site_url('stok/view_satuan')."';</script>";
					}else{ // Jika gagal
						echo "<script>alert('Data gagal diubah');window.location = '".site_url('stok/u_satuan')."';</script>";
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
			echo "<script>alert('Maaf Nama Satuan tidak ditemukan');window.location = '".site_url('stok/view_satuan')."';</script>";
		}
	}
	public function h_satuan($id)
	{
		$sql = $this->M_stok->h_satuan($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('stok/view_satuan')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".site_url('stok/view_satuan')."';</script>";
		}
	}
	// ----------------------------------------------
	// ----------------- Barang ---------------------
	public function view_barang()
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Data Barang';

		$isi['isi'] =  $this->M_stok->v_barang();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/barang/view',$isi);
		$this->load->view('stok/template/footer');
	}
	public function t_barang()
	{ 

		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Tambah barang';

		$isi['get_jnsbrng'] = $this->M_stok->get_idjenis();
		$isi['get_group'] = $this->M_stok->get_idgroup();
		$isi['get_satuan'] = $this->M_stok->get_satuan();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/barang/tambah',$isi);
		$this->load->view('stok/template/footer');
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
			$sql = $this->M_stok->s_barang($data);

			$allsql = array($sql);
			if($allsql){ // Jika sukses
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('stok/view_barang')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('stok/view_barang')."';</script>";
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Nama Satuan Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('stok/view_barang').'")';
			echo '</script>';
		}
	}
	public function u_barang($id='')
	{
		$data['menutitle'] = 'Data Master';
		$data['menu'] = 'Data Master';
		$data['submenu'] = 'Edit Barang';

		$isi['get_jnsbrng'] = $this->M_stok->get_idjenis();
		$isi['get_group'] = $this->M_stok->get_idgroup();
		$isi['get_satuan'] = $this->M_stok->get_satuan();
		$isi['isi'] = $this->M_stok->ve_barang($id);

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/barang/edit',$isi);
		$this->load->view('stok/template/footer');
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
				$sql = $this->M_stok->e_barang($id, $data);
				$allsql = array($sql);
				if($allsql){ // Jika sukses
					echo "<script>alert('Data berhasil diubah');window.location = '".site_url('stok/view_barang')."';</script>";
				}else{ // Jika gagal
					echo "<script>alert('Data gagal diubah');window.location = '".site_url('stok/u_barang')."';</script>";
				}
			/*}else{
				echo '<script language="javascript">';
				echo 'alert("Maaf Id Barang Sudah Ada")';
				echo '</script>';
				echo '<script language="javascript">';
				echo 'window.location=("'.site_url('stok/view_barang').'")';
				echo '</script>';
			}*/
		}else{
			echo "<script>alert('Maaf Nama Barang tidak ditemukan');window.location = '".site_url('stok/view_barang')."';</script>";
		}
	}
	public function h_barang($id)
	{
		$sql = $this->M_stok->h_barang($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('stok/view_barang')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".site_url('stok/view_barang')."';</script>";
		}
	}
	// ----------------------------------------------
	// ========================================================================================================================================
	// =========================================================== PESANAN ====================================================================
	// ------------------ Baru ----------------------
	public function view_pesbaru()
	{
		$data['menutitle'] = 'Data Pemesanan Baru';
		$data['menu'] = 'Pemesanan';
		$data['submenu'] = 'Pemesanan Baru';

		$isi['isi'] = $this->M_stok->v_pesbaru();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/pesanan/baru/view',$isi);
		$this->load->view('stok/template/footer');
	}
	public function view_dtl_pesbaru($id='')
	{
		$data['menutitle'] = 'Detail Data Pemesanan';
		$data['menu'] = 'Pemesanan';
		$data['submenu'] = 'Detail Pemesanan Baru';

		$isi['judul'] = $this->M_stok->ve_id_pesbar($id);
		$isi['isi'] = $this->M_stok->v_dtl_pesbar($id);

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/pesanan/baru/view_detail',$isi);
		$this->load->view('stok/template/footer');
	}
	public function t_pesbaru()
	{
		$data['menutitle'] = 'Data Pemesanan';
		$data['menu'] = 'Pemesanan';
		$data['submenu'] = 'Tambah Pemesanan Baru';

		//$isi['isi'] = $this->M_stok->ve_satuan($id);
		$isi['kode'] = $this->M_stok->k_pesbaru();
		$isi['get_unit'] = 'weav';
		$isi['pesbaru_barang'] = $this->M_stok->pesbaru_barang();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/pesanan/baru/tambah',$isi);
		$this->load->view('stok/template/footer');
	}
	public function pesbaru_t()
	{
		$cek = $this->db->query("SELECT * FROM tbl_permintaan where nota_minta='".$this->input->post('nopesbaru', TRUE)."' ")->num_rows();
		if($cek <= 0){
			$kd 			= $this->input->post('kd');
			$nopesan 		= $this->input->post('nopesbaru');
			$tglps 			= $this->input->post('tglpes');
			$unit 			= $this->input->post('unit');
			$bagian 		= $this->input->post('bagian');
			$ket 			= $this->input->post('ket');
			$barang 		= $this->input->post('barang');
			/*$stok_unit 		= $this->input->post('stkunit');
			$stok_gudang 	= $this->input->post('stkgudang');*/
			$tglperlu 		= $this->input->post('tglperlu');
			$jumlah 		= $this->input->post('jml');
			$ketdetail 		= $this->input->post('ketdetail');

			$data1 = array(
				'id_permintaan' => $kd,
				'id_unit' 		=> $unit,
				'id_bagian' 	=> $bagian,
				'nota_minta' 	=> $nopesan,
				'tgl_minta' 	=> $tglps,
				'ket_minta' 	=> $ket,
				'id_user' 		=> '1'
			);
			$sql1 = $this->M_stok->s_pesbar($data1);

			$data2 = array();
			$i = 0;
			if(is_array($barang)){
				foreach ($barang as $databarang) {
					array_push($data2, array(
						'id_permintaan'		=> $kd,
						'id_barang'			=> $databarang,
						'nota_dtl_minta'	=> $nopesan,
						'tgl_dtl_perlu'		=> $tglperlu[$i],
						'jml_dtl_minta'		=> $jumlah[$i],
						'ket_dtl_minta'		=> $ketdetail[$i]
					));
					$i++;
				}
			}
			$sql2 = $this->M_stok->s_pesbar_dtl_batch($data2);

			$allsql = array($sql1,$sql2);
			if($allsql){ // Jika sukses
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('stok/view_pesbaru')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('stok/view_pesbaru')."';</script>";
			}

		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf No Permintaan Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('stok/view_pesbaru').'")';
			echo '</script>';
		}
	}
	public function u_pesbaru($id='')
	{
		$data['menutitle'] = 'Data Pemesanan';
		$data['menu'] = 'Pemesanan';
		$data['submenu'] = 'Ubah Pesanan Baru';

		$isi['get_unit'] = 'weav';
		$isi['pesbaru_barang'] = $this->M_stok->pesbaru_barang();
		$isi['isi'] = $this->M_stok->ve_pesbar($id);

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/pesanan/baru/edit',$isi);
		$this->load->view('stok/template/footer');
	}
	public function pesbaru_u($id)
	{
		$this->form_validation->set_rules('nopesbaru','Nopesbaru','required');
		if($this->form_validation->run() == TRUE){
			/*$cek = $this->db->query("SELECT * FROM tbl_dtl_permintaan where id_barang='".$this->input->post('id_barang',TRUE)."'")->num_rows();
			if($cek <= 0){*/
				$data = array(	'id_barang'		=> $this->input->post('barang'),
								'tgl_dtl_perlu' => $this->input->post('tglperlu'),
								'jml_dtl_minta' => $this->input->post('jml'),
								'ket_dtl_minta' => $this->input->post('ketdetail'),							
							 );
				$sql = $this->M_stok->e_pesbar($id, $data);
				$allsql = array($sql);
					if($allsql){ // Jika sukses
						echo "<script>alert('Data berhasil diubah');window.location = '".site_url('stok/view_pesbaru')."';</script>";
					}else{ // Jika gagal
						echo "<script>alert('Data gagal diubah');window.location = '".site_url('stok/u_barang')."';</script>";
					}
				/*}else{
					echo '<script language="javascript">';
					echo 'alert("Maaf Nama Barang Sudah Ada")';
					echo '</script>';
					echo '<script language="javascript">';
					echo 'window.location=("'.site_url('stok/view_pesbaru').'")';
					echo '</script>';
				}*/
		}else{
			echo "<script>alert('Maaf No Pemesanan tidak ditemukan');window.location = '".site_url('stok/view_pesbaru')."';</script>";
		}
	}
	public function pesbar_h($id)
	{
		$sql = $this->M_stok->h_pesbar($id);
		$sql2 = $this->M_stok->h_pesbardet($id);
		$allsql = array($sql,$sql2);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('stok/view_pesbaru')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".site_url('stok/view_pesbaru')."';</script>";
		}
	}
	public function perbar_detail_h($id)
	{
		$sql = $this->M_stok->h_pesbar_detail($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('stok/view_pesbaru')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".site_url('stok/view_pesbaru')."';</script>";
		}
	}
	// ----------------------------------------------
	// ------------------- Selesai ------------------
	public function view_pesselesai()
	{
		$data['menutitle'] = 'Data Pemesanan Selesai';
		$data['menu'] = 'Pemesanan';
		$data['submenu'] = 'Pesanana Selesai';

		$isi['isi'] = $this->M_stok->v_pesselesai();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/pesanan/selesai/view',$isi);
		$this->load->view('stok/template/footer');
	}
	public function view_dtl_pesselesai($id='')
	{
		$data['menutitle'] = 'Detail Data Pemesanan';
		$data['menu'] = 'Pemesanan';
		$data['submenu'] = 'Detail Pesanana Selesai';

		$isi['judul'] = $this->M_stok->ve_id_pessel($id);
		$isi['isi'] = $this->M_stok->ve_pessel($id);

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/pesanan/selesai/view_detail',$isi);
		$this->load->view('stok/template/footer');
	}
	// ----------------------------------------------

	// =========================================================================================================================================


		// -------------- Stok Barang ------------------
	public function view_stok()
	{
		$data['menutitle'] = 'Data Stok Barang';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Stok Barang';

		$isi['isi'] = $this->M_stok->v_stok();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/transaksi/stok_barang/view',$isi);
		$this->load->view('stok/template/footer');
	}

			// -------------- Barang Masuk ------------------
	public function view_barangmasuk()
	{
		$data['menutitle'] = 'Data Barang Masuk';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Barang Masuk';

		$isi['isi'] = $this->M_stok->v_barangmasuk();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/transaksi/barang_masuk/view',$isi);
		$this->load->view('stok/template/footer');
	}

				// -------------- Barang Keluar ------------------
	public function view_barangkeluar()
	{
		$data['menutitle'] = 'Data Barang Keluar';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Barang Keluar';

		$isi['isi'] = $this->M_stok->v_barangkeluar();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/transaksi/barang_keluar/view',$isi);
		$this->load->view('stok/template/footer');
	}

	public function t_barangkel()
	{
		$data['menutitle'] = 'Data Barang Keluar';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Tambah Barang Keluar';

		//$isi['isi'] = $this->M_stok->ve_satuan($id);
		$isi['kode'] = $this->M_stok->k_barkel();
		$isi['get_brg'] = $this->M_stok->barkel_barang();
		// $isi['barkel_barang'] = $this->M_stok->barkel_barang();
		// $isi['get_barangkel'] = $this->M_stok->get_barangkel();

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/transaksi/barang_keluar/tambah',$isi);
		$this->load->view('stok/template/footer');
	}


	// Fungsi Insert barang_keluar
	public function barang_keluar_tambah()
	{
		$id_barang  = $this->input->post('id_barang');
		$jml_keluar	= $this->input->post('jumlahkel');
		$id_brngkel = $this->input->post('id_brngkel', TRUE);
		$ketersedian_stok = $this->M_stok->get_cek_ketersedian();

		foreach ($ketersedian_stok as $row) {
				$barang 	= $row->id_barang;
				$jml_stok 	= $row->stok;
				if($id_barang == $barang && $jml_keluar>$jml_stok) {	
				echo '<script language="javascript">';
				echo 'alert("Maaf Stok Tidak Cukup")';
				echo '</script>';
				redirect('stok/t_barangkel/','refresh');
				}	
		}
		
		// $stok_all = $this->M_stok->jmlh_stok($id_barang);
		$fifo = $this->M_stok->stok_urut_tgl($id_barang);
			
		// $sql = "SELECT id_transaksi,tanggal,stok,id_barang, harga from stok_barang where id_barang = '$id_barang' AND stok > 0 ORDER by tanggal ASC";
		// $data = $this->db->query($sql);
		// $result = $data->result();

			foreach($fifo as $row) {
				$id_stok = $row->id_stok;
				$tgl 	= $row->tgl_brngmsk;
				$stok	= $row->stok_masuk;
				$harga 	= $row->hrg_stok;
				$id_brngmsk = $row->id_brngmsk;

				if($jml_keluar > 0){
					$tmp = $jml_keluar;
					$jml_keluar = $jml_keluar - $stok;

					if($jml_keluar > 0){
						$update_stok = 0;
						$update_tot  = $tmp - $jml_keluar;
					}else{
						$update_stok = $stok - $tmp;
						$update_tot = $tmp;
					}

					/*var_dump($update_stok);
					exit(0);*/

					$sql1 = "UPDATE tbl_stok_barang SET stok_masuk = '$update_stok', stok_keluar = '$update_tot' + stok_keluar WHERE id_barang = '$id_barang' AND tgl_brngmsk = '$tgl'";
					$data1 = $this->db->query($sql1);

					$subjum = $update_tot*$harga;					

					$data3 = array(  'id_brngkel' 			=> $this->input->post('id_brngkel', TRUE),
									 'id_barang' 			=> $this->input->post('id_barang', TRUE),
									 'tgl_brngkel' 			=> $this->input->post('tgl_keluar', TRUE),
									 'stok_brngkel' 		=> $update_tot,
									 'harga_dtlbrngkel' 	=> $harga,
									 'subhrg_dtlbrngkel' 	=> $subjum,
									 'tgl_brngmsk' 			=> $tgl,
									 'id_stok'	 			=> $id_stok,
									 'id_brngmsk' 			=> $id_brngmsk,
									 'id_bagian' 			=> $this->input->post('id_bagian', TRUE)
									);
					$this->M_stok->simpan_dtl_barang_kel($data3);
				}

			}
			$sql11 = "SELECT sum(subhrg_dtlbrngkel) as total_harga from tbl_dtl_barang_keluar where id_barang = '$id_barang' and id_brngkel = '$id_brngkel' group by id_barang";
			$data11 = $this->db->query($sql11);
			$result = $data11->result();
			foreach ($result as $row) {
				$toal_harga = $row->total_harga;
			}

			$data1 = array(  'id_brngkel' 		=> $this->input->post('id_brngkel', TRUE),
							 'tgl_brngkel'		=> $this->input->post('tgl_keluar', TRUE),
							 'jumlah_brngkel' 	=> $this->input->post('jumlahkel', TRUE),
							 'tothrg_brngkel' 	=> $toal_harga,
							 'id_bagian' 		=> $this->input->post('id_bagian', TRUE)
						  );
			$simpan = $this->M_stok->simpan_barang_keluar($data1);

			$allsql = array($simpan);
			if($allsql){ // Jika sukses
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('stok/view_barangkeluar')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('stok/view_barangkeluar')."';</script>";
			}
	}


	function hapus_brngkeluar($id)
	{
		$loop = $this->db
			->select('id_brngmsk, stok_brngkel, id_barang, tgl_brngmsk')
			->where('id_brngkel',$id)
			->get('tbl_dtl_barang_keluar');
		foreach($loop->result() as $row){
		 $sql = "update tbl_stok_barang set stok_masuk = stok_masuk + ".$row->stok_brngkel.", stok_keluar = stok_keluar - ".$row->stok_brngkel."
			where id_brngmsk= '".$row->id_brngmsk."' and id_barang = '".$row->id_barang."' and tgl_brngmsk = '".$row->tgl_brngmsk."'";		
			$this->db->query($sql);
		}
		$this->M_stok->delete_barang_keluar($id);
		$this->M_stok->delete_dtl_stok_barang($id);
		redirect('stok/view_barangkeluar','refresh');
	}

	public function u_brngkel($id='')
	{
		$data['menutitle'] = 'Data Barang Keluar';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Edit Barang Keluar';

		// $isi['kode'] = $this->M_stok->k_barkel();
		// // $isi['get_brg'] = $this->M_stok->barkel_barang();
		$isi['isi'] = $this->M_stok->ve_brngkel($id);

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/transaksi/barang_keluar/edit',$isi);
		$this->load->view('stok/template/footer');
	}
	
	public function brngkel_u($id)
	{
		$this->form_validation->set_rules('id_brngkel','id_brngkel','required');
		if($this->form_validation->run() == TRUE){
				$data = array(
							'jumlah_brngkel' => $this->input->post('jumlahkel'),
							'tgl_brngkel' => $this->input->post('tgl_keluar'),						
							 );
				$sql = $this->M_stok->e_brngkel($id, $data);
				$allsql = array($sql);
				if($allsql){ // Jika sukses
					echo "<script>alert('Data berhasil diubah');window.location = '".site_url('stok/view_barangkeluar')."';</script>";
				}else{ // Jika gagal
					echo "<script>alert('Data gagal diubah');window.location = '".site_url('stok/u_brngkel')."';</script>";
				}
			/*}else{
				echo '<script language="javascript">';
				echo 'alert("Maaf Id Barang Sudah Ada")';
				echo '</script>';
				echo '<script language="javascript">';
				echo 'window.location=("'.site_url('stok/view_barang').'")';
				echo '</script>';
			}*/
		}else{
			echo "<script>alert('Maaf Nama Barang tidak ditemukan');window.location = '".site_url('stok/view_barangkeluar')."';</script>";
		}
	}

	function edit_brngkeluar($id)
	{
		$loop = $this->db
			->select('id_brngmsk, stok_brngkel, id_barang, tgl_brngmsk')
			->where('id_brngkel',$id)
			->get('tbl_dtl_barang_keluar');
		foreach($loop->result() as $row){
		 $sql = "update tbl_stok_barang set stok_masuk = stok_masuk + ".$row->stok_brngkel.", stok_keluar = stok_keluar - ".$row->stok_brngkel."
			where id_brngmsk= '".$row->id_brngmsk."' and id_barang = '".$row->id_barang."' and tgl_brngmsk = '".$row->tgl_brngmsk."'";		
			$this->db->query($sql);
		}
		$this->M_stok->delete_barang_keluar($id);
		$this->M_stok->delete_dtl_stok_barang($id);
		redirect('stok/view_barangkeluar','refresh');
	}

}

/* End of file stok.php */
/* Location: ./application/controllers/stok.php */