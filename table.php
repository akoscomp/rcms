<?php
include "functions.php";

$room = $_GET["room"];
?>
<?php
if ($room == "info1" || $room == "info3") {
  if ( netstatus($room) ) {
    print '<input id="netstartstopbt" type="button" class="netstartstopbt" data-stat="stop" data-room="'.$room.'" onclick="netstartstop(this)" value="Stop internet" />';
  }
  else {
    print '<input id="netstartstopbt" type="button" class="netstartstopbt" data-stat="start" data-room="'.$room.'" onclick="netstartstop(this)" value="Start internet" />';
  }
}
?>
<table id="complist" cellspacing="1">
    <thead>
	<tr>
	    <th>IP address</th><th>Computer name</th><th>Status</th><th>Acction</th>
	</tr>
    </thead>
    <tbody>
<?php
	//$room = "info3";
	$db = new SQLite3('data/data.db');
        $results = $db->query('SELECT * FROM hostlist');
 	$db = null;
	while ($row = $results->fetchArray()) {
	  if ($row['room'] == $room) {
	    print '<tr id="'.$row["mac"].'">';
	      print '<td class="ip">'.$row["ip"].'</td>';
	      print '<td class="host">'.$row["hostname"].'</td>';
	      if ($row['state'] == 'on') {
		print '<td class="started">Run</td>';
	      }
	      else
	      {
		print '<td class="stoped">Stoped</td>';
	      }
	      print '<td class="actionbutton"><span><input id="'.$row["mac"].'" type="button" onclick="start(this)" value="Start"></input></span>&nbsp;&nbsp;<span><input id="'.$row["hostname"].'" type="button" onclick="stop(this)" value="Stop"></input></span></td>';
	    print '</tr>';
	  }
	}
    ?>
    </tbody>
    <tfoot>
    <th colspan="3">All computers:</th>
    <td class="actionbutton">
      <span><input id="stopall" data-room="info3" type="button" onclick="startall(this)" value="Start ALL"></input></span>&nbsp;&nbsp;
      <span><input id="startall" data-room="info3" type="button" onclick="stopall(this)" value="Stop ALL"></input></span>
    </td>
    </tfoot>
</table>

<div style="float:right">
    <img id="spin" style="vertical-align: middle; visibility: hidden;" src="img/spin.gif"></img>
    <input id="refreshbt" data-room="<?php echo $room ?>" type="button" onclick="refresh(this)" value="Refresh"></input>
</div>
