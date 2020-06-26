<?php
if (session_id() == "") {session_start();}
include('connexion.php');
include('connexion_postgr.php');
include('connexion_pdo.php');
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
//query manager lmanagermag
 $qumanmag="SELECT nom, prenom, code FROM pri_users WHERE type_user ='MANAGERMAG' AND code IN (SELECT code_user FROM  users_magasins WHERE code_magasin=".$codemag.")";
$resmanmag=mysql_query($qumanmag);
if (mysql_num_rows($resmanmag) > 0){
while($data03 = mysql_fetch_assoc($resmanmag))	{
$nommangermag=$data03['nom'];
$prenommangermag=$data03['prenom'];
$prenomnommanagersect=$data03['prenom'];
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
	$nom="Patrice Barber";
	$fonction="Administrateur";
	$codeut=1; //superadmin
}
if ($typeuser=='MANAGERMAG'){
	$nom=$nommangermag;
	$prenom=$prenommangermag;
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

?>
<button id="showRight" style="position: absolute;right:0px;top:55%;z-index:99999" class="std"></button>


<nav class="navbar bg-dark navv">

	<div id="header-nav-left">
	 <a href="#" class="hdr-btn" id="showLeft" title="menu">
            <i class="glyph-icon icon-bars"></i>
        </a>
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
               <img src="assets/img/profile_nav.png" alt="profile_nav" width="" height="" style="margin-top:-5px;max-width: 35px"/>
                <span><?php echo $nom.' '.$prenom.' '.$rowm ?>
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
                                <?php echo $nom.' '.$prenom.' '.$mycode ?>
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
						<li>
                            <a href="http://194.98.45.150/intranet_v5/indexold.php">

                               Ancienne page d'index avec le right

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
                    Mes paramètress
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
                            Changer<br> fond d'écran
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
