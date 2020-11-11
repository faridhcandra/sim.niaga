 <!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Pengetesan</h3>
						<div class="btn-group float-right"><!-- 
							<a href="#" class="btn btn-sm bg-gradient-info">&nbsp;Ubah Penerimaan</a>&nbsp; -->
							<a href="<?php echo site_url('gudang/u_pengetesan/'.$get_idtest);?>" class="btn btn-sm bg-gradient-info">&nbsp;Ubah Nota Test</a>&nbsp;
							<a href="<?php echo site_url('gudang/v_pengetesan');?>" class="btn btn-sm bg-gradient-primary">&nbsp;Kembali</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="bg-success text-white text-center">
								<?php foreach ($judul as $i) { ?>
								<label>Nota Pengetesan: <?php echo $i->nota_cek?></label> | 
								<label>Supplier: <?php echo $i->nm_supplier?></label>  |
								<label>Tanggal Pengetesan: <?php echo date("d/m/Y",strtotime($i->tgl_cek))?></label>
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
												<td width="5%;" >Kdbrg</td>
												<td>Nama Barang</td>
												<td>Jml / Sat 1</td>
												<td>Jml / Sat 2</td>
												<td>Tgl Lulus</td>
												<td>Ket Test</td>				         					
												<td>Nota Beli</td>					
												<td>Id Test</td>					
												<td width="5%;" align="right">Aksi</td>
											</tr>										
										</thead>
										<tbody>
											<?php foreach ($isi as $row) { ?>
												<tr>
													<td><?php echo $row->id_barang?></td>
													<td><?php echo $row->nm_barang?></td>
													<td><?php echo $row->jml_cek1." ".$row->sat1?></td>
													<td><?php echo $row->jml_cek2." ".$row->sat2?></td>
													<td><?php echo $row->tgl_dtl_lunas?></td>
													<td><?php echo $row->ket_dtl_cek?></td>
													<td><?php echo $row->nota_dtl_beli?></td>
													<td><?php echo $row->nota_dtl_beli.$row->id_barang?></td>
													<td align="center">
														<a href="<?php echo site_url('gudang/u_pengetesandtl/'.$row->id_dtl_cek)?>" data-toggle="tooltip" data-placement="top" title="Ubah Detail Penerimaan"><i class="fas fa-pencil-alt fa-sm fa-green"></i></a>&nbsp;
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