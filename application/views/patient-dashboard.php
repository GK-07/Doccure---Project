<!DOCTYPE html> 
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<?php include_once('topscripts.php');?>
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<?php include_once('patientHeader.php');?>
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
						<?php include_once('patientSidebar.php')?>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#case" data-toggle="tab">Case Files</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#labrep" data-toggle="tab"><span class="med-records" id="clabrep">Lab Reports Prescription</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#lrep" data-toggle="tab"><span>Lab Reports</span></a>
											</li> 
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card">
												<div class="card-body">
													<div class="table-responsive">
														<table class="myTable display table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Status</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($adata as $a) {
																?>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$a->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$a->profileimage)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$a->doctorid)?>"><?=$a->fullname?> <span><?=$a->categoryname?></span></a>
																		</h2>
																	</td>
																	<td><?=$a->date?> <span class="d-block text-info"><?=$a->starttime?> - <?=$a->endtime?></span></td>
																	<td><?=$a->createddt?></td>
																	<td>&#8377;299</td>
																	<td>
																		<?php
																			if($a->status==1)
																			{
																		?>		<span class="badge badge-pill bg-success-light">Confirm</span>
																		<?php
																			}
																			elseif($a->status==-1)
																			{
																		?>
																				<span class="badge badge-pill bg-warning-light">Pending</span>

																		<?php
																			}
																			elseif($a->status==0)
																			{
																		?>
																				<span class="badge badge-pill bg-danger-light">Cancelled</span>
																		<?php
																			}
																		?></td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="#" data-toggle="modal" data-target="#appt_details" class="btn btn-sm bg-success-light" onclick="getModal('<?=$a->appointmentid?>')">
																				<i class="far fa-eye"></i> View
																				</a>
																		</div>
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
										
										<!-- Prescription Tab -->
										<div class="tab-pane fade" id="case">
											<div class="card">
												<div class="card-body">
													<div class="table-responsive">
														<table class="myTable display table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Created Date</th>
																	<th>Created By(Dr.) </th>
																	<th>Last Updated</th>
																	<th>View</th>
																</tr>     
															</thead>
															<tbody>
																<?php
																	foreach ($casefiles as $cf) { 
																?>
																<tr>
																	<td><?=$cf->createddt?></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$cf->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$cf->dp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$cf->doctorid)?>"><?=$cf->fullname?><span><?=$cf->categoryname?></span></a>
																		</h2>
																	</td>
																	<td><?=$cf->updateddt?></td>
																	<td class="">
																		<div class="table-action">
																			<a href="<?=site_url('docPatient/openCaseFile/'.$cf->casefileid.'/'.$cf->userid)?>" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
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
										<!-- /Prescription Tab -->
											
										<!-- Medical Records Tab -->
										<div class="tab-pane fade" id="labrep">
											<div class="card">
												<div class="card-body">
													<div class="table-responsive">
														<table class="myTable display table table-hover table-center mb-0">
															<thead>
																<tr align="center">
																	<th>Pres. ID</th>
																	<th>Created</th>
																	<th>Doctor</th>
																	<th>Description</th>
																	<th>View / Print</th>
																</tr>     
															</thead>
															<tbody>
																<?php
																	foreach ($labpred as $lpd) {
																?>
																<tr>
																	<td>#<?=$lpd->labpreid?></td>
																	<td><?=$lpd->createddt?></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$lpd->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$lpd->dp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$lpd->doctorid)?>"><?=$lpd->fullname?><span><?=$lpd->categoryname?></span></a>
																		</h2>
																	</td>
																	
																	<td><?=$lpd->description?></td>
																	<td class="">
																		<div class="table-action" style="display:inline-table;">
																		<ul style="display:inline-flex; list-style: none;">	
																			<?php
																				if($lpd->uploadstatus==0){
																			?>
																			<li><a href="javascript:window.open('<?=base_url('resources/user/pdf/'.$lpd->labprepdf)?>')" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a></li>&nbsp;
																			
																			<li><a href="<?=site_url('patDashboard/loadLabList/'.$lpd->labpreid)?>" class="btn btn-sm bg-info-light">
																				<i class=" fab fa-get-pocket"></i> Get Report
																			</a></li>&nbsp;
																			<li><a href="#" id="uprep" data-target="#srep" data-toggle="modal" class="btn btn-sm bg-info-light" doctorid="<?=$lpd->doctorid?>" labpreid="<?=$lpd->labpreid?>">
																				<i class="fas fa-upload"></i> Upload Report
																			</a></li>
																		<?php } else { ?>
																			<li><a href="javascript:window.open('<?=base_url('resources/user/pdf/'.$lpd->labprepdf)?>')" class="btn btn-sm bg-info-light" style="margin-left:5.5rem; height: 2.3rem;">
																				<i class="far fa-eye"></i> View
																			</a></li>
																		<?php } ?>
																		</ul>
																		</div>
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
										<!-- /Medical Records Tab -->
										
										<!-- Billing Tab -->
										<div class="tab-pane" id="lrep">
											<div class="card">
												<div class="card-body">
													<div class="table-responsive">
													
														<table class="myTable display table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Uploaded Date</th>
																	<th>Doctor</th>
																	<th>Laboratory</th>
																	<th>Prescription ID</th>
																	<th>View</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	foreach ($upreport as $ur) {
																?>
																<tr>
																	<td><?=$ur->createddt?></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$ur->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$ur->dp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$ur->doctorid)?>"><?=$ur->fullname?><span><?=$ur->categoryname?></span></a>
																		</h2>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('patDashboard/loadLabMore/'.$ur->laboratoryid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/lab/'.$ur->lp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('patDashboard/loadLabMore/'.$ur->laboratoryid)?>"><?=$ur->lname?></a>
																		</h2>
																	</td>
																	<td>#<?=$ur->labpreid?></td>
																	<td class="">
																		<div class="table-action">	
																			<a href="javascript:window.open('<?=base_url('resources/user/pdf/'.$ur->reporturl)?>')" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<?php
																}	
																?>
																<?php
																	foreach ($upreport1 as $ur) {
																?>
																<tr>
																	<td><?=$ur->createddt?></td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$ur->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$ur->dp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$ur->doctorid)?>"><?=$ur->fullname?><span><?=$ur->categoryname?></span></a>
																		</h2>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="#" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/lab/na.jpg')?>" alt="User Image">
																			</a>
																			<a>N/A</a>
																		</h2>
																	</td>
																	<td>#<?=$ur->labpreid?></td>
																	<td class="">
																		<div class="table-action">
																			<a href="javascript:window.open('<?=base_url('resources/user/pdf/'.$ur->reporturl)?>')" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
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
										<!-- /Billing Tab -->
										  
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<?php include_once('patientFooter.php');?>
			<!-- /Footer -->

		   
		</div>
		<div class="modal fade custom-modal" id="appt_details">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Appointment Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="block">
						
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="srep" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Upload Report</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form enctype="multipart/form-data" action="<?=site_url('patDashboard/uploadReport')?>" method="post">
								<div class="row form-row">
									<input type="text" name="txtLpid" class="form-control" value='<?=$labpred->labpreid?>' hidden>
									<input type="text" name="txtdid" class="form-control" value='<?=$labpred->doctorid?>' hidden>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Upload Pdf:</label>
											<input type="file" name="txtPdf" class="form-control" accept="application/pdf" id="desc" required onchange="validatePDF(this)">	
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block">Upload</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- /Main Wrapper -->
	  	<script type="text/javascript">
	  		function getModal(aid)
	  		{
	  			$.ajax({
	  				url:"<?=site_url('patDashboard/getAppInfo/')?>"+aid,
	  				dataType:'json',
	  				success:function(data)
	  				{
	  					var st;
						if(data.status==1)
						{										
							st='<span class="badge badge-pill bg-success-light">Confirm</span>';
						}
						else if(data.status==-1)
						{
							st='<span class="badge badge-pill bg-warning-light">Pending</span>';
						}
						else if(data.status==0)
						{
							st='<span class="badge badge-pill bg-danger-light">Cancelled</span>';
						}
	  					var ul='<ul class="info-details">'+
							'<li>'+
								'<div class="details-header">'+
									'<div class="row">'+
										'<div class="col-md-6">'+
											'<span class="title">#'+data.appointmentid+'</span>'+
											'<span class="text">'+data.date+'&nbsp;&nbsp;&nbsp;'+data.starttime+'-'+data.endtime+'</span>'+
										'</div>'+
										'<div class="col-md-6">'+
											'<div class="text-right">'+
												st+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</li>'+
							'<li>'+
								'<span class="title">Status:</span>'+
								'<span class="text">'+st+'</span>'+
							'</li>'+
							'<li>'+
							'<li>'+
								'<span class="title">Description</span>'+
								'<span class="text">'+data.adesc+'</span>'+
							'</li>'+
							'<li>'+
								'<span class="title">Booking Date:</span>'+
								'<span class="text">'+data.createddt+'</span>'+
							'</li>'+
							'<li>'+
								'<span class="title">Paid Amount</span>'+
								'<span class="text">&#8377;299</span>'+
							'</li>'+
						'</ul>';

						$('#block').html(ul); 				
					}
	  			});
	  		}
	  		function print(url)
			{
		         var objFra = document.createElement('iframe');
		         objFra.style.visibility = 'hidden';
		         objFra.src = url;                  
		         document.body.appendChild(objFra);
		         objFra.contentWindow.focus();  
		         objFra.contentWindow.print();  
     		}
     		function validatePDF(objFileControl){
				 var file = objFileControl.value;
				 var len = file.length;
				 var ext = file.slice(len - 4, len);
				 if(ext.toUpperCase() == ".PDF"){
				   formOK = true;
				 }
				 else{
				   formOK = false;
				   alert("Only PDF files allowed.");
				   objFileControl.value=""; 
				 }
			}
			$(document).on('click','#uprep',function(){
				$("input[name='txtLpid']").val($(this).attr('labpreid'));
				$("input[name='txtdid']").val($(this).attr('doctorid'));
			});
	  	</script>
		<?php include_once('bottomscripts.php');?>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/patient-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:44 GMT -->
</html>