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
	




<!-- User profile -->
<div class="row">

	<div class="alert alert-info alert-styled-left alert-bordered">
					<span class="text-bold text-danger"><h5><b>INFORMASI SEBELUM PENGISIAN </b></h5></span> 
					<ol>
						<li>Data kandidat yang muncul hanya yang berstatus <span class="text-danger text-bold">LOLOS dan KERJA, BELUM TEST</span></li>
						<li>Data yang sudah pernah diajukan tidak akan tampil di pencarian data</li>
						<li>Data yang sudah di input namun belum di ajukan, akan berstatus <span class="text-danger text-bold">DRAFT</span></li>
					
					</ol>
				</div>
	<div class="col-lg-4">
		<div class="panel">
					<div class="panel-body">
						<h4 class="text-center content-group-lg">
							Pencarian Data Kandidat
							<small class="display-block">Mohon masukkan kata kunci pencarian seperti : NIK, NAMA, ALAMAT, KOTA, POSISI dll</small>
						</h4>

						<form action="" method="get" class="main-search">
							<div class="input-group content-group">
								<div class="has-feedback has-feedback-left">
									<input type="text" name="search" value="<?php echo $search; ?>" class="form-control input-xlg" placeholder="NIK, NAMA, ALAMAT, KOTA, POSISI dll">
									<div class="form-control-feedback">
										<i class="icon-search4 text-muted text-size-base"></i>
									</div>
								</div>

								<div class="input-group-btn">
									<button type="submit" class="btn btn-primary btn-xlg">Search</button>
								</div>
							</div>

						</form>

					</div>
					<?php
						if (count($search_data) ==0 )
						{ ?>
							<div class="sidebar-category">
								<div class="category-title">
									<span class="text-danger">Data Tidak Ditemukan</span>
									<ul class="icons-list">
										<li><a href="#" data-action="collapse"></a></li>
									</ul>
								</div>

							</div>
					<?php
						}else{ ?>
							<div class="sidebar-category">
								<div class="category-title">
									<span>Data Ditemukan</span>
									<ul class="icons-list">
										<li><a href="#" data-action="collapse"></a></li>
									</ul>
								</div>

								<div class="category-content">
									<?php 
										foreach ($search_data as $key) { ?>
											<div class="panel invoice-grid">
												<div class="panel-body">
													<div class="row">
														<div class="col-sm-8">
															<h6 class="text-semibold no-margin-top"><?php echo $key->biodata_nama; ?></h6>
															<ul class="list list-unstyled">
																<li>NIK : &nbsp;<?php echo $key->biodata_nik; ?></li>
																<li>Posisi : <span class="text-semibold"><?php echo $key->posisi_nama; ?></span></li>
															</ul>
														</div>

														<div class="col-sm-4">
															<h6 class="text-semibold text-right no-margin-top"><?php echo $key->kabupaten_nama; ?></h6>
															<ul class="list list-unstyled text-right">
																<li>IQ: <span class="text-semibold"><?php echo $key->test_iq; ?></span></li>
																<li class="dropdown">
																	Status: &nbsp;
																	<a  class="label bg-success-400 dropdown-toggle" data-toggle="dropdown">LOLOS </a>
																
																</li>
															</ul>
														</div>
													</div>
												</div>

												<div class="panel-footer">
													<ul>
														<li><span class="status-mark border-success position-left"></span> Tanggal Lahir: <span class="text-semibold">02-09-1995</span></li>
													</ul>

													<ul class="pull-right">
														<form action="<?php echo site_url('os/upload/add_detail_from_add') ?>" method="POST" class="main-search">
															<input type="hidden" name="upload_id" value="<?php echo  base64_decode(scriptHTMLtags($this->uri->segment(4))); ?>">
															<input type="hidden" name="biodata_id" value="<?php echo $key->biodata_id; ?>">
															<button type="submit" class="btn btn-primary btn-labeled btn-xs"><b><i class="icon-add"></i></b>Tambah</a></button>
														</form>
														
														
													</ul>
												</div>
											</div>
									<?php
										}
									?>
								</div>
							</div>
					<?php
						}
					 ?>
					
				</div>
				</div>
	<div class="col-lg-8">
		<div class="panel panel-flat">
				<div class="panel-heading">
								<button type="button" data-toggle="modal" data-target="#AddModal" class="btn btn-success btn-labeled btn-xs" title="Pilih Kandidat"><b><i class="icon-user"></i></b>Cek Kandidat Available</button>
						</div>
			<table id="tableData" class="table table-xs datatable-responsive">
				<thead>
					<tr class="bg-teal">
					<th>No</th>
	               <th>NIK</th>
	               <th>Nama</th>
	               <th>Alamat</th>
	               <th>Kota</th>
	               <th>Posisi</th>
	               <th>Keterangan</th>
					<!-- <th width="7%">Aksi</th> -->
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="7" align="center">No Data Found</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

		


