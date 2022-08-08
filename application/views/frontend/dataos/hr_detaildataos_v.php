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
			$biodata_id 	  = trim($u->biodata_id);
			$biodata_nama 		  = trim($u->biodata_nama);
			$mitraos_nama 		  = trim($u->mitraos_nama);
			$biodata_nik 		  = trim($u->biodata_nik);
			$biodata_jenis_kelamin 		  = trim($u->biodata_jenis_kelamin);
			$biodata_tanggal_lahir 		  = trim($u->biodata_tanggal_lahir);
			$biodata_tanggal_lahir = date('d-m-Y',strtotime($biodata_tanggal_lahir));
			$biodata_alamat 		  = trim($u->biodata_alamat);
			$biodata_tempat_lahir 		  = trim($u->biodata_tempat_lahir);
			$desa_nama 		  = trim($u->desa_nama);
			$kabupaten_nama 		  = trim($u->kabupaten_nama);
			$provinsi_nama 		  = trim($u->provinsi_nama);
			$kecamatan_nama 		  = trim($u->kecamatan_nama);
			$biodata_rw 		  = trim($u->biodata_rw);
			$biodata_agama 		  = trim($u->biodata_agama);
			$biodata_rt 		  = trim($u->biodata_rt);
			$biodata_pendidikan 		  = trim($u->biodata_pendidikan);
			$jurusan_nama 		  = trim($u->jurusan_nama);
			$sekolah_nama 		  = trim($u->sekolah_nama);
			$biodata_nohp1 		  = trim($u->biodata_nohp1);
			$biodata_nohp2 		  = trim($u->biodata_nohp2);
			$biodata_status 		  = trim($u->biodata_status);
			$biodata_create 		  = trim($u->biodata_create);
			$biodata_update 		  = trim($u->biodata_update);
			$nama_panggilan 		  = trim($u->nama_panggilan);
			$email 		  = trim($u->email);
			$golongan_darah 		  = trim($u->golongan_darah);
			$buta_warna 		  = trim($u->buta_warna);
			$warga_negara 		  = trim($u->warga_negara);
			$kodepos 		  = trim($u->kodepos);
			$tinggi_badan 		  = trim($u->tinggi_badan);
			$berat_badan 		  = trim($u->berat_badan);
			$status_perkawinan 		  = trim($u->status_perkawinan);
			$social_media 		  = trim($u->social_media);
			$fakultas_nama 		  = trim($u->fakultas_nama);
			if ($u->biodata_kode == '') {
				$mitraos_nama = 'UMUM';
			} 
			
		}		
	?>
	 
	</script>



