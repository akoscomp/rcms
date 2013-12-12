<?php
include_once("config.php");
if(!loggedIn()):
	header('Location: login.php');
endif;

$header = "Content-Type: application/json";
header($header);

$exec = '/usr/bin/python /home/akos/rcms/bell/ringweb.py '.$_POST["button"];
exec( $exec, $out);

if ($out) {
    print json_encode($out);
}

?>
