<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/wizards/steps.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jasny_bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/validation/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/extensions/cookie.js"></script> 

<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/wizard_steps.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>


			<?php
			if ($this->session->flashdata('notification')) { ?>
				<script>
			    	swal({
			        	title: "Done",
			            text: "<?php echo $this->session->flashdata('notification'); ?>",
			            timer: 5000,
			            showConfirmButton: false,
			            type: 'success'
			       	});
			    </script>
			<?php
			}
			?>

			<?php 
			if ($this->session->flashdata('error')) { ?>
				<script>
					swal({
						title: "Error", 
						text: "<?php echo $this->session->flashdata('error');?>", 
						type: "error"
					});		
				</script>
			<?php
				}
			?>	
					
		<script>
		function hapusData(xid) {
		    var id = xid;
		    swal({
		        title: 'You Sure ?',
		        text: 'This data will be deleted !',
		        type: 'warning',
		        showCancelButton: true,
		        confirmButtonColor: '#3085d6',
		        cancelButtonColor: '#d33',
		        confirmButtonText: 'Yes',
		        cancelButtonText: 'No',
		        closeOnConfirm: true
		    }, function(isConfirm) {
		        if (!isConfirm) return;
			        $.ajax({
			            url : "<?=site_url('os/jurusan/xdelete')?>/"+id,
			            type: "POST",
			            dataType: "JSON",
			            success: function(data) {
			                swal({
			                    title:"Success",
			                    text: "Delete data success",
			                    showConfirmButton: false,
			                    type: "success",
			                    timer: 2000
			                });
			                reload_table();
			            },
			            error: function (jqXHR, textStatus, errorThrown) {
			                //alert('Error Hapus Data');
			                swal({
			                    title:"Error",
			                    text: "Data failed to delete",
			                    showConfirmButton: false,
			                    type: "error",
			                    timer: 2000
			                });
			            }
			        });
		    });

		}
		</script>

				<!-- User content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-info alert-styled-left alert-bordered">
					<span class="text-bold text-danger"><h6><b>Mohon pergunakan data tersebut sesuai dengan peruntukannya</b></h6></span> 
				
				</div>
						<!-- Basic responsive configuration -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><b><?=strtoupper($title_subheader);?></b></h5>
							
								
							</div>

							<!-- <div class="panel-body">
								Informasi :
							</div> -->
							<table id="tableData" class="table table-xs datatable-responsive">
								<thead>
									<tr class="bg-teal">
									<th>No</th>
					               <th>NIK</th>
					               <th>Nama</th>
					               <th>Tempat tanggal lahir</th>
					               <th>Alamat</th>
					               <th>Catatan</th>
					               <th>Tanggal Transfer</th>
					               <th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;
										foreach ($data_transaksi as $data_r) { ?>
											<tr>
												<td><?php echo $i++; ?>;</td>
												<td><?php echo $data_r->biodata_nik; ?></td>
												<td><?php echo $data_r->biodata_nama; ?></td>
												<td><?php echo $data_r->biodata_tempat_lahir.', '.$data_r->biodata_tanggal_lahir; ?></td>
												<td><?php echo $data_r->biodata_alamat; ?>;</td>
												<td><?php echo $data_r->keterangan; ?>;</td>
												<td><?php echo $data_r->datetime_insert; ?>;</td>
												<td>
													<a href="<?php echo site_url('hr/dataos/xdetail/'.base64_encode($data_r->biodata_id)) ?>" title="Detail Data" class="text-center text-success"><i class="icon-pencil7"></i></a>

													
												</td>
											</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
						<!-- /basic responsive configuration -->
					</div>
					
				</div>
				<div id="addModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h6 class="modal-title"><i class="icon-add"></i> Transfer dari Cakap ke Koperasi</h6>
							</div>
								<form action="<?php echo site_url('os/data_transfer/proses');?>" method="POST">
									<div class="panel panel-flat">
										<div class="panel-heading">
									
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label><b>Kandidat Cakap :</b></label>
												<select class="select" name="biodata_id" required>
													<option value="">Silahkan pilih kandidat</option>
													<?php 
													foreach ($kandidat_cakap as $r) { ?>
														<option value="<?php echo $r->biodata_id; ?>"><?php echo $r->biodata_nik.' - '.$r->biodata_nama.' - '.$r->biodata_tempat_lahir.', '.$r->biodata_tanggal_lahir; ?></option>
												<?php
													}
												?>
												</select>
											</div>
										
											<div class="form-group">
												<label><b>Catatan :</b></label>
												<textarea  name="catatan" required class="form-control"></textarea>

											
										<br>

											<div class="text-right">
												<button type="button" class="btn btn-save" data-dismiss="modal">Close</button>
												<button type="submit"  class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
											</div>
										</div>
									</div>
								</form>>
						
						</div>
					</div>
				</div>
				<!-- /user content -->

<script type="text/javascript">

function reload_table() {
    table.ajax.reload(null,false);
}

var table;
$(document).ready(function() {
 
    //datatables
    table = $('#tableData').DataTable();
 
});
</script>
 