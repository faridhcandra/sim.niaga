<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Penerimaan</h3>
						<a href="<?php echo site_url('gudang/t_bonbarang');?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="15%">Tanggal Bon</td>
												<td width="">Nota Bon Barang</td>       					
												<td width="15%">Bagian</td>		    					
												<td width="15%">Unit</td>			         					
												<!-- <td width="">Pengambil</td> -->			         					
												<td align="center" width="12%">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php $i=0; foreach ($isi as $row){ $i++;?>
												<tr>
													<td><?php echo $row->tgl_mutasi?></td>
													<td><?php echo $row->nota_mutasi?></td>
													<td><?php echo $row->nm_bagian?></td>
													<td><?php echo $row->nm_unit?></td>
													<td class="project-actions text-center">
														<a data-toggle="tooltip" title="Cetak Nota" href="#"><i class="fas fa-print fa-sm"></i></a>
	 													&nbsp;
														<a data-toggle="tooltip" title="Detail Bon Barang" href="<?php echo site_url('gudang/v_dtl_bonbarang/'.$row->id_mutasi)?>"><i class="fas fa-align-justify fa-sm"></i></a>
														&nbsp;
														<a href="<?php echo site_url('gudang/bonbarang_h/'.$row->id_mutasi)?>" data-toggle="tooltip" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>
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
