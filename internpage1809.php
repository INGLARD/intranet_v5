<?php
if (session_id() == "") {session_start();}
include('connexion.php');
include('connexion_postgr.php');
$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$fonction=	$_SESSION['fonctionutilisateur'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);
	$date=date('Y-m-d');
	$dateactu=date('d/m/Y');
	setlocale(LC_TIME, "fr_FR");
	$dateA2=date('Y-m-d', strtotime($date.'-2 year'));

$codemd5=$_GET["use"];
$querynamag="SELECT nom FROM pri_magasins WHERE code=".$codemag;
$resultmag=mysql_query($querynamag);
if (mysql_num_rows($resultmag) > 0){
while($data01 = mysql_fetch_assoc($resultmag))	{
$nommag=$data01['nom'];
}
}

//query manager sect 
$qumansect="SELECT nom, prenom, code FROM pri_users WHERE type_user ='MANAGERSECT' AND code IN (SELECT code_user FROM  users_magasins WHERE code_magasin=".$codemag.")";
$resmansect=mysql_query($qumansect);
if (mysql_num_rows($resmansect) > 0){
while($data02 = mysql_fetch_assoc($resmansect))	{
$nommanagersect=$data02['nom'];
$prenomnommanagersect=$data02['prenom'];
}
}

//query relais métier
$qurelt="SELECT nom, prenom, code FROM pri_users WHERE type_user ='RELAISMETIER' AND code IN (SELECT code_user FROM  users_magasins WHERE code_magasin=".$codemag.")";
$resrel=mysql_query($qurelt);
if (mysql_num_rows($resrel) > 0){
while($data03 = mysql_fetch_assoc($resrel))	{
$prenomrel=$data03['prenom'];
$nomrel=$data03['nom'];
}
}
////////

//query vente equipe
 $quvente="SELECT a.code AS codeempl,a.nom_affiche, a.nom,a.prenom,a.code_magasin,a.code_fonction,b.code,b.ordre_affichage,b.nom_court FROM 
".$ncenseigne."_personnels A,".$ncenseigne."_rhfonctions B WHERE a.actif =1 AND a.code_typeemp=1 AND b.code=a.code_fonction AND a.code_magasin=".$codemag." AND a.code_fonction !='ECC2' order by a.nom_affiche ASC";
$rev=mysql_query($quvente);

//query vente prod
 $quprod="SELECT a.code AS codeempl,a.nom_affiche, a.nom,a.prenom,a.code_magasin,a.code_fonction,b.code,b.ordre_affichage,b.nom_court FROM 
".$ncenseigne."_personnels A,".$ncenseigne."_rhfonctions B WHERE a.actif =1 AND a.code_typeemp=2 AND b.code=a.code_fonction AND a.code_magasin=".$codemag." AND a.code_fonction !='ECC2' order by a.nom_affiche ASC";
$rep=mysql_query($quprod);

// Enseignes
if ($ncenseigne=='bbg'){
	
	$enseigne='Boulangerie Marie Blachère';
}
if ($ncenseigne=='cbo'){
	
	$enseigne='Côté Boulange';
}

if ($typeuser=='ADMIN'){
	$nomprenom="Patrice Barber";	
	$fonction="Administrateur";
	$codeut=1; //superadmin
}
if ($typeuser=='MANAGERMAG'){
	$nomprenom="Stephanie Bouis";	
	$fonction="Manager de Magasin";
	$codeut=2; //superadmin
}
//MENU
 $qumenu="select * from pri_menus a, users_menus b where b.code_user=".$mycode." and b.code_menu=a.code AND b.code_menu <>1 and a.code_menu_maitre is null order by ordre ASC";
$rmen=mysql_query($qumenu);
//$codeemp=3461;
 $query = "SELECT p.*, h.nom_long  from ".$ncenseigne."_personnels p , ".$ncenseigne."_rhfonctions h where p.code=".$codeemp." and p.code_fonction=h.code";
	
