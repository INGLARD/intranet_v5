<?php
	// Récupération du code md5
	session_start();

// Détruit toutes les variables de session
		$_SESSION = array();
		//session_unset();
		session_destroy();
	/*$codemd5 = isset($_GET["use"]) ? $_GET["use"] : "";
	include("connexion.php");
	mysql_query("update pri_users set md5code = null where md5code = '$codemd5'");
	include("deconnexion.php");*/
	header("Location: logu.php");
?>