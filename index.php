<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>rcms</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<!--<link rel="shortcut icon" href="favicon.ico">-->
	<script language="JavaScript" src="functions.js" type="text/javascript"></script>
    </head>
    <body>
	<?php
	  include_once "scan.php";
	  $db = new SQLite3('data/data.db');
	  $roomlist = $db->query('SELECT room FROM roomlist');
	  $db = null;
	?>
	<ul>
	<?php
	    while ($row = $roomlist->fetchArray()) {
		   print '<li id="'.$row["room"].'" onclick="getServerText(this)">'.$row["room"].'</li>';
	    }
	?>
	</ul>

        <div id="tableReturn">Please select room...</div>

    </body>
</html>
