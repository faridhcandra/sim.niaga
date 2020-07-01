<!-- Main content --> 
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Form Tambah Penerimaan</h3>
					</div>
					<div class="card-body">
						<?php echo validation_errors();?>
						<?php echo form_open('gudang/penerimaan_t');?>
						<table width="100%" class="table-responsive-md">
							<tr>
								<td width="11%" valign="top"><label style="font-size: 11pt;">Nota Penerimaan</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">			
											<input class=" form-control form-control-sm" type='text' name='nota_terima' id="no_terima">
											<input class="form-control form-control-sm" type="text" name="kode" value="<?php echo $kode?>" hidden="">
										</div>
									</div>
								</td>
								<td width="11%" valign="top"><label style="font-size: 11pt;">Tanggal Terima</label></td>
								<td colspan="3">
									<div class="col-md-3">
										<div class="form-group">
											<input class="form-control form-control-sm" type="date" name="tgl_terima"required="" value="<?php echo date('Y-m-d');?>">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Leveransir</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<div class="input-group-prepend">								
											<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-crsup">Cari</button>
											<input class=" form-control form-control-sm" type='text' name='idsup' id="id_sup" readonly="">
											</div>
										</div>
									</div>
								</td>
								<td colspan="4">
									<div class="col-md-12">
										<div class="form-group">			
											<input list='supplier'class=" form-control form-control-sm" type='text' class='form-control form-control-sm' name='supp' id="nm_sup" readonly="">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Nota Pembelian</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<div class="input-group-prepend">								
											<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-crnota">Cari</button>
											<input class=" form-control form-control-sm" type='text' class='form-control form-control-sm' name='nota_beli' id="no_beli" readonly="">
											<input type="text" name="id_pembelian" id="id_pembelian" hidden="">
											</div>
										</div>
									</div>	
								</td>
								<td valign="top"><label style="font-size: 11pt;">Nota Cek</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="nota_cek" required="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Tanggal Cek</label></td>
								<td>
									<div class="col-md-10">
										<div class="form-group">
											<input class="form-control form-control-sm" type="date" name="tgl_cek" required="" value="<?php echo date('Y-m-d');?>">
										</div>
									</div>	
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Unit</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="unit" id="nm_unt" required="" readonly="">
											<input class="form-control form-control-sm" type="text" name="idunt" id="id_unt" required="" readonly="" hidden="">
										</div>
									</div>	
								</td>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Surat jalan</label></td>
								<td>							
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="suratjln_terima" required="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Tanggal Jalan</label></td>
								<td>
									<div class="col-md-10">
										<div class="form-group">
											<input class="form-control form-control-sm" type="date" name="tgljln_terima" required="" value="<?php echo date('Y-m-d');?>">
										</div>
									</div>	
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Bagian</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="bagian" id="nm_bag" required="" readonly="">
											<input class="form-control form-control-sm" type="text" name="idbag" id="id_bag" required="" readonly="" hidden="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Jenis Barang</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group" >
											<!-- <input class="form-control form-control-sm" type="text" name="jns_brng" required=""> -->
											<?php echo cmb_dinamis('jns_brng','tbl_jenis_barang','id_jnsbrng','nm_jnsbrng','id_jnsbrng','','Pilih Jenis Barang');?>
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Tanggal JT</label></td>
								<td>
									<div class="col-md-10">
										<div class="form-group" >
											<input class="form-control form-control-sm" type="date" name="tgljt_terima" required="" value="<?php echo date('Y-m-d');?>">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Keterangan</label></td>
								<td colspan="5">
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="ket_terima" required="">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">PPN Terima</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="ppn_terima" id="totppntrm" required="" readonly="">
										</div>
									</div>
								<td valign="top"><label style="font-size: 11pt;">Subtotal Trm</label></td>
								<td>							
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="subtotal_trm" id="subtottrm" required="" readonly="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Total Hrg Trm</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="totalhrg_trm" id="tothrgtrm" required="" readonly="">
										</div>
									</div>
								</td>
							</tr>
						</table>
						<div class="row">
							<div class="col-md-3"><p><i><b>Detail Penerimaan Barang</b></i></p></div>
							<div class="col-md-9">
								<hr style="border: 1px solid green;">
							</div>
						</div>
						<div id="insert-detailterima"></div>
						<br>						
						<div class="row">
							<div class="col-md-11">
								<div class="form-group">
									<input type="button" class="btn btn-success btn-sm" value="Tambah Form" id="tambah-detailterima">
									<input type="button" class="btn btn-warning btn-sm" value="Reset Form" id="reset-detailterima">
								</div>
							</div>
						</div> 
						<hr>
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right"> 
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
								</div>
							</div>
						</div>
						<?php echo form_close() ?>
						<input type="hidden" id="dtlterima" value="1"> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal  -->