if($fonction=='Manager de magasin' ){
		
		echo $query1 = "SELECT p.code from pri_users p, users_magasins b where b.code_user=p.code and p.type_user='MANAGERSECT' and b.code_magasin=".$codemag;
		
		$results1 = mysql_query($query1) or die('Erreur SQL !<br>');
		$data1 = mysql_fetch_assoc($results1);
		$coden2=$data1['code'];
		
	}
	if(!empty($_POST)){
		$codeemp=$_POST['emp'];
		
		echo $query = "SELECT p.*, h.nom_long  from ".$ncenseigne."_personnels p , ".$ncenseigne."_rhfonctions h where p.code=".$codeemp." and p.code_fonction=h.code";
		$results = mysql_query($query) or die('Erreur SQL !<br>'.$query);
		$data = mysql_fetch_assoc($results);
		$codetypeemp = $data['code_typeemp'];
		$nomemp=$data['nom'];
		$prenomemp=$data['prenom'];
		$datenaissanceemp=date('d-m-Y', strtotime($data['date_naissance']));
		$functionempl=$data['nom_long'];
		$nenseigne=$data['code_enseigne'];


		$numsecuemp=$data['numero_secu'];
		$dateentreemp=date('d-m-Y', strtotime($data['date_entree']));
		$codefonct=$data['code_fonction'];
		
	 	$querydateentr =" select date_entretien from ".$nenseigne."_entresult_h where code_personnel=".$codeemp." and date_entretien<='".$date."' and status='A'";
		$resultsateentr = mysql_query($querydateentr) or die('Erreur SQL !<br>');
	if (mysql_num_rows($resultsateentr) > 0)
	{
	$dataentr = mysql_fetch_assoc($resultsateentr);
		$dateverif=$dataentr['date_entretien'];
		
	}else{
		
		$dateverif=$date;
	}

		
	}


//$queryk="select * from w_articles_type_vente where id='".$row['type_vente']."'";
//	 		$resultsk = pg_query($dbconn_c, $queryk);
//	 		$rowk = pg_fetch_array($resultsk);
//for ($i=0;$i<$rowk['valeur_fin'];$i=$i+$rowk['increment']){
//		 		echo '<option value="'.($i+$rowk['increment']).'" class="">'.($i+$rowk['increment']).' kg</option>';
//	 		}
?>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Intranet V5</title>
 <style>
.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
select.form-control:not([size]):not([multiple]) {
    height: calc(3rem + 2px);
}
</style>
<style>
.date2{font-size: 2vh;
color: rgba(255,255,255,0.93);text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.52);text-align:center;font-weight: lighter;
    font-family: 'Quicksand', sans-serif;}
.date{font-size: 1.5vh;
color: rgba(255,255,255,0.93);text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.52); text-align:center;font-weight: lighter;
    font-family: 'Quicksand', sans-serif;}
.heure{font-size: 1.5vh;
color: rgba(255,255,255,0.93);text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.52); text-align:right;font-weight: lighter;
    font-family: 'Quicksand', sans-serif;}
</style>
<!-- <link rel="stylesheet" type="text/css" href="assets/css/jquery.accordion.css">-->
  <link rel="stylesheet" href="assets/css/additionalcss.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/default.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/default2.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/component.css" /> 
<link href="assets/css/tooltip.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/badges.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/dropdown.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/boilerplate.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/badges.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/utils.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/iconic/iconic.css" rel="stylesheet" type="text/css" />
	 <link href="assets/css/icons/linecons/linecons.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/icons/elusive/elusive.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/icons/typicons/typicons.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/icons/fontawesome/fontawesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/fruits_vegetables/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/management/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/drinkset/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/shopping/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/books/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/collectionicons/flaticon.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/snippets/notification-box.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/snippets/user-profile.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/snippets/login-box.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/snippets/files-box.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/content-box.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/dashboard-box.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/dashboard-box.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/border-radius.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/popover.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/buttons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/menus.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/components/default.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/colors.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/progressbar.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/snippets/progress-box.css" rel="stylesheet" type="text/css" />
<link href="assets/css/form-control.css" rel="stylesheet" type="text/css" />
<link href="assets/css/form-validation.css" rel="stylesheet" type="text/css" />
	<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
</head>

