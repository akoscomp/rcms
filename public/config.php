<?php
ob_start();
error_reporting(E_ALL);
try
{
  $m    = new MongoClient("mongodb://127.0.0.1");
  $db   = $m->rcms;
  $coll = $db->users;
}
catch (MongoConnectionException $e)
{
  die('Error connecting to MongoDB server');
} 
catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
include_once("functions.php");
session_start();
?>
