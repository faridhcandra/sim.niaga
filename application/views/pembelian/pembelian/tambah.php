<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah Pembelian</h3>
			</div>
			<div class="card-body">
				<?php echo validation_errors();?>
				<?php echo form_open('pembelian/pembelian_t');?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">No Pembelian</label>
								<input class="form-control form-control-sm" type="text" name="nobeli" id="nota_beli" placeholder="ex: xxx/kdunit/bln/thn" required="" autocomplete="off" autofocus="">
								<input class="form-control form-control-sm" type="text" name="kode" hidden="" value="<?php echo $kode?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Tgl Bag. Pembelian</label>
								<input class="form-control form-control-sm" type="date" name="tglbeli" placeholder="ex:" required="" value="<?php echo date("Y-m-d");?>">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label style="font-size: 11pt;">Keterangan</label>
								<input class="form-control form-control-sm" type="text" name="ket" required="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">No Permintaan</label>
								<div class="input-group-prepend">
				                	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-nopermin">Cari</button>
									<input class="form-control form-control-sm" type="text" name="idpes" required="" hidden="" id="idpembpes">
									<input class="form-control form-control-sm" type="text" readonly="" id="nopembpes">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Tgl Permintaan</label>
								<input class="form-control form-control-sm" type="date" readonly="" id="tglpembpes">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Unit</label>
								<input class="form-control form-control-sm" type="text" name="idunit" required="" hidden="" id="idunitpembpes">
								<input class="form-control form-control-sm" type="text" readonly="" id="unitpembpes">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Bagian</label>
								<input class="form-control form-control-sm" type="text" name="idbag" required="" hidden="" id="idbagpembpes">
								<input class="form-control form-control-sm" type="text" readonly="" id="bagpembpes">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"><p><i><b>Detail Pembelian</b></i></p></div>
						<div class="col-md-10">
							<hr style="border: 1px solid green;">
						</div>
					</div>
					<div id="insert-pembbaru"></div>
					<div class="row">
						<div class="col-md-11">
							<div class="form-group">
								<input type="button" class="btn btn-dark btn-sm" value="Tambah Form" id="tambah-pembbaru">
								<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-pembbaru">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"><p><i><b>Total Pembelian</b></i></p></div>
						<div class="col-md-10">
							<hr style="border: 1px solid green;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label style="font-size: 11pt;">Total</label>
							<div class="form-group">
								<input class="form-control form-control-sm" type="number" name="subrencbeli" readonly="" id="subdtlpembpes">
							</div>
						</div>
						<div class="col-md-3">
							<label style="font-size: 11pt;">PPN</label>
							<div class="form-group">
								<input class="form-control form-control-sm" type="number" name="ppnrencbeli" readonly="" id="ppndtlpembpes">
							</div>
						</div>
						<div class="col-md-3">
							<label style="font-size: 11pt;">Total Harga</label>
							<div class="form-group">
								<input class="form-control form-control-sm" type="number" name="totrencbeli" readonly="" id="totdtlpembpes">
							</div>
						</div>
					</div>
					<hr style="border: 1px solid green;">
					<div class="row">
					<div class="col-md-12">
						<div class="form-group float-right">
							<a href="<?php echo site_url('pembelian/v_pembelian');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
							<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
						</div>
					</div>
					</div>
				</form>
				<input type="hidden" id="jmlpembbaru" value="1"> 
			</div>
			</div>         
		</div>
		</div>
	</div>
