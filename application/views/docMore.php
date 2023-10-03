<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:55:44 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<?php include_once('topscripts.php')?>
		<style type="text/css">
				.profile-header {
				    background-color: #fff;
				    border: 1px solid #f0f0f0;
				    padding: 1.5rem;
				}
				.profile-menu {
				    background-color: #fff;
					border: 1px solid #f0f0f0;
				    padding: 0.9375rem 1.5rem;
				}
				.profile-menu .nav-tabs.nav-tabs-solid {
					background-color: transparent;
				}
				.profile-header img {
				    height: auto;
				    max-width: 120px;
				    width: 120px;
				}
				.profile-tab-cont {
					padding-top: 1.875rem;
				}
		</style>
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
				<?php 
					if($_SESSION['utype']=='lab')
					{	
						include_once('labHeader.php');
					}
					elseif($_SESSION['utype']=='doc')
					{
						include_once('doctorHeader.php');
					}
					else
					{
						include_once('patHeader.php');
					}
				?>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doctor Info</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctor Information</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="<?=base_url('resources/shared/doctor/'.$ddata->profileimage)?>">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?=$ddata->fullname?></h4>
										<h6 class="text-muted"><?=$ddata->description?></h6>
										<h6 class="text-muted"><?=$ddata->categoryname?></h6>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
											
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-10"><?=$ddata->fullname?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile No</p>
														<p class="col-sm-10"><?=$ddata->mobileno?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10"><?=$ddata->emailid?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Gender</p>
														<p class="col-sm-10"><?=$ddata->gender?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
														<p class="col-sm-10 mb-0"><?=$ddata->address?></p>
													</div><br>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10"><?=$ddata->dob?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">City</p>
														<p class="col-sm-10"><?=$ddata->cityname?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Registration Time</p>
														<p class="col-sm-10"><?=$ddata->rtime?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
											
									
									<div class="row">
												<div class="col-sm-12">
													<div class="card">
														<div class="card-body">
															<h3 class="page-title">Certificates</h3>
															<div class="table-responsive">
																<table class="table table-center">
																	<thead>
																		<tr>
																			<th>Certificate id</th>
																			<th>Certificate Name</th>
																			<th>University Name</th>
																			<th>Completion Year</th>
																			<th>View Certificate</th>
																		</tr>
																	</thead>
																	<tbody>

																		<?php
																			foreach ($cdata as $c) {
																		?>

																		<tr>
																			<td><?=$c->certificateid?></td>
																
																			<td><?=$c->certificatename?></td>

																			<td><?=$c->universityname?></td>

																			<td><?=$c->completionyear?></td>
																			<td><a href="<?=base_url("resources/shared/doctor/certificate/".$c->certificateimageurl)?>" target="_blank" class="btn btn-primary">View</a></td>
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
   						</div>
   					</div>
   				</div>
   				<!-- Footer -->
					<?php 
					if($_SESSION['utype']=='lab')
					{	
						include_once('labFooter.php');
					}
					elseif($_SESSION['utype']=='doc')
					{
						include_once('doctorFooter.php');
					}
					else
					{
						include_once('patFooter.php');
					}
				?>
				<!-- /Footer -->
				   
			</div>
		<!-- /Main Wrapper -->
		<?php include_once('bottomscripts.php')?>
		
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>