<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:55:44 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<?php include_once('topscripts.php')?>
		<script type="text/javascript">
			var myVar=new Array();
			var target=new Array();
			var etarget=new Array();
		</script>
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
									<li class="breadcrumb-item active" aria-current="page">Join Meeting</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Meetings</h2>
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
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Created Meetings</h4>
									<div class="appointment-tab">
										<div class="tab-content">
												<div class="card">
													<div class="card-body">
														<div class="table-responsive">
															<table class="myTable display table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Room ID</th>
																		<th>Join Date/Time</th>
																		<th>Patient</th>
																		<th>Description</th>
																		<th>Join</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																		$i=0;
																		foreach ($mdata as $m) {
																		$id="join".$i;
																		if(date('d-m-Y',strtotime($m->date)) >= date('d-m-Y')){
																	?>

																	<tr>
																		<td>#<?=$m->roomid?></td>
																		<td><?=$m->date?><span class="d-block text-info"><?=$m->starttime?>-<?=$m->endtime?></span></td>
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?=base_url('resources/shared/patient/'.$m->profileimage)?>" alt="User Image"></a>
																				<a href="patient-profile.html"><?=$m->name?><span>#<?=$m->appointmentid?></span></a>
																			</h2>
																		</td>
																		<td><?=$m->adesc?></td>
																		<td><form action="<?=site_url('docMeeting/loadVideoCall/'.$m->roomid)?>"><button disabled type="submit" class="btn" style="background-color: #20c0f3; color:white;" id="<?=$id?>">Join Meeting</button></form></td>
																		<script type="text/javascript">
																			var year='<?php echo date('Y',strtotime($m->date))?>';
																			var month='<?php echo date('m',strtotime($m->date))?>'-1;
																			var day='<?php echo date('d',strtotime($m->date))?>';
																			var hour='<?php echo date('H',strtotime($m->starttime))?>';
																			var mins='<?php echo date('i',strtotime($m->starttime))?>';
																			var ehour='<?php echo date('H',strtotime($m->endtime))?>';
																			var emins='<?php echo date('i',strtotime($m->endtime))?>';
																			myVar.push(eval("setInterval(function(){"+'<?=$id?>'+"()},1000)"));
																			target.push(new Date(year,month,day,hour,mins,0));
																			etarget.push(new Date(year,month,day,ehour,emins,0));
																		</script>
																	</tr>
																	<?php
																		$i++;
																		}
																	}
																	?>
																</tbody>
															</table>		
														</div>
													</div>
												</div>
																						
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
				<?php include_once('doctorFooter.php')?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  <script type="text/javascript">
		var length=target.length;
		for(var i=0;i<length;i++)
		{
			name="join"+i;
			eval("function "+name+"(){var d=new Date();var obj=document.getElementById('"+name+"');if(d>target["+i+"]){obj.disabled=false;}if(d>etarget["+i+"]){obj.disabled=true;clearTimeout(myVar["+i+"]);}}");
		}

	  </script>
		<?php include_once('bottomscripts.php')?>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>