<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah Metode Pembelian</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					<?php echo validation_errors();?>
					<?php echo form_open('pembelian/t_metpemb');?>
						<div class="form-group">
							<label>Nama Metode Pembayaran</label>
							<input class="form-control form-control-sm" type="text" name="metode" placeholder="Metode ex : cash" required="" autocomplete="off" autofocus="">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-sm float-right toaster" value="Simpan">
						</div>
					</form>
					</div>
				</div>         
			</div>
		</div>
		</div>
		<div class="col-md-8">
		<div class="card card-outline card-info">
			<div class="card-header">
				<h3 class="card-title">Data Metode Pembelian</h3>
			</div>
			<div class="card-body">
				<div class="example1_wrapper" class="dataTables_wrapper">
					<div class="row">
						<div class="col-md-12">
							<table id="example2" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
				         				<tr>
				         					<td width="10%;">#</td>
				         					<td>Metode Pembelian</td>
				         					<td width="15%;" align="right">Aksi</td>
				         				</tr>
				         			</thead>
				         			<tbody>
				         				<?php $i=0; foreach ($isi as $row){ $i++;?>
				         				<tr>
				         					<td><?php echo $i?></td>
				         					<td><?php echo $row->nm_metbyr?></td>
				         					<td class="project-actions text-center">
												<a href="<?php echo site_url('pembelian/u_metpemb/'.$row->id_metbyr)?>" data-toggle="tooltip" data-placement="top" title="Ubah" ><i class="fas fa-pencil-alt fa-sm fa-green"></i></a>&nbsp;
												<!-- <a href="<?php echo site_url('pembelian/h_metpemb/'.$row->id_metbyr)?>" data-toggle="tooltip" data-placement="top" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a> -->
											</td>
				         				</tr>
				         				<?php } ?>
				         			</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
	</div>
</div>
<!-- /.content -->
