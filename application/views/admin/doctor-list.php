<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Doctor List Page</title>
		
		<!-- Favicon -->
       <?php include_once("topscripts.php")?>
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
        <?php include_once('header.php')?>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <?php include_once('sidebar.php')?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-8">
								<h3 class="page-title">List of Doctors</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=site_url('admin/Home')?>">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Doctor</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="myTable" class="displaydatatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor id</th>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Mobile No.</th>
													<th>Email ID</th>
													<th>City</th>
													<th>Account Status</th>
													
												</tr>
											</thead>
											<tbody>

												<?php
													$i=0;
													foreach ($doctordata as $d) {
														
												?>

												<tr>
													<td><?=$d->doctorid?></td>
													<td>
														<h2 class="<?=site_url('admin/doctor/loadDoctorMore/'.$d->doctorid)?>">
															<a href="<?=site_url('admin/doctor/loadDoctorMore/'.$d->doctorid)?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?=base_url("resources/shared/doctor/".$d->profileimage)?>" alt="User Image"></a>
															<a href="<?=site_url('admin/doctor/loadDoctorMore/'.$d->doctorid)?>"><?=$d->fullname?></a>
														</h2>
													</td>
													<td><?=$d->categoryname?></td>
													
													<td><?=$d->mobileno?></td>

													<td><?=$d->emailid?></td>

													<td><?=$d->cityname?></td>
													
													<td>
														<?php $status="status_".++$i;
														if($d->status==1)
														{
														?>
														<div class="status-toggle">
															<input type="checkbox" id="<?=$status?>" class="check" checked onclick="checkStatus(this.id,<?=$d->userid?>)">
															<label for="<?=$status?>" class="checktoggle">checkbox</label>
														</div>
														<?php 
														}
														else
														{
														?>
														<div class="status-toggle">
															<input type="checkbox" id="<?=$status?>" class="check" onclick="checkStatus(this.id,<?=$d->userid?>)">
															<label for="<?=$status?>" class="checktoggle">checkbox</label>
														</div>
														<?php
														}	
														?>
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
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<?php include_once("bottomscripts.php")?>
		<script type="text/javascript">
			function checkStatus(id,uid)
			{
				var v=document.getElementById(id.toString());
				if(v.checked)
				{
						$.ajax({
							url:"<?=site_url('admin/doctor/editStatus/1/')?>"+uid,
							success:function(result)
							{

							}
						});
				}
				else
				{
					$.ajax({
							url:"<?=site_url('admin/doctor/editStatus/0/')?>"+uid,
							success:function(result)
							{

							}
						});
				}
			}
		</script>
		
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
</html>