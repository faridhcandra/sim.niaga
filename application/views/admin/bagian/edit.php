<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Ubah Bagian</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					<?php foreach ($isi as $key => $row): ?>
					<?php echo validation_errors();?>
					<?php echo form_open('admin/bagian_u/'. $row->id_bagian)?>
						<div class="form-group">
							<label>Kode Bagian</label>
							<input class="form-control form-control-sm" type="text" name="kode" value="<?php echo $row->id_bagian?>" placeholder="ex : Person" maxlength="8" required="" autocomplete="off" autofocus="">
						</div>
						<div class="form-group">
							<label>Nama Bagian</label>
							<input class="form-control form-control-sm" type="text" name="nama" value="<?php echo $row->nm_bagian?>" placeholder="ex : Personalia" required="" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Unit</label>
							<select class="form-control form-control-sm" name="unit" required="">
	                              <option selected="" value="<?php echo $row->id_unit?>"><?php echo $row->nm_unit?></option>
	                              <option value="">-</option>
								<?php foreach ($getUnit->result_array() as $i ) {?>
	                              <option value="<?php echo $i['id_unit']; ?>"><?php echo $i['nm_unit'];?></option>
	                            <?php } ?>	
							</select>
						</div>
						<div class="form-group">
							<div class="float-right">
								<a href="<?php echo site_url('admin/v_bagian');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
