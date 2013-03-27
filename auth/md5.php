<html>
	<head>
		<title>md5</title>
		<script type="text/javascript" src="md5.js"></script>
		<script type="text/javascript">
			function hash()
			{
				strPW = document.getElementById('pw').value;
				document.getElementById('js_md5').value = hex_md5(strPW);
			}
		</script>
	</head>
	<body onload="hash()">
		<form>
			Password:  <input type="text" name="pw" id="pw" value="<?php echo $_REQUEST['pw'];?>"/>
			<input type="button" name="Hash" value="Hash" onclick="hash()"/>
			<br/>
			md5:  <input type="text" name="js_md5" id="js_md5" size="40"/>
		</form>
	</body>
</html>
