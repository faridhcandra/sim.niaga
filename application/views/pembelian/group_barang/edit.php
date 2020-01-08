<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Tambah Group</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<?php foreach ($isi as $key => $row): ?>
								<?php echo validation_errors();?>
								<?php echo form_open('pembelian/groupbrng_u/'. $row->id_group)?>
								<div class="form-group">
									<label>Group</label>
									<input class="form-control form-control-sm" type="text" name="group" value="<?php echo $row->nm_group?>" placeholder="Group ex : BRG-LAIN" required="" autocomplete="off" autofocus="">
								</div>
								<div class="form-group">
									<label>Rekening</label>
									<input class="form-control form-control-sm" type="text" name="rek" value="<?php echo $row->rek_group?>" placeholder="Rek ex : LAIN-LAIN" required="" autocomplete="off">
								</div>
								<div class="form-group">
									<div class="float-right">
										<a href="<?php echo site_url('pembelian/view_groupbrng');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
