<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Ubah Detail Bon Barang</h3>
			</div>
			<div class="card-body">
				<?php foreach ($isi as $key => $row): ?>
				<?php echo validation_errors();?>
				<?php echo form_open('gudang/dtlbonbarang_u/'.$row->id_dtlmutasi);?>
					<div class="row">
						<div class="col-md-12">
							<table width="100%">
								<tr>
									<td><label style="font-size: 11pt; margin-left: 5%;">Kode Akt</label></td>
									<td>
										<div class="input-group-prepend">
										<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-kdakt">Cari</button>
										<input class="form-control form-control-sm" type="text" readonly="" name="kdaktbrng" value="<?php echo $row->id_barang?>" id="ekdbrngakt_bon">
										</div>
									</td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Barang</label></td>
									<td colspan="3">
										<input type="text" class="form-control form-control-sm" readonly="" name="kode" hidden="" value="<?php echo $row->id_dtlmutasi?>">
										<input type="text" class="form-control form-control-sm" readonly="" name="kodebon" hidden="" value="<?php echo $row->id_mutasi?>">
										<input type="text" class="form-control form-control-sm" readonly="" value="<?php echo $row->nm_jnsbrngakt?>" id="enmkdbrngakt_bon">
									</td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Kd Trans</label></td>
									<td>
										<?php echo cmb_dinamis("kdtrans_bon","tbl_kdtransaksi","id_kdtransaksi","nm_kdtransaksi","id_kdtransaksi","$row->id_kdtransaksi","Pilih Kode Transaksi");?>
									</td>
								</tr>
								<tr>
									<td><label style="font-size: 11pt; margin-left: 5%;">Jumlah1</label></td>
									<td><input type="number" class="form-control form-control-sm" name="jml1_bon" value="<?php echo $row->jml1_dtlmutasi?>"></td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Jumlah2</label></td>
									<td><input type="number" class="form-control form-control-sm" name="jml2_bon" value="<?php echo $row->jml2_dtlmutasi?>"></td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Satuan1</label></td>
									<td>
										<?php echo cmb_dinamis("sat1_bon","tbl_satuan","id_satuan","nm_satuan","id_satuan","$row->sat1_dtlmutasi"," Pilih Satuan ");?>
									</td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Satuan2</label></td>
									<td>
										<?php echo cmb_dinamis("sat2_bon","tbl_satuan","id_satuan","nm_satuan","id_satuan","$row->sat2_dtlmutasi"," Pilih Satuan ");?>
									</td>
								</tr>
								<tr>
									<td><label style="font-size: 11pt; margin-left: 5%;">Keluar1</label></td>
									<td><input type="number" class="form-control form-control-sm" name="keluar1_bon" placeholder="" value="<?php echo $row->keluar1_dtlmutasi?>"></td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Keluar2</label></td>
									<td><input type="number" class="form-control form-control-sm" name="keluar2_bon" placeholder="" value="<?php echo $row->keluar2_dtlmutasi?>"></td>
									<td><label style="font-size: 11pt; margin-left: 5%;">Keterangan</label></td>
									<td colspan="3">
										<input type="text" class="form-control form-control-sm" name="ket_bon" placeholder="" value="<?php echo $row->ket_dtlmutasi?>">
									</td>
								</tr>
								<tr>
									<td><label style="font-size: 11pt; margin-left: 5%;">Bagian</label></td>
									<td>
										<input type="text" class="form-control form-control-sm" name="kdbagdtl_bon" id="ekdbangdtl_bon" value="<?php echo $row->id_bagian?>" hidden="">
										<input type="text" class="form-control form-control-sm" id="enmbagdtl_bon" readonly="" value="<?php echo $row->nm_bagian?>">
									</td>
								</tr>
							</table>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group float-right">
								<a href="<?php echo site_url('gudang/v_dtl_bonbarang/'.$row->id_mutasi);?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
								<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
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
<!-- modal  -->
<!-- ============================================== MODAL CARI KODE AKUTANSI =========================================== -->
	<div class="modal fade" id="emodal-kdakt"> 
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Cari Data Kode Akutansi</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	<table id="ecaritblkdakt" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
	        		<thead>
	        			<tr>
		        			<th>Kode Akutansi</th>
		        			<th>Nama Barang</th>
		        			<th>Jenis Barang</th>
		        			<th>Bagian</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        		<?php foreach ($get_kdbrngaktbon as $a) { ?>
	        			<tr id="epilih_kdbrngaktbon"
							kdbrngakt_bon = "<?php echo $a->id_jnsbrngakt?>"
							nmbrngakt_bon = "<?php echo $a->nm_jnsbrngakt?>"
							kdbagdtl_bon = "<?php echo $a->id_bagian?>"
							nmbagdtl_bon = "<?php echo $a->nm_bagian?>"
	        			>
	        				<td><?php echo $a->no_jnsbrngakt?></td>
	        				<td><?php echo $a->nm_jnsbrngakt?></td>
	        				<td><?php echo $a->nm_jnsbrng?></td>
	        				<td><?php echo $a->nm_bagian?></td>
	        			</tr>
		        	<?php } ?>
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
<script type="text/javascript">
/*================================= MODAL CARI NOTA ========================================*/
	$(document).ready(function(){
		// tabel no permintaan
		$(function () {
			$("#ecaritblkdakt").DataTable({
			  "deferRender" : true,
			  "processing"  : true,
			  "order"       : [],
			});
		});
		// get datatabel no permintaan 
		$(document).on('click', '#epilih_kdbrngaktbon', function (e) {
			document.getElementById("ekdbrngakt_bon").value 	= $(this).attr('kdbrngakt_bon');
			document.getElementById("enmkdbrngakt_bon").value 	= $(this).attr('nmbrngakt_bon');
			document.getElementById("ekdbangdtl_bon").value 	= $(this).attr('kdbagdtl_bon');
			document.getElementById("enmbagdtl_bon").value 		= $(this).attr('nmbagdtl_bon');
			$('#emodal-kdakt').modal('hide');
		});
	});
/*====================================== END =============================================*/
</script>