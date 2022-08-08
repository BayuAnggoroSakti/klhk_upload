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
			$biodata_sekolah 		  = trim($u->biodata_sekolah);
			$biodata_propinsi_id 		  = trim($u->biodata_propinsi_id);
			$biodata_kabupaten_id 		  = trim($u->biodata_kabupaten_id);
			$biodata_kecamatan_id 		  = trim($u->biodata_kecamatan_id);
			$biodata_kelurahan_id 		  = trim($u->biodata_kelurahan_id);
			$biodata_jurusan 		  = trim($u->biodata_jurusan);
			$biodata_nohp1 		  = trim($u->biodata_nohp1);
			$biodata_nohp2 		  = trim($u->biodata_nohp2);
			$biodata_status 		  = trim($u->biodata_status);
			$biodata_create 		  = trim($u->biodata_create);
			$biodata_update 		  = trim($u->biodata_update);
			$biodata_fakultas 		  = trim($u->biodata_fakultas);
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
			            url : "<?=site_url('os/dataos/xdeletetest')?>/"+id,
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
			               window.location.reload();
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
						<h6 class="panel-title text-semibold"><i class="icon-profile"></i> Detail Biodata Pelamar OS - STATUS :
						<?php 
							if ($biodata_status ==1) {
								echo '<span class="label label-success" style="font-size : 14px;">SUDAH DI TES</span>';
								//$disabled = 'disabled';
								$disabled = '';
							} else {
								echo '<span class="label label-danger" style="font-size : 14px;">BELUM DI TES</span>';
								$disabled = '';
							}
							
						?>
						</h6>
						<h5> <?php echo '<span class="label label-warning" style="font-size : 14px;">'.$mitraos_nama.'</span>'; ?></h5>
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
										<input id="nik"  <?php echo $disabled; ?> type="text" style="font-size: 14px;" name="biodata_nik" class="form-control  required" value="<?=$biodata_nik;?>" required>
										<div id="pesan"></div>
									</div>
									<div class="col-md-4">
										<label>Nama <span class="text-danger">*</span></label>
										<input  <?php echo $disabled; ?> type="text" name="biodata_nama" style="font-size: 14px;" class="form-control required" value="<?=$biodata_nama;?>" required>
									</div>
										<div class="col-md-4">
										<label>Nama Panggilan <span class="text-danger">*</span></label>
										<input  <?php echo $disabled; ?> type="text" name="nama_panggilan" style="font-size: 14px;" class="form-control required" value="<?=$nama_panggilan;?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									
								<div class="col-md-4">
										<label>Tanggal Lahir <span class="text-danger">*</span></label>
										<input <?php echo $disabled; ?> type="text" id="tanggal" style="font-size: 14px;" class="form-control required" name="biodata_tanggal_lahir" value="<?=$biodata_tanggal_lahir;?>" required>
									</div>
									<div class="col-md-4">
										<label>Tempat Lahir <span class="text-danger">*</span></label>
										<input <?php echo $disabled; ?> type="text" style="font-size: 14px;" class="form-control  required" name="biodata_tempat_lahir" value="<?=$biodata_tempat_lahir;?>" required>
									</div>
									<div class="col-md-4">
										<label>Jenis Kelamin <span class="text-danger">*</span></label>
										<select  <?php echo $disabled; ?>  required class="select" name="biodata_jenis_kelamin">
											<option value="">Pilih jenis kelamin</option>
											<option <?php if ($biodata_jenis_kelamin == "LAKI - LAKI") {
												echo 'selected';
											} 
											 ?> value="LAKI - LAKI">Laki - Laki</option>
											<option <?php if ($biodata_jenis_kelamin == "PEREMPUAN") {
												echo 'selected';
											} 
											 ?>  value="PEREMPUAN">Perempuan</option>
										</select>
									</div>
								
								
								</div>
							</div>
							<div class="form-group">
								<div class="row">
										<div class="col-md-4">
										<label>Agama <span class="text-danger">*</span></label>
										<select  <?php echo $disabled; ?>  class="form-control required" name="biodata_agama">
											<?php 
												foreach ($agama->result() as $data) { ?>
												<option <?php if ($biodata_agama == $data->agama_nama) {
												echo 'selected';
											} 
											 ?>  value="<?php echo $data->agama_nama ?>">
													<?php echo $data->agama_nama ?>
												</option>
											<?php
												}
											?>
										</select>
										
									</div>
									<div class="col-md-4">
										<label>Warga Negara <span class="text-danger">*</span></label>
										<input <?php echo $disabled; ?>  type="text" value="<?php echo $warga_negara; ?>" required name="warga_negara" placeholder="enter your nationality" style="font-size: 14px;" class="form-control">
									</div>
									<div class="col-md-4">
										<label>Status Perkawinan <span class="text-danger">*</span></label>
										<select  <?php echo $disabled; ?>  class="select" name="status_perkawinan">
											<option <?php if ($status_perkawinan == 'TIDAK KAWIN'){echo 'selected';} ?> value="TIDAK KAWIN"> TIDAK KAWIN</option>
											<option <?php if ($status_perkawinan == 'KAWIN'){echo 'selected';} ?>  value="KAWIN"> KAWIN</option>
											<option <?php if ($status_perkawinan == 'JANDA'){echo 'selected';} ?>  value="JANDA"> JANDA</option>
											<option <?php if ($status_perkawinan == 'DUDA'){echo 'selected';} ?>  value="DUDA"> DUDA</option>
										</select>
									</div>
									
								</div>
							</div>
								<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Golongan Darah</label>
										<select  <?php echo $disabled; ?>  class="select" name="golongan_darah">
											<option value="">Pilih</option>
											<option <?php if ($golongan_darah == 'A'){echo 'selected';} ?>  value="A"> A</option>
											<option <?php if ($golongan_darah == 'B'){echo 'selected';} ?>  value="B"> B</option>
											<option <?php if ($golongan_darah == 'AB'){echo 'selected';} ?>  value="AB"> AB</option>
											<option <?php if ($golongan_darah == 'O'){echo 'selected';} ?>  value="O"> O</option>
										</select>
									</div>
									<div class="col-md-3">
										<label>Buta Warna <span class="text-danger">*</span></label>
										<select  <?php echo $disabled; ?>  class="select" name="buta_warna">
											<option <?php if ($buta_warna == 'NORMAL'){echo 'selected';} ?>  value="NORMAL"> NORMAL</option>
											<option <?php if ($buta_warna == 'PARSIAL'){echo 'selected';} ?>  value="PARSIAL"> PARSIAL</option>
											<option <?php if ($buta_warna == 'TOTAL'){echo 'selected';} ?>  value="TOTAL"> TOTAL</option>
										</select>
									</div>
									<div class="col-md-3">
										<label>Tinggi Badan (cm) </label>
										<input  <?php echo $disabled; ?>  value="<?php echo $tinggi_badan; ?>" type="number" placeholder="Masukkan tinggi badan anda dalam (cm)"  name="tinggi_badan" style="font-size: 14px;" class="form-control" >
									</div>
										<div class="col-md-3">
										<label>Berat Badan (kg) </label>
										<input  <?php echo $disabled; ?>  value="<?php echo $berat_badan; ?>" type="number" placeholder="Masukkan berat badan anda dalam (kg)"  name="berat_badan" style="font-size: 14px;" class="form-control" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>No HP 1 <span class="text-danger">*</span></label>
										<input  <?php echo $disabled; ?>  value="<?php echo $biodata_nohp1; ?>" placeholder="Masukkan nomer hp 1" type="number" name="biodata_nohp1" style="font-size: 14px;" class="form-control  required" required>
									</div>
									<div class="col-md-3">
										<label>No HP 2</label>
										<input  <?php echo $disabled; ?>  value="<?php echo $biodata_nohp2; ?>" placeholder="Masukkan nomer hp 2 " type="number" name="biodata_nohp2" style="font-size: 14px;" class="form-control" >
									</div>
									<div class="col-md-3">
										<label>Email</label>
										<input  <?php echo $disabled; ?>  value="<?php echo $email; ?>" type="email" placeholder="MasukkaN alamat email anda" name="email" style="font-size: 14px;" class="form-control" >
									</div>
									<div class="col-md-3">
										<label>Social Media</label>
										<input  <?php echo $disabled; ?>  value="<?php echo $social_media; ?>" type="text" placeholder="Nama Account Social Media (IG, FB, Twitter dll ) :" name="social_media" style="font-size: 14px;" class="form-control" >
									</div>
									
								</div>
							</div>	
							<legend class="text-bold text-danger"><i class="icon-home2"></i>&nbsp; Alamat</legend>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>Alamat <span class="text-danger">*</span></label>
										<input <?php echo $disabled; ?> type="text" style="font-size: 14px;" class="form-control required" name="biodata_alamat" value="<?=$biodata_alamat;?>" required>
									</div>
									<div class="col-md-2">
										<label>RT</label>
										<input <?php echo $disabled; ?> type="text" style="font-size: 14px;" class="form-control" name="biodata_rt" value="<?=$biodata_rt;?>">
									</div>
									<div class="col-md-2">
										<label>RW</label>
										<input <?php echo $disabled; ?> type="text" style="font-size: 14px;" class="form-control" name="biodata_rw" value="<?=$biodata_rw;?>" >
									</div>
									<div class="col-md-2">
										<label>Kodepos</label>
										<input <?php echo $disabled; ?> type="text" style="font-size: 14px;" class="form-control" name="kodepos" value="<?=$kodepos;?>" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Provinsi <span class="text-danger">*</span></label>
										<select id="propinsi" <?php echo $disabled; ?>  onchange="loadKabupaten()" class="select" name="biodata_provinsi_id">
											<option value="">Silahkan pilih provinsi</option>
											<?php 
												foreach ($provinsi->result() as $data) { ?>
												<option <?php if ($biodata_propinsi_id == $data->provinsi_id) {
												echo 'selected';
											} 
											 ?>  value="<?php echo $data->provinsi_id ?>">
													<?php echo $data->provinsi_nama ?>
												</option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-md-3">
										<label>Kabupaten <span class="text-danger">*</span></label>
										<select <?php echo $disabled; ?>  id="kabupatenArea" onchange="loadKecamatan()" class="form-control required" required name="biodata_kabupaten_id">
											<?php 
												foreach ($kabupaten->result() as $data) { ?>
												<option <?php if ($biodata_kabupaten_id == $data->kabupaten_id) {
												echo 'selected';
											} 
											 ?>  value="<?php echo $data->kabupaten_id ?>">
													<?php echo $data->kabupaten_nama ?>
												</option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-md-3">
										<label>Kecamatan <span class="text-danger">*</span></label>
										<select <?php echo $disabled; ?>  id="kecamatanArea"  onchange="loadDesa()" class="form-control required" required name="biodata_kecamatan_id">
											<?php 
												foreach ($kecamatan->result() as $data) { ?>
												<option <?php if ($biodata_kecamatan_id == $data->kecamatan_id) {
												echo 'selected';
											} 
											 ?>  value="<?php echo $data->kecamatan_id ?>">
													<?php echo $data->kecamatan_nama ?>
												</option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-md-3">
										<label>Desa <span class="text-danger">*</span></label>
										<select <?php echo $disabled; ?>  id="desaArea"  class="form-control required" required name="biodata_desa_id">
											<?php 
												foreach ($desa->result() as $data) { ?>
												<option <?php if ($biodata_kelurahan_id == $data->desa_id) {
												echo 'selected';
											} 
											 ?>  value="<?php echo $data->desa_id ?>">
													<?php echo $data->desa_nama ?>
												</option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
							</div>
							<legend class="text-bold text-danger"><i class="icon-office"></i>&nbsp; Pendidikan Terakhir</legend>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Pendidikan <span class="text-danger">*</span></label>
										<select <?php echo $disabled; ?>  class="form-control required" required name="biodata_pendidikan">
											<?php 
												foreach ($pendidikan->result() as $data) { ?>
												<option <?php if ($biodata_pendidikan == $data->pendidikan_nama) {
												echo 'selected';
											} 
											 ?>  value="<?php echo $data->pendidikan_nama ?>">
													<?php echo $data->pendidikan_nama ?>
												</option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-md-3">
										<label>Sekolah / Kampus <span class="text-danger">*</span></label>
										<select <?php echo $disabled; ?>  class="select" required name="biodata_sekolah">
											<option value="">Silahkan Pilih Sekolah</option>
											<?php 
												foreach ($sekolah->result() as $data) { ?>
												<option <?php if ($biodata_sekolah == $data->sekolah_id) {
												echo 'selected';
											} 
											 ?>  value="<?php echo $data->sekolah_id ?>">
													<?php echo $data->sekolah_nama ?>
												</option>
											<?php
												}
											?>
										</select>
									</div>
										<div class="col-md-3">
										<label>Fakultas </label>
										<select <?php echo $disabled; ?>  class="select" name="biodata_fakultas">
											<option value="">Silahkan Pilih Fakultas</option>
											<?php 
												foreach ($fakultas->result() as $data) { ?>
												<option <?php if ($biodata_fakultas == $data->fakultas_id) {
												echo 'selected';
											} 
											 ?>  value="<?php echo $data->fakultas_id ?>">
													<?php echo $data->fakultas_nama ?>
												</option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-md-3">
										<label>Jurusan </label>
											<select <?php echo $disabled; ?>  class="select" name="biodata_jurusan">
												<option value="">Silahkan Pilih Jurusan</option>
											<?php 
												foreach ($jurusan->result() as $data) { ?>
												<option <?php if ($biodata_jurusan == $data->jurusan_id) {
												echo 'selected';
											} 
											 ?>  value="<?php echo $data->jurusan_id ?>">
													<?php echo $data->jurusan_nama ?>
												</option>
											<?php
												}
											?>
										</select>
									</div>
									
								</div>
							</div>		
								
				
										
							<hr>
	                  <div class="text-right">
	                 	<button <?php echo $disabled; ?> type="submit" id="submit1" name="submit1" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-floppy-disk"></i></b> Update</button>
	                  	<a href="<?php echo base_url('os/dataos');?>"><button type="button" class="btn btn-danger btn-labeled btn-rounded"><b><i class="icon-cross2"></i></b> Kembali</button></a>
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
<!-- User profile -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary panel-bordered">
							<div class="panel-heading">
								<h6 class="panel-title"><i class="icon-stack4"></i> <b>Data TES</b></h6>
								
							<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

							<div class="panel-body">
								<a href="#"  data-toggle="modal" data-target="#addModal"><button type="button" class="btn btn-warning btn-xs btn-icon" title="Add Test"><i class="icon-user-plus"></i>&nbsp; Tambah TES</button></a>
						
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
									   <th width="7%">Aksi</th>
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
												
												<td><a href="#" href="#" data-toggle="modal" data-target="#editModal<?php echo $data->test_id ?>" title="Edit Data" class="text-center text-success"><i class="icon-pencil7"></i></a><a onclick="hapusData('<?php echo $data->test_id ?>')" title="Delete Data"><i class="icon-cancel-square text-danger"></i></a></td>
											</tr>
											<div id="editModal<?php echo $data->test_id ?>" class="modal fade">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header bg-primary">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title"><i class="icon-pencil"></i>  Edit Data Test</h5>
														</div>

														<div class="modal-body">
																<form action="<?php echo site_url('os/dataos/updatetest');?>" method="POST">
																	<div class="panel panel-flat">
																	
																		<input type="hidden" name="biodata_id" value="<?php echo $data->biodata_id; ?>">
																		<input type="hidden" name="test_id" value="<?php echo $data->test_id; ?>">
																		<div class="panel-body">
																			<div class="form-group">
																				<label><b>IQ :</b></label>
																				<input id="iq" type="number" name="test_iq" class="form-control" value="<?php echo $data->test_iq ?>" >
																			</div>

																			<div class="form-group">
																				<label><b>Posisi :</b></label>
																				<select class="select" name="posisi_id">
																				<?php 
																					foreach ($posisi->result() as $r) { ?>
																						<option <?php if ($r->posisi_id == $data->posisi_id) {
																							echo 'selected';
																						} 
																						 ?> value="<?php echo $r->posisi_id; ?>"><?php echo $r->posisi_nama; ?></option>
																				<?php
																					}
																				?>
																				</select>
																			</div>
																			<div class="form-group">
																				<label><b>Hasil Test :</b></label>
																				<select onchange="hasilChange()" class="form-control" id="test_hasil" name="test_hasil">
																					<option value="1" <?php if ($data->test_hasil ==1) {
																						echo 'selected';
																					} 
																					 ?>>LOLOS</option>
																					 <option value="2" <?php if ($data->test_hasil ==2) {
																						echo 'selected';
																					} 
																					 ?>>KERJA, BELUM TES</option>
																					<option value="0" <?php if ($data->test_hasil ==0) {
																						echo 'selected';
																					} 
																					 ?>>TIDAK LOLOS</option>
																				</select>
																			</div>
																			<div class="form-group">
																				<label><b>Tipe Recruitment :</b></label>
																				<select class="form-control" id="kategori_sortir" name="kategori_sortir" required>
																					<option value="">Silahkan pilih</option>
																					<option  <?php if ($data->kategori_sortir ==2) {
																						echo 'selected';
																					} 
																					 ?> value="3">OS SORTIR</option>
																					<option  <?php if ($data->kategori_sortir ==3) {
																						echo 'selected';
																					} 
																					 ?> value="2">OS NON SORTIR</option>
																				</select>
																			</div>
																			<div class="form-group">
																				<label><b>Tanggal Psikotes :</b></label>
																				<input type="text" id="tanggal_psikotes_edit"  name="test_tanggal" readonly class="form-control" value="<?php echo $data->test_tanggal ?>" >
																			</div>
																			<div class="form-group">
																				<label><b>Catatan :</b></label>
																				<textarea  name="test_catatan" class="form-control"><?php echo $data->test_catatan ?></textarea>

																			
																		<br>

																			<div class="text-right">
																				<button type="button" class="btn btn-save" data-dismiss="modal">Close</button>
																				<button type="submit" class="btn btn-primary">Update form <i class="icon-arrow-right14 position-right"></i></button>
																			</div>
																		</div>
																	</div>
																</form>
														</div>

														
													</div>
												</div>
											</div>
									<?php
										}
									?>
								
								</tbody>
							</table>
							</div>
						</div>
	</div>
</div>
<?php 
	if ($this->session->userdata('userid') != 4) { ?>
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

<?php	} 
?>

<div id="addModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h6 class="modal-title"><i class="icon-add"></i> Tambah Psikotes</h6>
							</div>
								<form action="<?php echo site_url('os/dataos/savetest');?>" method="POST">
									<div class="panel panel-flat">
										<div class="panel-heading">
									
										</div>
										<input type="hidden" name="biodata_id" value="<?php echo $biodata_id; ?>">
										<div class="panel-body">
											<div class="form-group">
												<label><b>IQ :</b></label>
												<input required id="iq" type="number" name="test_iq" class="form-control" >
											</div>

											<div class="form-group">
												<label><b>Posisi :</b></label>
												<select class="select" name="posisi_id" required>
													<option value="">Silahkan pilih posisi</option>
												<?php 
													foreach ($posisi->result() as $r) { ?>
														<option value="<?php echo $r->posisi_id; ?>"><?php echo $r->posisi_nama; ?></option>
												<?php
													}
												?>
												</select>
											</div>
											<div class="form-group">
												<label><b>Hasil Test :</b></label>
												<select class="form-control" id="test_hasil" name="test_hasil" onchange="hasilChange()" required>
													<option value="">Silahkan pilih hasil test</option>
													<option value="1">LOLOS</option>
													<option value="2">KERJA, BELUM TES</option>
													<option value="0">TIDAK LOLOS</option>
												</select>
											</div>
											<div class="form-group">
												<label><b>Tipe Recruitment :</b></label>
												<select class="form-control" id="kategori_sortir" name="kategori_sortir" required>
													<option value="">Silahkan pilih</option>
													<option value="3">OS SORTIR</option>
													<option value="2">OS NON SORTIR</option>
												</select>
											</div>
											<div class="form-group" id="myModalWithDatePicker">
												<label><b>Tanggal Psikotes :</b></label>
											
												<input type="text" id="tanggal_psikotes_add" readonly style="font-size: 14px;" class="form-control required" name="test_tanggal"  required>
											</div>
											<div class="form-group">
												<label><b>Catatan :</b></label>
												<textarea  name="test_catatan" class="form-control"></textarea>

											
										<br>

											<div class="text-right">
												<button type="button" class="btn btn-save" data-dismiss="modal">Close</button>
												<button type="submit"  class="btn btn-primary">save form <i class="icon-arrow-right14 position-right"></i></button>
											</div>
										</div>
									</div>
								</form>>
						
						</div>
					</div>
				</div>
		
		
<script>
	$('#tanggal_psikotes_add').datepicker({
  	format: "dd/mm/yyyy",
	autoclose:true
});
	$('#tanggal_psikotes_edit').datepicker({
  	format: "dd/mm/yyyy",
	autoclose:true
});
	
	 $(document).ready(function(){
		$('#nik').blur(function(){
			$('#pesan').html('checking NIK....');
			var nik = $(this).val();
			var nik_old = $("#nik_old").val();
			$.ajax({
				type	: 'POST',
				url 	: '<?php echo base_url();?>os/dataos/check_nik_without_self_2',
				data 	: 'nik='+nik+'&nik_old='+nik_old,
				dataType: 'JSON',
				success	: function(data){
					if (data['STATUS']=='1') {
						
						$("#pesan").html("<span style='color:red;'>❌ NIK tersebut sudah ada..! </b><span>");
					
						
						document.getElementById("submit1").disabled = true;
					}else{
						if (nik.length!=16) {
								$('#pesan').show(); 
								$("#pesan").html("<span style='color:red;'>NIK harus terdiri dari 16 angka..!<span>");
								document.getElementById("submit1").disabled = true;
								valid = false;
							}
							else{
								$("#pesan").html(""); 
								document.getElementById("submit1").disabled = false;
							} 
						
					}
					
				}
			})

		});
	});
			
	    	$('#tanggal').datepicker({
					format: "dd/mm/yyyy",
						autoclose:true
					 });

	    function hasilChange() {
	    	console.log('klik');
		    if (document.getElementById("test_hasil").value == "2"){
		        document.getElementById("iq").value = "0";
		        document.getElementById("iq").readOnly = true;
		    }else{
		    	 document.getElementById("iq").readOnly = false;
		    }         
		}
		



	     function loadKabupaten()
            {
                var propinsi = $("#propinsi").val();
                $.ajax({
                    type:'GET',
                    url:"<?php echo base_url(); ?>os/dataos/kabupaten",
                    data:"id=" + propinsi,
                    success: function(html)
                    { 
                       $("#kabupatenArea").html(html);
                    }
                }); 
            }
            function loadKecamatan()
            {
                var kabupaten = $("#kabupatenArea").val();
                $.ajax({
                    type:'GET',
                    url:"<?php echo base_url(); ?>os/dataos/kecamatan",
                    data:"id=" + kabupaten,
                    success: function(html)
                    { 
                        $("#kecamatanArea").html(html);
                    }
                }); 
            }
            function loadDesa()
            {
                var kecamatan = $("#kecamatanArea").val();
                $.ajax({
                    type:'GET',
                    url:"<?php echo base_url(); ?>os/dataos/desa",
                    data:"id=" + kecamatan,
                    success: function(html)
                    { 
                        $("#desaArea").html(html);
                    }
                }); 
            }
            $(document).ready( function () {
			    $('#tableData').DataTable();
			} );

		
</script>

