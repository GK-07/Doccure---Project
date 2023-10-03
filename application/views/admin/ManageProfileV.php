<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:52 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Profile</title>
  		<?php include_once("topscripts.php")?>
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <?php include_once("header.php")?>
			<!-- /Header -->
			
			<!-- Sidebar -->
    		<?php include_once("sidebar.php")?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
				 <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="<?=base_url('resources/admin/images/'.$admindata->profilepic)?>">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?=$admindata->username?></h4>
										<h6 class="text-muted"><?=$admindata->emailid?></h6>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="btn btn-primary" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">User Name</p>
														<p class="col-sm-10"><?=$admindata->username?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10"><?=$admindata->emailid?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-10"><?=$admindata->mobileno?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Added By Admin</p>
														<p class="col-sm-10 mb-0"><?=$aadmindata->username?></p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form method="post" enctype="multipart/form-data" action="<?=site_url('admin/ManageProfile/editProfile')?>">
																<div class="row form-row">
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>User Name</label>
																			<input type="text" class="form-control" value="<?=$admindata->username?>" name="txtuname" onblur="checkUname(this.value)">
																			<label id="uname" style="color: red"></label>
																		</div>
																	</div>
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" class="form-control" value="<?=$admindata->emailid?>" name="txtemail" onblur="checkEmail(this.value)">
																			<label id="email" style="color: red"></label>
																		</div>
																	</div>
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>Mobile</label>
																			<input type="text" value="<?=$admindata->mobileno?>" class="form-control" name="txtmob" onblur="checkMob(this.value)">
																			<label id="mob" style="color: red"></label>
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Profile Picture</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label>Profile Picture</label>
																			<input type="file" class="form-control" name="txtpropic">
																		</div>
																	</div>
																</div>
																<button type="submit" class="btn btn-primary btn-block" id="btnUpd">Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form method="post" action="<?=site_url('admin/ManageProfile/editPassword')?>">
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" class="form-control" value="" onblur="checkOldPass(this.value)" >
															<div id="oldpwd" style="color: red"></div>
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" class="form-control"  onblur="checkNewPass(this.value)">
														</div>
														<div id="npwd" style="color: red"></div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" class="form-control" onblur="checkConPass(this.value)" name="txtcpass">
															<div id="cpwd" style="color: red"></div>
														</div>
														<button class="btn btn-primary" type="submit" id="btnUpdPwd">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
        <?php include_once("bottomscripts.php")?>
		<!-- /Main Wrapper -->
		<script type="text/javascript">
			
			function checkUname(uname) 
			{
				if(uname==="")
				{
					document.getElementById("uname").innerHTML="Username Cannot Be Empty...";
					document.getElementById("btnUpd").disabled = true;
				}
				else
				{
					document.getElementById("uname").innerHTML="";
					document.getElementById("btnUpd").disabled = false;	
				}
			}
			function checkEmail(email) 
			{
				if(email==="")
				{
					document.getElementById("email").innerHTML="Email Cannot Be Empty...";
					document.getElementById("btnUpd").disabled = true;
				}
				else
				{
					document.getElementById("email").innerHTML="";
					document.getElementById("btnUpd").disabled = false;	
				}
			}
			function checkMob(mobno) 
			{
				if(mobno==="")
				{
					document.getElementById("mob").innerHTML="Mobile No. Cannot Be Empty...";
					document.getElementById("btnUpd").disabled = true;
				}
				else if(mobno.length!=10)
				{
					document.getElementById("mob").innerHTML="Mobile No. Must Be Of 10 Digits...";
					document.getElementById("btnUpd").disabled = true;
				}
				else
				{
					document.getElementById("mob").innerHTML="";
					document.getElementById("btnUpd").disabled = false;	
				}
			}
			function checkOldPass(opwd) 
			{
				if(opwd==="")
				{
					document.getElementById('oldpwd').innerHTML="Old Password Must Be Entered..";
				}
				else
				{
					$.ajax({
						url:"<?=site_url('admin/ManageProfile/checkPaasword/')?>"+opwd,
						success:function(result)
						{
							document.getElementById('oldpwd').innerHTML=result;
						}
					});
				}	
			}
			function checkNewPass(npwd)
			{
				if(npwd==="")
				{
					document.getElementById('npwd').innerHTML="New Password Must Be Entered..";
					document.getElementById('btnUpdPwd').disabled=true;
				}
				else
				{
					document.getElementById('npwd').innerHTML="";	
					document.getElementById('btnUpdPwd').disabled=false;
				}
			}
			function checkConPass(cpwd)
			{
				
				if(cpwd==="")
				{
					document.getElementById('cpwd').innerHTML="confirm Password Must Be Entered..";	
					document.getElementById('btnUpdPwd').disabled=true;
				}
				else
				{
					document.getElementById('cpwd').innerHTML="";		
					document.getElementById('btnUpdPwd').disabled=false;
				}
				if(document.getElementById("newpass").value!=$cpwd)
				{
					document.getElementById('cpwd').innerHTML="Password and Confirm Password Not Matched....";
					document.getElementById('btnUpdPwd').disabled=true;
				}
				else
				{
					document.getElementById('cpwd').innerHTML="";
					document.getElementById('btnUpdPwd').disabled=false;	
				}
			}

		</script>
		
		
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:07 GMT -->
</html>