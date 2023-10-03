<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:22 GMT -->
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>
	<?php include_once("topscripts.php")?>
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
        
		
		<!-- Favicons -->
		
	
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
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=site_url('patHome')?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctors</h2>
						</div>
						<div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter form-group">
									<select class="form-control" id="filter2">
										<option class="form-control" value="-1">Select</option>
										<option class="form-control" value="1">Rating</option>
										<option class="form-control" value="2">Popular</option>
										<option class="form-control" value="3">Latest</option>
									</select>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Home Banner -->


			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<form method="post" id="filter">
								<div class="card-body">
									<div class="filter-widget">
										<h4>Gender</h4>
										<div>
											<label class="custom_check">
												<input type="checkbox" value="male" name="txtGen[]" checked>
												<span class="checkmark"></span> Male Doctor
											</label>
										</div>
										<div>
											<label class="custom_check">
												<input type="checkbox" value="female" name="txtGen[]">
												<span class="checkmark"></span> Female Doctor
											</label>
										</div>
									</div>
									<div class="filter-widget">
										<h4>Select Specialist</h4>
										<?php foreach ($cdata as $c) { ?>
										<div>
											<label class="custom_check">
												<input type="checkbox" value="<?=$c->categoryid?>" name="txtCat[]">
												<span class="checkmark"></span> <?=$c->categoryname?>
											</label>
										</div>
										<?php } ?>
									</div>
									<div class="btn-search">
										<button type="submit" class="btn btn-block">Search</button>
									</div>	
								</div>
								</form>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9" id="doctors">
							<?php foreach($ddata as $d){?>
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>">
													<img src="<?=base_url('resources/shared/doctor/'.$d->profileimage)?>" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
													<h4 class="doc-name"><a href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>"><?=$d->fullname?></a></h4>
													<p class="doc-speciality"><?=$d->gender?></p>
													<h5 class="doc-department"><img src="<?=base_url('resources/admin/assets/img/specialities/'.$d->cimage)?>" class="img-fluid" alt="Speciality"><?=$d->categoryname?></h5>
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
													<div class="clinic-details">
														<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?=$d->cityname?>, <?=$d->statename?></p>
													</div>
													<div class="clinic-services">
														<span><?=$d->description?></span>
													</div>
												</div>
											</div>
											<div class="doc-info-right">
												<div class="clini-infos">
													<ul>
														<li><i class="far fa-comment"></i> <?=$d->rcount?> Feedback</li>
														<li><i class="fas fa-map-marker-alt"></i><?=$d->cityname?>, <?=$d->statename?></li>
														<li><i class="far fa-money-bill-alt"></i> &#8377;299 <i class="fas fa-info-circle" data-toggle="tooltip" title="Apoointment Fees"></i> </li>
													</ul>
												</div>
												<div class="clinic-booking">
													<a class="view-pro-btn" href="<?=site_url('patDoctor/loadDoctorProfile/'.$d->doctorid)?>">View Profile</a>
													<a class="apt-btn" href="<?=site_url('patDoctor/loadDoctorBooking/'.$d->doctorid)?>">Book Appointment</a>
												</div>
											</div>
									</div>
								</div>
							</div>
							<?php }?>	
						</div>
					</div>

				</div>

			</div>		
			
			<!-- Footer -->
				<?php include_once("patientFooter.php")?>
			<!-- /Footer -->
		   
	   </div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<?php include_once("bottomscripts.php")?>
		<script type="text/javascript">
			$(document).on('submit','#filter',function(e){
				$.ajax({
					type:'POST',
					data:$(this).serialize(),
					url:"<?=site_url('patDoctor/filterData')?>",
					success:function(data)
					{
						$('#doctors').html(data);
					}
				});
				e.preventDefault();
			});
			$(document).on('change','#filter2',function(e){
				var val=$(this).val();
				if(val!=-1){
					$.ajax({
						type:'POST',
						data:$(this).serialize(),
						url:"<?=site_url('patDoctor/filterData2/')?>"+val,
						success:function(data)
						{
							$('#doctors').html(data);
						}					
					});
				}
				else{
					return false;	
				}
			});

		</script>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index-slide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:23 GMT -->
</html>