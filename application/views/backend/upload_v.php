<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>

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
			            url : "<?=site_url('adm/sekolah/xdelete')?>/"+id,
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
	$(".file-styled").uniform({
        fileButtonHtml: '<i class="icon-googleplus5"></i>',
        wrapperClass: 'bg-warning'
    });
		</script>
<div class="row">

					<div class="col-md-4">

						<!-- Basic layout-->
						<form action="<?php echo base_url('adm/upload/proses'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Form Upload</h5>
									
								</div>

								<div class="panel-body">
									<div class="form-group">
										<label class="col-lg-3 control-label">UID :</label>
										<div class="col-lg-9">
											<input type="text" name="uid" class="form-control" placeholder="Masukkan UID modberry">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Endpoint :</label>
										<div class="col-lg-9">
											<input type="text" value="<?php echo $endpoint; ?>" name="endpoint" class="form-control" placeholder="Masukkan url / endpoint">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">Secret :</label>
										<div class="col-lg-9">
											<input type="text" value="<?php echo $secret; ?>" name="secret" class="form-control" placeholder="masukkan secret JWT">
										</div>
									</div>

									

									<div class="form-group">
										<label class="col-lg-3 control-label">Upload File:</label>
										<div class="col-lg-9">
											<input type="file" name="file" class="file-styled">
											<span class="help-block">Accepted formats: CSV</span>
										</div>
									</div>


									<div class="text-right">
										<input type="submit" class="btn btn-primary" name="importSubmit" value="Submit">
									
									</div>
								</div>
							</div>
						</form>
						<!-- /basic layout -->

					</div>
					<?php if($this->session->flashdata('notification')){ ?>

					<div class="col-md-8">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><b><?=$this->session->flashdata('msg')?></b></h5>
								<div class="heading-elements">
								
	                			</div>
								
							</div>

							<!-- <div class="panel-body">
								Informasi :
							</div> -->
							<table id="tableData" class="table table-xs datatable-responsive">
								<thead>
									<tr class="bg-teal">
								   <th>No</th>
					               <th>UID</th>
					               <th>Datetime</th>
								   <th>PH</th>
								   <th>COD</th>
								   <th>TSS</th>
								   <th>NH3N</th>
								   <th>DEBIT</th>
								   <th>RESPONSE</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
										foreach ($this->session->flashdata('data') as $row) { ?>
											<tr>
												<td><?php echo $i++;  ?></td>
												<td><?php echo $row['uid'] ?></td>
												<td><?php echo $row['datetime'] ?></td>
												<td><?php echo $row['pH'] ?></td>
												<td><?php echo $row['cod'] ?></td>
												<td><?php echo $row['tss'] ?></td>
												<td><?php echo $row['nh3n'] ?></td>
												<td><?php echo $row['debit'] ?></td>
												<td><?php echo $row['response'] ?></td>
											</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
<?php } ?>

					
				</div>

				<script>
					$(document).ready(function() {
					 
					    //datatables
					    table = $('#tableData').DataTable();
					 
					});
				</script>
				<!-- /user content -->


 