<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Surat Pesanan Barang</h3>
						<div class="btn-group float-right">
							<a href="<?php echo site_url('pembelian/u_nospb/'.$get_idspb);?>" class="btn btn-sm bg-gradient-info">&nbsp;Ubah Nota SPB</a>&nbsp;
							<a href="<?php echo site_url('pembelian/v_spb');?>" class="btn btn-sm bg-gradient-primary">&nbsp;kembali</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="bg-success text-white text-center">
								<?php foreach ($judul as $i) { ?>
								<label>No SPB: <?php echo $i->nota_spb?></label> | 
								<label>Supplier: <?php echo $i->nm_supplier?></label>  |
								<label>Tanggal SPB: <?php echo date("d/m/Y",strtotime($i->tgl_spb))?></label>
								<?php } ?> 
							</div>
						</div>
					</div>
	                <div class="row">
						<div class="col-md-12">
							<div class="row">
							<?php foreach ($get_rpspb as $s) { ?>
							  <div class="col-md-2"></div>
			                  <div class="col-md-3">
			                    <div class="description-block border-right">
			                      <h5 class="description-header">Rp.<?php echo number_format($s->total_spb,2,',','.')?></h5>
			                      <span>Sub Total</span>
			                    </div>
			                  </div>
			                  <!-- /.col -->
			                  <div class="col-md-3">
			                    <div class="description-block border-right">
			                      <h5 class="description-header">Rp.<?php echo number_format($s->ppn_spb,2,',','.')?></h5>
			                      <span>PPN</span>
			                    </div>
			                  </div>
			                 <!--  /.col -->
			                  <div class="col-md-3">
			                    <div class="description-block">
			                      <h5 class="description-header">Rp.<?php echo number_format($s->totalharga_spb,2,',','.')?></h5>
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
									<table id="example2" width="100%" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr class="bg-Light">
												<td colspan="8">SPB</td>
												<td colspan="2">Verifikasi</td>
											</tr>
											<tr class="bg-primary">
												<td width="5%;">Id</td>
												<td>Nama Barang</td>
												<td align="right">Jumlah</td>
												<td>Satuan</td>
												<td align="right">Harga</td>
												<td align="right">Sub Total</td>
												<td align="right">Sub PPN</td>				         					
												<td align="right">Sub Total Harga</td>				         					
												<td>Status</td>				         					
												<td width="5%;" align="right">Aksi</td>
											</tr>											
										</thead>
										<tbody>
											<?php foreach ($isi as $row) { ?>
												<tr>
													<td><?php echo $row->id_dtl_spb?></td>
													<td><?php echo $row->nm_barang?></td>
													<td align="right"><?php echo $row->jmlbrng_spb?></td>
													<td><?php echo $row->satuanbrng_spb?></td>
													<td align="right"><?php echo number_format($row->hargabrng_spb,2,',','.')?></td>
													<td align="right"><?php echo number_format($row->dtltotal_spb,2,',','.')?></td>
													<td align="right"><?php echo number_format($row->dtlppn_spb,2,',','.')?></td>
													<td align="right"><?php echo number_format($row->dtltotalhrg_spb,2,',','.')?></td>
													<td>
									                    <?php if($row->selesai_dtl_spb == 'T'){ ?>
									                      <span class="badge bg-warning" data-toggle="tooltip" data-placement="top" title="Belum Selesai">Menunggu</span>
									                    <?php }else{ ?>
									                      <span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Selesai">Selesai</span>
									                    <?php } ?>
													</td>
													<td align="center">
														<?php if($row->selesai_dtl_spb == 'T'){?>
															<a href="<?php echo site_url('pembelian/u_spb/'.$row->id_dtl_spb)?>" data-toggle="tooltip" data-placement="top" title="Ubah Detail SPB"><i class="fas fa-pencil-alt fa-sm fa-green"></i></a>&nbsp;
														<?php } ?>
														<a  data-toggle="modal" data-target="#p<?php echo $row->id_dtl_spb?>" href=""><i class="far fa-check-circle" data-toggle="tooltip" data-placement="top" title="Ubah Status"></i></a>
														<div class="text-left">
														<!-- modal -->
														<div class="modal fade" id="p<?php echo $row->id_dtl_spb?>">
														    <div class="modal-dialog  modal-md">
														      <div class="modal-content">
														        <div class="modal-header">
														          <h4 class="modal-title">Ubah Status SPB</h4>
														          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
														            <span aria-hidden="true">&times;</span>
														          </button>
														        </div>
														        <div class="modal-body"><?php $id_detail = $row->id_dtl_spb?>
																	<?php echo form_open('pembelian/v_dtl_konfspb/'.$id_detail);?>
																	<div class="form-group">
																		<label>Nama Barang</label>
																		<input class="form-control form-control-sm" type="text" name="nama" readonly="" placeholder="xxxxx" value="<?php echo $row->nm_barang?>">
																		<input class="form-control form-control-sm" type="text" name="kode" readonly="" hidden="" value="<?php echo $row->id_dtl_spb?>">
																		<input class="form-control form-control-sm" type="text" name="kode_spb" readonly="" hidden=""  value="<?php echo $row->id_spb?>">
																	</div>
																	<div class="form-group">
																		<label>Ubah Status</label>
																		<select class="form-control form-control-sm" name="ubah" required="">
														                    <?php if($row->selesai_dtl_spb == 'T'){ ?>
														                    	<option selected="" value="<?php echo $row->selesai_dtl_spb?>">Belum Selesai</option>
														                    <?php }else{ ?>
														                    	<option selected="" value="<?php echo $row->selesai_dtl_spb?>">Selesai</option>
														                    <?php } ?>
																			<option value="">-- Pilih Status --</option>
																			<option value="Y">Selesai</option>
																			<option value="T">Belum Selesai</option>
																		</select>
																	</div>
																	<hr>
																	<div class="for-group">
														            	<input type="submit" class="btn btn-primary btn-sm float-right toaster" value="Simpan">
																	</div>
																	</form>
														        </div>
														      </div>
														      <!-- /.modal-content -->
														    </div>
														    <!-- /.modal-dialog -->
														  </div>
														  <!-- /.modal -->
														  </div>
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