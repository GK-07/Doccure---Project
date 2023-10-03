<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:55:44 GMT -->
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
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Join Meeting</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Meetings</h2>
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
							
							<div class="row">
								<div class="col-md-6">
									<h4 class="mb-4">Room Code</h4>
									<div class="appointment-tab">
										<div class="tab-content">
												<div class="card">
													<div class="card-body">
														<div class="table-responsive">
															<form method="post"  id="room" action="<?=site_url('patMeeting/loadVideoCall/'.$mdata->roomid)?>">
																<div class="form-group">
																	<div>
																		<label>Enter Room Code</label>
																		<input class="form-control" type="text" name="txtRcode">
																		<p id="warn"></p>
																	</div>
																</div>	
																<input type="submit" class="form-control btn btn-primary" name="txtSubmit" style="color:white">
															</form>	
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

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
				<?php include_once('patientFooter.php')?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		<?php include_once('bottomscripts.php')?>
		<script type="text/javascript">
			$(document).on('submit','#room',function(e){
				if($("input[name='txtRcode']").val()!="<?=$mdata->roomcode?>")
				{
					$('#warn').html('<p style="color:red;">Room code is incorrect</p>');
					return false;
				}
				else{
					$('#warn').html('');	
				}
			});
		</script>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>