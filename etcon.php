<?php
//print_r($_GET);
 $act = 'sudo /home/etcon/etcodiel.sh '.$_GET['action'];
// echo "<br><pre>shell_script = ".$act;
 $output = shell_exec($act);
 //sleep(1);
echo "<pre><b>$output</b></pre>";
?>