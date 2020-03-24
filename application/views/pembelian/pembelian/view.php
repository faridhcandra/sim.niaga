<!-- Main content  -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Pembelian</h3>
						<a href="<?php echo site_url('pembelian/t_pembelian')?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td>Tanggal</td>
												<td>No Beli</td>
												<td>Tgl Pesan</td>
												<td>No Pesan</td>
												<td>Bagian</td>
												<!-- <td>Unit</td> -->
												<td>Status</td>
												<!-- <td>keterangan</td>				         					 -->
												<td align="center">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($isi as $row) {?>
											<tr>
												<td><?php echo set_tanggal($row->tgl_beli)?></td>
												<td><?php echo $row->nota_beli?></td>
												<td><?php echo set_tanggal($row->tgl_minta)?></td>
												<td><?php echo $row->nota_minta?></td>
												<td><?php echo $row->nm_bagian?></td>
												<!-- <td><?php echo $row->nm_unit?></td> -->
												<td>
													<?php if($row->selesai_beli == 'Y'){ ?>
												      <span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Selesai">Selesai</span>
								                    <?php }elseif($row->selesai_beli == 'T'){ ?>
								                      <span class="badge bg-warning" data-toggle="tooltip" data-placement="top" title="Belum Selesai">Menunggu</span>
								                    <?php }else{ ?>
									                  <span class="badge bg-danger" data-toggle="tooltip" data-placement="top" title="Tidak Ada Status">X</span>
								                    <?php } ?>
												</td>
												<!-- <td><?php echo $row->ket_beli?></td> -->
												<td class="project-actions text-center">
													<a data-toggle="tooltip" data-placement="top" title="Cetak Nota" href="#"><i class="fas fa-print fa-sm"></i></a>
													&nbsp;
													<a data-toggle="tooltip" data-placement="top" title="Detail Renc Pembelian" href="<?php echo site_url('pembelian/v_dtl_pemb/'.$row->id_pembelian)?>"><i class="fas fa-align-justify fa-sm"></i></a>&nbsp;
													<a data-toggle="modal" data-target="#y<?php echo $row->id_pembelian?>" href=""><i class="far fa-check-circle" data-toggle="tooltip" data-placement="top" title="Ubah Status"></i></a>&nbsp;
													<a href="<?php echo site_url('pembelian//'.$row->id_pembelian)?>" data-toggle="tooltip" data-placement="top" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>
													<div class="text-left">
													<!-- modal -->
													<div class="modal fade" id="y<?php echo $row->id_pembelian?>">
													    <div class="modal-dialog  modal-md">
													      <div class="modal-content">
													        <div class="modal-header">
													          <h4 class="modal-title">Verifikasi Renc. Pembelian</h4>
													          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													            <span aria-hidden="true">&times;</span>
													          </button>
													        </div>
													        <div class="modal-body"><?php $id = $row->id_pembelian?>
																<?php echo form_open('pembelian/v_konfpemb/'.$id);?>
																<div class="form-group">
																	<label>No Pemesan</label>
																	<input class="form-control form-control-sm" type="text" readonly="" placeholder="xxxxx" value="<?php echo $row->nota_beli?>">
																	<input class="form-control form-control-sm" type="text" name="kode" readonly="" hidden=""  value="<?php echo $row->id_pembelian?>">
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
													                    <?php if($row->selesai_beli == 'Y'){ ?>
													                    <option selected="" value="<?php echo $row->selesai_beli?>">Selesai</option>
													                    <?php }elseif($row->selesai_beli == 'T'){ ?>
													                    <option selected="" value="<?php echo $row->selesai_beli?>">Belum Selesai</option>
													                    <?php }else{ ?>
													                    <option selected="" value="<?php echo $row->selesai_beli?>">Tidak Ada Status</option>
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->