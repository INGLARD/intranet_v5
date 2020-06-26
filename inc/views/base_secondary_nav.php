<?php
include ('../connection/connexion.php');
$code_nom =$_GET['code_nom'];
$code_nom2=$_GET['code_nom2'];
$code_nom3=$_GET['code_nom3'];
$typacces=$_GET['typ'];

if($typacces=='acc'){

  $query="SELECT code,nom,nom_affichage FROM pri_menusV5 WHERE code=".$code_nom;
  $results = mysql_query($query);

  if (mysql_num_rows($results) > 0){
    $data = mysql_fetch_assoc($results);
      $code_nom=$data['nom_affichage'];
      $code_classe=$data['nom'];
       $query2="SELECT code,nom,nom_affichage FROM pri_menusV5 WHERE code_menu_maitre=".$data['code']." AND code=".$code_nom2;
        $results2 = mysql_query($query2);
        if (mysql_num_rows($results2) > 0){
          $data2 = mysql_fetch_assoc($results2);
            $code_nom2=$data2['nom_affichage'];

            $query3="SELECT code,nom,nom_affichage FROM pri_menusV5 WHERE code_menu_maitre=".$data2['code']." AND code=".$code_nom3;
            $results3 = mysql_query($query3);
            if (mysql_num_rows($results3) > 0){
              $data3 = mysql_fetch_assoc($results3);
                $code_nom3=$data3['nom_affichage'];
              }
          }



    }




}else{
  $code_classe=$_GET['code_classe'];
}

echo '
<div class="secondary_nav">
<nav aria-label="breadcrumb" class="breadcrumb">
<ol class="breadcrumbnav">
<li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
<li class="breadcrumb-item"><a href="#">'. $code_nom .'</a></li>
<li class="breadcrumb-item"><a href="#">'. $code_nom2 .'</a></li>
<li class="breadcrumb-item active" aria-current="page">'. $code_nom3 .'</li>
</ol>
</nav>
<div class="toptitleimage submenu_'.$code_classe.'"><span class="-'.$code_classe.'"></span></div>
<h1 class="v5class">'. $code_nom3 .'</h1>
</div>';

 ?>
