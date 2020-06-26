<?php
if (session_id() == "") {session_start();}
$codeut=$_GET['toot2'];
$menu=$_GET['menu'];
$codemd5=$_GET["md5"];

include('../connexion.php');
include('../connexion_postgr.php');
$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);


?>
<html>

<body>
 
      
		
		<?php 
		//echo $querymd5="SELECT md5code FROM pri_users WHERE code=".$mycode;
//$resmd5=mysql_query($querymd5);
//if (mysql_num_rows($resmd5) > 0){
//while($data01 = mysql_fetch_assoc($resmd5))	{
//$codemd5=$data01['md5code'];
//}
//}
		if (($codeut==1) && ($menu=='boul')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-doc-new"></i>&nbsp;<a href="boul_v5/commandes_transgourmet.php?use='.$mycode.'&menu='.$menu.'&page=visitems" >Fiche de visite manager de secteur</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-doc-new-circled"></i>&nbsp;<a href="#">Fiche de visite relais métier</a></li>
			
			</ul>';
		}
		if (($codeut==2) && ($menu=='boul')){
			echo '<ul>
		
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i><a href="#" >Carte <br> boulangeries</a></li>

			</ul>';
		}
		
		if (($codeut==1) && ($menu=='transgourmet')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-basket"></i>&nbsp;<a href="#">Historique commandes</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-flag"></i>&nbsp;<a href="#">Commande vêtements et matériels</a></li>
			
			</ul>';
		}
		if (($codeut==2) && ($menu=='transgourmet')){
			echo '<ul>
		
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i><a href="#">Modification <br>du mot de passe</a></li>

			</ul>';
		}
				if (($codeut==1) && ($menu=='fournisseur')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-website"></i>&nbsp;<a href="#" class="link">Accéder sites de commande</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-clipboard"></i>&nbsp;<a href="commandes_transgourmet.php?use='.$mycode.'&menu='.$menu.'&page=visitems" >Historique des commandes Transgourmet</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-export"></i>&nbsp;<a href="#">Validation des BL Transgourmet</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='fournisseur')){
			echo '
			
				<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-shopping-cart"></i></span><a href="#">Site de commande fournisseur</a></li>
				  <li class="listtt"><span><i class="glyph-icon icon-elusive-clipboard"></i></span><a href="commandes_transgourmet.php?use='.$mycode.'&menu='.$menu.'&page=historiquecommande">Historique des commandes Transgourmet</a></li>
				  <li class="listtt"><span><i class="glyph-icon icon-elusive-export"></i></span><a href="#">Validation des BL Transgourmet</a></li>


				</ul>';
		}

		if (($codeut==1) && ($menu=='bl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Consultation des fiches de visite</a></li>
		
			</ul>';
		}
		if (($codeut==2) && ($menu=='bl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Consultation des fiches de visite</a></li>
			
			</ul>';
		}				
		if (($codeut==1) && ($menu=='gestionmag')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-doc-new"></i>&nbsp;<a href="#">Consultation des fiches de visite</a></li>
		
			</ul>';
		}
		if (($codeut==2) && ($menu=='gestionmag')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Consultation des fiches de visite</a></li>
			
			</ul>';
		}
		if (($codeut==1) && ($menu=='listbl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-list"></i>&nbsp;<a href="#">Liste des BL</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-list"></i>&nbsp;<a href="#">Liste des BL crèmerie</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-list"></i>&nbsp;<a href="#">Liste des BL crèmerie direction</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='listbl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-list"></i>&nbsp;<a href="#">Liste des BL</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-list"></i>&nbsp;<a href="#">Liste des BL crèmerie</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-list"></i>&nbsp;<a href="#">Liste des BL crèmerie direction</a></li>
			
			</ul>';
		}
		if (($codeut==1) && ($menu=='tarifs')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-barcode"></i>&nbsp;<a href="#">Visualisation des tarifs</a></li>

			</ul>';
		}
		if (($codeut==2) && ($menu=='tarifs')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-barcode"></i>&nbsp;<a href="#">Visualisation des tarifs</a></li>
			
			</ul>';
		}		
		if (($codeut==1) && ($menu=='paxton')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-doc-inv-alt"></i>&nbsp;<a href="#">Retour Paxton</a></li>
<li><i class="glyph-icon icon-iconic-doc-inv"></i>&nbsp;<a href="#">Inventaire Paxton</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='paxton')){
			echo '<ul>
			<li  class="toot"><i class="glyph-icon icon-iconic-doc-inv-alt"></i>&nbsp;<a href="#">Retour Paxton</a></li>
			<li  class="toot"><i class="icon-iconic-doc-inv"></i>&nbsp;<a href="#">Inventaire Paxton</a></li>
			
			</ul>';
		}
		if (($codeut==1) && ($menu=='commandes')){
			echo '<ul>
			<li  class="toot"><i class="glyph-icon icon-elusive-basket"></i>&nbsp;<a href="#">Visu commande FL d\'un magasin</a></li>
			<li  class="toot"><i class="glyph-icon icon-elusive-basket-circled"></i>&nbsp;<a href="#">Visu commande FL</a></li>
			<li  class="toot"><i class="glyph-icon flaticon-006-grocery"></i>&nbsp;<a href="#">Saisie commande crèmerie</a></li>

			</ul>';
		}
		if (($codeut==2) && ($menu=='commandes')){
			echo '<ul>
			<li  class="toot"><i class="glyph-iconicon-elusive-basket"></i>&nbsp;<a href="#">Visu commande FL d\'un magasin</a></li>
			<li  class="toot"><i class="glyph-icon icon-elusive-basket-circled"></i>&nbsp;<a href="#">Visu commande FL</a></li>
			<li  class="toot"><i class="glyph-icon flaticon-006-grocery"></i>&nbsp;<a href="#">Saisie commande crèmerie</a></li>
			
			</ul>';
		}
		if (($codeut==1) && ($menu=='stock')){
			echo '<ul>
			<li  class="toot"><i class="glyph-icon veggi-001-tomato"></i>&nbsp;<a href="#">Visu stock Fruits secs</a></li>
			<li class="toot"><i class="glyph-icon veggi-011-coconut"></i>&nbsp;<a href="#">Visu stock Fruits soir</a></li>
			<li class="toot"><i class="glyph-icon veggi-012-carambola"></i>&nbsp;<a href="#">Stock fruits secs (fin de mois)</a></li>
			<li class="toot"><i class="glyph-icon veggi-022-peanut"></i>&nbsp;<a href="#">Stock soir (fin de mois)</a></li>

			</ul>';
		}
		if (($codeut==2) && ($menu=='stock')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon veggi-001-tomato"></i>&nbsp;<a href="#">Visu stock Fruits secs</a></li>
			<li class="toot"><i class="glyph-icon veggi-011-coconut"></i>&nbsp;<a href="#">Visu stock Fruits soir</a></li>
			<li class="toot"><i class="glyph-icon veggi-012-carambola"></i>&nbsp;<a href="#">Stock fruits secs (fin de mois)</a></li>
			<li class="toot"><i class="glyph-icon veggi-022-peanut"></i>&nbsp;<a href="#">Stock soir (fin de mois)</a></li>
			
			
			</ul>';
		}
		if (($codeut==1) && ($menu=='visitefl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon management-info"></i>&nbsp;<a href="#">Fiche de visite PH</a></li>
			


			</ul>';
		}
		if (($codeut==2) && ($menu=='visitefl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon management-info"></i>&nbsp;<a href="#">Fiche de visite PH</a></li>
			
			
			</ul>';
		}
		if (($codeut==1) && ($menu=='gestionvisitefl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon management-list"></i>&nbsp;<a href="#">Consultation des fiches de visite</a></li>
			

			</ul>';
		}
		if (($codeut==2) && ($menu=='gestionvisitefl')){
			echo '<ul>
			<li><i class="glyph-icon management-list"></i>&nbsp;<a href="#">Consultation des fiches de visite</a></li>
			
			
			</ul>';
		}
		if (($codeut==1) && ($menu=='magfl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon management-box"></i>&nbsp;<a href="#">Gestion emplacement par EAN</a></li>
			<li class="toot"><i class="glyph-icon veggi-004-pear"></i>&nbsp;<a href="#">Gestion emplacement F/L magasin</a></li>
			<li class="toot"><i class="glyph-icon drinkset-milk-box"></i>&nbsp;<a href="#">Validation des livraisons cremerie</a></li>
			<li class="toot"><i class="glyph-icon management-folders"></i>&nbsp;<a href="#">Gestion emplacement par EAN</a></li>
			<li class="toot"><i class="glyph-icon management-box-1"></i>&nbsp;<a href="#">Mise en destockage</a></li>
			<li class="toot"><i class="glyph-icon management-truck"></i>&nbsp;<a href="#">Sortie de destockage</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='magfl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Gestion emplacement par EAN</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Gestion emplacement F/L magasin</a></li>
			
			</ul>';
		}
		if (($codeut==1) && ($menu=='planning')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Gestion des comptes temps</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Gestion plannings PH </a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Organisation plannings PH </a></li>
			<li class="toot"><i class="glyph-icon management-calendar"></i>&nbsp;<a href="#">Gestion des plannings</a></li>
			<li class="toot"><i class="glyph-icon management-calendar-1"></i>&nbsp;<a href="#">Planning opérationnel vente</a></li>
			<li class="toot"><i class="glyph-icon management-calendar-2"></i>&nbsp;<a href="#">Planning opérationnel boulanger</a></li>
			<li class="toot"><i class="glyph-icon management-administrator"></i>&nbsp;<a href="#">Organisation des plannings</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Validation des plannings</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Validation des plannings PH</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='planning')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-calendar"></i></span><a href="#">Gestiondes des plannings</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-calendar"></i></span><a href="#">Planning opérationnel vente</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-calendar"></i></span><a href="#">Planning opérationnel boulanger</a></li>
				<li class="listtt"><span><i class="glyph-icon collectionicons-calendar"></i></span><a href="#">Planning opérationnel prépa</a></li>
				<li class="listtt"><span><i class="glyph-icon collectionicons-calendar-2"></i></span><a href="#">Organisation des plannings</a></li>
					

				</ul>';
		}
		if (($codeut==1) && ($menu=='modeleplanning')){
			echo '
			<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon management-document-with-tables"></i></span><a href="#">Présentation</a></li>
				  <li class="listtt"><span><i class="glyph-icon management-documents"></i></span><a href="#">Création de modèle</a></li>
				  <li class="listtt"><span><i class="glyph-icon management-folders"></i></span><a href="#">Gestion des modeles</a></li>
				
					

				</ul>
			';
		}
		if (($codeut==2) && ($menu=='modeleplanning')){
			echo '
			<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-calendar-3"></i></span><a href="#">Présentation</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-calendar-3"></i></span><a href="#">Création de modèle</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-calendar-3"></i></span><a href="#">Gestion des modeles</a></li>			
				</ul>';
		}
		if (($codeut==1) && ($menu=='comptahisto')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon management-presentation"></i>&nbsp;<a href="#">Historique des coffres adjoints</a></li>
			<li class="toot"><i class="glyph-icon management-graph"></i>&nbsp;<a href="#">Historique B/T5</a></li>
			<li class="toot"><i class="glyph-icon management-graph-1"></i>&nbsp;<a href="#">Historique versement manager</a></li>
			<li class="toot"><i class="glyph-icon management-graph-2"></i>&nbsp;<a href="#">Historique Brinks</a></li>
			<li class="toot"><i class="glyph-icon management-graph-3"></i>&nbsp;<a href="#">Historique monnaie</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='comptahisto')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon management-calculator"></i>&nbsp;<a href="#">Historique des coffres adjoints</a></li>
			<li class="toot"><i class="glyph-icon management-calculator-1"></i>&nbsp;<a href="#">Historique B/T5</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Historique versement manager</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Historique Brinks</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Historique monnaie</a></li>
			</ul>';
		}
		if (($codeut==1) && ($menu=='t5b5')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon management-calculator"></i>&nbsp;<a href="#">Consultation de l\'aide T5/B5</a></li>
			<li class="toot"><i class="glyph-icon management-calculator-1"></i>&nbsp;<a href="#">Aide compte client</a></li>
			
			</ul>';
		}
		if (($codeut==2) && ($menu=='t5b5')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Consultation de l\'aide T5/B5</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Aide compte client</a></li>
			
			</ul>';
		}
		if (($codeut==1) && ($menu=='comptaprint')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-print"></i>&nbsp;<a href="#">Arrêté de caisse mensuel ou annuel T10</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-print"></i>&nbsp;<a href="#">Passation de pouvoir (T11 - 12)</a></li>

			</ul>';
		}
		if (($codeut==2) && ($menu=='comptaprint')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-print"></i>&nbsp;<a href="#">Arrêté de caisse mensuel ou annuel T10</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-print"></i>&nbsp;<a href="#">Passation de pouvoir (T11 - 12)</a></li>
			
			</ul>';
			
		}	
		if (($codeut==1) && ($menu=='compta')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon book-003-rights"></i>&nbsp;<a href="#">Livre de caisse</a></li>
			<li class="toot"><i class="glyph-icon book-021-rectification"></i>&nbsp;<a href="#">Déblocage B/T5</a></li>
			<li class="toot"><i class="glyph-icon book-047-chip"></i>&nbsp;<a href="#">Visualisation Brinks</a></li>
			<li class="toot"><i class="glyph-icon book-036-keylock"></i>&nbsp;<a href="#">Visualisation B/T5 manager</a></li>
			<li class="toot"><i class="glyph-icon book-039-plain"></i>&nbsp;<a href="#">B/T5 manager validation manager</a></li>
			<li class="toot"><i class="glyph-icon book-011-medical-record"></i>&nbsp;<a href="#">Remontée de ligne de caisse par magasin</a></li>
			<li class="toot"><i class="glyph-icon book-016-text-file"></i>&nbsp;<a href="#">Gestion Brinks</a></li>
			<li class="toot"><i class="glyph-icon shopping-047-cash-register"></i>&nbsp;<a href="#">Gestion monnaie</a></li>
			<li class="toot"><i class="glyph-icon shopping-041-piggy-bank"></i>&nbsp;<a href="#">Validation coffre adjoint</a></li>
			<li class="toot"><i class="glyph-icon shopping-036-payment-method"></i>&nbsp;<a href="#">Versement espece manager</a></li>
			<li class="toot"><i class="glyph-icon book-023-information"></i>&nbsp;<a href="#">Configuration B/T5</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='compta')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon book-003-rights"></i>&nbsp;<a href="#">Livre de caisse</a></li>
			<li class="toot"><i class="glyph-icon book-021-rectification"></i>&nbsp;<a href="#">Déblocage B/T5</a></li>
			<li class="toot"><i class="glyph-icon book-047-chip"></i>&nbsp;<a href="#">Visualisation Brinks</a></li>
			<li class="toot"><i class="glyph-icon book-036-keylock"></i>&nbsp;<a href="#">Visualisation B/T5 manager</a></li>
			<li class="toot"><i class="glyph-icon book-039-plain"></i>&nbsp;<a href="#">B/T5 manager validation manager</a></li>
			<li class="toot"><i class="glyph-icon book-011-medical-record"></i>&nbsp;<a href="#">Remontée de ligne de caisse par magasin</a></li>
			<li class="toot"><i class="glyph-icon book-016-text-file"></i>&nbsp;<a href="#">Gestion Brinks</a></li>
			<li class="toot"><i class="glyph-icon shopping-047-cash-register"></i>&nbsp;<a href="#">Gestion monnaie</a></li>
			<li class="toot"><i class="glyph-icon shopping-041-piggy-bank"></i>&nbsp;<a href="#">Validation coffre adjoint</a></li>
			<li class="toot"><i class="glyph-icon shopping-036-payment-method"></i>&nbsp;<a href="#">Versement espece manager</a></li>
			<li class="toot"><i class="glyph-icon book-023-information"></i>&nbsp;<a href="#">Configuration B/T5</a></li>
			
			</ul>';
		}
			if (($codeut==1) && ($menu=='coffreadj')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon shopping-019-invoice"></i>&nbsp;<a href="#">Faire un versement</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Suivi des versements</a></li>
			
			</ul>';
		}
		if (($codeut==2) && ($menu=='coffreadj')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Faire un versement</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Suivi des versements</a></li>
			
			</ul>';
		}
			if (($codeut==1) && ($menu=='gestionperso')){
			echo '	<ul class="listt">
					<li class="listtt"><span><i class="glyph-icon collectionicons-phone-book"></i></span><a href="#">Annuaire du personnel</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-network"></i></span><a href="#">Gestion des présents</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-hiring-1"></i></span><a href="#">Fiche d\'embauche</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-businessman"></i></span><a href="#">Etat DPAE</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-decision-making"></i></span><a href="#">Affectation nouveau magasin</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-writing"></i></span><a href="#">Changement nouveau contrat</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-customer"></i></span><a href="#">Suivi demande RH</a></li>
					
			</ul>';
		}
		if (($codeut==2) && ($menu=='gestionperso')){
			echo '
			
			<ul class="listt">
					<li class="listtt"><span><i class="glyph-icon collectionicons-phone-book"></i></span><a href="#">Annuaire du personnel</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-network"></i></span><a href="#">Gestion des présents</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-hiring-1"></i></span><a href="#">Fiche d\'embauche</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-businessman"></i></span><a href="#">Etat DPAE</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-decision-making"></i></span><a href="#">Affectation nouveau magasin</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-writing"></i></span><a href="#">Changement nouveau contrat</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-customer"></i></span><a href="#">Suivi demande RH</a></li>
					
			</ul>'
			
			;
		}	
			if (($codeut==1) && ($menu=='gestionpersoph')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Choix manager temporaire</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Formulaire d\'enregistrement d\'un Adjoint temporaire list in bullet</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Affiliation des coffres à vos adjoints bank building</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='gestionpersoph')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Choix manager temporaire</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Formulaire d\'enregistrement d\'un Adjoint temporaire</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Affiliation des coffres à vos adjoints </a></li>
			
			</ul>';
		}
			if (($codeut==1) && ($menu=='compteclient')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Liste de mes comptes clients customer</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Demande d\'ouverture de compte client</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Suivi des ouvertures de compte client target</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Gestion & modification des comptes client</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Saisie d\'un ticket de client en compte</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Rapprochement tickets/factures</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Suivi des factures</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Suivi des règlements par virements</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='compteclient')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Liste de mes comptes clients</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Demande d\'ouverture de compte client</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Suivi des ouvertures de compte client</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Gestion & modification des comptes client</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Saisie d\'un ticket de client en compte</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Rapprochement tickets/factures</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Suivi des factures</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Suivi des règlements par virements</a></li>
			
			</ul>';
		}
			if (($codeut==1) && ($menu=='tablbord')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Gestion des frais de personnels</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Exercice en cours</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Semaine en cours</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='tablbord')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Gestion des frais de personnels</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Exercice en cours</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Semaine en cours</a></li>
			
			</ul>';
		}
			if (($codeut==1) && ($menu=='outilsfin')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">CA par partenaire</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">CA global et nombre de clients</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">CA partenaires et nombre de clients</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Nombre d\'encaissement journée</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">CA par partenaires et par heures</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Nombre de clients par partenaires et par heures</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='outilsfin')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">CA par partenaire</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">CA global et nombre de clients</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">CA partenaires et nombre de clients</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Nombre d\'encaissement journée</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">CA par partenaires et par heures</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Nombre de clients par partenaires et par heures</a></li>
			
			</ul>';
		}
			if (($codeut==1) && ($menu=='tablbordglobal')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Tableau de bord des magasins</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Tableau de bord semaine</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='tablbordglobal')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Tableau de bord des magasins</a></li>
			<li class="toot"><i class="glyph-icon icon-elusive-book"></i>&nbsp;<a href="#">Tableau de bord semaine</a></li>
			
			</ul>';
		}
			if (($codeut==1) && ($menu=='gestmag')){
			echo '
			<ul class="listt">
					<li class="listtt"><span><i class="glyph-icon icon-linecons-shop"></i></span><a href="#">Carte des boulangeries</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-interview"></i></span><a href="#">Ajout d\'un magasin</a></li>
					<li class="listtt"><span><i class="glyph-icon icon-typicons-menu-outline"></i></span><a href="#">Liste Mag / Balances Ip Ports</a></li>
					<li class="listtt"><span><i class="glyph-icon icon-linecons-paper-plane"></i></span><a href="#">Assoc Mag / Partenaire</a></li>
					<li class="listtt"><span><i class="glyph-icon icon-linecons-shop"></i></span><a href="#">Modification d\'un magasin</a></li>
					<li class="listtt"><span><i class="glyph-icon icon-linecons-shop"></i></span><a href="#">Ajout Mag IP Ports</a></li>
			</ul>'
			
			;
		}
		if (($codeut==2) && ($menu=='gestmag')){
			echo '
			<ul class="listt">
					<li class="listtt"><span><i class="glyph-icon icon-linecons-shop"></i></span><a href="#">Carte des boulangeries</a></li>
							  
			</ul>';
		}
			if (($codeut==1) && ($menu=='gestut')){
			echo '<ul class="listt">
					<li class="listtt"><span><i class="glyph-icon collectionicons-block"></i></span><a href="#">Ajout d\'utilisateurs</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-block"></i></span><a href="#">Ajout de magasins aux utilisateurs</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-block"></i></span><a href="#">Modification du mot de passe</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-block"></i></span><a href="#">Modification profil</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-block"></i></span><a href="#">Annuaire du personnel</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-block"></i></span><a href="#">Secteur Reps. Vente</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-block"></i></span><a href="#">Gestion utilisateur Intranet</a></li>
			</ul>
			';
		}
		if (($codeut==2) && ($menu=='gestut')){
			echo '
			
			
			<ul class="listt">
					<li class="listtt"><span><i class="glyph-icon collectionicons-block"></i></span><a href="#">Modification<br> du mot de passe</a></li>
					
			</ul>
			';
		}
			if (($codeut==1) && ($menu=='rh')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Controle plannings BBG pour paye</a></li>
			<li  class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Réactivation d\'un employé</a></li>
			<li class="toot"><i class="glyph-icon icon-typicons-music-outline"></i>&nbsp;<a href="#">Modification fiche du personnel</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Contrôle DPAE</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Déblocage plannings</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Déblocage plannings visa Social</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Demande changement de contrat/Affectation</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Gestion période de paie</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Attribution des managers de secteur</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Suivi déploiement planning BBG</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Suivi déploiement planning CB</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='rh')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Controle plannings BBG pour paye</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Réactivation d\'un employé</a></li>
			<li class="toot"><i class="glyph-icon icon-typicons-music-outline"></i>&nbsp;<a href="#">Modification fiche du personnel</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Contrôle DPAE</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Déblocage plannings</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Déblocage plannings visa Social</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Demande changement de contrat/Affectation</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Gestion période de paie</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Attribution des managers de secteur</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Suivi déploiement planning BBG</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Suivi déploiement planning CB</a></li>
			
			</ul>
			';

	
		}	
			if (($codeut==1) && ($menu=='gestmenu')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Ajout des menus pour utilisateurs</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Ajout menu mobile</a></li>
			<li class="toot"><i class="glyph-icon icon-typicons-music-outline"></i>&nbsp;<a href="#">Ajout de menus et sous menus</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Créa menu pour typologie</a></li>
			
			</ul>';
		}
		if (($codeut==2) && ($menu=='gestmenu')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Ajout des menus pour utilisateurs</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Ajout menu mobile</a></li>
			<li class="toot"><i class="glyph-icon icon-typicons-music-outline"></i>&nbsp;<a href="#">Ajout de menus et sous menus</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Créa menu pour typologie</a></li>
			
			</ul>
			';

	
		}
			if (($codeut==1) && ($menu=='admingerentes')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Gestion correspondance produits</a></li>
		
			
			</ul>';
		}
		if (($codeut==2) && ($menu=='admingerentes')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Gestion correspondance produits</a></li>
			
			</ul>
			';

	
		}
			if (($codeut==1) && ($menu=='rhprov')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Déploiement des comptes temps</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Gestion des comptes temps</a></li>
			<li class="toot"><i class="glyph-icon icon-typicons-music-outline"></i>&nbsp;<a href="#">Contrôle DPAE</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Modification fiche du personnel</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Réactivation d\'un employé</a></li>
			
			</ul>';
		}
		if (($codeut==2) && ($menu=='rhprov')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Déploiement des comptes temps</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Gestion des comptes temps</a></li>
			<li class="toot"><i class="glyph-icon icon-typicons-music-outline"></i>&nbsp;<a href="#">Contrôle DPAE</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Modification fiche du personnel</a></li>
			<li class="toot"><i class="glyph-icon icon-linecons-shop"></i>&nbsp;<a href="#">Réactivation d\'un employé</a></li>
			
			</ul>
			';
			}
			if (($codeut==1) && ($menu=='gestmeteo')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Gestion météo</a></li>
			
			</ul>';
		}
		if (($codeut==2) && ($menu=='gestmeteo')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Gestion météo</a></li>
			
			</ul>
			';
	
		}	
			if (($codeut==1) && ($menu=='docressources')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Gestion des documents</a></li>
			
			
			</ul>';
		}
		if (($codeut==2) && ($menu=='docressources')){
			echo '<ul>
			<li><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Gestion des documents</a></li>
			
			</ul>
			';
	
		}	
			if (($codeut==1) && ($menu=='documents')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Fiche info ACTION LOGEMENT </a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Fiche interlocuteurs </a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Affiche services ACTION LOGEMENT </a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='documents')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Fiche info ACTION LOGEMENT </a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Fiche interlocuteurs </a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Affiche services ACTION LOGEMENT </a></li>
			
			</ul>
			';
	
		}

			if (($codeut==1) && ($menu=='formationbaguette')){
			echo '<ul class="listt">
					<li class="listtt"><span><i class="glyph-icon collectionicons-checklist"></i></span><a href="#">Chapitre 1</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-checklist"></i></span><a href="#">Chapitre 2</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-checklist"></i></span><a href="#">Chapitre 3</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-checklist"></i></span><a href="#">Chapitre 4</a></li>
					<li class="listtt"><span><i class="glyph-icon collectionicons-checklist"></i></span><a href="#">Introduction</a></li>	
					<li class="listtt"><span><i class="glyph-icon collectionicons-checklist"></i></span><a href="#">Quiz final</a></li>			  
			</ul>';
		}
		if (($codeut==2) && ($menu=='formationbaguette')){
			echo '<ul class="listt">
					<li class="listtt"><span><i class="glyph-icon icon-arrow-circle-o-right"></i></span><a href="#">Chapitre 1</a></li>
					<li class="listtt"><span><i class="glyph-icon icon-arrow-circle-o-right"></i></span><a href="#">Chapitre 2</a></li>
					<li class="listtt"><span><i class="glyph-icon icon-arrow-circle-o-right"></i></span><a href="#">Chapitre 3</a></li>
					<li class="listtt"><span><i class="glyph-icon icon-arrow-circle-o-right"></i></span><a href="#">Chapitre 4</a></li>
					<li class="listtt"><span><i class="glyph-icon icon-arrow-circle-o-right"></i></span><a href="#">Introduction</a></li>	
					<li class="listtt"><span ><i class="glyph-icon icon-arrow-circle-o-right"></i></span><a href="#">Quiz final</a></li>			  
			</ul>';
	
		}	
		if (($codeut==1) && ($menu=='formationquest')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-checklist"></i></span><a href="#">Appréciation et évaluation de votre formation</a></li>				 
					</ul>';
		}
		if (($codeut==2) && ($menu=='formationquest')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-checklist"></i></span><a href="#">Appréciation et évaluation de votre formation</a></li>				 
					</ul>';
	
		}
		if (($codeut==1) && ($menu=='suiviquestionnaire')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-test"></i></span><a href="#">Visu des évaluations de formation</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-list"></i></span><a href="#">Visu des questionnaires et évaluations</a></li>
				
				</ul>';
		}
		if (($codeut==2) && ($menu=='suiviquestionnaire')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-test"></i></span><a href="#">Visu des évaluations de formation</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-list"></i></span><a href="#">Visu des questionnaires et évaluations</a></li>
				
				</ul>';
	
		}
		
		if (($codeut==1) && ($menu=='entretienpro')){
			echo '<ul class="listt">
			<li class="toot"><i class="glyph-icon collectionicons-shopping-cart"></i><a href="#">A passer</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">A passer (manager mag)</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">A passer (relais metier)</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">A passer(manager sect.)</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">A valider</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">En attente</a></li>
			
			</ul>
			';
			
		
		}
		if (($codeut==2) && ($menu=='entretienpro')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-interview"></i></span><a href="internpage.php?use='.$mycode.'&menu='.$menu.'&page=apasser">A passer</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-teamwork"></i></span><a href="#">A passer <br> Manager de magasin</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-teamwork-1"></i></span><a href="#">A passer <br> Relais métier</a></li>
				  <li class="listtt"><span><i class="glyph-icon icon-elusive-export"></i></span><a href="#">A passer <br> Manager de secteur</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-teamwork-2"></i></span><a href="#">A valider</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-teamwork"></i></span><a href="#">En attente</a></li>


				</ul>';
	
		}
				if (($codeut==1) && ($menu=='docentretienpro')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-folder-1"></i></span><a href="#">Documents à télécharger </a></li></ul>';
		}
		if (($codeut==2) && ($menu=='docentretienpro')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-folder-1"></i></span><a href="#">Documents à télécharger </a></li></ul>';
	
		}	
		if (($codeut==1) && ($menu=='entretienprosuivi')){
			echo '<<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon icon-elusive-print"></i></span><a href="#">A imprimer</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-printer"></i></span><a href="#">A imprimer - Manager de secteur</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-printer"></i></span><a href="#">A imprimer - Relais métier</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-printer"></i></span><a href="#">Entretiens à imprimer</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='entretienprosuivi')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon icon-elusive-print"></i></span><a href="#">A imprimer</a></li>
				  <li class="listtt"><span><i class="glyph-icon icon-elusive-print"></i></span><a href="#">A imprimer - Manager de secteur</a></li>
				  <li class="listtt"><span><i class="glyph-icon icon-elusive-print"></i></span><a href="#">A imprimer - Relais métier</a></li>
				  <li class="listtt"><span><i class="glyph-icon icon-elusive-print"></i></span><a href="#">Entretiens à imprimer</a></li>
			</ul>
			';
	
		}	
		if (($codeut==1) && ($menu=='ficheauto')){
			echo '
			 <ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-test"></i></span><a href="#">Fiche auto-évaluation</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-folder-1"></i></span><a href="#">Historique des fiches d\'autoevaluation </a></li>
				  
			</ul>';
		}
		if (($codeut==2) && ($menu=='ficheauto')){
			echo '
			 <ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon collectionicons-test"></i></span><a href="#">Fiche auto-évaluation</a></li>
				  <li class="listtt"><span><i class="glyph-icon collectionicons-folder-1"></i></span><a href="#">Historique des fiches d\'autoevaluation </a></li>
				  
			</ul>
			';
	
		}	

		if (($codeut==1) && ($menu=='ce')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">CE-Boulangerie Marie-Fiche info-Connexion site internet</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">CE-CODES PARTENAIRES</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Flyer Accès portail loisirs CE</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Flyer Nouveau site CE Boulangerie Marie</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">CE-Boulangerie de Marie-Subventions cinema</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Subventions CE PARC juin sept 2018</a></li>
			</ul>';
		}
		if (($codeut==2) && ($menu=='ce')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">CE-Boulangerie Marie-Fiche info-Connexion site internet</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">CE-CODES PARTENAIRES</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Flyer Accès portail loisirs CE</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Flyer Nouveau site CE Boulangerie Marie</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">CE-Boulangerie de Marie-Subventions cinema</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Subventions CE PARC juin sept 2018</a></li>
			
			
			</ul>
			';
	
		}
