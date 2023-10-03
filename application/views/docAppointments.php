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
									<li class="breadcrumb-item active" aria-current="page">Appointments</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Appointments</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<?php include_once('docSidebar.php')?>
						
						<div class="col-md-7 col-lg-8 col-xl-9" >
							<div class="appointments" id="appinfo">
								<?php
									foreach ($padata as $pd) {
								?>
								<!-- Appointment List -->
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="patient-profile.html" class="booking-doc-img">
											<img src="<?=base_url('resources/shared/patient/'.$pd->profileimage)?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="patient-profile.html"><?=$pd->name?></a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> <?=$pd->date?>, <?=$pd->starttime?>-<?=$pd->endtime?></h5>
												<h5><i class="fas fa-map-marker-alt"></i><?=$pd->cityname?></h5>
												<h5><i class="fas fa-envelope"></i><?=$pd->emailid?></h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i>+91 <?=$pd->mobileno?></h5>
											</div>
										</div>
									</div>
									<div class="appointment-action">
										<a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details" onclick="getModal('<?=$pd->appointmentid?>')">
											<i class="far fa-eye"></i> View
										</button>
										<a href="" aid="<?=$pd->appointmentid?>" status="1" class="btn btn-sm bg-success-light upd" slotid="<?=$pd->slotid?>">
											<i class="fas fa-check"></i> Accept
										</a>
										<a href="" aid="<?=$pd->appointmentid?>" class="btn btn-sm bg-danger-light upd" status="0" slotid="<?=$pd->slotid?>">
											<i class="far fa-trash-alt"></i> Cancel
										</a>
									</div>
								</div>
								<?php
									}
								?>
								<!-- /Appointment List -->
							
								<!-- Appointment List -->
								
								<!-- /Appointment List -->
								
							</div>
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
	  
		<?php include_once('bottomscripts.php')?>
		<script type="text/javascript">
				$(document).on('click','.upd',function(){
					var aid=$(this).attr("aid");
					var status=$(this).attr("status");
					var slotid=$(this).attr("slotid");
					$.ajax({
						url:"<?=site_url('docAppointment/changeAppStatus/')?>"+aid+"/"+status+"/"+slotid,
						success:function(result)
						{
							$.ajax({
								url:"<?=site_url('docAppointment/getDiv/')?>",
								success:function(result)
								{
									document.getElementById('appinfo').innerHTML=result;
								}
							});
						}
					});
				});
			function getModal(aid)
	  		{
	  			$.ajax({
	  				url:"<?=site_url('docAppointment/getAppInfo/')?>"+aid,
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
											'<span class="text">'+data.date+'&nbsp;&nbsp;&nbsp;&nbsp;'+data.starttime+'-'+data.endtime+'</span>'+
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

		</script>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>