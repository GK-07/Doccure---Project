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
			<?php include_once('labHeader.php')?>
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
						<?php include_once('labSidebar.php')?>
						<div class="col-md-7 col-lg-8 col-xl-9">
						
							<!-- Basic Information -->
							<form method="post" enctype="multipart/form-data" name="f1" action="<?=site_url('labProfile/editBasicInfo')?>">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Basic Information</h4>
										<div class="row form-row">
											<div class="col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="<?=base_url('resources/shared/lab/'.$ldata->profileimage)?>" alt="User Image">
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
													<input type="text" class="form-control" name="txtUname" placeholder="<?=$ldata->username?>" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Email <span class="text-danger">*</span></label>
													<input type="email" name="txtEmail" class="form-control" placeholder="<?=$ldata->emailid?>" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Laboratory Name <span class="text-danger">*</span></label>
													<input type="text" name="txtLname" class="form-control" value="<?=$ldata->name?>">
													<?php echo form_error('txtLname');?>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" name="txtPhno" class="form-control" value="<?=$ldata->contactno?>">
													<?php echo form_error('txtPhno');?>
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
							<form method="post" action="<?=site_url('labProfile/editDetails')?>" enctype="multipart/form-data">
								<div class="card contact-card">
									<div class="card-body">
										<h4 class="card-title">Contact Details</h4>
										<div class="row form-row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<textarea class="form-control" name="txtAddress" rows="5"><?=$ldata->address?></textarea>
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
														<option value="<?php echo $s->stateid?>" <?php if($s->stateid==$ldata->stateid) echo 'selected';?>><?=$s->statename?></option>
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
															<option value="<?php echo $c->cityid?>" <?php if($c->cityid==$ldata->cityid) echo 'selected';?>><?php echo $c->cityname ?></option>
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
							<div class="card contact-card">
								<div class="card-body">
									<div class="row form-row">
										<div class="col-md-2">
											<h4 class="card-body">Certificate</h4>
										</div>
										<div class="col-md-10">
											<div class="form-group">
												<div class="submit-section submit-btn-bottom">
													<a href="<?=base_url('resources/shared/lab/certificate/'.$ldata->certificate)?>" class="btn btn-primary submit-btn">View Certificate</a>
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
			<!-- /Page Content -->
   
			<!-- Footer -->
			<?php include_once('labFooter.php')?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		
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