<?php
	// Connexion � postgre

	$dbconn = pg_connect("host=192.168.100.5 dbname=dairy user=dbadmin password=almath") or die ("connection failed");
	$dbconn2 = pg_connect("host=192.168.100.5 dbname=accounts user=dbadmin password=almath") or die ("connection failed");
	$dbconnw2 = pg_connect("host=192.168.100.168 dbname=gescomv2 user=postgres password=w2sdf96zm") or die ("connection dbconnw2");
?>
