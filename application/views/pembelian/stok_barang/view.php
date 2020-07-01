<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Stok Barang</h3>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="10%;">ID Barang</td>
												<td width="20%;">Nama Barang</td>
												<td width="13%;">Sisa Stok</td>		   
												<td width="13%;">Barang Keluar</td>		 
											</tr>
										</thead>
										<tbody>
											<?php $i=0; foreach ($isi as $row){ $i++;?>
											<tr>
												<td><?php echo $row->id_barang?></td>
												<td><?php echo $row->nm_barang?></td>
												<td><?php echo $row->sisa_stok?></td>
												<td><?php echo $row->stok_keluar?></td>
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
