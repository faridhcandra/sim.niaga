<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Detail Data Pembelian</h3>
						<a href="<?php echo site_url('pembelian/v_pembelian');?>" class="btn btn-sm btn-primary float-right">&nbsp;kembali</a>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="bg-success text-white text-center">
								<?php foreach ($judul as $i) { ?>
								<label>No Beli: <?php echo $i->nota_beli?></label> | 
								<label>Tanggal Beli: <?php echo set_tanggal($i->tgl_beli)?></label>
								<?php } ?>
							</div>
						</div>
					</div>
	                <div class="row">
						<div class="col-md-12">
							<div class="row">
							<?php foreach ($get_rppemb as $s) { ?>
							  <div class="col-md-2"></div>
			                  <div class="col-md-3">
			                    <div class="description-block border-right">
			                      <h5 class="description-header">Rp.<?php echo set_number($s->total_beli)?></h5>
			                      <span>Sub Total</span>
			                    </div>
			                  </div>
			                  <!-- /.col -->
			                  <div class="col-md-3">
			                    <div class="description-block border-right">
			                      <h5 class="description-header">Rp.<?php echo set_number($s->ppn_beli)?></h5>
			                      <span>PPN</span>
			                    </div>
			                  </div>
			                  <!-- /.col -->
			                  <div class="col-md-3">
			                    <div class="description-block">
			                      <h5 class="description-header">Rp.<?php echo set_number($s->totalhrg_beli)?></h5>
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
												<td colspan="7">Renc. Beli</td>
												<td colspan="2">Verifikasi</td>
											</tr>
											<tr class="bg-primary">
												<td width="5%;">Id</td>
												<td>Nama Barang</td>
												<td>Tgl Renc. Beli</td>
												<td>Jml Pesan</td>
												<td>Jml Renc. Beli</td>
												<td>Renc. Harga</td>
												<td>Ket.</td>
												<td>Status</td>				         					
												<td width="5%;" align="right">Aksi</td>
											</tr>											
										</thead>
										<tbody>
											<?php foreach ($isi as $row) {?>
											<tr>
												<td><?php echo $row->id_dtl_pembelian?></td>
												<td><?php echo $row->nm_barang?></td>
												<td><?php echo set_tanggal($row->tgl_renc_beli)?></td>
												<td><?php echo set_number($row->jml_dtl_minta)?></td>
												<td><?php echo set_number($row->jml_renc_beli)?></td>
												<td><?php echo set_number($row->hrg_renc_beli)?></td>
												<td><?php echo $row->ket_dtl_beli?></td>
												<td>
													<?php if($row->langsung_beli == 'Y'){ ?>
								                      <span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Langsung Beli">Langsung</span>
								                    <?php }elseif($row->langsung_beli == 'T'){ ?>
								                      <span class="badge bg-warning" data-toggle="tooltip" data-placement="top" title="Reguler Beli">Reguler</span>
								                    <?php }else{ ?>
								                      <span class="badge bg-danger" data-toggle="tooltip" data-placement="top" title="Tidak Ada">Error</span>
								                    <?php } ?>
												</td>
												<td align="center">
													<a href="<?php echo site_url('pembelian/u_rencpemb/'.$row->id_dtl_pembelian)?>" data-toggle="tooltip" data-placement="top" title="Ubah Data"><i class="fas fa-pencil-alt fa-sm fa-green"></i></a>&ensp;
													<a  data-toggle="modal" data-target="#x<?php echo $row->id_dtl_pembelian?>" href=""><i class="far fa-check-circle" data-toggle="tooltip" data-placement="top" title="Ubah Status"></i></a>
													<div class="text-left">
													<!-- modal -->
													<div class="modal fade" id="x<?php echo $row->id_dtl_pembelian?>">
													    <div class="modal-dialog  modal-md">
													      <div class="modal-content">
													        <div class="modal-header">
													          <h4 class="modal-title">Ubah Status Pembelian</h4>
													          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													            <span aria-hidden="true">&times;</span>
													          </button>
													        </div>
													        <div class="modal-body"><?php $id_detail = $row->id_dtl_pembelian?>
																<?php echo form_open('pembelian/v_dtl_konfpemb/'.$id_detail);?>
																<div class="form-group">
																	<label>Nama Barang</label>
																	<input class="form-control form-control-sm" type="text" name="nama" readonly="" placeholder="xxxxx" value="<?php echo $row->nm_barang?>">
																	<input class="form-control form-control-sm" type="text" name="kode" readonly="" hidden="" value="<?php echo $row->id_dtl_pembelian?>">
																	<input class="form-control form-control-sm" type="text" name="kode_permin" readonly="" hidden=""  value="<?php echo $row->id_pembelian?>">
																</div>
																<div class="form-group">
																	<label>Ubah Status</label>
																	<select class="form-control form-control-sm" name="ubah" required="">
													                    <?php if($row->langsung_beli == 'Y'){ ?>
													                    	<option selected="" value="<?php echo $row->langsung_beli?>">Langsung</option>
													                    <?php }elseif($row->langsung_beli == 'T'){ ?>
													                    	<option selected="" value="<?php echo $row->langsung_beli?>">Reguler</option>
													                    <?php }else{ ?>
													                    	<option selected="" value="<?php echo $row->langsung_beli?>">Tidak Ada Status</option>
													                    <?php } ?>
																		<option value="">-- Pilih Status --</option>
																		<option value="Y">Langsung</option>
																		<option value="T">Reguler</option>
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