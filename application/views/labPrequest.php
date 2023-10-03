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
			.txt{
				width:60%;
				height:40%;
				font-size:1.3rem;
				border-radius:5px;
				border-color: grey;
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
									<div class="card">
										<nav class="user-tabs mb-4">
												<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
													<li class="nav-item">
														<a class="nav-link active">Pending Payments</a>
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
																			<th>Request Payment</th>
																		</tr>
																	</thead>
																	<tbody id="pending">
																		<?php 
																			foreach ($prdata as $p) {
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
																			<td>
																				
																					
																						<a href="" onclick="
																						window.open('<?=base_url('resources/user/pdf/'.$p->labprepdf)?>');" 
																						  class="btn btn-sm bg-info-light">
																							<i class="far fa-eye"></i> View
																						</a>
																				
																			</td>
																			<td>
																					<form class="pay" method="post" lpid="<?=$p->labpreid?>">
																						<div class="form-row"> 
																						   <div class="form-group col-md-6">
																						   <div class="input-group">
																						        <div class="input-group-prepend">
																						          <div class="input-group-text">&#8377;</div>
																						        </div>
																						        <input type="text" class="form-control" name="txtAmount" placeholder="Price">
																						   </div>  
																						  </div>

																						  <div class="form-group col-md-3">
																						    <button type="submit" class="btn btn-primary">Request</button>
																						  </div>

																						</div>
																					</form>
																			</td>
																		</tr>
																		<?php
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
			$(document).on('submit','.pay',function(e){
				var lpid=$(this).attr('lpid')
				$.ajax({
					type:'POST',
					data:$(this).serialize(),
					url:"<?=site_url('labHome/sendPaymentRequest/')?>"+lpid,
					success:function(data)
					{
						$('#pending').html(data);
					}

				});
				e.preventDefault();
			});
		</script>	
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>