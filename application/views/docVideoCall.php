<!DOCTYPE html>
<html>
<head>
			<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<?php include_once('topscripts.php')?>
</head>
<body>
	<div class="main-wrapper">
		<?php include_once('doctorHeader.php')?>
		<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Video Call</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Video Call</h2>
						</div>
					</div>
				</div>
			</div>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<?php $url="https://tokbox.com/embed/embed/ot-embed.js?embedId=0e047f14-64c1-4678-b213-be310dec9192&room=".$mdata->roomcode."&iframe=true";
						?>
						<iframe id="myPublisher" src="<?=$url?>" width=100% height=720 allow="microphone; camera"></iframe>
					</div>
				</div>
			</div>
		</div>
		<?php include_once('doctorFooter.php');?>
	</div>
	<?php include_once('bottomscripts.php')?>
	<!-- <script type="text/javascript">
		
		var publisher = OT.initPublisher("myPublisher",
		  {
		    name: "John",
		    style: { nameDisplayMode: "on" }
		  });
		session.publish(publisher);
		myPublisher.setStyle("nameDisplayMode","on");
	</script> -->
</body>
</html>