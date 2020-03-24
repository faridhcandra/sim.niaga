<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Nota Penerimaan Barang</h3>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td>No Terima</td>
												<td>Tgl Terima</td>
												<td>Leveransir</td>
												<td>Bagian / Unit</td>
												<td>No Beli</td>
												<td>SrtJalan</td>
												<!-- <td>TglJalan</td> -->
												<td align="center" width="10%">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($isi as $row): ?>
											<tr>
												<td><?php echo $row->nota_terima?>
													<br>
													<span class="badge bg-info"><?php if ($row->verif_terima == "Y"){echo "Terverifikasi";}else{echo "Belum Terverifikasi";}?></span>
												</td>
												<td><?php echo set_tanggal($row->tgl_terima)?></td>
												<td><?php echo $row->nm_supplier?></td>
												<td><?php echo $row->nm_bagian?> / <?php echo $row->nm_unit?></td>
												<td><?php echo $row->nota_beli?></td>
												<td>
													<span class="badge bg-dark" data-toggle="tooltip" title="Tanggal Surat: <?php echo date("d-m-Y",strtotime($row->tgljalan_terima))?>"><?php echo $row->srtjalan_terima?></span>
												</td>
												<!-- <td><?php echo $row->tgljalan_terima?></td> -->
												<td class="project-actions text-center">
													<a data-toggle="modal" data-target="#ib<?php echo $row->id_penerimaan?>" href=""><i data-toggle="tooltip" title="Info Lainya"  class="fas fa-info-circle fa-sm"></i></a>&nbsp;
													<!-- modal -->
													<div class="modal fade text-left" id="ib<?php echo $row->id_penerimaan?>">
													    <div class="modal-dialog  modal-xl">
													      <div class="modal-content">
													        <div class="modal-header">
													          <h4 class="modal-title">Nota Penerimaan Barang</h4>
													          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													            <span aria-hidden="true">&times;</span>
													          </button>
													        </div>
													        <div class="modal-body">
													        	<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
																	<thead>
																		<tr>
																			<td>No Terima</td>
																			<td>Tgl Terima</td>
																			<td>Leveransir</td>
																			<td>Biaya Angkut</td>
																			<td>Subtotal Rp</td>
																			<td>PPn Rp</td>
																			<td>Total Rp</td>
																			<td>Subtotal Asing</td>
																			<td>PPn Asing</td>
																			<td>Total Asing</td>
																		</tr>
																	</thead>
																	<tbody>
																		<tr></tr>
																	</tbody>
																</table>
													        </div>
													      </div>
													      <!-- /.modal-content -->
													    </div>
													    <!-- /.modal-dialog -->
													  </div>
													  <!-- /.modal -->											

													<a data-toggle="tooltip" title="Input / Ubah NPB" href="<?php echo site_url('pembelian/u_npb/'.$row->id_penerimaan)?>"><i class="fas fas fa-edit fa-sm"></i></a>&nbsp;

													<a data-toggle="modal" data-target="#b<?php echo $row->id_penerimaan?>" href=""><i class="fas fa-user-check fa-sm" data-toggle="tooltip" data-placement="top" title="Verifikasi Nota"></i></a>

													<div class="text-left">
													<!-- modal -->
													<div class="modal fade" id="b<?php echo $row->id_penerimaan?>">
													    <div class="modal-dialog  modal-md">
													      <div class="modal-content">
													        <div class="modal-header">
													          <h4 class="modal-title">Verifikasi Nota Penerimaan</h4>
													          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													            <span aria-hidden="true">&times;</span>
													          </button>
													        </div>
													        <div class="modal-body"><?php $id = $row->id_penerimaan?>
																<?php echo form_open('pembelian/v_konfnpb/'.$id);?>
																<div class="form-group">
																	<label>No Pemesan</label>
																	<input class="form-control form-control-sm" type="text" readonly="" placeholder="xxxxx" value="<?php echo $row->nota_terima?>">
																	<input class="form-control form-control-sm" type="text" name="kode" readonly="" hidden=""  value="<?php echo $row->id_penerimaan?>">
																</div>
																<div class="form-group">
																	<label>Bagian</label>
																	<input class="form-control form-control-sm" type="text" readonly="" placeholder="xxxxx" value="<?php echo $row->nm_bagian?>">
																</div>
																<div class="form-group">
																	<label>Unit</label>
																	<input class="form-control form-control-sm" type="text" readonly="" placeholder="xxxxx" value="<?php echo $row->nm_unit?>">
																</div>
																<div class="form-group">
																	<label>Verifikasi</label>
																	<select class="form-control form-control-sm" name="ubah" required="">
													                    <?php if($row->verif_terima == 'Y'){ ?>
													                    <option selected="" value="<?php echo $row->verif_terima?>">Verifikasi</option>
													                    <?php }else{ ?>
													                    <option selected="" value="<?php echo $row->verif_terima?>">Belum Verifikasi</option>
													                    <?php } ?>
																		<option value="">-- Pilih Verifikasi --</option>
																		<option value="Y">Verifikasi</option>
																		<option value="T">Belum Verifikasi</option>
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
											<?php endforeach ?>
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