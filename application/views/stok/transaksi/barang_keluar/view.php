<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Barang Keluar</h3>
						<a href="<?php echo site_url('stok/t_barangkel');?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>	
												<td width="10%;">ID</td>
												<td width="13%;">Tgl Keluar</td>
												<td width="20%;">Nama Barang</td>
												<td width="13%;">Jumlah Keluar</td>		
												<td width="13%;">Total Harga</td>  
												<td width="10%;" align="center">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php $i=0; foreach ($isi as $row){ $i++;?>
											<tr>
												<td><?php echo $row->id_brngkel?></td>
												<td><?php echo $row->tgl_brngkel?></td>
												<td><?php echo $row->nm_barang?></td>
												<td><?php echo $row->jumlah_brngkel?></td>
												<td><?php echo $row->tothrg_brngkel?></td>
												<td class="project-actions text-center">
													<a  data-toggle="tooltip" data-placement="top" title="Ubah" href="<?php echo site_url('stok/u_brngkel/'.$row->id_brngkel)?>"><i class="fas fa-pencil-alt fa-sm"></i></a>&nbsp;
													<a href="<?php echo site_url('stok/hapus_brngkeluar/'.$row->id_brngkel)?>" data-toggle="tooltip" data-placement="top" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>
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
