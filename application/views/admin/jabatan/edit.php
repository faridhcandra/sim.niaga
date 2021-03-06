<div class="container">
<div class="container-fluid">
	<div class="row">
	<div class="col-md-6">
  <div class="card card-outline card-dark">
    <div class="card-header">
		<h3 class="card-title">Form Ubah Jabatan</h3>
	</div>
    <div class="card-body">
		<?php foreach ($isi as $key => $row): ?>
		<?php echo validation_errors();?>
		<?php echo form_open('admin/jabatan_u')?>
    	<div class="form-row">
		    <div class="form-group col-md-6">
			    <label>Jabatan 1</label>
			    <input type="text" class="form-control form-control-sm" name="pj1" autocomplete="off" required="" value="<?php echo $row->posisi_pejabat1?>">
		    </div>
		    <div class="form-group col-md-6">
		     	<label>&nbsp;</label>
			    <input type="text" class="form-control form-control-sm" name="ja1" autocomplete="off" required="" value="<?php echo $row->nm_pejabat1?>">
		    </div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label>Jabatan 2</label>
			    <input type="text" class="form-control form-control-sm" name="pj2" autocomplete="off" required="" value="<?php echo $row->posisi_pejabat2?>">
		    </div>
		    <div class="form-group col-md-6">
		     	<label>&nbsp;</label>
			    <input type="text" class="form-control form-control-sm" name="ja2" autocomplete="off" required="" value="<?php echo $row->nm_pejabat2?>">
		    </div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label>Jabatan 3</label>
			    <input type="text" class="form-control form-control-sm" name="pj3" autocomplete="off" required="" value="<?php echo $row->posisi_pejabat3?>">
		    </div>
		    <div class="form-group col-md-6">
		     	<label>&nbsp;</label>
			    <input type="text" class="form-control form-control-sm" name="ja3" autocomplete="off" required="" value="<?php echo $row->nm_pejabat3?>">
		    </div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label>Jabatan 4</label>
			    <input type="text" class="form-control form-control-sm" name="pj4" autocomplete="off" required="" value="<?php echo $row->posisi_pejabat4?>">
		    </div>
		    <div class="form-group col-md-6">
		     	<label>&nbsp;</label>
			    <input type="text" class="form-control form-control-sm" name="ja4" autocomplete="off" required="" value="<?php echo $row->nm_pejabat4?>">
		    </div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label>Jabatan 5</label>
			    <input type="text" class="form-control form-control-sm" name="pj5" autocomplete="off" required="" value="<?php echo $row->posisi_pejabat5?>">
		    </div>
		    <div class="form-group col-md-6">
		     	<label>&nbsp;</label>
			    <input type="text" class="form-control form-control-sm" name="ja5" autocomplete="off" required="" value="<?php echo $row->nm_pejabat5?>">
		    </div>
		</div>
		<hr>
		<div class="form-group">
			<div class="float-right">
				<a href="<?php echo site_url('admin/v_jabatan');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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