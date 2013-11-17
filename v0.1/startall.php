<?php
  include "functions.php";

  $db = new SQLite3('data/data.db');
  $q = 'SELECT * FROM hostlist WHERE room="'.$_GET["room"].'"';
  $results = $db->query($q);
  $db = null;
  while ($row = $results->fetchArray()) {
    $exec = 'sudo wakeonlan '.$row["mac"];
    exec($exec, $out);
  }

//log the acction
  rcmslog(" from: ".$_GET["ip"].": Power ON all hosts in ".$_GET["room"]);

  print("Power ON ALL");
?>
