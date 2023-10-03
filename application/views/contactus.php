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
									<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Contact Us</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content" style="color:black">
				<div class="container" >
					<div class="row" >
						<div class="col-6">
								<div>
									<div class="footer-contact-info" style="color:black; font-size:20px ">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> Doccure Headquaters, Behind TGB Hotel, Nr. Airport, Surat,<br> Gujarat, GJ 395008 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+91 0261 - 2325566
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure77@gmail.com
										</p>
									</div>
								</div><br><br>
								<div class="social-icon">
									<h2>Social Media</h2><br>
										<a href="http://Wa.link/xo4mfw" target="_blank"><i class="fab fa-whatsapp fa-2x"></i> </a>&nbsp;&nbsp;
												
										<a href="https://facebook.com/Doccure" target="_blank"><i class="fab fa-facebook-f fa-2x"></i> </a>&nbsp;&nbsp;
												
										<a href="https://twitter.com/Doccure" target="_blank"><i class="fab fa-twitter fa-2x"></i> </a>	&nbsp;&nbsp;
											
										<a href="https://instagram.com/Doccure" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
								</div><br>
						</div>
						<div class="col-6">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14885.709902183502!2d72.7486602!3d21.1353798!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be053e4532abb67%3A0xd17381119b0c7d8e!2sDoccure%20Headquaters!5e0!3m2!1sen!2sin!4v1622120514663!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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