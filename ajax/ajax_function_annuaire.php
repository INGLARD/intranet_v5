<?php
include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_annuaire.php');

$param1=$_GET['param1'];
$param2=$_GET['param2'];

$resultats_annuaire = getAnnuaire($dbconn2, $param1, $param2);

?>
