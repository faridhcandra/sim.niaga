<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Ubah SPB</h3>
			</div>
			<div class="card-body">
				<?php foreach ($isi as $key => $row): ?>
				<?php echo validation_errors();?>
				<?php echo form_open('pembelian/spb_u/'.$row->id_dtl_spb);?>
					<div class="row">
						<div class="col-md-3"><p><i><b>Detail Surat Pesanan Barang</b></i></p></div>
						<div class="col-md-9">
							<hr style="border: 1px solid green;">
						</div>
					</div>
					<!-- ****************************************************************************************************************** -->
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label style="font-size: 11pt;">No Renc.Pembelian</label>
								<div class="input-group-prepend">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-rencbeli">Cari</button>
									<input class="form-control form-control-sm" type="text" name="spb" value="<?php echo $row->id_spb?>" hidden="">
									<input class="form-control form-control-sm col-md-2" type="text" name="kddtlrenc" required="" readonly="" id="eid_dtlpembspb" value="<?php echo $row->id_dtl_spb?>">
									<input class="form-control form-control-sm" type="text" name="nobeli" required="" readonly="" id="enota_pembspb" value="<?php echo $row->nota_dtl_spb?>">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label style="font-size: 11pt;">Nama Barang</label>
								<div class="input-group-prepend">
									<input class="form-control form-control-sm col-md-3" type="text" name="kdbrng" required="" readonly="" id="eid_brngspb" value="<?php echo $row->id_barang?>">
									<input class="form-control form-control-sm" type="text" readonly="" id="enm_brngspb" value="<?php echo $row->nm_barang?>">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Harga</label>
								<input class="form-control form-control-sm" type="number" name="harga" required="" id="ehrg_spb" value="<?php echo $row->hargabrng_spb?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Jumlah</label>
								<input class="form-control form-control-sm" type="number" name="jml" required="" id="ejml_spb" value="<?php echo $row->jmlbrng_spb?>">
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label style="font-size: 11pt;">Satuan</label>
								<input class="form-control form-control-sm" type="text" name="sat" required="" id="esat_jmlspb" value="<?php echo $row->satuanbrng_spb?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Sub Total</label>
								<input class="form-control form-control-sm" type="number" name="subtotal" required="" id="esub_totalspb" value="<?php echo $row->dtltotal_spb?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Sub PPN</label>
								<input class="form-control form-control-sm" type="number" name="subppn" required="" id="esub_ppnspb" value="<?php echo $row->dtlppn_spb?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;"> Sub Total Harga</label>
								<input class="form-control form-control-sm" type="number" name="subtotahrg" required="" id="esub_tothrgspb" value="<?php echo $row->dtltotalhrg_spb?>">
							</div>
						</div>
					</div>
					<!-- modal -->
					<div class="modal fade" id="emodal-rencbeli">
					    <div class="modal-dialog modal-lg">
					      <div class="modal-content">
					        <div class="modal-header">
					          <h5 class="modal-title">Cari Data Renc. Pembelian</h5>
					          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					            <span aria-hidden="true">&times;</span>
					          </button>
					        </div>
					        <div class="modal-body">
					        	<table id="etblrencbeli" class="table table-sm table-bordered table-hover dataTable" role="grid">
					        		<thead>
					        			<tr>
						        			<th>Id</th>
						        			<th>No Renc. Beli</th>
						        			<th>Kode Barang</th>
						        			<th>Nama Barang</th>
						        			<th>Jumlah</th>
					        			</tr>
					        		</thead>
					        		<tbody>
					        		<?php foreach ($get_rencpemb as $a) { ?>
					        			<tr id="epilih_rencbeli"
											id_dtlrenpemb	="<?php echo $a->id_dtl_pembelian?>"
											nota_rencpemb	="<?php echo $a->nota_dtl_beli?>"
											id_brngrencpemb	="<?php echo $a->id_barang?>"
											nm_brngrencpemb	="<?php echo $a->nm_barang?>"
											jml_rencpemb	="<?php echo $a->jml_renc_beli?>"
											hrg_rencpemb	="<?php echo $a->hrg_renc_beli?>"
											nm_satspb		="<?php echo $a->nm_satuan?>"
											sub_totalspb	="<?php echo $a->total_dtl_beli?>"
											sub_ppnspb		="<?php echo $a->ppn_dtl_beli?>"
											sub_tothrgspb	="<?php echo $a->totalhrg_dtl_beli?>"
					       			>
					        				<td><?php echo $a->id_dtl_pembelian?></td>
					        				<td><?php echo $a->nota_dtl_beli?></td>
					        				<td><?php echo $a->id_barang?></td>
					        				<td><?php echo $a->nm_barang?></td>
					        				<td><?php echo $a->jml_renc_beli?></td>
					        			</tr>
						        	<?php } ?>
					        		</tbody>
					        	</table>
					        </div>
					        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
					          <b><i>* Pilih No Renc. Beli dengan scara klik pada kolom data</i></b>
					        </div>
					      </div>
					    </div>
					 </div>
					<!-- /.modal -->
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group float-right">
								<a href="<?php echo site_url('pembelian/v_dtl_spb/'.$row->id_spb);?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
<script type="text/javascript">
$(document).ready(function(){

	// get datatabel renc pembelian 
	$(document).on('click', '#epilih_rencbeli', function (e) {
		document.getElementById("eid_dtlpembspb").value 	= $(this).attr('id_dtlrenpemb');
		document.getElementById("enota_pembspb").value 		= $(this).attr('nota_rencpemb');
		document.getElementById("eid_brngspb").value 		= $(this).attr('id_brngrencpemb');
		document.getElementById("enm_brngspb").value 		= $(this).attr('nm_brngrencpemb');
		document.getElementById("ehrg_spb").value 			= $(this).attr('hrg_rencpemb');
		document.getElementById("ejml_spb").value 			= $(this).attr('jml_rencpemb');
		document.getElementById("esat_jmlspb").value 		= $(this).attr('nm_satspb');
		document.getElementById("esub_totalspb").value 		= $(this).attr('sub_totalspb');
		document.getElementById("esub_ppnspb").value 		= $(this).attr('sub_ppnspb');
		document.getElementById("esub_tothrgspb").value 	= $(this).attr('sub_tothrgspb');
		$('#emodal-rencbeli').modal('hide');
		totalspb();
	});
	//subtotal 
 	$('#ejml_spb'+',#ehrg_spb').keyup(function(){
        var jml        	= parseFloat($('#ejml_spb').val()) || 0;
        var hrg        	= parseFloat($('#ehrg_spb').val()) || 0;
        var jumlah      = parseFloat(jml * hrg);
        $('#esub_totalspb').val(jumlah);
        totalspb();
    });
    // total dan ppn
    function totalspb(){
    	var subtotal    = parseFloat($('#esub_totalspb').val()) || 0;
    	var ppn 		= parseFloat((subtotal * 10)/100);
    	var total 		= parseFloat(subtotal+ppn);

    	$('#esub_totalspb').val(subtotal);
        $('#esub_ppnspb').val(ppn);
    	$('#esub_tothrgspb').val(total);
    }
    // tabel no renc pembelian
	$(function () {
		$("#etblrencbeli").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
});
</script>