<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Ubah Metode Pembelian</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<?php foreach ($isi as $key => $row): ?>
								<?php echo validation_errors();?>
								<?php echo form_open('pembelian/metpemb_u/'. $row->id_metbyr)?>
								<div class="form-group">
									<label>Jenis Barang</label>
									<input class="form-control form-control-sm" type="text" name="metode" value="<?php echo $row->nm_metbyr?>" placeholder="Metode ex : cash" required="" autocomplete="off" autofocus="">
								</div>
								<div class="form-group">
									<div class="float-right">
										<a href="<?php echo site_url('pembelian/view_metpemb');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
