<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Ubah Sparepart</h3>
					</div>
					<div class="card-body">
						<?php foreach ($isi as $key => $row): ?>
						<?php echo validation_errors();?>
						<?php echo form_open('gudang/jenisbrngakt_u/'. $row->id_jnsbrngakt)?>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">kode</label>
									<input class="form-control form-control-sm" type="text" name="kode" placeholder="ex: O-P/M" required="" autocomplete="off" autofocus="" value="<?php echo $row->no_jnsbrngakt;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Nama</label>
									<input class="form-control form-control-sm" type="text" name="nama" required="" placeholder="ex: OBENG +/-" autocomplete="off" value="<?php echo $row->nm_jnsbrngakt;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Jenis Barang</label>
									<input list="jnsbrngakt" type="text" class="form-control form-control-sm" name="barang" required="" value="<?php echo $row->id_jnsbrngakt;?>">
									<datalist id="jnsbrngakt">
										<?php foreach ($get_jenis->result() as $i): ?>
											<option value="<?php echo $i->id_jnsbrng;?>"><?php echo $i->nm_jnsbrng;?></option>
										<?php endforeach ?>
									</datalist>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Unit</label>
									<input list="unitbrngakt" type="text" class="form-control form-control-sm" name="unit" required="" value="<?php echo $row->id_unit;?>">
									<datalist id="unitbrngakt">
										<?php foreach ($get_unit->result() as $a): ?>
											<option value="<?php echo $a->id_unit;?>"><?php echo $a->nm_unit;?></option>
										<?php endforeach ?>
									</datalist>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Rek</label>
									<input list="rekbrngakt" type="text" class="form-control form-control-sm" name="rek" required="" value="<?php echo $row->no_rekening;?>">
									<datalist id="rekbrngakt">
										<?php foreach ($get_rek->result() as $q): ?>
											<option value="<?php echo $q->no_rekening;?>"><?php echo $q->id_rekening;?> | <?php echo $q->nm_rekening;?></option>
										<?php endforeach ?>
									</datalist>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right">
									<a href="<?php echo site_url('gudang/v_jenisbrngakt');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
								</div>
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