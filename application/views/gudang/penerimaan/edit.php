<!-- Main content --> 
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Edit Data Penerimaan</h3>
					</div>
					<div class="card-body">
					<?php foreach ($isi as $key => $row): ?>
					<?php echo validation_errors();?>
					<?php echo form_open('gudang/penerimaan_u/'.$row->id_penerimaan);?>
						<table width="100%">
							<tr>
								<td width="11%" valign="top"><label style="font-size: 11pt;">Nota Penerimaan</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">			
											<input class=" form-control form-control-sm" type='text' name='nota_terima' id="no_terima" value="<?php echo $row->nota_terima?>">
											<input class="form-control form-control-sm" type="text" name="kode" value="<?php echo $row->id_penerimaan?>" hidden="">
										</div>
									</div>
								</td>
								<td width="11%" valign="top"><label style="font-size: 11pt;">Tanggal Terima</label></td>
								<td colspan="3">
									<div class="col-md-3">
										<div class="form-group">
											<input class="form-control form-control-sm" type="date" name="tgl_terima"required="" value="<?php echo $row->tgl_terima?>">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Leveransir</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<div class="input-group-prepend">								
											<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-crsup">Cari</button>
											<input class=" form-control form-control-sm" type='text' name='idsup' id="eid_sup" value="<?php echo $row->id_supplier?>" readonly="">
											</div>
										</div>
									</div>
								</td>
								<td colspan="4">
									<div class="col-md-12">
										<div class="form-group">			
											<input list='supplier'class=" form-control form-control-sm" type='text' class='form-control form-control-sm' name='supp' id="enm_sup" value="<?php echo $row->nm_supplier?>" readonly="">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Nota Pembelian</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<div class="input-group-prepend">								
											<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-crnota">Cari</button>
											<input class=" form-control form-control-sm" type='text' class='form-control form-control-sm' name='nota_beli' id="eno_beli" value="<?php echo $row->nota_beli?>" readonly="">
											<input type="text" name="id_pembelian" id="eid_pembelian" value="<?php echo $row->id_pembelian?>" hidden="">
											</div>
										</div>
									</div>	
								</td>
								<td valign="top"><label style="font-size: 11pt;">Nota Cek</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="nota_cek" value="<?php echo $row->nota_cek?>" required="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Tanggal Cek</label></td>
								<td>
									<div class="col-md-8">
										<div class="form-group">
											<input class="form-control form-control-sm" type="date" name="tgl_cek" required="" value="<?php echo $row->tgl_cek?>">
										</div>
									</div>	
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Unit</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="unit" id="enm_unt" value="<?php echo $row->nm_unit?>" required="" readonly="">
											<input class="form-control form-control-sm" type="text" name="idunt" id="eid_unt" value="<?php echo $row->id_unit?>" required="" readonly="" hidden="">
										</div>
									</div>	
								</td>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Surat jalan</label></td>
								<td>							
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="suratjln_terima" value="<?php echo $row->srtjalan_terima?>" required="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Tanggal Jalan</label></td>
								<td>
									<div class="col-md-8">
										<div class="form-group">
											<input class="form-control form-control-sm" type="date" name="tgljalan_terima" value="<?php echo $row->tgljalan_terima?>" required="">
										</div>
									</div>	
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Bagian</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="bagian" id="enm_bag" value="<?php echo $row->nm_bagian?>" required="" readonly="">
											<input class="form-control form-control-sm" type="text" name="idbag" id="eid_bag" value="<?php echo $row->id_bagian?>" required="" readonly="" hidden="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Jenis Barang</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group" >
											<?php echo cmb_dinamis_sel('jns_brng','tbl_jenis_barang','id_jnsbrng','nm_jnsbrng','id_jnsbrng',$row->id_jnsbrng);?>
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Tanggal JT</label></td>
								<td>
									<div class="col-md-8">
										<div class="form-group" >
											<input class="form-control form-control-sm" type="date" name="tgljt_terima" required=""value="<?php echo $row->tgljt_terima?>">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Keterangan</label></td>
								<td colspan="5">
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="ket_terima" value="<?php echo $row->ket_terima?>" required="">
										</div>
									</div>
								</td>
							</tr>
						</table>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right"> 
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

<!-- ========================================= MODAL CARI LEVERANSIR =====================================================  -->
	<div class="modal fade" id="emodal-crsup">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Cari Supplier</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	<table id="ecarisup" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
	        		<thead>
	        			<tr>
		        			<th>ID Supplier</th>
		        			<th>Nama Supplier</th>
	        			</tr>
	        		</thead>	 
	        		<tbody>
	        		<?php foreach ($get_sup as $a) { ?>
	        			<tr id="epilih_sup"
							id_csup ="<?php echo $a->id_supplier?>"
							nm_csup ="<?php echo $a->nm_supplier?>"
	        			>
	        				<td><?php echo $a->id_supplier?></td>
	        				<td><?php echo $a->nm_supplier?></td>
	        			</tr>
		        	<?php } ?>
	        		</tbody>
	        	</table>
	        </div>
	        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
	          <b><i>* Pilih supplier dengan cara klik pada kolom data</i></b>
	        </div>
	      </div>
	    </div>
	 </div>
 <!-- ==================================================================================================================== -->
 <!-- ============================================== MODAL CARI DATA PEMBELIAN =========================================== -->
<div class="modal fade" id="emodal-crnota">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Pembelian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="ecarinota" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>Nota Pembelian</th>
	        			<th>Nama Unit</th>
	        			<th>ID Bagian</th>
	        			<th>Nama Bagian</th>
        			</tr>
        		</thead>	 
        		<tbody>
        		<?php foreach ($get_notabeli as $a) { ?>
        			<tr id="epilih_nota"
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
	        	<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih nota pembelian dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
 <!-- ==================================================================================================================== -->


<!--  /.modal  -->

<script type="text/javascript">
	/*          =============================== MODAL CARI LEVERANSIR =====================================*/
		$(document).ready(function(){
			// tabel no permintaan
			$(function () {
				$("#ecarisup").DataTable({
				  "deferRender" : true,
				  "processing"  : true,
				  "order"       : [],
				});
			});
			// get datatabel no permintaan 
			$(document).on('click', '#epilih_sup', function (e) {
				document.getElementById("eid_sup").value 	= $(this).attr('id_csup');
				document.getElementById("enm_sup").value 	= $(this).attr('nm_csup');
				$('#emodal-crsup').modal('hide');
			});
	/*          =============================== END =====================================*/
	/*          ================================= MODAL CARI NOTA ========================================*/
			// tabel no permintaan
			$(function () {
				$("#ecarinota").DataTable({
				  "deferRender" : true,
				  "processing"  : true,
				  "order"       : [],
				});
			});
			// get datatabel no permintaan 
			$(document).on('click', '#epilih_nota', function (e) {
				document.getElementById("eno_beli").value 		= $(this).attr('nota_cbeli');
				document.getElementById("eid_pembelian").value 	= $(this).attr('id_cpembelian');
				document.getElementById("eid_unt").value 		= $(this).attr('id_cunit');
				document.getElementById("enm_unt").value 		= $(this).attr('nm_cunit');
				document.getElementById("eid_bag").value 		= $(this).attr('id_cbagian');
				document.getElementById("enm_bag").value 		= $(this).attr('nm_cbagian');
				$('#emodal-crnota').modal('hide');
			});
		});
	/*          =============================== END =====================================*/

</script>