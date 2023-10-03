<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
	<div id="add">
		<button id="btn1" disabled>CLICK</button>
	</div>
	<script type="text/javascript">
		var arr=new Array();
		arr.push("1");
		arr.push(new Date(2021,4,21,11,53,0,0));
		var myVar=setInterval(function(){myTimer()},1000);
		var target=new array(new Date(2021,4,21,20,35,0,0));
		/*eval("function myTimer(){var d=new Date();if(d>target){document.getElementById('btn1').disabled=false;clearTimeout(myVar);}}");*/
		alert(arr);
	</script>
	<?php echo date('d-m-Y')?>
</body>
</html>