<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/datatables_responsive.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_select2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/sweetalert2.css">

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
				
 <?php
	//if ($tanggal==''){ ?> 
		<!-- <script>
			$ (document).ready(function() {
   			$('#nomor-po').modal('show');
   		});	
		</script>	 -->
	<?php //} ?>	

	<!-- User content -->
	<!-- <div class="row">
		<div class="col-lg-12"> -->
						
			<!-- Basic responsive configuration -->
			<!-- <div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"><b><?php //echo strtoupper($title_header.' '.$title_subheader); ?></b></h5><span class="text-danger text-bold" style="font-size: 15px;"> TANGGAL : <?php //echo $tanggal;?> , KODE BARANG : <?php //echo $kodebrg;?> </span>
					<div class="heading-elements">
						<button type="button" data-toggle="modal" data-target="#nomor-po" class="btn btn-success btn-labeled btn-xs"><b><i class="icon-select2"></i></b> Masukkan Tanggal & Kode Barang</button>
	            </div>						
				</div> -->
				<!-- <div class="table-responsive">
					<table class="table table-xxs table-bordered">		
						<thead>
							<tr class="bg-teal">
								<th rowspan="2" class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;Tanggal&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th colspan="3" class="text-center">PIB</th>
								<th colspan="3" class="text-center">LPB</th>
								<th colspan="3" class="text-center">IPB2</th>
								<th colspan="3" class="text-center">SP Langsir</th>
								<th colspan="3" class="text-center">SP Kirim</th>
								<th colspan="3" class="text-center">PEB</th>
							</tr>						
							<tr class="bg-teal">
								<th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th class="text-center">&nbsp;&nbsp;Jumlah&nbsp;&nbsp;</th>
								<th class="text-center">Satuan</th>
								<th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th class="text-center">&nbsp;&nbsp;Jumlah&nbsp;&nbsp;</th>
								<th class="text-center">Satuan</th>
								<th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th class="text-center">&nbsp;&nbsp;Jumlah&nbsp;&nbsp;</th>
								<th class="text-center">Satuan</th>
								<th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th class="text-center">&nbsp;&nbsp;Jumlah&nbsp;&nbsp;</th>
								<th class="text-center">Satuan</th>
								<th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th class="text-center">&nbsp;&nbsp;Jumlah&nbsp;&nbsp;</th>
								<th class="text-center">Satuan</th>
								<th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th class="text-center">&nbsp;&nbsp;Jumlah&nbsp;&nbsp;</th>
								<th class="text-center">Satuan</th>	
							</tr>	
						</thead>				
						<tbody>					
						</tbody>
					</table>
				</div>	 -->
			<!-- </div> -->
			<!-- /basic responsive configuration -->
		<!-- </div>					 -->
	<!-- </div> -->
<!-- /user content -->

						<!-- Modal select year -->
						<!-- <div id="nomor-po" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header bg-teal">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h6 class="modal-title"><i class="icon-checkmark4"></i>&nbsp;&nbsp;Masukkan Tanggal & Kode Barang</h6>
									</div>

									<form id="frm_modal1" class="form-horizontal" action="<?php //echo site_url('report/pilih');?>" method="post" enctype="multipart/form-data">	
										<div class="modal-body">
											<div class="form-group">
												<div class="row">
													<div class="col-md-6">
														<label>Tanggal <span class="text-danger">*</span></label>
														<input type="text" class="form-control required " placeholder="Masukkkan tanggal..." name="xtanggal" id="xtanggal" autocomplete="off">
													</div>
													<div class="col-md-6">
														<label>Kode Barang <span class="text-danger">*</span></label>
														<input type="text" class="form-control required " placeholder="Masukkkan kode Barang..." name="xkodebrg" id="xkodebrg" autocomplete="off">
													</div>
												</div>
											</div>
											
										</div>
										<hr>
										<div class="modal-footer">
											<button type="submit" class="btn bg-teal btn-xs btn-labeled"><b><i class="icon-select2"></i></b> OK</button>
											<button type="button" class="btn btn-danger btn-xs btn-labeled" data-dismiss="modal"><b><i class="icon-close2"></i></b> Batal</button>
										</div>
									</form>
								</div>
							</div>
						</div> -->
						<!-- /modal select year -->


