<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>rcms</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<!--<link rel="shortcut icon" href="favicon.ico">-->
	<script language="JavaScript" src="functions.js" type="text/javascript"></script>
	<script language="JavaScript" src="`jquery-1.9.1.min.js" type="text/javascript"></script>
    </head>
    <body>
	<?php

//	include_once "scan.php";

	if (isset($_SERVER['PHP_AUTH_USER'])) {
	  print('user: '.$_SERVER['PHP_AUTH_USER']);
	}

	  $db = new SQLite3('data/data.db');
	  $roomlist = $db->query('SELECT room FROM roomlist');
	  $db = null;
	?>
	<ul>
	<?php
	    while ($row = $roomlist->fetchArray()) {
		   print '<li id="'.$row["room"].'" data-room="'.$row["room"].'" onclick="getServerText(this)">'.$row["room"].'</li>';
	    }
	?>
	</ul>

	<label id="ip" class="hiddenlabel"><?php echo $_SERVER['REMOTE_ADDR']; ?></label>
        <div id="tableReturn">Please select a group...</div>
        <div id="messageBox"></div>

    </body>
</html>
