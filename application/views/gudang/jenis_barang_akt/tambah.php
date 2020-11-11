<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Tambah Sparepart</h3>
					</div>
					<div class="card-body">
						<?php echo validation_errors();?>
						<?php echo form_open('gudang/jenisbrngakt_t');?>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">kode</label>
									<input class="form-control form-control-sm" type="text" name="kode[]" placeholder="ex: O-P/M" required="" autocomplete="off" autofocus="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Nama</label>
									<input class="form-control form-control-sm" type="text" name="nama[]" required="" placeholder="ex: OBENG +/-" autocomplete="off">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Jenis Barang</label>
									<input list="jnsbrngakt" type="text" class="form-control form-control-sm" name="barang[]" required="">
									<datalist id="jnsbrngakt">
										<?php foreach ($get_jenis->result() as $i): ?>
											<option value="<?php echo $i->id_jnsbrng;?>"><?php echo $i->nm_jnsbrng;?></option>
										<?php endforeach ?>
									</datalist>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Bagian</label>
									<input list="unitbrngakt" type="text" class="form-control form-control-sm" name="bagian[]" required="">
									<datalist id="unitbrngakt">
										<?php foreach($get_bagian as $s): ?>
											<option value="<?php echo $s->id_bagian;?>"><?php echo $s->nm_bagian;?></option>
										<?php endforeach ?>
									</datalist>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Group / Mesin</label>
									<input list="grpmesinbrngakt" type="text" class="form-control form-control-sm" name="grpmesin[]" required="">
									<datalist id="grpmesinbrngakt">
										<?php foreach ($get_grpmesin->result() as $a): ?>
											<option value="<?php echo $a->id_grpmesin;?>"><?php echo $a->nm_grpmesin;?></option>
										<?php endforeach ?>
									</datalist>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Rek</label>
									<input list="rekbrngakt" type="text" class="form-control form-control-sm" name="rek[]" required="">
									<datalist id="rekbrngakt">
										<?php foreach ($get_rek->result() as $q): ?>
											<option value="<?php echo $q->no_rekening;?>"><?php echo $q->id_rekening;?> | <?php echo $q->nm_rekening;?></option>
										<?php endforeach ?>
									</datalist>
								</div>
							</div>
						</div>
						<hr>
						<div id="insert-jnsbrngakt"></div>
						<div class="row">
							<div class="col-md-11">
								<div class="form-group">
									<input type="button" class="btn btn-success btn-sm" value="Tambah Form" id="tambah-jnsbrngakt">
									<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-jnsbrngakt">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right">
									<a href="<?php echo site_url('gudang/v_jenisbrngakt');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
								</div>
							</div>
						</div>
						<?php echo form_close() ?>
						<input type="hidden" id="jmljnsbrngakt" value="1">  
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        // Tambah Pemesanan
        $("#tambah-jnsbrngakt").click(function(){ // Ketika tombol Tambah Data Form di klik
	    var jumlah = parseInt($("#jmljnsbrngakt").val()); // Ambil jumlah data form pada textbox pesanan baru
	    var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
	      
	    // Kita akan menambahkan form dengan menggunakan append
	    // pada sebuah tag div yg kita beri id 
	    $("#insert-jnsbrngakt").append("<div class='row'>"
		+"<div class='col-md-2'>"
		+	"<div class='form-group'>"
		+		"<label style='font-size: 11pt;'>kode</label>"
		+		"<input class='form-control form-control-sm' type='text' name='kode[]' placeholder='ex: O-P/M' required='' autocomplete='off' autofocus=''>"
		+	"</div>"
		+"</div>"
		+"<div class='col-md-3'>"
		+	"<div class='form-group'>"
		+		"<label style='font-size: 11pt;'>Nama</label>"
		+		"<input class='form-control form-control-sm' type='text' name='nama[]' required='' placeholder='ex: OBENG +/-' autocomplete='off'>"
		+	"</div>"
		+"</div>"
		+"<div class='col-md-2'>"
		+	"<div class='form-group'>"
		+		"<label style='font-size: 11pt;'>Jenis Barang</label>"
		+		"<input list='jnsbrngakt' type='text' class='form-control form-control-sm' name='barang[]' required=''>"
		+		"<datalist id='jnsbrngakt'>"
		+			"<?php foreach ($get_jenis->result() as $i): ?>"
		+				"<option value='<?php echo $i->id_jnsbrng;?>'><?php echo $i->nm_jnsbrng;?></option>"
		+			"<?php endforeach ?>"
		+		"</datalist>"
		+	"</div>"
		+"</div>"
		+"<div class='col-md-2'>"
		+	"<div class='form-group'>"
		+		"<label style='font-size: 11pt;'>Bagian</label>"
		+		"<input list='unitbrngakt' type='text' class='form-control form-control-sm' name='bagian[]' required=''>"
		+		"<datalist id='unitbrngakt'>"
		+			"<?php foreach ($get_bagian as $s): ?>"
		+				"<option value='<?php echo $s->id_bagian;?>'><?php echo $s->nm_bagian;?></option>"
		+			"<?php endforeach ?>"
		+		"</datalist>"
		+	"</div>"
		+"</div>"
		+"<div class='col-md-2'>"
		+	"<div class='form-group'>"
		+		"<label style='font-size: 11pt;'>Group / Mesin</label>"
		+		"<input list='grpmesinbrngakt' type='text' class='form-control form-control-sm' name='grpmesin[]' required=''>"
		+		"<datalist id='grpmesinbrngakt'>"
		+			"<?php foreach ($get_grpmesin->result() as $a): ?>"
		+				"<option value='<?php echo $a->id_grpmesin;?>'><?php echo $a->nm_grpmesin;?></option>"
		+			"<?php endforeach ?>"
		+		"</datalist>"
		+	"</div>"
		+"</div>"
		+"<div class='col-md-3'>"
		+	"<div class='form-group'>"
		+		"<label style='font-size: 11pt;'>Rek</label>"
		+		"<input list='rekbrngakt' type='text' class='form-control form-control-sm' name='rek[]' required=''>"
		+		"<datalist id='rekbrngakt'>"
		+			"<?php foreach ($get_rek->result() as $q): ?>"
		+				"<option value='<?php echo $q->no_rekening;?>'><?php echo $q->id_rekening;?> | <?php echo $q->nm_rekening;?></option>"
		+			"<?php endforeach ?>"
		+		"</datalist>"
		+	"</div>"
		+"</div>"
		+"</div>"
		+"<hr>"
		);
		// set id dengan id baru
		/*document.getElementById("barang").id 	= "barang"+nextform;*/

		$("#jmljnsbrngakt").val(nextform); // Ubah value textbox jmlorderwoff dengan variabel nextform	
		});

		// Buat fungsi untuk mereset form ke semula
		$("#reset-jnsbrngakt").click(function() {
			var s = confirm("Yakin Reset?");
			if(s){
		     $("#insert-jnsbrngakt").html(""); // Kita kosongkan isi dari div insert-form
		     $("#jmljnsbrngakt").val("1"); // Ubah kembali value jumlah form menjadi 1
		    }else{
		   	 return false;
		    }
		}); 
    });
</script>