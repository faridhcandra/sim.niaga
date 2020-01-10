<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Tambah Permintaan</h3>
					</div>
					<div class="card-body">
						<?php echo validation_errors();?>
						<?php echo form_open('stok/pesbaru_t');?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">No Permintaan</label>
									<input class="form-control form-control-sm" type="text" name="kode" placeholder="ex : xxx_kdunit_bln_thn" required="" autocomplete="off" autofocus="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Permintaan</label>
									<input class="form-control form-control-sm" type="date" name="nama" placeholder="ex : PT Paijo" required="" autocomplete="off" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Unit</label>
									<input class="form-control form-control-sm" type="text" name="nama" value="Weaving" required="" autocomplete="off" readonly="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Bagian</label>
									<select class="form-control form-control-sm" name="nama">
										<option>-- Pilih Bagian ---</option>
										<option></option>
										<option></option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Keterangan</label>
									<input class="form-control form-control-sm" type="text" name="npwp" required="" autocomplete="off">
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-2"><h6><i><b>Detail Permintaan</b></i></h6></div>
							<div class="col-md-12">
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label style="font-size: 11pt;">Nama Barang</label>
									<input list="barang" type="test" class="form-control form-control-sm" name="nama">
									<datalist id="barang">
										<option value="1">Barang 1 | Spart | Spare-Part</option>
										<option value="2">Barang 2 | Brng-Lain | Barang-Lain</option>
									</datalist>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label style="font-size: 11pt;">Stok</label>
									<input class="form-control form-control-sm" type="email" name="email" placeholder="Unit" required="" autocomplete="off" readonly="">
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label>&nbsp;</label>
									<input class="form-control form-control-sm" type="text" name="attn" placeholder="Gudang" required="" autocomplete="off" readonly="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Diperlukan</label>
									<input class="form-control form-control-sm" type="date" name="email" required="" autocomplete="off">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Jumlah Permintaan</label>
									<input class="form-control form-control-sm" type="number" name="npwp" required="" autocomplete="off">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Keterangan Permintaan</label>
									<input class="form-control form-control-sm" type="text" name="npwp" placeholder="ex: habis" required="" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-11">
								<div class="form-group">
									<input type="submit" class="btn btn-success btn-sm" value="Tambah Form">
									<input type="reset" class="btn btn-warning btn-sm" value="Reset Form" onclick="return confirm('Konfirmasi Reset Form ?')">
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right">
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
								</div>
							</div>
						</div>
						<?php echo form_close() ?>  
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

