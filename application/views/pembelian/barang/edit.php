<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Edit Barang</h3>
			</div>
			<div class="card-body">
				<?php foreach ($isi as $key => $row): ?>
				<?php echo validation_errors();?>
				<?php echo form_open('pembelian/barang_u/'. $row->id_barang)?>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Id Barang</label>
								<input class="form-control form-control-sm" type="text" name="id_barang" placeholder="ex: x-xx" maxlength="20" required="" autocomplete="off" pattern="[^/,]+[a-zA-Z0-9_-]" readonly="" value="<?php echo $row->id_barang?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Nama Barang</label>
								<input class="form-control form-control-sm" type="text" name="nama_barang" placeholder="ex: xxxx" required="" autocomplete="off" autofocus="" value="<?php echo $row->nm_barang?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Group</label>
							    <select class="form-control form-control-sm" name="id_group">
									<option value="<?php echo $row->id_group?>"><?php echo $row->nm_group?></option>
									<option value="">-- Pilih Group --</option>
									<option></option>
								    <?php foreach ($get_group->result_array() as $i) { ?>
									<option value="<?php echo $i['id_group'];?>"><?php echo $i['id_group'];?> - <?php echo $i['nm_group'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Jenis Barang</label>
							    <select class="form-control form-control-sm" name="id_jnsbrng">
									<option value="<?php echo $row->id_jnsbrng?>"><?php echo $row->nm_jnsbrng?></option>
									<option value="">-- Pilih Jenis Barang --</option>
									<option></option>
								    <?php foreach ($get_jnsbrng->result_array() as $i) { ?>
									<option value="<?php echo $i['id_jnsbrng'];?>"><?php echo $i['id_jnsbrng'];?> - <?php echo $i['nm_jnsbrng'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"><p><i><b>Detail Barang</b></i></p></div>
						<div class="col-md-10">
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Kelompok Barang</label>
								<input class="form-control form-control-sm" type="text" name="kel_barang" placeholder="ex: Weav" required="" autocomplete="off" value="<?php echo $row->kel_barang?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
							<label style="font-size: 11pt;">No Barang</label>
								<input class="form-control form-control-sm" type="text" name="no_barang" placeholder="ex: A1" required="" autocomplete="off" value="<?php echo $row->no_barang?>">
							</div>
						</div>					
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Satuan 1</label>
								<select class="form-control form-control-sm" name="sat1" required="">
									<option value="<?php echo $row->sat1_barang?>"><?php echo $row->nm_satuan?></option>
									<option value="">-- Pilih Satuan --</option>
									<option value=""></option>
								    <?php foreach ($get_satuan->result_array() as $i) { ?>
									<option value="<?php echo $i['id_satuan'];?>"><?php echo $i['nm_satuan'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Satuan 2</label>
								<select class="form-control form-control-sm" name="sat2" required="">
									<option value="<?php echo $row->sat1_barang?>"><?php echo $row->nm_satuan2?></option>
									<option value="">-- Pilih Satuan --</option>
									<option value=""></option>
								    <?php foreach ($get_satuan->result_array() as $i) { ?>
									<option value="<?php echo $i['id_satuan'];?>"><?php echo $i['nm_satuan'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<label style="font-size: 11pt;">Keterangan Barang</label>
							<div class="form-group">
							<!-- 	<label>Ket Barang</label> -->
								<input class="form-control form-control-sm" type="text" name="ket_barang" placeholder="ex: Weaving" required="" autocomplete="off" value="<?php echo $row->ket_barang?>">
							</div>
						</div>
					</div>
					<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						<label  style="font-size: 11pt;">Harga Barang</label>
							<input class="form-control form-control-sm" type="number" name="harga_barang" placeholder="Harga Barang" id="eharga_barang" required="" value="<?php echo $row->harga_barang?>">
						</div>
					</div>
					 <div class="col-md-3">
						<div class="form-group">
						<label style="font-size: 11pt;">PPN Barang</label>
							<input class="form-control form-control-sm" type="number" name="ppn_barang" readonly="" placeholder="PPN Barang" id="eppn_barang" value="<?php echo $row->ppn_barang?>">
						</div>
					</div>					
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group float-right">
								<a href="<?php echo site_url('pembelian/view_barang');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
								<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
							</div>
						</div>
					</div>
					</form>
					<?php endforeach ?>
					</div>
				</div>         
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#eharga_barang").keyup(function(){
	   var a = parseFloat($("#eharga_barang").val());
	   var b = parseFloat((a * 10)/100);
	   $("#eppn_barang").val(b);
	});
});
</script>