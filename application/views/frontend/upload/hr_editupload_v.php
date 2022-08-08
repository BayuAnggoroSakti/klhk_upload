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
		function submitData(xid) {
		    var id = xid;
		    swal({
		        title: 'Apakah anda yakin ?',
		        text: 'Data tersebut akan di upload ke Aplikasi Recruitment!',
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
			            url : "<?=site_url('hr/upload/submit_upload')?>/"+id,
			            type: "POST",
			            dataType: "JSON",
			            success: function(data) {
			            	location.reload();
			            	// if (data['status'] == 1) 
			            	// {
			            	// 	   swal({
					           //          title:"Success",
					           //          text: "Data berhasil di Upload",
					           //          showConfirmButton: false,
					           //          type: "success",
					           //          timer: 2000
					           //      });
			            	// }else{
			            	// 	swal({
				            //         title:"Error",
				            //         text: "Ada kandidat yang belum di konfirmasi",
				            //         showConfirmButton: false,
				            //         type: "error",
				            //         timer: 2000
				            //     });
			            	// }
			             
			            },
			            error: function (jqXHR, textStatus, errorThrown) {
			            	location.reload();
			                // //alert('Error Hapus Data');
			                // console.log('gagal');
			                // swal({
			                //     title:"Error",
			                //     text: "Data failed to delete",
			                //     showConfirmButton: false,
			                //     type: "error",
			                //     timer: 2000
			                // });
			            }
			        });
		    });

		}
		</script>

<?php 
	if ($dtheader[0]->status != 2) {
		$disabled = '';
	} else {
		$disabled = 'disabled';
	}
	
?>

<!-- User profile -->
<div class="row">

	<div class="alert alert-info alert-styled-left alert-bordered">
					<span class="text-bold text-danger"><h5><b>INFORMASI ! </b></h5></span> 
					<ol>
						<li>Silahkan <span class="text-danger text-bold">accept atau reject</span> data kandidat yang diajukan oleh vendor></li>
						<li>Saat melakukan <span class="text-danger text-bold">Reject</span> pastikan untuk mengisi keterangan <span class="text-danger text-bold">kenapa anda melakukan reject</span></li>
						<li>Setelah melakukan proses persetujuan, silahkan klik tombol <span class="text-danger text-bold">submit</span> untuk melakukan upload data ke <span class="text-danger text-bold">Aplikasi Recruitment</span></li>
						<li>Selama data belum di <span class="text-danger text-bold">Submit</span>, maka proses accept atau reject masih bisa <span class="text-danger text-bold">di revisi</span></li>
					
					</ol>
				</div>
	

	<div class="col-lg-12">

		<div class="panel panel-flat">
			<table id="tableData" class="table table-xs datatable-responsive">
				<thead>
					<tr class="bg-teal">
					<th>No</th>
	               <th>NIK</th>
	               <th>Nama</th>
	               <th>Alamat</th>
	               <th>Kota</th>
	               <th>Posisi</th>
	               <th>Keterangan</th>
	               <th>Status</th>
				   <th width="7%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if (count($dtuser) ==0)
						{ ?>
							<tr>
								<td colspan="7" align="center">No Data Found</td>
							</tr>
					<?php
						}else{
							$no =1;
							foreach ($dtuser as $key) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $key->biodata_nik; ?></td>
									<td><?php echo $key->biodata_nama; ?></td>
									<td><?php echo $key->biodata_alamat; ?></td>
									<td><?php echo $key->kabupaten_nama; ?></td>
									<td><?php echo $key->posisi_nama; ?></td>
								
									<td>
										<form action="<?php echo site_url('hr/upload/update_detail') ?>" method="POST" class="main-search">
											<input type="hidden" name="biodata_nik" value="<?php echo $key->biodata_nik; ?>">
											<input type="hidden" name="biodata_nama" value="<?php echo $key->biodata_nama; ?>">
											<input type="hidden" name="biodata_tanggal_lahir" value="<?php echo $key->biodata_tanggal_lahir; ?>">
											<textarea name="catatan_hr" class="form-control"><?php echo $key->catatan_hr; ?></textarea>
									</td>
										<td>
										<?php 
											if ($key->status == 0) {
												echo '<span class="label label-warning">MENUNGGU KONFIRMASI HR</span>';
											}else if($key->status == 1){
												echo '<span class="label label-success">Accepted</span>';
											} else {
												echo '<span class="label label-danger">Rejected</span>';
											}
											
										?>
									</td>
									<td>	
										
															<input type="hidden" name="detail_upload_id" value="<?php echo $key->detail_upload_id; ?>">
															<button <?php echo $disabled; ?>  name="submit" type="submit" value='1' class="btn btn-success btn-labeled btn-xs"><b><i class="icon-check"></i></b>Accept</a></button>
															<button  <?php echo $disabled; ?> name="submit" type="submit" value='2' class="btn btn-danger btn-labeled btn-xs"><b><i class="icon-close2"></i></b>Reject</a></button>
										</form>
									</td>
								</tr>
						<?php
							}
						}
					?>
					
				</tbody>
			</table>

		</div>
		<div class="panel panel-flat">
							<div class="panel-heading">
								<h6 class="panel-title"><i class="icon-files-empty position-left"></i> <b>Upload details</b></h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		
				                	</ul>
			                	</div>
							<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

							<table class="table table-borderless table-xs content-group-sm">
								<tbody>
									<tr>
										<td><i class="icon-user position-left"></i> Nama Uploader:</td>
										<td class="text-right"><span class="pull-right"><?php echo $dtheader[0]->username_vendor; ?></span></td>
									</tr>
									<tr>
										<td><i class="icon-calendar2 position-left"></i> Tanggal Dibuat:</td>
										<td class="text-right"><?php echo $dtheader[0]->datetime_insert; ?></td>
									</tr>
									<tr>
										<td><i class="icon-calendar2 position-left"></i> Tanggal Pengajuan:</td>
										<td class="text-right"><?php echo $dtheader[0]->datetime_pengajuan; ?></td>
									</tr>
									<tr>
										<td><i class="icon-user-block position-left"></i>Nama HR:</td>
										<td class="text-right"><?php echo $dtheader[0]->username_hr; ?></td>
									</tr>
									<tr>
										<td><i class="icon-calendar position-left"></i> Tanggal Aksi HR:</td>
										<td class="text-right"><?php echo $dtheader[0]->datetime_hr; ?></td>
									</tr>
									<tr>
										<td><i class="icon-circles2 position-left"></i> Status:</td>
										<td class="text-right">
											<div class="btn-group">
												<?php 
													if ($dtheader[0]->status == 0) {
														echo '<a href="#" class="label label-danger dropdown-toggle" data-toggle="dropdown">DRAFT </a>';
													}
													else if($dtheader[0]->status == 1)
													{
														echo '<a href="#" class="label label-warning dropdown-toggle" data-toggle="dropdown">MENUNGGU KONFIRMASI DARI HR </a>';
													} else {
														echo '<a href="#" class="label label-success dropdown-toggle" data-toggle="dropdown">SUDAH DIPROSES OLEH HR </a>';
													} ?>

											</div>
										</td>
									</tr>
								
								</tbody>
							</table>

							<div class="panel-footer">
								<ul>
										<a <?php echo $disabled; ?> onclick="submitData(<?php echo $dtheader[0]->upload_id; ?>)" class="btn bg-teal btn-labeled btn-rounded"><b><i class="icon-paperplane"></i></b> Submit</a>
					               
								</ul>
							


							</div>
						</div>
	</div>
</div>

		


