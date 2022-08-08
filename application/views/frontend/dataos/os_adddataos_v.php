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
						<h6 class="panel-title text-semibold"><i class="icon-profile"></i>&nbsp;Biodata Pelamar
						
						</h6>
					</div>
					
					
					<div class="panel-body">
						<form id="frm_tambah" action="<?php echo base_url('os/dataos/xsave');?>" method="post" enctype="multipart/form-data">
							<legend class="text-bold text-danger"><i class="icon-user-check"></i>&nbsp; Identitas Diri</legend>
							<div class="form-group">

								<div class="row">
								
	<!-- 								<div class="col-md-2">
										<label>Mitra OS <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" disabled class="form-control required" value="<?php echo $mitraos[0]->mitraos_nama ?>"  required>
									</div> -->
									<div class="col-md-4">
										<label>NIK <span class="text-danger">*</span></label>
										<input id="nik" name="biodata_nik" type="number" style="font-size: 14px;" class="form-control  required" placeholder="Masukkan NIK KTP "  required>
										<div id="pesan"></div>
									</div>
									<div class="col-md-4">
										<label>Nama Lengkap <span class="text-danger">*</span></label>
										<input type="text" pattern="[^':]*$" id="nama" placeholder="Masukkan nama lengkap" style="font-size: 14px;" class="form-control required" name="biodata_nama"  required>
									</div>
									<div class="col-md-4">
										<label>Nama Panggilan <span class="text-danger">*</span></label>
										<input type="text" pattern="[^':]*$"  placeholder="Masukkan nama panggilan..." name="nama_panggilan" style="font-size: 14px;" class="form-control required"  required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Tanggal Lahir <span class="text-danger">*</span></label>
										<input type="text"  readonly id="tanggal"  placeholder="Masukkan tanggal lahir..." name="biodata_tanggal_lahir" style="font-size: 14px;" class="form-control required"  required>
									</div>
									<div class="col-md-4">
										<label>Tempat Lahir <span class="text-danger">*</span></label>
										<input  type="text" name="biodata_tempat_lahir" style="font-size: 14px;" class="form-control  required" placeholder="Masukkan kota kelahiran anda sesuai KTP" required>
									</div>
									
									<div class="col-md-4">
										<label>Jenis Kelamin <span class="text-danger">*</span></label>
										<select required class="select" name="biodata_jenis_kelamin">
											<option value="Laki - Laki">Laki - Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
									
									
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									
									<div class="col-md-4">
										<label>Agama <span class="text-danger">*</span></label>
										<select class="select" name="biodata_agama">
											<?php 
												foreach ($agama->result() as $data) { ?>
												<option value="<?php echo $data->agama_nama ?>">
													<?php echo $data->agama_nama ?>
												</option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-md-4">
										<label>Warga Negara <span class="text-danger">*</span></label>
										<input type="text" required name="warga_negara" placeholder="enter your nationality" style="font-size: 14px;" class="form-control">
									</div>
									<div class="col-md-4">
										<label>Status Perkawinan <span class="text-danger">*</span></label>
										<select class="select" name="status_perkawinan">
											<option value="TIDAK KAWIN"> TIDAK KAWIN</option>
											<option value="KAWIN"> KAWIN</option>
											<option value="JANDA"> JANDA</option>
											<option value="DUDA"> DUDA</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Golongan Darah</label>
										<select class="select" name="golongan_darah">
											<option value="">Pilih</option>
											<option value="A"> A</option>
											<option value="B"> B</option>
											<option value="AB"> AB</option>
											<option value="O"> O</option>
										</select>
									</div>
									<div class="col-md-3">
										<label>Buta Warna <span class="text-danger">*</span></label>
										<select class="select" name="buta_warna">
											<option value="NORMAL"> NORMAL</option>
											<option value="PARSIAL"> PARSIAL</option>
											<option value="TOTAL"> TOTAL</option>
										</select>
									</div>
									<div class="col-md-3">
										<label>Tinggi Badan (cm) </label>
										<input type="number" placeholder="Masukkan tinggi badan anda dalam (cm)"  name="tinggi_badan" style="font-size: 14px;" class="form-control" >
									</div>
										<div class="col-md-3">
										<label>Berat Badan (kg) </label>
										<input type="number" placeholder="Masukkan berat badan anda dalam (kg)"  name="berat_badan" style="font-size: 14px;" class="form-control" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>No HP 1 <span class="text-danger">*</span></label>
										<input placeholder="Masukkan nomer hp 1" type="number" name="biodata_nohp1" style="font-size: 14px;" class="form-control  required" required>
									</div>
									<div class="col-md-3">
										<label>No HP 2</label>
										<input placeholder="Masukkan nomer hp 2 " type="number" name="biodata_nohp2" style="font-size: 14px;" class="form-control" >
									</div>
									<div class="col-md-3">
										<label>Email</label>
										<input type="email" placeholder="Masukkan alamat email anda" name="email" style="font-size: 14px;" class="form-control" >
									</div>
									<div class="col-md-3">
										<label>Social Media</label>
										<input type="text" placeholder="Nama Account Social Media (IG, FB, Twitter dll ) :" name="social_media" style="font-size: 14px;" class="form-control" >
									</div>
									
								</div>
							</div>		
							<legend class="text-bold text-danger"><i class="icon-home2"></i>&nbsp; Alamat</legend>	
							<div class="form-group">
								<div class="row">
									
									<div class="col-md-6">
										<label>Alamat <span class="text-danger">*</span></label>
										<input onchange="cek_nama_tgl()" placeholder="Masukkan alamat lengkap" type="text" name="biodata_alamat" style="font-size: 14px;" class="form-control required" required>
									</div>
									<div class="col-md-2">
										<label>RT</label>
										<input placeholder="Masukkan RT" type="text" name="biodata_rt" style="font-size: 14px;" class="form-control">
									</div>
									<div class="col-md-2">
										<label>RW</label>
										<input placeholder="Masukkan RW" type="text" name="biodata_rw" style="font-size: 14px;" class="form-control" >
									</div>
									<div class="col-md-2">
										<label>Kodepos</label>
										<input placeholder="Masukkan kodepos" type="number" name="kodepos" style="font-size: 14px;" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Provinsi <span class="text-danger">*</span></label>
										  <select id="propinsi" name="biodata_provinsi_id" onchange="loadKabupaten()" class="select">
										  	<option value="">Pilih Provinsi</option>
						                <?php
						                foreach ($provinsi->result() as $p) {
						                    echo "<option value='$p->provinsi_id'>$p->provinsi_nama</option>";
						                }
						                ?>
							            </select>
							       	 </div>	
									<div class="col-md-3" id="kabupatenArea">
										<label>Kabupaten <span class="text-danger">*</span></label>
										<select id='kabupaten' name='biodata_kabupaten_id' onChange='loadKecamatan()' class=' form-control'>
											<option></option>
										</select>
									</div>
									<div class="col-md-3" id="kecamatanArea">
										<label>Kecamatan <span class="text-danger">*</span></label>
										<select id='kecamatan' name='biodata_kecamatan_id' onChange='loadDesa()' class='form-control'>
											<option></option>
										</select>
									</div>
									<div class="col-md-3" id="desaArea">
										<label>Desa <span class="text-danger">*</span></label>
										<select class='form-control' name='biodata_desa_id'>
											<option></option>
										</select>
									</div>
								</div>
							</div>
							<legend class="text-bold text-danger"><i class="icon-office"></i>&nbsp; Pendidikan Terakhir</legend>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Pendidikan <span class="text-danger">*</span></label>
										<select required class="form-control required" name="biodata_pendidikan">
											<option value="">Silahkan pilih pendidikan :</option>
										<?php 
											foreach ($pendidikan->result() as $data) { ?>
											<option value="<?php echo $data->pendidikan_nama ?>">
												<?php echo $data->pendidikan_nama ?>
											</option>
										<?php
											}
										?>
									</select>
									</div>
									<div class="col-md-3">
										<label>Sekolah / Kampus <span class="text-danger">*</span></label>
										<select required class="select required" name="biodata_sekolah">
											<option value="">Silahkan pilih sekolah :</option>
										<?php 
											foreach ($sekolah->result() as $data) { ?>
											<option value="<?php echo $data->sekolah_id ?>">
												<?php echo $data->sekolah_nama ?>
											</option>
										<?php
											}
										?>
										</select>
									</div>
									<div class="col-md-3">
										<label>Fakultas </label>
										<select class="select required" name="biodata fakultas">
											<option value="">Silahkan pilih fakultas :</option>
										<?php 
											foreach ($fakultas->result() as $data) { ?>
											<option value="<?php echo $data->fakultas_id ?>">
												<?php echo $data->fakultas_nama ?>
											</option>
										<?php
											}
										?>
										</select>
									</div>
									<div class="col-md-3">
										<label>Jurusan <span class="text-danger">*</span></label>
										<select required class="required select" name="biodata_jurusan">
											<option value="">Silahkan pilih jurusan :</option>
										<?php 
											foreach ($jurusan->result() as $data) { ?>
											<option value="<?php echo $data->jurusan_id ?>">
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
	                 	<button type="submit" id="submit1" name="submit1" onclick="return submitForm()" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-floppy-disk"></i></b> Submit</button>
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
<div id="send_hr" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h6 class="modal-title" id="send_hr_header"></h6>
							</div>

							<div class="modal-body" id="send_hr_body">
								
							</div>
							<form action="<?php echo site_url('os/dataos/request_vendor');?>" method="POST">
									<div class="panel panel-flat">
										<div class="panel-heading">
											<h5 class="panel-title">Apakah anda ingin meminta pelamar tersebut ke HR Pura Group?</h5>
										
										</div>
										<div class="panel-body">
											<input type="hidden" name="nik" id="req_nik">
											<input type="hidden" name="nama" id="req_nama">
											<input type="hidden" name="iq" id="req_iq">
											<input type="hidden" name="tanggal_test" id="req_tanggal_test">
											<input type="hidden" name="posisi" id="req_posisi">
											<input type="hidden" name="keterangan" id="req_keterangan">
											<div class="form-group">
												<label><b>Catatan</b></label>
												<textarea required  name="catatan_vendor" class="form-control"></textarea>
											</div>
											
										<br>

											<div class="text-right">
												<button type="button" class="btn btn-save" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Send HR<i class="icon-arrow-right14 position-right"></i></button>
											</div>
										</div>
									</div>
								</form>
						
						</div>
					</div>
				</div>

<script src="<?php echo base_url();?>assets/datepicker/bootstrap-datepicker.js"></script>
<script>
		$('#tanggal').datepicker({
					format: "dd/mm/yyyy",
						autoclose:true
					 });
	$(document).ready(function(){
		$('#nik').blur(function(){
			$('#pesan').html('checking NIK....');
			var nik = $(this).val();

			$.ajax({
				type	: 'POST',
				url 	: '<?php echo base_url();?>os/dataos/check_nik',
				data 	: 'nik='+nik,
				dataType: 'JSON',
				success	: function(data){
					if (data['STATUS']=='1') {
						
						$("#pesan").html("<span style='color:red;'>❌ NIK tersebut sudah ada..! </b><span>");
						if (data['MITRAOS'] =='UMUM')
						{
							$('#send_hr').modal('show');
							$('#req_nik').val(data['NIK']);
							$('#req_nama').val(data['NAMA']);
							$('#req_keterangan').val(data['KETERANGAN']);
							$('#req_iq').val(data['IQ']);
							$('#req_tanggal_test').val(data['D_TEST']);
							$('#req_posisi').val(data['POSISI']);
							$('#send_hr_header').html(' NIK tersebut sudah ada..! ');
							$('#send_hr_body').html("<h6 class='text-semibold'>NIK atas nama "+data['NAMA']+" sudah ada di data kandidat "+data['MITRAOS']+"</h6>  " );
						}else{
							let mitraos_now = '<?php echo $mitraos; ?>';
							let mitraos_kandidat = data['MITRAOS'];
							if (mitraos_now == 'KOPERASI' && mitraos_kandidat == 'CAKAP') 
							{
									swal({
									title: "Error", 
									text: "❌ NIK atas nama "+data['NAMA']+" tersebut sudah ada di data kandidat "+data['MITRAOS']+" Silahkan transfer data jika akan diganti kepemilikan vendor", 
									type: "error"
								});
							}
							else{
								swal({
									title: "Error", 
									text: "❌ NIK atas nama "+data['NAMA']+" tersebut sudah ada di data kandidat "+data['MITRAOS']+"", 
									type: "error"
								});
							}
							
						}
						
						document.getElementById("submit1").disabled = true;
					}else{
						if (nik.length!=16) {
								$('#pesan').show(); 
								$("#pesan").html("<span style='color:red;'>NIK harus terdiri dari 16 angka..!<span>");
								document.getElementById("submit1").disabled = true;
								valid = false;
							} else {	
								$("#pesan").html("<span style='color:green;'>✔ NIK tersebut belum ada.. </b><span>");
								document.getElementById("submit1").disabled = false;
							}	
						
					}
					
				}
			})

		});
	});
		 function cek_nama_tgl()
		 {
		 	var nama = $("#nama").val();
		 	var tanggal_lahir = $("#tanggal").val();
		 	$.ajax({
				type	: 'POST',
				url 	: '<?php echo base_url();?>os/dataos/check_nama_tgl',
				data 	: 'nama='+nama+'&tanggal_lahir='+tanggal_lahir,
				dataType: 'JSON',
				success	: function(data){
					if (data['STATUS']=='1') {
						
						$("#pesan").html("<span style='color:red;'>❌ NIK tersebut sudah ada..! </b><span>");
						if (data['MITRAOS'] =='UMUM')
						{
							$('#send_hr').modal('show');
							$('#req_nik').val(data['NIK']);
							$('#req_nama').val(data['NAMA']);
							$('#req_keterangan').val(data['KETERANGAN']);
							$('#req_iq').val(data['IQ']);
							$('#req_tanggal_test').val(data['D_TEST']);
							$('#req_posisi').val(data['POSISI']);
							$('#send_hr_header').html(' Berdasarkan nama dan tanggal lahir tersebut, kandidat tersebut sudah ada..! ');
							$('#send_hr_body').html("<h6 class='text-semibold'>Kandidat atas nama "+data['NAMA']+" sudah ada di data kandidat "+data['MITRAOS']+"</h6>  " );
						}else{
							swal({
								title: "Error", 
								text: "❌Berdasarkan nama dan tanggal lahir tersebut, kandidat atas nama "+data['NAMA']+" tersebut sudah ada di data kandidat "+data['MITRAOS']+" ", 
								type: "error"
							});
						}
						
						document.getElementById("submit1").disabled = true;
					}
					
				}
			})
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
                var kabupaten = $("#kabupaten").val();
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
                var kecamatan = $("#kecamatan").val();
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
</script>


