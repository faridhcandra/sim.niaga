<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Tambah Permintaan</h3>
					</div>
					<div class="card-body">
						<?php echo validation_errors();?>
						<?php echo form_open('stok/pesbaru_t');?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">No Permintaan</label>
									<input class="form-control form-control-sm" type="text" name="nopesbaru" placeholder="ex : xxx/kdunit/bln/thn" required="" autocomplete="off" autofocus="">
									<input hidden="" class="form-control form-control-sm" type="text" name="kd" value="<?php echo $kode?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Permintaan</label>
									<input class="form-control form-control-sm" type="date" name="tglpes" placeholder="ex : PT Paijo" required="" autocomplete="off" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Kode Unit</label>
									<input class="form-control form-control-sm" type="text" name="unit" value="<?php echo $get_unit?>" id="unit_pemesan" autocomplete="off" readonly="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Bagian</label>
									<select class="bag_pemesan form-control form-control-sm" name="bagian">
										<option>-- Pilih Bagian ---</option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Keterangan</label>
									<input class="form-control form-control-sm" type="text" name="ket" required="" placeholder="ex: mendesak" autocomplete="off">
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2"><h6><i><b>Detail Permintaan</b></i></h6></div>
							<div class="col-md-10">
								<hr>
							</div>
						</div>
						<div id="insert-pesbaru"></div>
						<div class="row">
							<div class="col-md-11">
								<div class="form-group">
									<input type="button" class="btn btn-success btn-sm" value="Tambah Form" id="tambah-pesbaru">
									<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-pesbaru">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right">
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
								</div>
							</div>
						</div>
						<?php echo form_close() ?> 
						<input type="hidden" id="jmlpesbaru" value="1"> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->
<script type="text/javascript">
    $(document).ready(function(){
    	// Get Bagian per unit
        var unit = $("#unit_pemesan").val();
        $.ajax({
            url : "<?php echo base_url();?>index.php/stok/get_bagian",
            method : "POST",
            data : {bag: unit},
            async : true,
            dataType : 'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id_bagian+'">'+data[i].id_bagian+' | '+data[i].nm_bagian+'</option>';
                }
                $('.bag_pemesan').html(html);                     
            }
        }); 
        // Tambah Pemesanan
        $("#tambah-pesbaru").click(function(){ // Ketika tombol Tambah Data Form di klik
	    var jumlah = parseInt($("#jmlpesbaru").val()); // Ambil jumlah data form pada textbox pesanan baru
	    var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
	      
	    // Kita akan menambahkan form dengan menggunakan append
	    // pada sebuah tag div yg kita beri id 
	    $("#insert-pesbaru").append("<div class='row'>"
		+	"<div class='col-md-4'>"
		+		"<div class='form-group'>"
		+			"<label style='font-size: 11pt;'>Nama Barang</label>"
		+			"<input list='dt_barang' type='text' class='form-control form-control-sm' name='barang[]'>"
		+			"<datalist id='dt_barang'>"
		+				"<?php foreach ($pesbaru_barang->result() as $row): ?>"
		+					"<option value='<?php echo $row->id_barang;?>'><?php echo $row->nm_barang;?> | <?php echo $row->nm_group?> | <?php echo $row->nm_jnsbrng;?></option>"
		+				"<?php endforeach ?>"
		+			"</datalist>"
		+		"</div>"
		+	"</div>"
		+	"<div class='col-md-1'>"
		+		"<div class='form-group'>"
		+			"<label style='font-size: 11pt;'>Stok</label>"
		+			"<input class='form-control form-control-sm' type='email' name='stkunit[]' placeholder='Unit' required='' readonly=''>"
		+	"</div>"
		+	"</div>"
		+	"<div class='col-md-1'>"
		+		"<div class='form-group'>"
		+			"<label>&nbsp;</label>"
		+			"<input class='form-control form-control-sm' type='text' name='stkgudang[]' placeholder='Gudang' required='' readonly=''>"
		+	"</div>"
		+	"</div>"
		+	"<div class='col-md-2'>"
		+		"<div class='form-group'>"
		+			"<label style='font-size: 11pt;'>Tanggal Diperlukan</label>"
		+			"<input class='form-control form-control-sm' type='date' name='tglperlu[]' required='' autocomplete='off'>"
		+		"</div>"
		+	"</div>"
		+	"<div class='col-md-2'>"
		+		"<div class='form-group'>"
		+			"<label style='font-size: 11pt;'>Jumlah Permintaan</label>"
		+			"<input class='form-control form-control-sm' type='number' name='jml[]' min='0' required='' autocomplete='off'>"
		+		"</div>"
		+	"</div>"
		+	"<div class='col-md-2'>"
		+		"<div class='form-group'>"
		+			"<label style='font-size: 11pt;'>Keterangan Detail</label>"
		+			"<input class='form-control form-control-sm' type='text' name='ketdetail[]' placeholder='ex: habis' required='' autocomplete='off'>"
		+		"</div>"
		+	"</div>"
		+ "</div>"
		+"<hr>"
		);
		// set id dengan id baru
		/*document.getElementById("barang").id 	= "barang"+nextform;
		document.getElementById("unit").id 		= "unit"+nextform;
		document.getElementById("gudang").id 	= "gudang"+nextform;
		document.getElementById("tglperlu").id 	= "tglperlu"+nextform;
		document.getElementById("jml").id 		= "jml"+nextform;
		document.getElementById("ketdet").id 	= "ketdet"+nextform;*/

		$("#jmlpesbaru").val(nextform); // Ubah value textbox jmlorderwoff dengan variabel nextform	
		});

		// Buat fungsi untuk mereset form ke semula
		$("#reset-pesbaru").click(function() {
			var s = confirm("Yakin Reset?");
			if(s){
		     $("#insert-pesbaru").html(""); // Kita kosongkan isi dari div insert-form
		     $("#jmlpesbaru").val("1"); // Ubah kembali value jumlah form menjadi 1
		    }else{
		   	 return false;
		    }
		}); 
    });
</script>