<body class="cbp-spmenu-push">
<button id="showRight" style="position: absolute;right:0px;top:50%;z-index:99999" class="std"></button>
<button id="showRight2" style="position: absolute;right:0px;top:50%;z-index:99999" class="std2"></button>
<button id="showRight3" style="position: absolute;right:0px;top:50%;z-index:99999" class="std3"></button>

	<nav class="navbar bg-dark navv">
	
	<div id="header-nav-left">
	 <a href="#" class="hdr-btn" id="showLeft" title="menu">
            <i class="glyph-icon icon-bars"></i>
        </a>
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
               <img src="assets/img/profile_nav.png" alt="profile_nav" width="" height="" style="margin-top:-5px;max-width: 35px"/>
                <span><?php echo $nomprenom.''.$rowm ?>
				</span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Change photo</a>
                            <img src="assets/img/profile_nav.png" alt="profile_nav" width="" height="" />
                        </div>
                        <div class="user-info">
                            <span>
                                <?php echo $nomprenom.' '.$mycode ?>
                                <i><?php echo $fonction ?></i>
								
                            </span>
                            <span> <?php echo $enseigne ?></span>
                             
							 <span> <?php echo $nommag.' - Magasin n°'.$codemag ?></span>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <ul class="reset-ul mrg5B">
                       	<li><span>
                          Manager de secteur : <?php echo $prenomnommanagersect.' '.$nommanagersect ?>
                            </span>
                        </li>
						<li><span>
                          Relais métier : <?php echo $prenomrel.' '.$nomrel ?>
                            </span>
                        </li>
						<li>
                            <a data-toggle="collapse" href="#vente" aria-expanded="false" aria-controls="collapseExample">
                                <i class="glyph-icon float-right icon-caret-right"></i>
                                Equipe vente
                                
                            </a>
                        </li>
					<div class="collapse" id="vente">
					  <div class="card card-body">
						<ul class="reset-ul mrg5B">
						<?php 
						if (mysql_num_rows($rev) > 0){
						while($data04 = mysql_fetch_assoc($rev))	{
						$prenomvente=$data04['nom_affiche'];
						
						
						echo '<li>'.$prenomvente.'</li>';
						}
						}
						?>
												
						
						</ul>
					  </div>
					</div>
						<li>
                            <a data-toggle="collapse" href="#prepa" aria-expanded="false" aria-controls="collapseExample">
                                <i class="glyph-icon float-right icon-caret-right"></i>
                                Equipe production
                                
                            </a>
                        </li>
                       <div class="collapse" id="prepa">
					 
					  <div class="card card-body">
						<ul class="reset-ul mrg5B">
						<?php 
						if (mysql_num_rows($rep) > 0){
						while($data05 = mysql_fetch_assoc($rep))	{
						$prenomprod=$data05['nom_affiche'];
						
						
						echo '<li>'.$prenomprod.'</li>';
						}
						}
						?>
												
						
						</ul>
					  
					</div>
					</div> 
                    </ul>
					
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="unlog4.php" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="header-nav-left" ><p class="date2">Intranet du Groupe Blachere <span id="clock"><?php echo $date ?></span></p></div>
    
	<div id="header-nav-right">
        
        <a href="#" class="hdr-btn" id="fullscreen-btn" title="Fullscreen">
            <i class="glyph-icon icon-arrows-alt"></i>
        </a>

		<!----> 
		 
		<div class="dropdown" id="accordion">
		 <a data-toggle="dropdown" href="#" title="" id="chatbox-btn"  >
            <span class="small-badge bg-blue">3</span>
            <i class="glyph-icon icon-linecons-paper-plane"></i>
        </a>
		
		

            <div class="dropdown-menu box-md float-right">
	
               
                <div class="scrollable-content scrollable-slim-box">
				<div class="panel-body">
                     <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyph-icon icon-clock-o"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="img-circle">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyph-icon icon-clock-o"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyph-icon icon-clock-o"></span>14 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="img-circle">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyph-icon icon-clock-o"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                    </ul>
			</div>
			<div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" class="form-control input-sm" placeholder="Type your message here..." type="text">
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
                </div>
			</div>

            </div>
		<!-- -->
        <div class="dropdown" id="notifications-btn">
            <a data-toggle="dropdown" href="#" title="">
                <span class="small-badge bg-red">8</span>
                <i class="glyph-icon icon-linecons-megaphone"></i>
            </a>
            <div class="dropdown-menu box-md float-right">

                <div class="popover-title display-block clearfix pad10A">
                    Vous avez 8 tâches en retard
                    <a class="text-transform-cap font-primary font-normal btn-link float-right" href="#" title="View more options">
                        Plus d'options...
                    </a>
                </div>
                <div class="scrollable-content scrollable-slim-box">
                    <ul class="no-border notifications-box">
                        <li>
                            <span class="bg-danger icon-notification glyph-icon icon-calendar"></span>
                            <span class="notification-text">Validation des plannings</span>
                            <div class="notification-time">
                                1 heure
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-signal"></span>
                            <span class="notification-text font-blue">Saisie des CA prévisionnels</span>
                            <div class="notification-time">
                                <b>15</b> minutes 
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-green icon-notification glyph-icon icon-file"></span>
                            <span class="notification-text font-green">DPAE : en attente de documents</span>
                            <div class="notification-time">
                                <b>2 heures</b> 
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-azure icon-notification glyph-icon icon-th-list"></span>
                            <span class="notification-text">Questionnaire de formation</span>
                            <div class="notification-time">
                               quelques secondes
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-check"></span>
                            <span class="notification-text">Auto évaluation non remplie</span>
                            <div class="notification-time">
                                <b>15</b> minutes 
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-blue icon-notification glyph-icon icon-random"></span>
                            <span class="notification-text font-blue">T5.</span>
                            <div class="notification-time">
                                <b>2 heures</b> 
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-purple icon-notification glyph-icon icon-sort"></span>
                            <span class="notification-text">Gestion du stock</span>
                            <div class="notification-time">
                               quelques seconds 
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                       
                    </ul>
                </div>
                <div class="pad10A button-pane button-pane-alt text-center">
                    <a href="#" class="btn btn-primary" title="View all notifications">
                        Voir toutes les alertes
                    </a>
                </div>
            </div>
        </div>
        <div class="dropdown" id="progress-btn">
            <a data-toggle="dropdown" href="#" title="">
                <span class="small-badge bg-azure">3</span>
                <i class="glyph-icon icon-linecons-params"></i>
            </a>
            <div class="dropdown-menu pad0A box-sm float-right" id="progress-dropdown">
                <div class="scrollable-content scrollable-slim-box">
                    <ul class="no-border progress-box progress-box-links">
                        <li>
                            <a href="#" title="">
                                <b class="pull-right">23%</b>
                                <div class="progress-title">
                                    Finishing uploading files
                                    
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="23">
                                    <div class="progressbar-value bg-blue-alt">
                                        <div class="progressbar-overlay"></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="">
                                <b class="pull-right">91%</b>
                                <div class="progress-title">
                                    Roadmap progress
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="91">
                                    <div class="progressbar-value bg-red">
                                        <div class="progressbar-overlay"></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="">
                                <b class="pull-right">58%</b>
                                <div class="progress-title">
                                    Images upload
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="58">
                                    <div class="progressbar-value bg-green"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="">
                                <b class="pull-right">74%</b>
                                <div class="progress-title">
                                    WordPress migration
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="74">
                                    <div class="progressbar-value bg-purple"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="">
                                 <b class="pull-right">91%</b>
                                <div class="progress-title">
                                    Agile development procedures
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="91">
                                    <div class="progressbar-value bg-black">
                                        <div class="progressbar-overlay"></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="">
                                <b class="pull-right">58%</b>
                                <div class="progress-title">
                                    Systems integration
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="58">
                                    <div class="progressbar-value bg-azure"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="">
                                 <b class="pull-right">97%</b>
                                <div class="progress-title">
                                    Code optimizations
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="97">
                                    <div class="progressbar-value bg-yellow"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="pad5A button-pane button-pane-alt text-center">
                    <a href="#" class="btn display-block font-normal hover-green" title="View all notifications">
                        View all notifications
                    </a>
                </div>
            </div>
        </div>
        
        <div class="dropdown" id="dashnav-btn">
		
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button" title="Dashboard Quick Menu">
                <i class="glyph-icon icon-linecons-cog"></i>
            </a>
            <div class="dropdown-menu float-right">
                <div class="box-sm">
				<div class="popover-title display-block clearfix pad10A">
                    Mes paramètres
                   
                </div>
                    <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
                        <a href="#" class="btn vertical-button hover-blue-alt" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-star opacity-80 font-size-20"></i>
								
                            </span>Modifier <br>mes favoris
                            
                        </a>
                        <a href="#" class="btn vertical-button hover-green" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-wrench opacity-80 font-size-20"></i>
                            </span>
                            Changer<br>le fond d'écran
                        </a>
                        <a href="#" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
                            </span>
                            Menu <br> automatique
                        </a>
                        <a href="#" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                            </span>
                            Modifier <br> la police
                        </a>
                        <a href="#" class="btn vertical-button hover-purple" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                            </span>
                            Modifier <br> les boutons
                        </a>
                        <a href="#" class="btn vertical-button hover-azure" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-code opacity-80 font-size-20"></i>
                            </span>
                            Modifier <br> les alertes
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <a class="header-btn" id="logout-btn" href="unlog4.php" title="Lockscreen page example">
            <i class="glyph-icon icon-linecons-lock"></i>
        </a>

    </div>
	</nav>
