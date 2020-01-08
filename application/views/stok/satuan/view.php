<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah Satuan Barang</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					<?php echo validation_errors();?>
					<?php echo form_open('stok/t_satuan');?>
						<div class="form-group">
							<label>Satuan Barang</label>
							<input class="form-control form-control-sm" type="text" name="satuan" placeholder="satuan ex : Meter" required="" autocomplete="off" autofocus="">
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
				<h3 class="card-title">Data Satuan Barang</h3>
			</div>
			<div class="card-body">
				<div class="example1_wrapper" class="dataTables_wrapper">
					<div class="row">
						<div class="col-md-12">
							<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
				         				<tr>
				         					<td width="10%;">#</td>
				         					<td>Nama Satuan</td>
				         					<td width="15%;" align="right">Aksi</td>
				         				</tr>
				         			</thead>
				         			<tbody>
				         				<?php $i=0; foreach ($isi as $row){ $i++;?>
				         				<tr>
				         					<td><?php echo $i?></td>
				         					<td><?php echo $row->nm_satuan?></td>
				         					<td class="project-actions text-center">
												<a  data-toggle="tooltip" data-placement="top" title="Ubah" href="<?php echo site_url('stok/u_satuan/'.$row->id_satuan)?>"><i class="fas fa-pencil-alt fa-sm"></i></a>&ensp;
												<a  data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo site_url('stok/h_satuan/'.$row->id_satuan)?>" onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>
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
</div>
<!-- /.content -->
