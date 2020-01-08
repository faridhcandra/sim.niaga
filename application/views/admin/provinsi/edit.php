<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Edit Provinsi</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<?php foreach ($isi as $key => $row): ?>
								<?php echo validation_errors();?>
								<?php echo form_open('admin/provinsi_u/'. $row->id_provinsi)?>
								<div class="form-group">
									<label>Nama Provinsi</label>
									<input class="form-control form-control-sm" type="text" name="prov" value="<?php echo $row->nm_provinsi?>" placeholder="ex : D.I.Yogyakarta" required="" autocomplete="off" autofocus="">
								</div>
								<div class="form-group">
									<div class="float-right">
										<a href="<?php echo site_url('admin/v_provinsi');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
										<input type="submit" class="btn btn-primary btn-sm" value="Simpan">
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
</div>
</div>
<!-- /.content -->
