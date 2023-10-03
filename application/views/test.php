<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<div id="add">
		<a class="hey">add</a>
	</div>
</body>
<script type="text/javascript">
	$(document).on('click','.hey',function(e){
		var v='<select>'+
		'<?php foreach ($certi as $c){?>'+
		'<option><?=$c->certificatename?></option>'+
		'<?php } ?>'+
		'</select>';
		$('#add').append(v);
	});
</script>
</html>