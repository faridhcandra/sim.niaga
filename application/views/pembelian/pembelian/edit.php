<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Ubah Pembelian</h3>
			</div>
			<div class="card-body">
				<?php foreach ($isi as $key => $row): ?>
				<?php echo validation_errors();?>
				<?php echo form_open('pembelian/rencoemb_u/'.$row->id_dtl_pembelian);?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">No Pembelian</label>
								<input class="form-control form-control-sm" type="text" name="nobeli" placeholder="ex: xxx/kdunit/bln/thn" required="" autocomplete="off" value="<?php echo $row->nota_beli?>">
								<input class="form-control form-control-sm" type="text" name="kdpemb" value="<?php echo $row->id_pembelian?>" hidden>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Tgl Bag. Pembelian</label>
								<input class="form-control form-control-sm" type="date" name="tglbeli" required="" value="<?php echo date("Y-m-d");?>">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label style="font-size: 11pt;">Keterangan</label>
								<input class="form-control form-control-sm" type="text" name="ket" required="" value="<?php echo $row->ket_beli?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">No Permintaan</label>
								<div class="input-group-prepend">
				                	<!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-nopermin">Cari</button> -->
									<input class="form-control form-control-sm" type="text" name="idpes" required="" hidden="" id="eidpembpes" value="<?php echo $row->id_permintaan?>">
									<input class="form-control form-control-sm" type="text" readonly="" id="enopembpes" value="<?php echo $row->nota_minta?>">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Tgl Permintaan</label>
								<input class="form-control form-control-sm" type="date" readonly="" id="etglpembpes" value="<?php echo $row->tgl_minta?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Unit</label>
								<input class="form-control form-control-sm" type="text" name="idunit" required="" hidden="" id="eidunitpembpes" value="<?php echo $row->id_unit?>">
								<input class="form-control form-control-sm" type="text" readonly="" id="eunitpembpes" value="<?php echo $row->nm_unit?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Bagian</label>
								<input class="form-control form-control-sm" type="text" name="idbag" required="" hidden="" id="eidbagpembpes" value="<?php echo $row->id_bagian?>">
								<input class="form-control form-control-sm" type="text" readonly="" id="ebagpembpes" value="<?php echo $row->nm_bagian?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"><p><i><b>Detail Pembelian</b></i></p></div>
						<div class="col-md-10">
							<hr>
						</div>
					</div>
					<!-- kkkkkkkkkkkkkkkkkkkk -->
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">kode Pesanan</label>
								<div class="input-group-prepend">
				               	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-dtlnopes">Cari</button>
				                	<input type="text" class="form-control form-control-sm" name="iddtlpes" value="<?php echo $row->id_dtl_permintaan?>" readonly id="eiddtlpembpes">
				               </div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Kode Barang</label>
								<input class="form-control form-control-sm" type="text" name="idbrng" required readonly id="ekdbrngdtlpembpes" value="<?php echo $row->id_barang?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<label style="font-size: 11pt;">Nama Barang</label>
								<input class="form-control form-control-sm" type="text" required readonly id="enmbrngdtlpembpes" value="<?php echo $row->nm_barang?>">
							</div>
						</div>	
						<div class="col-md-2">
							<label style="font-size: 11pt;">Jml. Pesan</label>
							<div class="form-group">
								<input class="form-control form-control-sm" type="text" name="jmlpes" required readonly id="ejmlpesdtlpembpes" value="<?php echo $row->jml_dtl_minta?>">
							</div>
						</div>
						<div class="col-md-2">
							<label style="font-size: 11pt;">Jml. Renc. Beli</label>
							<div class="form-group">
								<input class="form-control form-control-sm" type="number" name="jmlrencbeli" required id="ejmldtlpembpes" value="<?php echo $row->jml_renc_beli?>">
							</div>
						</div>
						<div class="col-md-2">
							<label style="font-size: 11pt;">Hrg. Rencana</label>
							<div class="form-group">
								<input class="form-control form-control-sm" type="number" name="hrgrencbeli" required id="ehrgdtlpembpes" value="<?php echo $row->hrg_renc_beli?>">
							</div>
						</div>
						<div class="col-md-2">
							<label style="font-size: 11pt;">Tgl Rencana</label>
							<div class="form-group">
								<input class="form-control form-control-sm" type="date" name="tglrenc" required id="etgldtlpembpes" value="<?php echo $row->tgl_renc_beli?>">
							</div>
						</div>
						<div class="col-md-3">
							<label style="font-size: 11pt;">Keterangan Beli</label>
							<div class="form-group">
								<input class="form-control form-control-sm" type="text" name="ketdtlbeli" autocomplete="off" id="eketdtlpembpes" value="<?php echo $row->ket_dtl_beli?>">
							</div>
						</div>
					</div>
					<!-- modal -->
					<div class="modal fade" id="emodal-dtlnopes">
					    <div class="modal-dialog modal-lg">
					      <div class="modal-content">
					        <div class="modal-header">
					          <h5 class="modal-title">Cari Data Pesanan</h5>
					          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					            <span aria-hidden="true">&times;</span>
					         </button>
					        </div>
					        <div class="modal-body">
					        	<table id="etbldtlpes" class="table table-sm table-bordered table-hover dataTable" role="grid">
					        		<thead>
					        			<tr>
						        			<th>No Permintaan</th>
						        			<th>Kode Barang</th>
						        			<th>Nama Barang</th>
						        			<th>Jml Pesan</th>
						        			<th>Bagian</th>
						        			<th>Keterangan</th>
					        			</tr>
					        		</thead>
					        		<tbody>
					        			<?php foreach ($get_dtlmint as $x) { ?>
					        			<tr id="epilih_dtlpembpes"
											id_dtlmint		="<?php echo $x->id_dtl_permintaan?>"
											idbrng_dtlmint	="<?php echo $x->id_barang?>"
											nmbrng_dtlmint	="<?php echo $x->nm_barang?>"
											jmlpes_dtlmint	="<?php echo $x->jml_dtl_minta?>"
											hrgbrng_dtlmint	="<?php echo $x->harga_barang?>"
					        			>
					        				<td><?php echo $x->nota_dtl_minta?></td>
					        				<td><?php echo $x->id_barang?></td>
					        				<td><?php echo $x->nm_barang?></td>
					        				<td><?php echo $x->jml_dtl_minta?></td>
					        				<td><?php echo $x->nm_bagian?></td>
					        				<td><?php echo $x->ket_dtl_minta?></td>
					        			</tr>
					        			<?php } ?>
					        		</tbody>
					        	</table>
					        </div>
					        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
					          <b><i>* Pilih pesanan dengan cara klik pada kolom data</i></b>
					        </div>
					      </div>
					    </div>
					</div>
					 <!-- /.modal -->
					<!-- kkkkkkkkkkkkkkkkkkkk -->
					<div class="row">
						<div class="col-md-2"><p><i><b>Total Pembelian</b></i></p></div>
						<div class="col-md-10">
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label style="font-size: 11pt;">Total</label>
							<div class="form-group">
								<input type="number" class="form-control form-control-sm" name="subpemb" id="esubpemb" value="<?php echo $row->total_dtl_beli?>">
							</div>
						</div>
						<div class="col-md-3">
							<label style="font-size: 11pt;">PPN</label>
							<div class="form-group">
								<input type="number" class="form-control form-control-sm" name="subppnpemb" id="esubppnpemb" value="<?php echo $row->ppn_dtl_beli?>">
							</div>
						</div>
						<div class="col-md-3">
							<label style="font-size: 11pt;">Total Harga</label>
							<div class="form-group">
								<input type="number" class="form-control form-control-sm" name="subtotpemb" id="esubtotpemb" value="<?php echo $row->totalhrg_dtl_beli?>">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
					<div class="col-md-12">
						<div class="form-group float-right">
							<a href="<?php echo site_url('pembelian/v_dtl_pemb/'.$row->id_pembelian);?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
							<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
						</div>
					</div>
					</div>
				<?php endforeach ?>
			</div>
			</div>         
		</div>
		</div>
	</div>