<!-- ========================================= MODAL CARI LEVERANSIR =====================================================  -->
	<div class="modal fade" id="modal-crsup">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Cari Supplier</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	<table id="carisup" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
	        		<thead>
	        			<tr>
		        			<th>ID Supplier</th>
		        			<th>Nama Supplier</th>
	        			</tr>
	        		</thead>	 
	        		<tbody>
	        		<?php foreach ($get_sup as $a) { ?>
	        			<tr id="pilih_sup"
							id_csup ="<?php echo $a->id_supplier?>"
							nm_csup ="<?php echo $a->nm_supplier?>"
	        			>
	        				<td><?php echo $a->id_supplier?></td>
	        				<td><?php echo $a->nm_supplier?></td>
	        			</tr>
		        	<?php } ?>
	        		</tbody>
	        	</table>
	        </div>
	        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
	          <b><i>* Pilih supplier dengan cara klik pada kolom data</i></b>
	        </div>
	      </div>
	    </div>
	 </div>
 <!-- ==================================================================================================================== -->
 <!-- ============================================== MODAL CARI DATA PEMBELIAN =========================================== -->
<div class="modal fade" id="modal-crnota">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cari Data Pembelian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<table id="carinota" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
        		<thead>
        			<tr>
	        			<th>Nota Pembelian</th>
	        			<th>Nama Unit</th>
	        			<th>ID Bagian</th>
	        			<th>Nama Bagian</th>
        			</tr>
        		</thead>	 
        		<tbody>
        		<?php foreach ($get_notabeli as $a) { ?>
        			<tr id="pilih_nota"
						nota_cbeli ="<?php echo $a->nota_beli?>"
						id_cpembelian ="<?php echo $a->id_pembelian?>"
						id_cunit ="<?php echo $a->id_unit?>"
						nm_cunit ="<?php echo $a->nm_unit?>"
						id_cbagian ="<?php echo $a->id_bagian?>"
						nm_cbagian ="<?php echo $a->nm_bagian?>"
        			>
        				<td><?php echo $a->nota_beli?></td>
        				<td><b>[<?php echo $a->id_unit?>]</b> <?php echo $a->nm_unit?></td>
        				<td><?php echo $a->id_bagian?></td>
        				<td><?php echo $a->nm_bagian?></td>
        			</tr>
	        	<?php } ?>
        		</tbody>
        	</table>
        </div>
        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
          <b><i>* Pilih nota pembelian dengan cara klik pada kolom data</i></b>
        </div>
      </div>
    </div>
 </div>
 <!-- ==================================================================================================================== -->


<!--  /.modal  -->

