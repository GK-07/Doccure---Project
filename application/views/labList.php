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
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title" id="total">Total Results : <?=count($ldata)?></h2>
						</div>
						<div class="col-md-4 col-12 d-md-block d-none">
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<form method="post" id="search">
										<div class="form-group">
											<select id="city" name="txtCity" class="form-control">
												<option value="-1">Select City</option>
												<?php foreach($cdata as $c){?>
													<option value="<?=$c->cityid?>"><?=$c->cityname?></option>
												<?php } ?>
											</select>
										</div>			
										</div>
											<div class="btn-search">
												<button type="submit" class="btn btn-block">Search</button>
											</div>	
										</div>
									</form>
								</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9" id="labs">

							<!-- Doctor Widget -->
							<?php foreach($ldata as $l){ ?>
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="doctor-profile.html">
													<img src="<?=base_url('resources/shared/lab/'.$l->profileimage)?>" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="doctor-profile.html"><?=$l->name?></a></h4>
												<p class="doc-speciality">Pathology</p>
												<p class="doc-speciality">+91 <?=$l->contactno?></p>
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <span id="ct"><?=$l->cityname?></span>,<span> <?=$l->statename?></span></p>
													<ul class="clinic-gallery">
														<li>
															<a href="#" data-fancybox="gallery">
																<img src="<?=base_url('resources/user/')?>assets/img/features/feature-01.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="#" data-fancybox="gallery">
																<img  src="<?=base_url('resources/user/')?>assets/img/features/feature-02.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="#" data-fancybox="gallery">
																<img src="<?=base_url('resources/user/')?>assets/img/features/feature-03.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="#" data-fancybox="gallery">
																<img src="<?=base_url('resources/user/')?>assets/img/features/feature-04.jpg" alt="Feature">
															</a>
														</li>
													</ul>
												</div>
												<div class="clinic-services">
													<span><?=$l->address?></span>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<li><i class="fas fa-map-marker-alt"></i><span id="city"><?=$l->cityname?></span>,<span> <?=$l->statename?></span></li>
													<li><i class="far fa-money-bill-alt"></i> &#8377; As Per Report <i class="fas fa-info-circle" data-toggle="tooltip" title="Report Fees"></i> </li>
												</ul>
											</div>
											<div class="clinic-booking">
												<a class="view-pro-btn" id="grep" data-target="#srep" data-toggle="modal" laboratoryid="<?=$l->laboratoryid?>">Get Report</a>
											</div><br>
											<div class="clinic-booking">
											<a class="apt-btn" href="<?=site_url('patDoctor/loadReport1/'.$l->laboratoryid)?>" style="background-color: red;border-color: red;">Report</a>
									</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- /Doctor Widget -->	
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
			<!-- Footer -->
			<?php include_once('patientFooter.php');?>
			<!-- /Footer -->
		</div>
		<div class="modal fade" id="srep" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h4>Prescription Sent!!</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form enctype="multipart/form-data" action="<?=site_url('patDashboard/uploadPre')?>" method="post">
								<div class="row form-row">
									<input type="text" name="txtLpid" class="form-control" value="<?=$labpreid?>" hidden>
									<input type="text" name="txtlid" class="form-control" value='<?=$ldata->laboratoryid?>' hidden>
									<p><i class="fa fa-check fa-3x" style="color:green;"></i> After clicking on Confirm your Prescription will be sent. You will get an Email for Payment.<br><b>Payment of Reports should be done in next 24 hours.</b></p>
								</div>
								<button type="submit" class="btn btn-primary btn-block">Confirm!!</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- /Main Wrapper -->
	  	<script type="text/javascript">
	  		$(document).on('submit','#search',function(e){
	  				$.ajax({
	  					type:'POST',
	  					data:$(this).serialize(),
	  					dataType:'text',
	  					url:"<?=site_url('patDashboard/searchCity')?>",
	  					success:function(data)
	  					{
								$('#labs').html(data);
								
								$('#total').text($('.doctor-widget').length+" matches found for : laboratories in "+$('#ct').text());

	  					}
	  				});
	  				e.preventDefault();
	  		});
	  		$(document).on('click','#grep',function(){
	  			$("input[name='txtlid']").val($(this).attr('laboratoryid'));
	  		});
	  	</script>

		<?php include_once('bottomscripts.php');?>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/patient-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:44 GMT -->
</html>