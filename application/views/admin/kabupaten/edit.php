<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah Kabupaten</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					<?php foreach ($isi as $key => $row): ?>
					<?php echo validation_errors();?>
					<?php echo form_open('admin/kabupaten_u/'. $row->id_kabupaten)?>
						<div class="form-group">
							<label>Kabupaten</label>
							<input class="form-control form-control-sm" type="text" name="kab" value="<?php echo $row->nm_kabupaten?>" placeholder="ex : Sleman" required="" autocomplete="off" autofocus="">
						</div>
						<div class="form-group">
							<label>Provinsi</label>
							<select class="form-control form-control-sm" name="prov">
								<option selected="" value="<?php echo $row->id_provinsi?>"><?php echo $row->nm_provinsi?></option>
                              	<option value="">-</option>
								<?php foreach ($getProv->result_array() as $i ) {?>
	                              <option value="<?php echo $i['id_provinsi']; ?>"><?php echo $i['nm_provinsi'];?></option>
	                            <?php } ?>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-sm float-right toaster" value="Simpan">
						</div>
					</form>
					<?php endforeach ?>
					</div>
				</div>         
			</div>
		</div>
		</div>
		</div>
	</div>
</div>
<!-- /.content -->