<!--  NAV LEFT <nav class="cbp-spmenu-s2 cbp-spmenu cbp-spmenu-bkg cbp-spmenu-vertical2 cbp-spmenu-left2" id="kleft_nav">-->
	<nav class="cbp-spmenu-s2 cbp-spmenu cbp-spmenu-bkg cbp-spmenu-vertical2 cbp-spmenu-left2" id="kleft_nav">
	<div class="containermenu">
		<div class="containermenuintern">
		<div class="hdr-btn sfm-sidebar-close" id="closesideleft"></div>
		<div class="menulogo">
         <a href="http://194.98.45.150/intranet_v5/">
		 <svg width="201" height="80" viewBox="0 0 201 81" style="enable-background:new 0 0 201 81;width:20vh; margin-top:5%;">
		 <image id="Objet_dynamique_vectoriel" data-name="Objet dynamique vectoriel" x="0" y="0" width="201" height="80" xlink:href="data:img/png;base64,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"/>
		</svg>
		</a>
        </div>
		
		<ul id="only-one" data-accordion-group> 
		
			<li data-accordion class="side_menu_left card">
			
			 <a data-control class="multi" id="boulmenuside" ><img src="assets/img_menu/boulangerie_nav_side.png">
			 <span>Boulangerie</span><ins class="sfm-sm-indicator"><i class="glyph-icon icon-angle-right"></i></ins></a>
			 <!--   <ul class="submenu panel-collapse collapse" id="submenuplanning">  <i class="glyph-icon icon-caret-down">-->
				 <ul data-content>
					<div  data-accordion-group>	
					<li data-accordion>
					<a data-control class="submenuside"><i class="collectionicons-calendar" style="padding-right: 10px;"></i>
					<span>Commandes fournisseurs</span>
					<ins class="sfm-sm-indicator"><i class="glyph-icon icon-caret-right"></i></ins>
					</a> 
					<div data-content>
							<article><a href="#" class="submenusidesub">Accéder aux sites de commande</a></article>
							<article><a href="#" class="submenusidesub">Validation BL Transgourmet</a></article>
							<article><a href="#" class="submenusidesub">Historique des commandes Transourmet</a></article>
							
					</div>
										
					</li>
					<li data-accordion>
					<a data-control class="submenuside"><i class="collectionicons-calendar" style="padding-right: 10px;"></i>
					<span>Inventaire de fin de mois</span>
					<ins class="sfm-sm-indicator"><i class="glyph-icon icon-caret-right"></i></ins>
					</a> 
					<div data-content>
							<article><a href="#" class="submenusidesub">Saisie de votre inventaire de fin de mois</a></article>
																				
					</div>
										
					</li>
					<li data-accordion>
					<a data-control class="submenuside"><i class="collectionicons-calendar" style="padding-right: 10px;"></i>
					<span>Fiche auto évaluation</span>
					<ins class="sfm-sm-indicator"><i class="glyph-icon icon-caret-right"></i></ins>
					</a> 
					<div data-content>
							<article><a href="#" class="submenusidesub">Fiche auto évaluation</a></article>
							<article><a href="#" class="submenusidesub">Historique des foches auto évaluation</a></article>
																				
					</div>
										
					</li>					
				</div>
				</ul>
			</li>
			<li data-accordion class="side_menu_left card">
			
			 <a data-control class="multi"><img src="assets/img_menu/planning_nav_side.png">
			 <span>Plannings</span><ins class="sfm-sm-indicator"><i class="glyph-icon icon-angle-right"></i></ins>
			 </a>
			
			 <ul data-content>
					<div  data-accordion-group>	
					<li data-accordion>
					<a data-control class="submenuside"><i class="collectionicons-calendar" style="padding-right: 10px;"></i>
					<span>Planning</span>
					<ins class="sfm-sm-indicator"><i class="glyph-icon icon-caret-right"></i></ins>
					</a> 
					<div data-content>
							<article><a href="#" class="submenusidesub">Planning opérationnel vente</a></article>
							<article><a href="#" class="submenusidesub">Planning opérationnel boulanger</a></article>
							<article><a href="#" class="submenusidesub">Planning opérationnel prépa</a></article>
							<article><a href="#" class="submenusidesub">Organisation des plannings</a></article>
					</div>
										
					</li>
					<li data-accordion>
					<a data-control class="submenuside"><i class="collectionicons-calendar" style="padding-right: 10px;"></i>
					<span>Modèle de planning</span>
					<ins class="sfm-sm-indicator"><i class="glyph-icon icon-caret-right"></i></ins>
					</a> 
					<div data-content>
							<article><a href="#" class="submenusidesub">Présentation</a></article>
							<article><a href="#" class="submenusidesub">Création de modèle</a></article>
							<article><a href="#" class="submenusidesub">Gestion des modèles</a></article>														
					</div>
										
					</li>	
				</div>
				</ul>						
			</li>
			<li data-accordion class="side_menu_left card">
			
			 <a data-control class="multi"><img src="assets/img_menu/admin_nav_side.png">
			 <span>Administration</span><ins class="sfm-sm-indicator"><i class="glyph-icon icon-angle-right"></i></ins>
			 </a>
			
			 <ul data-content>
					<div  data-accordion-group>	
					<li data-accordion>
					<a data-control class="submenuside"><i class="collectionicons-calendar" style="padding-right: 10px;"></i>
					<span>Gestion des utilisateurs</span>
					<ins class="sfm-sm-indicator"><i class="glyph-icon icon-caret-right"></i></ins>
					</a> 
					<div data-content>
							<article><a href="#" class="submenusidesub">Modification mot de passe</a></article>
							
					</div>
										
					</li>
					<li data-accordion>
					<a data-control class="submenuside"><i class="collectionicons-calendar" style="padding-right: 10px;"></i>
					<span>Gestion des magasins</span>
					<ins class="sfm-sm-indicator"><i class="glyph-icon icon-caret-right"></i></ins>
					</a> 
					<div data-content>
							<article><a href="#" class="submenusidesub">Carte des boulangeries</a></article>
																				
					</div>
										
					</li>	
				</div>
				</ul>						
			</li>
			

		</ul>
	
	
	</div>
	</nav>
	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
			<h3>MES FAVORIS</h3>
			<a href="#"><img src="assets/img_menu/ico_transgourmet.png">Les commandes Transgourmet</a>
			<a href="#"><img src="assets/img_menu/ico_etat_dpae.png">Etat DPAE</a>
			<a href="#"><img src="assets/img_menu/ico_embauche.png">Fiche d'embauche</a>
			<a href="#"><img src="assets/img_menu/ico_planning.png">Les plannings</a>
	
	</nav>
	<nav class="cbp-spmenu2 cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s3">
			<h3>MES TACHES</h3>
			<a href="#"><img src="assets/img_menu/ico_transgourmet.png">Les commandes Transgourmet</a>
			<a href="#"><img src="assets/img_menu/ico_etat_dpae.png">Etat DPAE</a>
			
	
	</nav>
