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
	if ($vtanggal==''){ ?> 
		<script>
			$ (document).ready(function() {
   			$('#jendela').modal('show');
   		});	
		</script>
	<?php } ?>	

	<script>
		$(document).ready(function() {
			$("#xtanggal").change(function(){
				var url = "<?php echo site_url('report/ajax_barang');?>/"+$(this).val();
					$("#xkdbrg").load(url);
						return false;
					})					
				});
	</script>
	<!-- User content -->
	<div class="row">				
		<div class="col-lg-12"> 						
			<div class="alert alert-info alert-styled-left alert-bordered">
					<span class="text-bold text-danger text-bold" style="font-size: 14px;">INFORMASI : </span> Status warna <span class="text-danger text-bold">merah = High</span> dan <span class="text-warning text-bold"> kuning = Low</span> 
					<!-- <ol>
						<li>Status warna <span class="text-danger text-bold">merah = High dan kuning = Low</span></li>						
					</ol> -->
				</div>	
			<!-- Basic responsive configuration -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"><b><?php echo strtoupper($title_header.' '.$title_subheader); ?></b></h5><span class="text-danger text-bold" style="font-size: 15px;"> TANGGAL : <?php echo $vtanggal;?> , KODE BARANG : <?php echo $vkodebrg.' - '.$vnamabrg;?>  </span>
					<div class="heading-elements">
						<button type="button" data-toggle="modal" data-target="#jendela" class="btn btn-success btn-labeled btn-xs"><b><i class="icon-select2"></i></b> Pilih Tanggal & Kode Barang</button>
	            </div>						
				</div> 
				<?php
				if ($dtheader!='') {
				?>
				<div class="table-responsive">
					<table class="table table-xxs table-bordered">		
						<thead>
							<tr class="bg-teal">
								<th class="text-center">No</th>
								<th class="text-center">No Roll</th>
								<th class="text-center">Jam</th>
								
								<?php
									foreach ($dtheader[0] as $key => $value){
										if ($value!='SPESIFIKASI') {
											$vvalue = str_replace(' ','&nbsp;',$value);
											//echo '<th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.trim($vvalue).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>';
											echo '<th class="text-center">'.trim($vvalue).'</th>';
										}	
									}
								?>								
							</tr>								
							<tr>
								<th class="text-center"></th>
								<th class="text-center"></th>
								<th class="text-center"></th>
								<?php
									foreach ($dtheader[1] as $key => $value){
										if ($value!='SATUAN UNIT ') {
											echo '<th class="text-center" style="font-size: 11px;">'.$value.'</th>';
										}
									}
								?>	
							</tr>				
							<tr>
								<th class="text-center"></th>
								<th class="text-center"></th>
								<th class="text-center"></th>
								<?php
									foreach ($dtheader[2] as $key => $value){
										if ($value!='TEST METH') {
											echo '<th class="text-center" style="font-size: 11px;">'.$value.'</th>';
										}	
									}
								?>	
							</tr>				
							<tr>
								<th class="text-center"></th>
								<th class="text-center"></th>
								<th class="text-center"></th>
								<?php
									foreach ($dtheader[3] as $key => $value){
										if ($value!='TARGET') {
											//$zvalue = str_replace(' ','&nbsp;',trim($value));
											$xjum   = strlen($value);
											if ($xjum<10) {
												$value3 = str_replace(' ','&nbsp;',trim($value));
												echo '<th class="text-center" bgcolor="#009933" style="font-size: 11px; font-weight:bold;">&nbsp;'.$value3.'&nbsp;</th>';
											} else {
												$value3 = str_replace(' ','&nbsp;',trim($value));
												echo '<th class="text-center" bgcolor="#009933" style="font-size: 11px; font-weight:bold;">&nbsp;&nbsp;'.$value3.'&nbsp;&nbsp;</th>';	
											}
											
										}	
									}
								?>	
							</tr>				
						</thead>				
						<tbody>		
								<?php
								$row = count($dtrow);
								$jumrow = $row-1;
								for ($x=0; $x<=$jumrow; $x++) {	
									echo '<tr>';
									foreach ($dtrow[$x] as $key => $value){
										if (($value=='|')||($value=='|L')||($value=='|H')||($value=='|N')) {
											echo '<td class="text-center"> - </td>';	
										} else {
											$pos = strpos($value,'|');
											// if ($pos==0) {
											// 	echo '<td class="text-center"> - </td>';	
											// } else
											if ($pos>0) {
												$vv = explode('|', $value);
												$vvalue = $vv[0];
												$color  = $vv[1];
												if (($vvalue!='')&&($color=='')) {
													echo '<td class="text-center">'.$vvalue.'</td>';	
												} elseif (($vvalue=='')&&($color!='')) {	
													echo '<td class="text-center"> - </td>';	
												} else {	
													if ($color=='H') {											
														echo '<td class="text-center" bgcolor="#FF0000"><span style="color:#FFF">'.$vvalue.'</span></td>';
													} elseif ($color=='L'){
														echo '<td class="text-center" bgcolor="#FFFF00" >'.$vvalue.'</td>';	
													} else {
														echo '<td class="text-center">'.$vvalue.'</td>';	
													}
												}											
											} else {
												echo '<td class="text-center">'.$value.'</td>';	
											}	
										}	
									}
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				</div>
			<?php } ?>
			</div>
			<!-- /basic responsive configuration -->
		</div>
	</div> 
<!-- /user content -->

						<!-- Modal select year -->
						<div id="jendela" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header bg-teal">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h6 class="modal-title"><i class="icon-checkmark4"></i>&nbsp;&nbsp;Pilih Tanggal & Kode Barang</h6>
									</div>

									<form id="frm_modal1" class="form-horizontal" action="<?php echo site_url('report/pilih');?>" method="post" enctype="multipart/form-data">	
										<div class="modal-body">
											<div class="form-group">
												<div class="row">
													<div class="col-md-6">
														<label>Tanggal <span class="text-danger">*</span></label>
														<input type="text" class="form-control required input-sm tanggal" placeholder="Masukkkan tanggal..." name="xtanggal" id="xtanggal" value="<?php echo date('d-m-Y');?>" autocomplete="off" required readonly>
													</div>
													<div class="col-md-6">
														<label>Kode Barang <span class="text-danger">*</span></label>
														<select name="xkdbrg" id="xkdbrg" placeholder="Pilih Kode Barang" class="form-control" required>
															<option></option>															
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn bg-teal btn-xs btn-labeled"><b><i class="icon-select2"></i></b> OK</button>
											<button type="button" class="btn btn-danger btn-xs btn-labeled" data-dismiss="modal"><b><i class="icon-close2"></i></b> Batal</button>
										</div>
									</form>
								</div>
							</div>
						</div> 
						<!-- /modal select year -->


<script src="<?php echo base_url();?>assets/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
		$(document).ready(function () {
			$('.tanggal').datepicker({
					format: "dd-mm-yyyy",
						autoclose:true
					 });
				});
</script>