<!-- User profile -->
<div class="row">
	<div class="col-lg-12">
		<div class="tabbable">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="settings">

				<!-- Profile info -->
				<div class="panel panel-primary panel-bordered">

					<div class="panel-heading">
						<!-- <div class="alert alert-info alert-styled-left alert-bordered">
							<span class="text-semibold">Informasi : </span> Input User Baru Non Peserta 
					   </div>											 -->
						<h6 class="panel-title text-semibold">Detail Biodata Pelamar OS - STATUS :
						<?php 
							if ($biodata_status ==1) {
								echo '<span class="label label-success" style="font-size : 14px;">SUDAH DI TES</span>';
							} else {
								echo '<span class="label label-danger" style="font-size : 14px;">BELUM DI TES</span>';
							}
							
						?>
						</h6>
						<h5> <span class="label label-warning" style="font-size : 14px;">
							<?php 
								echo $mitraos_nama;
							?>
						</span></h5>
					</div>
					
					<div class="panel-body">
					<form id="frm_tambah"  action="<?php echo base_url('os/dataos/xupdate');?>" method="post" enctype="multipart/form-data">
								<legend class="text-bold text-danger"><i class="icon-user-check"></i>&nbsp; Identitas Diri</legend>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label>Biodata ID <span class="text-danger">*</span></label>
										<input type="text" name="biodata_id" style="font-size: 14px;" readonly class="form-control text-danger text-semibold required" value="<?=$biodata_id;?>" required>
									</div>
									<div class="col-md-2">
										<input type="hidden" id="nik_old" name="nik_old" value="<?=$biodata_nik;?>">
										<label>NIK <span class="text-danger">*</span></label>
										<input id="nik"  disabled type="text" style="font-size: 14px;" name="biodata_nik" class="form-control  required" value="<?=$biodata_nik;?>" required>
										<div id="pesan"></div>
									</div>
									<div class="col-md-4">
										<label>Nama <span class="text-danger">*</span></label>
										<input  disabled type="text" name="biodata_nama" style="font-size: 14px;" class="form-control required" value="<?=$biodata_nama;?>" required>
									</div>
										<div class="col-md-4">
										<label>Nama Panggilan <span class="text-danger">*</span></label>
										<input  disabled type="text" name="nama_panggilan" style="font-size: 14px;" class="form-control required" value="<?=$nama_panggilan;?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									
								<div class="col-md-4">
										<label>Tanggal Lahir <span class="text-danger">*</span></label>
										<input disabled type="text" id="tanggal" style="font-size: 14px;" class="form-control required" name="biodata_tanggal_lahir" value="<?=$biodata_tanggal_lahir;?>" required>
									</div>
									<div class="col-md-4">
										<label>Tempat Lahir <span class="text-danger">*</span></label>
										<input disabled type="text" style="font-size: 14px;" class="form-control  required" name="biodata_tempat_lahir" value="<?=$biodata_tempat_lahir;?>" required>
									</div>
									<div class="col-md-4">
										<label>Jenis Kelamin <span class="text-danger">*</span></label>
										<input disabled type="text" style="font-size: 14px;" class="form-control" name="biodata_jenis_kelamin" value="<?=$biodata_jenis_kelamin;?>" >
									</div>
								
								
								</div>
							</div>
							<div class="form-group">
								<div class="row">
										<div class="col-md-4">
										<label>Agama <span class="text-danger">*</span></label>
											<input disabled type="text" style="font-size: 14px;" class="form-control" name="biodata_agama" value="<?=$biodata_agama;?>" >
										
									</div>
									<div class="col-md-4">
										<label>Warga Negara <span class="text-danger">*</span></label>
										<input disabled  type="text" value="<?php echo $warga_negara; ?>" required name="warga_negara" placeholder="enter your nationality" style="font-size: 14px;" class="form-control">
									</div>
									<div class="col-md-4">
										<label>Status Perkawinan <span class="text-danger">*</span></label>
											<input disabled type="text" style="font-size: 14px;" class="form-control" name="status_perkawinan" value="<?=$status_perkawinan;?>" >
									</div>
									
								</div>
							</div>
								<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Golongan Darah <span class="text-danger">*</span></label>
											<input disabled type="text" style="font-size: 14px;" class="form-control" name="golongan_darah" value="<?=$golongan_darah;?>" >
									</div>
									<div class="col-md-3">
										<label>Buta Warna <span class="text-danger">*</span></label>
										<input disabled type="text" style="font-size: 14px;" class="form-control" name="buta_warna" value="<?=$buta_warna;?>" >
									</div>
									<div class="col-md-3">
										<label>Tinggi Badan (cm) <span class="text-danger">*</span></label>
										<input  disabled  value="<?php echo $tinggi_badan; ?>" type="number" placeholder="Masukkan tinggi badan anda dalam (cm)" required name="tinggi_badan" style="font-size: 14px;" class="form-control" >
									</div>
										<div class="col-md-3">
										<label>Berat Badan (kg) <span class="text-danger">*</span></label>
										<input  disabled  value="<?php echo $berat_badan; ?>" type="number" placeholder="Masukkan berat badan anda dalam (kg)" required name="berat_badan" style="font-size: 14px;" class="form-control" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>No HP 1 <span class="text-danger">*</span></label>
										<input  disabled  value="<?php echo $biodata_nohp1; ?>" placeholder="Masukkan nomer hp 1" type="number" name="biodata_nohp1" style="font-size: 14px;" class="form-control  required" required>
									</div>
									<div class="col-md-3">
										<label>No HP 2</label>
										<input  disabled  value="<?php echo $biodata_nohp2; ?>" placeholder="Masukkan nomer hp 2 " type="number" name="biodata_nohp2" style="font-size: 14px;" class="form-control" >
									</div>
									<div class="col-md-3">
										<label>Email <span class="text-danger">*</span></label>
										<input  disabled  value="<?php echo $email; ?>" type="email" required placeholder="MasukkaN alamat email anda" name="email" style="font-size: 14px;" class="form-control" >
									</div>
									<div class="col-md-3">
										<label>Social Media</label>
										<input  disabled  value="<?php echo $social_media; ?>" type="text" placeholder="Nama Account Social Media (IG, FB, Twitter dll ) :" name="social_media" style="font-size: 14px;" class="form-control" >
									</div>
									
								</div>
							</div>	
							<legend class="text-bold text-danger"><i class="icon-home2"></i>&nbsp; Alamat</legend>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>Alamat <span class="text-danger">*</span></label>
										<input disabled type="text" style="font-size: 14px;" class="form-control required" name="biodata_alamat" value="<?=$biodata_alamat;?>" required>
									</div>
									<div class="col-md-2">
										<label>RT</label>
										<input disabled type="text" style="font-size: 14px;" class="form-control" name="biodata_rt" value="<?=$biodata_rt;?>">
									</div>
									<div class="col-md-2">
										<label>RW</label>
										<input disabled type="text" style="font-size: 14px;" class="form-control" name="biodata_rw" value="<?=$biodata_rw;?>" >
									</div>
									<div class="col-md-2">
										<label>Kodepos</label>
										<input disabled type="text" style="font-size: 14px;" class="form-control" name="kodepos" value="<?=$kodepos;?>" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Provinsi <span class="text-danger">*</span></label>
									<input disabled type="text" style="font-size: 14px;" class="form-control" name="provinsi_nama" value="<?=$provinsi_nama;?>" >
									</div>
									<div class="col-md-3">
										<label>Kabupaten <span class="text-danger">*</span></label>
										<input disabled type="text" style="font-size: 14px;" class="form-control" name="kabupaten_nama" value="<?=$kabupaten_nama;?>" >
									</div>
									<div class="col-md-3">
										<label>Kecamatan <span class="text-danger">*</span></label>
											<input disabled type="text" style="font-size: 14px;" class="form-control" name="kecamatan_nama" value="<?=$kecamatan_nama;?>" >
									</div>
									<div class="col-md-3">
										<label>Desa <span class="text-danger">*</span></label>
										<input disabled type="text" style="font-size: 14px;" class="form-control" name="desa_nama" value="<?=$desa_nama;?>" >
									</div>
								</div>
							</div>
							<legend class="text-bold text-danger"><i class="icon-office"></i>&nbsp; Pendidikan Terakhir</legend>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Pendidikan <span class="text-danger">*</span></label>
											<input disabled type="text" style="font-size: 14px;" class="form-control" name="biodata_pendidikan" value="<?=$biodata_pendidikan;?>" >
									</div>
									<div class="col-md-3">
										<label>Sekolah / Kampus <span class="text-danger">*</span></label>
										<input disabled type="text" style="font-size: 14px;" class="form-control" name="sekolah_nama" value="<?=$sekolah_nama;?>" >
									</div>
										<div class="col-md-3">
										<label>Fakultas </label>
											<input disabled type="text" style="font-size: 14px;" class="form-control" name="fakultas_nama" value="<?=$fakultas_nama;?>" >
									</div>
									<div class="col-md-3">
										<label>Jurusan </label>
											<input disabled type="text" style="font-size: 14px;" class="form-control" name="jurusan_nama" value="<?=$jurusan_nama;?>" >
									</div>
									
								</div>
							</div>		
								
				
										
							<hr>
	                  <div class="text-right">
	                 	<button disabled type="submit" id="submit1" name="submit1" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-floppy-disk"></i></b> Update</button>
	                  	<a href="<?php echo base_url('hr/dataos');?>"><button type="button" class="btn btn-danger btn-labeled btn-rounded"><b><i class="icon-cross2"></i></b> Kembali</button></a>
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
				<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary panel-bordered">
							<div class="panel-heading">
								<h6 class="panel-title"><i class="icon-stack4"></i> <b>Data TES</b></h6>
								
							<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

							<div class="panel-body">
							
						
								<table id="tableData" class="table table-xs datatable-responsive">
								<thead>
									<tr>
									   <th>No</th>
						               <th>IQ</th>
						               <th>Posisi</th>
						               <th>Tipe Recruitment</th>
						               <th>Hasil</th>
						               <th>Catatan</th>
						               <th>Tanggal Psikotest</th>
									 	 <?php 
													if ($userid != 4) {
														echo '<th>Vendor Test </th>';
												
													} 	
													?>
									</tr>
								</thead>
								<tbody>
							
									<?php 
									$i=1;
										foreach ($test->result() as $data) { ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $data->test_iq; ?></td>
												<td><?php echo $data->posisi_nama; ?></td>
												<td><?php if ($data->kategori_sortir == '3') {
													echo 'OS SORTIR';
												} else if ($data->kategori_sortir == '2') {
													echo 'OS NON SORTIR';
												}else{
													echo 'Belum Memilih';
												}
												 ?></td>
												
												<td>
													<?php 
													if ($data->test_hasil ==1) {
														echo '<span class="label label-success label-rounded"><b>LOLOS</b></span>';
													}else if ($data->test_hasil ==2) {
														echo '<span class="label label-warning label-rounded"><b>KERJA, BELUM TES</b></span>';
													} else {
														echo '<span class="label label-danger label-rounded"><b>TIDAK LOLOS</b></span>';
													}
													
												?>
												</td>
												<td><?php echo $data->test_catatan; ?></td>
												<td><?php echo date('d-m-Y',strtotime($data->test_tanggal)); ?></td>
													<?php 
													if ($userid != 4) {
														echo '<td>';
														if ($data->user_id == 3) {
															echo 'KOPERASI';
														} else if($data->user_id == 4) {
															echo 'CAKAP';
														} else {
															echo $mitraos_nama;
														}
														echo '</td>';
													} 	
													?>
												
											</tr>
									<?php
										}
									?>
								
								</tbody>
							</table>
							</div>
						</div>
	</div>
