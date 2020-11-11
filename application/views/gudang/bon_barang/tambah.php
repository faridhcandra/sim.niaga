<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah Bon Barang</h3>
			</div>
			<div class="card-body">
				<?php echo validation_errors();?>
				<?php echo form_open('gudang/bonbarang_t');?>
					<div class="row">
						<div class="col-md-12">
						<table width="100%"> 
							<tr>
								<td><label style="font-size: 11pt; margin-left: 10%;">No Bon</label></td>
								<td width="25%">
									<input class="form-control form-control-sm" type="text" name="notabon" required="">
									<input class="form-control form-control-sm" type="text" name="kode" value="<?php echo $kode?>" hidden="">  
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Tanggal Bon</label></td>
								<td width="15%">
									<input class="form-control form-control-sm" type="date" name="tglbon" required="">
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Bagian</label></td>
								<td width="20%">
									<!-- <input class="form-control form-control-sm" type="text" name="" required=""> -->
									<div class="input-group-prepend">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-bagian">Cari</button>
									<input class="form-control form-control-sm" type="text" readonly="" name="kdbagbon" id="id_bagian_bon" hidden="">
									<input class="form-control form-control-sm" type="text" readonly="" id="nm_bagian_bon">
									</div>
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Unit</label></td>
								<td width="15%">
									<input class="form-control form-control-sm" type="text" readonly="" name="kdunit_bon" id="id_unit_bon" hidden="">
									<input class="form-control form-control-sm" type="text" readonly="" id="nm_unit_bon">
								</td>
							</tr>
						</table>
						</div>
					</div>
					</br>
					<div class="row">
						<div class="col-md-2"><p><i><b>Detail Bon Barang</b></i></p></div>
						<div class="col-md-10">
							<hr style="border: 1px solid blue;">
						</div>
					</div>
					<br>
					<div id="insert-bon"></div>
					<div class="row">
						<div class="col-md-11">
							<input type="button" class="btn btn-dark btn-sm" value="Tambah Form" id="tambah-bon">
							<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-bon">
						</div>
					</div>
					<hr>
					<b><i style="font-size: 14px;">* Silahkan klik (Tambah Form) untuk Menambahkan detail bon barang</i></b>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group float-right">
								<a href="<?php echo site_url('gudang/v_bonbarang');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
								<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
							</div>
						</div>
					</div>
				</form>
				<input type="hidden" id="jmlbon" value="1"> 
			</div>
			</div>         
		</div>
		</div>
	</div>
</div>
<!-- modal  -->
<!-- ========================================= MODAL CARI BAGIAN =====================================================  -->
	<div class="modal fade" id="modal-bagian">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Cari Bagian</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	<table id="caribagian" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
	        		<thead>
	        			<tr>
		        			<th>Id Bagian</th>
		        			<th>Bagian</th>
		        			<th>Unit</th>
	        			</tr>
	        		</thead>	 
	        		<tbody>
	        		<?php foreach($get_bagian as $c) { ?>
	        			<tr id="pilih_bagian"
							id_cbag ="<?php echo $c->id_bagian?>"
							nm_cbag ="<?php echo $c->nm_bagian?>"
							id_cunit ="<?php echo $c->id_unit?>"
							nm_cunit ="<?php echo $c->nm_unit?>"
	        			>
	        				<td><?php echo $c->id_bagian?></td>
	        				<td><?php echo $c->nm_bagian?></td>
	        				<td><?php echo $c->nm_unit?></td>
	        			</tr>
		        	<?php } ?>
	        		</tbody>
	        	</table>
	        </div>
	        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
	          <b><i>* Pilih Bagian dengan cara klik pada kolom data</i></b>
	        </div>
	      </div>
	    </div>
	 </div>
 <!-- ==================================================================================================================== -->
