<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:55:44 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<?php include_once('topscripts.php')?>
		<style type="text/css">
			.appointment-action button{
				margin-left:5px;
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
						include_once('patientHeader.php');
					}
				?>
			<!-- /Header -->
			
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">About Us</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">About Us</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="terms-content">
								<div style="font-size:18px">
									<p>Doccure connects various no of patients to most advanced healthcare network. It is a patient-centric service that gives patients the freedom to consult a doctor at his convenience from anywhere, anytime. It’s easy and interactive. Users can talk to doctors face-to-face through video conferencing or connect with them via voice call or email, no matter where you are in the country. All at the click of a button.</p><br>
							
									<p>Doccure provides the user a trustworthy source of personalized health and wellness advice which can be accessed from anywhere at the hour of need. It is the first service in India to practice evidence based medicine to assure the quality of clinical delivery. It is also the only online consultation platform to maintain a dedicated Medical response centre consisting of Family Physicians to provide virtual consultations to users 24X7. It also allows the users to consult Doccure Doctors across all specialities and super specialities. Patients with severe health conditions for the first time have an option to consult a Multi speciality board of doctors from Doccure Hospitals virtually. Doccure features one of the most easy to use website interfaces with the least touch points in the patient journey.</p><br>
							
									<p>Through Doccure we are in process of making the world's most advanced and integrated Healthcare solution. With access, convenience and patient safety at the core Doccure ensures Continuum of Care for a Healthier and Happier future.</p>
								</div>	
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
   
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
						include_once('patientFooter.php');
					}
				?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<?php include_once('bottomscripts.php')?>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>