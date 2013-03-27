<?php
  include "functions.php";

  $out = array();
  exec("sudo arp-scan --interface=eth0 --localnet | grep '[0-9]\{1,3\}\.[0-9]\{1,3\}\.[0-9]\{1,3\}\.[0-9]\{1,3\}'", $out);
  rcmslog("Scan..., host found: ".count($out));

  if (isset($_GET['room']) && count($out)) {
    if ($_GET['room'] == "other") {
      foreach ($out as &$line) {
        $arr = preg_split("/[\t,]+/", $line);
      }
    }
  }

  $db = new SQLite3('data/data.db');
  $results = $db->query("UPDATE hostlist SET state='off' WHERE state='on'");

  if ((isset($_GET['room'])) && ($_GET['room'] == "other") && count($out)) {
    foreach ($out as &$line) {
      $arr = preg_split("/[\t,]+/", $line);
      $results = $db->query('SELECT mac FROM hostlist WHERE mac="'.$arr[1].'"'); //return TRUE if mac exists
      if ($results instanceof Sqlite3Result) {
          $results = $db->query('INSERT INTO hostlist (ip, hostname, room, state, os, mac)'.
                        'VALUES ("'.$arr[0].'", "'.gethostbyaddr($arr[0]).'", "other", "on", "lin", "'.$arr[1].'")');
        }
      else
        {
          $results = $db->query('UPDATE hostlist SET state="on" WHERE mac="'.$arr[1].'"');
        }
    }
  }
  else
  {
   if (count($out)) {
    foreach ($out as &$line) {
      $arr = preg_split("/[\t,]+/", $line);
      $results = $db->query('UPDATE hostlist SET state="on" WHERE mac="'.$arr[1].'"');
    }
   }
  }

  $db = null;
?>
