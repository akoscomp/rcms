<?php
    if ($db = new SQLite3('data/data.db')) {

        $query = @$db->query('CREATE TABLE IF NOT EXISTS roomlist (
			id int PRIMARY KEY, 
			room text)');

        $query = @$db->query('CREATE TABLE IF NOT EXISTS hostlist (
			id int PRIMARY KEY, 
			ip text UNIQUE NOT NULL, 
			hostname text, 
			room text, 
			state text CHECK(state IN ("on", "off")), 
			os text CHECK(os IN ("win", "lin")),
			mac text)');
    }

  $file = file('data/hostlist.lst');
  $delimiter = ',';

  foreach ($file as $line_num => $line) {
    if ( is_numeric($line[0]) ) {
      $ary = explode($delimiter, str_replace(PHP_EOL, '', $line));
      $query = 'INSERT INTO hostlist (ip, hostname, room, state, os, mac) '.
                  'VALUES ("'.$ary[0].'", "'.$ary[1].'", "'.$ary[2].'", "off", "'.$ary[3].'", "'.$ary[4].'")';
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

?>
