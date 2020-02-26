<!-- Main content --> 
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Tambah Barang Keluar</h3>
					</div>
					<div class="card-body">
						<?php echo validation_errors();?>
						<?php echo form_open('stok/barang_keluar_tambah');?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">Nama Barang</label>
									<div class="input-group-prepend">								
									<input list='dt_barang'class=" form-control form-control-sm" type='text' class='form-control form-control-sm' name='barang' id="nm_brg">
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-crbrg">Cari</button>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Keluar</label>
									<input class="form-control form-control-sm" type="date" name="tgl_keluar"required="" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Jumlah Keluar</label>
									<input class="form-control form-control-sm" type="text" name="jumlahkel" required="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Sub Harga</label>
									<input class="form-control form-control-sm" type="text" name="subhrg" id="hrg" required=""readonly="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Total Harga</label>
									<input class="form-control form-control-sm" type="text" name="totalhrg" required="" readonly="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group" >
									<label style="font-size: 11pt;">ID Barang Masuk</label>
									<input class="form-control form-control-sm" type="text" name="id_brngmsk" id="id_bmasuk" required="" autofocus="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="font-size: 11pt;">ID Barang</label>
									<input class="form-control form-control-sm" type="text" name="id_barang" id="id_brg" required="" autofocus="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Tanggal Masuk</label>
									<input class="form-control form-control-sm" type="date" name="tglmsk" id="tgl_msk" required="" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>							
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">Stok Masuk</label>
									<input class="form-control form-control-sm" type="text" name="stok_masuk" id="sto" required="" autofocus="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">ID Stok</label>
									<input class="form-control form-control-sm" type="text" name="id_stok" id="id_sto" required="">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">ID Barang Keluar</label>
									<input class="form-control form-control-sm" type="text" name="id_brngkel" value="<?php echo $kode?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="font-size: 11pt;">ID Bagian</label>
									<input class="form-control form-control-sm" type="text" name="id_bagian" required="">
								</div>
							</div>
						</div>
						<br><!-- 
						<div id="insert-pesbaru"></div>
						<div class="row">
							<div class="col-md-11">
								<div class="form-group">
									<input type="button" class="btn btn-success btn-sm" value="Tambah Form" id="tambah-pesbaru">
									<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-pesbaru">
								</div>
							</div>
						</div>
						<hr> -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right"> 
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
								</div>
							</div>
						</div>
						<?php echo form_close() ?> 
						<input type="hidden" id="jmlpesbaru" value="1"> 
					</div><?php echo $this->uri->segment(3);?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- modal -->
<div class="modal fade" id="modal-crbrg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="caribrg" class="table table-sm table-bordered table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>ID Barang</th>
	        			<th>Nama Barang</th>
	        			<th>Tgl Masuk</th>
	        			<th>Jumlah Barang</th>
        			</tr>
        		</thead>
         								 
        		<tbody>
        		<?php foreach ($get_brg as $a) { ?>
        			<tr id="pilih_brg"
						id_brgmsk_cbr ="<?php echo $a->id_brngmsk?>"
						id_brg_cbr ="<?php echo $a->id_barang?>"
						nm_brg_cbr ="<?php echo $a->nm_barang?>"
						tgl_msk_cbr	="<?php echo $a->tgl_brngmsk?>"
						id_stok_cbr	="<?php echo $a->id_stok?>"
						stok_msk_cbr ="<?php echo $a->stok_masuk?>"
						hrg_stok_cbr ="<?php echo $a->hrg_stok?>"
        			>
        				<td><?php echo $a->id_barang?></td>
        				<td><?php echo $a->nm_barang?></td>
        				<td><?php echo date('d/m/Y',strtotime($a->tgl_brngmsk))?></td>
        				<td><?php echo $a->stok_masuk?></td>
        			</tr>
	        	<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih barang dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
 <!-- /.modal -->
<script type="text/javascript">
$(document).ready(function(){
	// tabel no permintaan
	$(function () {
		$("#caribrg").DataTable({
		  "deferRender" : true,
		  "processing"  : true,
		  "order"       : [],
		});
	});
	// get datatabel no permintaan 
	$(document).on('click', '#pilih_brg', function (e) {
		document.getElementById("id_bmasuk").value 	= $(this).attr('id_brgmsk_cbr');
		document.getElementById("id_brg").value 	= $(this).attr('id_brg_cbr');
		document.getElementById("nm_brg").value 	= $(this).attr('nm_brg_cbr');
		document.getElementById("tgl_msk").value 	= $(this).attr('tgl_msk_cbr');
		document.getElementById("id_sto").value 	= $(this).attr('id_stok_cbr');
		document.getElementById("sto").value 	    = $(this).attr('stok_msk_cbr');
		document.getElementById("hrg").value 	    = $(this).attr('hrg_stok_cbr');
		$('#modal-crbrg').modal('hide');
	});
});
</script>
