<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Supplier</h3>
						<a href="<?php echo site_url('pembelian/t_supplier')?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="5%;">#</td>
												<td>Nama Barang</td>
												<td>Jenis Barang</td>
												<td>Group Barang</td>				         					
												<td width="10%;">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php for($i=1;$i <= 1000;$i++){?>
											<tr>
												<td><?php echo $i?></td>
												<td>perulangan ke <?php echo $i?></td>
												<td></td>
												<td></td>
												<td class="project-actions text-center">
												<!-- 	<a href="<?php echo site_url('pembelian//'.$row->id_metbyr)?>" data-toggle="tooltip" data-placement="top" title="Ubah" ><i class="fas fa-pencil-alt fa-sm"></i></a>&ensp;
												<a href="<?php echo site_url('pembelian/h_metpemb/'.$row->id_metbyr)?>" data-toggle="tooltip" data-placement="top" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a> -->
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
