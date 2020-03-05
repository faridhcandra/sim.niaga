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
				<?php echo form_open('pembelian/nospb_u/'.$row->id_spb);?>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">No SPB</label>
								<input class="form-control form-control-sm" type="text" name="nospb" placeholder="ex: xxx/spb/kdunit/bln/thn" required="" autocomplete="off" autofocus="" value="<?php echo $row->nota_spb?>">
								<input class="form-control form-control-sm" type="text" name="kode" hidden="" value="<?php echo $row->id_spb?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Tanggal</label>
								<input class="form-control form-control-sm" type="date" name="tglspb" placeholder="ex:" required="" value="<?php echo $row->tgl_spb?>">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label style="font-size: 11pt;">Mata Uang</label>
								<select class="form-control form-control-sm" name="kurs">
									<option selected="" value="<?php echo $row->kurs_spb?>"><?php echo $row->kurs_spb?></option>
									<option value="">-----</option>
									<option value="RP">RP</option>
									<option value="CHF">CHF</option>
									<option value="EUR">EUR</option>
									<option value="GBP">GBP</option>
									<option value="US">US$</option>
									<option value="YEN">YEN</option>
								</select>
							</div>
						</div>
						<!-- </div>
						<div class="row"> -->
						<div class="col-md-5">
							<div class="form-group">
								<label style="font-size: 11pt;">Leveransir</label>
								<div class="input-group-prepend">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-supplier">Cari</button>
									<input class="form-control form-control-sm col-md-3" type="text" name="kdlever" required="" readonly="" id="ekd_lever" value="<?php echo $row->id_supplier?>">
									<input class="form-control form-control-sm" type="text" readonly="" id="enm_lever" value="<?php echo $row->nm_supplier?>">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 11pt;">Attn</label>
								<input class="form-control form-control-sm" type="text" readonly="" id="eattn_lever" value="<?php echo $row->attn_supplier?>">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3"><p><i><b>Ringkasan Surat Pesanan Barang</b></i></p></div>
						<div class="col-md-9">
							<hr style="border: 1px solid green;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						<table width="100%">
							<tr>
								<td width="12%" valign="top">
									<label style="font-size: 11pt;">Tgl Penyerahan</label>
								</td>
								<td width="12%">
									<div class="form-group">
										<input class="form-control form-control-sm" type="date" name="tglserah" required="" value="<?php echo $row->tgl_serahspb?>">
									</div>
								</td>
								<td colspan="3">
									<div class="form-group">
										<input class="form-control form-control-sm" type="text" name="ketserah" value="<?php echo $row->ket_serahspb?>" required="">
									</div>
								</td>
								<!-- <td valign="top" valign="top">
									<label style="font-size: 11pt; margin-left: 10%;">Total</label>
								</td>
								<td>
									<div class="form-group">
										<input class="form-control form-control-sm" type="number" name="total" id="etotalspb" required="" value="<?php echo $row->total_spb?>">
									</div>
								</td> -->
							</tr>
							<tr>
								<td valign="top">
									<label style="font-size: 11pt;">Pembayaran</label>
								</td>
								<td width="5%">
									<div class="form-group">
										<input class="form-control form-control-sm" type="number" name="haribayar" required="" value="<?php echo $row->haribayar_spb?>">
									</div>
								</td>
								<td valign="top">
									<label style="font-size: 11pt;">Hari</label>
								</td>
								<td colspan="2">
									<div class="form-group">
										<input class="form-control form-control-sm" type="text" name="ketbayar" value="<?php echo $row->ket_bayar?>" required="">
									</div>
								</td>
								<!-- <td width="10%" valign="top">
									<label style="font-size: 11pt; margin-left: 10%;"">PPN</label>
								</td>
								<td width="20%">
									<div class="form-group">
										<input class="form-control form-control-sm" type="number" name="ppn" id="eppnspb" required="" value="<?php echo $row->ppn_spb?>">
									</div>
								</td> -->
							</tr>
							<tr>
								<td valign="top">
									<label style="font-size: 11pt;">Keterangan</label>
								</td>
								<td colspan="4">
									<div class="form-group">
										<select class="form-control form-control-sm" name="ketgudang" required="">
											<option selected="" value="<?php echo $row->ket_gudangspb?>"><?php echo $row->ket_gudangspb?></option>
											<option value="">----</option>
											<option value="Franko gudang <?php echo $get_company?>">Franko gudang <?php echo $get_company?></option>
											<option value="Loco Gudang Penjualan">Loco Gudang Penjualan</option>
										</select>
									</div>
								</td>
								<!-- <td valign="top">
									<label style="font-size: 11pt; margin-left: 10%;"">Total Harga</label>
								</td>
								<td>
									<div class="form-group">
										<input class="form-control form-control-sm" type="number" name="tatalharga" id="etotalhrgspb" value="<?php echo $row->totalharga_spb?>">
									</div>
								</td> -->
							</tr>
							<tr>
								<td colspan="7">
									<textarea class="form-control form-control-sm" rows="5" name="ketspb" required=""><?php echo $row->ket_spb?></textarea>
								</td>
							</tr>
						</table>
						</div>
					</div>
					<hr style="border: 1px solid green;">
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
<!-- modal -->
<div class="modal fade" id="emodal-supplier">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Leveransir</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="etbllever" class="table table-sm table-bordered table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>Kode</th>
	        			<th>Nama</th>
	        			<th>Alamat</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_supplier as $a) { ?>
        			<tr id="epilih_lever"
						id_lever	="<?php echo $a->id_supplier?>"
						nm_lever	="<?php echo $a->nm_supplier?>"
						attn_lever	="<?php echo $a->attn_supplier?>"
        			>
        				<td><?php echo $a->id_supplier?></td>
        				<td><?php echo $a->nm_supplier?></td>
        				<td><?php echo $a->almt_supplier?></td>
        			</tr>
	        	<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih kode Leveransir dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
 <!-- /.modal -->
<script type="text/javascript">
$(document).ready(function(){
	// tabel leveransir
	$(function () {
		$("#etbllever").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
	      "autoWidth": false,
		});
	});
	// get datatabel lebveransir 
	$(document).on('click', '#epilih_lever', function (e) {
		document.getElementById("ekd_lever").value 		= $(this).attr('id_lever');
		document.getElementById("enm_lever").value 		= $(this).attr('nm_lever');
		document.getElementById("eattn_lever").value 	= $(this).attr('attn_lever');
		$('#emodal-supplier').modal('hide');
	});
});
</script>