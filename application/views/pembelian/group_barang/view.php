<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Tambah Group</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<?php echo validation_errors();?>
								<?php echo form_open('pembelian/t_groupbrng');?>
								<div class="form-group">
									<label>Group</label>
									<input class="form-control form-control-sm" type="text" name="group" placeholder="Group ex : BRG-LAIN" required="" autocomplete="off" autofocus="">
								</div>
								<div class="form-group">
									<label>Rekening</label>
									<input class="form-control form-control-sm" type="text" name="rek" placeholder="Rek ex : LAIN-LAIN" required="" autocomplete="off">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary btn-sm float-right toaster" value="Simpan">
								</div>
							</form>
							</div>
						</div>         
					</div>
				</div>
			</div>
			<div class="col-md-8">
			<div class="card card-outline card-info">
				<div class="card-header">
					<h3 class="card-title">Data Group Barang</h3>
				</div>
				<div class="card-body">
					<div class="example1_wrapper" class="dataTables_wrapper">
						<div class="row">
							<div class="col-md-12">
								<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
									<thead>
										<tr>
											<td width="10%;">#</td>
											<td>Group Barang</td>
											<td>Rekening Group</td>
											<td width="15%;" class="text-right">Aksi</td>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; foreach ($isi as $row){ $i++;?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $row->nm_group?></td>
											<td><?php echo $row->rek_group?></td>
											<td class="project-actions text-center">
												<a href="<?php echo site_url('pembelian/u_groupbrng/'.$row->id_group)?>" data-toggle="tooltip" data-placement="top" title="Ubah" ><i class="fas fa-pencil-alt fa-sm"></i></a>&ensp;
												<a href="<?php echo site_url('pembelian/h_groupbrng/'.$row->id_group)?>" data-toggle="tooltip" data-placement="top" title="Hapus"  onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>
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
