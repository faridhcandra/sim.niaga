<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah SPB</h3>
			</div>
			<div class="card-body">
				<?php echo validation_errors();?>
				<?php echo form_open('pembelian/spb_t');?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">No SPB</label>
								<input class="form-control form-control-sm" type="text" name="nospb" id="nota_spb" placeholder="ex: xxx/spb/kdunit/bln/thn" required="" autocomplete="off" autofocus="">
								<input class="form-control form-control-sm" type="text" name="kode" hidden="" value="<?php echo $kode?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Tanggal</label>
								<input class="form-control form-control-sm" type="date" name="tglspb" placeholder="ex:" required="" value="<?php echo date("Y-m-d");?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Mata Uang</label>
								<select class="form-control form-control-sm" name="kurs">
									<option value="RP">RP</option>
									<option value="CHF">CHF</option>
									<option value="EUR">EUR</option>
									<option value="GBP">GBP</option>
									<option value="US">US$</option>
									<option value="YEN">YEN</option>
								</select>
							</div>
						</div>
					<!-- </div>
					<div class="row"> -->
						<div class="col-md-5">
							<div class="form-group">
								<label style="font-size: 11pt;">Leveransir</label>
								<div class="input-group-prepend">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-supplier">Cari</button>
									<input class="form-control form-control-sm col-md-3" type="text" name="kdlever" required="" readonly="" id="kd_lever">
									<input class="form-control form-control-sm" type="text" readonly="" id="nm_lever">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Attn</label>
								<input class="form-control form-control-sm" type="text" readonly="" id="attn_lever">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><p><i><b>Detail Surat Pesanan Barang</b></i></p></div>
						<div class="col-md-9">
							<hr style="border: 1px solid green;">
						</div>
					</div>
					<div id="insert-spb"></div>
					<div class="row">
						<div class="col-md-11">
							<div class="form-group">
								<input type="button" class="btn btn-dark btn-sm" value="Tambah Form" id="tambah-spb">
								<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-spb">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><p><i><b>Ringkasan Surat Pesanan Barang</b></i></p></div>
						<div class="col-md-9">
							<hr style="border: 1px solid green;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						<table width="100%">
							<tr>
								<td width="12%" valign="top">
									<label style="font-size: 11pt;">Tgl Penyerahan</label>
								</td>
								<td width="12%">
									<div class="form-group">
										<input class="form-control form-control-sm" type="date" name="tglserah" required="">
									</div>
								</td>
								<td colspan="3">
									<div class="form-group">
										<input class="form-control form-control-sm" type="text" name="ketserah" value="Barang sampai di gudang kami" required="">
									</div>
								</td>
								<td valign="top" valign="top">
									<label style="font-size: 11pt; margin-left: 10%;">Total</label>
								</td>
								<td>
									<div class="form-group">
										<input class="form-control form-control-sm" type="number" name="total" id="totalspb" required="">
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top">
									<label style="font-size: 11pt;">Pembayaran</label>
								</td>
								<td width="5%">
									<div class="form-group">
										<input class="form-control form-control-sm" type="number" name="haribayar" required="">
									</div>
								</td>
								<td valign="top">
									<label style="font-size: 11pt;">Hari</label>
								</td>
								<td colspan="2">
									<div class="form-group">
										<input class="form-control form-control-sm" type="text" name="ketbayar" value="setelah barang diterima dan diperiksa dengan baik" required="">
									</div>
								</td>
								<td width="10%" valign="top">
									<label style="font-size: 11pt; margin-left: 10%;"">PPN</label>
								</td>
								<td width="20%">
									<div class="form-group">
										<input class="form-control form-control-sm" type="number" name="ppn" id="ppnspb" required="">
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top">
									<label style="font-size: 11pt;">Keterangan</label>
								</td>
								<td colspan="4">
									<div class="form-group">
										<select class="form-control form-control-sm" name="ketgudang" required="">
											<option value="Franko gudang <?php echo $get_company?>">Franko gudang <?php echo $get_company?></option>
											<option value="Loco Gudang Penjualan">Loco Gudang Penjualan</option>
										</select>
									</div>
								</td>
								<td valign="top">
									<label style="font-size: 11pt; margin-left: 10%;"">Total Harga</label>
								</td>
								<td>
									<div class="form-group">
										<input class="form-control form-control-sm" type="number" name="tatalharga" id="totalhrgspb">
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="7">
									<textarea class="form-control form-control-sm" rows="5" name="ketspb" required="">