<!--  /.modal  -->
<script type="text/javascript">
/*================================= MODAL CARI NOTA ========================================*/
	$(document).ready(function(){
		// tabel no permintaan
		$(function () {
			$("#caribagian").DataTable({
			  "deferRender" : true,
			  "processing"  : true,
			  "order"       : [],
			});
		});
		// get datatabel no permintaan 
		$(document).on('click', '#pilih_bagian', function (e) {
			document.getElementById("id_bagian_bon").value 	= $(this).attr('id_cbag');
			document.getElementById("nm_bagian_bon").value 	= $(this).attr('nm_cbag');
			document.getElementById("id_unit_bon").value 	= $(this).attr('id_cunit');
			document.getElementById("nm_unit_bon").value 	= $(this).attr('nm_cunit');
			$('#modal-bagian').modal('hide');
		});

		// Tambah Pemesanan
        $("#tambah-bon").click(function(){ // Ketika tombol Tambah Data Form di klik
	    var jumlah = parseInt($("#jmlbon").val()); // Ambil jumlah data form pada textbox pesanan baru
	    var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
	      
	    // Kita akan menambahkan form dengan menggunakan append
	    // pada sebuah tag div yg kita beri id 
	    $("#insert-bon").append("<div class='row'>"
		+	"<div class='col-md-12'>"
		+		"<table width='100%'>"
		+			"<tr>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Kode Akt</label></td>"
		+				"<td>"
		+					"<div class='input-group-prepend'>"
		+					"<button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modal-kdakt"+nextform+"'>Cari</button>"
		+					"<input class='form-control form-control-sm' type='text' readonly='' name='kdaktbrng[]' id='kdbrngakt_bon'>"
		+					"</div>"
		+				"</td>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Barang</label></td>"
		+				"<td colspan='3'>"
		+					"<input type='text' class='form-control form-control-sm' readonly='' id='nmkdbrngakt_bon'>"
		+				"</td>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Kd Trans</label></td>"
		+				"<td>"
		+					"<?php echo cmb_dinamis('kdtrans_bon[]','tbl_kdtransaksi','id_kdtransaksi','nm_kdtransaksi','id_kdtransaksi','2','Pilih Kode Transaksi');?>"
		+				"</td>"
		+			"</tr>"
		+			"<tr>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Jumlah1</label></td>"
		+				"<td><input type='number' class='form-control form-control-sm' name='jml1_bon[]'></td>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Jumlah2</label></td>"
		+				"<td><input type='number' class='form-control form-control-sm' name='jml2_bon[]'></td>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Satuan1</label></td>"
		+				"<td>"
		+					"<?php echo cmb_dinamis('sat1_bon[]','tbl_satuan','id_satuan','nm_satuan','id_satuan','',' Pilih Satuan ');?>"
		+				"</td>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Satuan2</label></td>"
		+				"<td>"
		+					"<?php echo cmb_dinamis('sat2_bon[]','tbl_satuan','id_satuan','nm_satuan','id_satuan','',' Pilih Satuan ');?>"
		+				"</td>"
		+			"</tr>"
		+			"<tr>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Keluar1</label></td>"
		+				"<td><input type='number' class='form-control form-control-sm' name='keluar1_bon[]' placeholder=''></td>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Keluar2</label></td>"
		+				"<td><input type='number' class='form-control form-control-sm' name='keluar2_bon[]' placeholder=''></td>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Keterangan</label></td>"
		+				"<td colspan='3'>"
		+					"<input type='text' class='form-control form-control-sm' name='ket_bon[]' placeholder=''>"
		+				"</td>"
		+			"</tr>"
		+			"<tr>"
		+				"<td><label style='font-size: 11pt; margin-left: 5%;'>Bagian</label></td>"
		+				"<td>"
		+					"<input type='text' class='form-control form-control-sm' name='kdbagdtl_bon[]' id='kdbangdtl_bon' hidden=''>"
		+					"<input type='text' class='form-control form-control-sm' id='nmbagdtl_bon' readonly=''>"
		+				"</td>"
		+			"</tr>"
		+		"</table>"
		+	"</div>"
		+"</div><hr>"
    	// ============================================== MODAL CARI KODE AKUTANSI ===========================================
		+"<div class='modal fade' id='modal-kdakt"+nextform+"'>" 
		+    "<div class='modal-dialog modal-lg'>"
		+      "<div class='modal-content'>"
		+        "<div class='modal-header'>"
		+          "<h5 class='modal-title'>Cari Data Kode Akutansi</h5>"
		+          "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
		+            "<span aria-hidden='true'>&times;</span>"
		+          "</button>"
		+        "</div>"
		+        "<div class='modal-body'>"
		+        	"<table id='caritblkdakt"+nextform+"' class='table table-sm table-bordered table-responsive-md table-hover dataTable' role='grid'>"
		+        		"<thead>"
		+        			"<tr>"
		+	        			"<th>Kode Akutansi</th>"
		+	        			"<th>Nama Barang</th>"
		+	        			"<th>Jenis Barang</th>"
		+	        			"<th>Bagian</th>"
		+        			"</tr>"
		+        		"</thead>"
		+        		"<tbody>"
		+        		"<?php foreach ($get_kdbrngaktbon as $a) { ?>"
		+        			"<tr id='pilih_kdbrngaktbon"+nextform+"'"
		+						"kdbrngakt_bon = '<?php echo $a->id_jnsbrngakt?>'"
		+						"nmbrngakt_bon = '<?php echo $a->nm_jnsbrngakt?>'"
		+						"kdbagdtl_bon = '<?php echo $a->id_bagian?>'"
		+						"nmbagdtl_bon = '<?php echo $a->nm_bagian?>'"
		+        			">"
		+        				"<td><?php echo $a->no_jnsbrngakt?></td>"
		+        				"<td><?php echo $a->nm_jnsbrngakt?></td>"
		+        				"<td><?php echo $a->nm_jnsbrng?></td>"
		+        				"<td><?php echo $a->nm_bagian?></td>"
		+        			"</tr>"
		+	        	"<?php } ?>"
		+        		"</tbody>"
		+        	"</table>"
		+        "</div>"
		+        "<div class='modal-footer justify-content-between' style='font-size: 11pt;'>"
		+          "<b><i>* Pilih Kode Akutansi dengan cara klik pada kolom data</i></b>"
		+        "</div>"
		+      "</div>"
		+    "</div>"
		+ "</div>"
		// ==================================================================================================================== 

	    );
		// set id dengan id baru
		document.getElementById("kdbrngakt_bon").id 	= "kdbrngakt_bon"+nextform;
		document.getElementById("nmkdbrngakt_bon").id 	= "nmkdbrngakt_bon"+nextform;
		document.getElementById("kdbangdtl_bon").id 	= "kdbangdtl_bon"+nextform;
		document.getElementById("nmbagdtl_bon").id 		= "nmbagdtl_bon"+nextform;

		$(function () {
			$("#caritblkdakt"+nextform).DataTable({
			  "deferRender" : true,
			  "processing"  : true,
			  "order"       : [],
			});
		});
		// get datatabel no permintaan 
		$(document).on('click', '#pilih_kdbrngaktbon'+nextform, function (e) {
			document.getElementById("kdbrngakt_bon"+nextform).value 	= $(this).attr('kdbrngakt_bon');
			document.getElementById("nmkdbrngakt_bon"+nextform).value 	= $(this).attr('nmbrngakt_bon');
			document.getElementById("kdbangdtl_bon"+nextform).value 	= $(this).attr('kdbagdtl_bon');
			document.getElementById("nmbagdtl_bon"+nextform).value 		= $(this).attr('nmbagdtl_bon');
			$('#modal-kdakt'+nextform).modal('hide');
		});

		$("#jmlbon").val(nextform); // Ubah value textbox jmlorderwoff dengan variabel nextform	
		});

		// Buat fungsi untuk mereset form ke semula
		$("#reset-bon").click(function() {
			var s = confirm("Yakin Reset?");
			if(s){
		     $("#insert-bon").html(""); // Kita kosongkan isi dari div insert-form
		     $("#jmlbon").val("1"); // Ubah kembali value jumlah form menjadi 1
		    }else{
		   	 return false;
		    }
		}); 
	});
/*====================================== END =============================================*/
</script>