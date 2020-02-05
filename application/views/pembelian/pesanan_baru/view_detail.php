<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Detail Data Pesanan</h3>
						<a href="<?php echo site_url('pembelian/v_verpesbaru');?>" class="btn btn-sm btn-primary float-right">&nbsp;kembali</a>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="bg-info text-white text-center">
								<?php foreach ($judul as $i) { ?>
								<label>No Permintaan <?php echo $i->nota_minta?></label> - 
								<label>Tanggal Permintaan <?php echo date("d/m/Y",strtotime($i->tgl_minta))?></label>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="card-body">						
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr class="bg-Light">
												<td colspan="5">Pesanan</td>
												<td colspan="2">Stok</td>
												<td colspan="2">Verifikasi</td>
											</tr>
											<tr class="bg-primary">
												<td width="5%;">Id</td>
												<td>Nama Barang</td>
												<td>Tanggal Diperlukan</td>
												<td>Jumlah Barang</td>
												<td>Keterangan Detail</td>
												<td>unit</td>
												<td>Gudang</td>
												<td>Status</td>				         					
												<td width="5%;" align="right">Aksi</td>
											</tr>											
										</thead>
										<tbody id="show_data_verpesbaru">
											<?php foreach ($isi as $row) {?>
											<tr>
												<td><?php echo $row->id_dtl_permintaan?></td>
												<td><?php echo $row->nm_barang?></td>
												<td><?php echo date("d/m/Y",strtotime($row->tgl_dtl_perlu))?></td>
												<td><?php echo $row->jml_dtl_minta?></td>
												<td><?php echo $row->ket_dtl_minta?></td>
												<td><?php echo $row->stkunit_dtl_minta?></td>
												<td><?php echo $row->stkgdng_dtl_minta?></td>
												<td>
													<?php if($row->selesai_dtl_minta == 'Y'){ ?>
								                      <span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Pesanan Selesai">Selesai</span>
								                    <?php }elseif($row->selesai_dtl_minta == 'P'){ ?>
								                      <span class="badge bg-primary" data-toggle="tooltip" data-placement="top" title="Pesanan Diproses">Diproses</span>
								                    <?php }elseif($row->selesai_dtl_minta == 'T'){ ?>
								                      <span class="badge bg-warning" data-toggle="tooltip" data-placement="top" title="Pesanan Dalam Antrian">Menunggu</span>
								                    <?php }elseif($row->selesai_dtl_minta == 'M'){ ?>
												      <span class="badge bg-info" data-toggle="tooltip" data-placement="top" title="Mutasi Stok">Mutasi</span>
								                    <?php }elseif($row->selesai_dtl_minta == 'DT'){ ?>
								                      <span class="badge bg-danger" data-toggle="tooltip" data-placement="top" title="Pesanan Tidak Disetujui">Tidak Disetujui</span>
								                    <?php } ?>
												</td>
												<td align="center">
													<a  data-toggle="modal" data-target="#a<?php echo $row->id_dtl_permintaan?>"><i class="fas fa-user-check fa-sm" data-toggle="tooltip" data-placement="top" title="verifikasi"></i></i></a>&ensp;
													<div class="text-left">
													<!-- modal -->
													<div class="modal fade" id="a<?php echo $row->id_dtl_permintaan?>">
													    <div class="modal-dialog  modal-md">
													      <div class="modal-content">
													        <div class="modal-header">
													          <h4 class="modal-title">Verifikasi Data Pesanan</h4>
													          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													            <span aria-hidden="true">&times;</span>
													          </button>
													        </div>
													        <div class="modal-body"><?php $id_detail = $row->id_dtl_permintaan ?>
																<?php echo form_open('gudang/ver_konfirmasi/'.$id_detail);?>
																<div class="form-group">
																	<label>Nama Barang</label>
																	<input class="form-control form-control-sm" type="text" name="nama" readonly="" placeholder="xxxxx" value="<?php echo $row->nm_barang?>">
																	<input class="form-control form-control-sm" type="text" name="kode" readonly="" hidden="" value="<?php echo $row->id_dtl_permintaan?>">
																	<input class="form-control form-control-sm" type="text" name="kode_permin" readonly="" hidden=""  value="<?php echo $row->id_permintaan?>">
																</div>
																<div class="form-group">
																	<label>Verifikasi</label>
																	<select class="form-control form-control-sm" name="verif" required="">
													                    <?php if($row->selesai_dtl_minta == 'Y'){ ?>
													                    <option selected="" value="<?php echo $row->selesai_dtl_minta?>">Selesai</option>
													                    <?php }elseif($row->selesai_dtl_minta == 'P'){ ?>
													                    <option selected="" value="<?php echo $row->selesai_dtl_minta?>">Diproses</option>
													                    <?php }elseif($row->selesai_dtl_minta == 'T'){ ?>
													                    <option selected="" value="<?php echo $row->selesai_dtl_minta?>">Belum Diverifikasi</option>
													                    <?php }elseif($row->selesai_dtl_minta == 'M'){ ?>
													                    <option selected="" value="<?php echo $row->selesai_dtl_minta?>">Mutasi</option>
													                    <?php }elseif($row->selesai_dtl_minta == 'DT'){ ?>
													                    <option selected="" value="<?php echo $row->selesai_dtl_minta?>">Tidak Disetujui</option>
													                    <?php } ?>
																		<option value="">-- Pilih Verifikasi --</option>
																		<option value="A">Disetujui</option>
																		<option value="P">Diproses</option>
																		<option value="DT">Tidak Disetujui</option>
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
