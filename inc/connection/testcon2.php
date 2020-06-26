<?php
include ('testcon.php');
$resultats=$dbconn2->query("SELECT * FROM intranet.int_themes");
 $resultats->setFetchMode(PDO::FETCH_OBJ);   // Récupére le nom des colonnes de la table
 while( $resultat = $resultats->fetch() )    // Parcours de chaque ligne ramené par le select
 {
         echo 'Ici : '.$resultat->id.' / '.$resultat->display_name.'--'.$resultat->name.'<br>';    // On recupére directement avec le nom de la colonne
 }
 $resultats->closeCursor();
  ?>