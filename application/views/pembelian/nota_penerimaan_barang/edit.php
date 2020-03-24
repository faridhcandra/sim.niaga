<!-- Main content -->
<div class="content text-sm">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Ubah NPB</h3>
			</div>
			<div class="card-body">
				<?php foreach ($isi as $key => $row): ?>
				<?php echo validation_errors();?>
				<?php echo form_open('pembelian/npb_u/'.$row->id_penerimaan);?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">No Penerimaan</label>
								<input class="form-control form-control-sm" type="text" name="nonpb" readonly="" value="<?php echo $row->nota_terima?>">
								<input class="form-control form-control-sm" type="text" name="kode" hidden="" value="<?php echo $row->id_penerimaan?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Tgl Terima</label>
								<input class="form-control form-control-sm" type="date" name="tglnpb" value="<?php echo $row->tgl_terima?>" readonly="" id="tglterimanpb">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label style="font-size: 11pt;">Leveransir</label>
								<div class="input-group-prepend">
									<input class="form-control form-control-sm col-md-3" type="text" name="kdlever" readonly="" value="<?php echo $row->id_supplier?>">
									<input class="form-control form-control-sm" type="text" readonly="" value="<?php echo $row->nm_supplier?>">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Mata Uang</label>
								<select class="form-control form-control-sm" name="kurs" required id="jnskurs_terima">
									<option value="<?php echo $row->kurs_terima?>"><?php echo $row->kurs_terima?></option>
									<option value="">-- Pilih Mata Uang--</option>
									<option value="RP">RP</option>
									<option value="CHF">CHF</option>
									<option value="EUR">EUR</option>
									<option value="GBP">GBP</option>
									<option value="US">US$</option>
									<option value="YEN">YEN</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Nilai Kurs</label>
								<input class="form-control form-control-sm" type="number" name="jmlkurs" id="jmlkurs_terima" value="<?php echo $row->jml_kurs_terima?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Lunas</label>
								<!-- <select class="form-control form-control-sm" name="lunas" required>
									<option value=""> Pilih Pelunasan </option>
									<option value="Y">Lunas</option>
									<option value="T">Belum Lunas</option>
								</select> -->
								<?php echo cmb_dinamis_yt('pelunasan',$row->lunas_terima,$row->lunas_terima)?>
							</div>
						</div>
					</div>
					<br>
					<div class="row table-responsive">
						<div class="col-md-12">
							<table width="100%">
								<tr>
									<td valign="top"><label style="font-size: 11pt;">No Pembelian</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="text" name="kdbeli" readonly="" hidden="" value="<?php echo $row->id_pembelian?>">
												<input class="form-control form-control-sm" type="text" readonly="" value="<?php echo $row->nota_beli?>">
											</div>
										</div>
									</td>
									<td valign="top"><label style="font-size: 11pt;">No Test</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="text" name="kdcek" readonly="" hidden="" value="<?php echo $row->id_cek?>">
												<input class="form-control form-control-sm" type="text" readonly="" value="<?php echo $row->nota_cek?>">
											</div>
										</div>
									</td>
									<td valign="top"><label style="font-size: 11pt;">Tgl Test</label></td>
									<td>
										<div class="col-md-11">
											<div class="form-group">
												<input class="form-control form-control-sm" type="date" name="tglcek" readonly="" value="<?php echo $row->tgl_cek?>">
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td valign="top"><label style="font-size: 11pt;">Unit</label></td>
									<td>
										<div class="col-md-10">
											<div class="form-group">
												<input class="form-control form-control-sm" type="text" name="kdunit" readonly="" hidden="" value="<?php echo $row->id_unit?>">
												<input class="form-control form-control-sm" type="text" readonly="" value="<?php echo $row->nm_unit?>">
											</div>
										</div>
									</td>
									<td valign="top"><label style="font-size: 11pt;">Srt Jalan</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="text" name="srtjln" readonly="" value="<?php echo $row->srtjalan_terima?>">
											</div>
										</div>
									</td>
									<td valign="top"><label style="font-size: 11pt;">Tgl Jalan</label></td>
									<td>
										<div class="col-md-11">
											<div class="form-group">
												<input class="form-control form-control-sm" type="date" name="tgljln" readonly="" value="<?php echo $row->tgljalan_terima?>">
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td valign="top"><label style="font-size: 11pt;">Bagian</label></td>
									<td>
										<div class="col-md-10">
											<div class="form-group">
												<input class="form-control form-control-sm" type="text" name="kdbagian" readonly="" hidden="" value="<?php echo $row->id_bagian?>">
												<input class="form-control form-control-sm" type="text" readonly="" value="<?php echo $row->nm_bagian?>">
											</div>
										</div>
									</td>
									<td valign="top"><label style="font-size: 11pt;">No SPB</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
											<div class="input-group-prepend">
												<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-spbnpb">Cari</button>
												<input class="form-control form-control-sm" type="text" name="kdspb" id="idspb_npb" readonly="" hidden="">
												<input class="form-control form-control-sm" type="text" name="nospb" id="notaspb_npb" readonly="">
											</div>
											</div>
										</div>
									</td>
									<td valign="top"><label style="font-size: 11pt;">Tgl SPB</label></td>
									<td>
										<div class="col-md-11">
											<div class="form-group">
												<input class="form-control form-control-sm" type="date" name="tglspb" id="tglspb_npb">
											</div>
										</div>
									</td>
								</tr>								
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><p><i><b>Detail Penerimaan Barang</b></i></p></div>
						<div class="col-md-9">
							<hr style="border: 1px solid green;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table width="100%">
								<?php $i=0; foreach ($isi_detail as $key => $dtl){ $i++; ?>
								<tr>
									<td><label style="font-size: 11pt; color: red;"><i>Detail <?php echo $i;?></label></td>
									<td colspan="7"><hr></td>
								</tr>
								<tr>
									<td width="13%"><label style="font-size: 11pt;">&ensp;Kode Barang</label></td>
									<td colspan="3"><label style="font-size: 11pt;">&ensp;Nama Barang</label></td>
									<td colspan="3" align="center"><label style="font-size: 11pt; margin-right: 15%;">Detail Asing</label></td>
									<td colspan="3"><label style="font-size: 11pt; margin-left: 5%;">Detail Rupiah</label></td>
								</tr>
								<tr>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="text" name="dtl_idterima[]" hidden="" value="<?php echo $dtl->id_dtl_penerimaan?>">
												<input class="form-control form-control-sm" type="text" name="dtl_kdbrng[]" readonly="" value="<?php echo $dtl->id_barang?>">
											</div>
										</div>
									</td>
									<td colspan="3">
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="text" readonly="" value="<?php echo $dtl->nm_barang?>">
											</div>
										</div>
									</td>
									<td align="right" valign="top" colspan="2"><label style="font-size: 11pt;">Harga</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_hargaasing[]" id="k_hrgnpb<?php echo $i?>" value="0" readonly="">
											</div>
										</div>
									</td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_hargarp[]" id="hrgnpb<?php echo $i?>" value="<?php echo $dtl->harga_dtlterima?>">
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td align="right" valign="top"><label style="font-size: 11pt;">Jumlah 1</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_jml1[]" id="jml1npb<?php echo $i?>" value="<?php echo $dtl->jml1_dtlterima?>">
											</div>
										</div>
									</td>
									<td align="right" valign="top"><label style="font-size: 11pt;">Satuan 1</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<!-- <input class="form-control form-control-sm" type="text" name="" value="<?php echo $dtl->nm_satuan1?>"> -->
												<?php echo cmb_dinamis_sel('dtl_sat1[]','tbl_satuan','id_satuan','nm_satuan','id_satuan',$dtl->sat1_dtlterima);?>
											</div>
										</div>
									</td>
									<td align="right" valign="top" colspan="2"><label style="font-size: 11pt;">Jumlah</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_jmlasing[]" id="k_totjmldtlnpb<?php echo $i?>" value="<?php echo $dtl->k_subtotal_dtlterima?>">
											</div>
										</div>
									</td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_jmlrp[]" id="totjmldtlnpb<?php echo $i?>" value="<?php echo $dtl->subtotal_dtlterima?>">
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td align="right" valign="top"><label style="font-size: 11pt;">Jumlah 2</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_jml2[]" value="<?php echo $dtl->jml2_dtlterima?>">
											</div>
										</div>
									</td>
									<td align="right" valign="top"><label style="font-size: 11pt;">Satuan 2</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<!-- <input class="form-control form-control-sm" type="text" name="" value="<?php echo $dtl->nm_satuan2?>"> -->
												<?php echo cmb_dinamis_sel('dtl_sat2[]','tbl_satuan','id_satuan','nm_satuan','id_satuan',$dtl->sat2_dtlterima);?>
											</div>
										</div>
									</td>
									<td align="right" valign="top" colspan="2"><label style="font-size: 11pt;">Ppn</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_ppnasing[]" id="k_ppndtlnpb<?php echo $i?>" value="<?php echo $dtl->k_ppn_dtlterima?>">
											</div>
										</div>
									</td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_ppnrp[]" id="ppndtlnpb<?php echo $i?>" value="<?php echo $dtl->ppn_dtlterima?>">
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="3" align="right" valign="top"><label style="font-size: 11pt;">Detail Biaya Angkut (Rp.)</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_angkut[]" id="dtlaktnpb<?php echo $i?>" value="<?php echo $dtl->angkut_dtlterima?>">
											</div>
										</div>
									</td>
									<td align="right" valign="top" colspan="2"><label style="font-size: 11pt;">TotalHrg</label></td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_tothrgasing[]" id="k_tothrgdtlnpb<?php echo $i?>" value="<?php echo $dtl->k_totalharga_dtlterima?>">
											</div>
										</div>
									</td>
									<td>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control form-control-sm" type="number" name="dtl_tothrgrp[]" id="tothrgdtlnpb<?php echo $i?>" value="<?php echo $dtl->totalharga_dtlterima?>">
											</div>
										</div>
									</td> 
								</tr style="border-bottom: 1px solid #000;">

								<script type="text/javascript">
							    	$('#jml1npb<?php echo $i?>,#hrgnpb<?php echo $i?>,#dtlaktnpb<?php echo $i?>,#jmlkurs_terima').keyup(function(){
								        var jml        	= parseFloat($('#jml1npb<?php echo $i?>').val()) || 0;
								        var hrg        	= parseFloat($('#hrgnpb<?php echo $i?>').val()) || 0;
								        var jumlah      = parseFloat(jml * hrg);
								    	var ppn 		= parseFloat((jumlah * 10)/100);
								    	var total 		= parseFloat(jumlah+ppn);

								    	var kurse 		= parseFloat($('#jmlkurs_terima').val()) || 0;
								        var hrgasing    = parseFloat(hrg/kurse);
								        var jumlahasing = parseFloat((hrgasing.toFixed(4)*jml));
								        var ppnasing 	= parseFloat((jumlahasing * 10)/100);
								        var totalasing 	= parseFloat(jumlahasing+ppnasing);


								        $('#totjmldtlnpb<?php echo $i?>').val(jumlah);
								        $('#ppndtlnpb<?php echo $i?>').val(ppn);
								    	$('#tothrgdtlnpb<?php echo $i?>').val(total);

								    	$('#k_hrgnpb<?php echo $i?>').val(hrgasing.toFixed(2));
								    	$('#k_totjmldtlnpb<?php echo $i?>').val(jumlahasing.toFixed(2));
								        $('#k_ppndtlnpb<?php echo $i?>').val(ppnasing.toFixed(2));
								    	$('#k_tothrgdtlnpb<?php echo $i?>').val(totalasing.toFixed(2));
								        totalnpbasing();
								    });
								</script>
								<?php } ?>

							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"><p><i><b>Rekap Nota Penerimaan</b></i></p></div>
						<div class="col-md-10">
							<hr style="border: 1px solid green;">
						</div>
					</div>
					<div class="row table-responsive">
						<div class="col-md-12">
						<table width="100%">
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Hari JT</label></td>
								<td width="10%">
									<div class="col-md-10">
										<div class="form-group">
											<input class="form-control form-control-sm" type="number" name="hrijt" min="0" id="harijtnpb" value="<?php echo $row->harijt_terima?>">
										</div>
									</div>
								</td>
								<td width="5%" valign="top"><label style="font-size: 11pt;">Tgl JT</label></td>
								<td colspan="2">
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="date" name="tgljt" readonly="" id="tgljtnpb" value="<?php  if($row->tgljt_terima == "0000-00-00"){echo "";}else{echo $row->tgljt_terima;}?>">
										</div>
									</div>
								</td>
								<td align="right" colspan="2" valign="top"><label style="font-size: 11pt;">Biaya Angkut (Rp.)</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="number" name="byangkut" value="<?php echo $row->biaya_angkut_terima?>" id="angkutrp">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td rowspan="3" valign="top"><label style="font-size: 11pt;">Keterangan</label></td>
								<td colspan="4" rowspan="3" valign="top">
									<div class="col-md-12">
										<div class="form-group">
											<textarea name="ket" rows="5" class="form-control form-control-sm" name="ket"><?php echo $row->ket_terima?></textarea>
										</div>
									</div>
								</td>
								<td></td>
								<td valign="bottom"><label style="font-size: 11pt; margin-left: 5%;">Asing</label></td>
								<td><label style="font-size: 11pt; margin-left: 5%;">Rupiah</label></td>
							</tr>
							<tr>
								<td align="right" valign="top"><label style="font-size: 11pt;">Jumlah</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="number" name="subtotasing" id="subtotasingnpb" value="<?php echo $row->k_subtotal_terima?>">
										</div>
									</div>
								</td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="number" name="subtotrp" id="subtotrp" value="<?php echo $row->subtotal_terima?>">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td align="right" valign="top"><label style="font-size: 11pt;">PPN</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="number" name="ppnasing" id="ppnasingnpb" value="<?php echo $row->k_ppn_terima?>">
										</div>
									</div>
								</td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="number" name="ppnrp" id="ppnrp" value="<?php echo $row->ppn_terima?>">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Group</label></td>
								<td colspan="4">
									<div class="col-md-10">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="idjenis" readonly="" hidden="" value="<?php echo $row->id_jnsbrng?>">
											<input class="form-control form-control-sm" type="text" readonly="" value="<?php echo $row->nm_jnsbrng?>">
										</div>
									</div>
								</td>
								<td align="right" valign="top"><label style="font-size: 11pt;">Total</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="number" name="totasing" id="totasingnpb" value="<?php echo $row->k_totalharga_terima?>">
										</div>
									</div>
								</td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="number" name="totrp" id="totrp" value="<?php echo $row->totalharga_terima?>">
										</div>
									</div>
								</td>
							</tr>
						</table>
						</div>
					</div>
					<hr style="border: 1px solid #000;">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group float-right">
								<a href="<?php echo site_url('pembelian/v_npb');?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a>
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
<!-- modal -->
<div class="modal fade" id="modal-spbnpb">
    <div class="modal-dialog modal-lg text-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Surat Pesanan Barang (SPB)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="tblspbnpb" class="table table-sm table-bordered table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>No Surat Pesanan Barang</th>
	        			<th>Tanggal</th>
	        			<th>Leveransir</th>
	        			<th>Atas Nama</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_spb as $a) { ?>
        			<tr id="pilih_spbnpb"
						id_spbnpb	="<?php echo $a->id_spb?>"
						tgl_spbnpb	="<?php echo $a->tgl_spb?>"
						nota_spbnpb	="<?php echo $a->nota_spb?>"
        			>
        				<td><?php echo $a->nota_spb?></td>
        				<td><?php echo date('d/m/Y',strtotime($a->tgl_spb))?></td>
        				<td><?php echo $a->nm_supplier?></td>
        				<td><?php echo $a->attn_supplier?></td>
        			</tr>
	        	<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih Surat Pesanan Barang dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
 <!-- /.modal -->
<script type="text/javascript">
	$(document).ready(function(){
		$(function () {
			$("#tblspbnpb").DataTable({
			  "deferRender" : true,
			  "processing"  : true,
			  "order"       : [],
			});
		});
		// get datatabel no permintaan 
		$(document).on('click', '#pilih_spbnpb', function (e) {
			document.getElementById("idspb_npb").value 		= $(this).attr('id_spbnpb');
			document.getElementById("tglspb_npb").value 	= $(this).attr('tgl_spbnpb');
			document.getElementById("notaspb_npb").value 	= $(this).attr('nota_spbnpb');
			$('#modal-spbnpb').modal('hide');
		});
		// key up data
		$('#harijtnpb').keyup(function(){
			// tanggal asal yang akan ditambahkan
			var tglasal = $('#tglterimanpb').val();
			// memecah tanggal
			var m 		= moment().format(tglasal);
			var d 		= moment(m).format("DD");
			var mn 		= moment(m).format("MM");   
			var y 		= moment(m).format("YYYY");
			// menambah tanggal
			var hr 		= $('#harijtnpb').val();
			var hrjd 	= parseInt(hr);
			var nilai 	= moment(m).clone().add(hrjd, 'days').format('YYYY-MM-DD');
			// set tanggal jadi
			document.getElementById("tgljtnpb").value = nilai; 
		});
	});
	 function totalnpbasing(){
    	// asing 								        
		var arr1 = document.getElementsByName('dtl_jmlasing[]');
	    var tot1 = 0;
	    for(var i=0;i<arr1.length;i++){
	        if(parseFloat(arr1[i].value))
	            tot1 += parseFloat(arr1[i].value);
	    }
    	document.getElementById('subtotasingnpb').value = tot1.toFixed(2);

	    var arr2 = document.getElementsByName('dtl_ppnasing[]');
	    var tot2 = 0;
	    for(var i=0;i<arr2.length;i++){
	        if(parseFloat(arr2[i].value))
	            tot2 += parseFloat(arr2[i].value);
	    }
    	document.getElementById('ppnasingnpb').value = tot2.toFixed(2);

    	var arr4 = document.getElementsByName('dtl_angkut[]');
	    var tot4 = 0;
	    for(var i=0;i<arr4.length;i++){
	        if(parseFloat(arr4[i].value))
	            tot4 += parseFloat(arr4[i].value);
	    }
	    var angktasing = $("#jmlkurs_terima").val();
	    var silangktasing = (tot4.toFixed(2))/angktasing;

	    var arr3 = document.getElementsByName('dtl_tothrgasing[]');
	    var tot3 = 0;
	    for(var i=0;i<arr3.length;i++){
	        if(parseFloat(arr3[i].value))
	            tot3 += parseFloat(arr3[i].value);
	    }
	    var jmltot = parseFloat(tot3+silangktasing);
    	document.getElementById('totasingnpb').value = jmltot.toFixed(2);

    	// rupiah
    	var arr5 = document.getElementsByName('dtl_jmlrp[]');
	    var tot5 = 0;
	    for(var i=0;i<arr5.length;i++){
	        if(parseFloat(arr5[i].value))
	            tot5 += parseFloat(arr5[i].value);
	    }
    	document.getElementById('subtotrp').value = tot5.toFixed(2);

	    var arr6 = document.getElementsByName('dtl_ppnrp[]');
	    var tot6 = 0;
	    for(var i=0;i<arr6.length;i++){
	        if(parseFloat(arr6[i].value))
	            tot6 += parseFloat(arr6[i].value);
	    }
    	document.getElementById('ppnrp').value = tot6.toFixed(2);

    	var arr7 = document.getElementsByName('dtl_angkut[]');
	    var tot7 = 0;
	    for(var i=0;i<arr7.length;i++){
	        if(parseFloat(arr7[i].value))
	            tot7 += parseFloat(arr7[i].value);
	    }
    	document.getElementById('angkutrp').value = tot7.toFixed(2);

	    var arr8 = document.getElementsByName('dtl_tothrgrp[]');
	    var tot8 = 0;
	    for(var i=0;i<arr8.length;i++){
	        if(parseFloat(arr8[i].value))
	            tot8 += parseFloat(arr8[i].value);
	    }
	    var jmltotrp = (tot7+tot8);
    	document.getElementById('totrp').value =jmltotrp.toFixed(2);
    }
</script>