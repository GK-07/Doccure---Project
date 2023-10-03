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
			<div class="pharmacy-home-slider">
				<div class="swiper-container">
				    <div class="swiper-wrapper">
				      	<div class="swiper-slide">
				      		<img src="<?=base_url('resources/user/')?>assets/img/slide1.jpg" alt="">
				      	</div>
				      	<div class="swiper-slide">
					      	<img src="<?=base_url('resources/user/')?>assets/img/slide2.jpg" alt="">
				      	</div>
				    </div>
				    <!-- Add Arrows -->
				    <div class="swiper-button-next"></div>
				    <div class="swiper-button-prev"></div>
				    <div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Search Doctor, Make an Appointment</h1>
							<p>Discover the best doctors, on our site.</p>
						</div>
						<!-- Search -->
						<div class="search-box">
							<form action="<?=site_url('patHome/searchDoc')?>" method="post">
								<div class="form-group search-location">
									<select class="form-control" name="txtCity">
										<option value="">Select Your City</option>
										<?php foreach($ct as $c){ ?>
											<option value="<?=$c->cityid?>"><?=$c->cityname?></option>
										<?php } ?>
									</select>
									<span class="form-text">Based on your Location</span>
								</div>
								<div class="form-group search-info">
									<select class="form-control" name="txtCat">
										<option value="">Select Speciality you want</option>
										<?php foreach($catdata as $c){ ?>
											<option value="<?=$c->categoryid?>"><?=$c->categoryname?></option>
										<?php } ?>
									</select>
									<span class="form-text">Ex : Speciality</span>
				
								</div>
								<button type="submit" class="btn btn-primary search-btn mt-0"><i class="fas fa-search"></i> <span>Search</span></button>
							</form>
						</div>
						<!-- /Search -->
					</div>
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination"></div>
			</div>
			<!-- /Home Banner -->

			<section class="section home-tile-section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-10 m-auto">
							<div class="section-header text-center">
								<h2>What are you looking for?</h2>
							</div>
							<div class="row">
								<div class="col-lg-6 mb-4">
									<div class="card text-center doctor-book-card">
										<img src="<?=base_url('resources/user/')?>assets/img/doctors/doctor-07.jpg" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
												<h3 class="card-title mb-0">Visit a Doctor</h3>
												<a href="<?=site_url('patDoctor')?>" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 mb-4">
									<div class="card text-center doctor-book-card">
										<img src="<?=base_url('resources/user/')?>assets/img/lab-image.jpg" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
											<h3 class="card-title mb-0">Find a Lab</h3>
												<a href="<?=site_url('patHome/loadLabList1')?>" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Find Laboratory</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			  
			<!-- Clinic and Specialities -->
			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Clinic and Specialities</h2>
						<p class="sub-title"></p>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<!-- Slider -->
							<div class="specialities-slider slider">
								<?php foreach ($catdata as $c) {
								?>
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="<?=base_url('resources/admin/assets/img/specialities/'.$c->cimage)?>" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p><?=$c->categoryname?></p>
								</div>
								<?php
								} 
								?>	
							</div>
							<!-- /Slider -->
							
						</div>
					</div>
				</div>   
			</section>	 
			<!-- Clinic and Specialities -->
			<section class="section section-category">
			<div class="container">
				<div class="section-header text-center">
					<h2>Browse by Specialities</h2>
					<p class="sub-title">Here You can browse doctor for particular speciality.</p>
				</div>
				<div class="row">
					<?php for ($i=0;$i < sizeof($catdata);$i++) {
					?>
					<div class="col-lg-3">
						<div class="category-box">
							<a href="<?=site_url('patHome/loadByCat/'.$catdata[$i]->categoryid)?>">
								<div class="category-image">
									<img src="<?=base_url('resources/admin/assets/img/specialities/'.$catdata[$i]->cimage)?>" alt="">
								</div>
								<div class="category-content">
									<h4><?=$catdata[$i]->categoryname?></h4>
									<?php if(isset($ccount[$i]->cc))
									{
										if($ccount[$i]->cc>1)
										{?>
									<span><?=$ccount[$i]->cc?> Doctors</span>
									<?php }
									else
									{ ?>
										<span><?=$ccount[$i]->cc?> Doctor</span>
									<?php	
									}	
									 } else{?>
									<span>No Doctor Available</span>
									<?php }?>
								</div>
							</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		  
			<!-- Popular Section -->
		<section class="section section-doctor">
			<div class="container-fluid">
				<div class="section-header text-center">
					<h2>Book Our Best Doctor</h2>
					<p class="sub-title">Book Appointmnet now with our top rated doctors, From your Home.</p>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="doctor-slider slider">
							<!-- Doctor Widget -->
							<?php foreach ($ddata as $d) {
							?>
							<div class="profile-widget">
								<div class="doc-img">
									<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>">
										<img  height="230px" width="250px" alt="User Image" src="<?=base_url('resources/shared/doctor/'.$d->profileimage)?>">
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>"><?=$d->fullname?></a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality"><?=$d->categoryname?></p>
									<?php if($d->rcount!=0){?>
													<div class="rating">
														<?php $rper=(floatval($d->avgReview)*100)/5;?>
														<div style="margin-top: 10px">
													            <div class="result-container">
													                <div class="rate-bg" style="width:<?=$rper?>%"></div>
													                <div class="rate-stars"></div>
													            </div>
													            <span class="d-inline-block average-rating">(<?=round($d->avgReview,1)?>)</span>
													    </div>
													    <p>Total Reviews : <?=$d->rcount?></p>
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
													    <p>Total Reviews : <?=$d->rcount?></p>
													</div>
												<?php }?>
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i> <?=$d->cityname?>, <?=$d->statename?></li>
										<li>	<i class="far fa-clock"></i> Available on their schedule</li>
										<li>	<i class="far fa-money-bill-alt"></i> &#8377;299	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="<?=site_url('patDoctor/loadDoctorBooking/'.$d->doctorid)?>" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
			<!-- /Popular Section -->
		   
		   <!-- Availabe Features -->
		   <section class="section section-features">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-md-5 features-img">
							<img src="<?=base_url('resources/user/')?>assets/img/features/feature.png" class="img-fluid" alt="Feature">
						</div>
						<div class="col-md-7">
							<div class="section-header">	
								<h2 class="mt-2">Availabe Features in Our Clinic</h2>
								<p>Doccure's aim is to provide you best treatment at one place, Consultancy with certified doctors, with Laboratory support provided. </p>
							</div>	
							<div class="features-slider slider">
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="<?=base_url('resources/user/')?>assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
									<p>Patient Ward</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="<?=base_url('resources/user/')?>assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
									<p>Test Room</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="<?=base_url('resources/user/')?>assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
									<p>ICU</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="<?=base_url('resources/user/')?>assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
									<p>Laboratory</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="<?=base_url('resources/user/')?>assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
									<p>Operation</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="<?=base_url('resources/user/')?>assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
									<p>Medical</p>
								</div>
								<!-- /Slider Item -->
							</div>
						</div>
				   </div>
				</div>
			</section>		
			<!-- /Availabe Features -->
			
			<!-- Blog Section -->
		   
			<!-- /Blog Section -->			
			
			<!-- Footer -->
				<?php include_once("patientFooter.php")?>
			<!-- /Footer -->
		   
	   </div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<?php include_once("bottomscripts.php")?>
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:23 GMT -->
</html>