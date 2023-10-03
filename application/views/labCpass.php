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
			.error{
				color: red;
			}
		</style>
	
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
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<?php include_once('labSidebar.php')?>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">
											<!-- Change Password Form -->
											<form method="post" action="<?=site_url('labHome/checkPassword')?>">
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" name="txtOpwd" class="form-control"  >
															<?php echo form_error('txtOpwd');?>
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" name="txtPwd" class="form-control" >
															<?php echo form_error('txtPwd');?>
														</div>
														<div id="npwd" style="color: red"></div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" name="txtCpwd" class="form-control"  name="txtcpass">
															<?php echo form_error('txtCpwd');?>
														</div>
														<button class="btn btn-primary" type="submit" id="btnUpdPwd">Save Changes</button>
											</form>
											<!-- /Change Password Form -->
											
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
				<?php include_once('labFooter.php')?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		<?php include_once('bottomscripts.php')?>	
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>