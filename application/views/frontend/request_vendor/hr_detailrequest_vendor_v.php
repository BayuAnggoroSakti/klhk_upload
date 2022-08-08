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
		<?php
		foreach ($dtuser as $u) {
			$biodata_id 	  = trim($u->ID_LAMARAN);
			$biodata_nama 		  = trim($u->NAMA);
			$biodata_nik 		  = trim($u->KTP);
			$biodata_jenis_kelamin 		  = trim($u->JNS_KELAMIN);
			$biodata_tanggal_lahir 		  = trim($u->D_LAHIR);
			$biodata_alamat 		  = trim($u->ALAMAT);
			$biodata_tempat_lahir 		  = trim($u->TEMPAT_LAHIR);
			$desa_nama 		  = trim($u->DESA);
			$kabupaten_nama 		  = trim($u->KOTA);
			$provinsi_nama 		  = trim($u->PROVINSI_ASAL);
			$kecamatan_nama 		  = trim($u->KECAMATAN);
			$biodata_rw 		  = trim($u->RW);
			$biodata_agama 		  = trim($u->AGAMA);
			$biodata_rt 		  = trim($u->RT);
			$biodata_pendidikan 		  = trim($u->PENDIDIKAN);
			$jurusan_nama 		  = trim($u->JURUSAN);
			$sekolah_nama 		  = trim($u->SEKOLAH);
			$biodata_nohp1 		  = trim($u->NO_HP);
			$biodata_nohp2 		  = trim($u->NO_HP);
			$biodata_status 		  = trim($u->STATUS);
		}		
	?>
	 
	</script>



