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
						                		<li><i class="icon-user-check icon-3x"></i></li>

						                	</ul>
					                	</div>
										<h3 class="no-margin" style="font-size: 30px;"><?php echo $total_pelamar_tes ?></h3>
										<span style="font-size: 14px;">Total Pelamar Sudah Tes , Tahun <?=$tahun;?></span>
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
						                		<li><i class="icon-users2 icon-3x"></i></li>

						                	</ul>
					                	</div>

										<h3 class="no-margin" style="font-size: 30px;"><?php echo $total_koperasi ?></h3>
										<span style="font-size: 14px;">Total Pelamar Koperasi , Tahun <?=$tahun;?></span>
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
						                		<li><i class="icon-users2 icon-3x"></i></li>
						                		 
						                	</ul>
					                	</div>
									<h3 class="no-margin" style="font-size: 30px;"><?php echo $total_cakap ?></h3>
										<span style="font-size: 14px;">Total Pelamar Cakap , Tahun <?=$tahun;?></span>
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
						                		<li><i class="icon-users2 icon-3x"></i></li>
						                	</ul>
					                	</div>
									<h3 class="no-margin" style="font-size: 30px;"><?php echo $total_umum ?></h3>
										<span style="font-size: 14px;">Total Pelamar Umum , Tahun <?=$tahun;?></span>
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
				<div class="col-lg-6">
					<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-users2"></i>&nbsp; <b>TOP 10 Daftar Kota Pelamar </b></h5>
							
							</div>

						<div class="container-fluid">
								<div class="row">
									<div class="col-lg-4">
										<ul class="list-inline text-center">
											<li>
												<a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-alarm-add"></i></a>
											</li>
											<li class="text-left">
												<div class="text-semibold">Total Pelamar</div>
													<div class="text-danger text-center text-semibold"><?php echo $total_pelamar_all; ?></div>
											</li>
										</ul>

										<div class="col-lg-10 col-lg-offset-1">
											<div class="content-group" id="new-visitors"></div>
										</div>
									</div>

									<div class="col-lg-4">
										<ul class="list-inline text-center">
											<li>
												<a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-check"></i></a>
											</li>
											<li class="text-left">
												<div class="text-semibold">Total Sudah Tes</div>
													<div class="text-danger text-center text-semibold"><?php echo $total_pelamar_tes_all; ?></div>
											</li>
										</ul>

										<div class="col-lg-10 col-lg-offset-1">
											<div class="content-group" id="new-sessions"></div>
										</div>
									</div>

									<div class="col-lg-4">
										<ul class="list-inline text-center">
											<li>
												<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-stop"></i></a>
											</li>
											<li class="text-left">
												<div class="text-semibold">Total Belum Tes</div>
												<div class="text-danger text-center text-semibold"><?php echo $total_pelamar_belumtes_all; ?></div>
											</li>
										</ul>

										<div class="col-lg-10 col-lg-offset-1">
											<div class="content-group" id="total-not-yet"></div>
										</div>
									</div>
								</div>
							</div>
							
							<table id="tableData--" class="table table-xxs datatable-responsive">
								<thead>
									<tr class="bg-teal">
										<th class="text-center">No</th>

										<th class="text-left">Nama Kota</th>
										<th class="text-left">Laki - Laki</th>
										<th class="text-left">Perempuan</th>
										<th class="text-left">Total</th>
									
									</tr>
								</thead>
								<tbody >
									<?php
										$i=1;
										foreach ($top_kota as $data) { ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $data->kabupaten_nama ?></td>
												<td><?php echo $data->laki ?></td>
												<td><?php echo $data->perempuan ?></td>
												<td><?php echo $data->total ?></td>
											</tr>
									<?php
										}
									?>
								</tbody>
							</table>		
						</div>
						<!-- /table header teknik -->
				</div>	
				<div class="col-lg-6">
					<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-location4"></i>&nbsp; <b>Map Kota Pelamar</i> </b></h5>
							
							</div>

							
							<div id="map" style="width: 100%; height:450px">
								
							</div>		
						</div>
						<!-- /table header teknik -->
				</div>		
			</div>	
					<div class="row">	
				<div class="col-lg-12">
					<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-users2"></i>&nbsp; <b>Data Pelamar  <span class="text-danger">Koperasi</span> Pada Bulan <i>(<?php echo date('F Y') ?>)</i> </b></h5>
							
							</div>

						<div class="panel-body">
								Di halaman dashboard ini hanya menampilkan data pelamar koperasi pada bulan ini</i>
							</div>
							
							<table id="tableData_koperasi" class="table table-xxs datatable-responsive">
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
			
				<div class="row">	
				<div class="col-lg-12">
					<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-users2"></i>&nbsp; <b>Data Pelamar  <span class="text-danger">Cakap</span> Pada Bulan <i>(<?php echo date('F Y') ?>)</i> </b></h5>
							
							</div>

						<div class="panel-body">
								Di halaman dashboard ini hanya menampilkan data pelamar cakap pada bulan ini</i>
							</div>
							
							<table id="tableData_cakap" class="table table-xxs datatable-responsive">
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
				<div class="row">	
				<div class="col-lg-12">
					<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-users2"></i>&nbsp; <b>Data Pelamar <span class="text-danger">Umum</span> Pada Bulan <i>(<?php echo date('F Y') ?>)</i> </b></h5>
							
							</div>

						<div class="panel-body">
								Di halaman dashboard ini hanya menampilkan data pelamar umum pada bulan ini</i>
							</div>
							
							<table id="tableData_umum" class="table table-xxs datatable-responsive">
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
    table_koperasi.ajax.reload(null,false);
}

var table_koperasi;
$(document).ready(function() {
 
    //datatable_koperasis
    table_koperasi = $('#tableData_koperasi').DataTable({ 
    	"paging": true,
    	"destroy": true,
    	//"retrieve": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('hr/dashboardhr/ajax_list_koperasi')?>",
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

     table_cakap = $('#tableData_cakap').DataTable({ 
    	"paging": true,
    	"destroy": true,
    	//"retrieve": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('hr/dashboardhr/ajax_list_cakap')?>",
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

      table_umum = $('#tableData_umum').DataTable({ 
    	"paging": true,
    	"destroy": true,
    	//"retrieve": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('hr/dashboardhr/ajax_list_umum')?>",
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
   // var map = L.map('map',{
   //  center: [-6.8347283,110.823354],
   //  zoom: 5,
   //  // zoomControl: false ,
   //  // scrollWheelZoom: false
   //  });
   //  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
   //  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
   //  }).addTo(map);
   //  loadMarkers(<?php echo $this->uri->segment(3); ?>);
   //  var fg = L.featureGroup().addTo(map);
   //   function loadMarkers(loc) {
   //              $.get("<?php echo site_url('hr/dashboardhr/getLokasiPelamar') ?>", function(data){
   //                  fg.clearLayers();
   //                  $(data).each(function() {
                      
   //                     L.marker([ this.latitude,this.longitude ]).addTo(fg).bindPopup(this.biodata_nama );      
   //                              });
   //                          }, 'json');
            
   //          }
});


</script>