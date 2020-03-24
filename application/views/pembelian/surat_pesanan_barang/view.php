<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Surat Pesanan Barang</h3>
						<a href="<?php echo site_url('pembelian/t_spb')?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td >Tanggal</td>
												<td>No SPB</td>
												<td>Leveransir</td>
												<td>Atas Nama</td>
												<td>Subtotal</td>
												<td>PPN</td>
												<td>Total</td>
												<td align="center" width="10%">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($isi as $row) { ?>
												<tr>
													<td><?php echo date("d/m/Y",strtotime($row->tgl_spb))?></td>
													<td><?php echo $row->nota_spb?></td>
													<td><?php echo $row->nm_supplier?></td>
													<td><?php echo $row->attn_supplier?></td>
													<td><?php echo set_number($row->total_spb)?></td>
													<td><?php echo set_number($row->ppn_spb)?></td>
													<td><?php echo set_number($row->totalharga_spb)?></td>
													<td class="project-actions text-center">
														<a data-toggle="tooltip" title="Cetak Nota" href="#"><i class="fas fa-print fa-sm"></i></a>&nbsp;
														<a data-toggle="tooltip" title="Detail SPB" href="<?php echo site_url('pembelian/v_dtl_spb/'.$row->id_spb)?>"><i class="fas fa-align-justify fa-sm"></i></a>&nbsp;
														<a href="<?php echo site_url('pembelian/spb_h/'.$row->id_spb)?>" data-toggle="tooltip" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>&nbsp;
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
<!-- /.content -->