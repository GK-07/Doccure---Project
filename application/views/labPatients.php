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
				<?php include_once('labHeader.php')?>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Patients</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Patients</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						<?php include_once('labSidebar.php')?>
						<!-- / Profile Sidebar -->
						
							<div class="col-md-7 col-lg-8 col-xl-9">
						
							<div class="row row-grid">
								<?php
									foreach ($pdata as $p) {
								?>
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="<?=site_url('labHome/loadPatMore/'.$p->patientid)?>" class="booking-doc-img">
														<img src="<?=base_url('resources/shared/patient/'.$p->profileimage)?>" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3><a href="<?=site_url('labHome/loadPatMore/'.$p->patientid)?>"><?=$p->name?></a></h3>
														
														<div class="patient-details">
															<h5><b>Patient ID :</b>&nbsp;#<?=$p->patientid?></h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i><?=$p->cityname?></h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span><?=$p->mobileno?></span></li>
													<li>Age <span>
														<?php $data=strtotime($p->dob); 
														$age=date('Y')-date('Y',$data); 
														echo $age;?> Years, 
														<?=$p->gender?> 
															
														</span></li>
													<li>Blood Group <span><?=$p->bloodgroup?></span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<?php
								}
								?>
							</div>

						</div>
					</div>

				</div>

			</div>	
			<!-- /Page Content -->
   
			<!-- Footer -->
				<?php include_once('labFooter.php')?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<?php include_once('bottomscripts.php')?>
		<script type="text/javascript">
		
		public function getAge($date)
	    {
	        
	        $dob = new DateTime(<?=$pdata->dob?>);
	        
	        $now = new DateTime();
	         
	        $difference = $now->diff($dob);
	         
	        $age = $difference->y;
	         
	        return  $age;
	    }
		</script>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>