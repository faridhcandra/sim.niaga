<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Tambah Supplier</h3>
					</div>
					<div class="card-body">
						<?php echo validation_errors();?>
						<?php echo form_open('pembelian/supplier_t');?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Kode</label>
									<input class="form-control form-control-sm" type="text" name="kode" placeholder="ex : AAB" required="" autocomplete="off" autofocus="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Nama</label>
									<input class="form-control form-control-sm" type="text" name="nama" placeholder="ex : PT Paijo" required="" autocomplete="off">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">No Telpon</label>
									<input class="form-control form-control-sm" type="telp" name="telp" placeholder="ex : 0274 --- ---" required="" autocomplete="off">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Fax</label>
									<input class="form-control form-control-sm" type="text" name="fax" placeholder="ex : 888 ---" required="" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Provinsi</label>
									<select class="form-control form-control-sm" name="prov" id="supp_prov">
										<option value="0">-- Pilih Provinsi --</option>
										<?php foreach ($get_prov->result() as $row):?>
											<option value="<?php echo $row->id_provinsi;?>"><?php echo $row->nm_provinsi;?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Kabupaten</label>
									<select class="supp_kabs form-control form-control-sm" name="kab">
										<option value="0">-- Pilih Kabupaten --</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Email</label>
									<input class="form-control form-control-sm" type="email" name="email" placeholder="ex : email@email.com" required="" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label style="font-size: 11pt;">Alamat</label>
									<textarea class="form-control form-control-sm" name="alamat" row="4" autocomplete="off"></textarea>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2"><h6><i><b>Detail</b></i></h6></div>
							<div class="col-md-7">
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Atas Nama</label>
									<input class="form-control form-control-sm" type="text" name="attn" placeholder="ex : Paijo" required="" autocomplete="off">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">NPWP</label>
									<input class="form-control form-control-sm" type="text" name="npwp" placeholder="ex : 01.--.---.--" required="" autocomplete="off">
								</div>
							</div>
							<!-- <div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">No Telp Pimpinan</label>
									<input class="form-control form-control-sm" type="text" name="telp_pim" placeholder="ex : 08- --- ---" required="" autocomplete="off">
								</div>
							</div> -->
						</div>
						<!-- <div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Nama CP</label>
									<input class="form-control form-control-sm" type="text" name="nama_cp" placeholder="ex : CP" required="" autocomplete="off">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Alamat CP</label>
									<input class="form-control form-control-sm" type="text" name="almt_cp" placeholder="ex : Jl. -- No --" required="" autocomplete="off">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">No Telp CP</label>
									<input class="form-control form-control-sm" type="text" name="telp_cp" placeholder="ex : 08- --- ---" required="" autocomplete="off">
								</div>
							</div>
						</div> -->
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right">
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
								</div>
							</div>
						</div>
						<?php echo form_close() ?>  
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#supp_prov').change(function(){
            var id = $(this).val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/pembelian/get_kabupaten",
                method : "POST",
                data : {prov: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id_kabupaten+'">'+data[i].nm_kabupaten+'</option>';
                    }
                    $('.supp_kabs').html(html);                     
                }
            });
        });
    });
</script>
