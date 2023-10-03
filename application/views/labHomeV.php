<?php include_once('src/instamojo.php')?>
<!DOCTYPE html> 
<html lang="en">
	

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
				<?php include_once('labHeader.php')?>
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
							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<?php $pper=($pcount*100)/100 ;?>
															<div class="circle-graph1" data-percent="<?=$pper?>">
																<img src="<?=base_url('resources/user/')?>assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
														</div>		
														<div class="dash-widget-info">
															<h6>Total Patient</h6>
															<h3><?=$pcount?></h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												<?php $rper=($rcount*100)/100 ;?>
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="<?=$rper?>">
																<img src="<?=base_url('resources/user/')?>assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Reports</h6>
															<h3><?=$rcount?></h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<nav class="user-tabs mb-4">
												<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
													<li class="nav-item">
														<a class="nav-link active">Pending Reports</a>
													</li>
												</ul>
										</nav>
										<div class="card-body pt-0">
												<div class="tab-pane fade show active">
													<div class="card">
														<div class="card-body">
															<div class="table-responsive">
																<table class="myTable display table table-hover table-center mb-0">
																	<thead>
																		<tr>
																			<th>Upload Date</th>
																			<th>Doctor</th>
																			<th>Patient</th>
																			<th>Description</th>
																			<th>View Prescription</th>
																			<th>Upload Report</th>
																		</tr>
																	</thead>
																	<tbody id="pending">
																		<?php 


																		$API_KEY ="ca0fc5891f0edf21582ed9dad1423bba";
																		$AUTH_TOKEN = "a75a39e9ceee8330fc39e68cc7559871";

																		$api = new Instamojo\Instamojo($API_KEY,$AUTH_TOKEN,'https://www.instamojo.com/api/1.1/');

																		foreach ($pdata as $p) {
																			/*$status=$api->paymentRequestStatus($p->prequestid)['status'];
																			if($status=="Completed"){*/
																		?>

																		<tr>
																			<td><?=$p->uploaddate?></td>
																			<td>
																				<h2 class="table-avatar">
																					<a href="<?=site_url('labHome/loadDocMore/'.$p->doctorid)?>" class="avatar avatar-sm mr-2">
																						<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$p->dp)?>" alt="User Image">
																					</a>
																					<a href="<?=site_url('labHome/loadDocMore/'.$p->doctorid)?>"><?=$p->fullname?> <span><?=$p->categoryname?></span></a>
																				</h2>
																			</td>
																			<td>
																				<h2 class="table-avatar">
																					<a href="<?=site_url('labHome/loadPatMore/'.$p->patientid)?>" class="avatar avatar-sm mr-2">
																						<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$p->pp)?>" alt="User Image">
																					</a>
																					<a href="<?=site_url('labHome/loadPatMore/'.$p->patientid)?>"><?=$p->name?></a>
																				</h2>
																			</td>
																			<td><?=$p->description?></td>
																			<td class="text-center">	
																				<a href="" onclick="
																				window.open('<?=base_url('resources/user/pdf/'.$p->labprepdf)?>');" 
																				  class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																			</td>
																			<td class="text-center">	
																				<a href="" data-toggle="modal" data-target="#report" id="upload" class="btn btn-sm bg-primary-light" labpreid="<?=$p->labpreid?>" ulabpreid="<?=$p->uploadlabpreid?>">
																					<i class="fas fa-upload"></i> Upload
																				</a>
																			</td>
																			
																		</tr>
																		<?php
																			/*}*/
																		}
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<!-- /Appointment Tab -->
												  
											</div>
											<!-- Tab Content -->
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
		<div class="modal fade" id="report" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Upload Report</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form enctype="multipart/form-data" action="<?=site_url('labHome/uploadReport')?>" method="post">
								<div class="row form-row">
									<input type="text" name="txtLabid" class="form-control" value="<?=$ldata->laboratoryid?>" hidden>
									<input type="text" name="txtLabpreid" class="form-control" value="" id="lpi" hidden>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Upload Report PDF:</label>
											<input type="file" name="txtPdf" class="form-control" accept="application/pdf" required onchange="validatePDF(this)">	
										</div>
										<div id="err"></div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block">Upload Report</button>
							</form>
						</div>
					</div>
				</div>
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
			function validatePDF(objFileControl){
				 var file = objFileControl.value;
				 var len = file.length;
				 var ext = file.slice(len - 4, len);
				 if(ext.toUpperCase() == ".PDF"){
				   formOK = true;
				   $('#err').html('');
				 }
				 else{
				   formOK = false;
				   $('#err').html('<p style="color:red;">Only PDF files are allowed !</p>');
				   objFileControl.value=""; 
				 }
				}
			$(document).on('click','#upload',function(e){
				$('#lpi').val($(this).attr('labpreid'));
			});
		</script>	
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>