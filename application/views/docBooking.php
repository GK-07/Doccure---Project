<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:22 GMT -->
<head>
	 <style type="text/css">
        .result-container{
        width: 100px; height: 22px;
        background-color: #ccc;
        vertical-align:middle;
        display:inline-block;
        position: relative;
        top: -4px;
    }
    .rate-stars{
        width: 100px; height: 22px;
        background: url(<?=base_url('resources/shared/doctor/rate-star1.png')?>) no-repeat;
        background-size: cover;
        position: absolute;
    }
    .rate-bg{
        height: 22px;
        background-color: #ffbe10;
        position: absolute;
    }

			.btn-disabled,
			.btn-disabled[disabled] {
			  opacity: .4;
			  cursor: default !important;
			  pointer-events: none;
			}
    </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>
		
		<!-- Favicons -->
		<?php include_once("topscripts.php")?>
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
				<?php include_once("patientHeader.php")?>
			<!-- /Header -->
			
			<!-- Home Banner -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="<?=base_url('resources/shared/doctor/'.$ddata->profileimage)?>" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.html"><?=$ddata->fullname?></a></h4>
											<?php if($ddata->rcount!=0){?>
													<div class="rating">
														<?php $rper=(floatval($ddata->avgReview)*100)/5;?>
														<div style="margin-top: 10px">
													            <div class="result-container">
													                <div class="rate-bg" style="width:<?=$rper?>%"></div>
													                <div class="rate-stars"></div>
													            </div>
													            <span class="d-inline-block average-rating">(<?=round($ddata->avgReview, 1)?>)</span>
													    </div>
													    <p>Total Reviews : <?=$ddata->rcount?></p>
													</div>
												<?php } else {?>
													<div class="rating">
														<div style="margin-top: 10px">
													            <div class="result-container">
													                <div class="rate-bg" style="width:0%"></div>
													                <div class="rate-stars"></div>
													            </div>
													            <span class="d-inline-block average-rating">(0)</span>
													    </div>
													    <p>Total Reviews : <?=$ddata->rcount?></p>
													</div>
												<?php }?>
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> <?=$ddata->cityname?>, <?=$ddata->statename?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-4 col-md-6">
									<h4 class="mb-1"><?=date('d M, Y')?></h4>
									<p class="text-muted"><?=date('l')?></p>
								</div>
                            </div>
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<div class="schedule-header">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Day Slot -->
											<div class="day-slot">
												<ul>
													<?php for($i=0;$i<=6;$i++){ ?>
													<li>
														<span><?=date('D',strtotime('+'.$i.' day'))?></span>
														<span class="slot-date"><?=date('d M Y',strtotime('+'.$i.' day'))?></span>
													</li>
													<?php } ?>
												</ul>
											</div>
											<!-- /Day Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Header -->
								
								<!-- Schedule Content -->
								<div class="schedule-cont">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													<li>
														<?php foreach ($slotdata as $s){ 
															if($s->date==date('Y-m-d')){
																if($s->appstatus==0){?>
																	<a class="timing" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
																<?php } else { ?>
																	<a class="timing btn-disabled" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
														<?php } } } ?>
													</li>
													<li>
														<?php foreach ($slotdata as $s){ 
															if($s->date==date('Y-m-d',strtotime('+1 day'))){
																if($s->appstatus==0){ ?>
																	<a class="timing" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
																<?php } else { ?>
																	<a class="timing btn-disabled" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
														<?php } } } ?>
													</li>
													<li>
														<?php foreach ($slotdata as $s){ 
															if($s->date==date('Y-m-d',strtotime('+2 day'))){
																if($s->appstatus==0){ ?>
																	<a class="timing" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
																<?php } else { ?>
																	<a class="timing btn-disabled" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
														<?php } } } ?>
													</li>
													<li>
														<?php foreach ($slotdata as $s){ 
															if($s->date==date('Y-m-d',strtotime('+3 day'))){
																if($s->appstatus==0){ ?>
																	<a class="timing" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
																<?php } else { ?>
																	<a class="timing btn-disabled" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
														<?php } } } ?>
													</li>
													<li>
														<?php foreach ($slotdata as $s){ 
															if($s->date==date('Y-m-d',strtotime('+4 day'))){
																if($s->appstatus==0){ ?>
																	<a class="timing" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
																<?php } else { ?>
																	<a class="timing btn-disabled" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
														<?php } } } ?>
													</li>
													<li>
														<?php foreach ($slotdata as $s){ 
															if($s->date==date('Y-m-d',strtotime('+5 day'))){
																if($s->appstatus==0){ ?>
																	<a class="timing" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
																<?php } else { ?>
																	<a class="timing btn-disabled" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
														<?php } } } ?>
													</li>
													<li>
														<?php foreach ($slotdata as $s){ 
															if($s->date==date('Y-m-d',strtotime('+6 day'))){
																if($s->appstatus==0){ ?>
																	<a class="timing" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
																<?php } else { ?>
																	<a class="timing btn-disabled" href="#" sid="<?=$s->slotid?>">
																		<span><?=$s->starttime?>-<?=$s->endtime?></span>
																	</a>
														<?php } } } ?>
													</li>
												</ul>
											</div>
											
											<!-- /Time Slot -->
											
										</div>
									</div>
								</div>
								
								<!-- /Schedule Content -->
								
							</div>
							<div id="err"></div>
							<!-- /Schedule Widget -->
							
							<!-- Submit Section -->
							<div class="submit-section proceed-btn text-right">
								<a href="javascript:validation()" id="book" class="btn btn-primary submit-btn">Book Appointment</a>
							</div>
							<!-- /Submit Section -->
							
						</div>
					</div>
				</div>

			</div>		
			<!-- /Availabe Features -->
			
			<!-- Blog Section -->
		   
			<!-- /Blog Section -->			
			
			<!-- Footer -->
				<?php include_once("patientFooter.php")?>
			<!-- /Footer -->
		   
	   </div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script type="text/javascript">
			$(document).on('click','.timing',function(){
				$("a").removeClass("selected");
				$(this).removeClass("timing");
				$(this).addClass("timing selected");				
			});
			function validation(){
				var slotid=$('a.selected').attr('sid');
				if(slotid==undefined)
				{
					$('#err').html('<p style="color:red;font-size:20px;margin-left:20px">Please select your slot..!</p>');
				}
				else
				{
					window.location.replace("<?=site_url('patDoctor/loadAppDescription/')?>"+slotid+"/"+'<?=$ddata->doctorid?>');
				}
			}
		</script>
		<?php include_once("bottomscripts.php")?>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:23 GMT -->
</html>