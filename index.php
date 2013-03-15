<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<!--<link rel="shortcut icon" href="favicon.ico">-->
	<script language="JavaScript" src="functions.js" type="text/javascript"></script>
    </head>
    <body>
	<ul>
	<?php
	    include_once "data/config.php";
	    include_once "data/initdb.php";
	    include_once "data/initdata.php";

	    $action = './script.sh listrooms';
	    $out = shell_exec($action);
	    $rooms = explode(" ", $out);
	    foreach ($rooms as &$room) {
		   print '<li id="'.$room.'" onclick="getServerText(this)">'.$room.'</li>';
	    }
	?>
	</ul>

        <div id="tableReturn">Please wait...</div>

	<div style="float:right">
	    <img id="spin" style="vertical-align: middle; visibility: hidden;" src="img/spin.gif"></img>
	    <input id="refreshb" type="button" onclick="getID(this)" value="Refresh"></input>
	</div>
    </body>
</html>
