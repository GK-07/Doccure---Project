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
									<li class="breadcrumb-item active" aria-current="page">Schedule</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Schedule</h2>
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
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">     
												<div class="row">
													<div class="col-md-12">
														<div class="card schedule-widget mb-0">
														
															<!-- Schedule Header -->
															<div class="schedule-header">
															
																<!-- Schedule Nav -->
																<div class="schedule-nav">
																	<ul class="nav nav-tabs nav-justified" id="dlist">
																		<?php
																			for($i=0;$i<=6;$i++)
																			{
																			$date=date('Y-m-d',strtotime('+'.$i.' day'));
																			$day=date('d',strtotime($date));
																			$month=date('M',strtotime($date));
																			$year=date('Y',strtotime($date));
																			$weekday=date('D',strtotime($date));
																		?>
																		<li class="nav-item sch" date="<?=$date?>" >
																			<a id="<?=$date?>" class="nav-link" data-toggle="tab" href="#timeslot"><?php
																			echo "$day $month, $year"; echo "<br>";
																			echo $weekday;
																			?></a>
																		</li>
																	<?php }
																	?>
																	</ul>

																</div>

																<!-- /Schedule Nav -->
																
															</div>
															<!-- /Schedule Header -->
															
															<!-- Schedule Content -->
															<div class="tab-content schedule-cont">
															
																<div id="timeslot" class="tab-pane fade show active">
																	<p style="font-weight:bold;">Click on Date to get your timeslots.</p>
																	
																</div>
																
																<!-- /Sunday Slot -->

																<!-- Monday Slot -->
																 
															</div>
															<!-- /Schedule Content -->
															
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

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
				<?php include_once('doctorFooter.php')?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  	<div class="modal fade custom-modal" id="add_time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" id="time">
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-12">
										<div class="form-group"> 
											<input type="text" name="txtDate" id="date" hidden>
											             
											<label>Timing Slot Duration</label>
											<select class="select form-control" id="duration">
												<option value="30" selected>30 mins</option> 
												<option value="1">1 Hour</option>
											</select>
											<p id="err"></p>
										</div>
									</div>
								</div>
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-6">
										<label style="font-weight: bold">Start Time:</label>
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Hours</label>
													<input type="number" min="08" max="21" class="form-control" id="h1" value="00" name="txtH1" required>
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Minutes</label>
													<input type="number" min="00" max="59" class="form-control" id="m1" value="00" name="txtM1" required>
												</div> 
											</div>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<label style="font-weight: bold">End Time:</label>
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Hours</label>
													<input type="number" min="08" max="21" class="form-control" id="h2" name="txtH2" value="00" readonly>
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Minutes</label>
													<input type="number" min="00" max="59" class="form-control" id="m2" name="txtM2" value="00" readonly>
												</div> 
											</div>
										</div>
									</div>
									<div id="warn"></div>
									</div>
								</div>
							
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn" id="sub">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade custom-modal" id="edit_time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" id="etime">
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-12">
										<div class="form-group"> 
											<input type="text" name="txtDate" id="edate" hidden> 
											<input type="text" name="txtSlot" id="slot" hidden>            
											<label>Timing Slot Duration</label>
											<select class="select form-control" id="eduration">
												<option value="30" selected>30 mins</option> 
												<option value="1">1 Hour</option>
											</select>
					
										</div>
									</div>
								</div>
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-6">
										<label style="font-weight: bold">Start Time:</label>
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Hours</label>
													<input type="number" min="08" max="21" class="form-control" id="eh1" value="00" name="txtEH1" required>
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Minutes</label>
													<input type="number" min="00" max="59" class="form-control" id="em1" value="00" name="txtEM1" required>
												</div> 
											</div>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<label style="font-weight: bold">End Time:</label>
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Hours</label>
													<input type="number" min="08" max="21" class="form-control" id="eh2" name="txtEH2" value="00" readonly>
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Minutes</label>
													<input type="number" min="00" max="59" class="form-control" id="em2" name="txtEM2" value="00" readonly>
												</div> 
											</div>
										</div>
									</div>
									<div id="ewarn"></div>
									</div>
								</div>
							
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn" id="esub">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php include_once('bottomscripts.php')?>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#dlist').find('a')[0].click();
			});
			$(document).on('click','.sch',function(){
				var dt=$(this).attr('date');
				$.ajax({
					url:"<?=site_url('docSchedule/getSlotByDate/')?>"+dt,
				   method:"POST",
				   dataType:"text",
				   success:function(data)
				   {
				   		var d1=JSON.parse(data);
				   		var s=ajaxCall(d1,dt);
				   		$('#timeslot').html(s);
				   }
				});	
			});
			$(document).on("click","#del",function(){
				var sid=$(this).attr("sid");
				var dt=$(this).attr("date");
				$.ajax({
					url:"<?=site_url('docSchedule/deleteTimeSlot/')?>"+sid+"/"+dt,
					method:"POST",
				   dataType:"text",
					success:function(data)
					{
						var d1=JSON.parse(data);
				   		var s=ajaxCall(d1,dt);
				   		$('#timeslot').html(s);	
					}
					
				});
			});
			$(document).on('submit','#time',function(e){
				var dt=$('#aslot').attr('date');
				$.ajax({
					type:'POST',
					data:$(this).serialize(),
					dataType:'text',
					url:"<?=site_url('docSchedule/addTimeSlot/')?>",
					success:function(data)
					{
				   		$('#add_time_slot').modal('hide');
				   		$('#'+dt).click();
				   		var d1=JSON.parse(data);
				   		var s=ajaxCall(d1,dt);
				   		$('#timeslot').html(s);
					}
				});
				return false;	
			});
			$(document).on('submit','#etime',function(e){
				var dt=$('#eslot').attr('date');
				$.ajax({
					type:'POST',
					data:$(this).serialize(),
					dataType:'text',
					url:"<?=site_url('docSchedule/editTimeSlot/')?>",
					success:function(data)
					{
				   		$('#edit_time_slot').modal('hide');
				   		$('#'+dt).click();
				   		var d1=JSON.parse(data);
				   		var s=ajaxCall(d1,dt);
				   		$('#timeslot').html(s);
					}
				});
				return false;	
			});
			var s,e;
			$(document).on('click','#eslot',function(){
				$('#slot').val($(this).attr('slotid'));
				$('#edate').val($(this).attr('date'));
				s=$(this).attr('start');
				e=$(this).attr('end');
			});
			$(document).on('click','#aslot',function(){
				$('#date').val($(this).attr('date'));
			});
			function getDiv0(dt)
			{
				return '<h4 class="card-title d-flex justify-content-between">'+
							'<span>Time Slots</span>'+ 
							'<a class="edit-link" data-toggle="modal" href="#add_time_slot" date="'+dt+'" id="aslot"><i class="fa fa-plus-circle"></i> Add Slot</a>'+
						'</h4>'+
						'<p class="text-muted mb-0">Not Available</p>';
			}
			function getDiv1(l,dt)
			{
				if(l<=4)
				{
					return '<h4 class="card-title d-flex justify-content-between">'+
									'<span>Time Slots</span>'+ 
									'<a class="edit-link" data-toggle="modal" id="aslot" href="#add_time_slot" date="'+dt+'"><i class="fa fa-plus-circle"></i>Add Slot</a>'+
								'</h4>';
				}
				else
				{
					return '<h4 class="card-title d-flex justify-content-between">'+
									'<span>Time Slots</span>'+ 
							'</h4>';	
				}
			}
			function getDiv11(starttime,endtime,slotid,dt)
			{ 
					return '<div class="doc-slot-list">'+
							starttime+' - '+endtime+
							'<a id="del" sid="'+slotid+'" date="'+dt+'" class="delete_schedule">'+
								'<i class="fa fa-times"></i>'+
							'</a>&nbsp;&nbsp;&nbsp;'+
							'<a data-toggle="modal" href="#edit_time_slot" date="'+dt+'" start="'+starttime+'" end="'+endtime+'" id="eslot" slotid="'+slotid+'">'+
								'<i class="fas fa-edit"></i>'+
							'</a>'+
						'</div>';
			}
			function ajaxCall(data,dt)
			{
				var l=Object.keys(data).length;
				   		if(l==0)
				   		{
				   			var d=getDiv0(dt);
							return d;
				   		}
				   		else{
				   			var x="";
							var d=getDiv1(l,dt);
								for(i=0;i<=l-1;i++)
								{
										var d1=getDiv11(data[i].starttime,data[i].endtime,data[i].slotid,data[i].date);
										x=x+d1;	
								}
								x='<div class="doc-times">'+x+'</div>';
								var d=d+x;
								return d;
				   		}
			}
			
			$(document).on('change','#h1',function(){
				var hours=parseInt($(this).val());
				var mins=parseInt($('#m1').val());
				if($('#duration').val()=="30")
				{
					validateTime(hours,mins);
				}
				else
				{
					var h2=hours+1;
					$('#h2').val(h2);
					$('#m2').val(mins);
				}
				var hours2=parseInt($('#h2').val());
				var mins2=parseInt($('#m2').val());
				var date=$('#aslot').attr('date');
				$.ajax({
					dataType:'json',
					url:"<?=site_url('docSchedule/validateSlot/')?>"+hours+'/'+mins+'/'+hours2+'/'+mins2+'/'+date,
					success:function(data)
					{
						if(data.flag==false)
						{
							$('#warn').html('<p style="color:red">This time slot is not Available!</p>');
							$('#sub').attr('disabled','disabled');
						}
						else
						{
							$('#warn').html('');
							$('#sub').removeAttr('disabled');
						}
					}
				});
			});
			$(document).on('change','#m1',function(){
				var mins=parseInt($(this).val());
				var hours=parseInt($('#h1').val());
				if($('#duration').val()=="30")
				{
					validateTime(hours,mins);
				}
				else
				{
					$('#m2').val(mins);
				}
				var hours2=parseInt($('#h2').val());
				var mins2=parseInt($('#m2').val());
				var date=$('#aslot').attr('date');
				$.ajax({
					dataType:'json',
					url:"<?=site_url('docSchedule/validateSlot/')?>"+hours+'/'+mins+'/'+hours2+'/'+mins2+'/'+date,
					success:function(data)
					{
						if(data.flag==false)
						{
							$('#warn').html('<p style="color:red">This time slot is not Available!</p>');
							$('#sub').attr('disabled','disabled');
						}
						else
						{
							$('#warn').html('');
							$('#sub').removeAttr('disabled');
						}
					}
				});
			});
			$(document).on('change','#duration',function(){
				var hours=parseInt($('#h1').val());
				var mins=parseInt($('#m1').val());
				if($(this).val()=="30")
				{
					validateTime(hours,mins);
				}
				else
				{
					var h2=hours+1;
					$('#h2').val(h2);
					$('#m2').val(mins);
				}
				var hours2=parseInt($('#h2').val());
				var mins2=parseInt($('#m2').val());
				var date=$('#aslot').attr('date');
				$.ajax({
					dataType:'json',
					url:"<?=site_url('docSchedule/validateSlot/')?>"+hours+'/'+mins+'/'+hours2+'/'+mins2+'/'+date,
					success:function(data)
					{
						if(data.flag==false)
						{
							$('#warn').html('<p style="color:red">This time slot is not Available!</p>');
							$('#sub').attr('disabled','disabled');
						}
						else
						{
							$('#warn').html('');
							$('#sub').removeAttr('disabled');
						}
					}
				});
			});
			function validateTime(hours,mins)
			{
				var mins2=mins+30;
					if(mins2>60)
					{
						mins2=mins2-60;
						var hours2=hours+1;
						$('#h2').val(hours2);
						$('#m2').val(mins2);
					}
					else if(mins2==60)
					{
						mins2=0;
						var hours2=hours+1;
						$('#h2').val(hours2);
						$('#m2').val(mins2);
					}
					else
					{
						var hours2=hours;
						$('#h2').val(hours2);
						$('#m2').val(mins2);	
					}
			}
			function validateETime(hours,mins)
			{
				var mins2=mins+30;
					if(mins2>60)
					{
						mins2=mins2-60;
						var hours2=hours+1;
						$('#eh2').val(hours2);
						$('#em2').val(mins2);
					}
					else if(mins2==60)
					{
						mins2=0;
						var hours2=hours+1;
						$('#eh2').val(hours2);
						$('#em2').val(mins2);
					}
					else
					{
						var hours2=hours;
						$('#eh2').val(hours2);
						$('#em2').val(mins2);	
					}
			}
			$(document).on('change','#eh1',function(){
				var hours=parseInt($(this).val());
				var mins=parseInt($('#em1').val());
				if($('#eduration').val()=="30")
				{
					validateETime(hours,mins);
				}
				else
				{
					var h2=hours+1;
					$('#eh2').val(h2);
					$('#em2').val(mins);
				}
				var hours2=parseInt($('#eh2').val());
				var mins2=parseInt($('#em2').val());
				var date=$('#eslot').attr('date');
				$.ajax({
					dataType:'json',
					url:"<?=site_url('docSchedule/validateESlot/')?>"+hours+'/'+mins+'/'+hours2+'/'+mins2+'/'+date+'/'+s+'/'+e,
					success:function(data)
					{
						if(data.flag==false)
						{
							$('#ewarn').html('<p style="color:red">This time slot is not Available!</p>');
							$('#esub').attr('disabled','disabled');
						}
						else
						{
							$('#ewarn').html('');
							$('#esub').removeAttr('disabled');
						}
					}
				});
			});
			$(document).on('change','#em1',function(){
				var mins=parseInt($(this).val());
				var hours=parseInt($('#eh1').val());
				if($('#eduration').val()=="30")
				{
					validateETime(hours,mins);
				}
				else
				{
					$('#em2').val(mins);
				}
				var hours2=parseInt($('#eh2').val());
				var mins2=parseInt($('#em2').val());
				var date=$('#eslot').attr('date');
				$.ajax({
					dataType:'json',
					url:"<?=site_url('docSchedule/validateESlot/')?>"+hours+'/'+mins+'/'+hours2+'/'+mins2+'/'+date+'/'+s+'/'+e,
					success:function(data)
					{
						if(data.flag==false)
						{
							$('#ewarn').html('<p style="color:red">This time slot is not Available!</p>');
							$('#esub').attr('disabled','disabled');
						}
						else
						{
							$('#ewarn').html('');
							$('#esub').removeAttr('disabled');
						}
					}
				});
			});
			$(document).on('change','#eduration',function(){
				var hours=parseInt($('#eh1').val());
				var mins=parseInt($('#em1').val());
				if($(this).val()=="30")
				{
					validateETime(hours,mins);
				}
				else
				{
					var h2=hours+1;
					$('#eh2').val(h2);
					$('#em2').val(mins);
				}
				var hours2=parseInt($('#eh2').val());
				var mins2=parseInt($('#em2').val());
				var date=$('#eslot').attr('date');
				$.ajax({
					dataType:'json',
					url:"<?=site_url('docSchedule/validateESlot/')?>"+hours+'/'+mins+'/'+hours2+'/'+mins2+'/'+date+'/'+s+'/'+e,
					success:function(data)
					{
						if(data.flag==false)
						{
							$('#ewarn').html('<p style="color:red">This time slot is not Available!</p>');
							$('#esub').attr('disabled','disabled');
						}
						else
						{
							$('#ewarn').html('');
							$('#esub').removeAttr('disabled');
						}
					}
				});
			});
		</script>	
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:56:03 GMT -->
</html>