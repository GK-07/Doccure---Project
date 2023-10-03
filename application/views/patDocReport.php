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
									<li class="breadcrumb-item active" aria-current="page">Report</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Report</h2>
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
									<div class="doc-info-cont">
										<form method="post" id="report">
											<input type="text" name="txtDocid" value="<?=$doctorid?>" hidden>
											<div class="form-group">
												<label><b>Title :</b></label>
												<input type="text" name='txtTitle' class="form-control" required>
											</div>
											<div class="form-group">
												<label><b>Reason to Report :</b></label>
												<textarea name="txtDesc" cols="50" rows="5" class="form-control" required></textarea>
											</div>
											<div class="submit-section">
												<button type="submit" class="btn btn-primary submit-btn">Report</button>
											</div>
										</form>
									</div>
								</div>
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
					
                    <div class="modal-body">
                       
						<div class="thank-you-pop">
							<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
							<h1>Successfully Reported!</h1>
							<p>Your submission is received and we will reach you soon!</p>		
 						</div>
                        <span><a style="width:8rem" href="<?=site_url('patDoctor/loadDoctorProfile/'.$doctorid)?>" class="btn btn-success">Done!</a></span>
                    </div>
					
                </div>
            </div>
        </div>
        <script type="text/javascript">
        	$(document).on('submit','#report',function(e){
        		$.ajax({
        			type:'POST',
        			data:$(this).serialize(),
        			url:"<?=site_url('patDoctor/addReport')?>",
        			success:function()
        			{
        				$('#ignismyModal').modal('show');
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