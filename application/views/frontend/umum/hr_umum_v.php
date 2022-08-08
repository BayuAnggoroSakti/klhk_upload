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
					
		

				<!-- User content -->
				<div class="row">
					<div class="col-lg-12">
						
						<!-- Basic responsive configuration -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><b><?=strtoupper($title_subheader);?></b></h5>
								<h6 class="panel-title">Data yang masuk di bawah ini adalah Data pelamar yang sudah melewati <b>3 (tiga) hari belum dilakukan Tes</b></h6>
							
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
						               <th>Jenis Kelamin</th>
						               <th>Tempat Lahir</th>
						               <th>Alamat</th>
						               <th>Pendidikan</th>
						            	<th>Aksi</th>
									
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
<script src="<?php echo base_url();?>assets/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">

function reload_table() {
    table.ajax.reload(null,false);
}

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
            "url": "<?php echo site_url('hr/umum/ajax_umum')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0,1,2,3 ], //first column / numbering column
            "orderable": false, //set not orderable
            "className": "text-left"
        },
        ],
 
    });
 
});
</script>
 