<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Case Files</title>
		
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
								<h3 class="page-title">List of Case Files</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=site_url('admin/Home')?>">Dashboard</a></li>
									<li class="breadcrumb-item active">Case Files</li>
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
														<table class="myTable display table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Created Date</th>
																	<th>Created By(Dr.) </th>
																	<th>Patient</th>									
																	<th>Last Updated</th>
																	<th>View</th>
																</tr>     
															</thead>
															<tbody>
																<?php
																	foreach ($casefiles as $cf) { 
																?>
																<tr>
																	<td><?=$cf->createddt?></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('admin/doctor/loadDoctorMore/'.$cf->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$cf->dp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('admin/doctor/loadDoctorMore/'.$cf->doctorid)?>"><?=$cf->fullname?><span><?=$cf->categoryname?></span></a>
																		</h2>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('admin/patient/loadPatientMore/'.$cf->patientid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$cf->pp)?>">
																			</a>
																			<a href="<?=site_url('admin/patient/loadPatientMore/'.$cf->patientid)?>"><?=$cf->name?></a>
																		</h2>
																	</td>
																	<td><?=$cf->updateddt?></td>
																	<td class="">
																		<div class="table-action">
																			<a href="<?=site_url('admin/Home/openCaseFile/'.$cf->casefileid)?>" class="btn btn-sm bg-info-light" target="_blank">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
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
		
        </div>
		<!-- /Main Wrapper -->
		
		<?php include_once("bottomscripts.php")?>
		
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
</html>