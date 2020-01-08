<div class="container">
  <div class="card  card-outline card-dark">
    <div class="card-header">
		<h3 class="card-title">Form Ubah Perusahaan</h3>
	</div>
    <div class="card-body">
		<?php foreach ($isi as $key => $row): ?>
		<?php echo validation_errors();?>
		<?php echo form_open('admin/perusahaan_u')?>
    	<div class="form-row">
		    <div class="form-group col-md-3">
			    <label>Nama Perusahaan</label>
			    <input type="text" class="form-control form-control-sm" name="per" required="" value="<?php echo $row->nm_company?>">
		    </div>
		    <div class="form-group col-md-5">
			    <label>Alamat</label>
			    <input type="text" class="form-control form-control-sm" name="alamat" autocomplete="off" required="" value="<?php echo $row->almt_company?>">
		    </div>
		</div>
		<div class="form-row">
		    <div class="form-group col-md-4">
			    <label>Kabupaten</label>
			    <select class="form-control form-control-sm" name="kab" required="">
                  <option value="<?php echo $row->id_kabupaten?>"><?php echo $row->nm_kabupaten?></option>
                  <option value="">-</option>
                  <?php foreach ($getKab->result_array() as $i ) {?>
	                  <option value="<?php echo $i['id_kabupaten']; ?>"><?php echo $i['nm_kabupaten'];?></option>
	               <?php } ?>
				</select>
		    </div>
		    <div class="form-group col-md-4">
			    <label>Provinsi</label>
			    <select class="form-control form-control-sm" name="prov" required="">
                  <option value="<?php echo $row->id_provinsi?>"><?php echo $row->nm_provinsi?></option>
                  <option value="">-</option>
                  <?php foreach ($getProv->result_array() as $i ) {?>
	                  <option value="<?php echo $i['id_provinsi']; ?>"><?php echo $i['nm_provinsi'];?></option>
	               <?php } ?>
				</select>
		    </div>
		</div>
		<div class="form-row">
		    <div class="form-group col-md-4">
			    <label>Telepon</label>
			    <input type="text" class="form-control form-control-sm" name="telp" autocomplete="off" required="" value="<?php echo $row->telp_company?>">
		    </div>
		    <div class="form-group col-md-4">
			    <label>Fax</label>
			    <input type="text" class="form-control form-control-sm" name="fax" autocomplete="off" required="" value="<?php echo $row->fax_company?>">
		    </div>
		</div>
		<div class="form-row">
		    <div class="form-group col-md-4">
			    <label>email</label>
			    <input type="email" class="form-control form-control-sm" name="email" autocomplete="off" required="" value="<?php echo $row->email_company?>">
		    </div>
		    <div class="form-group col-md-4">
			    <label>NPWP</label>
			    <input type="text" class="form-control form-control-sm" name="npwp" autocomplete="off" required="" value="<?php echo $row->npwp_company?>">
		    </div>
		</div>
		<div class="form-row">
		    <div class="form-group col-md-4">
			    <label>No Seri</label>
			    <input type="text" class="form-control form-control-sm" name="noseri" autocomplete="off" required="" value="<?php echo $row->noseri_company?>">
		    </div>
		</div>
		<hr>
		<div class="form-group">
			<div class="float-right">
				<a href="<?php echo site_url('admin/v_perusahaan');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
				<input type="submit" class="btn btn-primary btn-sm" value="Simpan">
			</div>
		</div>
		</form>
		<?php endforeach ?>
    </div>
  </div>
</div>
