<?php
require_once 'dbconfig.php';

$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password";//dairy
$dsn1 = "pgsql:host=$host1;port=$port;dbname=$db1;user=$username1;password=$password1";//accounts
$dsn2 = "pgsql:host=$host2;port=$port2;dbname=$db2;user=$username2;password=$password2";//new base
$connexion ="mysql:host=$hote;port=$port;dbname=$nom_bd;charset=utf8;user=$utilisateur;password=$mot_passe";//mysql

try
{
    // $dbconn = new PDO($dsn);//postgres dairy
    // $dbconn1 = new PDO($dsn1);//postgres accounts
     //$dbconn3 = new PDO($connexion);//mysql

    $dbconn2 = new PDO($dsn2);//postgres new base

}

catch(PDOException $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
    die();
}

// Ne pas oublier de faire un "Prepare"

// $resultats=$dbconn->query("SELECT * FROM dry_enseigne order by id");
// $resultats->setFetchMode(PDO::FETCH_OBJ);   // Récupére le nom des colonnes de la table
// while( $resultat = $resultats->fetch() )    // Parcours de chaque ligne ramené par le select
// {
//         echo 'Enseigne : '.$resultat->id.' / '.$resultat->short_name.'--'.$resultat->name.'<br>';    // On recupére directement avec le nom de la colonne
// }
// $resultats->closeCursor();
//
// $dbconn->close();
// $dbconn1->close();
// $dbconn2->close();

?>
