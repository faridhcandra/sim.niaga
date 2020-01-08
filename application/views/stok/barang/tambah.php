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
					<?php echo form_open('stok/barang_t');?>
					<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<!-- <label>ID Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="id_barang" placeholder="Id Barang" maxlength="20" required="" autocomplete="off" autofocus="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						    <!-- <label>ID Jenis Barang</label> -->
						    <select class="form-control form-control-sm" name="id_jnsbrng" onchange="getText(this)">
							<option selected>-- Pilih Jenis Barang --</option>
							<option></option>
						    <?php foreach ($get_jnsbrng->result_array() as $i) { ?>
							<option value="<?php echo $i['id_jnsbrng'];?>"><?php echo $i['id_jnsbrng'];?> - <?php echo $i['nm_jnsbrng'];?></option>
							<?php } ?>
							</select>
						</div>
					</div>
<!-- 					<div class="col-md-3">
						<div class="form-group">
							<label>ID Jenis Barang Akt</label> 
						    <select class="form-control form-control-sm" name="id_jnsbrng" onchange="getText(this)">
							<option selected>-- Pilih Jenis Barang Akt --</option>
							<option></option>
						    <?php foreach ($get_jnsbrng->result_array() as $i) { ?>
							<option value="<?php echo $i['id_jnsbrng'];?>"><?php echo $i['id_jnsbrng'];?> - <?php echo $i['nm_jnsbrng'];?></option>
							<?php } ?>
							</select>
						</div>
					</div> -->
					<div class="col-md-2">
						<!-- <div class="form-group">
							<label>ID Group</label>
							<input class="form-control form-control-sm" type="text" name="id_group" placeholder="Id Group" maxlength="3" required="" autocomplete="off" autofocus="">
						</div> -->
						<div class="form-group">
							<!-- <label>ID Jenis Barang Akt</label> -->
						    <select class="form-control form-control-sm" name="id_jnsbrng" onchange="getText(this)">
							<option selected>-- Pilih Group --</option>
							<option></option>
						    <?php foreach ($get_group->result_array() as $i) { ?>
							<option value="<?php echo $i['id_group'];?>"><?php echo $i['id_group'];?> - <?php echo $i['nm_group'];?></option>
							<?php } ?>
							</select>
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-2">
						<div class="form-group">
						<!-- 	<label>Nama Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="nama_barang" placeholder="Nama Barang" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<!-- <label>Kel Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="kel_barang" placeholder="Kel Barang" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<!-- 	<label>Ket Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="ket_barang" placeholder="Ket Barang" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<!-- 	<label>No Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="no_barang" placeholder="No Barang" required="" autocomplete="off">
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-2">
						<div class="form-group">
						<!-- 	<label>Satuan 1</label> -->
							<input class="form-control form-control-sm" type="text" name="sat1" placeholder="Satuan 1" maxlength="8" required="" autocomplete="off" autofocus="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<!-- 	<label>Satuan 2</label> -->
							<input class="form-control form-control-sm" type="text" name="sat2" placeholder="Satuan 2" maxlength="8" required="" autocomplete="off" autofocus="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<!-- 	<label>HPP Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="hpp_barang" placeholder="HPP Barang" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<!-- 	<label>Harga Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="harga_barang" placeholder="Harga Barang" required="" autocomplete="off">
						</div>
					</div>
					</div>
					<div class="row">
			<!-- 		<div class="col-md-2">
						<div class="form-group">
							<label>Updated Barang</label>
							<input class="form-control form-control-sm" type="date" name="nama_barang" placeholder="" required="" autocomplete="off">
						</div>
					</div> -->
					<div class="col-md-6">
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