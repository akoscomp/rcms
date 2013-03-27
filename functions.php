<?php

function rcmslog($text) {
//log the acction
  $logFile = "data/rcms.log";
  $fh = fopen($logFile, 'a') or die("can't open the logfile");
  fwrite($fh, $_SERVER['PHP_AUTH_USER'].": $text.\n");
  fclose($fh);
}


?>