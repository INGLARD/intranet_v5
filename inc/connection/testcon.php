<?php
require_once 'testcon0.php';
$dsn2 = "pgsql:host=$host2;port=$port2;dbname=$db2;user=$username2;password=$password2";//new base
try
{
$dbconn2 = new PDO($dsn2);//postgres new base
}

catch(PDOException $e)
{
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
        die();
}
 ?>