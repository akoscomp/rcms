<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<!--<link rel="shortcut icon" href="favicon.ico">-->
	<script language="JavaScript" src="status.js" type="text/javascript"></script>
    </head>
    <body onLoad="getServerText()">
	<ul>
	<?php
	    $action = './script.sh listrooms';
	    $out = shell_exec($action);
	    $rooms = explode(" ", $out);
	    foreach ($rooms as &$room) {
		print '<li id="'.$room.'">'.$room.'</li>';
	    }
	?>
	</ul>

	<div style="float:right">
	    <img id="spin" style="vertical-align: middle; visibility: hidden;" src="spin.gif"></img>
	    <input id="refreshb" type="button" onclick="getServerText()" value="Refresh"></input>
	</div>
        
        <div id="tableReturn"></div>
    </body>
</html>
