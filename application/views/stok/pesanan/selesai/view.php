<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<!-- <div class="card-header">
						<h3 class="card-title">Data Pesanan Baru</h3>
						<a href="<?php echo site_url('stok/t_pesbaru');?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div> -->
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td>Tanggal Pemesanan</td>
												<td>No Pemesanan</td>
												<td>Bagian</td>
												<td>Status</td>
												<td>Keterangan</td>				         					
												<td width="10%;" align="center"></td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($isi as $row) {?>
											<tr>
												<td><?php echo date('d/m/Y',strtotime($row->tgl_minta))?></td>
												<td><?php echo $row->nota_minta?></td>
												<td><?php echo $row->nm_bagian?></td>
												<td>
												<?php if($row->selesai_minta == 'Y'){ ?>
								                      <span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Pesanan Selesai">Selesai</span>
								                    <?php }elseif($row->selesai_minta == 'P'){ ?>
								                      <span class="badge bg-primary" data-toggle="tooltip" data-placement="top" title="Pesanan Diproses">Diproses</span>
								                    <?php }else{ ?>
								                      <span class="badge bg-warning" data-toggle="tooltip" data-placement="top" title="Pesanan Dalam Antrian">Menunggu</span>
								                     <?php } ?>
								                      <!-- <span class="badge bg-danger">55%</span> -->
												</td>
												<td><?php echo $row->ket_minta?></td>
												<td class="project-actions text-center">
													<a  data-toggle="tooltip" data-placement="top" title="Detail" href="<?php echo site_url('stok/view_dtl_pesselesai/'.$row->id_permintaan)?>"><i class="fas fa-align-justify fa-sm"></i></a>&nbsp;
													<!-- <a  data-toggle="tooltip" data-placement="top" title="Hapus" href="#" onclick="return confirm('Konfirmasi Hapus Data ?')"><i class="fas fa-trash fa-sm"></i></a> -->
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