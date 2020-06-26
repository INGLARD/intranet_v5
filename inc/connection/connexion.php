<?php
	// Connexion à MySQL
	if (session_id() == "") {session_start();}
	$tu = isset($_SESSION['typeutilisateur']) ? $_SESSION['typeutilisateur'] : "";
	//$tu = $_SESSION['typeutilisateur'];
	if (($tu == 'MANAGERSECT') or ($tu == 'RELAISMETIER'))
	{$db = mysql_connect('localhost', 'mansect', 'a23G45sp');}
	elseif ($tu == 'MANAGERMAG')
	{$db = mysql_connect('localhost', 'manmag', '48g6s2olm6');}
	elseif (($tu == 'ADMIN') or ($tu == 'DIRECTION'))
	{$db = mysql_connect('localhost', 'info', 'i03@intranet');}
	elseif (($tu == 'RH') or ($tu == 'RH_PH'))
	{$db = mysql_connect('localhost', 'info', 'i03@intranet');}
	elseif ($tu == 'MANAGERMAGPH')
	{$db = mysql_connect('localhost', 'managermagph', 'u56ba3qp9');}
	elseif (($tu == 'MANAGERPHLG') or ($tu == 'MANAGERPH'))
	{$db = mysql_connect('localhost', 'managermagph', 'u56ba3qp9');}
	else
	{$db = mysql_connect('localhost', 'mansect', 'a23G45sp');}
	
	mysql_query("SET NAMES UTF8");
	mysql_select_db('intranet',$db); 
?>