</div>
<!-- modal -->
<div class="modal fade" id="modal-nopermin">
    <div class="modal-dialog modal-lg text-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Permintaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="tblpembpes" class="table table-sm table-bordered table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>No Permintaan</th>
	        			<th>Tgl Permintaan</th>
	        			<th>Unit</th>
	        			<th>Bagian</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_mint as $a) { ?>
        			<tr id="pilih_pembpes"
						idno_mint	="<?php echo $a->id_permintaan?>"
						no_mint		="<?php echo $a->nota_minta?>"
						tgl_mint	="<?php echo $a->tgl_minta?>"
						idunit_mint	="<?php echo $a->id_unit?>"
						unit_mint	="<?php echo $a->nm_unit?>"
						idbag_mint	="<?php echo $a->id_bagian?>"
						bag_mint	="<?php echo $a->nm_bagian?>"
        			>
        				<td><?php echo $a->nota_minta?></td>
        				<td><?php echo date('d/m/Y',strtotime($a->tgl_minta))?></td>
        				<td><?php echo $a->nm_unit?></td>
        				<td><?php echo $a->nm_bagian?></td>
        			</tr>
	        	<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih no permintaan dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
 <!-- /.modal -->
<script type="text/javascript">
$(document).ready(function(){
	$('#nota_beli').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
	// tabel no permintaan
	$(function () {
		$("#tblpembpes").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
	// get datatabel no permintaan 
	$(document).on('click', '#pilih_pembpes', function (e) {
		document.getElementById("idpembpes").value 		= $(this).attr('idno_mint');
		document.getElementById("nopembpes").value 		= $(this).attr('no_mint');
		document.getElementById("tglpembpes").value 	= $(this).attr('tgl_mint');
		document.getElementById("idunitpembpes").value 	= $(this).attr('idunit_mint');
		document.getElementById("unitpembpes").value 	= $(this).attr('unit_mint');
		document.getElementById("idbagpembpes").value 	= $(this).attr('idbag_mint');
		document.getElementById("bagpembpes").value 	= $(this).attr('bag_mint');
		$('#modal-nopermin').modal('hide');
	});
	// Tambah Pemesanan
    $("#tambah-pembbaru").click(function(){ // Ketika tombol Tambah Data Form di klik
    let jumlah = parseInt($("#jmlpembbaru").val()); // Ambil jumlah data form pada textbox pesanan baru
    let nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

    // Kita akan menambahkan form dengan menggunakan append
    // pada sebuah tag div yg kita beri id 
    $("#insert-pembbaru").append("<div class='row'>"
	+		"<div class='col-md-2'>"
	+			"<div class='form-group'>"
	+				"<label style='font-size: 11pt;'>kode Pesanan</label>"
	+				"<div class='input-group-prepend'>"
	+               	"<button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modal-dtlnopes"+nextform+"'>Cari</button>"
	+                	"<input type='text' class='form-control form-control-sm' name='iddtlpes[]' readonly id='iddtlpembpes'>"
	+               "</div>"
	+			"</div>"
	+		"</div>"
	+		"<div class='col-md-2'>"
	+			"<div class='form-group'>"
	+				"<label style='font-size: 11pt;'>Kode Barang</label>"
	+				"<input class='form-control form-control-sm' type='text' name='idbrng[]' required readonly id='kdbrngdtlpembpes'>"
	+			"</div>"
	+		"</div>"
	+		"<div class='col-md-3'>"
	+			"<div class='form-group'>"
	+			"<label style='font-size: 11pt;'>Nama Barang</label>"
	+				"<input class='form-control form-control-sm' type='text' required readonly id='nmbrngdtlpembpes'>"
	+			"</div>"
	+		"</div>	"
	+		"<div class='col-md-2'>"
	+			"<label style='font-size: 11pt;'>Jml. Pesan</label>"
	+			"<div class='form-group'>"
	+				"<input class='form-control form-control-sm' type='text' name='jmlpes[]' required readonly id='jmlpesdtlpembpes'>"
	+			"</div>"
	+		"</div>"
	+		"<div class='col-md-2'>"
	+			"<label style='font-size: 11pt;'>Jml. Renc. Beli</label>"
	+			"<div class='form-group'>"
	+				"<input class='form-control form-control-sm' type='number' name='jmlrenbeli[]' required id='jmldtlpembpes'>"
	+			"</div>"
	+		"</div>"
	+		"<div class='col-md-2'>"
	+			"<label style='font-size: 11pt;'>Hrg. Rencana</label>"
	+			"<div class='form-group'>"
	+				"<input class='form-control form-control-sm' type='number' name='hrgrencbeli[]' required id='hrgdtlpembpes'>"
	+			"</div>"
	+		"</div>"
	+		"<div class='col-md-2'>"
	+			"<label style='font-size: 11pt;'>Tgl Rencana</label>"
	+			"<div class='form-group'>"
	+				"<input class='form-control form-control-sm' type='date' name='tglrenc[]' required autocomplete='off'>"
	+			"</div>"
	+		"</div>"
	+		"<div class='col-md-2'>"
	+			"<label style='font-size: 11pt;'>Beli Langsung</label>"
	+			"<div class='form-group'>"
	+				"<select class='form-control form-control-sm' name='sungbeli[]' required>"
	+					"<option selected='' value=''>-- Pilih --</option>"
	+					"<option value='Y'>Ya</option>"
	+					"<option value='T'>Tidak</option>"
	+				"</select>"
	+			"</div>"
	+		"</div>"
	+		"<div class='col-md-3'>"
	+			"<label style='font-size: 11pt;'>Keterangan Beli</label>"
	+			"<div class='form-group'>"
	+				"<input class='form-control form-control-sm' type='text' name='ketdtlbeli[]' autocomplete='off'>"
	+			"</div>"
	+		"</div>"
	+	"</div>"
	+	"<div class='row'>"
	+		"<input type='number' class='form-control form-control-sm col-md-2' name='subpemb[]' id='subpemb' hidden>"
	+		"<input type='number' class='form-control form-control-sm col-md-2' name='subppnpemb[]' id='subppnpemb' hidden>"
	+		"<input type='number' class='form-control form-control-sm col-md-2' name='subtotpemb[]' id='subtotpemb' hidden>"
	+	"</div>"
		/*<!-- modal -->*/
	+	"<div class='modal fade' id='modal-dtlnopes"+nextform+"'>"
	+	    "<div class='modal-dialog modal-lg text-sm'>"
	+	      "<div class='modal-content'>"
	+	        "<div class='modal-header'>"
	+	          "<h5 class='modal-title'>Cari Data Pesanan</h5>"
	+	          "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
	+	            "<span aria-hidden='true'>&times;</span>"
	+	         "</button>"
	+	        "</div>"
	+	        "<div class='modal-body'>"
	+	        	"<table id='tbldtlpes"+nextform+"' class='table table-sm table-bordered table-hover dataTable' role='grid'>"
	+	        		"<thead>"
	+	        			"<tr>"
	+		        			"<th>No Permintaan</th>"
	+		        			"<th>Kode Barang</th>"
	+		        			"<th>Nama Barang</th>"
	+		        			"<th>Jml Pesan</th>"
	+		        			"<th>Bagian</th>"
	+		        			"<th>Keterangan</th>"
	+	        			"</tr>"
	+	        		"</thead>"
	+	        		"<tbody>"
	+	        			"<?php foreach ($get_dtlmint as $x) { ?>"
	+	        			"<tr id='pilih_dtlpembpes"+nextform+"'"
	+							"id_dtlmint		='<?php echo $x->id_dtl_permintaan?>'"
	+							"idbrng_dtlmint	='<?php echo $x->id_barang?>'"
	+							"nmbrng_dtlmint	='<?php echo $x->nm_barang?>'"
	+							"jmlpes_dtlmint	='<?php echo $x->jml_dtl_minta?>'"
	+							"hrgbrng_dtlmint	='<?php echo $x->harga_barang?>'"
	+	        			">"
	+	        				"<td><?php echo $x->nota_dtl_minta?></td>"
	+	        				"<td><?php echo $x->id_barang?></td>"
	+	        				"<td><?php echo $x->nm_barang?></td>"
	+	        				"<td><?php echo $x->jml_dtl_minta?></td>"
	+	        				"<td><?php echo $x->nm_bagian?></td>"
	+	        				"<td><?php echo $x->ket_dtl_minta?></td>"
	+	        			"</tr>"
	+	        			"<?php } ?>"
	+	        		"</tbody>"
	+	        	"</table>"
	+	        "</div>"
	+	        "<div class='modal-footer justify-content-between' style='font-size: 11pt;'>"
	+	          "<b><i>* Pilih pesanan dengan cara klik pada kolom data</i></b>"
	+	        "</div>"
	+	      "</div>"
	+	    "</div>"
	+	"</div>"
		 /*<!-- /.modal -->*/
	+	 "<hr>"
    );
	// set id baru general
	document.getElementById("iddtlpembpes").id 		= "iddtlpembpes"+nextform;
	document.getElementById("kdbrngdtlpembpes").id 	= "kdbrngdtlpembpes"+nextform;
	document.getElementById("nmbrngdtlpembpes").id 	= "nmbrngdtlpembpes"+nextform;
	document.getElementById("jmlpesdtlpembpes").id 	= "jmlpesdtlpembpes"+nextform;
	document.getElementById("jmldtlpembpes").id 	= "jmldtlpembpes"+nextform;
	document.getElementById("hrgdtlpembpes").id 	= "hrgdtlpembpes"+nextform;
	// set id untuk sub total 
	document.getElementById("subpemb").id 			= "subpemb"+nextform;
	document.getElementById("subppnpemb").id 		= "subppnpemb"+nextform;
	document.getElementById("subtotpemb").id 		= "subtotpemb"+nextform;

	// get datatabel detail permintaan
	$(document).on('click', '#pilih_dtlpembpes'+nextform, function (e) {
		document.getElementById("iddtlpembpes"+nextform).value 		= $(this).attr('id_dtlmint');
		document.getElementById("kdbrngdtlpembpes"+nextform).value 	= $(this).attr('idbrng_dtlmint');
		document.getElementById("nmbrngdtlpembpes"+nextform).value 	= $(this).attr('nmbrng_dtlmint');
		document.getElementById("jmlpesdtlpembpes"+nextform).value 	= $(this).attr('jmlpes_dtlmint');
		document.getElementById("hrgdtlpembpes"+nextform).value 	= $(this).attr('hrgbrng_dtlmint');
		$('#modal-dtlnopes'+nextform).modal('hide');
	});
	//subtotal 
 	$('#jmldtlpembpes'+nextform).keyup(function(){
        var jml        	= parseFloat($('#jmldtlpembpes'+nextform).val()) || 0;
        var hrg        	= parseFloat($('#hrgdtlpembpes'+nextform).val()) || 0;
        var jumlah      = parseFloat(jml * hrg);
        $('#subpemb'+nextform).val(jumlah);
        totalrencpemb();
    });
    // total dan ppn
    function totalrencpemb(){
    	var subtotal    = parseFloat($('#subpemb'+nextform).val()) || 0;
    	var ppn 		= parseFloat((subtotal * 10)/100);
    	var total 		= parseFloat(subtotal+ppn);

    	$('#subpemb'+nextform).val(subtotal);
        $('#subppnpemb'+nextform).val(ppn);
    	$('#subtotpemb'+nextform).val(total);
        // jumlah total
        var arr1 = document.getElementsByName('subpemb[]');
	    var tot1 = 0;
	    for(var i=0;i<arr1.length;i++){
	        if(parseFloat(arr1[i].value))
	            tot1 += parseFloat(arr1[i].value);
	    }
    	document.getElementById('subdtlpembpes').value = tot1;

	    var arr2 = document.getElementsByName('subppnpemb[]');
	    var tot2 = 0;
	    for(var i=0;i<arr2.length;i++){
	        if(parseFloat(arr2[i].value))
	            tot2 += parseFloat(arr2[i].value);
	    }
    	document.getElementById('ppndtlpembpes').value = tot2;

	    var arr3 = document.getElementsByName('subtotpemb[]');
	    var tot3 = 0;
	    for(var i=0;i<arr3.length;i++){
	        if(parseFloat(arr3[i].value))
	            tot3 += parseFloat(arr3[i].value);
	    }
    	document.getElementById('totdtlpembpes').value = tot3;
    }

	// tabel dtl permintaan
	$(function () {
		$("#tbldtlpes"+nextform).DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
	// Set jumlah Form
	$("#jmlpembbaru").val(nextform);
	});

	// Buat fungsi untuk mereset form ke semula
	$("#reset-pembbaru").click(function() {
		var s = confirm("Yakin Reset?");
		if(s){
	     $("#insert-pembbaru").html(""); // Kita kosongkan isi dari div insert-form
	     $("#jmlpembbaru").val("1"); // Ubah kembali value jumlah form menjadi 1
	    }else{
	   	 return false;
	    }
	});
});
</script>