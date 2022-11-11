<!-- Main navbar / header -->
	<div class="navbar navbar-inverse bg-teal">				
		<div class="navbar-header">
			<h1>PT INTEGRA ENVIRO</h1>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			
			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url(); ?>assets/images/avatar/avatar1.png" alt="">
						<span><?php echo $namalogin;?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo site_url('auth/logout');?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
					
				</li>
			</ul>
		</div>
	</div>
<!-- /main navbar -->