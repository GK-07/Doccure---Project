<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:28 GMT -->
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
			<?php include_once('patientHeader.php')?>
			<style type="text/css">
			.error{
				color: red;
			}
			</style>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">	
						<?php include_once('patientSidebar.php')?>
						<div class="col-md-7 col-lg-8 col-xl-9">
						
							<!-- Basic Information -->
							<form method="post" enctype="multipart/form-data" name="f1" action="<?=site_url('patProfile/editBasicInfo')?>">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Basic Information</h4>
										<div class="row form-row">
											<div class="col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="<?=base_url('resources/shared/patient/'.$pdata->profileimage)?>" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<!--  -->
																<span><i class="fa fa-upload"></i> Change Photo</span>
																<input type="file" id="myFile" name="pimage" accept=".jpg,.jpeg,.png" onchange="validateFile(this)"class="upload">
																
															</div>
															<small class="form-text text-muted">Allowed JPG, JPEG or PNG.</small>
														</div>
														<div id="warn"></div>
													</div>
													<?=form_error('pimage')?>
												</div>

											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Username <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="txtUname" placeholder="<?=$pdata->username?>" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Email <span class="text-danger">*</span></label>
													<input type="email" name="txtEmail" class="form-control" placeholder="<?=$pdata->emailid?>" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Full Name <span class="text-danger">*</span></label>
													<input type="text" name="txtFname" class="form-control" value="<?=$pdata->name?>">
													<?php echo form_error('txtFname');?>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" name="txtPhno" class="form-control" value="<?=$pdata->mobileno?>">
													<?php echo form_error('txtPhno');?>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<select class="form-control" name="txtGen">
													<?php $option=$pdata->gender?>
														<option value="-1">Select</option>
														<option value="Male" <?php if($option=="Male") echo 'selected';?>>Male</option>
														<option value="Female" <?php if($option=="Female") echo 'selected';?>>Female</option>
													</select>
													<?php echo form_error('txtGen');?>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-0">
													<label>Date of Birth</label>
													<input type="date" name="txtDob" min="1950-01-01" max="2015-1-1" class="form-control" value="<?=$pdata->dob?>">
												</div>
												<?php echo form_error('txtDob');?>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Blood Group</label>
													<?php $option=$pdata->bloodgroup?>
													<select class="form-control" name="txtBlood">
														<option value="-1">Select Blood Group</option>
														<option value="A+" <?php if($option=="A+") echo 'selected';?>>A+</option>
														<option value="B+" <?php if($option=="B+") echo 'selected';?>>B+</option>
														<option value="AB+" <?php if($option=="AB+") echo 'selected';?>>AB+</option>
														<option value="A-" <?php if($option=="A-") echo 'selected';?>>A-</option>
														<option value="B-" <?php if($option=="B-") echo 'selected';?>>B-</option>
														<option value="AB-" <?php if($option=="AB-") echo 'selected';?>>AB-</option>
														<option value="O+" <?php if($option=="O+") echo 'selected';?>>O+</option>
														<option value="O-" <?php if($option=="O-") echo 'selected';?>>O-</option>
													</select>
													<?php echo form_error('txtBlood');?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="submit-section submit-btn-bottom">
									<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
								</div>
							</form>
							<!-- /Basic Information -->

							<!-- Contact Details -->
							<form method="post" action="<?=site_url('patProfile/editDetails')?>" enctype="multipart/form-data">
								<div class="card contact-card">
									<div class="card-body">
										<h4 class="card-title">Contact Details</h4>
										<div class="row form-row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<textarea class="form-control" name="txtAddress" rows="5"><?=$pdata->paddress?></textarea>
													<?=form_error('txtAddress');?>
												</div>
											</div>
											<div class="form-group col-md-6">
												<label class="">State</label>
												<select class="form-control" name="txtState" onchange="loadCity(this.value)">
													<option value="-1">Select State</option>
													<?php 
														foreach ($sdata as $s) {
													?>
														<option value="<?php echo $s->stateid?>" <?php if($s->stateid==$pdata->stateid) echo 'selected';?>><?=$s->statename?></option>
													<?php 
														}
													?>
																												
													</select>
													<?=form_error('txtState');?>
													</div>
													<div class="form-group col-md-6">
														<label class="">City</label>
														<select class="form-control" name="txtCity" id="city">
														echo "<option value="-1">Select City</option>";
														<?php
														foreach ($cdata as $c) {
														?>
															<option value="<?php echo $c->cityid?>" <?php if($c->cityid==$pdata->cityid) echo 'selected';?>><?php echo $c->cityname ?></option>
														<?php
														}
														?>	
														</select>
														<?=form_error('txtCity');?>
													</div>
										</div>
									</div>
								</div>
								<div class="submit-section submit-btn-bottom">
										<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
								</div>
							</form>
							<!-- /Contact Details -->
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<?php include_once('patientFooter.php')?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		
		<script type="text/javascript">

			function loadCity(sid)
			{
				$.ajax({
					url:"<?php echo site_url('patProfile/loadCity/')?>"+sid,
					success: function(result)
					{
						document.getElementById('city').innerHTML=result;
					}
				});
			}
		
	    function validateFile(objFileControl){
		     var file = objFileControl.value;
		     var len = file.length;
		     var ext = file.slice(len - 4, len).toUpperCase();
		     var ext1 = file.slice(len - 5, len).toUpperCase();
		     if(ext==".JPG" || ext==".PNG" || ext1==".JPEG")
		     {
		       formOK = true;
		       $('#warn').html('');
		     }
		     else{
		       formOK = false;
		       $('#warn').html('<p style="color:red;">Only JPG/JPEG or PNG file allowed</p>');
		       objFileControl.value=""; 
		     }
    	}
		</script>
		<?php include_once('bottomscripts.php')?>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:29 GMT -->
</html>