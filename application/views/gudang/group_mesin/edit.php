<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Ubah group / Mesin</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<?php foreach ($isi as $key => $row): ?>
								<?php echo validation_errors();?>
								<?php echo form_open('gudang/grpmesin_u/'. $row->id_grpmesin)?>
								<div class="form-group">
									<label>Group / Mesin</label>
									<input class="form-control form-control-sm" type="text" name="kode" hidden="" value="<?php echo $row->id_grpmesin;?>">
									<input class="form-control form-control-sm" type="text" name="grpmesin" placeholder="group / mesin" required="" value="<?php echo $row->nm_grpmesin;?>" autocomplete="off" autofocus="">
								</div>
								<div class="form-group">
									<div class="float-right">
										<a href="<?php echo site_url('gudang/v_grpmesin');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
