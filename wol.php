<?php
//get mac address from browser
  $exec = 'sudo wakeonlan '.$_GET["mac"];
//exectute the command
  exec( $exec, $out);

//log the acction
  $logFile = "wol.log";
  $fh = fopen($logFile, 'a') or die("can't open the logfile");
  fwrite($fh, $_GET["ip"].": ".$exec." out: ".$out[0]."\n");
  fclose($fh);

  print($exec." out: ".$out[0]);
?>
