<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<!--<link rel="shortcut icon" href="favicon.ico">-->
	<script language="JavaScript" src="status.js" type="text/javascript"></script>
    </head>
    <body>
	<?php
	// put your code here
	?>
	<script>
	    function getIP(oObject) {
		var id = oObject.id;
		gepAdatok = {ipAddress: '10.0.0.1', hostName: 'cs54-na' };
		alert(id);
	    }

            function getServerText(room) {
                var myurl = 'table.php';
                var modurl = myurl + "?room=" + room;
                http.open("GET", modurl, true);
                http.onreadystatechange = useHttpResponse;
                http.send(null);
            }
        </script>

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
	    <input id="refreshb" type="button" onclick="getServerText('info3')" value="Refresh"></input>
	</div>
        
        <div id="tableReturn"></div>
    </body>
</html>
