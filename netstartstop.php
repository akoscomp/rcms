<?php
include "functions.php";

$room = $_GET["room"];

if ($room == 'info1' || $room == 'info3') {

require('routeros_api.class.php');

$API = new routeros_api();

if ($API->connect('10.0.0.254', 'teszt', 'Bfu6NL9Fyi')) {

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

rcmslog("Start/Stop internet: ".$room);

//print_r($ARRAY);
echo "id: ";
$id=$ARRAY[0]['.id'];
$action=$ARRAY[0]['action'];

print $id.$action;

$API->write("/ip/firewall/filter/set", false);
$API->write("=.id=".$ARRAY[0]['.id']."", false);
if ($ARRAY[0]['action'] == 'accept') {
$API->write("=action=drop");
}
else
{
$API->write("=action=accept");
}
$READ = $API->read(false);
$ARRAY = $API->parse_response($READ);

$API->disconnect();

}

}

?>
