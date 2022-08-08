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
		function ambil(xid) {
		    var id = xid;
		    swal({
		        title: 'Apakah anda yakin ?',
		        text: 'Data pelamar tersebut akan di pindahkan dari Kandidat UMUM ke kandidat OS ',
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
			            url : "<?=site_url('os/umum/xambil')?>/"+id,
			            type: "POST",
			            dataType: "JSON",
			            success: function(data) {
			                swal({
			                    title:"Success",
			                    text: "Sukses memindahkan data kandidat",
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
			                    text: "Gagal melakukan pemindahan kandidat",
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
								<h6 class="panel-title">Mohon pastikan kembali isi dara file csv yang akan di upload <b>Download contoh format csv yang benar</b></h6>
							
							</div>

							<!-- <div class="panel-body">
								Informasi :
							</div> -->
							 <div class="row">
        <!-- Import link --> <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; } ?></div>
    </div>
    <?php if(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
					        <div class="col-md-12 head">
					            <div class="float-right">
					                <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
					            </div>
					        </div>
							
					        <!-- File upload form -->
					        <div class="col-md-12" id="importFrm" style="display: none;">
					            <form action="<?php echo base_url('os/upload_data'); ?>" method="post" enctype="multipart/form-data">
					                <input type="file" name="file" />
					                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
					            </form>
					        </div>

					        <table class="table table-striped table-bordered">
					            <thead class="thead-dark">
					                <tr>
					                    <th>#NIK</th>
					                    <th>Name</th>
					                    <th>Alamat</th>
					                    <th>Phone</th>
					                    <th>Status</th>
					                </tr>
					            </thead>
					            <tbody>
					                <?php if(!empty($imported_data)){ for($i = 0; $i < count($imported_data);$i++){ ?>
					                <tr>
					                    <td><?php echo $imported_data[$i]['biodata_nik']; ?></td>
					                    <td><?php echo $imported_data[$i]['biodata_nama']; ?></td>
					                    <td><?php echo $imported_data[$i]['biodata_alamat']; ?></td>
					                    <td><?php echo $imported_data[$i]['biodata_nohp1']; ?></td>
					                    <td><?php echo $imported_data[$i]['status_upload']; ?></td>
					                </tr>
					                <?php } }else{ ?>
					                <tr><td colspan="5">No member(s) found...</td></tr>
					                <?php } ?>
					            </tbody>
					        </table>
					    </div>
					</div>
						
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
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
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
            "url": "<?php echo site_url('os/umum/ajax_umum')?>",
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
 