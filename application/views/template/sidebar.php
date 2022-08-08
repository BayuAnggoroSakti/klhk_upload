<?php
$userlvl = $this->session->userdata('userlvl'); 
$uri1    = $this->uri->segment(2);
$mitraos = $this->session->userdata('mitraos');

if ($userlvl=='1') {
	if ($uri1=='dashboardadm'){
	    $page_dashboard	= "active";
	    $page_dataos		= "";
	    $page_master		= "";
	} elseif ($uri1=='dataos'||$uri1=='umum'){
	    $page_dashboard	= "";
	    $page_dataos		= "active";
	    $page_master		= "";    
	} elseif (($uri1=='users')||($uri1=='sekolah')||($uri1=='jurusan')||($uri1=='posisi')) {
		$page_dashboard	= "";
		$page_dataos		= "";
	   $page_master		= "active";
	}
}elseif ($userlvl=='3') {
	if ($uri1=='dashboardos'){
	    $page_dashboard	= "active";
	    $page_transfer		= "";
	    $page_upload		= "";
	    $page_upload_csv		= "";
	    $page_dataos		= "";
	    $page_master		= "";  
	} elseif ($uri1=='dataos'||$uri1=='umum'||($uri1=='request_vendor')||($uri1=='upload_data')) {
	    $page_dashboard	= "";
	    $page_dataos		= "active";
	    $page_master		= "";
	    $page_transfer		= "";
	    $page_upload_csv		= "";  
	    $page_upload		= "";  
	} elseif ($uri1=='upload'){
	    $page_dashboard	= "";
	    $page_dataos		= "";
	    $page_transfer		= "";
	    $page_master		= "";    
	    $page_upload_csv		= "";
	    $page_upload		= "active";
	} elseif ($uri1=='data_transfer'){
	    $page_dashboard	= "";
	    $page_dataos		= "";
	    $page_master		= "";    
	    $page_upload_csv		= "";
	    $page_transfer		= "active";
	    $page_upload		= "";
	}
	 elseif (($uri1=='users')||($uri1=='sekolah')||($uri1=='jurusan')||($uri1=='posisi')) {
		$page_dashboard	= "";
		$page_dataos		= "";
		$page_upload		= "";
		$page_transfer		= "";
		$page_upload_csv		= "";
	   $page_master		= "active";
	}
}elseif ($userlvl=='2') {
	if ($uri1=='dashboardhr'){
	    $page_dashboard	= "active";
	    $page_request_vendor		= "";
	    $page_dataos		= "";
	    $page_transfer		= "";
	    $page_upload		= "";
	    $page_master		= "";
	} elseif ($uri1=='dataos'){
	    $page_dashboard	= "";
	    $page_dataos		= "active";
	     $page_request_vendor		= "";
	     $page_upload		= "";
	     $page_transfer		= "";
	    $page_master		= "";    
	} elseif ($uri1=='umum'){
	    $page_dashboard	= "";
	    $page_dataos		= "active";
	    $page_transfer		= "";
	    $page_upload		= "";
	     $page_request_vendor		= "";
	    $page_master		= "";    
	} elseif ($uri1=='request_vendor'){
	    $page_dashboard	= "";
	    $page_upload		= "";
	    $page_transfer		= "";
	    $page_request_vendor		= "active";
	     $page_dataos		= "";
	    $page_master		= "";    
	}elseif ($uri1=='upload'){
	    $page_dashboard	= "";
	    $page_upload		= "active";
	    $page_request_vendor		= "";
	    $page_dataos		= "";
	    $page_transfer		= "";
	    $page_master		= "";    
	}elseif ($uri1=='data_transfer'){
	    $page_dashboard	= "";
	    $page_upload		= "";
	    $page_request_vendor		= "";
	    $page_dataos		= "";
	    $page_transfer		= "active";
	    $page_master		= "";    
	} 
	elseif (($uri1=='users')||($uri1=='sekolah')||($uri1=='jurusan')||($uri1=='posisi')) {
		$page_dashboard	= "";
		$page_upload		= "";
		 $page_request_vendor		= "";
		$page_dataos		= "";
		$page_transfer		= "";
	   $page_master		= "active";
	}
}
?>
<!-- Second navbar / Menu -->
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-left collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<?php 
				if ($userlvl=='1') { ?>
				<ul class="nav navbar-nav">
					<li class="<?php echo $page_dashboard;?>"><a href="<?php echo site_url('adm/dashboardadm');?>"><i class="icon-display4 position-left"></i> Dashboard</a></li>
					<li class="dropdown <?php echo $page_dataos;?>">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-users position-left"></i> Pelamar <span class="caret"></span>
								</a>
								<ul class="dropdown-menu width-250">
									<li>
										<a href="<?php echo site_url('adm/dataos');?>"><i class="icon-user"></i> Data OS</a>
										<a href="<?php echo site_url('adm/umum');?>"><i class="icon-user-minus"></i>Kandidat Umum</a>
									
									
									</li>
								</ul>
							</li>		
					<li class="dropdown <?php echo $page_master;?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-stars position-left"></i> Master <span class="caret"></span>
							</a>
							<ul class="dropdown-menu width-250">
								<li>
									<a href="<?php echo site_url('adm/users');?>"><i class="icon-users"></i> Master User</a>
									<a href="<?php echo site_url('adm/sekolah');?>"><i class="icon-library2"></i> Master Sekolah</a>
									<a href="<?php echo site_url('adm/jurusan');?>"><i class="icon-graduation"></i> Master Jurusan</a>
									<!-- <a href="<?php echo site_url('adm/vendoros');?>"><i class="icon-office"></i> Master Vendor OS</a> -->
									<a href="<?php echo site_url('adm/posisi');?>"><i class="icon-users2"></i> Master Posisi</a>
								</li>
							</ul>
						</li>				
				</ul>
			<?php
				} elseif ($userlvl == '3') { ?>
				<ul class="nav navbar-nav">
					<li class="<?php echo $page_dashboard;?>"><a href="<?php echo site_url('os/dashboardos');?>"><i class="icon-display4 position-left"></i> Dashboard</a></li>
					<li class="dropdown <?php echo $page_dataos;?>">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-users position-left"></i> Pelamar <span class="caret"></span>
								</a>
								<ul class="dropdown-menu width-250">
									<li>
										<a href="<?php echo site_url('os/dataos');?>"><i class="icon-user"></i> Data OS</a>
										<a href="<?php echo site_url('os/umum');?>"><i class="icon-user-minus"></i>Kandidat Umum</a>
										<a href="<?php echo site_url('os/request_vendor');?>"><i class="icon-compose"></i>Request Pelamar</a>
										<a href="<?php echo site_url('os/upload_data');?>"><i class="icon-upload"></i>Upload Kandidat</a>
									
									</li>
								</ul>
							</li>		
					<li class="dropdown <?php echo $page_master;?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-stars position-left"></i> Master <span class="caret"></span>
							</a>
							<ul class="dropdown-menu width-250">
								<li>
									<a href="<?php echo site_url('os/sekolah');?>"><i class="icon-library2"></i> Master Sekolah</a>
									<a href="<?php echo site_url('os/jurusan');?>"><i class="icon-graduation"></i> Master Jurusan</a>
									<a href="<?php echo site_url('os/posisi');?>"><i class="icon-users2"></i> Master Posisi</a>
								</li>
							</ul>
						</li>		
					<!-- <li class="<?php echo $page_upload;?>"><a href="<?php echo site_url('os/upload');?>"><i class="icon-upload position-left"></i> Upload Data</a></li>	 -->
					<?php 
						if ($mitraos == 1) { ?>
								<li class="<?php echo $page_transfer;?>"><a href="<?php echo site_url('os/data_transfer');?>"><i class="icon-download position-left"></i> Data Transfer</a></li>		
					<?php
						} 
					?>	
				
				</ul>
			<?php
				} elseif ($userlvl == '2') { ?>
				<ul class="nav navbar-nav">
					<li class="<?php echo $page_dashboard;?>"><a href="<?php echo site_url('hr/dashboardhr');?>"><i class="icon-display4 position-left"></i> Dashboard</a></li>
					<li class="<?php echo $page_request_vendor; ?>"><a href="<?php echo site_url('hr/request_vendor');?>"><i class="icon-envelope position-left"></i> Request Vendor </a></li>
					<li class="dropdown <?php echo $page_dataos;?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-users4 position-left"></i> Data Pelamar <span class="caret"></span>
							</a>
							<ul class="dropdown-menu width-250">
								<li>
									<a href="<?php echo site_url('hr/dataos');?>"><i class="icon-user"></i> Pelamar OS</a>
								
								</li>
								<li>
									<a href="<?php echo site_url('hr/umum');?>"><i class="icon-user"></i> Pelamar Reguler</a>
								
								</li>
							</ul>
						
						</li>
					<!-- <li class="<?php echo $page_upload;?>"><a href="<?php echo site_url('hr/upload');?>"><i class="icon-upload position-left"></i> Upload Data</a></li>	 -->
					<li class="<?php echo $page_transfer;?>"><a href="<?php echo site_url('hr/data_transfer');?>"><i class="icon-download position-left"></i> Data Transfer</a></li>	
				<!-- 	<li class="dropdown <?php echo $page_master;?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-stars position-left"></i> Master <span class="caret"></span>
							</a>
							<ul class="dropdown-menu width-250">
								<li>
									<a href="<?php echo site_url('hr/vendoros');?>"><i class="icon-library2"></i> Master Vendor OS</a>
								
								</li>
							</ul>
						</li>				 -->
				</ul>
			<?php
			}
			?>

			

			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="<?php echo site_url('auth/logout');?>"> 
						<i class=" icon-switch2 position-right"></i>&nbsp; <span class="text-danger text-semibold"> Logout </span>&nbsp; | &nbsp;
						<i class="icon-history position-left"></i> Version <span class="label label-inline position-right bg-success-400">1.0</span>	
					</a>	
				</li>
			</ul>
		</div>
	</div>
<!-- /second navbar -->