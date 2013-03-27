<?php
  include "functions.php";

//get mac address from browser
  $exec = 'sudo wakeonlan '.$_GET["mac"];
//exectute the command
  exec( $exec, $out);

//log the acction
  rcmslog($_GET["ip"].": ".$exec." out: ".$out[0]);

  print($exec." out: ".$out[0]);
?>
