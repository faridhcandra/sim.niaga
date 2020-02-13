<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Pembelian</h3>
						<a href="<?php echo site_url('pembelian/t_pembelian')?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td>Tgl Beli</td>
												<td>No Beli</td>
												<td>Tgl Pesan</td>
												<td>No Pesan</td>
												<td>Bagian</td>
												<td>Unit</td>
												<td>Status</td>
												<td>keterangan</td>				         					
												<td width="10%;" align="center">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($isi as $row) {?>
											<tr>
												<td><?php echo $row->tgl_beli?></td>
												<td><?php echo $row->nota_beli?></td>
												<td><?php echo $row->tgl_beli?></td>
												<td><?php echo $row->id_permintaan?></td>
												<td><?php echo $row->id_bagian?></td>
												<td><?php echo $row->id_unit?></td>
												<td><?php echo $row->selesai_beli?></td>
												<td><?php echo $row->ket_pembelian?></td>
												<td>
													
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