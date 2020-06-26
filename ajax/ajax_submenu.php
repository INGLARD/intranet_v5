
<?php
if (session_id() == "") {session_start();}
$codeut=$_GET['codem'];
$utilisateur=$_GET['toot2'];
$codemenup=$_GET['codemenup'];

include('../connexion.php');
include('../connexion_postgr.php');
$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);



$query3 = "SELECT m.nom, m.icone, m.nom_affichage, m.nom_page,m.code FROM pri_menus m, users_menus u where m.code_menu_maitre=".$codeut." and u.code_user = ".$utilisateur." and u.code_menu = m.code order by m.ordre";
								 $results3 = mysql_query($query3) or die('Erreur3 <br>');
								 
								 if (mysql_num_rows($results3) > 0)
								
								 	{
								 	 echo '<ul>';
								 	while($data3 = mysql_fetch_assoc($results3)){
								 	
								 	echo '
			<li class="toot"><i class="glyph-icon icon-elusive-doc-new"></i>&nbsp;<a href="#" onclick="mafoonction('.$codemenup.','.$codeut.','.$data3['code'].',this.id);" data-codem="'.$codemenup.'"  data-codemenussp="'.$codeut.'" data-menu="'.$data3['code'].'" data-varmenu="'.$data3['nom_page'].'" id="'.$data3['nom_page'].'" class="ssmenuhp">'.$data3['nom_affichage'].'</a></li>';
								 	}
echo '</ul>';
								 	}
								 	
								 	
			
?>

	<?php
	include('deconnexion.php');
	include('deconnexion_postgr.php');

?>
