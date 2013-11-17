<?php
  include "functions.php";

//get mac address from browser
  $exec = 'sudo /root/shutdown.sh '.$_GET["hostname"];
//exectute the command
  exec( $exec, $out);

//log the acction
  rcmslog($_GET["ip"].": ".$exec." out: ".$out[0]);

  print($exec." out: ".$out[0]);
?>