<div class="containerintern">

<?php
if ($codeut==1){
echo'
<div id="SlideWrapper2" class="SlideWrapper height-transition">
<div class="Actual" id="contmenu3">	
<div class="row justify-content-center">
</div>			
</div>	
</div>	

';
}



if ($codeut==2){echo'
	'
;}?>

<div class="containerinternpage" style="background-color: #eeeeee;padding-left: 1%;padding-right: 1%;height: 100%;">
	<nav aria-label="breadcrumb">
  <ol class="breadcrumbnav">
    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
    <li class="breadcrumb-item"><a href="#">Entretien professionel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Entretien pro à passer</li>
  </ol>
</nav>

		<div class="row justify-content-md-left">
			<h2><i class="collectionicons2-interview" style="padding-right: 10px;"></i>Entretiens professionels à passer</h2>
			  <div class="table-responsive">   

 <form id="employe" method='post' >


     
				<select class="custom-select d-block w-100" id="interv-choose-epl" required="">
				
				<option value="">Choisissez votre employé</option>
				  <?php
					 echo $query = "SELECT p.nom_affiche, p.date_entree, p.code, p.code_contrat, p.nb_hrcontrat, 
					 p.date_naissance , f.code codefonc, f.nom_court fonction FROM ".$ncenseigne."_personnels p, 
					 ".$ncenseigne."_rhfonctions f where p.code not in (select code_personnel from 
					 ".$ncenseigne."_entresult_h where date_entretien >=  '".$dateA2."' and status in('B','C','D')) 
					 and p.code_magasin = ".$codemag." and f.code = p.code_fonction and p.actif = 1 
					 and date_entree <='".$dateA2."' and f.code!='ECC2' and debut_sommeil IS NULL order by  p.code_typeemp,p.nom";
					
					 $results = mysql_query($query) or die('Erreur SQL !<br>');
	if (mysql_num_rows($results) > 0)
	{
	while($data = mysql_fetch_assoc($results))
		{
		echo '<option value="'.$data["code"].'"';
		if($data["code"]==$codeemp){
			echo 'selected="selected"';
		}
		echo ' name="'.$data["codefonc"].'">'.$data["nom_affiche"].'('.$data["fonction"].')</option>';
		}
	}
					 
 ?>

                </select>

