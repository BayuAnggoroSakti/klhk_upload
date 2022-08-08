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
	  var valid = false;
		$(document).ready(function(){
			$("#xsekolah").keyup(function(){//change
				$("#pesan").html("check sekolah...");
				var xsekolah = $("#xsekolah").val();
				str = xsekolah;
				
				$(this).val(str);
				
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>os/sekolah/check_sekolah",
				data: $('#frm_tambah').serialize(),
				dataType: "html",
				success: function(txt) {
						if(txt == 1){
							$('#pesan').show(); 
							$("#pesan").html("<span style='color:red;'>Nama sekolah tersebut sudah ada..! </b><span>");
							document.getElementById("submit1").disabled = true;
							valid = false;
						} else if(txt == 0){
							if (str.length<=3) {
								$('#pesan').show(); 
								$("#pesan").html("<span style='color:red;'>Nama sekolah tidak boleh kurang dari 5 huruf..!<span>");
								document.getElementById("submit1").disabled = true;
								valid = false;
							} else {	
								$('#pesan').show(); 
								$("#pesan").html("<span style='color:green;'>Nama sekolah belum ada.<span>");
								document.getElementById("submit1").disabled = false;
								valid = true;
							}	
						}
				}
			});
			//return false;		
			});
		});
	</script>
<?php
		foreach ($dtprofil as $p) {
			$iduser 	  	  = trim($p->user_id);
			$namauser     = trim($p->user_username);
			$namalengkap  = trim($p->user_name);
			$stsuser 	  = trim($p->user_status);	
			$lvluser 	  = trim($p->user_level);
			$xlogin		  = trim($p->user_login);
			$xlogout	  	  = trim($p->user_logout);
			$ip 		  	  = trim($p->user_ip);
		}		
	?>


<!-- User profile -->
<div class="row">
	<div class="col-lg-9">
		<div class="tabbable">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="settings">

				<!-- Profile info -->
				<div class="panel panel-flat">

					<div class="panel-heading">
						<!-- <div class="alert alert-info alert-styled-left alert-bordered">
							<span class="text-semibold">Informasi : </span> Input User Baru Non Peserta 
					   </div>											 -->
						<h6 class="panel-title"><b>TAMBAH SEKOLAH BARU</b></h6>
					</div>
					
					<div class="panel-body">
						<form id="frm_tambah" action="<?php echo base_url('os/sekolah/xsave');?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>Nama Sekolah <span class="text-danger">*</span></label>
										<input type="text" style="font-size: 14px;" name="xsekolah" id="xsekolah" class="form-control  text-semibold required" autocomplete="off" minlength="5" maxlength="50" placeholder="min 5 character" value="<?=set_value('xsekolah');?>" required>
										<div id="pesan"></div>
									</div>
									
								</div>

							</div>
							
																																								
							<hr>
	                  <div class="text-right">
	                  	<button type="submit" id="submit1" name="submit1" onclick="return submitForm()" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="icon-floppy-disk"></i></b> Simpan</button>
	                  	<a href="<?php echo base_url('os/sekolah');?>"><button type="button" class="btn btn-danger btn-labeled btn-rounded"><b><i class="icon-cross2"></i></b> Batal</button></a>
	                  </div>
						</form>
				</div>
			</div>
		<!-- /profile info -->

			</div>
												
		</div>
	</div>
</div>
	<div class="col-lg-3">

						<!-- User thumbnail -->
						<div class="thumbnail">
							<div class="thumb thumb-rounded thumb-slide">
								<img src="<?php echo base_url(); ?>assets/images/avatar/avatar1.png" alt="">
								<div class="caption">
									<span>
										<a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
										<a href="#" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
									</span>
								</div>
							</div>
						
					    	<div class="caption">
					    		<h6 class="text-semibold no-margin text-center"><?php echo $username;?> <small class="display-block"><?php echo $namalogin;?></small></h6>
					    		<hr>
					    		<?php
					    			if ($xlogin=="") {
					    				$dtlogin = "";
					    			} else {
										$dtlogin  = date('d-m-Y H:i:s', strtotime($xlogin));
									}	
									if ($xlogout=="") {
					    				$dtlogout  = "";
					    			} else {
										$dtlogout  = date('d-m-Y H:i:s', strtotime($xlogout));
									}	
								?>
					    		<p class="text-left">
					    			<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
									    <td height="22">Date Login </td>
									    <td align="center">:</td>
									    <td>&nbsp;<?php echo $dtlogin;?></td>
									  </tr>
									  <tr>
									    <td height="22">Date Logout </td>
									    <td align="center">:</td>
									    <td>&nbsp;<?php echo $dtlogout;?></td>
									  </tr>
									  <tr>
									    <td height="22">IP Address </td>
									    <td align="center">:</td>
									    <td>&nbsp;<?php echo $ip;?></td>
									  </tr>
									</table>
					    		</p>	

		
					    	</div>
					    	

				    	</div>
				    	<!-- /user thumbnail -->

					</div>
				</div>
				<!-- /user profile -->


<script>

function submitForm(){	
	 var xsekolah 	 = $('#xsekolah').val();
    
    if (xsekolah.trim()==''){
    	alert('Nama sekolah wajib diisi..!');
    	document.getElementById("submit1").disabled = true;
      $('#xsekolah').focus();        
		return false;		
	 }
}
</script>

<script>
 	
  	
</script>				