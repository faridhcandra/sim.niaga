<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<a href="<?php echo site_url('gudang/t_pengecekan');?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-responsive-md table-hover" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="10%;">Tgl Cek</td>
												<td width="">Nota Cek</td>
												<td width="">Leveransir</td>
												<td width="">Nota Pembelian</td>		         					
												<td width="">Bagian/Unit</td>	
												<td width="17%;">No Surat / Tgl Jalan </td>	    					
												<td width="13%;">Ket</td>			         					
												<td align="center" width="9%">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<!--  <?php $i=0; foreach ($isi as $row){ $i++;?>
											 											<tr>
											 												<td><?php echo $row->tgl_terima?></td>
											 												<td><?php echo $row->nota_terima?></td>
											 												<td><?php echo $row->nm_supplier?></td>
											 												<td><?php echo $row->nota_beli?></td>
											 												<td><?php echo $row->nm_bagian?></td>
											 												<td><?php echo $row->srtjalan_terima?></td>
											 												<td><?php echo $row->tgljalan_terima?></td>
											 												<td><?php echo $row->tgljt_terima?></td>
											 												<td><?php echo $row->ket_terima?></td>
											 												<td class="project-actions text-center">
											 													<a href="<?php echo site_url('gudang/u_penerimaan/'.$row->id_penerimaan)?>" data-toggle="tooltip" data-placement="top" title="Ubah Penerimaan"><i class="fas fa-pencil-alt fa-sm fa-green"></i></a>&nbsp;
											 													<a data-toggle="tooltip" title="Detail Penerimaan" href="<?php echo site_url('gudang/v_dtl_terima/'.$row->id_penerimaan)?>"><i class="fas fa-align-justify fa-sm"></i></a>&nbsp;
											 													<a href="<?php echo site_url('gudang/penerimaan_h/'.$row->id_penerimaan)?>" data-toggle="tooltip" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>&nbsp;
											 												</td>
											 												</tr>
											 												<?php } ?> --> 
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
