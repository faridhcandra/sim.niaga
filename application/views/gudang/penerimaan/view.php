<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Penerimaan</h3>
						<a href="<?php echo site_url('gudang/t_penerimaan');?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="12%;">Tgl Terima</td>
												<td width="14%;">Nota Penerimaan</td>
												<td width="14%;">Leveransir</td>
												<td width="16%;">Nota Pembelian</td>		         					
												<td width="8%;">Bagian</td>	
												<td width="10%;">Surat & Tgl Jalan</td>
												<!-- <td width="9%;">Tgl Jalan</td> -->		         					
												<td width="16%;">Tgl Jat Tempo</td>		    					
												<td width="10%;">Ket</td>			         					
												<td align="center" width="8%">Aksi</td>
											</tr>
										</thead>
										<tbody>
											 <?php $i=0; foreach ($isi as $row){ $i++;?>
											<tr>
												<td><?php echo $row->tgl_terima?></td>
												<td><?php echo $row->nota_terima?></td>
												<td><?php echo $row->nm_supplier?></td>
												<td><?php echo $row->nota_beli?></td>
												<td><?php echo $row->nm_bagian?></td>
												<td align="center" style="font-size: 16px;">
													<!-- <?php echo $row->srtjalan_terima?><br><i><?php echo $row->tgljalan_terima?></i> -->
													<span class="badge bg-dark" data-toggle="tooltip" title="Tanggal : <?php echo date("d-m-Y",strtotime($row->tgljalan_terima))?>"><?php echo $row->srtjalan_terima?></span>
												</td>
												<!-- <td><?php echo $row->tgljalan_terima?></td> -->
												<td><?php echo $row->tgljt_terima?></td>
												<td><?php echo $row->ket_terima?></td>
												<td class="project-actions text-center">
													<a href="<?php echo site_url('gudang/u_penerimaan/'.$row->id_penerimaan)?>" data-toggle="tooltip" data-placement="top" title="Ubah Penerimaan"><i class="fas fa-pencil-alt fa-sm fa-green"></i></a>&nbsp;
													<a data-toggle="tooltip" title="Detail Penerimaan" href="<?php echo site_url('gudang/v_dtl_terima/'.$row->id_penerimaan)?>"><i class="fas fa-align-justify fa-sm"></i></a>&nbsp;
													<a href="<?php echo site_url('gudang/penerimaan_h/'.$row->id_penerimaan)?>" data-toggle="tooltip" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>&nbsp;
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
