<?php
//Return computer list from database

$header = "Content-Type: application/json";
header($header);

try
{
    $m = new Mongo();
    $db = $m->selectDB('rcms');
}
catch ( MongoConnectionException $e )
{
    echo '<p>Couldn\'t connect to mongodb, is the "mongo" process running?</p>';
    exit();
}

$computers = new MongoCollection($db, 'computers');

$cursor = $computers->find();
$array = iterator_to_array($cursor, false);

echo json_encode($array);

?>