<script type="text/javascript">
	/*          =============================== MODAL CARI LEVERANSIR =====================================*/
		$(document).ready(function(){
			// tabel no permintaan
			$(function () {
				$("#carisup").DataTable({
				  "deferRender" : true,
				  "processing"  : true,
				  "order"       : [],
				});
			});
			// get datatabel no permintaan 
			$(document).on('click', '#pilih_sup', function (e) {
				document.getElementById("id_sup").value 	= $(this).attr('id_csup');
				document.getElementById("nm_sup").value 	= $(this).attr('nm_csup');
				$('#modal-crsup').modal('hide');
			});
		});
	/*          =============================== END =====================================*/
	
	/*          ================================= MODAL CARI NOTA ========================================*/
		$(document).ready(function(){
			// tabel no permintaan
			$(function () {
				$("#carinota").DataTable({
				  "deferRender" : true,
				  "processing"  : true,
				  "order"       : [],
				});
			});
			// get datatabel no permintaan 
			$(document).on('click', '#pilih_nota', function (e) {
				document.getElementById("no_beli").value 		= $(this).attr('nota_cbeli');
				document.getElementById("id_pembelian").value 	= $(this).attr('id_cpembelian');
				document.getElementById("id_unt").value 		= $(this).attr('id_cunit');
				document.getElementById("nm_unt").value 		= $(this).attr('nm_cunit');
				document.getElementById("id_bag").value 		= $(this).attr('id_cbagian');
				document.getElementById("nm_bag").value 		= $(this).attr('nm_cbagian');
				$('#modal-crnota').modal('hide');
			});
		});


	/*          =============================== END =====================================*/
	

    $(document).ready(function(){
        // Tambah Pemesanan
        $("#tambah-detailterima").click(function(){ // Ketika tombol Tambah Data Form di klik
	    var jumlah = parseInt($("#dtlterima").val()); // Ambil jumlah data form pada textbox pesanan baru
	    var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
	      
	    // Kita akan menambahkan form dengan menggunakan append
	    // pada sebuah tag div yg kita beri id 
	    $("#insert-detailterima").append("<hr>"+"<div class='row'>"
		+				"<table width='100%''>"
		+					"<tr>"
		+						"<td width='11%' valign='top'><label style='font-size: 11pt;'>ID dtl Beli</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<div class='input-group-prepend'>"						
		+									"<button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modal-crdetail"+nextform+"'>Cari</button>"
		+									"<input class='form-control form-control-sm' type='text' name='id_dtl_pembelian[]' id='id_dtl_beli' required='' readonly=''>"
		+								"</div>"
		+							"</div>"
		+						"</div>"
		+						"</td>"
		// + 						"<td valign='top' hidden=''><label style='font-size: 11pt;'>Tgl dtl Trm</label></td>"			
		// +						"<td>"
		// +							"<div class='col-md-8' hidden=''>"
		// +								"<div class='form-group'>"
		// +									"<input class='form-control form-control-sm' type='date' name='tgl_dttrm[]' required='' value='<?php echo date('Y-m-d');?>'>"
		// +								"</div>"
		// +							"</div>"		
		// +						"</td>"
		+						"<td valign='top'><label style='font-size: 11pt;''>Kode Akt</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' name='id_jbrngakt[]' id='id_jbakt' required='' hidden=''>"
		+									"<input class='form-control form-control-sm' type='text' id='no_jbakt' required='' readonly=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+					"</tr>"
		+					"<tr>"
		+						"<td valign='top'><label style='font-size: 11pt;''>ID barang</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' name='id_barang[]' id='id_brng' required='' readonly=''>"
		+								"</div>"
		+							"</div>"	
		+						"</td>"
		+						"<td valign='top'><label style='font-size: 11pt;'>Nama barang</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' name='nm_barang[]' id='nm_brng' required='' readonly=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+						"<td valign='top'><label style='font-size: 11pt;'>Group</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' id='nm_grup' required='' readonly=''>"
		+									"<input class='form-control form-control-sm' type='text' id='id_grup' name='id_group[]' required='' hidden=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+					"</tr>"
		+					"<tr>"
		+						"<td valign='top'><label style='font-size: 11pt;'>Jumlah 1</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' name='jml1[]' required=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+						"<td valign='top'><label style='font-size: 11pt;'>Satuan 1</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' id='nm_satuan1' required='' readonly=''>"
		+									"<input class='form-control form-control-sm' type='text' id='sat1' name='sat1[]' required='' hidden=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+						"<td valign='top'><label style='font-size: 11pt;'>Harga</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' id='harga_dtlterima' name='harga_dtlterima[]' required='' readonly=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+					"</tr>"
		+					"<tr>"
		+						"<td valign='top'><label style='font-size: 11pt;'>Jumlah 2</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' name='jml2[]' required=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+						"<td valign='top'><label style='font-size: 11pt;'>Satuan 2</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' id='nm_satuan2' required='' readonly=''>"
		+									"<input class='form-control form-control-sm' type='text' id='sat2' name='sat2[]' required='' hidden=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+					"</tr>"
		+					"<tr>"
		+						"<td valign='top'><label style='font-size: 11pt;'>PPN dtl Trm</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' name='ppn_trm[]' id='ppn_dtl' required='' readonly=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+						"<td valign='top'><label style='font-size: 11pt;'>Subtotal dtl Trm</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' name='sub_trm[]' id='subttl_dtl' required='' readonly=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+						"<td valign='top'><label style='font-size: 11pt;'>Tot Hrg Trm</label></td>"
		+						"<td>"
		+							"<div class='col-md-12'>"
		+								"<div class='form-group'>"
		+									"<input class='form-control form-control-sm' type='text' name='tot_hrg_trm[]' id='tothrg_dtl' required='' readonly=''>"
		+								"</div>"
		+							"</div>"
		+						"</td>"
		+					"</tr>"
		+				"</table>"
		 // ============================================== MODAL CARI DETAIL PEMBELIAN =========================================== 
		+	"<div class='modal fade' id='modal-crdetail"+nextform+"'>"
		+	    "<div class='modal-dialog modal-xl'>"
		+	      "<div class='modal-content'>"
		+	        "<div class='modal-header'>"
		+	          "<h5 class='modal-title'>Cari Detail Pembelian</h5>"
		+	          "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
		+	            "<span aria-hidden='true'>&times;</span>"
		+	          "</button>"
		+	        "</div>"
		+	        "<div class='modal-body'>"
		+	        	"<table id='caridetail"+nextform+"' class='table table-sm table-bordered table-hover dataTable' role='grid'>"
		+	        		"<thead>"
		+	        			"<tr>"
		+		        			"<th>Nota Dtl Beli</th>"
		+		        			"<th>Nama Barang</th>"
		+		        			"<th>Nama Group</th>"
		+		        			"<th>Barang Akt</th>"
		+		        			"<th>PPN</th>"
		+		        			"<th>Sub Total</th>"
		+		        			"<th>Total Hrg</th>"
		+	        			"</tr>"
		+	        		"</thead>"
		+	        		"<tbody>"
		+	        		"<?php foreach ($get_dtlbeli as $a) { ?>"
		+	        			"<tr id='pilih_detail"+nextform+"'"
		+							"cid_dtl_pembelian ='<?php echo $a->id_dtl_pembelian?>'"
		+							"cid_barang ='<?php echo $a->id_barang?>'"
		+							"cnm_barang ='<?php echo $a->nm_barang?>'"
		+							"cid_group ='<?php echo $a->id_group?>'"
		+							"cnm_group ='<?php echo $a->nm_group?>'"
		+							"cid_sat1 ='<?php echo $a->sat1_barang?>'"
		+							"cnm_satuan1 ='<?php echo $a->nm_satuan1?>'"
		+							"cid_sat2 ='<?php echo $a->sat2_barang?>'"
		+							"cnm_satuan2 ='<?php echo $a->nm_satuan2?>'"
		+							"chrg_renc_beli ='<?php echo $a->hrg_renc_beli?>'"
		+							"cid_jnsbrngakt ='<?php echo $a->id_jnsbrngakt?>'"
		+							"cno_jnsbrngakt ='<?php echo $a->no_jnsbrngakt?>'"
		+							"cppn_dtl_beli ='<?php echo $a->ppn_dtl_beli?>'"
		+							"ctotal_dtl_beli ='<?php echo $a->total_dtl_beli?>'"
		+							"ctotalhrg_dtl_beli ='<?php echo $a->totalhrg_dtl_beli?>'"
		+	        			">"
		+	        				"<td><?php echo $a->nota_dtl_beli?></td>"
		+	        				"<td><b>[<?php echo $a->id_barang?>]</b> <?php echo $a->nm_barang?></td>"
		+	        				"<td><?php echo $a->nm_group?></td>"
		+	        				"<td><b>[<?php echo $a->no_jnsbrngakt?>]</b> <?php echo $a->nm_jnsbrngakt?> </td>"
		+	        				"<td><?php echo $a->ppn_dtl_beli?></td>"
		+	        				"<td><?php echo $a->total_dtl_beli?></td>"
		+	        				"<td><?php echo $a->totalhrg_dtl_beli?></td>"
		+	        			"</tr>"
		+		        	"<?php } ?>"
		+	        		"</tbody>"
		+	        	"</table>"
		+	        "</div>"
		+	        "<div class='modal-footer justify-content-between' style='font-size: 11pt;'>"
		+	          "<b><i>* Pilih detail pembelian dengan cara klik pada kolom data</i></b>"
		+	        "</div>"
		+	      "</div>"
		+	    "</div>"
		+	 "</div>"
		 // ==================================================================================================================== 

		);
		// set id dengan id baru
		document.getElementById("id_dtl_beli").id 		= "id_dtl_beli"+nextform;
		document.getElementById("id_brng").id 			= "id_brng"+nextform;
		document.getElementById("nm_brng").id 			= "nm_brng"+nextform;
		document.getElementById("id_grup").id 			= "id_grup"+nextform;
		document.getElementById("nm_grup").id 			= "nm_grup"+nextform;
		document.getElementById("sat1").id 				= "sat1"+nextform;
		document.getElementById("nm_satuan1").id 		= "nm_satuan1"+nextform;
		document.getElementById("sat2").id 				= "sat2"+nextform;
		document.getElementById("harga_dtlterima").id 	= "harga_dtlterima"+nextform;
		document.getElementById("nm_satuan2").id 		= "nm_satuan2"+nextform;
		document.getElementById("id_jbakt").id 			= "id_jbakt"+nextform;
		document.getElementById("no_jbakt").id 			= "no_jbakt"+nextform;
		document.getElementById("ppn_dtl").id 			= "ppn_dtl"+nextform;
		document.getElementById("subttl_dtl").id 		= "subttl_dtl"+nextform;
		document.getElementById("tothrg_dtl").id 		= "tothrg_dtl"+nextform;
		/*          ================================= MODAL CARI DETAIL ========================================*/
		$(document).ready(function(){
			// tabel no permintaan
			$(function () {
				$("#caridetail"+nextform).DataTable({
				  "deferRender" : true,
				  "processing"  : true,
				  "order"       : [],
				});
			});
			// get datatabel no permintaan 
			$(document).on('click', '#pilih_detail'+nextform, function (e) {
				document.getElementById("id_dtl_beli"+nextform).value 		= $(this).attr('cid_dtl_pembelian');
				document.getElementById("id_brng"+nextform).value 			= $(this).attr('cid_barang');
				document.getElementById("nm_brng"+nextform).value 			= $(this).attr('cnm_barang');
				document.getElementById("id_grup"+nextform).value 			= $(this).attr('cid_group');
				document.getElementById("nm_grup"+nextform).value 			= $(this).attr('cnm_group');
				document.getElementById("sat1"+nextform).value 				= $(this).attr('cid_sat1');
				document.getElementById("nm_satuan1"+nextform).value 		= $(this).attr('cnm_satuan1');
				document.getElementById("sat2"+nextform).value 				= $(this).attr('cid_sat2');
				document.getElementById("nm_satuan2"+nextform).value 		= $(this).attr('cnm_satuan2');
				document.getElementById("harga_dtlterima"+nextform).value 	= $(this).attr('chrg_renc_beli');
				document.getElementById("id_jbakt"+nextform).value 			= $(this).attr('cid_jnsbrngakt');
				document.getElementById("no_jbakt"+nextform).value 			= $(this).attr('cno_jnsbrngakt');
				document.getElementById("ppn_dtl"+nextform).value 			= $(this).attr('cppn_dtl_beli');
				document.getElementById("subttl_dtl"+nextform).value 		= $(this).attr('ctotal_dtl_beli');
				document.getElementById("tothrg_dtl"+nextform).value 		= $(this).attr('ctotalhrg_dtl_beli');
				$('#modal-crdetail'+nextform).modal('hide');
				totaltrm();
			});
		});


	/*          =============================== END =====================================*/
 function totaltrm(){
    	var subtotal    = parseFloat($('#subttl_dtl'+nextform).val()) || 0;
    	var ppn 		= parseFloat((subtotal * 10)/100);
    	var total 		= parseFloat(subtotal+ppn);

    	$('#subttl_dtl'+nextform).val(subtotal);
        $('#ppn_dtl'+nextform).val(ppn);
    	$('#tothrg_dtl'+nextform).val(total);
        // jumlah total
        var arr1 = document.getElementsByName('sub_trm[]');
	    var tot1 = 0;
	    for(var i=0;i<arr1.length;i++){
	        if(parseFloat(arr1[i].value))
	            tot1 += parseFloat(arr1[i].value);
	    }
    	document.getElementById('subtottrm').value = tot1;

	    var arr2 = document.getElementsByName('ppn_trm[]');
	    var tot2 = 0;
	    for(var i=0;i<arr2.length;i++){
	        if(parseFloat(arr2[i].value))
	            tot2 += parseFloat(arr2[i].value);
	    }
    	document.getElementById('totppntrm').value = tot2;

	    var arr3 = document.getElementsByName('tot_hrg_trm[]');
	    var tot3 = 0;
	    for(var i=0;i<arr3.length;i++){
	        if(parseFloat(arr3[i].value))
	            tot3 += parseFloat(arr3[i].value);
	    }
    	document.getElementById('tothrgtrm').value = tot3;
    }

		$("#dtlterima").val(nextform); // Ubah value textbox jmlorderwoff dengan variabel nextform	
		});

		// Buat fungsi untuk mereset form ke semula
		$("#reset-detailterima").click(function() {
			var s = confirm("Yakin Reset?");
			if(s){
		     $("#insert-detailterima").html(""); // Kita kosongkan isi dari div insert-form
		     $("#dtlterima").val("1"); // Ubah kembali value jumlah form menjadi 1
		     $("#subtottrm").val(""); 	     
		     $("#totppntrm").val(""); 	     
		     $("#tothrgtrm").val(""); 	   
		    }else{
		   	 return false;
		    }
		}); 
    });
</script>
