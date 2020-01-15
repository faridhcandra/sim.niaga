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
					<?php echo form_open('stok/barang_u/'. $row->id_barang)?>
					<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<!-- <label>ID Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="id_barang" value="<?php echo $row->id_barang?>" placeholder="Id Barang" maxlength="20" required="" autocomplete="off" autofocus="" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						    <!-- <label>ID Jenis Barang</label> -->
						    <select class="form-control form-control-sm" name="id_jnsbrng" value="<?php echo $row->id_jnsbrng?>" onchange="getText(this)">
							<option value="<?php echo $row->id_jnsbrng?>"><?php echo $row->id_jnsbrng?></option>
							<option value="0">-- Pilih Jenis Barang --</option>
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
						    <select class="form-control form-control-sm" name="id_group" onchange="getText(this)">
							<option value="<?php echo $row->id_group?>"><?php echo $row->id_group?></option>
							<option value="0">-- Pilih Group --</option>
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
							<input class="form-control form-control-sm" type="text" name="nama_barang" value="<?php echo $row->nm_barang?>" placeholder="Nama Barang" required="" autocomplete="off" autofocus="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<!-- <label>Kel Barang</label> --> 
							<input class="form-control form-control-sm" type="text" name="kel_barang" value="<?php echo $row->kel_barang?>"placeholder="Kel Barang" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<!-- 	<label>Ket Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="ket_barang" value="<?php echo $row->ket_barang?>" placeholder="Ket Barang" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<!-- 	<label>No Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="no_barang" value="<?php echo $row->no_barang?>" placeholder="No Barang" required="" autocomplete="off">
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-2">
						<div class="form-group">
						<!-- 	<label>Satuan 1</label> -->
							<input class="form-control form-control-sm" type="text" name="sat1" value="<?php echo $row->sat1_barang?>" placeholder="Satuan 1" maxlength="8" required="" autocomplete="off" autofocus="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<!-- 	<label>Satuan 2</label> -->
							<input class="form-control form-control-sm" type="text" name="sat2" value="<?php echo $row->sat2_barang?>" placeholder="Satuan 2" maxlength="8" required="" autocomplete="off" autofocus="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						<!-- 	<label>HPP Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="hpp_barang" value="<?php echo $row->hpp_barang?>" placeholder="HPP Barang" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<!-- 	<label>Harga Barang</label> -->
							<input class="form-control form-control-sm" type="text" name="harga_barang" value="<?php echo $row->harga_barang?>" placeholder="Harga Barang" required="" autocomplete="off">
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
						<div class="float-right">
							<a href="<?php echo site_url('stok/view_satuan');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
							<input type="submit" class="btn btn-primary btn-sm" value="Simpan">
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