</div>
				<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary panel-bordered">
								<div class="panel-heading">
									<h6 class="panel-title"><i class="icon-stack4"></i> <b>Riwayat Transfer Data</b></h6>
									
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">
									 <?php 
									 	if (count($data_transfer) ==0) {
									 		 echo '<span class="label label-danger" style="font-size : 14px;">Tidak ada data riwayat  transfer kandidat</span>'; 
									 	} else { 
									 		 echo '<span class="label label-success" style="font-size : 14px;">Ada riwayat data transfer kandidat</span>'; 
									 		?>
									 		<table id="tableData" class="table table-xs datatable-responsive">
												<thead>
													<tr>
														<th>From</th>
														<th>To</th>
										               <th>Catatan transfer</th>
										               <th>Tanggal Transfer Data</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														if (count($data_transfer) ==0) {
															echo '<tr><td cospan="2" style="vertical-align : middle;text-align:center;">No Data Transfer</td></tr>';
														} else 
														{
															foreach ($data_transfer as $data_t) { ?>
																<tr>
																	<td><?php echo $data_t->from; ?></td>
																	<td><?php echo $data_t->to; ?></td>
																	<td><?php echo $data_t->keterangan; ?></td>
																	<td><?php echo $data_t->datetime_insert; ?></td>
																</tr>
														<?php

															 } 
														}
														
													?>
												</tbody>
											</table>
									 <?php
									 	}
									 ?>
									
								</div>
							</div>
		</div>
	</div>

				<!-- /user profile -->


