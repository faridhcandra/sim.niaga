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
												<td align="center" width="13%">Aksi</td>
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
	 													<a data-toggle="modal" data-target="#e<?php echo $row->id_cek?>" href=""><i class="far fa-check-circle" data-toggle="tooltip" data-placement="top" title="Ubah Status"></i></a>
	 													&nbsp;
	 													<a href="<?php echo site_url('gudang/pengetesan_h/'.$row->id_cek)?>" data-toggle="tooltip" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>
														<div class="text-left">
														<!-- modal -->
														<div class="modal fade" id="e<?php echo $row->id_cek?>">
														    <div class="modal-dialog  modal-md">
														      <div class="modal-content">
														        <div class="modal-header">
														          <h4 class="modal-title">Verifikasi Pengetesan</h4>
														          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
														            <span aria-hidden="true">&times;</span>
														          </button>
														        </div>
														        <div class="modal-body"><?php $id = $row->id_cek?>
																	<?php echo form_open('gudang/v_konftest/'.$id);?>
																	<div class="form-group">
																		<label>No Pengetesan</label>
																		<input class="form-control form-control-sm" type="text" readonly="" placeholder="xxxxx" value="<?php echo $row->nota_cek?>">
																		<input class="form-control form-control-sm" type="text" name="kode" readonly="" hidden=""  value="<?php echo $row->id_cek?>">
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
														                    <?php if($row->selesai_cek == 'Y'){ ?>
														                    <option selected="" value="<?php echo $row->selesai_cek?>">Selesai</option>
														                    <?php }elseif($row->selesai_cek == 'T'){ ?>
														                    <option selected="" value="<?php echo $row->selesai_cek?>">Belum Selesai</option>
														                    <?php }else{ ?>
														                    <option selected="" value="<?php echo $row->selesai_cek?>">Tidak Ada Status</option>
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
<!-- /.content -->
