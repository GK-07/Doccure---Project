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
											<h3>Doctor Register <a href="<?=site_url('register/loadPatientRegister')?>">&nbsp;&nbsp;&nbsp;&nbsp;Are you a Patient?</a><a href="<?=site_url('register/loadLabRegister')?>">Are you a Laboratory?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form action="<?=site_url('register/addDoctor')?>" enctype="multipart/form-data" method="post" style="color:grey">
											<div class="row">
												<div class="form-group col-md-6">
													<label class="">Username</label>
													<input type="text" name="txtUname" class="form-control">
													<?php echo form_error('txtUname');  ?>
												</div>
												<div class="form-group col-md-6">
													<label class="">Full Name</label>
													<input type="text" name="txtFname" class="form-control">
													<?php echo form_error('txtFname');  ?>
												</div>
											</div>
											<div>
											<div class="form-group">
												<label class="">Email ID</label>
												<input type="email" name="txtEmail" class="form-control">
												<?php echo form_error('txtEmail');  ?>
											</div>
											<div class="form-group">
												<div class="radio">
												<input type="radio" name="gender" id="gender" value="male"> Male &nbsp;&nbsp;&nbsp;
												<input type="radio" name="gender" id="gender" class="" value="female"> Female
												<?php echo form_error('gender');  ?>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label class="focus-label">Date of Birth</label>
													<input type="date" min="1950-01-01" max="1995-12-31" name="txtDob" style="color:grey" class="form-control">
													<?php echo form_error('txtDob');?>
												</div>
												<div class="form-group col-md-6">
													<label class="">Speciality</label>
													<select class="form-control" name="txtCat"style="color:grey">
														<option value="-1">Select Speciality</option>
														<?php 
															foreach ($catdata as $c) {
														?>
														<option value="<?php echo $c->categoryid?>"><?=$c->categoryname?></option>
														<?php 
															}
														?>
													</select>
													<?php echo form_error('txtCat');?>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label class="">State</label>
													<select class="form-control" name="txtState" onchange="loadCity(this.value)" style="color:grey">
														<option value="-1">Select State</option>
														<?php 
															foreach ($sdata as $s) {
														?>
														<option value="<?php echo $s->stateid?>"><?=$s->statename?></option>
														<?php 
															}
														?>
																											
													</select>
													<?php echo form_error('txtState');?>
												</div>
												<div class="form-group col-md-6">
													<label class="">City</label>
													<select class="form-control" name="txtCity" id="city" style="color:grey">	
													</select>
													<?php echo form_error('txtCity');?>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label class="">Address</label>
													<textarea name="txtAddress" class="form-control" rows="4" cols="25"></textarea>
													<?php echo form_error('txtAddress');?>
												</div>
												<div class="form-group col-md-6">
													<label class="">Description</label>
													<textarea name="txtDesc" class="form-control" rows="4" cols="25"></textarea>
													<?php echo form_error('txtDesc');?>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label class="">Profile Picture</label>
													<input type="file" name="dimage" class="form-control">
												</div>
												<div class="form-group col-md-6">
													<label class="">Mobile Number</label>
													<input type="text" name="txtMno" class="form-control">
													<?php echo form_error('txtMno');  ?>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label>Password</label>
													<input type="password" name="txtPwd" class="form-control">
													<?php echo form_error('txtPwd');?>
												</div>
												<div class="form-group col-md-6">
													<label>Confirm Password</label>
													<input type="password" name="txtCpwd" class="form-control">
													<?php echo form_error('txtCpwd');?>
												</div>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="<?=site_url('login')?>">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Next</button>
											
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
		<script type="text/javascript">
			function loadCity(sid)
			{
				$.ajax({
					url:"<?php echo site_url('labProfile/loadCity/')?>"+sid,
					success: function(result)
					{
						document.getElementById('city').innerHTML=result;
					}
				});
			}

		</script>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:23 GMT -->
</html>