<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Detail Data Pesanan Baru</h3>
						<a href="<?php echo site_url('stok/view_pesselesai');?>" class="btn btn-sm btn-primary float-right">&nbsp;kembali</a>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="bg-info text-white text-center">
								<?php foreach ($judul as $i) { ?>
								<label>No Permintaan <?php echo $i->nota_minta?></label> - 
								<label>Tanggal Permintaan <?php echo date("d/m/Y",strtotime($i->tgl_minta))?></label>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="card-body">						
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="5%;">ID</td>
												<td>Nama Barang</td>
												<td>Tanggal Diperlukan</td>
												<td>Jumlah Barang</td>
												<td>Keterangan Detail</td>				         					
												<td>Status</td>				         					
												<!-- <td width="10%;" align="right">Aksi</td> -->
											</tr>
										</thead>
										<tbody>
											<?php foreach ($isi as $row) {?>
											<tr>
												<td><?php echo $row->id_dtl_permintaan?></td>
												<td><?php echo $row->nm_barang?></td>
												<td><?php echo date("d/m/Y",strtotime($row->tgl_dtl_perlu))?></td>
												<td><?php echo $row->jml_dtl_minta?></td>
												<td><?php echo $row->ket_dtl_minta?></td>
												<td class="project-actions text-center">
													<?php if($row->selesai_dtl_minta == 'Y'){ ?>
								                      <span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Pesanan Selesai">Selesai</span>
								                    <?php }elseif($row->selesai_dtl_minta == 'P'){ ?>
								                      <span class="badge bg-primary" data-toggle="tooltip" data-placement="top" title="Pesanan Diproses">Diproses</span>
								                    <?php }elseif($row->selesai_dtl_minta == 'T'){ ?>
								                      <span class="badge bg-warning" data-toggle="tooltip" data-placement="top" title="Pesanan Dalam Antrian">Menunggu</span>
								                    <?php }elseif($row->selesai_dtl_minta == 'M'){ ?>
												      <span class="badge bg-secondary" data-toggle="tooltip" data-placement="top" title="Mutasi Stok">Mutasi</span>
								                    <?php }elseif($row->selesai_dtl_minta == 'DT'){ ?>
								                      <span class="badge bg-danger" data-toggle="tooltip" data-placement="top" title="Pesanan Tidak Disetujui">Tidak Disetujui</span>
								                    <?php }elseif($row->selesai_dtl_minta == 'A'){ ?>
									                  <span class="badge bg-info" data-toggle="tooltip" data-placement="top" title="Pesanan Disetujui">Disetujui</span>
								                    <?php } ?>
													</td>
												<!-- <td class="project-actions text-center">
													<a  data-toggle="tooltip" data-placement="top" title="Ubah" href="#"><i class="fas fa-pencil-alt fa-sm"></i></a>&ensp;
													<a  data-toggle="tooltip" data-placement="top" title="Hapus" href="#" onclick="return confirm('Konfirmasi Hapus Data ?')"><i class="fas fa-trash fa-sm"></i></a>
												</td> -->
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