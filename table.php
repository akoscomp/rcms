<table id="complist" cellspacing="1">
    <thead>
	<tr>
	    <th>IP address</th><th>Computer name</th><th>Status</th>
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
	    print '<tr onclick="getIP(this)" id="'.$row["mac"].'">';
	      print '<td class="ip">'.$row["ip"].'</td>';
	      print '<td class="host">'.$row["hostname"].'</td>';
	      if ($row['state'] == 'on') {
		print '<td class="started">Run</td>';
	      }	      
	      else
	      {
		print '<td class="stoped">Stoped</td>';
	      }
	    print '</tr>';
	  }
	}
    ?>
    </tbody>
    <tfoot>
    <th colspan="3">Finish</th>
    </tfoot>
</table>
