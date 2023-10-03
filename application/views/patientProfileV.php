<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:55:44 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<?php include_once('topscripts.php')?>
		<style type="text/css">
			.appointment-action button{
				margin-left:5px;
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
									<li class="breadcrumb-item active" aria-current="page">Patients</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Patients</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">
						
							<!-- Profile Widget -->
							<div class="card widget-profile pat-widget-profile">
								<div class="card-body">
									<div class="pro-widget-content">
										<div class="profile-info-widget">
											<a href="#" class="booking-doc-img">
												<img src="<?=base_url('resources/shared/patient/'.$pdata->profileimage)?>" alt="User Image">
											</a>
											<div class="profile-det-info">
												<h3><?=$pdata->name?></h3>
												
												<div class="patient-details">
													<h5><b>Patient ID :</b>#<?=$pdata->patientid?></h5>
													<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <?=$pdata->cityname?>, <?=$pdata->statename?></h5>
												</div>
											</div>
										</div>
									</div>
									<div class="patient-info">
										<ul>
											<li>Phone <span>+91 <?=$pdata->mobileno?></span></li>
											<li>Age <span><?php $data=strtotime($pdata->dob); 
														$age=date('Y')-date('Y',$data); 
														echo $age;?> Years, <?=$pdata->gender?></span></li>
											<li>Blood Group <span><?=$pdata->bloodgroup?></span></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /Profile Widget -->
							
							<!-- Last Booking -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Last Booking</h4>
								</div>
								<ul class="list-group list-group-flush">
									<?php
										foreach ($ladata as $la) {
									?>
									<li class="list-group-item">
										<div class="media align-items-center">
											<div class="mr-3">
												<img alt="Image placeholder" src="<?=base_url('resources/shared/doctor/'.$la->profileimage)?>" class="avatar  rounded-circle">
											</div>
											<div class="media-body">
												<h5 class="d-block mb-0"><?=$la->fullname?></h5>
												<span class="d-block text-sm text-muted"><?=$la->categoryname?></span>
												<span class="d-block text-sm text-muted"><?=$la->date?> <?=$la->starttime?></span>
											</div>
										</div>
									</li>
									<?php
										}
									?>
								</ul>
							</div>
							<!-- /Last Booking -->
							
						</div>

						<div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
							<div class="card">
								<div class="card-body pt-0">
									<div class="user-tabs">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab" id="capp">Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#case" data-toggle="tab" id="ccase"><span>Case Files</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#labrep" data-toggle="tab"><span class="med-records" id="clabrep">Lab Reports Prescription</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#lrep" data-toggle="tab"><span>Lab Reports</span></a>
											</li> 
										</ul>
									</div>
									<div class="tab-content">
										
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
																	<th>Status</th>
																	<th></th>
																</tr>
															</thead>
															
															<tbody id="dt">
																<?php
																foreach ($adata as $ad) {
																?>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('doctor/loadDocMore/'.$ad->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$ad->profileimage)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('doctor/loadDocMore/'.$ad->doctorid)?>"><?=$ad->fullname?> <span><?=$ad->categoryname?></span></a>
																		</h2>
																	</td>
																	<td><?=$ad->date?><span class="d-block text-info"><?=$ad->starttime?>-<?=$ad->endtime?></span></td>
																	<td><?=$ad->createddt?></td>
																	<td>
																		<?php
																			if($ad->status==1)
																			{
																		?>		<span class="badge badge-pill bg-success-light">Confirm</span>
																		<?php
																			}
																			elseif($ad->status==-1)
																			{
																		?>
																				<span class="badge badge-pill bg-warning-light">Pending</span>

																		<?php
																			}
																			elseif($ad->status==0)
																			{
																		?>
																				<span class="badge badge-pill bg-danger-light">Cancelled</span>
																		<?php
																			}
																		?></td>
																		<?php
																			if($ad->status==-1)
																			{
																		?>		
																		<td class="text-right">
																			<div class="table-action">
																			<a href="#" data-toggle="modal" data-target="#appt_details" class="btn btn-sm bg-success-light" onclick="getModal('<?=$ad->appointmentid?>')">
																				<i class="far fa-eye"></i> View
																				</a>
																			<a href="#" class="btn btn-sm bg-danger-light upd" pid="<?=$ad->patientid?>" aid="<?=$ad->appointmentid?>" st="0">
																				<i class="far fa-trash-alt"></i> Cancel
																			</a>
																			<a href="#" class="btn btn-sm bg-success-light upd" aid="<?=$ad->appointmentid?>" pid="<?=$ad->patientid?>" st="1">
																				<i class="fas fa-check"></i> Accept
																			</a>


																			</div>
																		</td>
																	<?php
																			}
																			else
																			{
																		?>
																		<td class="text-right">
																		<div class="table-action">
																			<a href="#" data-toggle="modal" data-target="#appt_details" class="btn btn-sm bg-success-light" onclick="getModal('<?=$ad->appointmentid?>')">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																	<?php
																	} 
																	?>
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
											<div class="text-right">
												<a href="" data-toggle="modal" data-target="#description" id="ccf" pid="<?=$adata[0]->patientid?>" class="add-new-btn">Create New Case File</a>
											</div>
											<div class="card">
												<div class="card-body">
													<div class="table-responsive">
														<table class="myTable display table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Created Date</th>
																	<th>Created By(Dr.) </th>
																	<th>Patient</th>									
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
																			<a href="<?=site_url('doctor/loadDocMore/'.$cf->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$cf->dp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('doctor/loadDocMore/'.$cf->doctorid)?>"><?=$cf->fullname?><span><?=$cf->categoryname?></span></a>
																		</h2>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('doctor/loadPatMore/'.$cf->patientid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$cf->pp)?>">
																			</a>
																			<a href="<?=site_url('doctor/loadPatMore/'.$cf->patientid)?>"><?=$cf->name?></a>
																		</h2>
																	</td>
																	<td><?=$cf->updateddt?></td>
																	<?php if($cf->userid==$this->session->uid)
																	{
																	?>
																	<td class="">
																		<div class="table-action">
																			<a href="<?=site_url('docPatient/openCaseFile/'.$cf->casefileid.'/'.$cf->userid)?>" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View & edit
																			</a>
																		</div>
																	</td>
																	<?php
																		}
																		else
																		{
																	?>
																	<td class="">
																		<div class="table-action">
																			<a href="<?=site_url('docPatient/openCaseFile/'.$cf->casefileid.'/'.$cf->userid)?>" class="btn btn-sm bg-info-light" target="_blank">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																	<?php
																		}
																	?>
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
											<div class="text-right">		
												<a href="#" id="slebrep" class="add-new-btn" data-toggle="modal" data-target="#srep">Suggest Lab Report</a>
											</div>
											<div class="card">
												<div class="card-body">
													<div class="table-responsive">
														<table class="myTable display table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Pres. ID</th>
																	<th>Created</th>
																	<th>Doctor</th>
																	<th>Patient</th>
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
																			<a href="<?=site_url('doctor/loadDocMore/'.$lpd->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$lpd->dp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('doctor/loadDocMore/'.$lpd->doctorid)?>"><?=$lpd->fullname?><span><?=$lpd->categoryname?></span></a>
																		</h2>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('doctor/loadPatMore/'.$lpd->patientid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$lpd->pp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('doctor/loadPatMore/'.$lpd->patientid)?>"><?=$lpd->name?></a>
																		</h2>
																	</td>
																	<td><?=$lpd->description?></td>
																	<td class="">
																		<div class="table-action">
																			<a href="javascript:print('<?=base_url('resources/user/pdf/'.$lpd->labprepdf)?>');" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:window.open('<?=base_url('resources/user/pdf/'.$lpd->labprepdf)?>')" class="btn btn-sm bg-info-light">
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
										<!-- /Medical Records Tab -->
										
										<!-- Billing Tab -->
										<div class="tab-pane" id="lrep">
											<div class="card">
												<div class="card-body">
													<div class="table-responsive">
													
														<table class="myTable display table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Upload Date</th>
																	<th>Doctor</th>
																	<th>Patient</th>
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
																			<a href="<?=site_url('doctor/loadDocMore/'.$ur->doctorid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$ur->dp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('doctor/loadDocMore/'.$ur->doctorid)?>"><?=$ur->fullname?><span><?=$ur->categoryname?></span></a>
																		</h2>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('doctor/loadPatMore/'.$ur->patientid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$ur->pp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('doctor/loadPatMore/'.$ur->patientid)?>"><?=$ur->name?></a>
																		</h2>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('doctor/loadLabMore/'.$ur->laboratoryid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/lab/'.$ur->lpi)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('doctor/loadLabMore/'.$ur->laboratoryid)?>"><?=$ur->lname?></a>
																		</h2>
																	</td>
																	<td>#<?=$ur->labpreid?></td>
																	<td class="">
																		<div class="table-action">
																			<a href="javascript:print('<?=base_url('resources/user/pdf/reports/'.$ur->reporturl)?>');" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:window.open('<?=base_url('resources/user/pdf/reports/'.$ur->reporturl)?>')" class="btn btn-sm bg-info-light">
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
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/doctor/'.$ur->dp)?>" alt="User Image">
																			</a>
																			<a href="doctor-profile.html"><?=$ur->fullname?><span><?=$ur->categoryname?></span></a>
																		</h2>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="<?=site_url('doctor/loadPatMore/'.$ur->patientid)?>" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$ur->pp)?>" alt="User Image">
																			</a>
																			<a href="<?=site_url('doctor/loadPatMore/'.$ur->patientid)?>"><?=$ur->name?></a>
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
																			<a href="javascript:print('<?=base_url('resources/user/pdf/'.$ur->reporturl)?>');" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
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
										<!-- Billing Tab -->
												
									</div>
								</div>
							</div>
						</div>
					</div>
			<!-- /Page Content -->
   				</div>
   			</div>			<!-- Footer -->
			<?php include_once('doctorFooter.php')?>
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
		<div class="modal fade" id="description" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Description for Case File</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form enctype="multipart/form-data" action="<?=site_url('docPatient/createCaseFile')?>" method="post">
								<div class="row form-row">
									<input type="text" name="txtPid" class="form-control" id="pid" hidden>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Description:</label>
											<input type="text" name="txtDesc" class="form-control" id="desc" required>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block">Create Case</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="srep" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Suggest Lab Report</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form enctype="multipart/form-data" action="<?=site_url('docPatient/uploadLabPre')?>" method="post">
								<div class="row form-row">
									<input type="text" name="txtPid1" class="form-control" id="pid1" value='<?=$pdata->patientid?>' hidden>
									<div class="col-12 col-sm-12">
										<div class="form-group">
										<label>Description:</label>
											<input type="text" name="txtDesc" class="form-control" id="desc1" required>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Upload Pdf:</label>
											<input type="file" name="txtPdf" class="form-control" accept="application/pdf" required onchange="validatePDF(this)">	
										</div>
									</div>
								</div>
								<a href="<?=site_url('docPatient/createPdf')?>" target="_blank"><u>Create pdf..!</u></a>
								<hr>
								<button type="submit" class="btn btn-primary btn-block">Upload Prescription</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- /Main Wrapper -->
	  <script type="text/javascript">
	  		$(document).ready(function(){
	  			var cid="<?=$clickid?>";
	  			$('#'+cid).click();  		
	  		});
	  		function getModal(aid)
	  		{
	  			$.ajax({
	  				url:"<?=site_url('docPatient/getAppInfo/')?>"+aid,
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
											'<span class="text">'+data.date+'&nbsp;&nbsp;&nbsp;'+data.starttime+'</span>'+
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
								'<span class="text">&#8377;'+data.payment+'</span>'+
							'</li>'+
						'</ul>';
						$('#block').html(ul); 				
					}
	  			});
	  		}

	  	$(document).on('click','.upd',function(){
	  		var aid=$(this).attr('aid');
	  		var status=$(this).attr('st');
	  		var pid=$(this).attr('pid');
	  		$.ajax({
	  			url:"<?=site_url('docPatient/updateAppStatus/')?>"+aid+"/"+status+"/"+pid,
	  			success:function(data)
	  			{
	  				$('#dt').html(data);
	  			}
	  		});
	  	});
	  	$(document).on('click','#ccf',function(e){
	  		$('#pid').val($(this).attr('pid'));
	  		$('#desc').val('');
	  	});
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
	  </script>
		<?php include_once('bottomscripts.php')?>
		
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>