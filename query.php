<?php
          $db = new SQLite3('data/data.db');
          $results = $db->query('SELECT * FROM hostlist');
$db = null;
          //$results = $db->query('SELECT room FROM roomlist');

while ($row = $results->fetchArray()) {
    var_dump($row);
}

?>
