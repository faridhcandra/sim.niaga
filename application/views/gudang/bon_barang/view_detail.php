 <!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Bon Barang</h3>
						<div class="btn-group float-right"><!-- 
							<a href="#" class="btn btn-sm bg-gradient-info">&nbsp;Ubah Penerimaan</a>&nbsp; -->
							<a href="<?php echo site_url('gudang/u_bonbarang/'.$get_idbon);?>" class="btn btn-sm bg-gradient-info">&nbsp;Ubah Bon Barang</a>&nbsp;
							<a href="<?php echo site_url('gudang/v_bonbarang');?>" class="btn btn-sm bg-gradient-primary">&nbsp;Kembali</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="bg-success text-white text-center">
								<?php foreach ($judul as $i) { ?>
								<label>Nota Bon Barang: <?php echo $i->nota_mutasi?></label> | 
								<label>Bagian: <?php echo $i->nm_bagian?></label> | 
								<label>Unit: <?php echo $i->nm_unit?></label> | 
								<label>Tanggal Bon Barang: <?php echo date("d/m/Y",strtotime($i->tgl_mutasi))?></label>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="card-body">						
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" width="100%" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr class="bg-primary">
												<td width="5%;" >kodeAkt</td>
												<td>Nama Barang</td>
												<td>Jml / Sat 1</td>
												<td>Jml / Sat 2</td>
												<td>Keterangan</td>
												<td>kd Transaksi</td>				         					
												<td>Bagian</td>					
												<td>keluar1</td>					
												<td>keluar2</td>					
												<td width="5%;" align="right">Aksi</td>
											</tr>										
										</thead>
										<tbody>
											<?php foreach ($isi as $row) { ?>
												<tr>
													<td><?php echo $row->no_jnsbrngakt?></td>
													<td><?php echo $row->nm_jnsbrngakt?></td>
													<td><?php echo $row->jml1_dtlmutasi." ".$row->sat1?></td>
													<td><?php echo $row->jml2_dtlmutasi." ".$row->sat2?></td>
													<td><?php echo $row->ket_dtlmutasi?></td>
													<td><?php echo $row->id_kdtransaksi." - ".$row->nm_kdtransaksi?></td>
													<td><?php echo $row->nm_bagian?></td>
													<td><?php echo $row->keluar1_dtlmutasi?></td>
													<td><?php echo $row->keluar2_dtlmutasi?></td>
													<td align="center">
														<a href="<?php echo site_url('gudang/u_dtlbonbarang/'.$row->id_dtlmutasi)?>" data-toggle="tooltip" data-placement="top" title="Ubah Detail Bon Barang"><i class="fas fa-pencil-alt fa-sm fa-green"></i></a>&nbsp;
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- card-body -->
				</div>
			</div>
		</div>
	</div>
</div>