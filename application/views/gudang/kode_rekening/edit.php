<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Ubah Kode Rekening Akuntansi</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					<?php foreach ($isi as $key => $row): ?>
					<?php echo validation_errors();?>
					<?php echo form_open('gudang/koderekakt_u/'. $row->no_rekening)?>
						<div class="form-group">
							<label>Id Rekening Akuntansi</label>
							<input class="form-control form-control-sm" type="text" name="kode" placeholder="ex : 1 1 1 0 1 5" required="" readonly="" autocomplete="off" value="<?php echo $row->id_rekening?>">
						</div>
						<div class="form-group">
							<label>Nama Rekening Akuntansi</label>
							<input class="form-control form-control-sm" type="text" name="nama" placeholder="ex : Bahan Penolong" required="" autocomplete="off" autofocus="" value="<?php echo $row->nm_rekening?>">
						</div>
						<div class="form-group">
							<div class="float-right">
								<a href="<?php echo site_url('gudang/v_koderekakt');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
