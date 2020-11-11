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
	function get_bagian()
	{
		$sql = "SELECT * from tbl_bagian as a join tbl_unit as b on a.id_unit = b.id_unit order by a.nm_bagian asc";
		$data = $this->db->query($sql);
		return $data->result(); 
	}
	function get_brngakt()
	{
		$sql = "SELECT * from tbl_barang_akutansi as a join tbl_jenis_barang as b on a.id_jnsbrng = b.id_jnsbrng join tbl_unit order by a.nm_jnsbrngakt asc";
		$data = $this->db->query($sql);
		return $data->result(); 
	}
	function get_jenis_barang()
	{
		return $this->db->order_by('abs(id_jnsbrng) asc')->get('tbl_jenis_barang'); 
	}
	function get_grpmesin()
	{
		return $this->db->where('hapus_grpmesin','N')->order_by('id_grpmesin','asc')->get('tbl_group_mesin');
	}
	function get_idsupplier()
	{
		return $this->db->order_by('id_supplier','asc')->get('tbl_supplier');
	}
	function get_units()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_unit");
		return $hasil;
	}
	function get_supplier()
	{
		$sql = "SELECT id_supplier,nm_supplier
				FROM tbl_supplier";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function get_notabeli()
	{
		$sql = "SELECT a.id_pembelian,a.nota_beli,a.id_unit,c.nm_unit,a.id_bagian,b.nm_bagian
				FROM tbl_pembelian AS a
				JOIN tbl_bagian AS b ON a.id_bagian=b.id_bagian
				JOIN tbl_unit AS c ON a.id_unit=c.id_unit";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function get_dtlbeli()
	{
				$sql = "SELECT a.id_dtl_pembelian,a.id_pembelian,a.id_barang,b.nm_barang,b.id_group,c.nm_group,b.id_jnsbrngakt,d.no_jnsbrngakt,d.nm_jnsbrngakt,a.nota_dtl_beli,a.ppn_dtl_beli,a.total_dtl_beli,a.totalhrg_dtl_beli,a.hrg_renc_beli,a.ket_dtl_beli,
					b.sat1_barang,b.sat2_barang,e.nm_satuan AS nm_satuan1,g.nm_satuan AS nm_satuan2,a.id_user
				FROM tbl_dtl_pembelian AS a
				JOIN tbl_nama_barang AS b ON a.id_barang=b.id_barang
				JOIN tbl_group AS c ON b.id_group=c.id_group
				JOIN tbl_barang_akutansi AS d ON b.id_jnsbrngakt=d.id_jnsbrngakt
				JOIN tbl_satuan AS e ON b.sat1_barang=e.id_satuan
				JOIN tbl_satuan AS g ON b.sat2_barang=g.id_satuan
				JOIN tbl_pembelian AS f ON a.id_pembelian=f.id_pembelian
				WHERE f.selesai_beli='T'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	function get_rptrm($id)
	{
		$sql = "SELECT subtotal_terima,ppn_terima,totalharga_terima FROM tbl_penerimaan WHERE id_penerimaan='$id'";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function get_suppliercek()
	{
		$sql = "SELECT id_supplier,nm_supplier,attn_supplier,almt_supplier FROM tbl_supplier order by ABS(id_supplier) asc ";
		$data = $this->db->query($sql);
		return $data->result();
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
		// ------------ Kode Rekening Akuntansi ---------------
		public function v_grpmesin()
		{
			$hasil = $this->db->Where('hapus_grpmesin', 'N')->order_by('abs(nm_grpmesin) asc')->get('tbl_group_mesin');
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function s_grpmesin($data)
		{
			$this->db->insert('tbl_group_mesin', $data);
		}

		public function ve_grpmesin($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_group_mesin');
			$this->db->where('id_grpmesin', $id);
			$hasil = $this->db->get();
			if($hasil->num_rows()>0){
				return $hasil->result();
			}else{
				return array();
			}
		}

		public function e_grpmesin($id,$data)
		{
			$this->db->where('id_grpmesin',$id)->update('tbl_group_mesin', $data);
		}

		public function h_grpmesin($id,$data)
		{
			$this->db->where('id_grpmesin',$id)->update('tbl_group_mesin', $data);
		}
	// ----------------------------------------------------
	// ---------------- Jenis Barang Akuntansi ------------
		public function v_jenisbrngakt()
		{
			$sql = "SELECT a.id_jnsbrngakt,a.no_jnsbrngakt,a.nm_jnsbrngakt,e.nm_grpmesin,b.nm_jnsbrng,c.nm_bagian,d.id_rekening,d.nm_rekening FROM tbl_barang_akutansi as a join tbl_jenis_barang as b on a.id_jnsbrng=b.id_jnsbrng join tbl_bagian as c on a.id_bagian=c.id_bagian join tbl_rekening as d on a.no_rekening=d.no_rekening join tbl_group_mesin as e on a.grpmesin_jnsbrngakt=e.id_grpmesin order by a.no_jnsbrngakt asc";
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
	// ---------------- Jenis Barang Akuntansi ------------
		public function v_brngakt()
		{
			$sql = "SELECT a.id_barang,a.nm_barang,b.nm_jnsbrng,c.nm_satuan,d.no_jnsbrngakt,d.nm_jnsbrngakt,e.id_rekening
					FROM tbl_nama_barang AS a 
					 JOIN tbl_jenis_barang AS b ON a.id_jnsbrng=b.id_jnsbrng
					 JOIN tbl_satuan AS c ON a.sat1_barang=c.id_satuan
					LEFT JOIN tbl_barang_akutansi AS d ON a.id_jnsbrngakt=d.id_jnsbrngakt
					LEFT JOIN tbl_rekening AS e ON d.no_rekening=e.no_rekening
					ORDER BY a.id_barang ASC, ABS(a.nm_barang)";
			$data = $this->db->query($sql);
			return $data->result();
		}
		
		function cari_kodeakt()
		{
			$hasil = $this->db->query("SELECT a.id_jnsbrngakt,a.nm_jnsbrngakt,a.no_rekening,b.id_rekening
							FROM tbl_barang_akutansi AS a
							JOIN tbl_rekening AS b ON a.no_rekening=b.no_rekening
							ORDER bY a.id_jnsbrngakt asc");
			return $hasil; 
		}

		function v_edit_barangakt($id,$data)
		{
		$this->db->where('id_barang', $id)
				 ->update('tbl_nama_barang',$data);
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

	// ============================================================ Transaksi =================================================================
	// --------------------- Penerimaan -------------------------
	public function v_penerimaan()
	{
		$sql = "SELECT d.id_dtl_penerimaan,a.id_penerimaan,a.nota_terima,a.id_pembelian,e.nota_beli,a.tgl_terima,a.id_supplier,
				b.nm_supplier,a.id_bagian,c.nm_bagian,a.srtjalan_terima,
				a.tgljalan_terima,a.tgljt_terima,a.ket_terima
				FROM tbl_penerimaan AS a
				JOIN tbl_supplier AS b ON a.id_supplier=b.id_supplier
				JOIN tbl_bagian AS c ON a.id_bagian=c.id_bagian
				JOIN tbl_dtl_penerimaan AS d ON a.id_penerimaan=a.id_penerimaan
				JOIN tbl_pembelian AS e ON a.id_pembelian=e.id_pembelian
				GROUP BY a.id_penerimaan
				order by a.tgl_terima desc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function k_penerimaan()
	{
 		$CI =& get_instance();
		$CI->load->database('default');
		//rancangan kode GL
		$kode_TR="TR".date('ym')."%";
		$sql="SELECT SUBSTRING(MAX(id_penerimaan),8,4) AS maxNo FROM tbl_penerimaan where id_penerimaan like('$kode_TR')";
		$row = $CI->db->query($sql);
		foreach ($row->result_array() as $rowmax)
		{	
		}
		//buat noPO baru dengan noPO terbesar+1
		$noTR_tmp		=$rowmax['maxNo'];
		$noTR			=$noTR_tmp+1;	
		$kode_tanggal	=date("ym");
		if(strlen($noTR)==1){
			$kode_penerimaan="TR".$kode_tanggal."000".$noTR;
		}elseif(strlen($noTR)==2){
			$kode_penerimaan="TR".$kode_tanggal."00".$noTR;
		}elseif(strlen($noTR)==3){
			$kode_penerimaan="TR".$kode_tanggal."0".$noTR;
		}elseif(strlen($noTR)==4){
			$kode_penerimaan="TR".$kode_tanggal.$noTR;
		}
		
		return $kode_penerimaan;
	}

	function s_penerimaan($data)
	{
		return $this->db->insert('tbl_penerimaan', $data);
	}
	function s_dtl_penerimaan_batch($data)
	{
		return $this->db->insert_batch('tbl_dtl_penerimaan', $data);
	}
	function v_dtl_idtrm($id)
	{
		$this->db->select('a.id_penerimaan,a.tgl_terima,a.nota_terima,b.nm_supplier');
		$this->db->from('tbl_penerimaan as a');
		$this->db->join('tbl_supplier as b', 'a.id_supplier = b.id_supplier');
		$this->db->where('a.id_penerimaan', $id);
		$this->db->limit(1);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function v_dtl_penerimaan($id)
	{
		$this->db->select('a.id_dtl_penerimaan,a.id_penerimaan,b.nm_barang,c.no_jnsbrngakt,a.jml1_dtlterima,a.tgl_dtlterima,
		a.harga_dtlterima,a.ppn_dtlterima,a.subtotal_dtlterima,a.totalharga_dtlterima');
		$this->db->from('tbl_dtl_penerimaan as a');
		$this->db->join('tbl_nama_barang as b', 'a.id_barang = b.id_barang');
		$this->db->join('tbl_barang_akutansi as c', 'a.id_jnsbrngakt = c.id_jnsbrngakt');
		$this->db->where('a.id_penerimaan', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function ve_penerimaan($id)
	{
		$this->db->select('a.id_penerimaan,a.tgl_terima,a.nota_terima,a.id_supplier,b.nm_supplier,a.nota_beli,a.id_pembelian,a.nota_cek,a.tgl_cek,a.id_unit,c.nm_unit,a.srtjalan_terima,a.tgljalan_terima,a.id_bagian,d.nm_bagian,a.id_jnsbrng,a.tgljt_terima,a.ket_terima');
		$this->db->from('tbl_penerimaan as a');
		$this->db->join('tbl_supplier as b', 'a.id_supplier = b.id_supplier');
		$this->db->join('tbl_unit as c', 'a.id_unit = c.id_unit');
		$this->db->join('tbl_bagian as d', 'a.id_bagian = d.id_bagian');
		$this->db->join('tbl_jenis_barang as e', 'a.id_jnsbrng = e.id_jnsbrng');
		$this->db->where('a.id_penerimaan', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}

	}

	function ve_dtlpenerimaan($id)
	{
		$this->db->select('a.id_dtl_penerimaan,a.id_penerimaan,a.tgl_dtlterima,a.jml1_dtlterima,a.jml2_dtlterima,a.sat1_dtlterima,g.nm_satuan AS nm_satuan1,a.sat2_dtlterima,h.nm_satuan  AS nm_satuan2,a.harga_dtlterima,a.subtotal_dtlterima,a.ppn_dtlterima,a.totalharga_dtlterima, a.id_dtl_pembelian,a.id_barang,d.nm_barang, a.id_group,e.nm_group,a.id_jnsbrngakt,f.no_jnsbrngakt');
		$this->db->from('tbl_dtl_penerimaan as a');
		$this->db->join('tbl_penerimaan as b', 'a.id_penerimaan=b.id_penerimaan');
		$this->db->join('tbl_dtl_pembelian as c', 'a.id_dtl_pembelian=c.id_dtl_pembelian');
		$this->db->join('tbl_nama_barang as d', 'a.id_barang=d.id_barang');
		$this->db->join('tbl_group as e', 'a.id_group=e.id_group');
		$this->db->join('tbl_barang_akutansi as f', 'a.id_jnsbrngakt=f.id_jnsbrngakt');
		$this->db->join('tbl_satuan as g', 'a.sat1_dtlterima=g.id_satuan');
		$this->db->join('tbl_satuan as h', 'a.sat2_dtlterima=h.id_satuan');
		$this->db->where('a.id_dtl_penerimaan', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}
	function e_penerimaan($id,$data)
	{
		$this->db->where('id_penerimaan',$id)->update('tbl_penerimaan', $data);
	}
	function e_dtl_penerimaan($id,$data)
	{
		$this->db->where('id_penerimaan',$id)->update('tbl_dtl_penerimaan', $data);
	}

	function e_dtlpenerimaan($id,$id2,$ppn_terima,$subtotal_dtlterima,$totalharga_dtlterima)
	{
		$this->db->query( "update tbl_penerimaan a join tbl_dtl_penerimaan b on a.id_penerimaan=b.id_penerimaan
	 					   set a.subtotal_terima 		= (a.subtotal_terima-b.subtotal_dtlterima)+$subtotal,
	 					   a.ppn_terima			= (a.ppn_terima-b.ppn_dtlterima)+$ppn,
						   a.totalharga_terima 	= (a.totalharga_terima-b.totalharga_dtlterima)+$total
	 					   where a.id_penerimaan = '$id' and b.id_dtl_penerimaan = '$id2'");
	}

	function h_penerimaan($id)
	{
		$this->db->where('id_penerimaan', $id)->delete('tbl_penerimaan');
	}
	function h_dtlpenerimaan($id)
	{
		$this->db->where('id_penerimaan', $id)->delete('tbl_dtl_penerimaan');
	}
	// ------------------------------------------------------------
	// ---------------------- Pengecekan --------------------------
	public function v_pengetesan()
	{
		$sql = "SELECT a.id_cek,a.tgl_cek,a.nota_cek,a.srtjalan_cek,a.tgljalan_cek,a.ket_cek,a.selesai_cek,b.nm_supplier,e.nota_beli,c.nm_bagian,d.nm_unit
				FROM tbl_pengetesan AS a
				JOIN tbl_supplier AS b ON a.id_supplier=b.id_supplier
				JOIN tbl_bagian AS c ON a.id_bagian=c.id_bagian
				JOIN tbl_unit AS d ON a.id_unit=d.id_unit
				JOIN tbl_pembelian AS e ON a.id_pembelian=e.id_pembelian
				WHERE a.hapus = 'T'
				GROUP BY a.id_cek
				order by a.tgl_cek desc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function k_pengetesan()
	{
 		$CI =& get_instance();
		$CI->load->database('default');
		//rancangan kode GL
		$kode_CK="CK".date('ym')."%";
		$sql="SELECT SUBSTRING(MAX(id_cek),9,4) AS maxNo FROM tbl_pengetesan where id_cek like('$kode_CK')";
		$row = $CI->db->query($sql);
		foreach ($row->result_array() as $rowmax)
		{	
		}
		//buat noPO baru dengan noPO terbesar+1
		$noCK_tmp		=$rowmax['maxNo'];
		$noCK			=$noCK_tmp+1;	
		$kode_tanggal	=date("ym");
		if(strlen($noCK)==1){
			$kode_pengetesan="CK".$kode_tanggal."0000".$noCK;
		}elseif(strlen($noCK)==2){
			$kode_pengetesan="CK".$kode_tanggal."000".$noCK;
		}elseif(strlen($noCK)==3){
			$kode_pengetesan="CK".$kode_tanggal."00".$noCK;
		}elseif(strlen($noCK)==4){
			$kode_pengetesan="CK".$kode_tanggal."0".$noCK;
		}elseif(strlen($noCK)==5){
			$kode_pengetesan="CK".$kode_tanggal.$noCK;
		}
		
		return $kode_pengetesan;
	}

	function s_pengetesan($data)
	{
		return $this->db->insert('tbl_pengetesan', $data);
	}
	function s_dtl_pengetesan_batch($data)
	{
		return $this->db->insert_batch('tbl_dtl_pengetesan', $data);
	}

	function v_dtl_idcek($id)
	{
		$this->db->select('a.id_cek,a.tgl_cek,a.nota_cek,b.nm_supplier');
		$this->db->from('tbl_pengetesan as a');
		$this->db->join('tbl_supplier as b', 'a.id_supplier = b.id_supplier');
		$this->db->where('a.id_cek', $id);
		$this->db->limit(1);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function v_dtl_pengetesan($id)
	{
		$this->db->select('a.id_dtl_cek,a.id_cek,a.id_barang,b.nm_barang,a.jml_cek1,c.nm_satuan as sat1,a.jml_cek2,d.nm_satuan as sat2,a.tgl_dtl_lunas,a.ket_dtl_cek,a.nota_dtl_beli');
		$this->db->from('tbl_dtl_pengetesan as a');
		$this->db->join('tbl_nama_barang as b', 'a.id_barang = b.id_barang');
		$this->db->join('tbl_satuan as c', 'b.sat1_barang = c.id_satuan');
		$this->db->join('tbl_satuan as d', 'b.sat2_barang = d.id_satuan');
		$this->db->where('a.id_cek', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function ve_pengetesan($id)
	{
		$this->db->select('a.id_cek,a.nota_cek,a.tgl_cek,a.id_pembelian,a.nota_beli,a.id_supplier,b.nm_supplier,a.id_bagian,d.nm_bagian,a.id_unit,c.nm_unit,a.srtjalan_cek,a.tgljalan_cek,a.ket_cek');
		$this->db->from('tbl_pengetesan as a');
		$this->db->join('tbl_supplier as b', 'a.id_supplier = b.id_supplier');
		$this->db->join('tbl_unit as c', 'a.id_unit = c.id_unit');
		$this->db->join('tbl_bagian as d', 'a.id_bagian = d.id_bagian');
		$this->db->where('a.id_cek', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function ve_dtl_pengetesan($id)
	{
		$this->db->select('a.id_dtl_cek,a.id_cek,a.id_dtl_pembelian,a.nota_dtl_beli,a.id_barang,b.nm_barang,a.lulus_dtl_cek,a.tgl_dtl_lunas,a.jml_cek1,a.jml_cek2,d.nm_satuan as sat1,e.nm_satuan as sat2,a.ket_dtl_cek');
		$this->db->from('tbl_dtl_pengetesan as a');
		$this->db->join('tbl_nama_barang as b', 'a.id_barang = b.id_barang');
		$this->db->join('tbl_dtl_pembelian as c', 'a.id_dtl_pembelian = c.id_dtl_pembelian');
		$this->db->join('tbl_satuan as d', 'b.sat1_barang = d.id_satuan');
		$this->db->join('tbl_satuan as e', 'b.sat2_barang = e.id_satuan');
		$this->db->where('a.id_dtl_cek', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function e_pengetesan($id,$data)
	{
		$this->db->where('id_cek',$id)->update('tbl_pengetesan', $data);
	}
	function e_pengetesandtl($id,$data)
	{
		$this->db->where('id_cek',$id)->update('tbl_dtl_pengetesan', $data);
	}
	function e_dtl_pengetesan($id,$data)
	{
		$this->db->where('id_dtl_cek',$id)->update('tbl_dtl_pengetesan', $data);
	}
	function v_konftest($id,$data)
	{
		$this->db->where('id_cek', $id)
				 ->update('tbl_pengetesan',$data);
	}

	// fungsi get pengecekan
	function get_cekdtlbeli()
	{
		$sql = "SELECT a.id_dtl_pembelian,a.id_pembelian,a.id_barang,b.nm_barang,b.id_group,a.nota_dtl_beli,a.ket_dtl_beli,b.sat1_barang,b.sat2_barang,e.nm_satuan AS nm_satuan1,g.nm_satuan AS nm_satuan2,a.id_user,d.nm_unit,a.jml_renc_beli
		FROM tbl_dtl_pembelian AS a
		JOIN tbl_nama_barang AS b ON a.id_barang=b.id_barang
		JOIN tbl_satuan AS e ON b.sat1_barang=e.id_satuan
		JOIN tbl_satuan AS g ON b.sat2_barang=g.id_satuan
		JOIN tbl_pembelian AS f ON a.id_pembelian=f.id_pembelian
		JOIN tbl_unit AS d ON f.id_unit=d.id_unit
		WHERE a.lunas_dtl_beli='T'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	function h_pengetesan($id,$data)
	{
		$this->db->where('id_cek',$id)->update('tbl_pengetesan', $data);
	}
	function h_pengetesandtl($id,$data)
	{
		$this->db->where('id_cek',$id)->update('tbl_dtl_pengetesan', $data);
	}
	// ------------------------------------------------------------
	// ---------------------- Bon Barang --------------------------
	public function v_bonbarang()
	{
		$sql = "SELECT a.id_mutasi,a.tgl_mutasi, a.nota_mutasi, b.nm_bagian, c.nm_unit
				FROM tbl_mutasi AS a
				JOIN tbl_bagian AS b ON a.id_bagian=b.id_bagian
				JOIN tbl_unit AS c ON a.id_unit=c.id_unit
				WHERE a.hapus = 'T'
				GROUP BY a.id_mutasi
				order by a.tgl_mutasi desc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	function k_bonbarang()
	{
 		$CI =& get_instance();
		$CI->load->database('default');
		//rancangan kode GL
		$kode_MT="MT".date('ym')."%";
		$sql="SELECT SUBSTRING(MAX(id_mutasi),9,4) AS maxNo FROM tbl_mutasi where id_mutasi like('$kode_MT')";
		$row = $CI->db->query($sql);
		foreach ($row->result_array() as $rowmax)
		{	
		}
		//buat noPO baru dengan noPO terbesar+1
		$noMT_tmp		=$rowmax['maxNo'];
		$noMT			=$noMT_tmp+1;	
		$kode_tanggal	=date("ym");
		if(strlen($noMT)==1){
			$kode_pengetesan="MT".$kode_tanggal."0000".$noMT;
		}elseif(strlen($noMT)==2){
			$kode_pengetesan="MT".$kode_tanggal."000".$noMT;
		}elseif(strlen($noMT)==3){
			$kode_pengetesan="MT".$kode_tanggal."00".$noMT;
		}elseif(strlen($noMT)==4){
			$kode_pengetesan="MT".$kode_tanggal."0".$noMT;
		}elseif(strlen($noMT)==5){
			$kode_pengetesan="MT".$kode_tanggal.$noMT;
		}
		
		return $kode_pengetesan;
	}

	function get_kdbrngaktbon()
	{
		$sql = "SELECT a.id_jnsbrngakt,a.no_jnsbrngakt,a.nm_jnsbrngakt,b.nm_jnsbrng,c.nm_bagian,a.id_bagian
		FROM tbl_barang_akutansi AS a
		JOIN tbl_jenis_barang AS b ON a.id_jnsbrng=b.id_jnsbrng
		JOIN tbl_bagian AS c ON a.id_bagian=c.id_bagian";
		$data = $this->db->query($sql);
		return $data->result();
	}

	function s_bonbarang($data)
	{
		return $this->db->insert('tbl_mutasi', $data);
	}
	function s_dtl_bonbarang_batch($data)
	{
		return $this->db->insert_batch('tbl_dtl_mutasi', $data);
	}

	function v_dtl_idmutasi($id)
	{
		$this->db->select('a.id_mutasi,a.tgl_mutasi,a.nota_mutasi,b.nm_bagian,c.nm_unit');
		$this->db->from('tbl_mutasi as a');
		$this->db->join('tbl_bagian as b', 'a.id_bagian = b.id_bagian');
		$this->db->join('tbl_unit as c', 'a.id_unit = c.id_unit');
		$this->db->where('a.id_mutasi', $id);
		$this->db->limit(1);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function v_dtl_bonbarang($id)
	{
		$this->db->select('a.id_dtlmutasi,a.id_mutasi,b.no_jnsbrngakt,b.nm_jnsbrngakt,a.jml1_dtlmutasi,a.jml2_dtlmutasi,a.ket_dtlmutasi,e.nm_bagian,a.keluar1_dtlmutasi,a.id_kdtransaksi,f.nm_kdtransaksi,a.keluar2_dtlmutasi,c.nm_satuan as sat1,d.nm_satuan as sat2');
		$this->db->from('tbl_dtl_mutasi as a');
		$this->db->join('tbl_barang_akutansi as b', 'a.id_barang = b.id_jnsbrngakt');
		$this->db->join('tbl_satuan as c', 'a.sat1_dtlmutasi = c.id_satuan');
		$this->db->join('tbl_satuan as d', 'a.sat2_dtlmutasi = d.id_satuan');
		$this->db->join('tbl_bagian as e', 'a.id_bagian = e.id_bagian');
		$this->db->join('tbl_kdtransaksi as f', 'a.id_kdtransaksi = f.id_kdtransaksi');
		$this->db->where('a.id_mutasi', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function ve_bonbarang($id)
	{
		$this->db->select('a.id_mutasi,a.nota_mutasi,a.tgl_mutasi,a.id_unit,a.id_bagian,b.nm_unit,c.nm_bagian');
		$this->db->from('tbl_mutasi as a');
		$this->db->join('tbl_unit as b', 'a.id_unit = b.id_unit');
		$this->db->join('tbl_bagian as c', 'a.id_bagian = c.id_bagian');
		$this->db->where('a.id_mutasi', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function ve_dtl_bonbarang($id)
	{
		$this->db->select('a.id_dtlmutasi,a.id_mutasi,a.id_barang,b.nm_jnsbrngakt,a.id_kdtransaksi,d.nm_kdtransaksi,a.jml1_dtlmutasi,a.jml2_dtlmutasi,a.sat1_dtlmutasi,a.keluar1_dtlmutasi,a.keluar2_dtlmutasi,a.ket_dtlmutasi,a.sat2_dtlmutasi,a.id_bagian,c.nm_bagian');
		$this->db->from('tbl_dtl_mutasi as a');
		$this->db->join('tbl_barang_akutansi as b', 'a.id_barang = b.id_jnsbrngakt');
		$this->db->join('tbl_bagian as c', 'a.id_bagian = c.id_bagian');
		$this->db->join('tbl_kdtransaksi as d', 'a.id_kdtransaksi = d.id_kdtransaksi');
		$this->db->where('a.id_dtlmutasi', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	function e_bonbarang($id,$data)
	{
		$this->db->where('id_mutasi',$id)->update('tbl_mutasi', $data);
	}
	function e_bonbarangdtl($id,$data)
	{
		$this->db->where('id_mutasi',$id)->update('tbl_dtl_mutasi', $data);
	}
	function e_dtl_bonbarang($id,$data)
	{
		$this->db->where('id_dtlmutasi',$id)->update('tbl_dtl_mutasi', $data);
	}

	function h_bonbarang($id,$data)
	{
		$this->db->where('id_mutasi',$id)->update('tbl_mutasi', $data);
	}
	function h_bonbarangdtl($id,$data)
	{
		$this->db->where('id_mutasi',$id)->update('tbl_dtl_mutasi', $data);
	}
	// ------------------------------------------------------------
	// ========================================================================================================================================
}

/* End of file M_gudang.php */
/* Location: ./application/models/M_gudang.php */