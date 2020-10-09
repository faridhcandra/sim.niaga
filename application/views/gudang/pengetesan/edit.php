<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Edit Data Pengetesan</h3>
			</div>
			<div class="card-body">
				<?php foreach ($isi as $key => $row): ?>
				<?php echo validation_errors();?>
				<?php echo form_open('gudang/pengetesan_u/'.$row->id_cek);?>
					<div class="row">
						<div class="col-md-12">
						<table width="100%"> 
							<tr>
								<td><label style="font-size: 11pt;">No Test</label></td>
								<td>
									<input class="form-control form-control-sm" type="text" name="notacek" value="<?php echo $row->nota_cek?>" required="">
									<input class="form-control form-control-sm" type="text" name="kode" value="<?php echo $row->id_cek?>" hidden=""> 
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Leveransir</label></td>
								<td colspan="3">
									<div class="input-group-prepend">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-ceksupplier">Cari</button>
									<input class="form-control form-control-sm col-md-3" type="text" name="kdlev" value="<?php echo $row->id_supplier?>" required="" readonly="" id="ekd_ceklever">
									<input class="form-control form-control-sm" type="text" readonly="" value="<?php echo $row->nm_supplier?>" id="enm_ceklever">
									</div>
								</td>
							</tr>
							<tr>
								<td><label style="font-size: 11pt;">Tanggal Test</label></td>
								<td>
									<input class="form-control form-control-sm" type="date" name="tglcek" value="<?php echo $row->tgl_cek?>" required="">
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Srt Jln/ Nota/ Faktur</label></td>
								<td>
									<input class="form-control form-control-sm" type="text" name="nosurat" value="<?php echo $row->srtjalan_cek?>" required="">
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Tanggal Jalan</label></td>
								<td>
									<input class="form-control form-control-sm" type="date" name="tglcek_surat" value="<?php echo $row->tgljalan_cek?>" required="">
								</td>
							</tr>
							<tr>
								<td><label style="font-size: 11pt;">No Pembelian</label></td>
								<td>
									<div class="input-group-prepend">
										<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-cekpembelian">Cari</button>
										<input class="form-control form-control-sm" type="text" name="ceknotabeli" value="<?php echo $row->nota_beli?>" required="" readonly="" id="enota_belicek">
										<input class="form-control form-control-sm" type="text" name="cekkdbeli" value="<?php echo $row->id_pembelian?>" hidden="" id="ekd_cekpemb">
									</div>
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Unit</label></td>
								<td>
									<input class="form-control form-control-sm" type="text" name="cekkdunit" hidden="" value="<?php echo $row->id_unit?>" id="eid_unitcek">
									<input class="form-control form-control-sm" type="text" required="" readonly="" value="<?php echo $row->nm_unit?>" id="enm_unitcek">
								</td>
								<td><label style="font-size: 11pt; margin-left: 10%;">Bagian</label></td>
								<td>
									<input class="form-control form-control-sm" type="text" name="cekkdbagian" hidden="" value="<?php echo $row->id_bagian?>" id="eid_bagcek">
									<input class="form-control form-control-sm" type="text" required="" readonly="" value="<?php echo $row->nm_bagian?>" id="enm_bagcek">
								</td>
							</tr>
							<tr>
								<td><label style="font-size: 11pt;">Keterangan</label></td>
								<td colspan="3">
									<input class="form-control form-control-sm" type="text" name="cekket" value="<?php echo $row->ket_cek?>">
								</td>
							</tr>
						</table>
						</div>
					</div>
					</br>
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
<script type="text/javascript">
	$(document).ready(function(){
		// tabel leveransir
		$(function () {
			$("#etblceklever").DataTable({
			  "deferRender" : true,
			  "processing"  : true,
			  "order"       : [],
			});
		});
		// get datatabel lebveransir 
		$(document).on('click', '#epilih_ceklever', function (e) {
			document.getElementById("ekd_ceklever").value 		= $(this).attr('id_ceklever');
			document.getElementById("enm_ceklever").value 		= $(this).attr('nm_ceklever');
			$('#emodal-ceksupplier').modal('hide');
		});
		// tabel Pembelian
		$(function () {
			$("#etblcekpemb").DataTable({
			  "deferRender" : true,
			  "processing"  : true,
			  "order"       : [],
			});
		});
		// get datatabel Pembelian 
		$(document).on('click', '#epilih_cekpemb', function (e) {
			document.getElementById("ekd_cekpemb").value 	= $(this).attr('id_cekpemb');
			document.getElementById("enota_belicek").value 	= $(this).attr('nota_cekpemb');
			document.getElementById("eid_bagcek").value 		= $(this).attr('id_cekbag');
			document.getElementById("eid_unitcek").value 	= $(this).attr('id_cekunit');
			document.getElementById("enm_bagcek").value 		= $(this).attr('nm_cekbag');
			document.getElementById("enm_unitcek").value 	= $(this).attr('nm_cekunit');
			$('#emodal-cekpembelian').modal('hide');
		});
		
	});
 </script>

<!-- modal -->
<div class="modal fade" id="emodal-ceksupplier">
    <div class="modal-dialog modal-lg text-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Leveransir</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="etblceklever" class="table table-sm table-bordered table-responsive-sm table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>Kode</th>
	        			<th>Nama</th>
	        			<th>Alamat</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_supplier as $a) { ?>
        			<tr id="epilih_ceklever"
						id_ceklever	="<?php echo $a->id_supplier?>"
						nm_ceklever	="<?php echo $a->nm_supplier?>"
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
 <!-- modal -->
<div class="modal fade" id="emodal-cekpembelian">
    <div class="modal-dialog modal-lg text-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Pembelian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="etblcekpemb" class="table table-sm table-bordered table-responsive-sm table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>No Pembelian</th>
	        			<th>Unit</th>
	        			<th>Bagian</th>
        			</tr>
        		</thead>
        		<tbody>
        		<?php foreach ($get_notabeli as $a) { ?>
        			<tr id="epilih_cekpemb"
						id_cekpemb		= "<?php echo $a->id_pembelian?>"
						nota_cekpemb	= "<?php echo $a->nota_beli?>"
						id_cekbag		= "<?php echo $a->id_bagian?>"
						id_cekunit		= "<?php echo $a->id_unit?>"
						nm_cekbag		= "<?php echo $a->nm_bagian?>"
						nm_cekunit		= "<?php echo $a->nm_unit?>"
        			>
        				<td><?php echo $a->nota_beli?></td>
        				<td><?php echo $a->nm_unit?></td>
        				<td><?php echo $a->nm_bagian?></td>
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
