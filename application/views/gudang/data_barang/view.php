<!-- Main content -->
<div class="content" style="font-size: 15px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Penyesuaian Data Barang</h3>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
							<div class="row">
								<div class="col-md-12">
									<table id="example2" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid" aria-describedby="example2_info">
										<thead>
											<tr>
												<td width="10%;">ID Barang</td>
												<td width="20%;">Nama Barang</td>
												<td width="13%;">Jenis Barang</td>
												<td width="13%;">Satuan</td>		         					
												<td width="13%;">Kode Brng Akt</td>		         					
												<td width="13%;">Nama Brng Akt</td>		         					
												<td width="13%;">Rek Brng Akt</td>		         					
												<td width="8%;">Aksi</td>
											</tr>
										</thead>
										<tbody>
											<?php $i=0; foreach ($isi as $row){ $i++;?>
											<tr>
												<td><?php echo $row->id_barang?></td>
												<td><?php echo $row->nm_barang?></td>
												<td><?php echo $row->nm_jnsbrng?></td>
												<td><?php echo $row->nm_satuan?></td>
												<td><?php echo $row->no_jnsbrngakt?></td>
												<td><?php echo $row->nm_jnsbrngakt?></td>
												<td><?php echo $row->id_rekening?></td>
												<td class="project-actions text-center">
													<?php
													
													$a = multiexplode(array("."," ","/","-"),$row->id_barang); $b = implode($a); 
													?>
													<a data-toggle="modal" data-target="#c<?php echo $b?>" href=""><i class="fas fa-pencil-alt fa-sm" data-toggle="tooltip" data-placement="top" title="Input Kode Akt"></i></i></a>&nbsp;
													<div class="text-left">
													<!-- modal -->
													<div class="modal fade" id="c<?php echo $b?>">
													    <div class="modal-dialog  modal-md">
													      <div class="modal-content">
													        <div class="modal-header">
													          <h4 class="modal-title">Input Kode Akt</h4>
													          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													            <span aria-hidden="true">&times;</span>
													          </button>
													        </div>
													        <div class="modal-body"><?php $id = $row->id_barang ?>
																<?php echo form_open('gudang/v_edit_brngakt/'.$id);?>
																<div class="form-group">
																	<label>ID Barang</label>
																	<input class="form-control form-control-sm" type="text" name="kode" readonly=""   value="<?php echo $row->id_barang?>">
																</div>
																<div class="form-group">
																	<label>Nama Barang</label>
																	<input class="form-control form-control-sm" type="text" readonly="" placeholder="xxxxx" value="<?php echo $row->nm_barang?>">
																</div>
																<div class="form-group">
																	<label>Kode Brng Akt</label>
																	<input list='kd_akt' type='text' class='form-control form-control-sm' name="kode_akt">
																	<datalist id='kd_akt'>
																	<?php foreach ($cari_kodeakt->result() as $row): ?>"
																	<option value='<?php echo $row->id_jnsbrngakt;?>'><?php echo $row->nm_jnsbrngakt;?> | <?php echo $row->no_rekening?> | <?php echo $row->id_rekening;?></option>
																	<?php endforeach ?>
																	</datalist>
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
