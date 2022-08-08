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
			            url : "<?=site_url('hr/request_vendor/xdelete')?>/"+id,
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
						
						<!-- Basic responsive configuration -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-users2"></i>&nbsp; <b>Request Pelamar dari Vendor OS</b>
								<div class="heading-elements">
										<button type="button" data-toggle="modal" data-target="#FilterModal" class="btn btn-success btn-labeled btn-xs" title="Pilih Tahun PO"><b><i class="icon-select2"></i></b>Pilih Tanggal</button>
	                			</div>
								
							<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
						</div>
						<div class="panel-body" id="filtered">
					
						</div>
							<!-- <div class="panel-body">
								Informasi :
							</div> -->
							<table id="tableData" class="table table-xs datatable-responsive">
								<thead>
									<tr class="bg-teal">
								   <th>No</th>
								   <th>Dari Vendor</th>
								   <th>Nama Requestor</th>
					               <th>NIK Pelamar</th>
					               <th>Nama Pelamar</th>
					               <th>Catatan dari Vendor</th>
					               <th>Catatan dari HR</th>
					               <th>Tanggal Request</th>
					               <th>Status</th>
									<th width="7%">Aksi</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<!-- /basic responsive configuration -->
					</div>
					
				</div>
				<!-- /user content -->

<div id="FilterModal" class="modal fade">
												<div class="modal-dialog">
													<div class="modal-content">
									<div class="modal-header bg-teal">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h6 class="modal-title"><i class="icon-checkmark4"></i>&nbsp;&nbsp;Pilih Status Pelamar</h6>
									</div>

									<form id="frm_modal1" class="form-horizontal" >	
										<div class="modal-body">
											<div class="form-group">
												<div class="row">
													<div class="col-sm-12">
														<label class="text-semibold"> &nbsp;Pilih Tanggal Awal <span class="text-danger">*</span></label>
														<!-- <select name="xsts" id="xsts" data-placeholder="Pilih status..." class="bootstrap-select required" data-width="100%" required> -->
															<input type="text" name="tanggal_awal" readonly id="tanggal_awal" data-provide="datepicker" name="test_iq" class="form-control" >
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-sm-12">
														<label class="text-semibold"> &nbsp;Pilih Tanggal Akhir <span class="text-danger">*</span></label>
														<!-- <select name="xsts" id="xsts" data-placeholder="Pilih status..." class="bootstrap-select required" data-width="100%" required> -->
															<input type="text" name="tanggal_akhir" readonly id="tanggal_akhir" data-provide="datepicker" name="test_iq" class="form-control" >
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="modal-footer">
											<button type="submit"  data-dismiss="modal" id="btn-filter" class="btn btn-primary btn-xs btn-labeled"><b><i class="icon-select2"></i></b> Pilih</button>
											
											<button type="button" class="btn btn-danger btn-xs btn-labeled" data-dismiss="modal"><b><i class="icon-close2"></i></b> Tutup</button>
										</div>
									</form>
								</div>
												</div>
											</div>
<script type="text/javascript">

function reload_table() {
    table.ajax.reload(null,false);
}
$('#tanggal_awal').datepicker({
					format: "dd/mm/yyyy",
						autoclose:true
					 });
$('#tanggal_akhir').datepicker({
					format: "dd/mm/yyyy",
						autoclose:true
					 });

var table;
$(document).ready(function() {
 
    //datatables
    table = $('#tableData').DataTable({ 
    	"paging": true,
    	"destroy": true,
    	//"retrieve": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('hr/request_vendor/ajax_request_vendor')?>",
            "type": "POST",
            "data": function ( data ) {
                data.tanggal_awal = $('#tanggal_awal').val();
                data.tanggal_akhir = $('#tanggal_akhir').val();
            }
        },
 		
        "columnDefs": [
        { 
            "targets": [ 0,1,2,3,5,6,7,8], //first column / numbering column
            "orderable": false, //set not orderable
        }]
        //Set column definition initialisation properties.

 
    });
 $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
         $('#filtered').html('<b class="text-danger">Filter : '+ $('#tanggal_awal').val() +' sampai '+ $('#tanggal_akhir').val()+'</b>');
    });
});
</script>
 