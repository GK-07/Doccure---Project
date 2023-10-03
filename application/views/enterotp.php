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
											<h3>OTP <span>Verification</span></h3>
										</div>
										<form method="post" id="type" action="<?=site_url('forgotPass/loadNewPass')?>">
											<div class="form-group">
												<label>Enter OTP</label>
												<input type="text" id="otp" name="txtOtp" class="form-control">
												<div id="err"></div>
											</div>
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

			$(document).on('submit','#type',function(e){
				
				if($('#otp').val()!='<?=$_SESSION['otp']?>')
				{
					$('#err').html('<p class="error">Enter Correct OTP</p>');
					return false;	
				}
				else{
					$('#err').html('');
				}
			});
		</script>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:23 GMT -->
</html>