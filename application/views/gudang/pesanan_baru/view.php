<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Pesanan</h3>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td>Tanggal Pemesanan</td>
												<td>No Pemesanan</td>
												<td>Bagian</td>
												<td>Status</td>
												<td>Keterangan</td>				         					
												<td width="10%;" align="center">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($isi as $row) {?>
											<tr>
												<td><?php echo date('d/m/Y',strtotime($row->tgl_minta))?></td>
												<td><?php echo $row->nota_minta?></td>
												<td><?php echo $row->nm_bagian?></td>
												<td>
													<?php if($row->selesai_minta == 'Y'){ ?>
								                      <span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Pesanan Selesai">Selesai</span>
								                    <?php }elseif($row->selesai_minta == 'P'){ ?>
								                      <span class="badge bg-primary" data-toggle="tooltip" data-placement="top" title="Pesanan Diproses">Diproses</span>
								                    <?php }else{ ?>
								                      <span class="badge bg-warning" data-toggle="tooltip" data-placement="top" title="Pesanan Dalam Antrian">Menunggu</span>
								                    <?php } ?>
								                      <!-- <span class="badge bg-danger">55%</span> -->
												</td>
												<td><?php echo $row->ket_minta?></td>
												<td class="project-actions text-center">
													<a  data-toggle="tooltip" data-placement="top" title="Cetak Nota" href="#"><i class="fas fa-print fa-sm"></i></a>
													&ensp;
													<a  data-toggle="tooltip" data-placement="top" title="Detail verifikasi" href="<?php echo site_url('gudang/v_ver_pesbaru/'.$row->id_permintaan)?>"><i class="fas fa-align-justify fa-sm"></i></a>&ensp;
													<!-- &ensp;
													<a  data-toggle="tooltip" data-placement="top" title="Hapus" href="#" onclick="return confirm('Konfirmasi Hapus Data ?')"><i class="fas fa-trash fa-sm"></i></a> -->
													<a data-toggle="modal" data-target="#d<?php echo $row->id_permintaan?>" href=""><i class="far fa-check-circle" data-toggle="tooltip" data-placement="top" title="Ubah Status"></i></i></a>&ensp;
													<div class="text-left">
													<!-- modal -->
													<div class="modal fade" id="d<?php echo $row->id_permintaan?>">
													    <div class="modal-dialog  modal-md">
													      <div class="modal-content">
													        <div class="modal-header">
													          <h4 class="modal-title">Verifikasi Data Pesanan</h4>
													          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													            <span aria-hidden="true">&times;</span>
													          </button>
													        </div>
													        <div class="modal-body"><?php $id = $row->id_permintaan ?>
																<?php echo form_open('gudang/v_ver_konfirmasi/'.$id);?>
																<div class="form-group">
																	<label>No Pemesan</label>
																	<input class="form-control form-control-sm" type="text" readonly="" placeholder="xxxxx" value="<?php echo $row->nota_minta?>">
																	<input class="form-control form-control-sm" type="text" name="kode" readonly="" hidden=""  value="<?php echo $row->id_permintaan?>">
																</div>
																<div class="form-group">
																	<label>Bagian</label>
																	<input class="form-control form-control-sm" type="text" readonly="" placeholder="xxxxx" value="<?php echo $row->nm_bagian?>">
																</div>
																<div class="form-group">
																	<label>Verifikasi</label>
																	<select class="form-control form-control-sm" name="verif" required="">
													                    <?php if($row->selesai_minta == 'Y'){ ?>
													                    <option selected="" value="<?php echo $row->selesai_minta?>">Selesai</option>
													                    <?php }elseif($row->selesai_minta == 'P'){ ?>
													                    <option selected="" value="<?php echo $row->selesai_minta?>">Diproses</option>
													                    <?php }else{ ?>
													                    <option selected="" value="<?php echo $row->selesai_minta?>">Menunggu</option>
													                    <?php } ?>
																		<option value="">-- Pilih Status --</option>
																		<option value="P">Diproses</option>
																		<option value="T">Menunggu</option>
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