<div id="AddModal" class="modal fade">
												<div class="modal-dialog modal-full">
													<div class="modal-content">
									<div class="modal-header bg-teal">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h6 class="modal-title"><i class="icon-users"></i>&nbsp;&nbsp;<b>Pilih Kandidat</b></h6>
									</div>
									<div class="panel panel-flat">
			
						<table id="tableData2" class="table table-xs datatable-responsive">
							<thead>
								<tr class="bg-primary">
								<th>No</th>
				               <th>NIK</th>
				               <th>Nama</th>
				              <!--  <th>Alamat</th> -->
				               <th>Kota</th>
				               <th>Posisi</th>
				               <th>Status</th>
							   <th>Keterangan</th>
						
								</tr>
							</thead>
							<tbody>
								<?php 
									if (count($list_kandidat) ==0)
									{ ?>
										<tr>
											<td colspan="7" align="center">No Data Found</td>
										</tr>
								<?php
									}else{
										$no =1;
										foreach ($list_kandidat as $key) { ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $key->biodata_nik; ?></td>
												<td><?php echo $key->biodata_nama; ?></td>
												<!-- <td><?php echo $key->biodata_alamat; ?></td> -->
												<td><?php echo $key->kabupaten_nama; ?></td>
												<td><?php echo $key->posisi_nama; ?></td>
												<td>
													<?php 
														if ($key->test_hasil == 0) {
															echo '<span class="label label-danger">TIDAK LOLOS</span>';
														}else if($key->test_hasil == 1){
															echo '<span class="label label-success">LOLOS</span>';
														}else if($key->test_hasil == 2){
															echo '<span class="label label-warning">KERJA, BELUM TES</span>';
														} else {
															echo '<span class="label label-danger">BELUM TES</span>';
														}
														
													?>
												</td>
												<td>
													<?php 
														if ($key->status_upload == '') {
															if ($key->test_hasil == 0 || $key->test_hasil == 1 || $key->test_hasil == 2) { 
																	if ($key->status_sortir == 0) {
																		echo 'Kategori sortir belum di isi';
																	} else { ?>
																		<form action="<?php echo site_url('os/upload/add_detail_from_add') ?>" method="POST" class="main-search">
																		<input type="hidden" name="upload_id" value="<?php echo  base64_decode(scriptHTMLtags($this->uri->segment(4))); ?>">
																		<input type="hidden" name="biodata_id" value="<?php echo $key->biodata_id; ?>">
																		<button  type="submit" class="btn btn-primary btn-labeled btn-xs"><b><i class="icon-add"></i></b>Tambah</a></button>
																	</form>
																<?php
																	}
																	
																} else {
																echo 'Silahkan tambahkan data psikotes terlebih dahulu';
															}
															
														}else if ($key->status_upload == '0') {
															echo 'Kandidat sudah di ajukan oleh '.$key->username_vendor.' pada tanggal '.$key->tgl_insert_upload;
														} else {
															echo 'Kandidat sudah di upload oleh '.$key->username_vendor.' pada tanggal '.$key->tgl_insert_upload;
														}
														
													?>
												</td>
												
											</tr>
									<?php
										}
									}
								?>
								
							</tbody>
						</table>

					</div>
								</div>
												</div>
											</div>
<script>
	 $('#tableData2').DataTable({ 
    });
	
</script>