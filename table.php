<table id="complist" cellspacing="1">
    <thead>
	<tr>
	    <th>IP address</th><th>Computer name</th><th>Status</th>
	</tr>
    </thead>
    <tbody>
    <?php
    $room = "info3";
	$action = './script.sh hostlist '.$room;
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
