<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Ubah Bon Barang</h3>
			</div>
			<div class="card-body">
				<?php foreach ($isi as $key => $row): ?>
				<?php echo validation_errors();?>
				<?php echo form_open('gudang/bonbarang_u/'.$row->id_mutasi);?>
					<div class="row">
						<div class="col-md-12">
						<table width="100%"> 
							<tr>
								<td><label style="font-size: 11pt; margin-left: 10%;">No Bon</label></td>
								<td width="25%">
									<input class="form-control form-control-sm" type="text" name="notabon" value="<?php echo $row->nota_mutasi?>"> 
									<input class="form-control form-control-sm" type="text" name="kode" hidden="" value="<?php echo $row->id_mutasi?>"> 
								</td> 
								<td><label style="font-size: 11pt; margin-left: 10%;">Tanggal Bon</label></td>
								<td width="15%">
									<input class="form-control form-control-sm" type="date" name="tglbon" value="<?php echo $row->tgl_mutasi?>">
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Bagian</label></td>
								<td width="20%">
									<!-- <input class="form-control form-control-sm" type="text" name="" required=""> -->
									<div class="input-group-prepend">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-bagian">Cari</button>
									<input class="form-control form-control-sm" type="text" readonly="" name="kdbagbon" id="eid_bagian_bon" hidden="" value="<?php echo $row->id_bagian?>">
									<input class="form-control form-control-sm" type="text" readonly="" id="enm_bagian_bon" value="<?php echo $row->nm_bagian?>">
									</div>
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Unit</label></td>
								<td width="15%">
									<input class="form-control form-control-sm" type="text" readonly="" name="kdunit_bon" id="eid_unit_bon" hidden="" value="<?php echo $row->id_unit?>">
									<input class="form-control form-control-sm" type="text" readonly="" id="enm_unit_bon" value="<?php echo $row->nm_unit?>">
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
<!-- ========================================= MODAL CARI BAGIAN =====================================================  -->
	<div class="modal fade" id="emodal-bagian">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Cari Bagian</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	<table id="ecaribagian" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
	        		<thead>
	        			<tr>
		        			<th>Id Bagian</th>
		        			<th>Bagian</th>
		        			<th>Unit</th>
	        			</tr>
	        		</thead>	 
	        		<tbody>
	        		<?php foreach($get_bagian as $c) { ?>
	        			<tr id="epilih_bagian"
							id_cbag ="<?php echo $c->id_bagian?>"
							nm_cbag ="<?php echo $c->nm_bagian?>"
							id_cunit ="<?php echo $c->id_unit?>"
							nm_cunit ="<?php echo $c->nm_unit?>"
	        			>
	        				<td><?php echo $c->id_bagian?></td>
	        				<td><?php echo $c->nm_bagian?></td>
	        				<td><?php echo $c->nm_unit?></td>
	        			</tr>
		        	<?php } ?>
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
<!--  /.modal  -->
<script type="text/javascript">
/*================================= MODAL CARI NOTA ========================================*/
	$(document).ready(function(){
		// tabel no permintaan
		$(function () {
			$("#ecaribagian").DataTable({
			  "deferRender" : true,
			  "processing"  : true,
			  "order"       : [],
			});
		});
		// get datatabel no permintaan 
		$(document).on('click', '#epilih_bagian', function (e) {
			document.getElementById("eid_bagian_bon").value 	= $(this).attr('id_cbag');
			document.getElementById("enm_bagian_bon").value 	= $(this).attr('nm_cbag');
			document.getElementById("eid_unit_bon").value 	= $(this).attr('id_cunit');
			document.getElementById("enm_unit_bon").value 	= $(this).attr('nm_cunit');
			$('#emodal-bagian').modal('hide');
		});
	});
/*====================================== END =============================================*/
</script>