</form>			  
				  <table class="table">
					 <thead class="thead-dark">
					  <tr>
						<th>Entretien pro du <?php echo $dateactu ?> </th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>
						
						
	<div class="row">
        <div class="col-md-4 order-md-1 mb-4 intranet_v5">
          <h4 class="intran">
           Société Boulangerie de Marie Blachère
           
          </h4>
    
           
              <div>
                <h5 class="intranetv5">Magasin : </h5><small class="text-mutedin"><?php echo $nommag.' - Magasin n°'.$codemag ?></small>
				<h5 class="intranetv5">Date de l'entretien : </h5><small class="text-mutedin"><?php echo $dateactu ?></small>
				<h5 class="intranetv5">Manager de magasin : </h5><small class="text-mutedin"><?php echo $nomprenom.' '.$mycode ?></small>
               
              </div>
            
        
           
     
      

      
        </div>
        <div class="col-md-8 order-md-2">
		
          <h4 class="mb-3"> <span class="badge badge-secondary badge-pill">1</span>Informations</h4>
		   <hr class="mb-4">
          <form class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Prénom</label><strong><?php echo $nomemp; ?></strong>
                <input class="form-control" id="firstName" placeholder="" value="" required="" type="text">
                
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Nom</label>
                <input class="form-control" id="lastName" placeholder="" value="" required="" type="text">
                
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Fonction :</label>
                <input class="form-control" id="firstName" placeholder="" value="" required="" type="text">
                
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Date de naissance :</label>
                <input class="form-control" id="lastName" placeholder="" value="" required="" type="text">
                
              </div>
            </div>
			<div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Numéro de sécu :</label>
                <input class="form-control" id="firstName" placeholder="" value="" required="" type="text">
                
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Date d'entrée :</label>
                <input class="form-control" id="lastName" placeholder="" value="" required="" type="text">
                
              </div>
            </div>
            
			 <h4 class="mb-3">Absence ou Refus du salarié (cochez si nécessaire)</h4>
			 <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" id="same-address" type="checkbox">
              <label class="custom-control-label" for="same-address">Absence Justifiée</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" id="save-info" type="checkbox">
              <label class="custom-control-label" for="save-info"> Absence InJustifiée</label>
            </div>
			<div class="custom-control custom-checkbox">
              <input class="custom-control-input" id="save-info" type="checkbox">
              <label class="custom-control-label" for="save-info">Refus de passer l'entretien</label>
            </div>
        

          
         
           
			 <button type="button"  class="btn btn-success">Etape 2</button>
			 
			
          </form>
        </div>
      </div>

						</td>
						
					  </tr>
					</tbody>
				  </table>				 
