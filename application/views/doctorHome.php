<?php include_once('src/instamojo.php');

?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:55:44 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<?php include_once('topscripts.php')?>
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
				<?php include_once('doctorHeader.php')?>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<?php include_once('docSidebar.php')?>
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="<?=$pcount?>">
																<img src="<?=base_url('resources/user/')?>assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Patient</h6>
															<h3><?=$pcount?></h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												<?php $aper=($acount*100)/5 ;?>
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="<?=$aper?>">
																<img src="<?=base_url('resources/user/')?>assets/img/icon-02.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Today Patient</h6>
															<h3><?=$acount?></h3>
															<p class="text-muted"><?=date('d, M Y')?></p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="<?=$aper?>">
																<img src="<?=base_url('resources/user/')?>assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Appoinments</h6>
															<h3><?=$acount?></h3>
															<p class="text-muted"><?=date('d, M Y')?></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card">
													<div class="card-body">
														<div class="table-responsive">
															<table class="myTable display table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Patient Name</th>
																		<th>Appt Date</th>
																		<th>Booking Date</th>
																		<th>Purpose</th>
																		<th>City</th>
																		<th>Payment(&#8377;)</th>
																		<th>Room Status</th>
																	</tr>
																</thead>
																<tbody>
																	<?php

																		$API_KEY ="ca0fc5891f0edf21582ed9dad1423bba";
																		$AUTH_TOKEN = "a75a39e9ceee8330fc39e68cc7559871";

																		$api = new Instamojo\Instamojo($API_KEY,$AUTH_TOKEN,'https://www.instamojo.com/api/1.1/');


																		foreach ($adata as $a) {
																			if($a->prequestid!=""){
																				/*$status=$api->paymentRequestStatus($a->prequestid)['status'];*/
																			}
																		if($a->date>strval(date('Y-m-d')) /*&& $status=="Completed"*/)
																		{
																	?>

																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$a->profileimage)?>" alt="User Image"></a>
																				<a href="patient-profile.html"><?=$a->name?><span>#<?=$a->appointmentid?></span></a>
																			</h2>
																		</td>
																		<td><?=$a->date?><span class="d-block text-info"><?=$a->starttime?>-<?=$a->endtime?></span></td>
																		<td><?=$a->createddt?></td>
																		<td><?=$a->adesc?></td>
																		<td><?=$a->cityname?></td>
																		<td>&#8377;</td>
																		<?php if($a->roomstatus==0){?>
																			<td><a href="<?=site_url('docAppointment/CreateRoom/'.$a->appointmentid)?>" style="background-color: #20c0f3; color:white;" class="btn">Create Room</a></td>
																		<?php
																		}
																		else
																		{
																		?>
																			<td><b>Room Created</b></td>
																		<?php
																		}
																		?>
																	</tr>
																	<?php
																		}
																	}
																	?>
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
											<div class="tab-pane" id="today-appointments">
												<div class="card">
													<div class="card-body">
														<div class="table-responsive">
															<table class="myTable display table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Patient Name</th>
																		<th>Appt Date</th>
																		<th>Booking Date</th>
																		<th>Purpose</th>
																		<th>City</th>
																		<th>Payment(&#8377;)</th>
																		<th>Room Status</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																		foreach ($adata as $a) {
																			date_default_timezone_set('Asia/Kolkata');
																		if($a->date==strval(date('Y-m-d')) && date('H:i',strtotime($a->starttime)) > date('H:i'))
																		{
																	?>

																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$a->profileimage)?>" alt="User Image"></a>
																				<a href="patient-profile.html"><?=$a->name?><span>#<?=$a->appointmentid?></span></a>
																			</h2>
																		</td>
																		<td><?=$a->date?><span class="d-block text-info"><?=$a->starttime?>-<?=$a->endtime?></span></td>
																		<td><?=$a->createddt?></td>
																		<td><?=$a->adesc?></td>
																		<td><?=$a->cityname?></td>
																		<td>&#8377;299</td>
																		<?php if($a->roomstatus==0){?>
																			<td><a href="<?=site_url('docAppointment/CreateRoom/'.$a->appointmentid)?>" style="background-color: #20c0f3; color:white;" class="btn">Create Room</a></td>
																		<?php
																		}
																		else
																		{
																		?>
																			<td><b>Room Created</b></td>
																		<?php
																		}
																		?>
																	</tr>
																	<?php
																		}
																	}
																	?>
																</tbody>
															</table>		
														</div>	
													</div>	
												</div>	
											</div>
											<!-- /Today Appointment Tab -->
											
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
				<?php include_once('doctorFooter.php')?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<?php include_once('bottomscripts.php')?>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>