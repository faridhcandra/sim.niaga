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
		//$isi['isi'] = $this->M_stok->ve_satuan($id);

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/barang/tambah',$isi);
		$this->load->view('stok/template/footer');
	}

	public function barang_t()
	{
		$cek = $this->db->query("SELECT id_barang FROM tbl_nama_barang where nm_barang='".$this->input->post('nama_barang',TRUE)."'")->num_rows();
		if($cek <= 0){
			$data = array ('id_barang' => $this->input->post('id_barang'),
							'id_jnsbrng' => $this->input->post('id_jnsbrng'),
							// 'id_jnsbrng' => $this->input->post('id_jnsbrngakt'),
							'id_group' => $this->input->post('id_group'),
							'nm_barang' => $this->input->post('nama_barang'),
							'kel_barang' => $this->input->post('kel_barang'),
							'ket_barang' => $this->input->post('ket_barang'),
							'no_barang' => $this->input->post('no_barang'),
							'sat1_barang' => $this->input->post('sat1'),
							'sat2_barang' => $this->input->post('sat2'),
							'hpp_barang' => $this->input->post('hpp_barang'),
							'harga_barang' => $this->input->post('harga_barang'),
							'updated_barang' => date('Y-m-d')
               				);
			$sql = $this->M_stok->s_barang($data);

			$allsql = array($sql);
			if($allsql){ // Jika sukses
				echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('stok/view_barang')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".base_url('stok/view_barang')."';</script>";
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
		$isi['isi'] = $this->M_stok->ve_barang($id);

		$this->load->view('stok/template/head');
		$this->load->view('stok/template/navbar');
		$this->load->view('stok/template/sidebar',$data);
		$this->load->view('stok/barang/edit',$isi);
		$this->load->view('stok/template/footer');
	}

	public function barang_u($id)
	{
		$this->form_validation->set_rules('id_barang','required');
		if($this->form_validation->run() == TRUE){
			$cek = $this->db->query("SELECT id_jnsbrng, id_group, nm_barang, kel_barang, ket_barang, no_barang, sat1_barang, sat2_barang, hpp_barang, harga_barang, updated_barang FROM tbl_nama_barang where id_barang='".$this->input->post('id_barang',TRUE)."'")->num_rows();
			if($cek <= 0){
				$data = array(
							'id_jnsbrng' => $this->input->post('id_jnsbrng'),
							//  'id_jnsbrng' => $this->input->post('id_jnsbrngakt'),
							'id_group' => $this->input->post('id_group'),
							'nm_barang' => $this->input->post('nama_barang'),
							'kel_barang' => $this->input->post('kel_barang'),
							'ket_barang' => $this->input->post('ket_barang'),
							'no_barang' => $this->input->post('no_barang'),
							'sat1_barang' => $this->input->post('sat1'),
							'sat2_barang' => $this->input->post('sat2'),
							'hpp_barang' => $this->input->post('hpp_barang'),
							'harga_barang' => $this->input->post('harga_barang'),
							'updated_barang' => date('Y-m-d')							
							 );
				$sql = $this->M_stok->e_barang($id, $data);
				$allsql = array($sql);
					if($allsql){ // Jika sukses
						echo "<script>alert('Data berhasil diubah');window.location = '".base_url('stok/view_barang')."';</script>";
					}else{ // Jika gagal
						echo "<script>alert('Data gagal diubah');window.location = '".base_url('stok/u_barang')."';</script>";
					}
				}else{
					echo '<script language="javascript">';
					echo 'alert("Maaf Nama Barang Sudah Ada")';
					echo '</script>';
					echo '<script language="javascript">';
					echo 'window.location=("'.site_url('stok/view_barang').'")';
					echo '</script>';
				}
		}else{
			echo "<script>alert('Maaf Nama Barang tidak ditemukan');window.location = '".base_url('stok/view_barang')."';</script>";
		}
	}

	public function h_barang($id)
	{
		$sql = $this->M_stok->h_barang($id);
		$allsql = array($sql);
		if($allsql){ // Jika sukses
			echo "<script>alert('Data berhasil di hapus');window.location = '".base_url('stok/view_barang')."';</script>";
		}else{ // Jika gagal
			echo "<script>alert('Data gagal di hapus');window.location = '".base_url('stok/view_barang')."';</script>";
		}
	}



	// ----------------------------------------------
	// =========================================================================================================================================
	// =========================================================== PESANAN =====================================================================
	// ------------------ Baru ----------------------
	public function view_pesbaru()
	{
		$data['menutitle'] = 'Data Pemesanan Baru';
		$data['menu'] = 'Pemesanan';
		$data['submenu'] = 'Pesanana Baru';

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
		$data['submenu'] = 'Detail Pesanana Baru';

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
		$data['submenu'] = 'Tambah Pesanan Baru';

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
				echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('stok/view_pesbaru')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".base_url('stok/view_pesbaru')."';</script>";
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
		$this->form_validation->set_rules('','','required');
		if($this->form_validation->run() == TRUE){
			$cek = $this->db->query("SELECT * where id_barang='".$this->input->post('id_barang',TRUE)."'")->num_rows();
			if($cek <= 0){
				$data = array(	'id_barang'		=> $this->input->post('id_jnsbrng'),
								'tgl_dtl_perlu' => $this->input->post('id_group'),
								'jml_dtl_minta' => $this->input->post('nama_barang'),
								'ket_dtl_minta' => $this->input->post('kel_barang'),							
							 );
				$sql = $this->M_stok->e_pesbar($id, $data);
				$allsql = array($sql);
					if($allsql){ // Jika sukses
						echo "<script>alert('Data berhasil diubah');window.location = '".base_url('stok/view_barang')."';</script>";
					}else{ // Jika gagal
						echo "<script>alert('Data gagal diubah');window.location = '".base_url('stok/u_barang')."';</script>";
					}
				}else{
					echo '<script language="javascript">';
					echo 'alert("Maaf Nama Barang Sudah Ada")';
					echo '</script>';
					echo '<script language="javascript">';
					echo 'window.location=("'.site_url('stok/view_barang').'")';
					echo '</script>';
				}
		}else{
			echo "<script>alert('Maaf Nama Barang tidak ditemukan');window.location = '".base_url('stok/view_barang')."';</script>";
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
}

/* End of file stok.php */
/* Location: ./application/controllers/stok.php */