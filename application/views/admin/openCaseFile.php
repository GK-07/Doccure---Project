<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 06:55:44 GMT -->
<head>
		<meta charset="utf-8">
		<title>New Case File</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<?php include_once('topscripts.php')?>
	
	</head>
	<body>
		
			<textarea name="caseData" disabled><?=$casefile->casedata?></textarea>

		<!-- <iframe src="https://tokbox.com/embed/embed/ot-embed.js?embedId=0e047f14-64c1-4678-b213-be310dec9192&room=room1&iframe=true" width=1080 height=720 scrolling="auto" allow="microphone; camera" ></iframe> -->

		<script type="text/javascript">
			var editor = CKEDITOR.replace( 'caseData', { /*Editor instance configuration goes here*/ });
			editor.on( 'instanceReady', function(event){
    		if(event.editor.getCommand( 'maximize' ).state == CKEDITOR.TRISTATE_OFF);//ckeck if maximize is off
        		event.editor.execCommand( 'maximize');
		});
		</script>
	</body>
</html>