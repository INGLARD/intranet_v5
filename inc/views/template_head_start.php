<?php
session_start();

include('./inc/connection/connexion.php');
include('./inc/connection/connexion_postgr.php');
include('./inc/connection/connexion_pdo.php');

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$typeutilisateur=$_SESSION['typeutilisateur'];
$mycode =$_SESSION['codeutilisateur'];
$nomprenom=$_SESSION['utilisateur'];
$fonction=$_SESSION['fonctionutilisateur'];
$mag=$_SESSION['magutilisateur'];
$codemd5 = $_SESSION['md5utilisateur'];
$fastpath='';

if(substr_count($url, '/') == 5){
	$fastpath='../';
}


//include($fastpath."verifuser.php");

if(($typeutilisateur=='RESP_REG_V')or($typeutilisateur=='RESP_REG_P')){


}else{
	$query = "SELECT nom FROM pri_magasins WHERE code = ".$mag;
	$results = mysql_query($query) or die('Erreur c!<br>'.$sql.'<br>'.mysql_error());
	$data = mysql_fetch_assoc($results);
	$nommag=$data['nom'];

}
$dateactu=date('d/m/Y');
// setlocale(LC_TIME, "fr_FR");
setlocale (LC_TIME, 'fr_FR.utf8','fra');

//$date=date('%A j F Y h:i:s A');
$date=strftime("%A, %d %B %Y");
$heure = date("H:i");

// PDO GET PERSONAL THEMES
$resultats=$dbconn2->prepare("SELECT * FROM intranet.int_user_theme ut, intranet.int_themes t WHERE ut.id_user=$mycode AND t.id=ut.id_theme");
$resultats->execute();
$resultats->setFetchMode(PDO::FETCH_OBJ);

while( $resultat = $resultats->fetch() )
{
	$theme_css=$resultat->function_param;

}
$resultats = null;

?>

<!DOCTYPE html>
<html class="no-focus">

<head>
	<meta charset="utf-8">

	<title><?php echo $one->title; ?></title>

	<meta name="description" content="<?php echo $one->description; ?>">
	<meta name="author" content="<?php echo $one->author; ?>">
	<meta name="robots" content="<?php echo $one->robots; ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Icons -->
	<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
	<link rel="shortcut icon" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon.png">

	<link rel="icon" type="image/png" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="<?php echo $one->assets_folder; ?>/img/favicons/favicon-192x192.png" sizes="192x192">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $one->assets_folder; ?>/img/favicons/apple-touch-icon-180x180.png">
	<!-- END Icons -->

	<!-- Stylesheets -->
	<!-- Web fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
