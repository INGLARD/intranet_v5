<?php
include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_user.php');

$param1=$_GET['param1'];
$param2=$_GET['param2'];
$param3=$_GET['param3'];
$param4=$_GET['param4'];
$resultats_user = getUser($dbconn2, $param1, $param2, $param3,$param4);

?>
