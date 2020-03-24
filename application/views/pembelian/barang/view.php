<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Barang</h3>
						<a href="<?php echo site_url('pembelian/t_barang');?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="10%;">ID Barang</td>
												<td width="20%;">Nama Barang</td>
												<td width="13%;">Jenis Barang</td>
												<td width="13%;">kel Barang</td>		         					
												<td width="13%;">Satuan 1</td>		         					
												<td width="13%;">satuan 2</td>		         					
												<td width="8%;">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php $i=0; foreach ($isi as $row){ $i++;?>
											<tr>
												<td><?php echo $row->id_barang?></td>
												<td><?php echo $row->nm_barang?></td>
												<td><?php echo $row->nm_jnsbrng?></td>
												<td><?php echo $row->kel_barang?></td>
												<td><?php echo $row->nm_satuan?></td>
												<td><?php echo $row->nm_satuan2?></td>
												<td class="project-actions text-center">
													<a  data-toggle="tooltip" data-placement="top" title="Ubah" href="<?php echo site_url('pembelian/u_barang/'.$row->id_barang)?>"><i class="fas fa-pencil-alt fa-sm"></i></a>&nbsp;
													<a  data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo site_url('pembelian/h_barang/'.$row->id_barang)?>" onclick="return confirm('Konfirmasi Hapus Data ?')"><i class="fas fa-trash fa-sm"></i></a>
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
