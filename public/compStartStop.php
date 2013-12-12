<?php
include_once("config.php");
if(!loggedIn()):
	header('Location: login.php');
endif;

$header = "Content-Type: application/json";
header($header);

//get mac address from browser
  $exec = 'sudo wakeonlan '.$_POST["mac"];
//exectute the command
  exec( $exec, $out);
  print json_encode($out);
  
?>
