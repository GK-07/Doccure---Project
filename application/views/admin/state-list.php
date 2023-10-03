<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - State List</title>
		
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
							<div class="col-sm-7">
								<h3 class="page-title">List of State</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashbard</a></li>
									<li class="breadcrumb-item active">State</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>State id</th>
													<th>State Name</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>

												<?php
													$i=0;
													foreach ($sdata as $s) {
														
												?>

												<tr>
													<td><?=$s->stateid?></td>
													<td>
														<h2 class="table-avatar">
													
															<a href="<?=site_url('admin/city/loadCity/'.$s->stateid)?>"><?=$s->statename?></a>
														</h2>
													</td>
													
													<td>
														<?php $status="status_".++$i;
														if($s->status==1)
														{
														?>
														<div class="status-toggle">
															<input type="checkbox" id="<?=$status?>" class="check" checked onclick="checkStatus(this.id,<?=$s->stateid?>)">
															<label for="<?=$status?>" class="checktoggle">checkbox</label>
														</div>
														<?php 
														}
														else
														{
														?>
														<div class="status-toggle">
															<input type="checkbox" id="<?=$status?>" class="check" onclick="checkStatus(this.id,<?=$s->stateid?>)">
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
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add State</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form enctype="multipart/form-data" action="<?=site_url('admin/state/addState')?>" method="post">
								<div class="row form-row">
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>State Name</label>
											<input type="text" name="txtState" class="form-control">
										</div>
									</div>	
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>

        </div>
		<!-- /Main Wrapper -->
		
		<?php include_once("bottomscripts.php")?>
		<script type="text/javascript">
			function checkStatus(id,sid)
			{
				var v=document.getElementById(id.toString());
				if(v.checked)
				{
						$.ajax({
							url:"<?=site_url('admin/state/editStatus/1/')?>"+sid,
							success:function(result)
							{

							}
						});
				}
				else
				{
					$.ajax({
							url:"<?=site_url('admin/state/editStatus/0/')?>"+sid,
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