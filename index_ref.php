<?php
if (session_id() == "") {session_start();}
include('connexion.php');
include('connexion_postgr.php');
$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);
$dateactu=date('d/m/Y');
setlocale(LC_TIME, "fr_FR");

//$date=date('%A j F Y h:i:s A');
$date=strftime("%A, %d %B %Y");
$heure = date("H:i");
$codemd5=$_GET["use"];
$querynamag="SELECT nom FROM pri_magasins WHERE code=".$codemag;
$resultmag=mysql_query($querynamag);
if (mysql_num_rows($resultmag) > 0){
while($data01 = mysql_fetch_assoc($resultmag))	{
$nommag=$data01['nom'];
}
}
//query manager lmanagermag 
 $qumanmag="SELECT nom, prenom, code FROM pri_users WHERE type_user ='MANAGERMAG' AND code IN (SELECT code_user FROM  users_magasins WHERE code_magasin=".$codemag.")";
$resmanmag=mysql_query($qumanmag);
if (mysql_num_rows($resmanmag) > 0){
while($data03 = mysql_fetch_assoc($resmanmag))	{
$nommangermag=$data03['nom'];
$prenommangermag=$data03['prenom'];

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

//$codeut=2; //magasin

if ($typeuser=='ADMIN'){
	$nomut="Barber";
	$prenomut="Patrice";	
	$fonction="Administrateur";
	$codeut=1; //superadmin
}

if ($typeuser=='MANAGERMAG'){
	$nomut=$nommangermag;	
	$prenomut=$prenommangermag;
	$fonction="Manager de Magasin";
	$codeut=2; //superadmin
}

//MENU
 $qumenu="select * from pri_menus a, users_menus b where b.code_user=".$mycode." and b.code_menu=a.code AND b.code_menu <>1 and a.code_menu_maitre is null order by ordre ASC";
$rmen=mysql_query($qumenu);



//$queryk="select * from w_articles_type_vente where id='".$row['type_vente']."'";
//	 		$resultsk = pg_query($dbconn_c, $queryk);
//	 		$rowk = pg_fetch_array($resultsk);
//for ($i=0;$i<$rowk['valeur_fin'];$i=$i+$rowk['increment']){
//		 		echo '<option value="'.($i+$rowk['increment']).'" class="">'.($i+$rowk['increment']).' kg</option>';
//	 		}
?>

<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Intranet V5</title>
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
	<link href="assets/css/icons/interview/interview.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/collectionicons/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/iconic/iconic.css" rel="stylesheet" type="text/css" />
	 <link href="assets/css/icons/linecons/linecons.css" rel="stylesheet" type="text/css" />
	 <link href="assets/css/icons/qhse/qhse.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/icons/elusive/elusive.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/icons/typicons/typicons.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/icons/fontawesome/fontawesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/fruits_vegetables/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/management/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/drinkset/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/shopping/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons/books/flaticon.css" rel="stylesheet" type="text/css" />
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
    
	<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
</head>
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
<body class="cbp-spmenu-push">
<button id="showRight" style="position: absolute;right:0px;top:50%;z-index:99999" class="std"></button>
<button id="showRight2" style="position: absolute;right:0px;top:50%;z-index:99999" class="std2"></button>
<button id="showRight3" style="position: absolute;right:0px;top:50%;z-index:99999" class="std3"></button>

	<nav class="navbar bg-dark navv">
	
	<div id="header-nav-left">
	     <a href="#" class="hdr-btn" id="side-menu-btn" title="menu">
            <i class="glyph-icon icon-bars"></i>
        </a>
	
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
               <img src="assets/img/profile_nav.png" alt="profile_nav" width="" height="" style="margin-top:-5px;max-width: 35px"/>
                <span><?php echo $prenomut.' '.$nomut ?>
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
                                <?php echo $prenomut.' '.$nomut.' '.$mycode ?>
                                <i><?php echo $fonction ?></i>
								
                            </span>
                            <span> <?php echo $enseigne ?></span>
                             
							 <span> <?php echo $nommag.' - Magasin n°'.$codemag ?></span>
                        </div>
                    </div>
                    <div class="divider"></div>
					 <div class="user-info">
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
					
					</div>
					
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="unlog4.php" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Se déconnecter
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
	<!--  NAV LEFT -->

	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right2" id="cbp-spmenu-s2">
			<h3>MES FAVORIS</h3>
			<a href="#"><img src="assets/img_menu/ico_transgourmet.png">Les commandes Transgourmet</a>
			<a href="#"><img src="assets/img_menu/ico_etat_dpae.png">Etat DPAE</a>
			<a href="#"><img src="assets/img_menu/ico_embauche.png">Fiche d'embauche</a>
			<a href="#"><img src="assets/img_menu/ico_planning.png">Les plannings</a>
	
	</nav>
	<nav class="cbp-spmenu2 cbp-spmenu-vertical cbp-spmenu-right2" id="cbp-spmenu-s3">
			<h3>MES TACHES</h3>
			<a href="#"><img src="assets/img_menu/ico_transgourmet.png">Les commandes Transgourmet</a>
			<a href="#"><img src="assets/img_menu/ico_etat_dpae.png">Etat DPAE</a>
			
	
	</nav>
<div class="container">



<?php
if ($codeut==1){
echo'<div style="" class="row justify-content-center ligneM">

<!-- boulangerie -->
<div class="Trigger" id="menu1" name="main01">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu01.png"></div>
<div class="ff caret" ></div>
</div>
<!-- fruits et legumes -->
<div class="Trigger" id="menu2" name="main02">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu02.png"></div>
<div class="ff caret" ></div>
</div>
<!-- plannings -->
<div class="Trigger" id="menu3" name="main03">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu03.png"></div>
<div class="ff caret" ></div>
</div>
<!-- compta --> 
<div class="Trigger" id="menu4" name="main04">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu04.png"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger " id="menu5" name="main05">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu05.png"></div>
<div class="ff caret" style=""></div>
</div>    		

<!-- wrap your content into the height-transition wrapper -->
<div id="SlideWrapper1" class="SlideWrapper height-transition height-transition-hidden">
<div class="Actual" id="contmenu2">	

		
</div>	
</div>
</div>
<div style="width:100%;margin-bottom:45px !important" class="row justify-content-center">
  <!--administration-->
 
<div class="Trigger " id="menu6" name="main06">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu06.png"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger " id="menu7" name="main07">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu07.png"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger " id="menu8" name="main08">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu08.png"></div>
<div class="ff caret" ></div>
</div> 
<div class="Trigger " id="menu9" name="main09">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu09.png"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger " id="menu10" name="main10">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu10.png"></div>
<div class="ff caret" ></div>
</div>         
<!-- wrap your content into the height-transition wrapper -->
<div id="SlideWrapper2" class="SlideWrapper height-transition height-transition-hidden">
<div class="Actual" id="contmenu3">				
</div>	
</div>	  
<!-- <div  class="SlideWrapper height-transition height-transition-hidden">
<div class="Actual">
Your actual content to slide down goes here.3654564564
</div>
</div>-->
 </div> 
 <div style="width:100%;margin-bottom:45px !important" class="row justify-content-center">
  <!--administration-->
 
<div class="Trigger " id="menu11" name="main11">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu11.png"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger " id="menu12" name="main12">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu12.png"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger">
<div class="col-sm" style=" width:119px;height:auto"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger">
<div class="col-sm" style=" width:119px;height:auto"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger">
<div class="col-sm" style=" width:119px;height:auto"></div>
<div class="ff caret" ></div>
</div>
<!-- wrap your content into the height-transition wrapper -->
<div id="SlideWrapper2" class="SlideWrapper height-transition height-transition-hidden">
<div class="Actual" id="contmenu4">				
</div>	
</div>';
}



if ($codeut==2){
	//BOUCle limitation d'icones a 3
	//$i = 1;
	//if (mysql_num_rows($rmen) > 0){
		//echo'<ul>';
		//while($data06 = mysql_fetch_assoc($rmen)){
			//if (fmod($i,3) == 0){
			//	echo '<li>'.$data06['nom_affichage'].'</li></ul><ul>';
			//}	
			//else{
			//	echo '<li>'.$data06['nom_affichage'].'</li>';
			//}
			//$i++;
		//}
		//echo '</ul>';
	//}

	
echo'<!-- boulangerie-->
<div style="width:100%;margin-bottom:45px !important" class="row justify-content-center">
	<div class="Trigger" id="menu1" name="main01">
	<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu01.png"></div>
	<div class="ff caret" ></div>
	</div>


<!-- plannings -->
	<div class="Trigger" id="menu3" name="main03">
	<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu03.png"></div>
	<div class="ff caret" ></div>
	</div>
<!-- compta --> 

	<div class="Trigger " id="menu5" name="main05">
	<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu05.png"></div>
	<div class="ff caret" style=""></div>
	</div>    		

<!-- wrap your content into the height-transition wrapper -->
				<div id="SlideWrapper1" class="SlideWrapper height-transition height-transition-hidden">
				<div class="Actual" id="contmenu2">				
				</div>	
				</div>
</div>


  <!--administration-->
<div style="width:100%;margin-bottom:45px !important" class="row justify-content-center">

<div class="Trigger " id="menu8" name="main08">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu08.png"></div>
<div class="ff caret" ></div>
</div> 

<div class="Trigger " id="menu10" name="main10">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu10.png"></div>
<div class="ff caret" ></div>
</div>  
<div class="Trigger " id="menu11" name="main11">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu11.png"></div>
<div class="ff caret" ></div>
</div>       
<!-- wrap your content into the height-transition wrapper -->
<div id="SlideWrapper2" class="SlideWrapper height-transition height-transition-hidden">
<div class="Actual" id="contmenu3">				
</div>	
</div>	  
<!-- <div  class="SlideWrapper height-transition height-transition-hidden">
<div class="Actual">
Your actual content to slide down goes here.3654564564
</div>
</div>-->
 </div> 
 <div style="width:100%;margin-bottom:45px !important" class="row justify-content-center">
  <!--administration-->
 

<div class="Trigger " id="menu12" name="main12">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu12.png"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger " id="menu13" name="main13">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu13.png"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger">
<div class="col-sm" style=" width:119px;height:auto"></div>
<div class="ff caret" ></div>
</div>

<!-- wrap your content into the height-transition wrapper -->
<div id="SlideWrapper2" class="SlideWrapper height-transition height-transition-hidden">
<div class="Actual" id="contmenu4">				
</div>	
</div>';
}

//for ($i=0;$i<$rowk['valeur_fin'];$i=$i+$rowk['increment']){
//		 		echo '<option value="'.($i+$rowk['increment']).'" class="">'.($i+$rowk['increment']).' kg</option>';
//	




?>  
      
</div> 

 
 

</div>
<script type="text/javascript" script src="assets/js/jquery.js"></script>

<script src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/progressbar.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/tooltip.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<!-- Screenfull -->
<script type="text/javascript" src="assets/js/screenfull/screenfull.js"></script>
<!-- Content box -->
<script type="text/javascript" src="assets/js/content-box/contentbox.js"></script>
<script type="text/javascript">
  function tryConsole() {
        console.log("hello world");
    } 
  /* Screenfull */
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
  
			
			
   $(document).ready(function() {
	
	   
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
	 
	 
	   
var idselct='';
var i=0;
$(".ff").hide();
    $(".Trigger").click(function () {
	var menu=$(this).attr('name');
	var ut=<?php echo $codeut; ?>;


		if((idselct!=$(this).attr('id')) ){
			$(this).addClass('active');
			$(".SlideWrapper").slideUp( "slow" );
			$(".ff").slideUp( "slow" );
			$(this).parent('div').find(".SlideWrapper").slideDown( "slow" );
			$(this).find(".ff").slideDown( "slow" );
			$(this).removeClass('inactive');
			//alert('1');
			idselct=$(this).attr('id');
			
			$.ajax({
					type: 'GET',
					url: 'ajax/main_menu_ajax.php',
					data: 'menu='+menu+'&ut='+ut,
					dataType: 'html',
					success: function(data){
						setTimeout(function(){$('#contmenu2').html(data);}, 800);
						setTimeout(function(){$('#contmenu3').html(data);}, 800);
						setTimeout(function(){$('#contmenu4').html(data);}, 800);
						}
					});
		}
	

		else if((idselct==$(this).attr('id')) && ($(this).hasClass('active'))){	
			$(this).parent('div').find(".SlideWrapper").slideUp( "slow" );
			$(this).parent('div').find(".ff").slideUp( "slow" );
			//$(this).parent('div').find(".SlideWrapper").addClass("height-transition-hidden");
			$(".white_sub_sub").hide();
			$(this).removeClass('active');
			$(this).addClass('inactive');
			idselct='';
			  // 
			}
    });
	
	//changement de profil
	$(".prof").click(function () {
		var idprofil=$(this).attr('id');
		
		$.ajax({
					type: 'GET',
					url: 'ajax/profile_menu_ajax.php',
					data: 'idprofil='+idprofil,
					dataType: 'html',
					success: function(data){
						$('#content_rows').html( data);
						}
					});
		
		
		
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