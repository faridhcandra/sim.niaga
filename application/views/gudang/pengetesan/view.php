<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<a href="<?php echo site_url('gudang/t_pengetesan');?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-responsive-md table-hover" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="9%;">Tgl Test</td>
												<td>Nota Test & Status</td>
												<td>Leveransir</td>
												<td>Nota Pembelian</td>		         					
												<td width="15%">Bagian/Unit</td>	
												<td width="17%;">No Surat & Tgl Jalan</td>	
												<td width="13%;">Keterangan</td>			         					
												<td align="center" width="9%">Aksi</td>
											</tr>
										</thead>
										<tbody>
											 <?php $i=0; foreach ($isi as $row){ $i++;?>
	 											<tr>
	 												<td><?php echo $row->tgl_cek?></td>
	 												<td><?php if($row->selesai_cek == "Y"){echo $row->nota_cek." "."<span class='badge bg-success'>Selesai</span>";}else{echo $row->nota_cek." "."<span class='badge bg-primary'>Belum Selesai</span>";}?></td>
	 												<td><?php echo $row->nm_supplier?></td>
	 												<td><?php echo $row->nota_beli?></td>
	 												<td><?php echo $row->nm_bagian." ".$row->nm_unit?></td>
	 												<td style="font-size: 16px;">
	 													<span class="badge bg-dark" data-toggle="tooltip" title="Tanggal : <?php echo date("d-m-Y",strtotime($row->tgljalan_cek))?>"><?php echo $row->srtjalan_cek?></span>
	 												</td>
	 												<td><?php echo $row->ket_cek?></td>
	 												<td class="project-actions text-center">
	 													<a data-toggle="tooltip" title="Cetak Nota" href="#"><i class="fas fa-print fa-sm"></i></a>
	 													&nbsp;
	 													<a data-toggle="tooltip" title="Detail Pengetesan" href="<?php echo site_url('gudang/v_dtl_cek/'.$row->id_cek)?>"><i class="fas fa-align-justify fa-sm"></i></a>
	 													&nbsp;
	 													<a href="<?php echo site_url('gudang//'.$row->id_cek)?>" data-toggle="tooltip" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>&nbsp;
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
