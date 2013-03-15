<?php
  include_once "initdb.php";

  $file = file('data/hostlist.lst');
  $delimiter = ',';

  foreach ($file as $line_num => $line) {
    if ( is_numeric($line[0]) ) {
      $ary = explode($delimiter, str_replace(PHP_EOL, '', $line));
      $query = 'INSERT INTO hostlist (ip, hostname, room, os) '.
                  'VALUES ("'.$ary[0].'", "'.$ary[1].'", "'.$ary[2].'", "'.$ary[3].'")';
      $results = $db->query($query);
      if (!$results) {
         $die($results);
      }
    }
  }

  $query = 'SELECT DISTINCT room FROM hostlist ORDER BY room';
      $results = $db->query($query);
      if (!$results) {
         $die($results);
      }

  while ($row = $results->fetchArray()) {
      $query2 = 'INSERT INTO roomlist (room) VALUES ("'.$row[0].'")';
      $results2 = $db->query($query2);
      if (!$results2) {
         $die($results2);
      }
  }

  $db = null;

?>
