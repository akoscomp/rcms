<?php

function rcmslog($text) {
//log the acction
  $logFile = "data/rcms.log";
  $fh = fopen($logFile, 'a') or die("can't open the logfile");
  fwrite($fh, $_SERVER['PHP_AUTH_USER'].": $text.\n");
  fclose($fh);
}


function netstatus($room) {
  if ($room == 'info1' || $room == 'info3') {
    require('routeros_api.class.php');
    $API = new routeros_api();
    if ($API->connect('10.0.0.254', 'teszt', 'eysoknbp')) {

      if ($room == 'info1') {
        $API->write("/ip/firewall/filter/print", false);
        $API->write("?comment=info1-net-kikapcs");
      }
      else
      {
        $API->write("/ip/firewall/filter/print", false);
        $API->write("?comment=info3-net-kikapcs");
      }
      $READ = $API->read(false);
      $ARRAY = $API->parse_response($READ);
      $action = $ARRAY[0]['action'];
      $API->disconnect();

      if ($action == 'accept') {
        return 1;
      }
      else
      {
        return 0;
      }
    }
  }
}
?>
