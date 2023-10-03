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
			<?php include_once('doctorHeader.php')?>
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
						<?php include_once('docSidebar.php')?>
						<div class="col-md-7 col-lg-8 col-xl-9">
						
							<!-- Basic Information -->
							<form method="post" enctype="multipart/form-data" name="f1" action="<?=site_url('docProfile/editBasicInfo')?>">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Basic Information</h4>
										<div class="row form-row">
											<div class="col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="<?=base_url('resources/shared/doctor/'.$ddata->profileimage)?>" alt="User Image">
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
													<input type="text" class="form-control" name="txtUname" placeholder="<?=$ddata->username?>" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Email <span class="text-danger">*</span></label>
													<input type="email" name="txtEmail" class="form-control" placeholder="<?=$ddata->emailid?>" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Full Name <span class="text-danger">*</span></label>
													<input type="text" name="txtFname" class="form-control" value="<?=$ddata->fullname?>">
													<?php echo form_error('txtFname');?>
												</div>
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" name="txtPhno" class="form-control" value="<?=$ddata->mobileno?>">
													<?php echo form_error('txtPhno');?>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<select class="form-control" name="txtGen">
													<?php $option=$ddata->gender?>
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
													<input type="date" name="txtDob" min="1950-01-01" max="1995-12-31" class="form-control" value="<?=$ddata->dob?>">
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
							
							<!-- About Me -->
							<form method="post" action="<?=site_url('docProfile/editDesc')?>">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">About Me</h4>
										<div class="form-group mb-0">
											<label>Description</label>
											<textarea class="form-control" name="txtDesc" rows="5"><?=$ddata->description?></textarea>
										</div>
										<?=form_error('txtDesc');?>
									</div>
								</div>
								<div class="submit-section submit-btn-bottom">
									<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
								</div>
							</form>
							<!-- /About Me -->

							<!-- Contact Details -->
							<form method="post" action="<?=site_url('docProfile/editDetails')?>" enctype="multipart/form-data">
								<div class="card contact-card">
									<div class="card-body">
										<h4 class="card-title">Contact Details</h4>
										<div class="row form-row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<textarea class="form-control" name="txtAddress" rows="5"><?=$ddata->address?></textarea>
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
														<option value="<?php echo $s->stateid?>" <?php if($s->stateid==$ddata->stateid) echo 'selected';?>><?=$s->statename?></option>
													<?php 
														}
													?>
																												
													</select>
													<?=form_error('txtState');?>
													</div>
													<div class="form-group col-md-6">
														<label class="">City</label>
														<select class="form-control" name="txtCity" id="city">
														echo "<option value=-1>Select City</option>";
														<?php
														foreach ($cdata as $c) {
														?>
															<option value="<?php echo $c->cityid?>" <?php if($c->cityid==$ddata->cityid) echo 'selected';?>><?php echo $c->cityname ?></option>
														<?php
														}
														?>	
														</select>
														<?=form_error('txtCity');?>
													</div>
											
											<!-- <div class="col-md-6">
												<div class="form-group">
													<label class="control-label">City</label>
													<input type="text" class="form-control" value="<?=$ddata->cityname?>">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">State / Province</label>
													<input type="text" class="form-control" value="<?=$ddata->statename?>">
												</div>
											</div> -->
										</div>
									</div>
								</div>
								<div class="submit-section submit-btn-bottom">
										<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
								</div>
							</form>
							<!-- /Contact Details -->
						 
							<!-- Education -->
							<form method="post" action="<?=site_url('docProfile/addDegree')?>" enctype="multipart/form-data">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Education</h4>
										
										<div id="education-info">
											<div class="row form-row education-cont">
										<?php foreach ($ctdata as $c)
											{
										?>
												<div class="col-12 col-md-10 col-lg-11">
													<div class="row form-row">
														<div class="col-12 col-md-6 col-lg-3">
															<div class="form-group">
																<label>Degree</label>
																<input type="text" value="<?=$c->certificatename?>" class="form-control" readonly>
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-3">
															<div class="form-group">
																<label>College/Institute</label>
																<input type="text" value="<?=$c->universityname?>" class="form-control" readonly>
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-3">
															<div class="form-group">
																<label>Year of Completion</label>
																<input type="text" value="<?=$c->completionyear?>" class="form-control" readonly>
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-3">
															<div class="form-group submit-section">
																<label>Certificate Image</label>
																<a href="<?=base_url('resources/shared/doctor/certificate/'.$c->certificateimageurl)?>" class=" btn btn-primary submit-btn" style="height:2.9rem ">View Certificate</a>
															</div> 
														</div>

													</div>
												</div>
										<?php
											}
										?>
											</div>
										</div>
										<div class="add-more">
											<a href="javascript:void(0);" id="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
								</div>

								<!-- /Education -->	
								
								<div class="submit-section submit-btn-bottom" id="sub">
									
								</div>
							</form>
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
	  
		
		<script type="text/javascript">

			function loadCity(sid)
			{
				$.ajax({
					url:"<?php echo site_url('docProfile/loadCity/')?>"+sid,
					success: function(result)
					{
						document.getElementById('city').innerHTML=result;
					}
				});
			}
		$(document).ready(function(e){
			var id='<?php if(isset($clickid)){echo $clickid;}?>';
			$('#'+id)[0].click();
		});
		$("#education-info").on('click','.trash', function () {
			$(this).closest('.education-cont').remove();
			return false;
    	});

		$(document).on('click','#add-education', function () {
	    	
			var educationcontent = '<div class="row form-row education-cont">' +
			'<div class="col-12 col-md-10 col-lg-11">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6 col-lg-6">' +
						'<div class="form-group">' +
							'<label>Degree</label>' +
							'<select name="txtDegree" class="form-control" style="color:grey">' +
								'<option value="-1">Select Degree</option>'+
								'<?php foreach($cr as $c){ ?>'+
								'<option value="<?=$c->certificateid?>"><?=$c->certificatename?></option>'+
								'<?php }?>'+
							'</select>'+
							'<?php echo form_error('txtDegree');?>'+	
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-6">' +
						'<div class="form-group">' +
							'<label>College/Institute</label>' +
							'<input type="text" name="txtClg" class="form-control">' +
							'<?php echo form_error('txtClg');?>'+
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-6">' +
						'<div class="form-group">' +
							'<label>Year of Completion</label>' +
							'<select class="form-control" style="color:grey" name="txtCyear">'+
								'<option value="-1" style="color:grey">Select Year of Completion</option>'+
									'<?php foreach ($year as $y) {?>'+
							'<option class="form-control" value="<?=$y?>"><?=$y?></option>'+
								'<?php } ?>'+
							'</select>'+
							'<?php echo form_error('txtCyear');?>'+
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-6">' +
						'<div class="form-group">' +
							'<label>Certificate Image</label>' +
							'<input type="file" name="txtCimage" class="form-control">' +
							'<?php echo form_error('txtCimage');?>'+
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>';
		$('#education-info').append(educationcontent);
		$('.add-more').html('');
		$('#sub').html('<button type="submit" id="hey" class="btn btn-primary submit-btn">Save Changes</button>');
	    });

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