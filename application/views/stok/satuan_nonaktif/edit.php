<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Ubah Satuan Barang</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					<?php foreach ($isi as $key => $row): ?>
					<?php echo validation_errors();?>
					<?php echo form_open('stok/satuan_u/'. $row->id_satuan)?>
						<div class="form-group">
							<label>Satuan Barang</label>
							<input class="form-control form-control-sm" type="text" name="satuan" value="<?php echo $row->nm_satuan?>" placeholder="satuan ex : Meter" required="" autocomplete="off" autofocus="">
						</div>
						<div class="form-group">
							<div class="float-right">
								<a href="<?php echo site_url('stok/view_satuan');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
</div>
<!-- /.content -->