if (($codeut==1) && ($menu=='affichageobl')){
			echo '<ul>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Informations obligatoires selon le code du travail</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">PROCEDURE-Activité Boulangerie</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Services de secours d\'urgence et blessure de la main</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Egalité professionnelle entre les hommes et le femmes</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Lutte contre le harcelement moral et sexuel</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Lutte contre les discriminations</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Interdiction de fumer et de vapoter</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Réglement intérieur</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Liste des membres du CHSCT</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Information vidéo surveillance</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">INTERDICTION DE FUMER ET DE VAPOTER</a></li>  			
			</ul>';
		}
		if (($codeut==2) && ($menu=='affichageobl')){
			echo '<ul>
				<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Informations obligatoires selon le code du travail</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">PROCEDURE-Activité Boulangerie</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Services de secours d\'urgence et blessure de la main</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Egalité professionnelle entre les hommes et le femmes</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Lutte contre le harcelement moral et sexuel</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Lutte contre les discriminations</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Interdiction de fumer et de vapoter</a></li>
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Réglement intérieur</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Liste des membres du CHSCT</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">Information vidéo surveillance</a></li> 
			<li class="toot"><i class="glyph-icon icon-iconic-plus-circle"></i>&nbsp;<a href="#">INTERDICTION DE FUMER ET DE VAPOTER</a></li>  	
			</ul>
			';
	
		}		
		if (($codeut==2) && ($menu=='qhse')){
			echo '<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon qhse-bee"></i></span><a href="#">Procédure curative et préventive contre les insectes volants </a></li>
				 
			</ul>
			
			';
		}
		if (($codeut==2) && ($menu=='affregl')){
			echo '
			<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon qhse-weather"></i></span><a href="#">Affichage des produits congelés</a></li>
				  <li class="listtt"><span><i class="glyph-icon qhse-weight"></i></span><a href="#">Synthèses poids patons et pains V1.pdf</a></li>
				  <li class="listtt"><span><i class="glyph-icon qhse-gluten"></i></span><a href="#">Tableau des allergènes MAJ072018.pdf</a></li>
				 
			</ul>
			';
	
		}
		if (($codeut==2) && ($menu=='secualimentaire')){
			echo '
			<ul class="listt">
				  <li class="listtt"><span><i class="glyph-icon qhse-result"></i></span><a href="#">Fiche de suivi - Fabrication et mise en vente PF V1.pdf</a></li>
				  <li class="listtt"><span><i class="glyph-icon qhse-project"></i></span><a href="#">Procédure - Suivi des produits finis vendus à T° dirigée V01.pdf</a></li>
				  <li class="listtt"><span><i class="glyph-icon qhse-stamp"></i></span><a href="#">Attestation formation pré-requis et reglementation affichage Support Hygiène.pdf</a></li>
				  <li class="listtt"><span><i class="glyph-icon qhse-spray"></i></span><a href="#">Support formation Hygiène V1.pdf</a></li>
				  <li class="listtt"><span><i class="glyph-icon qhse-search"></i></span><a href="#">Traçabilité V1.pdf</a></li>
				  <li class="listtt"><span><i class="glyph-icon qhse-bucket-with-bubbles"></i></span><a href="#">Nettoyage et désinfection mitigeurs V1.pdf</a></li>
	

			</ul>
			';
	
		}			
		?>
		
		  
   

</body>
</html>
<?php
include('deconnexion.php');
include('deconnexion_postgr.php');

?>
</body>
</html>
