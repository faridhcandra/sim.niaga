<!-- Main content --> 
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Ubah Barang Keluar</h3>
					</div>
					<div class="card-body">

						<?php foreach ($isi as $key => $row): ?>
						<?php echo validation_errors();?>
						<?php echo form_open('stok/brngkel_u/'.$row->id_brngkel)?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Nama Barang</label>			
									<input list='dt_barang'class="form-control form-control-sm" type='text' class='form-control form-control-sm' name='barang' id="nm_brg" value="<?php echo $row->nm_barang;?>"readonly="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Keluar</label>
									<input class="form-control form-control-sm" type="date" name="tgl_keluar"required="" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Stok</label>
									<input class="form-control form-control-sm" type="text" name="stok_masuk" id="sto" value="<?php echo $row->stok_masuk;?>"required="" autofocus="" readonly="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Jumlah Keluar</label>
									<input class="form-control form-control-sm" type="text" name="jumlahkel" value="<?php echo $row->jumlah_brngkel;?>" required="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Sub Harga</label>
									<input class="form-control form-control-sm" type="text" name="subhrg" id="hrg" required=""readonly="">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group" >
									<label style="font-size: 11pt;">ID Barang Masuk</label>
									<input class="form-control form-control-sm" type="text" name="id_brngmsk" id="id_bmasuk" required="" readonly="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">ID Barang</label>
									<input class="form-control form-control-sm" type="text" name="id_barang" id="id_brg" value="<?php echo $row->id_barang;?>" required="" readonly="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Masuk</label>
									<input class="form-control form-control-sm" type="date" name="tglmsk" id="tgl_msk" required="" value="<?php echo date('Y-m-d');?>" readonly="">
								</div>
							</div>							
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Total Harga</label>
									<input class="form-control form-control-sm" type="text" name="totalhrg" required="" readonly="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">ID Stok</label>
									<input class="form-control form-control-sm" type="text" name="id_stok" id="id_sto" required="" readonly="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">ID Barang Keluar</label>
									<input class="form-control form-control-sm" type="text" name="id_brngkel"  value="<?php echo $row->id_brngkel;?>" readonly="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">ID Bagian</label>
									<input class="form-control form-control-sm" type="text" name="id_bagian" required="" readonly="">
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right"> 
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Update">
								</div>
							</div>
						</div>
					<?php echo form_close() ?> 
					<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>