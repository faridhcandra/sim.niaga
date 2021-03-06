<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah Pengetesan</h3>
			</div>
			<div class="card-body">
				<?php echo validation_errors();?>
				<?php echo form_open('gudang/pengetesan_t');?>
					<div class="row">
						<div class="col-md-12">
						<table width="100%"> 
							<tr>
								<td><label style="font-size: 11pt;">No Test</label></td>
								<td>
									<input class="form-control form-control-sm" type="text" name="notacek" required="">
									<input class="form-control form-control-sm" type="text" name="kode" value="<?php echo $kode?>" hidden=""> 
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Leveransir</label></td>
								<td colspan="3">
									<div class="input-group-prepend">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-ceksupplier">Cari</button>
									<input class="form-control form-control-sm col-md-3" type="text" name="kdlev" required="" readonly="" id="kd_ceklever">
									<input class="form-control form-control-sm" type="text" readonly="" id="nm_ceklever">
									</div>
								</td>
							</tr>
							<tr>
								<td><label style="font-size: 11pt;">Tanggal Test</label></td>
								<td>
									<input class="form-control form-control-sm" type="date" name="tglcek" required="">
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Srt Jln/ Nota/ Faktur</label></td>
								<td>
									<input class="form-control form-control-sm" type="text" name="nosurat" required="">
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Tanggal Jalan</label></td>
								<td>
									<input class="form-control form-control-sm" type="date" name="tglcek_surat" required="">
								</td>
							</tr>
							<tr>
								<td><label style="font-size: 11pt;">No Pembelian</label></td>
								<td>
									<div class="input-group-prepend">
										<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-cekpembelian">Cari</button>
										<input class="form-control form-control-sm" type="text" name="ceknotabeli" required="cekkdbeli" readonly="" id="nota_belicek">
										<input class="form-control form-control-sm" type="text" name="cekkdbeli" hidden="" id="kd_cekpemb">
									</div>
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Unit</label></td>
								<td>
									<input class="form-control form-control-sm" type="text" name="cekkdunit" hidden="" id="id_unitcek">
									<input class="form-control form-control-sm" type="text" required="" readonly="" id="nm_unitcek">
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Bagian</label></td>
								<td>
									<input class="form-control form-control-sm" type="text" name="cekkdbagian" hidden="" id="id_bagcek">
									<input class="form-control form-control-sm" type="text" required="" readonly="" id="nm_bagcek">
								</td>
							</tr>
							<tr>
								<td><label style="font-size: 11pt;">Keterangan</label></td>
								<td colspan="3">
									<input class="form-control form-control-sm" type="text" name="cekket">
								</td>
							</tr>
						</table>
						</div>
					</div>
					</br>
					<div class="row">
						<div class="col-md-3"><p><i><b>Detail Pengetesan Barang</b></i></p></div>
						<div class="col-md-9">
							<hr style="border: 1px solid blue;">
						</div>
					</div>
					<br>
					<div id="insert-cek"></div>
					<div class="row">
						<div class="col-md-11">
							<input type="button" class="btn btn-dark btn-sm" value="Tambah Form" id="tambah-cek">
							<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-cek">
						</div>
					</div>
					<hr>
					<b><i style="font-size: 14px;">* Silahkan klik (Tambah Form) untuk Menambahkan detail pengetesan barang</i></b>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group float-right">
								<a href="<?php echo site_url('gudang/v_pengetesan');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
								<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
							</div>
						</div>
					</div>
				</form>
				<input type="hidden" id="jmlcek" value="1"> 
			</div>
			</div>         
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
 	$(document).ready(function(){
	// tabel leveransir
	$(function () {
		$("#tblceklever").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
	// get datatabel lebveransir 
	$(document).on('click', '#pilih_ceklever', function (e) {
		document.getElementById("kd_ceklever").value 		= $(this).attr('id_ceklever');
		document.getElementById("nm_ceklever").value 		= $(this).attr('nm_ceklever');
		$('#modal-ceksupplier').modal('hide');
	});
	// tabel Pembelian
	$(function () {
		$("#tblcekpemb").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
	// get datatabel Pembelian 
	$(document).on('click', '#pilih_cekpemb', function (e) {
		document.getElementById("kd_cekpemb").value 	= $(this).attr('id_cekpemb');
		document.getElementById("nota_belicek").value 	= $(this).attr('nota_cekpemb');
		document.getElementById("id_bagcek").value 		= $(this).attr('id_cekbag');
		document.getElementById("id_unitcek").value 	= $(this).attr('id_cekunit');
		document.getElementById("nm_bagcek").value 		= $(this).attr('nm_cekbag');
		document.getElementById("nm_unitcek").value 	= $(this).attr('nm_cekunit');
		$('#modal-cekpembelian').modal('hide');
	});
	// -----------------------------------------------------------------------------------------------------------------------------------
	// Tambah Pemesanan
    $("#tambah-cek").click(function(){ // Ketika tombol Tambah Data Form di klik
    let jumlah = parseInt($("#jmlcek").val()); // Ambil jumlah data form pada textbox pesanan baru
    let nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

    // Kita akan menambahkan form dengan menggunakan append
    // pada sebuah tag div yg kita beri id 
    $("#insert-cek").append("<div class='row'>"
	+	"<div class='col-md-12'>"
	+	"<table width='100%'>"
	+		"<tr>"
	+			"<td width='12%'><label style='font-size: 11pt;'>No Dtl Pembelian</label></td>"
	+			"<td width='25%'>"
	+				"<div class='input-group-prepend'>"
	+					"<button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modal-cekdtlpembelian"+nextform+"'>Cari</button>"
	+					"<input class='form-control form-control-sm' type='text' name='kdcekdtlpemb[]' required='' readonly='' hidden='' id='id_cekdtlpemb'>"
	+					"<input class='form-control form-control-sm' type='text' name='notadtlpembcek[]' readonly='' id='nota_cekdtlpemb'>"
	+				"</div>"
	+			"</td>"
	+			"<td width='10%' align='right'><label style='font-size: 11pt; margin-right: 10%;'>Barang</label></td>"
	+			"<td width='45%'>"
	+				"<div class='input-group-prepend'>"
	+				"<input class='form-control form-control-sm col-md-4' type='text' name='kdbrngcek[]' required='' readonly='' id='id_cekbrngdtl'>"
	+				"<input class='form-control form-control-sm ' type='text' readonly='' readonly='' id='nm_cekbrngdtl'>"
	+				"</div>"
	+			"</td>"
	+		"</tr>"
	+		"<tr>"
	+			"<td><label style='font-size: 11pt;'>Jumlah 1</label></td>"
	+			"<td>"
	+				"<div class='input-group-prepend'>"
	+					"<input class='form-control form-control-sm' type='text' required='' readonly='' id='id_ceksatpemb' hidden=''>"
	+					"<input class='form-control form-control-sm col-md-6' type='number' name='jmldtlpembcek1[]' id='jml_cekdtlpemb'>"
	+					"<input class='form-control form-control-sm' type='text' readonly='' id='nm_ceksatpemb'>"
	+				"</div>"
	+			"</td>"
	+			"<td align='right'><label style='font-size: 11pt; margin-right: 10%;'>Jumlah 2</label></td>"
	+			"<td>"
	+				"<div class='input-group-prepend'>"
	+					"<input class='form-control form-control-sm' type='text' readonly='' id='id_ceksatpemb2' hidden=''>"
	+					"<input class='form-control form-control-sm col-md-4' type='number' name='jmldtlpembcek2[]' id='jml_cekdtlpemb2'>"
	+					"<input class='form-control form-control-sm col-md-4' type='text' readonly='' id='nm_ceksatpemb2'>"
	+				"</div>"
	+			"</td>"
	+		"</tr>"
	+		"<tr>"
	+			"<td><label style='font-size: 11pt;'>Lulus</label></td>"
	+			"<td>"
	+					"<select class='form-control form-control-sm' name='lulusdtlcek[]'>"
	+						"<option value='' selected>-- Pilih pengetesan --</option>"
	+						"<option value='Y'>Lulus</option>"
	+						"<option value='T'>Tidak Lulus</option>"
	+					"</select>"
	+			"</td>"
	+			"<td align='right'><label style='font-size: 11pt; margin-right: 10%;'>Tanggal Lulus</label></td>"
	+			"<td>"
	+				"<input class='form-control form-control-sm col-md-4' type='date' name='tgldtlcek[]' id='tgl_cekdtlpemb'>"
	+			"</td>"
	+		"</tr>"
	+		"<tr>"
	+			"<td><label style='font-size: 11pt;'>Ket. pengetesan</label></td>"
	+			"<td colspan='2'>"
	+				"<input class='form-control form-control-sm' type='text' name='ketdtlcek[]' id='ket_cekdtlpemb'>"
	+			"</td>"
	+		"</tr>"
	+	"</table>"
	+	"</div>"
	+"</div>"
	//<!-- modal -->
	+"<div class='modal fade' id='modal-cekdtlpembelian"+nextform+"'>"
	+    "<div class='modal-dialog modal-lg text-sm'>"
	+      "<div class='modal-content'>"
	+        "<div class='modal-header'>"
	+          "<h5 class='modal-title'>Cari Data Pembelian</h5>"
	+          "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
	+            "<span aria-hidden='true'>&times;</span>"
	+          "</button>"
	+        "</div>"
	+        "<div class='modal-body'>"
	+        	"<table id='tblcekdtlpemb"+nextform+"' class='table table-sm table-bordered table-responsive-sm table-hover dataTable' role='grid'>"
	+        		"<thead>"
	+        			"<tr>"
	+        				"<th>No Detail Pembelian</th>"
	+        				"<th>Nama Barang</th>"
	+	        			"<th>Unit</th>"
	+	        			"<th>Jumlah</th>"
	+        			"</tr>"
	+        		"</thead>"
	+        		"<tbody>"
	+        		"<?php foreach ($get_dtlbeli as $a) { ?>"
	+        			"<tr id='pilih_cekdtlpemb"+nextform+"'"
	+        					"id_cekdtlbeli 		= '<?php echo $a->id_dtl_pembelian?>'"
	+        					"nota_cekdtlbeli 	= '<?php echo $a->nota_dtl_beli?>'"
	+        					"id_cekbrngbeli 	= '<?php echo $a->id_barang?>'"
	+        					"nm_cekbrngbeli 	= '<?php echo $a->nm_barang?>'"
	+        					"jml_cekbrngbeli	= '<?php echo $a->jml_renc_beli?>'"
	+        					"sat_cekbrngbeli 	= '<?php echo $a->sat1_barang?>'"
	+        					"nmsat_cekbrngbeli 	= '<?php echo $a->nm_satuan1?>'"
	+        					"sat_cekbrngbeli2	= '<?php echo $a->sat2_barang?>'"
	+        					"nmsat_cekbrngbeli2 = '<?php echo $a->nm_satuan2?>'"
	+        					"ket_cekdtlbeli 	= '<?php echo $a->ket_dtl_beli?>'"
	+        			">"
	+        				"<td><?php echo $a->nota_dtl_beli?></td>"
	+        				"<td><?php echo $a->nm_barang?></td>"
	+        				"<td><?php echo $a->nm_unit?></td>"
	+        				"<td><?php echo $a->jml_renc_beli?></td>"
	+        			"</tr>"
	+        		"<?php } ?>"
	+        		"</tbody>"
	+        	"</table>"
	+        "</div>"
	+        "<div class='modal-footer justify-content-between' style='font-size: 11pt;'>"
	+          "<b><i>* Pilih No Pembelian dengan cara klik pada kolom data</i></b>"
	+        "</div>"
	+      "</div>"
	+    "</div>"
	+ "</div>"
	// <!-- /.modal -->
	+"<hr>"
    );
	// set id baru general
	document.getElementById("id_cekdtlpemb").id 	= "id_cekdtlpemb"+nextform;
	document.getElementById("nota_cekdtlpemb").id 	= "nota_cekdtlpemb"+nextform;
	document.getElementById("id_cekbrngdtl").id 	= "id_cekbrngdtl"+nextform;
	document.getElementById("nm_cekbrngdtl").id 	= "nm_cekbrngdtl"+nextform;
	document.getElementById("jml_cekdtlpemb").id 	= "jml_cekdtlpemb"+nextform;
	document.getElementById("id_ceksatpemb").id 	= "id_ceksatpemb"+nextform;
	document.getElementById("nm_ceksatpemb").id 	= "nm_ceksatpemb"+nextform;
	document.getElementById("id_ceksatpemb2").id 	= "id_ceksatpemb2"+nextform;
	document.getElementById("jml_cekdtlpemb2").id 	= "jml_cekdtlpemb2"+nextform;
	document.getElementById("nm_ceksatpemb2").id 	= "nm_ceksatpemb2"+nextform;
	document.getElementById("ket_cekdtlpemb").id 	= "ket_cekdtlpemb"+nextform;

	// tabel Detail Pembelian
	$(function () {
		$("#tblcekdtlpemb"+nextform).DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
	// get datatabel detail Pembelian 
	$(document).on('click', '#pilih_cekdtlpemb'+nextform, function (e) {
		document.getElementById("id_cekdtlpemb"+nextform).value 	= $(this).attr('id_cekdtlbeli');
		document.getElementById("nota_cekdtlpemb"+nextform).value 	= $(this).attr('nota_cekdtlbeli');
		document.getElementById("id_cekbrngdtl"+nextform).value 	= $(this).attr('id_cekbrngbeli');
		document.getElementById("nm_cekbrngdtl"+nextform).value 	= $(this).attr('nm_cekbrngbeli');
		document.getElementById("jml_cekdtlpemb"+nextform).value 	= $(this).attr('jml_cekbrngbeli');
		document.getElementById("id_ceksatpemb"+nextform).value 	= $(this).attr('sat_cekbrngbeli');
		document.getElementById("nm_ceksatpemb"+nextform).value 	= $(this).attr('nmsat_cekbrngbeli');
		document.getElementById("id_ceksatpemb2"+nextform).value 	= $(this).attr('sat_cekbrngbeli2');
		document.getElementById("nm_ceksatpemb2"+nextform).value 	= $(this).attr('nmsat_cekbrngbeli2');
		document.getElementById("ket_cekdtlpemb"+nextform).value 	= $(this).attr('ket_cekdtlbeli');
		$('#modal-cekdtlpembelian'+nextform).modal('hide');
	});
	// Set jumlah Form
	$("#jmlcek").val(nextform);
	});
	// Buat fungsi untuk mereset form ke semula
	$("#reset-cek").click(function() {
		var s = confirm("Yakin Reset?");
		if(s){
	     $("#insert-cek").html(""); // Kita kosongkan isi dari div insert-form
	     $("#jmlcek").val("1"); // Ubah kembali value jumlah form menjadi 1 	     
	    }else{
	   	 return false;
	    }
	});
	// --------------------------------------------------------------------------------------------------------------------------------------------
	});
 </script>

<!-- modal -->
<div class="modal fade" id="modal-ceksupplier">
    <div class="modal-dialog modal-lg text-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Leveransir</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="tblceklever" class="table table-sm table-bordered table-responsive-sm table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>Kode</th>
	        			<th>Nama</th>
	        			<th>Alamat</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_supplier as $a) { ?>
        			<tr id="pilih_ceklever"
						id_ceklever	="<?php echo $a->id_supplier?>"
						nm_ceklever	="<?php echo $a->nm_supplier?>"
        			>
        				<td><?php echo $a->id_supplier?></td>
        				<td><?php echo $a->nm_supplier?></td>
        				<td><?php echo $a->almt_supplier?></td>
        			</tr>
        		<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih kode Leveransir dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
 <!-- /.modal -->
 <!-- modal -->
<div class="modal fade" id="modal-cekpembelian">
    <div class="modal-dialog modal-lg text-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Pembelian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="tblcekpemb" class="table table-sm table-bordered table-responsive-sm table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>No Pembelian</th>
	        			<th>Unit</th>
	        			<th>Bagian</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_notabeli as $a) { ?>
        			<tr id="pilih_cekpemb"
						id_cekpemb		= "<?php echo $a->id_pembelian?>"
						nota_cekpemb	= "<?php echo $a->nota_beli?>"
						id_cekbag		= "<?php echo $a->id_bagian?>"
						id_cekunit		= "<?php echo $a->id_unit?>"
						nm_cekbag		= "<?php echo $a->nm_bagian?>"
						nm_cekunit		= "<?php echo $a->nm_unit?>"
        			>
        				<td><?php echo $a->nota_beli?></td>
        				<td><?php echo $a->nm_unit?></td>
        				<td><?php echo $a->nm_bagian?></td>
        			</tr>
        		<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih No Pembelian dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
<!-- /.modal -->