1.Kualitas barang tersebut diatas sesuai dengan standart kualitas <?php echo $get_company?> - Yogyakarta.<?php echo "\n"?>
2.Dokumen pendukung harap segera dilengkapi/dikirim maksimal 7 (tujuh) hari setelah barang<?php echo "\n"?>
   kami terima karena hal itu sebagai syarat pengajuan pembayaran.<?php echo "\n"?>
3.Setelah Surat Pesanan Barang ini ditandatangani oleh penjual harus dikirim atau di fax
   balik ke <?php echo $get_company?>.<?php echo "\n"?>
4Semua pemberitahuan mengenai dan atau sehubungan dengan Surat Pesanan Barang ini,
   dilakukan secara tertulis kepada alamat kedua belah pihak.<?php echo "\n"?>
5.Barang dikirim ke Gudang <?php echo $get_company?> - Yogyakarta.<?php echo "\n"?>
6.Barang yang kami terima adalah Ex. <?php echo "PT PUJI LESTARI - SOLO"."\n"?>
7.Tanggal penyerahan adalah estimasi kedatangan barang sampai di gudang kami.<?php echo "\n"?>
8.PO ini berlaku sampai dengan 30 Januari 2020 diatas tanggal tersebut PO kami anggap
   batal.<?php echo "\n"?>
9.Jika barang yang kami pesan kedatangannya melebihi batas waktu tersebut di atas, diharap
   mengkomunikasikan secara tertulis dengan pemesan.
									</textarea>
								</td>
							</tr>
						</table>
						</div>
					</div>
					<hr style="border: 1px solid green;">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group float-right">
								<a href="<?php echo site_url('pembelian/v_spb');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
								<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
							</div>
						</div>
					</div>
				</form>
				<input type="hidden" id="jmlspb" value="1"> 
			</div>
			</div>         
		</div>
		</div>
	</div>
