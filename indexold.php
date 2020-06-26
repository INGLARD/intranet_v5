<?php

include('connexion.php');
include('connexion_postgr.php');
if (session_id() == "") {session_start();}
$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);
$codemd5=$_GET["use"];
$dpae_date=date("Y-m-d");

$codepostal=$_GET["codepostal"];



	
	function simpleName ($chaine)
{
  // Le premier paramètre de la fonction iconv () est à adapter au codage de caractères utilisé par tes chaînes
  // (ex. : 'ISO-8859-1' si les chaînes de caractères utilisent ce codage)
  $string = iconv ('UTF-8', 'US-ASCII//TRANSLIT//IGNORE', $chaine);
  $string = preg_replace ('#[^.0-9a-z]+#i', '', $string);
  $string = strtolower ($string);
  return $string;
}
//requete pour retrouver le numeo de manager de secteur --------------->>>> pas acces a la base
//echo $querymanager="SELECT a.code_user,a.code_magasin,b.code,b.nom,b.type_user,b.actif FROM users_magasins a,pri_users b 
//					WHERE a.code_magasin=".$codemag." AND b.type_user='MANAGERSECT' AND b.actif='O' AND a.code_user=b.code";
//					$resultsmana=mysql_query($querymanager);
					
					//if (mysql_num_rows($resultsmana) > 0){
																											
							//echo 'tttt';														
					//}else{
						
						//echo 'tata';
					//}		


$codeut=2; //superadmin
//$codeut=2; //magasin

if ($codeut==1){
	$nomprenom="Patrice Barber";	
	$fonction="Administrateur";
}

if ($codeut==2){
	$nomprenom="Stephanie Bouis";	
	$fonction="Boulangerie";
}
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
  <link rel="stylesheet" type="text/css" href="assets/css/component1409.css" />
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

<body class="cbp-spmenu-push">
<button id="showRight" style="position: absolute;right:0px;top:55%;z-index:99999" class="std"></button>
<button id="showRight2" style="position: absolute;right:0px;top:50%;z-index:99999" class="std"><i class="icon-typicons-brush"></i></button>

	<nav class="navbar bg-dark navv">
	<!--<div class="containernav">
	<div  class="row">
	
			<div class="col-sm">
			<div style="display:flex;margin-top:auto;
	    margin-bottom:auto;">
			<img src="assets/img/profile_nav.png" width='42px' height='42px' style="margin-right:10px"><span class="profil">Andréa LA GRECA<br>
			<span class="profession">Manager de magasin<br>
			Boulangerie de Marie Blachère</span></span>
			</div>
			</div>
			
			<div class="col-sm"><span class="bienvenue">Bienvenue sur l’intranet du groupe Blachère</span></div>
			<div class="col-sm">
			<ul class="iconavbar-right">
	              <li ><a href="#"><img src="assets/img_menu/top_menu_infopng.png"></a></li>
	              <li ><a href="#"><img src="assets/img_menu/top_menu_infopng.png"></a></li>
	              <li ><a href="#"><img src="assets/img_menu/top_menu_infopng.png"></a></li>
	        </ul>
		</div>
				
	</div>
	</div>  -->
	<div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
               <img src="assets/img/profile_nav.png" alt="profile_nav" width="" height="" style="margin-top:-5px;max-width: 35px"/>
                <span><?php echo $nomprenom ?>
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
                                <?php echo $nomprenom ?>
                                <i><?php echo $fonction ?></i>
								
                            </span>
                            <a href="#" title="Edit profile">Edit profile</a>
                            <a href="#" title="View notifications">View notifications</a>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <ul class="reset-ul mrg5B">
                        <li>
                            <a href="#" class="prof" id="boulprofil">
                                <i class="glyph-icon float-right icon-caret-right"></i>
                                Boulangerie
                                
                            </a>
                        </li>
                        <li>
                            <a href="#"  class="prof" id="flprofil">
                                <i class="glyph-icon float-right icon-caret-right"></i>
                                Magasins FL
                                
                            </a>
                        </li>
                        <li>
                            <a href="#"  class="prof" id="adminprofil">
                                <i class="glyph-icon float-right icon-caret-right"></i>
                                profil admin
                                
                            </a>
                        </li>
                    </ul>
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="#" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header-nav-left"><span class="bienvenue">Bienvenue sur l’intranet du groupe Blachère</span></div>
    
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
        <a class="header-btn" id="logout-btn" href="lockscreen-3.html" title="Lockscreen page example">
            <i class="glyph-icon icon-linecons-lock"></i>
        </a>

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
<div class="container">

