<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Barang Masuk</h3>
						<!-- <a href="<?php echo site_url('stok/t_barang');?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a> -->
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="10%;">ID Barang Masuk</td>
												<td width="20%;">Nama Barang</td>
												<td width="13%;">Tgl Masuk</td>
												<td width="13%;">Stok Masuk</td>		
												<td width="13%">Harga</td>   
												<td width="13%;">Total Harga</td>		 
											</tr>
										</thead>
										<tbody>
											<?php $i=0; foreach ($isi as $row){ $i++;?>
											<tr>
												<td><?php echo $row->id_brngmsk?></td>
												<td><?php echo $row->nm_barang?></td>
												<td><?php echo $row->tgl_brngmsk?></td>
												<td><?php echo $row->stok_brngmsk?></td>
												<td><?php echo $row->hrg_stok?></td>
												<td><?php echo $row->tothrg_brngmasuk?></td>
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
