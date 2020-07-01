 <!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Penerimaan</h3>
						<div class="btn-group float-right"><!-- 
							<a href="#" class="btn btn-sm bg-gradient-info">&nbsp;Ubah Penerimaan</a>&nbsp; -->
							<a href="<?php echo site_url('gudang/v_penerimaan');?>" class="btn btn-sm bg-gradient-primary">&nbsp;Kembali</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="bg-success text-white text-center">
								<?php foreach ($judul as $i) { ?>
								<label>Nota Penerimaan: <?php echo $i->nota_terima?></label> | 
								<label>Supplier: <?php echo $i->nm_supplier?></label>  |
								<label>Tanggal Penerimaan: <?php echo date("d/m/Y",strtotime($i->tgl_terima))?></label>
								<?php } ?> 
							</div>
						</div>
					</div>
 	                <div class="row">
						<div class="col-md-12">
							<div class="row">
							<?php foreach ($get_rptrm as $s) { ?>
							  <div class="col-md-2"></div>
			                  <div class="col-md-3">
			                    <div class="description-block border-right">
			                      <h5 class="description-header">Rp.<?php echo number_format($s->subtotal_terima,2,',','.')?></h5>
			                      <span>Sub Total</span>
			                    </div>
			                  </div>
			                 <!-- /.col  -->
			                  <div class="col-md-3">
			                    <div class="description-block border-right">
			                      <h5 class="description-header">Rp.<?php echo number_format($s->ppn_terima,2,',','.')?></h5>
			                      <span>PPN</span>
			                    </div>
			                  </div>
			                  <!-- /.col  -->
			                  <div class="col-md-3">
			                    <div class="description-block">
			                      <h5 class="description-header">Rp.<?php echo number_format($s->totalharga_terima,2,',','.')?></h5>
			                      <span>Total</span>
			                    </div>
			                  </div>
			                <?php } ?>
			              	</div>
			               <hr style="margin-top: 0px;">
						</div>
	                </div>
	                <!-- card-body -->
					<div class="card-body">						
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" width="100%" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr class="bg-primary">
												<td width="5%;">ID</td>
												<td>Nama Barang</td>
												<td>Rek. Akuntansi</td>
												<td align="right">Jumlah</td>
												<td align="right">Harga</td>
												<td align="right">Sub Total</td>
												<td align="right">Sub PPN</td>				         					
												<td align="right">Sub Total Harga</td>					
												<td width="5%;" align="right">Aksi</td>
											</tr>											
										</thead>
										<tbody>
											<?php foreach ($isi as $row) { ?>
												<tr>
													<td><?php echo $row->id_dtl_penerimaan?></td>
													<td><?php echo $row->nm_barang?></td>
													<td><?php echo $row->no_jnsbrngakt?></td>
													<td align="right"><?php echo $row->jml1_dtlterima?></td>
													<td align="right"><?php echo number_format($row->harga_dtlterima,2,',','.')?></td>
													<td align="right"><?php echo number_format($row->subtotal_dtlterima,2,',','.')?></td>
													<td align="right"><?php echo number_format($row->ppn_dtlterima,2,',','.')?></td>
													<td align="right"><?php echo number_format($row->totalharga_dtlterima,2,',','.')?></td>
													<td align="center">
														<a href="<?php echo site_url('gudang/u_dtlpenerimaan/'.$row->id_dtl_penerimaan)?>" data-toggle="tooltip" data-placement="top" title="Ubah Detail Penerimaan"><i class="fas fa-pencil-alt fa-sm fa-green"></i></a>&nbsp;
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