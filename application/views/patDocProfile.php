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
    /*--thank you pop starts here--*/
		.thank-you-pop{
			width:100%;
		 	padding:20px;
			text-align:center;
		}
		.thank-you-pop img{
			width:76px;
			height:auto;
			margin:0 auto;
			display:block;
			margin-bottom:25px;
		}

		.thank-you-pop h1{
			font-size: 42px;
		    margin-bottom: 25px;
			color:#5C5C5C;
		}
		.thank-you-pop p{
			font-size: 20px;
		    margin-bottom: 27px;
		 	color:#5C5C5C;
		}
		.thank-you-pop h3.cupon-pop{
			font-size: 25px;
		    margin-bottom: 40px;
			color:#222;
			display:inline-block;
			text-align:center;
			padding:10px 20px;
			border:2px dashed #222;
			clear:both;
			font-weight:normal;
		}
		.thank-you-pop h3.cupon-pop span{
			color:#03A9F4;
		}
		.thank-you-pop a{
			display: inline-block;
		    margin: 0 auto;
		    padding: 9px 20px;
		    color: #fff;
		    text-transform: uppercase;
		    font-size: 14px;
		    background-color: #8BC34A;
		    border-radius: 17px;
		}
		.thank-you-pop a i{
			margin-right:5px;
			color:#fff;
		}
		#ignismyModal .modal-header{
		    border:0px;
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
									<li class="breadcrumb-item"><a href="<?=site_url('patHome')?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctor Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<!-- Doctor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<img src="<?=base_url('resources/shared/doctor/'.$ddata->profileimage)?>" class="img-fluid" alt="User Image">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name"><?=$ddata->fullname?></h4>
										<p class="doc-speciality"></p>
										<p class="doc-department"><img src="<?=base_url('resources/admin/assets/img/specialities/'.$ddata->cimage)?>" class="img-fluid" alt="Speciality"><?=$ddata->categoryname?></p>
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
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?=$ddata->cityname?>, <?=$ddata->statename?> </p>
											<ul class="clinic-gallery">
												<li>
													<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
														<img src="<?=base_url('resources/user/')?>assets/img/features/feature-01.jpg" alt="Feature">
													</a>
												</li>
												<li>
													<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
														<img  src="<?=base_url('resources/user/')?>assets/img/features/feature-02.jpg" alt="Feature Image">
													</a>
												</li>
												<li>
													<a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
														<img src="<?=base_url('resources/user/')?>assets/img/features/feature-03.jpg" alt="Feature">
													</a>
												</li>
												<li>
													<a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
														<img src="<?=base_url('resources/user/')?>assets/img/features/feature-04.jpg" alt="Feature">
													</a>
												</li>
											</ul>
										</div>
										<div class="clinic-services">
											<span>Treat Patients</span>
										</div>
									</div>
								</div>
								<div class="doc-info-right">
									<div class="clini-infos">
										<ul>
											<li><i class="far fa-comment"></i> <?=$ddata->rcount?> Feedback</li>
											<li><i class="fas fa-map-marker-alt"></i><?=$ddata->cityname?>, <?=$ddata->statename?> </li>
											<li><i class="far fa-money-bill-alt"></i> &#8377; 299 per Appointment </li>
										</ul>
									</div>
									<div class="doctor-action">
										<a href="<?php if(isset($social->twitter))echo $social->twitter;else echo 'javascript:void(0)'?>" class="btn btn-white call-btn">
											<i class="fab fa-twitter"></i>
										</a>
										<a href="<?php if(isset($social->facebook))echo $social->facebook;else echo 'javascript:void(0)'?>" class="btn btn-white msg-btn">
											<i class="fab fa-facebook"></i>
										</a>
										<a href="<?php if(isset($social->instagram))echo $social->instagram;else echo 'javascript:void(0)'?>" class="btn btn-white call-btn">
											<i class="fab fa-instagram"></i>
										</a>
									</div>
									<div class="clinic-booking">
										<a class="apt-btn" href="<?=site_url('patDoctor/loadDoctorBooking/'.$ddata->doctorid)?>">Book Appointment</a>
									</div>
									<br>
									<div class="clinic-booking">
											<a class="apt-btn" href="<?=site_url('patDoctor/loadReport/'.$ddata->doctorid)?>" style="background-color: red;border-color: red;">Report</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Doctor Widget -->
					
					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0" id="slide">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" id="overview" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="review" href="#doc_reviews" data-toggle="tab">Reviews</a>
									</li>
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">
										
											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Me</h4>
												<p><?=$ddata->description?></p>
											</div>
											<!-- /About Details -->
										
											<!-- Education Details -->
											<div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<?php foreach ($certificate as $c) { ?>
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name"><?=$c->universityname?></a>
																	<div>BDS</div>
																	<span class="time"><?=$c->completionyear?></span>
																</div>
															</div>
														</li>
														<?php } ?>
													</ul>
												</div>
											</div>
											<!-- /Awards Details -->
											
											<!-- Services List -->
											<div class="service-list">
												<h4>Services</h4>
												<ul class="clearfix">
													<li>Online Patient Treatment </li>
												</ul>
											</div>
											<!-- /Services List -->
											
											<!-- Specializations List -->
											<div class="service-list">
												<h4>Specializations</h4>
												<ul class="clearfix">
													<li><?=$ddata->categoryname?></li>	
												</ul>
											</div>
											<!-- /Specializations List -->

										</div>
									</div>
								</div>
								<!-- /Overview Content -->
								
								<!-- /Locations Content -->
								
								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
									<!-- Review Listing -->
									<div class="widget review-listing" id="rv">
										<?php if(isset($reviews)){?>
										<ul class="comments-list">
											<?php $i=0;?>
											<?php foreach($reviews as $r){ $i++; 
												if($i==4){break;}?>
											<li>
												<div class="comment">
													<img class="avatar avatar-sm rounded-circle" alt="User Image" src="<?=base_url('resources/shared/patient/'.$r->profileimage)?>">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author"><?=$r->name?></span>
															<span class="comment-date"><?php echo date('d M, Y H:i:s',strtotime($r->createddt))?></span>
															<div class="rating">
																<?php $rper=($r->rating*100)/5;?>
																<div style="margin-top: 10px">
															            <div class="result-container">
															                <div class="rate-bg" style="width:<?=$rper?>%"></div>
															                <div class="rate-stars"></div>
															            </div>
															    </div>
													</div>
														</div>
														<p class="comment-content">
															<?=$r->review?>
														</p>
													</div>
												</div>	
											</li>
										 <?php
											}
											?>
										</ul>
										<?php if(count($reviews) >3){?>
										<div class="all-feedback text-center">
											<a href="#" id="show" class="btn btn-primary btn-sm">
												Show all Reviews <strong>(<?=count($reviews)?>)</strong>
											</a>
										</div>
										<?php } ?>

										<?php } else {?>
											<h4 align="center">No reviews availabe, Be the first !!</h4>
										<?php } ?>
										<!-- Show All -->
										<!-- /Show All -->
										
									</div>
									<!-- /Review Listing -->
								
									<!-- Write Review -->
									<div class="write-review">
										<h4>Write a review for <strong><?=$ddata->fullname?></strong></h4>
										
										<?php if(isset($preview[0])){?>
										<form method="post" id="edit" dreviewid="<?=$preview[0]->doctorreviewid?>">
											<div class="form-group">
												<label>Review</label>
												<div class="star-rating">
													<?php for($i=5;$i>=1;$i--){
													if($i==$preview[0]->rating){?>
													<input id="star-<?=$i?>" type="radio" name="rating" value="<?=$i?>" checked>
													<label for="star-<?=$i?>" title="<?=$i?> stars">
														<i class="active fa fa-star"></i>
													</label>
													<?php } else {?>
													<input id="star-<?=$i?>" type="radio" name="rating" value="<?=$i?>">
													<label for="star-<?=$i?>" title="<?=$i?> stars">
														<i class="active fa fa-star"></i>
													</label>
													<?php } } ?>
												</div>
											</div>
											<div class="form-group">
												<label>Your review</label>
												<textarea id="review_desc" maxlength="100" class="form-control" name="txtReview"><?=$preview[0]->review?></textarea>
											  <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
											</div>
											<hr>
											<div class="submit-section">
												<button type="submit" class="btn btn-primary submit-btn">Edit Review</button>
											</div>
										</form>
										<?php } else {?>
											<form method="post" id="add" action="<?=site_url('patDoctor/addReview/'.$ddata->doctorid)?>">
											<div class="form-group">
												<label>Review</label>
												<div class="star-rating">
													<?php for($i=5;$i>=1;$i--){?>
													<input id="star-<?=$i?>" type="radio" name="rating" value="<?=$i?>">
													<label for="star-<?=$i?>" title="<?=$i?> stars">
														<i class="active fa fa-star"></i>
													</label>
													<?php }  ?>
												</div>
											</div>
											<div class="form-group">
												<label>Your review</label>
												<textarea id="review_desc" maxlength="100" class="form-control" name="txtReview"></textarea>
											  <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
											</div>
											<hr>
											<div class="submit-section">
												<button type="submit" class="btn btn-primary submit-btn">Add Review</button>
											</div>
										</form>
										<?php } ?>
										<!-- /Write Review Form -->
										
									</div>
									<!-- /Write Review -->
						
								</div>
								<!-- /Revie1ws Content -->
								
								<!-- Business Hours Content -->

								<!-- /Business Hours Content -->
								
							</div>
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
			</div>
				<?php include_once("patientFooter.php")?>
			<!-- /Footer -->
		   
	   </div>
	   <div class="modal fade" id="ignismyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
					
                    <div class="modal-body">
                       
						<div class="thank-you-pop">
							<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
							<h1>Thank You!</h1>
							<p>Your submission is received and we will contact you soon</p>
							<h3 class="cupon-pop">Your Id: <span>12345</span></h3>
							
 						</div>
                         
                    </div>
					
                </div>
            </div>
        </div>
	  
	  <script type="text/javascript">
	  	$(document).ready(function(){
	  		var clickid="<?=$clickid?>";
	  		$('#'+clickid).click();
	  		if(clickid=="review")
	  		{
	  			$('html, body').animate({
        				scrollTop: $('#slide').offset().top
    					}, 'slow');
	  		}
	  	});
	  	$(document).on('click','#show',function(e){
	  		$.ajax({
	  			url:"<?=site_url('patDoctor/getAllReviews/'.$ddata->doctorid)?>",
	  			success:function(data)
	  			{
	  				$('#rv').html(data);
	  				$('#rv').html(data);
	  				 $('html, body').animate({
        				scrollTop: $('#slide').offset().top
    					}, 'slow');
	  			}
	  		});
	  	});
	  	$(document).on('click','#showl',function(e){
	  		$.ajax({
	  			url:"<?=site_url('patDoctor/getLessReviews/'.$ddata->doctorid)?>",
	  			success:function(data)
	  			{
	  				$('#rv').html(data);
	  				 $('html, body').animate({
        				scrollTop: $('#slide').offset().top
    					}, 'slow');
	  			}
	  		});
	  	});
	  	$('#rating').mouseenter(function(){
	  		$('#rating').removeClass('rating');
	  	});
	  	$('#rating').mouseleave(function(){
	  		$('#rating').addClass('rating');
	  	});
	  	/*$(document).on('submit','#add',function(e){
	  		$.ajax({
	  			type:'POST',
	  			data:$(this).serialize(),
	  			url:"<?=site_url('patDoctor/addReview/'.$ddata->doctorid)?>",
	  			success:function(data)
	  			{
	  				$('#rv').html(data);
	  				 $('html, body').animate({
        				scrollTop: $('#slide').offset().top
    					}, 'slow');
	  			}
	  		});
	  		e.preventDefault();
	  	});*/
	  	$(document).on('submit','#edit',function(e){
	  		var drid=$(this).attr('dreviewid');
	  		$.ajax({
	  			type:'POST',
	  			data:$(this).serialize(),
	  			url:"<?=site_url('patDoctor/editReview/'.$ddata->doctorid.'/')?>"+drid,
	  			success:function(data)
	  			{
	  				$('#rv').html(data);
	  				 $('html, body').animate({
        				scrollTop: $('#slide').offset().top
    					}, 'slow');
	  			}
	  		});
	  		e.preventDefault();
	  	});
	  </script>
		<!-- jQuery -->
		<?php include_once("bottomscripts.php")?>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:23 GMT -->
</html>