<!-- User profile -->
<div class="row">

	<div class="col-lg-12">
		<div class="panel panel-primary panel-bordered">
							<div class="panel-heading">
								<h6 class="panel-title"><b>Mohon diberikan persetujuan untuk kirim pelamar tersebut</b></h6>
								
							<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

							<div class="panel-body">
								
								<table id="tableData" class="table table-xs datatable-responsive">
								<thead>
									<tr>
									   <th>No</th>
									   <th>Dari Vendor</th>
									   <th>User Vendor</th>
						               <th>Catatan Vendor</th>
						               <th>Catatan HR</th>
						               <th>Status</th>
						               <th>Tanggal Request</th>
						               <th>REC Keterangan </th>
						               <th>REC IQ </th>
						               <th>REC Psikotes Date </th>
									</tr>
								</thead>
								<tbody>
							
									<?php 
									$i=1;
										foreach ($request as $data) { ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $data->mitraos_nama; ?></td>
												<td><?php echo $data->user_name; ?></td>
												<td><?php echo $data->catatan_vendor; ?></td>
												<td><?php echo $data->catatan_hr; ?></td>
												<td>
													<?php 
													if ($data->status ==1) {
														echo '<span class="label label-success label-rounded"><b>Sudah Disetujui</b></span>';
													}elseif (($data->status ==2) ) {
														echo '<span class="label label-danger label-rounded"><b>Sudah Ditolak</b></span>';
													} else {
														echo '<span class="label label-warning label-rounded"><b>Belum di action</b></span>';
													}
													
												?>
												</td>
												<td><?php echo date('d-m-Y H:i:s',strtotime($data->kirim_vendor_create)); ?></td>
												<td><?php echo $data->rec_keterangan; ?></td>
												<td><?php echo $data->rec_iq; ?></td>
												<td><?php echo $data->rec_test_tanggal; ?></td>
											
											</tr>
										
									<?php
										}
									?>
								
								</tbody>
							</table>
							<form action="<?php echo site_url('hr/request_vendor/update_status');?>" method="POST">
									<div class="panel panel-flat">
										<div class="panel-heading">
											<!-- <h5 class="panel-title">Edit Test</h5>
										 -->
										</div>
										
										<div class="panel-body">
											<input type="hidden" name="kirim_vendor_id" value="<?php echo $request[0]->kirim_vendor_id ?>">
											<input type="hidden" name="status" value="1">
											
											<div class="form-group">
												<label><b>Perlu tes ulang di vendor :</b></label>
												<select required name="is_test" class="form-control">
													<option value="">Pilih</option>
													<option value="1">Perlu Tes</option>
													<option value="0">Tidak Perlu Tes</option>
												</select>
											</div>
											<div class="form-group">
												<label><b>Catatan :</b></label>
												<textarea required name="catatan_hr" class="form-control"></textarea>
											</div>

											
										<br>

											<div class="text-left">
												<?php 
													if ($request[0]->status ==1) {?>
															<button type="submit" value="2" name="submit" class="btn btn-danger btn-xs btn-icon">Batalkan <i class="icon-cancel-square"></i></button>
												<?php
													} elseif($request[0]->status ==2) {?>
														<button type="submit" value="1" name="submit" class="btn btn-danger btn-xs btn-icon">Setujui <i class="icon-cancel-square"></i></button>
												<?php
													}else
													{ ?>
															<button type="submit" name="submit" value="1" class="btn btn-success btn-xs btn-icon">Setujui <i class="icon-checkmark"></i></button>
															<button type="submit" value="2" name="submit" class="btn btn-danger btn-xs btn-icon">Tolak <i class="icon-cancel-square"></i></button>
												<?php	}
													
												?>
											
											</div>
										</div>
									</div>
								</form>
						
							</div>
						</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="tabbable">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="settings">

				<!-- Profile info -->
				<div class="panel panel-primary panel-bordered">

						<div class="panel-heading">
								<h6 class="panel-title"><b>Detail Pelamar</b></h6>
								
							<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
					<div class="panel-body">
						<form id="frm_tambah" action="<?php echo base_url('adm/jurusan/xupdate');?>" method="post" enctype="multipart/form-data">
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-5">
										<label>Biodata ID <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control text-danger text-semibold required" value="<?=$biodata_id;?>" required>
									</div>
								
									<div class="col-md-5">
										<label>NIK <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control  required" value="<?=$biodata_nik;?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									
									<div class="col-md-6">
										<label>Nama <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$biodata_nama;?>" required>
									</div>
									<div class="col-md-2">
										<label>Jenis Kelamin <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$biodata_jenis_kelamin;?>" required>
									</div>
									<div class="col-md-2">
										<label>Agama <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control  required" value="<?=$biodata_agama;?>" required>
									</div>
									<div class="col-md-2">
										<label>Tanggal Lahir <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?php echo date('d-m-Y',strtotime($biodata_tanggal_lahir)); ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Tempat Lahir <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control  required" value="<?=$biodata_tempat_lahir;?>" required>
									</div>
									<div class="col-md-7">
										<label>Alamat <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$biodata_alamat;?>" required>
									</div>
									<div class="col-md-1">
										<label>RT <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$biodata_rt;?>" required>
									</div>
									<div class="col-md-1">
										<label>RW <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$biodata_rw;?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Provinsi <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$provinsi_nama;?>" required>
									</div>
									<div class="col-md-3">
										<label>Kabupaten <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$kabupaten_nama;?>" required>
									</div>
									<div class="col-md-3">
										<label>Kecamatan <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$kecamatan_nama;?>" required>
									</div>
									<div class="col-md-3">
										<label>Desa <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control  required" value="<?=$desa_nama;?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label>Pendidikan <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control  required" value="<?=$biodata_pendidikan;?>" required>
									</div>
									<div class="col-md-5">
										<label>Sekolah / Kampus <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$sekolah_nama;?>" required>
									</div>
									<div class="col-md-5">
										<label>Jurusan <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$jurusan_nama;?>" required>
									</div>
									
								</div>
							</div>		
								
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>No HP 1 <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control  required" value="<?=$biodata_nohp1;?>" required>
									</div>
									<div class="col-md-6">
										<label>No HP 2 <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?=$biodata_nohp2;?>" required>
									</div>
								
								</div>
							</div>			
										
							<hr>
	                  <div class="text-right">
	                 
	                  	<a href="<?php echo base_url('hr/request_vendor');?>"><button type="button" class="btn btn-danger btn-labeled btn-rounded"><b><i class="icon-cross2"></i></b> Kembali</button></a>
	                  </div>
						</form>

				</div>
			</div>
		<!-- /profile info -->

			</div>
												
		</div>
	</div>
</div>
</div>



