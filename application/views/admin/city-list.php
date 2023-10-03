<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - City List</title>
		
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
							<div class="col-sm-9">
								<h3 class="page-title">List of City</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=site_url('admin/Home')?>">Dashboard</a></li>
									<li class="breadcrumb-item active">City</li>
								</ul>
							</div>
							<div class="col-sm-2">
								<button class="btn btn-primary float-right mt-2" onclick="onAll('<?php echo $cdata[0]->stateid?>','<?php echo count($cdata)?>')">Enable All</button>
							</div>
							<div class="col-sm-1 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2" onclick="setStateId('<?php echo $cdata[0]->stateid?>')">Add</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive" id='tbl'>
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>City id</th>
													<th>City Name</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>

												<?php
													$i=0;
													foreach ($cdata as $c) {
														
												?>

												<tr>
													<td><?=$c->cityid?></td>
													<td>
														<h2 class="table-avatar">
													
															<a href="#"><?=$c->cityname?></a>
														</h2>
													</td>
													
													<td>
														<?php $status="status_".++$i;
														if($c->status==1)
														{
														?>
														<div class="status-toggle">
															<input type="checkbox" id="<?=$status?>" class="check" checked onclick="checkStatus(this.id,<?=$c->cityid?>)">
															<label for="<?=$status?>" class="checktoggle">checkbox</label>
														</div>
														<?php 
														}
														else
														{
														?>
														<div class="status-toggle">
															<input type="checkbox" id="<?=$status?>" class="check" onclick="checkStatus(this.id,<?=$c->cityid?>)">
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
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add City</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form enctype="multipart/form-data" action="<?=site_url('admin/city/addCity')?>" method="post">
								<input type="text" name="txtSid" id="stateid" hidden>
								<div class="row form-row">
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>City Name</label>
											<input type="text" name="txtCity" class="form-control">
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
			function checkStatus(id,cid)
			{
				var v=document.getElementById(id.toString());
				if(v.checked)
				{
						$.ajax({
							url:"<?=site_url('admin/city/editStatus/1/')?>"+cid,
							success:function(result)
							{

							}
						});
				}
				else
				{
					$.ajax({
							url:"<?=site_url('admin/city/editStatus/0/')?>"+cid,
							success:function(result)
							{

							}
						});
				}
			}

			function setStateId(sid)
			{
				document.getElementById('stateid').value=sid;
			}
			function onAll(sid,count)
			{
				for (var i = 1; i <= count; i++) {
					var id="status_"+i;
					document.getElementById(id.toString()).checked=true;
				}
				$.ajax({
						url:"<?=site_url('admin/city/enableAll/')?>"+sid,
						success:function(result)
						{
								
						}
					});
			}
		</script>
		
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/doctor-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:57:32 GMT -->
</html>