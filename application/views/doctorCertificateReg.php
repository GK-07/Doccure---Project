<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:22 GMT -->
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>
		
		<!-- Favicons -->
		<?php include_once("topscripts.php")?>
		<style type="text/css">
			.error{
				color: red;
			}
		</style>
		<?php include_once("topscripts.php")?>
	
	</head>
	<body class="account-page">

		<!-- Main Wrapper -->
		<!-- Header -->
				<?php include_once("header.php")?>
			<!-- /Header -->
			<div class="">
				<div class="">
					
					<div class="row">
						<div class="col-md-10 offset-md-1">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?=base_url('resources/user/')?>assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Doctor Register</h3>
										</div>
										
										<!-- Register Form -->
										<form action="<?=site_url('register/addCertificates')?>" enctype="multipart/form-data" method="post" style="color:grey">
											<div class="education-info">
												 <div class="row form-row education-cont">
													<div class="col-12 col-md-12 col-lg-12">
														<div class="row form-row">
															<div class="col-12 col-md-6 col-lg-6">
																<div class="form-group">
																	<label>Degree</label>
																	<select class="form-control" style="color:grey" name="txtDegree">
																		<option value="-1" style="color:grey">Select Degree</option>
																		<?php
																			foreach ($cdata as $c) {
																		?>
																		<option class="form-control" value="<?=$c->certificateid?>" style="color:grey"><?=$c->certificatename?></option>
																		<?php	
																			}
																		?>
																	</select>
																	<?php echo form_error('txtDegree');?>
																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-6">
																<div class="form-group">
																	<label>College/Institute</label>
																	<input type="text" name="txtUname" class="form-control">
																	<?php echo form_error('txtUname');?>
																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-6">
																<div class="form-group">
																	<label>Year of Completion</label>
																	<select class="form-control" style="color:grey" name="txtCyear">
																		<option value="-1" style="color:grey">Select Year of Completion</option>
																		<?php
																			foreach ($year as $y) {
																		?>
																		<option class="form-control" value="<?=$y?>" style="color:grey"><?=$y?></option>
																		<?php	
																			}
																		?>
																	</select>
																	<?php echo form_error('txtCyear');?>
																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-6">
																<div class="form-group">
																	<label>Upload Certificate</label>
																	<input type="file" name="txtCimage" class="form-control">
																	<?php echo form_error('txtCimage');?>
																</div> 
															</div>
														</div>
													</div>
												</div>
											</div>
									<div class="add-more">
										<button type="submit" class="form-control" name="add" value="addDegree"><i class="fa fa-plus-circle"></i> Add Degree</button>
									</div>
									<div class="text-right">
										<a class="forgot-link" href="<?=site_url('login')?>">Already have an account?</a>
									</div>
									<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="add" value="reg">Register</button>
											
									</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>
				<!-- Footer -->
				<?php include_once("footer.php")?>
			<!-- /Footer -->
			</div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<?php include_once("bottomscripts.php")?>
		<script>
			
				  

		</script>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:23 GMT -->
</html>