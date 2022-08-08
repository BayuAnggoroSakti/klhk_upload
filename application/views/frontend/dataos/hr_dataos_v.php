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
			            url : "<?=site_url('hr/dataos/xdelete')?>/"+id,
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
							<table id="tableData" class="table table-xs datatable-responsive">
								<thead>
									<tr class="bg-teal">
									   <th>No</th>
									   <th>Mitra OS</th>
						               <th>NIK</th>
						               <th>Nama</th>
						               <th>Jenis Kelamin</th>
						               <th>Tempat tanggal lahir</th>				               
						               <th>Pendidikan</th>
						               <th>Status Test</th>
						              	<th>Tanggal Input</th>
									   <th width="7%">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<!-- 		<?php
									$i=1;
										foreach ($biodata as $data_r) { ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td>
													<?php
														  if (trim($data_r->biodata_kode) == 'C') {
												            echo 'CAKAP';
												         }
												         else if(trim($data_r->biodata_kode) == 'K')
												         {     
												            echo 'KOPERASI';    
												         }
												          else {
												            echo 'UNDEFINED';
												         }
													?>
												</td>
												<td><?php echo $data_r->biodata_nik; ?></td>
												<td><?php echo $data_r->biodata_nama; ?></td>
												<td><?php echo $data_r->biodata_jenis_kelamin; ?></td>
												<td><?php echo $data_r->biodata_tempat_lahir.', '.$data_r->biodata_tanggal_lahir; ?></td>
												<td><?php echo $data_r->biodata_pendidikan; ?></td>
												<td>
													<?php
														  if ($data_r->biodata_status==0) {
												            echo '<span class="label label-danger">Belum di Test</span>';
												         } elseif (($data_r->biodata_status==1)) {  
												            echo '<span class="label label-success">Sudah di Test</span>';
												         }
													?>
												</td>
												<td><?php echo $data_r->biodata_create; ?></td>
												<td>
													<?php
													$uid   = trim($data_r->biodata_id);
											         $uid2 = "'".$uid."'"; 
											         $link1  = site_url('hr/dataos/xdetail/'.base64_encode($uid));
													  if ($data_r->biodata_status==0) {
												           echo '<a href="'.$link1.'" title="Lihat Data" class="text-center text-success"><i class="icon-eye"></i></a>';
												         } elseif (($data_r->biodata_status==1)) {  
												            echo '<a href="'.$link1.'" title="Lihat Data" class="text-center text-success"><i class="icon-eye"></i></a>';
												         }
														
													?>
												</td>
											</tr>
									<?php
										}
									?> -->
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
            "url": "<?php echo site_url('hr/dataos/ajax_dataos')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0,1,2 ], //first column / numbering column
            "orderable": true, //set not orderable
            "className": "text-left"
        },
        ],
 
    });
 
});
</script>
 