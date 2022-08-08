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
			            url : "<?=site_url('hr/dataumum/xdelete')?>/"+id,
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
								<h5 class="panel-title"><b><?=strtoupper($title_subheader);?></b></h5>
								
								
							</div>

							<!-- <div class="panel-body">
								Informasi :
							</div> -->
							<table id="tableData" class="table datatable-basic">
								<thead>
									<tr class="bg-teal">
									   <th>No</th>
						               <th>Kandidat</th>
						               <th>NIK</th>
						               <th>Nama</th>
						               <th>Jenis Kelamin</th>
						               <th>Tempat Lahir</th>
						               
						               <th>Pendidikan</th>
						               <th>Status Test</th>
						               <th>Posisi</th>
						              
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

<script type="text/javascript">

function reload_table() {
    table.ajax.reload(null,false);
}

var table;
$(document).ready(function() {
 
    
    table = $('#tableData').DataTable({ 
    	"paging": true,
    	"destroy": true,
    	//"retrieve": true,
        "processing": true, //Feature control the processing indicator.
        "language": {
            "processing": "Loading..."
        } ,
         "ordering": false,
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('hr/dataumum/ajax_dataumum')?>",
            "type": "POST"
        },
 		
 
 
    });
 
});
</script>
 