</div>
<!-- modal -->
<div class="modal fade" id="modal-supplier">
    <div class="modal-dialog modal-lg text-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Leveransir</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="tbllever" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>Kode</th>
	        			<th>Nama</th>
	        			<th>Alamat</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_supplier as $a) { ?>
        			<tr id="pilih_lever"
						id_lever	="<?php echo $a->id_supplier?>"
						nm_lever	="<?php echo $a->nm_supplier?>"
						attn_lever	="<?php echo $a->attn_supplier?>"
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
<script type="text/javascript">
$(document).ready(function(){
	// tabel leveransir
	$(function () {
		$("#tbllever").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
	// get datatabel lebveransir 
	$(document).on('click', '#pilih_lever', function (e) {
		document.getElementById("kd_lever").value 		= $(this).attr('id_lever');
		document.getElementById("nm_lever").value 		= $(this).attr('nm_lever');
		document.getElementById("attn_lever").value 	= $(this).attr('attn_lever');
		$('#modal-supplier').modal('hide');
	});
	// -----------------------------------------------------------------------------------------------------------------------------------
	// Tambah Pemesanan
    $("#tambah-spb").click(function(){ // Ketika tombol Tambah Data Form di klik
    let jumlah = parseInt($("#jmlspb").val()); // Ambil jumlah data form pada textbox pesanan baru
    let nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

    // Kita akan menambahkan form dengan menggunakan append
    // pada sebuah tag div yg kita beri id 
    $("#insert-spb").append("<div class='row'>"
	+	"<div class='col-md-4'>"
	+		"<div class='form-group'>"
	+			"<label style='font-size: 11pt;'>No Renc.Pembelian</label>"
	+			"<div class='input-group-prepend'>"
	+				"<button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modal-rencbeli"+nextform+"'>Cari</button>"
	+				"<input class='form-control form-control-sm col-md-2' type='text' name='kddtlrenc[]' required='' readonly='' id='id_dtlpembspb'>"
	+				"<input class='form-control form-control-sm' type='text' name='nobeli[]' required='' readonly='' id='nota_pembspb'>"
	+			"</div>"
	+		"</div>"
	+	"</div>"
	+	"<div class='col-md-5'>"
	+		"<div class='form-group'>"
	+			"<label style='font-size: 11pt;'>Nama Barang</label>"
	+			"<div class='input-group-prepend'>"
	+				"<input class='form-control form-control-sm col-md-3' type='text' name='kdbrng[]' required='' readonly='' id='id_brngspb'>"
	+				"<input class='form-control form-control-sm' type='text' readonly='' id='nm_brngspb'>"
	+			"</div>"
	+		"</div>"
	+	"</div>"
	+	"<div class='col-md-2'>"
	+		"<div class='form-group'>"
	+			"<label style='font-size: 11pt;'>Harga</label>"
	+			"<input class='form-control form-control-sm' type='text' name='harga[]' required='' id='hrg_spb'>"
	+		"</div>"
	+	"</div>"
	+	"<div class='col-md-2'>"
	+		"<div class='form-group'>"
	+			"<label style='font-size: 11pt;'>Jumlah</label>"
	+			"<input class='form-control form-control-sm' type='text' name='jml[]' required='' id='jml_spb'>"
	+		"</div>"
	+	"</div>"
	+	"<div class='col-md-1'>"
	+		"<div class='form-group'>"
	+			"<label style='font-size: 11pt;'>Satuan</label>"
	+			"<input class='form-control form-control-sm' type='text' name='sat[]' required='' id='sat_jmlspb'>"
	+		"</div>"
	+	"</div>"
	+	"<div class='col-md-2'>"
	+		"<div class='form-group'>"
	+			"<label style='font-size: 11pt;'>Sub Total</label>"
	+			"<input class='form-control form-control-sm' type='text' name='subtotal[]' required='' id='sub_totalspb'>"
	+		"</div>"
	+	"</div>"
	+	"<div class='col-md-2'>"
	+		"<div class='form-group'>"
	+			"<label style='font-size: 11pt;'>Sub PPN</label>"
	+			"<input class='form-control form-control-sm' type='text' name='subppn[]' required='' id='sub_ppnspb'>"
	+		"</div>"
	+	"</div>"
	+	"<div class='col-md-2'>"
	+		"<div class='form-group'>"
	+			"<label style='font-size: 11pt;'> Sub Total Harga</label>"
	+			"<input class='form-control form-control-sm' type='text' name='subtotahrg[]' required='' id='sub_tothrgspb'>"
	+		"</div>"
	+	"</div>"
	+"</div>"
	// <!-- modal -->
	+"<div class='modal fade' id='modal-rencbeli"+nextform+"'>"
	+    "<div class='modal-dialog modal-lg text-sm'>"
	+      "<div class='modal-content'>"
	+        "<div class='modal-header'>"
	+          "<h5 class='modal-title'>Cari Data Renc. Pembelian</h5>"
	+          "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
	+            "<span aria-hidden='true'>&times;</span>"
	+          "</button>"
	+        "</div>"
	+        "<div class='modal-body'>"
	+        	"<table id='tblrencbeli"+nextform+"' class='table table-sm table-bordered table-hover dataTable' role='grid'>"
	+        		"<thead>"
	+        			"<tr>"
	+	        			"<th>Id</th>"
	+	        			"<th>No Renc. Beli</th>"
	+	        			"<th>Kode Barang</th>"
	+	        			"<th>Nama Barang</th>"
	+	        			"<th>Jumlah</th>"
	+        			"</tr>"
	+        		"</thead>"
	+        		"<tbody>"
	+        		"<?php foreach ($get_rencpemb as $a) { ?>"
	+        			"<tr id='pilih_rencbeli"+nextform+"'"
	+						"id_dtlrenpemb	='<?php echo $a->id_dtl_pembelian?>'"
	+						"nota_rencpemb	='<?php echo $a->nota_dtl_beli?>'"
	+						"id_brngrencpemb	='<?php echo $a->id_barang?>'"
	+						"nm_brngrencpemb	='<?php echo $a->nm_barang?>'"
	+						"jml_rencpemb	='<?php echo $a->jml_renc_beli?>'"
	+						"hrg_rencpemb	='<?php echo $a->hrg_renc_beli?>'"
	+						"nm_satspb		='<?php echo $a->nm_satuan?>'"
	+						"sub_totalspb	='<?php echo $a->total_dtl_beli?>'"
	+						"sub_ppnspb		='<?php echo $a->ppn_dtl_beli?>'"
	+						"sub_tothrgspb	='<?php echo $a->totalhrg_dtl_beli?>'"
	+       			">"
	+        				"<td><?php echo $a->id_dtl_pembelian?></td>"
	+        				"<td><?php echo $a->nota_dtl_beli?></td>"
	+        				"<td><?php echo $a->id_barang?></td>"
	+        				"<td><?php echo $a->nm_barang?></td>"
	+        				"<td><?php echo $a->jml_renc_beli?></td>"
	+        			"</tr>"
	+	        	"<?php } ?>"
	+        		"</tbody>"
	+        	"</table>"
	+        "</div>"
	+        "<div class='modal-footer justify-content-between' style='font-size: 11pt;'>"
	+          "<b><i>* Pilih No Renc. Beli dengan scara klik pada kolom data</i></b>"
	+        "</div>"
	+      "</div>"
	+    "</div>"
	+ "</div>"
	// <!-- /.modal -->
	+"<hr>"
    );
	// set id baru general
	document.getElementById("id_dtlpembspb").id = "id_dtlpembspb"+nextform;
	document.getElementById("nota_pembspb").id 	= "nota_pembspb"+nextform;
	document.getElementById("id_brngspb").id 	= "id_brngspb"+nextform;
	document.getElementById("nm_brngspb").id 	= "nm_brngspb"+nextform;
	document.getElementById("hrg_spb").id 		= "hrg_spb"+nextform;
	document.getElementById("jml_spb").id 		="jml_spb"+nextform;
	document.getElementById("sat_jmlspb").id 	= "sat_jmlspb"+nextform;
	// set id baru subtotal
	document.getElementById("sub_totalspb").id 	= "sub_totalspb"+nextform;
	document.getElementById("sub_ppnspb").id 	= "sub_ppnspb"+nextform;
	document.getElementById("sub_tothrgspb").id = "sub_tothrgspb"+nextform;

	// get datatabel renc pembelian 
	$(document).on('click', '#pilih_rencbeli'+nextform, function (e) {
		document.getElementById("id_dtlpembspb"+nextform).value 	= $(this).attr('id_dtlrenpemb');
		document.getElementById("nota_pembspb"+nextform).value 		= $(this).attr('nota_rencpemb');
		document.getElementById("id_brngspb"+nextform).value 		= $(this).attr('id_brngrencpemb');
		document.getElementById("nm_brngspb"+nextform).value 		= $(this).attr('nm_brngrencpemb');
		document.getElementById("hrg_spb"+nextform).value 			= $(this).attr('hrg_rencpemb');
		document.getElementById("jml_spb"+nextform).value 			= $(this).attr('jml_rencpemb');
		document.getElementById("sat_jmlspb"+nextform).value 		= $(this).attr('nm_satspb');
		document.getElementById("sub_totalspb"+nextform).value 		= $(this).attr('sub_totalspb');
		document.getElementById("sub_ppnspb"+nextform).value 		= $(this).attr('sub_ppnspb');
		document.getElementById("sub_tothrgspb"+nextform).value 	= $(this).attr('sub_tothrgspb');
		$('#modal-rencbeli'+nextform).modal('hide');
		totalspb();
	});
	//subtotal 
 	$('#jml_spb'+nextform+',#hrg_spb'+nextform).keyup(function(){
        var jml        	= parseFloat($('#jml_spb'+nextform).val()) || 0;
        var hrg        	= parseFloat($('#hrg_spb'+nextform).val()) || 0;
        var jumlah      = parseFloat(jml * hrg);
        $('#sub_totalspb'+nextform).val(jumlah);
        totalspb();
    });
    // total dan ppn
    function totalspb(){
    	var subtotal    = parseFloat($('#sub_totalspb'+nextform).val()) || 0;
    	var ppn 		= parseFloat((subtotal * 10)/100);
    	var total 		= parseFloat(subtotal+ppn);

    	$('#sub_totalspb'+nextform).val(subtotal);
        $('#sub_ppnspb'+nextform).val(ppn);
    	$('#sub_tothrgspb'+nextform).val(total);
        // jumlah total
        var arr1 = document.getElementsByName('subtotal[]');
	    var tot1 = 0;
	    for(var i=0;i<arr1.length;i++){
	        if(parseFloat(arr1[i].value))
	            tot1 += parseFloat(arr1[i].value);
	    }
    	document.getElementById('totalspb').value = tot1;

	    var arr2 = document.getElementsByName('subppn[]');
	    var tot2 = 0;
	    for(var i=0;i<arr2.length;i++){
	        if(parseFloat(arr2[i].value))
	            tot2 += parseFloat(arr2[i].value);
	    }
    	document.getElementById('ppnspb').value = tot2;

	    var arr3 = document.getElementsByName('subtotahrg[]');
	    var tot3 = 0;
	    for(var i=0;i<arr3.length;i++){
	        if(parseFloat(arr3[i].value))
	            tot3 += parseFloat(arr3[i].value);
	    }
    	document.getElementById('totalhrgspb').value = tot3;
    }
    // tabel no renc pembelian
	$(function () {
		$("#tblrencbeli"+nextform).DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
	// Set jumlah Form
	$("#jmlspb").val(nextform);
	});
	// Buat fungsi untuk mereset form ke semula
	$("#reset-spb").click(function() {
		var s = confirm("Yakin Reset?");
		if(s){
	     $("#insert-spb").html(""); // Kita kosongkan isi dari div insert-form
	     $("#jmlspb").val("1"); // Ubah kembali value jumlah form menjadi 1
	     $("#totalspb").val(""); 	     
	     $("#ppnspb").val(""); 	     
	     $("#totalhrgspb").val(""); 	     
	    }else{
	   	 return false;
	    }
	});
	$('#nota_spb').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
});
</script>