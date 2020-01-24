<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">Data Sparepart</h3>
						<a href="<?php echo site_url('gudang/t_jenisbrngakt');?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle fa-sm"></i>&nbsp;Tambah</a>
					</div>
					<div class="card-body">
						<div class="example1_wrapper" class="dataTables_wrapper">
						<div class="row">
						<div class="col-md-12">
							<table id="example2" class="table table-sm table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr>
										<td width="10%;">ID Barang</td>
										<td width="20%;">Nama Barang</td>
										<td width="13%;">Jenis Barang</td>
										<td width="13%;">Unit</td>	
										<td width="10%;">Group/Mesin</td>
										<td width="11%;">Rek</td>	         					
										<td width="8%;" align="right">Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($isi as $row){ ?>
									<tr>
										<td><?php echo $row->no_jnsbrngakt?></td>
										<td><?php echo $row->nm_jnsbrngakt?></td>
										<td><?php echo $row->nm_jnsbrng?></td>
										<td><?php echo $row->nm_unit?></td>
										<td><?php echo $row->group_jnsbrngakt?></td>
										<td data-toggle="tooltip" data-placement="top" title="<?php echo $row->nm_rekening;?>"><?php echo $row->id_rekening?></td>
										<td class="project-actions text-center">
										 <a  data-toggle="tooltip" data-placement="top" title="Ubah" href="<?php echo site_url('gudang/u_jenisbrngakt/'.$row->id_jnsbrngakt)?>"><i class="fas fa-pencil-alt fa-sm"></i></a>&ensp;
										 <a  data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo site_url('gudang/h_jenisbrngakt/'.$row->id_jnsbrngakt)?>"><i class="fas fa-trash fa-sm"></i></a>
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
