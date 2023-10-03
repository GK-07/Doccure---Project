<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Laboratory List Page</title>
		
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
							<div class="col-sm-12">
								<h3 class="page-title">List of Laboratories</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=site_url('admin/Home')?>">Dashboard</a></li>
									
									<li class="breadcrumb-item active">Laboratory</li>
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
										<table id="myTable" class="display table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Laboratory Name</th>
													<th>City</th>
													<th>Mobile No.</th>
													<th>Email ID</th>
													<th>Address</th>
													<th>Account Status</th>
												</tr>
											</thead>
											<tbody>

												<?php
													$i=0;	
													foreach ($labdata as $l) {		
												?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="<?=site_url('admin/laboratory/loadLabMore/'.$l->laboratoryid)?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?=base_url("resources/shared/lab/".$l->profileimage)?>" alt="User Image"></a>
															<a href="<?=site_url('admin/laboratory/loadLabMore/'.$l->laboratoryid)?>"><?=$l->name?></a>
														</h2>
													</td>
													
													<td><?=$l->cityname?></td>
													
													<td><?=$l->contactno?></td>

													<td><?=$l->emailid?></td>
													
													<td><?=$l->address?></td>
													
													<td>
														<?php $status="status_".++$i;
														if($l->status==1)
														{
														?>
														<div class="status-toggle">
															<input type="checkbox" id="<?=$status?>" class="check" checked onclick="checkStatus(this.id,<?=$l->userid?>)">
															<label for="<?=$status?>" class="checktoggle">checkbox</label>
														</div>
														<?php 
														}
														else
														{
														?>
														<div class="status-toggle">
															<input type="checkbox" id="<?=$status?>" class="check" onclick="checkStatus(this.id,<?=$l->userid?>)">
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