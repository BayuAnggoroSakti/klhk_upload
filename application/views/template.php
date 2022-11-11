  <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>~ PT INTEGRA ENVIRO ~</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/fonts.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="<?=base_url();?>assets/icon_pura.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/leaflet/leaflet.css">
	<style type="text/css">
	.ui-datepicker { position: relative; z-index: 10000 !important; }
	</style>
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<!-- <script type="text/javascript" src="<?php  //echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
	<!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/pages/datatables_responsive.js"></script> -->
	<!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/pages/datatables_responsive1.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_inputs.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/switch.min.js"></script>
	<!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/pages/form_validation.js"></script> -->
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
		
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/bootbox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/components_modals.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/inputs/duallistbox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_dual_listboxes.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script> -->
	<!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/pages/form_select2.js"></script> -->

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/invoice_archive.js"></script>
	<!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/pages/invoice_archive1.js"></script>
	<script type="text/javascript" src="<?php //echo base_url();?>assets/js/pages/invoice_archive_po.js"></script> -->

	<!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/plugins/notifications/sweet_alert.min.js"></script> -->

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/maskmoney/jquery.maskMoney.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/datatables_basic.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/extensions/fixed_columns.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/datatables_extension_fixed_columns.js"></script>
	<!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/pages/datatables_extension_fixed_columns1.js"></script> -->


	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/media/fancybox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/gallery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/components_animations.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/components_thumbnails.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery_ui/datepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/pickadate/legacy.js"></script>
	<script src="<?php echo base_url(); ?>assets/leaflet/leaflet.js"></script>
<!-- 	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLRXCImhLD5PxRlAk8gZ13fBXxbfbiw44&callback=myMap" async defer></script> -->
	<!-- AIzaSyDhqY1z-trL-qwuK88o7CLttuCFZdepgg8 (asli aktif) -->
	

</head>

<body class="navbar-top-md-md">
	<div class="navbar-fixed-top">
		<!-- Main navbar / header -->
		<?php echo $_header; ?>
		<!-- /main navbar -->


		<!-- Second navbar / Menu -->
		<?php echo $_sidebar; ?>
		<!-- /second navbar -->
	</div>

	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-display4 position-left"></i>
					<span class="text-semibold"><?php echo $title_header;?></span> - <?php echo $title_subheader;?>
					<small class="display-block">Hallo, <?php echo $namalogin;?></small>
				</h4>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
				<?php echo $content; ?>
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		<?php echo $_footer; ?>
		<!-- /footer -->

	</div>
	<!-- /page container -->

</body>
</html>
