<table id="complist" cellspacing="1">
    <thead>
	<tr>
	    <th>IP address</th><th>Computer name</th><th>Status</th><th>Accion</th>
	</tr>
    </thead>
    <tbody>
<?php
	$room = $_GET["room"];
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
	      print '<td class="actionbutton"><span><input id="'.$row["mac"].'" type="button" onclick="start(this)" value="Start"></input></span>&nbsp;<span><input id="'.$row["mac"].'" type="button" onclick="stop(this)" value="Stop"></input></span></td>';
	    print '</tr>';
	  }
	}
    ?>
    </tbody>
    <tfoot>
    <th colspan="3">Finish</th>
    </tfoot>
</table>

<div style="float:right">
    <img id="spin" style="vertical-align: middle; visibility: hidden;" src="img/spin.gif"></img>
    <input id="<?php echo $room ?>" data-room="<?php echo $room ?>" type="button" onclick="refresh(this)" value="Refresh"></input>
</div>
