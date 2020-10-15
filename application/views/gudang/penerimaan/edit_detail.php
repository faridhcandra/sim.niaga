<!-- Main content --> 
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-dark">
					<div class="card-header">
						<h3 class="card-title">Edit Detail Data Penerimaan</h3>
					</div>
					<div class="card-body">
					<?php foreach ($isi as $key => $row): ?>
					<?php echo validation_errors();?>
					<?php echo form_open('gudang/dtlpenerimaan_u/'.$row->id_dtl_penerimaan);?>
					<table width="100%">
							<tr>
								<td width="11%" valign="top"><label style="font-size: 11pt;">ID dtl Beli</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<div class="input-group-prepend">						
											<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#emodal-crdetail">Cari</button>
											<input class="form-control form-control-sm" type="text" name="id_dtl_pembelian[]" id="eid_dtl_beli" value="<?php echo $row->id_dtl_pembelian?>" required="" readonly="">
											<input class="form-control form-control-sm" type="text" name="id_dtl_penerimaan[]" id="eid_dtl_terima" value="<?php echo $row->id_dtl_penerimaan?>" required="" readonly="">
											<input class="form-control form-control-sm" type="text" name="id_penerimaan[]" id="eid_terima" value="<?php echo $row->id_penerimaan?>" required="" readonly="">
										</div>
									</div>
								</div>
								</td>
		  						<td valign="top" hidden=""><label style="font-size: 11pt;">Tgl dtl Trm</label></td>			
		 						<td>
		 							<div class="col-md-8" hidden="">
		 								<div class="form-group">
		 									<input class="form-control form-control-sm" type="date" name="tgl_dttrm[]" required="" value="<?php echo $row->tgl_dtlterima?>" >
		 								</div>
		 							</div>		
		 						</td>
								<td valign="top"><label style="font-size: 11pt;">Kode Akt</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="id_jbrngakt[]" id="eid_jbakt" value="<?php echo $row->id_jnsbrngakt?>" required="" hidden="">
											<input class="form-control form-control-sm" type="text" name="no_jbrngakt[]" id="eno_jbakt" value="<?php echo $row->no_jnsbrngakt?>" required="" readonly="">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">ID barang</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="id_barang[]" id="eid_brng" value="<?php echo $row->id_barang?>" required="" readonly="">
										</div>
									</div>	
								</td>
								<td valign="top"><label style="font-size: 11pt;">Nama barang</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="nm_barang[]" id="enm_brng" value="<?php echo $row->nm_barang?>" required="" readonly="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Group</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" id="enm_grup" value="<?php echo $row->nm_group?>" required="" readonly="">
											<input class="form-control form-control-sm" type="text" id="eid_grup" name="id_group[]" value="<?php echo $row->id_group?>" required="" hidden="">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Jumlah 1</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="jml1[]" value="<?php echo $row->jml1_dtlterima?>" required="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Satuan 1</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" id="enm_satuan1" value="<?php echo $row->nm_satuan1?>" required="" readonly="">
											<input class="form-control form-control-sm" type="text" id="esat1" name="sat1[]" value="<?php echo $row->sat1_dtlterima?>" required="" hidden="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Harga</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" id="eharga_dtlterima" name="harga_dtlterima[]" value="<?php echo $row->harga_dtlterima?>" required="" readonly="">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">Jumlah 2</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="jml2[]" value="<?php echo $row->jml2_dtlterima?>" required="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Satuan 2</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" id="enm_satuan2" value="<?php echo $row->nm_satuan2?>" required="" readonly="">
											<input class="form-control form-control-sm" type="text" id="esat2" name="sat2[]" value="<?php echo $row->sat2_dtlterima?>" required="" hidden="">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top"><label style="font-size: 11pt;">PPN dtl Trm</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="ppn_trm[]" id="eppn_dtl" value="<?php echo $row->ppn_dtlterima?>" required="" readonly="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Subtotal dtl Trm</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="sub_trm[]" id="esubttl_dtl" value="<?php echo $row->subtotal_dtlterima?>" required="" readonly="">
										</div>
									</div>
								</td>
								<td valign="top"><label style="font-size: 11pt;">Tot Hrg Trm</label></td>
								<td>
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control form-control-sm" type="text" name="tot_hrg_trm[]" id="etothrg_dtl" value="<?php echo $row->totalharga_dtlterima?>" required="" readonly="">
										</div>
									</div>
								</td>
							</tr>
						</table>
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group float-right">
									<a href="<?php echo site_url('gudang/v_dtl_terima/'.$row->id_penerimaan);?>" class="btn btn-secondary btn-sm" onclick="return confirm('Yakin Cancel ?')">Batal</a> 
									<input type="submit" class="btn btn-primary btn-sm toaster" value="Simpan">
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal  -->
 <!-- ============================================== MODAL CARI DETAIL PEMBELIAN ===========================================  -->
			<div class="modal fade" id="emodal-crdetail">
			    <div class="modal-dialog modal-xl">
			      <div class="modal-content">
			        <div class="modal-header">
			          <h5 class="modal-title">Cari Detail Pembelian</h5>
			          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			            <span aria-hidden="true">&times;</span>
			          </button>
			        </div>
			        <div class="modal-body">
			        	<table id="ecaridetail" class="table table-sm table-bordered table-responsive-md table-hover dataTable" role="grid">
			        		<thead>
			        			<tr>
				        			<th>Nota Dtl Beli</th>
				        			<th>Nama Barang</th>
				        			<th>Nama Group</th>
				        			<th>Barang Akt</th>
				        			<th>PPN</th>
				        			<th>Sub Total</th>
				        			<th>Total Hrg</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        		<?php foreach ($get_dtlbeli as $a) { ?>
			        			<tr id="epilih_detail"
									cid_dtl_pembelian ="<?php echo $a->id_dtl_pembelian?>"
									cid_barang ="<?php echo $a->id_barang?>"
									cnm_barang ="<?php echo $a->nm_barang?>"
									cid_group ="<?php echo $a->id_group?>"
									cnm_group ="<?php echo $a->nm_group?>"
									cid_sat1 ="<?php echo $a->sat1_barang?>"
									cnm_satuan1 ="<?php echo $a->nm_satuan1?>"
									cid_sat2 ="<?php echo $a->sat2_barang?>"
									cnm_satuan2 ="<?php echo $a->nm_satuan2?>"
									chrg_renc_beli ="<?php echo $a->hrg_renc_beli?>"
									cid_jnsbrngakt ="<?php echo $a->id_jnsbrngakt?>"
									cno_jnsbrngakt ="<?php echo $a->no_jnsbrngakt?>"
									cppn_dtl_beli ="<?php echo $a->ppn_dtl_beli?>"
									ctotal_dtl_beli ="<?php echo $a->total_dtl_beli?>"
									ctotalhrg_dtl_beli ="<?php echo $a->totalhrg_dtl_beli?>"
			        			>
			        				<td><?php echo $a->nota_dtl_beli?></td>
			        				<td><b>[<?php echo $a->id_barang?>]</b> <?php echo $a->nm_barang?></td>
			        				<td><?php echo $a->nm_group?></td>
			        				<td><b>[<?php echo $a->no_jnsbrngakt?>]</b> <?php echo $a->nm_jnsbrngakt?> </td>
			        				<td><?php echo $a->ppn_dtl_beli?></td>
			        				<td><?php echo $a->total_dtl_beli?></td>
			        				<td><?php echo $a->totalhrg_dtl_beli?></td>
			        			</tr>
				        	<?php } ?>
			        		</tbody>
			        	</table>
			        </div>
			        <div class="modal-footer justify-content-between" style="font-size: 11pt;">
			          <b><i>* Pilih detail pembelian dengan cara klik pada kolom data</i></b>
			        </div>
			      </div>
			    </div>
			 </div>