</div>
</div>
<!--for ($i=0;$i<$rowk['valeur_fin'];$i=$i+$rowk['increment']){
//		 		echo '<option value="'.($i+$rowk['increment']).'" class="">'.($i+$rowk['increment']).' kg</option>';
//	-->
  
</div> 

</div>
<script type="text/javascript" script src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/progressbar.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/tooltip.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<!-- Screenfull -->
<script type="text/javascript" src="assets/js/screenfull/screenfull.js"></script>
<!-- Content box -->
<script type="text/javascript" src="assets/js/content-box/contentbox.js"></script>
<script src="assets/js/chosen.jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">


if(document.getElementById('fullscreen-btn')) {
  document.getElementById('fullscreen-btn').addEventListener('click', function () {
    if (screenfull.enabled) {
        screenfull.request();
    }
  });
}
  $('.dropdown').on('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // ADD SLIDEUP ANIMATION TO DROPDOWN //
  
    $('.dropdown').on('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
  
	   $('.chosen-select').chosen();
   $('.chosen-select2').chosen();
	
	// $('#interv-choose-epl').on('change',function(){
	  // $("#employe").submit();
   //});   
			
			
//menu de gauche		 
   var 	menuRight = document.getElementById( 'kleft_nav' ),body = document.body;
   showLeft.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( this, 'std' );
				classie.toggle( menuRight, 'cbp-spmenu-open' );				
				disableOther( 'showLeft' );				
			};
			
	function disableOther( button ) {				
				if( button !== 'showLeft' ) {
					classie.toggle( showLeft, 'disabled' );										
				}
				
			}
			
$(document).ready(function() {
	$('#only-one [data-accordion]').accordion();


$( "#closesideleft" ).click(function() {
 $('#kleft_nav').removeClass('cbp-spmenu-open');
});
// Quand on clique sur le menu niv 1

$( ".multi" ).click(function() {

$('.submenuside ').removeClass( "activeleftsub" );
$('.glyph-icon.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-right');
$('i.glyph-icon.icon-caret-down').removeClass('icon-caret-down').addClass('icon-caret-right');

if (!$(this).hasClass('activeleft')){		
	$('.multi').addClass( "collapsed" );
//$('.multi').attr("aria-expanded","false");
//$('.panel-collapse').removeClass( "show" );	

$('.multi').removeClass( "activeleft" );

//$('.multi .glyph-icon').removeClass('icon-angle-down');
$( this ).toggleClass( "activeleft" );
$('icon-angle-right',this).toggleClass('icon-angle-down');
$('.glyph-icon.icon-angle-right',this).removeClass('icon-angle-right').addClass('icon-angle-down');
}else{
$('.glyph-icon.icon-angle-down',this).removeClass('icon-angle-down').addClass('icon-angle-right');
}

});
// Quand on clique sur le menu niv 2
$(".submenuside").click(function() {
	
if (!$(this).hasClass('activeleftsub')){
$('.submenuside ').removeClass( "activeleftsub" );
//$('.glyph-icon.icon-caret-right',this).removeClass('icon-caret-right').addClass('icon-caret-down');
$('.glyph-icon.icon-caret-right',this).removeClass('icon-caret-right').addClass('icon-caret-down');
$( this ).toggleClass( "activeleftsub" );
}else{
$('.submenuside ').removeClass( "activeleftsub" );
$('.glyph-icon.icon-caret-down',this).removeClass('icon-caret-down').addClass('icon-caret-right');
}


});

//$( ".submenusidesub" ).click(function() {.side_menu_left.card.open ul div li.open a.submenuside.activeleftsub ins.sfm-sm-indicator i.glyph-icon.icon-caret-down
  //$( this ).toggleClass( "activeleftsubsub" );
//});



$('#interv-choose-epl').on('change',function(){
var codemp = $('#interv-choose-epl option:selected').val()
alert(codemp);
});  

	
	   
	 $("#cbp-spmenu-s3").hide();
	 $("#cbp-spmenu-s2").hide();
	 $("#showRight2").hide();
	 $("#showRight3").hide();
	 //
	 
	  $("#showRight").click(function () {
		  $("#cbp-spmenu-s2").show();
		  $("#cbp-spmenu-s3").hide();
		   $("#showRight").hide();
		   $("#showRight2").show();
		  
	  });
	   $("#showRight2").click(function () {
		  $("#cbp-spmenu-s3").show();
		  $("#cbp-spmenu-s2").hide();
		   $("#showRight").hide();
		   $("#showRight2").hide();
		   $("#showRight3").show();

	  });
	     $("#showRight3").click(function () {
		  $("#cbp-spmenu-s3").hide();
		  $("#cbp-spmenu-s2").hide();
		   $("#showRight").show();
		   $("#showRight2").hide();
		   $("#showRight3").hide();

	  });

//sub sub menu	
	$(".white_sub_sub").hide();
	 $(".Trigger2").click(function () {
	
	  if ($(this).parent('div').find(".white_sub_sub").is(":hidden")){
            $(this).parent('div').find(".white_sub_sub").fadeIn();
        }
		else{
		$(".white_sub_sub").fadeOut();
		}	 
	 })
 




 });
 
 var toDay=new Date(),hrf=<?php
        date_default_timezone_set('Europe/Paris');
        echo date("H"); ?>;
var dec=hrf-toDay.getUTCHours();
 
 
function hms(){
    var today=new Date();
    var hrs=today.getUTCHours()+dec,mns=today.getUTCMinutes(),scd=today.getUTCSeconds();
    var str=(hrs<10?"0"+hrs:hrs)+"H "+(mns<10?"0"+mns:mns)+" min";
    $("#clock").html("<div class='date'><?php echo $date ?> <span class='heure'>"+str+"</span></div>");
    setTimeout(hms,1000);
}
  hms();

   </script>
</body>
</html>
<?php
include('deconnexion.php');
include('deconnexion_postgr.php');

?>