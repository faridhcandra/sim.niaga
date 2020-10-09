<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Edit Data</h3>
			</div>
			<div class="card-body">
				<?php foreach ($isi as $key => $row): ?>
				<?php echo validation_errors();?>
				<?php echo form_open('gudang/pengetesandtl_u/'.$row->id_dtl_cek);?>
				<div class="row">
					<div class="col-md-12">
					<table width="100%">
						<tr>
							<td width="12%"><label style="font-size: 11pt;">No Dtl Pembelian</label></td>
							<td width="25%">
								<div class="input-group-prepend">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-cekdtlpembelian">Cari</button>
									<input class="form-control form-control-sm" type="text" name="kdcekdtlpemb" readonly="" hidden="" id="eid_cekdtlpemb" value="<?php echo $row->id_dtl_pembelian?>">
									<input class="form-control form-control-sm" type="text" name="notadtlpembcek" readonly="" id="enota_cekdtlpemb" value="<?php echo $row->nota_dtl_beli?>">
									<input class="form-control form-control-sm" type="text" name="kdcek" value="<?php echo $row->id_cek?>" hidden="">
								</div>
							</td>
							<td width="10%" align="right"><label style="font-size: 11pt; margin-right: 10%;">Barang</label></td>
							<td width="45%">
								<div class="input-group-prepend">
								<input class="form-control form-control-sm col-md-4" type="text" name="kdbrngcek" required="" readonly="" id="eid_cekbrngdtl" value="<?php echo $row->id_barang?>">
								<input class="form-control form-control-sm " type="text" readonly="" readonly="" id="enm_cekbrngdtl" value="<?php echo $row->nm_barang?>">
								</div>
							</td>
						</tr>
						<tr>
							<td><label style="font-size: 11pt;">Jumlah 1</label></td>
							<td>
								<div class="input-group-prepend">
									<input class="form-control form-control-sm" type="text" required="" readonly="" id="eid_ceksatpemb" hidden="">
									<input class="form-control form-control-sm col-md-6" type="number" name="jmldtlpembcek1" id="ejml_cekdtlpemb" value="<?php echo $row->jml_cek1?>">
									<input class="form-control form-control-sm" type="text" readonly="" id="enm_ceksatpemb" value="<?php echo $row->sat1?>">
								</div>
							</td>
							<td align="right"><label style="font-size: 11pt; margin-right: 10%;">Jumlah 2</label></td>
							<td>
								<div class="input-group-prepend">
									<input class="form-control form-control-sm" type="text" readonly="" id="eid_ceksatpemb2" hidden="">
									<input class="form-control form-control-sm col-md-4" type="number" name="jmldtlpembcek2" id="ejml_cekdtlpemb2" value="<?php echo $row->jml_cek2?>">
									<input class="form-control form-control-sm col-md-4" type="text" readonly="" id="enm_ceksatpemb2" value="<?php echo $row->sat2?>">
								</div>
							</td>
						</tr>
						<tr>
							<td><label style="font-size: 11pt;">Lulus</label></td>
							<td>
								<select class="form-control form-control-sm" name="lulusdtlcek">
									<option value="<?php echo $row->lulus_dtl_cek?>"><?php if($row->lulus_dtl_cek == "Y"){echo "Lulus";}elseif($row->lulus_dtl_cek == "T"){echo "Tidak Lulus";}else{ echo " ";}?></option>
									<option value="">-- Pilih pengetesan --</option>
									<option value="Y">Lulus</option>
									<option value="T">Tidak Lulus</option>
								</select>
							</td>
							<td align="right"><label style="font-size: 11pt;  margin-right: 10%;">Tanggal Lulus</label></td>
							<td>
								<input class="form-control form-control-sm col-md-4" type="date" name="tgldtlcek" id="etgl_cekdtlpemb" value="<?php echo $row->tgl_dtl_lunas?>">
							</td>
						</tr>
						<tr>
							<td><label style="font-size: 11pt;">Ket. pengetesan</label></td>
							<td colspan="2">
								<input class="form-control form-control-sm" type="text" name="ketdtlcek" id="eket_cekdtlpemb" value="<?php echo $row->ket_dtl_cek?>">
							</td>
						</tr>
					</table>
					</div>
				</div>
				<hr>
				<div class="row">
						<div class="col-md-12">
							<div class="form-group float-right">
								<a href="<?php echo site_url('gudang/v_dtl_cek/'.$row->id_cek);?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
<!-- modal -->
<div class="modal fade" id="emodal-cekdtlpembelian">
    <div class="modal-dialog modal-lg text-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Pembelian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="etblcekdtlpemb" class="table table-sm table-bordered table-responsive-sm table-hover dataTable" role="grid">
        		<thead>
        			<tr>
        				<th>No Detail Pembelian</th>
        				<th>Nama Barang</th>
	        			<th>Unit</th>
	        			<th>Jumlah</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_dtlbeli as $a) { ?>
        			<tr id="epilih_cekdtlpemb"
        					id_cekdtlbeli 		= "<?php echo $a->id_dtl_pembelian?>"
        					nota_cekdtlbeli 	= "<?php echo $a->nota_dtl_beli?>"
        					id_cekbrngbeli 		= "<?php echo $a->id_barang?>"
        					nm_cekbrngbeli 		= "<?php echo $a->nm_barang?>"
        					jml_cekbrngbeli		= "<?php echo $a->jml_renc_beli?>"
        					sat_cekbrngbeli 	= "<?php echo $a->sat1_barang?>"
        					nmsat_cekbrngbeli 	= "<?php echo $a->nm_satuan1?>"
        					sat_cekbrngbeli2	= "<?php echo $a->sat2_barang?>"
        					nmsat_cekbrngbeli2 	= "<?php echo $a->nm_satuan2?>"
        					ket_cekdtlbeli 		= "<?php echo $a->ket_dtl_beli?>"
        			>
        				<td><?php echo $a->nota_dtl_beli?></td>
        				<td><?php echo $a->nm_barang?></td>
        				<td><?php echo $a->nm_unit?></td>
        				<td><?php echo $a->jml_renc_beli?></td>
        			</tr>
        		<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih No Pembelian dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
	<!-- /.modal -->
	<script type="text/javascript">
		// tabel Detail Pembelian
	$(function () {
		$("#etblcekdtlpemb").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
	// get datatabel detail Pembelian 
	$(document).on('click', '#epilih_cekdtlpemb', function (e) {
		document.getElementById("eid_cekdtlpemb").value 	= $(this).attr('id_cekdtlbeli');
		document.getElementById("enota_cekdtlpemb").value 	= $(this).attr('nota_cekdtlbeli');
		document.getElementById("eid_cekbrngdtl").value 	= $(this).attr('id_cekbrngbeli');
		document.getElementById("enm_cekbrngdtl").value 	= $(this).attr('nm_cekbrngbeli');
		document.getElementById("ejml_cekdtlpemb").value 	= $(this).attr('jml_cekbrngbeli');
		document.getElementById("eid_ceksatpemb").value 	= $(this).attr('sat_cekbrngbeli');
		document.getElementById("enm_ceksatpemb").value 	= $(this).attr('nmsat_cekbrngbeli');
		document.getElementById("eid_ceksatpemb2").value 	= $(this).attr('sat_cekbrngbeli2');
		document.getElementById("enm_ceksatpemb2").value 	= $(this).attr('nmsat_cekbrngbeli2');
		document.getElementById("eket_cekdtlpemb").value 	= $(this).attr('ket_cekdtlbeli');
		$('#emodal-cekdtlpembelian').modal('hide');
	});
	</script>