<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:55:44 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<?php include_once('topscripts.php')?>
		<style type="text/css">
			.upload-btn-wrapper
			{
				position: relative;
				margin-bottom: -2.5%;
				overflow: hidden;
				display: inline-block;
			}

			.upload-btn-wrapper input[type=file]
			{
			  font-size: 100px;
			  position: absolute;
			  left: 0;
			  top: 0;
			  opacity: 0;
			}
		</style>
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
				<?php include_once('doctorHeader.php')?>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						<?php include_once('labSidebar.php')?>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<form action="<?=site_url('labHome/addReport')?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="focus-label">Report Title</label>
										<input type="text" name="txtRtitle" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<label class="focus-label">Description</label>
										<input type="text" name="txtDesc" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="focus-label">Upload Report</label>
									<input type="file" name="txtRupload" class="form-control floating">
								</div>
								<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Upload</button>
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
	  
		<?php include_once('bottomscripts.php')?>
		<script type="text/javascript">
			/*function openPDF(url)
			{
				var w=window.open(url, '_blank');
				w.focus();
			}*/

			function print(url)
			{
		         var objFra = document.createElement('iframe');
		         objFra.style.visibility = 'hidden';
		         objFra.src = url;                  
		         document.body.appendChild(objFra);
		         objFra.contentWindow.focus();  
		         objFra.contentWindow.print();  
     		}

     		$(document).ready(function(){
			   $("#submitForm").on("change", function(){
			      var formData = new FormData(this);
			      $.ajax({
			         url  : "<?=site_url('labHome/addReport')?>",
			         type : "POST",
			         cache: false,
			         contentType : false, // you can also use multipart/form-data replace of false
			         processData: false,
			         data: formData,
			         success:function(response){
			          $("#image").val('');
			          //alert("Image uploaded Successfully");
			          alert(formData);
			         }
			      });
			   });
			});
		</script>	
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>