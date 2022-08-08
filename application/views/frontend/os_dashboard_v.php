<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/dashboardx.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/sweetalert2.css">
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>

			<?php
			if ($this->session->flashdata('notification')) { ?>
				<script>
			    	swal({
			        	title: "Done",
			            text: "<?php echo $this->session->flashdata('notification'); ?>",
			            timer: 2500,
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

				<!-- Dashboard content -->
				<div class="row">
					<div class="col-lg-12">
						<!-- Quick stats boxes -->
						<div class="row">
							<div class="col-lg-3">

								<!-- Members online -->
								<div class="panel bg-teal-400">
									<div class="panel-body">
										<div class="heading-elements">
											<ul class="icons-list">
						                		<!-- <li><a data-action="reload"></a></li> -->
						                		<li><i class="icon-users4 icon-3x"></i></li>

						                	</ul>
					                	</div>
										<h3 class="no-margin" style="font-size: 30px;"><?php echo $total_pelamar ?></h3>
										<span style="font-size: 14px;">Total Pelamar , Tahun <?=$tahun;?></span>
										<div class="text-muted text-size-small">&nbsp;</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>
								<!-- /members online -->

							</div>

							<div class="col-lg-3">

								<!-- Current server load -->
								<div class="panel bg-pink-400">
									<div class="panel-body">
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><i class="icon-user-check icon-3x"></i></li>

						                	</ul>
					                	</div>

										<h3 class="no-margin" style="font-size: 30px;"><?php echo $total_sudahtes ?></h3>
										<span style="font-size: 14px;">Total Sudah Psikotes , Tahun <?=$tahun;?></span>
										<div class="text-muted text-size-small">&nbsp;</div>
									</div>

									<div id="server-load"></div>
								</div>
								<!-- /current server load -->

							</div>

							<div class="col-lg-3">

								<!-- Today's revenue -->
								<div class="panel bg-blue-400">
									<div class="panel-body">
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><i class="icon-man icon-3x"></i></li>
						                		 
						                	</ul>
					                	</div>
										<h3 class="no-margin" style="font-size: 30px;"><?php echo $total_laki ?></h3>
										<span style="font-size: 14px;">Total Laki -Laki , Tahun <?=$tahun;?></span>
										<div class="text-muted text-size-small">&nbsp;</div>
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

							</div>

							<div class="col-lg-3">

							<!-- Pelamar Perempuan -->
								<div class="panel bg-warning">
									<div class="panel-body">
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><i class="icon-woman icon-3x"></i></li>
						                	</ul>
					                	</div>
										<h3 class="no-margin" style="font-size: 30px;"><?php echo $total_perempuan ?></h3>
										<span style="font-size: 14px;">Total Perempuan , Tahun <?=$tahun;?> </span>
										<div class="text-muted text-size-small">&nbsp;</div>
									</div>
									
									<div id="new-visitors"></div>
								</div>
								<!-- /pelamar perempuan  -->								
							</div>
						</div>
						<!-- /quick stats boxes -->
						<?php
						//}	
						?>
						<!-- Table header teknik -->
						
					</div>
					
				</div>
					<div class="row">	
				<div class="col-lg-12">
					<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-users2"></i>&nbsp; <b>Data Pelamar Pada Bulan <i>(<?php echo date('F Y') ?>)</i> </b></h5>
							
							</div>

						<div class="panel-body">
								Di halaman dashboard ini hanya menampilkan data pelamar pada bulan ini</i>
							</div>
							
							<table id="tableData" class="table table-xxs datatable-responsive">
								<thead>
									<tr class="bg-teal">
										<th class="text-center">No</th>

										<th class="text-left">NIK</th>
										<th class="text-left">Nama</th>
										<th class="text-left">Jenis Kelamin</th>
										<th class="text-left">Alamat</th>
										<th class="text-center">Pendidikan Terakhir</th>
										<!-- <th class="text-center">Nama Sekolah</th> -->
										<th class="text-center">Status</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody >
								</tbody>
							</table>		
						</div>
						<!-- /table header teknik -->
				</div>		
			</div>	
				<!-- /dashboard content -->
		
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
            "url": "<?php echo site_url('os/dashboardos/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.

        "columnDefs": [
        { 
            "targets": [ 0,2,3,5,6,7], //first column / numbering column
            "orderable": false, //set not orderable
            "className": "text-center"
        },
        { 
            "targets": [ 1,4], //first column / numbering column
            "orderable": false, //set not orderable
            "className": "text-left"
        },
        ],
 
    });
 
});
</script>