<!--  /.modal  -->

<script type="text/javascript">
	
    $(document).ready(function(){
			// get datatabel no permintaan 
			$(document).on('click', '#epilih_detail', function (e) {
				document.getElementById("eid_dtl_beli").value 		= $(this).attr('cid_dtl_pembelian');
				document.getElementById("eid_brng").value 			= $(this).attr('cid_barang');
				document.getElementById("enm_brng").value 			= $(this).attr('cnm_barang');
				document.getElementById("eid_grup").value 			= $(this).attr('cid_group');
				document.getElementById("enm_grup").value 			= $(this).attr('cnm_group');
				document.getElementById("esat1").value 				= $(this).attr('cid_sat1');
				document.getElementById("enm_satuan1").value 		= $(this).attr('cnm_satuan1');
				document.getElementById("esat2").value 				= $(this).attr('cid_sat2');
				document.getElementById("enm_satuan2").value 		= $(this).attr('cnm_satuan2');
				document.getElementById("eharga_dtlterima").value 	= $(this).attr('chrg_renc_beli');
				document.getElementById("eid_jbakt").value 			= $(this).attr('cid_jnsbrngakt');
				document.getElementById("eno_jbakt").value 			= $(this).attr('cno_jnsbrngakt');
				document.getElementById("eppn_dtl").value 			= $(this).attr('cppn_dtl_beli');
				document.getElementById("esubttl_dtl").value 		= $(this).attr('ctotal_dtl_beli');
				document.getElementById("etothrg_dtl").value 		= $(this).attr('ctotalhrg_dtl_beli');
				$('#emodal-crdetail').modal('hide');
				totaltrm();
			});

	/*          =============================== END =====================================*/
 function totaltrm(){
    	var subtotal    = parseFloat($('#esubttl_dtl').val()) || 0;
    	var ppn 		= parseFloat((subtotal * 10)/100);
    	var total 		= parseFloat(subtotal+ppn);

    	$('#esubttl_dtl').val(subtotal);
        $('#eppn_dtl').val(ppn);
    	$('#etothrg_dtl').val(total);
    }    

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
