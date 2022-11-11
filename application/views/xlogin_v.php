<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	 
	<title>~ PT STC ~</title>
	<link rel="icon" href="<?=base_url();?>assets/icon_pura.png">
	<!-- Global stylesheets -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
	<link href="<?php echo base_url(); ?>assets/css/fonts.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- <link href="<?php //echo base_url(); ?>assets/css/style_new.css" rel="stylesheet" type="text/css"> -->
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/login.js"></script>
	<!-- /theme JS files -->

	<!-- Sweet Alert -->
	<link href="<?php echo base_url(); ?>assets/js/sweetalert2.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
	<?php echo $script_captcha; // javascript recaptcha ?>
</head>
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
<body background="<?php echo base_url(); ?>assets/images/backlogin.jpg" width="100%">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-teal">			
		<div class="navbar-header">
			<h1>PT INTEGRA ENVIRO</h1>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-display4"></i> </a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
		 	<ul class="nav navbar-nav navbar-right"> 
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"></span>&nbsp;1.0
					</a>	
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<br><br>
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
				  <div class="row">
				  	<div class="col-lg-6">
					</div>	
				  	<div class="col-lg-6">
						<!-- Simple login form -->
						<form action="<?php echo site_url('auth/validasi'); ?>" name="login" method="post">
	            			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">						
							<div class="panel panel-body login-form">
								<div class="text-center">
									<div class="icon-object border-slate-300 text-slate-300"><i class="icon-users2"></i></div>
									<h5 class="content-group">Login Upload data KLHK  <small class="display-block">Masukkan nama user dan password Anda</small></h5>
								</div>

								<div class="form-group has-feedback has-feedback-left">
									<!-- <input type="text" class="form-control" placeholder="Username" name=""> -->
					    			<input id="username" type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" pattern="^[a-zA-Z][a-zA-Z0-9-_\]{1,20}$" title="Don't Use SPACE" placeholder="Nama user..." minlength="3" maxlength="16" autofocus required autocomplete="off">
	                    			<?php echo form_error('username', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>

									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group has-feedback has-feedback-left">
									<!-- <input type="text" class="form-control" placeholder="Password"> -->
	                    			<input type="password" class="form-control" placeholder="Password..." name="password" autocomplete="off" required>
	                    			<?php echo form_error('password', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>								
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>
							
							<div class="row">
								<div class="col-md-10">
									<div class="form-group text-center" style="font-size: 9px">
										<?php echo $captcha // tampilkan recaptcha ?>
									</div>	
								</div>	
							</div>	

								<?php
					        	if ($this->session->flashdata('notification')) {
					        	?>
					            <div class="form-body">
					                <div class="alert alert-block alert-danger fade in" align="center">
					                    <?php echo $this->session->flashdata('notification'); ?>
						           </div>
					            </div>
					         <?php } ?>
								<div class="form-group">
									<button type="submit" class="btn bg-teal btn-block">Log in <i class="icon-circle-right2 position-right"></i></button>
								</div>
																					
							</div>
						</form>
						<!-- /simple login form -->
						<br><br>
						<!-- Footer -->
						<div class="footer">						
							&copy; <?php echo date('Y'); ?> - By Bayu Anggoro Sakti
						</div>
						<!-- /footer -->
					 </div>
					 
				  </div>		
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
