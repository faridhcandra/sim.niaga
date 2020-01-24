<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-4">
		<div class="card card-outline card-dark">
			<div class="card-header">
				<h3 class="card-title">Form Tambah Kode Rekening Akuntansi</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					<?php echo validation_errors();?>
					<?php echo form_open('gudang/koderekakt_t');?>
						<div class="form-group">
							<label>Id Rekening Akuntansi</label>
							<input class="form-control form-control-sm" type="text" name="kode" placeholder="ex : 1 1 1 0 1 5" required="" autocomplete="off" autofocus="">
						</div>
						<div class="form-group">
							<label>Nama Rekening Akuntansi</label>
							<input class="form-control form-control-sm" type="text" name="nama" placeholder="ex : Bahan Penolong" required="" autocomplete="off">
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
				<h3 class="card-title">Data Kode Rekening Akuntansi</h3>
			</div>
			<div class="card-body">
				<div class="example1_wrapper" class="dataTables_wrapper">
					<div class="row">
						<div class="col-md-12">
							<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
				         				<tr>
				         					<td width="20%;">Id Rekening</td>
				         					<td>Nama Rekening Akuntansi</td>
				         					<td width="15%;" align="right">Aksi</td>
				         				</tr>
				         			</thead>
				         			<tbody>
				         				<?php foreach ($isi as $row){?>
				         				<tr>
				         					<td><?php echo $row->id_rekening?></td>
				         					<td><?php echo $row->nm_rekening?></td>
				         					<td class="project-actions text-center">
												<a  data-toggle="tooltip" data-placement="top" title="Ubah" href="<?php echo site_url('gudang/u_koderekakt/'.$row->no_rekening)?>"><i class="fas fa-pencil-alt fa-sm"></i></a>&ensp;
												<a  data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo site_url('gudang/h_koderekakt/'.$row->no_rekening)?>" onclick="return confirm('Konfirmasi Hapus Data ?')" ><i class="fas fa-trash fa-sm"></i></a>
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
