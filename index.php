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
	    function refreshList() {
		alert('Frissul a lista');
	    }

	    function getIP(oObject) {
		var id = oObject.id;
		gepAdatok = {ipAddress: '10.0.0.1', hostName: 'cs54-na' };
		alert(id);
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

	<table id="complist" cellspacing="1">
	    <thead>
		<tr>
		    <th>IP address</th><th>Computer name</th><th>Action</th>
		</tr>
	    </thead>
	    <tbody>
	    <?php
		$action = './script.sh hostlist info1';
		$out = shell_exec($action);
		$hosts = explode(" ", $out);
		while (list($key, $value) = each($hosts)) {
		    print '<tr onclick="getIP(this)" id="'.$hosts[$key].'">';
		    print '<td class="ip">'.$value.'</td>';
		    print '<td class="host">'.$hosts[$key + 1].'</td>';
		    print '<td class="stoped">Stoped</td>';
		    print '</tr>';
		    unset($hosts[$key + 1]);
		}
	    ?>
	    </tbody>
	    <tfoot>
	    <th colspan="3">Finish</th>
	    </tfoot>
	</table>

	<div style="float:right">
	    <img id="spin" style="vertical-align: middle; visibility: hidden;" src="spin.gif"></img>
	    <input id="refreshb" type="button" onclick="refreshList()" value="Refresh"></input>
	</div>

    </body>
</html>
