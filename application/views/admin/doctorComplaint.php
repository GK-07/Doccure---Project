<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Doctor Complaint</title>
		
		<!-- Favicon -->
       <?php include_once("topscripts.php")?>
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
        <?php include_once('header.php')?>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php include_once('sidebar.php')?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Doctor Complaint</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=site_url('admin/Home')?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Complaints</a></li>
									<li class="breadcrumb-item active">Doctor Complaints</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="myTable" class="display table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Complaint id</th>
													<th>Doctor Name</th>
													<th>Patient Name</th>
													<th>Title</th>
													<th>Description</th>
													<th>Created Date</th>
													<th>Delete</th>
													
												</tr>
											</thead>
											<tbody>

												<?php
													$i=0;
													foreach ($dcdata as $d) {
														
												?>

												<tr>
													<td><?=$d->complaintid?></td>
													<td>
														<h2 class="table-avatar">
															<a href="<?=site_url('admin/doctor/loadDoctorMore/'.$d->doctorid)?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?=base_url("resources/shared/doctor/".$d->dp)?>" alt="User Image"></a>
															<a href="<?=site_url('admin/doctor/loadDoctorMore/'.$d->doctorid)?>"><?=$d->fullname?></a>
														</h2>
													</td>

													<td>
														<h2 class="table-avatar">
															<a href="<?=site_url('admin/patient/loadPatientMore/'.$d->patientid)?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?=base_url("resources/shared/patient/".$d->pp)?>" alt="User Image"></a>
															<a href="<?=site_url('admin/patient/loadPatientMore/'.$d->patientid)?>"><?=$d->name?></a>
														</h2>
													</td>
													
													<td><?=$d->title?></td>
													
													<td><?=$d->description?></td>

													<td><?=$d->createddt?></td>

													<td>
														<a class="btn btn-sm bg-danger-light" data-toggle="modal" href="#delete_modal" onclick="deleteComplaint('<?php echo $d->complaintid?>')">
																<i class="fe fe-trash"></i> Delete
														</a>
													</td>
												</tr>
												<?php		
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<form method="post" action="<?=site_url('admin/complaint/removeDoctorComplaint')?>">
								<input type="text" id="cid" name="txtCid" hidden>
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="submit" class="btn btn-primary">Delete </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
        </div>
		<!-- /Main Wrapper -->
		
		<?php include_once("bottomscripts.php")?>

		<script>	
		 	function deleteComplaint(cpid)
		 	{
		 		document.getElementById('cid').value=cpid;
		 	}

		</script> 
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
</html>