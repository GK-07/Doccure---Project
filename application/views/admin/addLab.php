<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:52 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Dashboard</title>
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
								<h1>Add New Laboratory</h1>
								<p> </p>
								
								<!-- Form -->
								<form enctype="multipart/form-data" action="<?=site_url("admin/laboratory/addLab")?>" method="post">
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
										<input class="form-control" name="txtAddress" type="text" placeholder="Address">
									</div>
									<div class="form-group">
										<input class="form-control" name="txtPin" type="text" placeholder="Pin Code">
									</div>
									<div class="form-group">
										<input class="form-control" name="txtLabImg" type="file">
									</div>
									<div class="form-group">
										<select name="txtState" id="txtState" class="form-control" onchange="getCity(this.value)">
											<option value="-1">Select State</option>
											<?php
												foreach ($stated as $s) 
												{
											?>
												<option value="<?=$s->stateid?>"><?=$s->statename?></option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<select name="txtCity" id="txtCity" class="form-control">
											
										</select>
										
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Add Laboratory</button>
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
		<script type="text/javascript">
			function getCity(sid) 
			{
				if(sid!=-1)
				{
					$.ajax({
						url:"<?=site_url('admin/laboratory/loadCityByState/')?>"+sid,
						success:function(result)
						{
							document.getElementById('txtCity').innerHTML=result;
						}
					});
				}
			}
		</script>
		
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:07 GMT -->
</html>