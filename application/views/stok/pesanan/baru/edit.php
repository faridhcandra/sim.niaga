<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Ubah Permintaan</h3>
					</div>
					<div class="card-body">
						<?php foreach ($isi as $key => $row): ?>
						<?php echo validation_errors();?>
						<?php echo form_open('stok/pesbaru_u/'. $row->id_dtl_permintaan)?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">No Permintaan</label>
									<input class="form-control form-control-sm" type="text" name="nopesbaru" placeholder="ex : xxx/kdunit/bln/thn" required="" autocomplete="off" readonly="" value="<?php echo $row->nota_dtl_minta;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Permintaan</label>
									<input class="form-control form-control-sm" type="date" name="tglpes" placeholder="ex : PT Paijo" required="" readonly="" value="<?php echo $row->tgl_minta;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Kode Unit</label>
									<input class="form-control form-control-sm" type="text" name="unit" value="<?php echo $row->id_unit;?>" id="e_unit_pemesan" readonly="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Bagian</label>
									<select class="e_bag_pemesan form-control form-control-sm" name="bagian">
										<option>-- Pilih Bagian ---</option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Keterangan</label>
									<input class="form-control form-control-sm" type="text" name="ket" required="" placeholder="ex: mendesak" readonly="" value="<?php echo $row->ket_minta;?>">
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
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label style="font-size: 11pt;">Nama Barang</label>
									<input list="dte_barang" type="text" class="form-control form-control-sm" name="barang" value="<?php echo $row->id_dtl_barang;?>">
									<datalist id="dte_barang">
										<?php foreach ($pesbaru_barang->result() as $i){ ?>
											<option value="<?php echo $i->id_barang;?>"><?php echo $i->nm_barang;?> | <?php echo $i->nm_group?> | <?php echo $i->nm_jnsbrng;?></option>
										<?php } ?>
									</datalist>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label style="font-size: 11pt;">Stok</label>
									<input class="form-control form-control-sm" type="email" name="stkunit" placeholder="Unit" readonly="" value="<?php echo $row->stkunit_dtl_minta;?>">
							</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label>&nbsp;</label>
									<input class="form-control form-control-sm" type="text" name="stkgudang" placeholder="Gudang" readonly="" value="<?php echo $row->stkgdng_dtl_minta;?>">
							</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Diperlukan</label>
									<input class="form-control form-control-sm" type="date" name="tglperlu" required="" value="<?php echo $row->tgl_dtl_perlu;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Jumlah Permintaan</label>
									<input class="form-control form-control-sm" type="number" name="jml" min="0" required="" value="<?php echo $row->jml_dtl_minta;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Keterangan Detail</label>
									<input class="form-control form-control-sm" type="text" name="ketdetail" placeholder="ex: habis" required="" value="<?php echo $row->ket_dtl_minta;?>">
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
					<?php endforeach ?>
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
        var unit = $("#e_unit_pemesan").val();
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
                $('.e_bag_pemesan').html(html);                     
            }
        });
    }); 
</script>
