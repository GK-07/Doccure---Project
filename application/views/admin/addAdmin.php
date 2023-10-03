<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:52 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Add Admin</title>
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
            <div class="page-wrapper" align="center">
				 <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                		<div class="login-left">
							<img class="img-fluid" src="<?=base_url("resources/admin/")?>assets/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1 style="
								  font-size: 30px;
								  background: -webkit-linear-gradient(#084690, #3e84c3, #6bccd7);
								  -webkit-background-clip: text;
								  -webkit-text-fill-color: transparent;
								  font-weight: bolder;">Add New Admin</h1>
								<p style="background: -webkit-linear-gradient(#084690, #3e84c3, #6bccd7);
  									-webkit-background-clip: text;
  									-webkit-text-fill-color: transparent;
  									">Allow others to access Dashboard</p>
								
								<!-- Form -->
								<form action="<?=site_url("admin/Home/addAdmin")?>" method="post">
									<div class="form-group">
										<input class="form-control" name="txtAname" type="text" placeholder="Name">
									</div>
									<div class="form-group">
										<input class="form-control" name="txtEmail" type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="form-control" name="txtMno" type="text" placeholder="Mobile No.">
									</div>
									<div class="form-group">
										<input class="form-control" name="txtPass" type="Password" placeholder="Password">
									</div>
									<div class="form-group">
										<input class="form-control" name="txtCpass" type="Password" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<p align="center" style="color:red; font-weight: bold;">
											<?php
												if(isset($errMsg))
												{
													echo $errMsg;
												}
											?>
										</p>
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Add Admin</button>
									</div>
								</form>
								<!-- /Form -->
								
							
							</div>
                        </div>
                    </div>
                </div>
            </div>	
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<?php include_once("bottomscripts.php")?>
		
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:07 GMT -->
</html>