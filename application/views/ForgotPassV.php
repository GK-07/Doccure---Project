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
											<h3>Login <span>Doccure</span></h3>
										</div>
										<form method="post" action="<?=site_url('ForgotPass/changePassword')?>" id="fpass">
												<div class="form-group">
													<label>New Password</label>
													<input type="password" name="txtPwd" class="form-control">
													<div id="err"></div>			
												</div>
												<div id="npwd" style="color: red"></div>
													<div class="form-group">
														<label>Confirm Password</label>
														<input type="password" name="txtCpwd" class="form-control"  name="txtcpass">
														<div id="err1"></div>	
													</div>
												<button class="btn btn-primary" type="submit" id="btnUpdPwd">Save Changes</button>
												</div>
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

			$(document).on('submit','#fpass',function(){
				$flag=true;
				$pass=$('input[name="txtPwd"]').val();
				$cpass=$('input[name="txtCpwd"]').val();
				if($pass=="")
				{
					$('#err').html('<p style="color:red;">Enter New Password</p>');
					$flag=false;
				}
				if($cpass!=$pass || $cpass=="")
				{
					$('#err1').html('<p style="color:red;">Enter Password that matches New Password</p>');
					$flag=false;	
				}
				return $flag;
			});

		</script>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:23 GMT -->
</html>