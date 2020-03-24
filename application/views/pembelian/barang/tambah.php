<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah Barang</h3>
			</div>
			<div class="card-body">
				<?php echo validation_errors();?>
				<?php echo form_open('pembelian/barang_t');?>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Id Barang</label>
								<input class="form-control form-control-sm" type="text" name="id_barang" placeholder="ex: x-xx" maxlength="20" required="" autocomplete="off" autofocus="" pattern="[^/,]+[a-zA-Z0-9_-]" title="Tidak boleh ada karakter /">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Nama Barang</label>
								<input class="form-control form-control-sm" type="text" name="nama_barang" placeholder="ex: xxxx" required="" autocomplete="off">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Group</label>
							    <select class="form-control form-control-sm" name="id_group" required="">
									<option selected value="">-- Pilih Group --</option>
									<option value=""></option>
								    <?php foreach ($get_group->result_array() as $i) { ?>
									<option value="<?php echo $i['id_group'];?>"><?php echo $i['id_group'];?> - <?php echo $i['nm_group'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Jenis Barang</label>
							    <select class="form-control form-control-sm" name="id_jnsbrng" required="">
									<option selected value="">-- Pilih Jenis Barang --</option>
									<option value=""></option>
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
								<input class="form-control form-control-sm" type="text" name="kel_barang" placeholder="ex: Weav" required="" autocomplete="off">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
							<label style="font-size: 11pt;">No Barang</label>
								<input class="form-control form-control-sm" type="text" name="no_barang" placeholder="ex: A1" pattern="[a-zA-Z]+[0-9]"" required="" autocomplete="off">
							</div>
						</div>					
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Satuan 1</label>
								<select class="form-control form-control-sm" name="sat1" required="">
									<option selected value="">-- Pilih Satuan --</option>
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
									<option selected value="">-- Pilih Satuan --</option>
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
								<input class="form-control form-control-sm" type="text" name="ket_barang" placeholder="ex: Weaving" required="" autocomplete="off">
							</div>
						</div>
					</div>
					<!--<div class="row">
					 <div class="col-md-3">
						<div class="form-group">
						<label>HPP Barang</label>
							<input class="form-control form-control-sm" type="text" name="hpp_barang" placeholder="HPP Barang" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<label>Harga Barang</label>
							<input class="form-control form-control-sm" type="text" name="harga_barang" placeholder="Harga Barang" required="" autocomplete="off">
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
				</form>
			</div>
			</div>         
		</div>
		</div>
	</div>
</div>