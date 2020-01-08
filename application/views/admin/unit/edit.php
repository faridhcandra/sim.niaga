<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Ubah Data Unit</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<?php foreach ($isi as $key => $row): ?>
								<?php echo validation_errors();?>
								<?php echo form_open('admin/unit_u/'. $row->id_unit)?>
								<div class="form-group">
									<label>Kode Unit</label>
									<input class="form-control form-control-sm" type="text" name="kode" value="<?php echo $row->id_unit?>" placeholder="ex : wv" maxlength="8" required="" autocomplete="off" autofocus="">
								</div>
								<div class="form-group">
									<label>Nama Unit</label>
									<input class="form-control form-control-sm" type="text" name="nama" value="<?php echo $row->nm_unit?>" placeholder="ex : Weaving" required="" autocomplete="off">
								</div>
								<div class="form-group">
									<div class="float-right">
										<a href="<?php echo site_url('admin/v_unit');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
