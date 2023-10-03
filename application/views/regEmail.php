<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:22 GMT -->
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>
		
		<!-- Favicons -->
		<?php include_once("topscripts.php")?>
	
	</head>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
				<?php include_once("header.php")?>
			<!-- /Header -->
			<style type="text/css">
			.error{
				color: red;
			}
		</style>
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?=base_url('resources/user/')?>assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Forgot <span>Password</span></h3>
										</div>
										<form method="post" id="type" action="<?=site_url('forgotPass/sendEmail')?>">
												<div class="form-group">
													<label>User Type</label>
													<select class="form-control" name="txtUtype" id="utype">
														<option value="-1">Select User Type</option>
														<option value="doc">Doctor</option>
														<option value="pat">Patient</option>
														<option value="lab">Laboratory</option>
													</select>
													<div id="err"></div>
												</div>
												<div class="form-group">
													<label>Enter Registered Email</label>
													<input type="Email" id="email" name="txtEmail" class="form-control">
													<div id="err1"></div>
													<p style="color:red">
													<?php
														if(isset($error))
														{
															echo $error;
														}	
													?>
													</p>
												<button class="btn btn-primary" type="submit" id="btnUpdPwd">Next</button>
											</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
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
			$(document).on('change','#utype',function(){
				if($(this).val()==-1)
				{
					$('#err').html('<p class="error">Select User Type</p>');	
				}
				else
				{
					$('#err').html('');
				}
			});

			$(document).on('submit','#type',function(){
				var flag=true;
				if($('#utype').val()==-1)
				{
					$('#err').html('<p class="error">Select User Type</p>');	
					flag=false;
					
				}
				else{
					$('#err').html('');
				}
				if($('#email').val()=='')
				{
					$('#err1').html('<p class="error">Enter your Email</p>');
					flag=false;	
				}
				else{
					$('#err1').html('');
				}
				return flag;
			});
		</script>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:23 GMT -->
</html>