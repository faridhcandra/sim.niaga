<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah Bon Barang</h3>
			</div>
			<div class="card-body">
				<?php echo validation_errors();?>
				<?php echo form_open('gudang/');?>
					<div class="row">
						<div class="col-md-12">
						<table width="100%"> 
							<tr>
								<td><label style="font-size: 11pt; margin-left: 10%;">No Bon</label></td>
								<td width="25%">
									<input class="form-control form-control-sm" type="text" name="" required="">
									<!-- <input class="form-control form-control-sm" type="text" name="kode" value="<?php echo $kode?>" hidden="">  -->
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Tanggal Bon</label></td>
								<td width="15%">
									<input class="form-control form-control-sm" type="date" name="" required="">
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Bagian</label></td>
								<td width="20%">
									<!-- <input class="form-control form-control-sm" type="text" name="" required=""> -->
									<div class="input-group-prepend">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-bagian">Cari</button>
									<input class="form-control form-control-sm" type="text" readonly="" id="">
									</div>
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Unit</label></td>
								<td width="15%">
									<input class="form-control form-control-sm" type="text" name="" readonly="">
								</td>
							</tr>
						</table>
						</div>
					</div>
					</br>
					<div class="row">
						<div class="col-md-2"><p><i><b>Detail Bon Barang</b></i></p></div>
						<div class="col-md-10">
							<hr style="border: 1px solid blue;">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table width="100%">
								<tr>
									<td><label style="font-size: 11pt; margin-left: 5%;">Kode Akt</label></td>
									<td>
										<div class="input-group-prepend">
										<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-kdakt">Cari</button>
										<input class="form-control form-control-sm" type="text" readonly="" id="">
										</div>
									</td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Barang</label></td>
									<td colspan="3">
										<input type="text" class="form-control form-control-sm" name="" value="" placeholder="" readonly="">
									</td>
								</tr>
								<tr>
									<td><label style="font-size: 11pt; margin-left: 5%;">Jumlah1</label></td>
									<td><input type="text" class="form-control form-control-sm" name="" value="" placeholder=""></td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Jumlah2</label></td>
									<td><input type="text" class="form-control form-control-sm" name="" value="" placeholder=""></td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Satuan1</label></td>
									<td><input type="text" class="form-control form-control-sm" name="" value="" placeholder=""></td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Satuan2</label></td>
									<td><input type="text" class="form-control form-control-sm" name="" value="" placeholder=""></td>
								</tr>
								<tr>
									<td><label style="font-size: 11pt; margin-left: 5%;">Keterangan</label></td>
									<td>
										<input type="text" class="form-control form-control-sm" name="" value="" placeholder="">
									</td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Kd Trans</label></td>
									<td>
										<?php echo cmb_dinamis('kdtrans','tbl_kdtransaksi','id_kdtransaksi','nm_kdtransaksi','id_kdtransaksi','','Pilih Kode Transaksi');?>
										<!-- <input type="text" class="form-control form-control-sm" name="" value="" placeholder=""> -->
									</td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Keluar1</label></td>
									<td><input type="text" class="form-control form-control-sm" name="" value="" placeholder=""></td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Keluar2</label></td>
									<td><input type="text" class="form-control form-control-sm" name="" value="" placeholder=""></td>
								</tr>
							</table>
						</div>						
					</div>
					<!-- <div id="insert-cek"></div>
					<div class="row">
						<div class="col-md-11">
							<input type="button" class="btn btn-dark btn-sm" value="Tambah Form" id="tambah-cek">
							<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-cek">
						</div>
					</div> -->
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group float-right">
								<a href="<?php echo site_url('gudang/v_bonbarang');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
								<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
							</div>
						</div>
					</div>
				</form>
				<input type="hidden" id="jmlcek" value="1"> 
			</div>
			</div>         
		</div>
		</div>
	</div>
</div>

<!-- modal  -->
<!-- ========================================= MODAL CARI BAGIAN =====================================================  -->
	<div class="modal fade" id="modal-bagian">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Cari Bagian</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	<table id="caribagian" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
	        		<thead>
	        			<tr>
		        			<th>Id Bagian</th>
		        			<th>Nama Bagian</th>
		        			<th>Nama Unit</th>
	        			</tr>
	        		</thead>	 
	        		<tbody>
	        		<!-- <?php foreach ($get_sup as $a) { ?>
	        			<tr id="pilih_sup"
							id_csup ="<?php echo $a->id_supplier?>"
							nm_csup ="<?php echo $a->nm_supplier?>"
	        			>
	        				<td><?php echo $a->id_supplier?></td>
	        				<td><?php echo $a->nm_supplier?></td>
	        			</tr>
		        	<?php } ?> -->
	        		</tbody>
	        	</table>
	        </div>
	        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
	          <b><i>* Pilih Bagian dengan cara klik pada kolom data</i></b>
	        </div>
	      </div>
	    </div>
	 </div>
 <!-- ==================================================================================================================== -->
 <!-- ============================================== MODAL CARI KODE AKUTANSI =========================================== -->
<div class="modal fade" id="modal-kdakt">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Kode Akutansi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="carikdakt" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>Kode Akutansi</th>
	        			<th>Nama Barang</th>
	        			<th>Jenis Barang</th>
	        			<th>Bagian</th>
        			</tr>
        		</thead>	 
        		<tbody>
        		<!-- <?php foreach ($get_notabeli as $a) { ?>
        			<tr id="pilih_nota"
						nota_cbeli ="<?php echo $a->nota_beli?>"
						id_cpembelian ="<?php echo $a->id_pembelian?>"
						id_cunit ="<?php echo $a->id_unit?>"
						nm_cunit ="<?php echo $a->nm_unit?>"
						id_cbagian ="<?php echo $a->id_bagian?>"
						nm_cbagian ="<?php echo $a->nm_bagian?>"
        			>
        				<td><?php echo $a->nota_beli?></td>
        				<td><b>[<?php echo $a->id_unit?>]</b> <?php echo $a->nm_unit?></td>
        				<td><?php echo $a->id_bagian?></td>
        				<td><?php echo $a->nm_bagian?></td>
        			</tr>
	        	<?php } ?> -->
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih Kode Akutansi dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
 <!-- ==================================================================================================================== -->
<!--  /.modal  -->
