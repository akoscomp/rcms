<?php
  include "functions.php";

  $db = new SQLite3('data/data.db');
  $q = 'SELECT * FROM hostlist WHERE room="'.$_GET["room"].'"';
  $results = $db->query($q);
  $db = null;
  while ($row = $results->fetchArray()) {
    $exec = 'sudo /root/shutdown.sh '.$row["hostname"];
    exec( $exec, $out);
  }

//log the acction
  rcmslog($_SERVER['PHP_AUTH_USER'].", from: ".$_GET["ip"].": Shutdown all hosts in ".$_GET["room"]);

  print($exec."Out: Shutdown ALL");
?>