</div>
<!-- modal -->
<!-- <div class="modal fade" id="emodal-nopermin">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Permintaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="etblpembpes" class="table table-sm table-bordered table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>No Permintaan</th>
	        			<th>Tgl Permintaan</th>
	        			<th>Unit</th>
	        			<th>Bagian</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_mint as $a) { ?>
        			<tr id="epilih_pembpes"
						idno_mint	="<?php echo $a->id_permintaan?>"
						no_mint		="<?php echo $a->nota_minta?>"
						tgl_mint	="<?php echo $a->tgl_minta?>"
						idunit_mint	="<?php echo $a->id_unit?>"
						unit_mint	="<?php echo $a->nm_unit?>"
						idbag_mint	="<?php echo $a->id_bagian?>"
						bag_mint	="<?php echo $a->nm_bagian?>"
        			>
        				<td><?php echo $a->nota_minta?></td>
        				<td><?php echo date('d/m/Y',strtotime($a->tgl_minta))?></td>
        				<td><?php echo $a->nm_unit?></td>
        				<td><?php echo $a->nm_bagian?></td>
        			</tr>
	        	<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih no permintaan dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div> -->
 <!-- /.modal -->
<script type="text/javascript">
$(document).ready(function(){
	// tabel no permintaan
	/*$(function () {
		$("#etblpembpes").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});*/
	// get datatabel no permintaan 
	/*$(document).on('click', '#epilih_pembpes', function (e) {
		document.getElementById("eidpembpes").value 	= $(this).attr('idno_mint');
		document.getElementById("enopembpes").value 	= $(this).attr('no_mint');
		document.getElementById("etglpembpes").value 	= $(this).attr('tgl_mint');
		document.getElementById("eidunitpembpes").value = $(this).attr('idunit_mint');
		document.getElementById("eunitpembpes").value 	= $(this).attr('unit_mint');
		document.getElementById("eidbagpembpes").value 	= $(this).attr('idbag_mint');
		document.getElementById("ebagpembpes").value 	= $(this).attr('bag_mint');
		$('#emodal-nopermin').modal('hide');
	});*/
	// get datatabel detail permintaan
	$(document).on('click', '#epilih_dtlpembpes', function (e) {
		document.getElementById("eiddtlpembpes").value 		= $(this).attr('id_dtlmint');
		document.getElementById("ekdbrngdtlpembpes").value 	= $(this).attr('idbrng_dtlmint');
		document.getElementById("enmbrngdtlpembpes").value 	= $(this).attr('nmbrng_dtlmint');
		document.getElementById("ejmlpesdtlpembpes").value 	= $(this).attr('jmlpes_dtlmint');
		document.getElementById("ehrgdtlpembpes").value 	= $(this).attr('hrgbrng_dtlmint');
		$('#emodal-dtlnopes').modal('hide');
		// set form menjadi kosong
		$('#ejmldtlpembpes').val('');
		$('#etgldtlpembpes').val('');
		$('#eketdtlpembpes').val('');
		$('#esubpemb').val('');
		$('#esubppnpemb').val('');
		$('#esubtotpemb').val('');
	});
	//subtotal 
 	$('#ejmldtlpembpes').keyup(function(){
        var jml        	= parseFloat($('#ejmldtlpembpes').val()) || 0;
        var hrg        	= parseFloat($('#ehrgdtlpembpes').val()) || 0;
        var jumlah      = parseFloat(jml * hrg);
        $('#esubpemb').val(jumlah);
        totalandppn();
    });
    // total dan ppn
    function totalandppn(){
    	var subtotal    = parseFloat($('#esubpemb').val()) || 0;
    	var ppn 		= parseFloat((subtotal * 10)/100);
    	var total 		= parseFloat(subtotal+ppn);

    	$('#esubpemb').val(subtotal);
        $('#esubppnpemb').val(ppn);
    	$('#esubtotpemb').val(total);
    }
	// tabel dtl permintaan
	$(function () {
		$("#etbldtlpes").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
});
</script>