<?php
		$qurey="select * from pri_menus a, users_menus b where b.code_user=3 and b.code_menu=a.code and a.code_menu_maitre is null";
?>

<?php
if ($codeut==1){
echo'<div style="width:100%;margin-bottom:45px !important" class="row justify-content-center">

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
echo'<div style="width:100%;margin-bottom:45px !important" class="row justify-content-center">

<!-- boulangerie -->
<div class="Trigger" id="menu1" name="main01">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu01.png"></div>
<div class="ff caret" ></div>
</div>
<!-- fruits et legumes -->

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
<div style="width:100%;margin-bottom:45px !important" class="row justify-content-center">
  <!--administration-->
 


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
?>        

<!-- <div  class="SlideWrapper height-transition height-transition-hidden">
<div class="Actual">
Your actual content to slide down goes here.3654564564
</div>
</div>-->
 </div> 
 
 

</div>
<script type="text/javascript" script src="assets/js/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/progressbar.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/tooltip.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<!-- Screenfull -->
<script type="text/javascript" src="assets/js/screenfull/screenfull.js"></script>
<!-- Content box -->
<script type="text/javascript" src="assets/js/content-box/contentbox.js"></script>
<script>
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
  
  //side menu toogle
   var 	menuRight = document.getElementById( 'cbp-spmenu-s2' ),body = document.body;
   
   showRight.onclick = function() {
				 classie.toggle( this, 'active' );				
				 classie.toggle( this, 'std' );
				 classie.toggle( menuRight, 'cbp-spmenu-open' );
				
				 disableOther( 'showRight' );
				
			 };
			
	 function disableOther( button ) {
				
				 if( button !== 'showRight' ) {
					classie.toggle( showRight, 'disabled' );
					
					
				 }

			 }

 
			
   $(document).ready(function() {
	 
	   
var idselct='';
var i=0;
$(".ff").hide();
    $(".Trigger").click(function () {
	var menu=$(this).attr('name');
	var ut=<?php echo $codeut; ?>;

		if((idselct!=$(this).attr('id')) ){
			$(this).addClass('active');			$(".SlideWrapper").slideUp( "slow" );
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
			  // alert('2');   
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
  
   $("#showRight2").hide();

//$('#showRight2, #showRight').click(function () {
 //  if (this.id == 'showRight') {
      //alert('Submit 1 clicked');
	//  $("#showRight2").show();
 //  }
 //  else if (this.id == 'showRight2') {
     // alert('Submit 2 clicked');
 //  }
//});


  
  /*
  
     $(document).ready(function() {
var idselct='';
var i=0;
$(".ff").hide();
    $(".Trigger").click(function () {

		if((idselct!=$(this).attr('id')) ){
			$(this).addClass('active');
			$(".SlideWrapper").slideUp( "slow" );
			$(".ff").slideUp( "slow" );
			$(this).parent('div').find(".SlideWrapper").slideDown( "slow" );
			$(this).find(".ff").slideDown( "slow" );
			$(this).removeClass('inactive');
			//alert('1');
			idselct=$(this).attr('id');
		}
	

		else if((idselct==$(this).attr('id')) && ($(this).hasClass('active'))){	
			$(this).parent('div').find(".SlideWrapper").slideUp( "slow" );
			$(this).parent('div').find(".ff").slideUp( "slow" );
			//$(this).parent('div').find(".SlideWrapper").addClass("height-transition-hidden");
			$(".white_sub_sub").hide();
			$(this).removeClass('active');
			$(this).addClass('inactive');
			idselct='';
			  // alert('2');   
			}
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
	
  });*/
  
     
   </script>
</body>
</html>
<?php
include('deconnexion.php');
include('deconnexion_postgr.php');

?>