<?php
if (session_id() == "") {session_start();}

//$mag = $_SESSION['magutilisateur'];										// Magasin en cours de traitement
//$mag = isset($_SESSION['magutilisateur']) ? $_SESSION['magutilisateur'] : "";

$codemd5 = $_SESSION['md5utilisateur'];
$mycode =$_SESSION['codeutilisateur'];

// Include Template class
require 'classes/Template.php';
include('connexion.php');

$fastpath='http://'.$_SERVER['HTTP_HOST'].'/intranet_v5/';
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
// Create a new Template Object
$one                               = new Template('Intranet', '2.0', $fastpath.'assets'); // Name, version and assets folder's name

// Global Meta Data
$one->author                       = 'Holding Blachere';
$one->robots                       = 'noindex, nofollow';
$one->title                        = 'Intranet du groupe Blachere';
$one->description                  = '';

// Global Included Files (eg useful for adding different sidebars or headers per page)
//$one->inc_side_overlay             = 'base_side_overlay.php';
$one->inc_sidebar                  = 'base_sidebar.php';
$one->inc_header                   = 'base_header.php';

// Global Color Theme
$one->theme                        = 'modern';       // '' for default theme or 'amethyst', 'city', 'flat', 'modern', 'smooth'

// Global Body Background Image
$one->body_bg                      = $fastpath.'assets/img/photos/imagefond10.jpg';       // eg 'assets/img/photos/photo10@2x.jpg' Useful for login/lockscreen pages

// Global Header Options
$one->l_header_fixed               = true;     // True: Fixed Header, False: Static Header

// Global Sidebar Options
//<div id="page-container" class="sidebar-l sidebar-o  side-scroll header-navbar-fixed sidebar-mini">
$one->l_sidebar_position           = 'left';   // 'left': Left Sidebar and right Side Overlay, 'right;: Flipped position
$one->l_sidebar_mini               = true;    // True: Mini Sidebar Mode (> 991px), False: Disable mini mode
$one->l_sidebar_visible_desktop    = true;     // True: Visible Sidebar (> 991px), False: Hidden Sidebar (> 991px)
$one->l_sidebar_visible_mobile     = false;    // True: Visible Sidebar (< 992px), False: Hidden Sidebar (< 992px)

// Global Side Overlay Options
$one->l_side_overlay_hoverable     = false;    // True: Side Overlay hover mode (> 991px), False: Disable hover mode
$one->l_side_overlay_visible       = false;    // True: Visible Side Overlay, False: Hidden Side Overlay

// Global Sidebar and Side Overlay Custom Scrolling
$one->l_side_scroll                = true;     // True: Enable custom scrolling (> 991px), False: Disable it (native scrolling)

// Global Active Page (it will get compared with the url of each menu link to make the link active and set up main menu accordingly)

// Global Active Page (it will get compared with the url of each menu link to make the link active and set up main menu accordingly)
$one->main_nav_active              = $url;



$query = "SELECT m.nom, m.icone, m.nom_affichage, m.nom_page,m.code FROM pri_menusV5 m, users_menus u where m.code_menu_maitre is null and u.code_user = ".$mycode." and u.code_menu = m.code order by m.ordre";
$results = mysql_query($query) or die(header("Location: ".$fastpath."logu.php"));
if (mysql_num_rows($results) > 0)
{

	$rowdata=array();
	$rowdatasub=array();
	$rowdatasub2=array();
	$rowdata[]=  array();
	while($data = mysql_fetch_assoc($results))
	{
		$query2 = "SELECT m.nom, m.icone, m.nom_affichage, m.nom_page , m.code FROM pri_menusV5 m, users_menus u where m.code_menu_maitre=".$data['code']." and u.code_user = ".$mycode." and u.code_menu = m.code order by m.ordre";
		$results2 = mysql_query($query2) or die('Erreur2 <br>');


		if (mysql_num_rows($results2) > 0)
		{

			$rowdatasub=array();
			while($data2 = mysql_fetch_assoc($results2)){

				$query3 = "SELECT m.nom, m.icone, m.nom_affichage, m.nom_page,m.code FROM pri_menusV5 m, users_menus u where m.code_menu_maitre=".$data2['code']." and u.code_user = ".$mycode." and u.code_menu = m.code order by m.ordre";
				$results3 = mysql_query($query3) or die('Erreur3 <br>');

				if (mysql_num_rows($results3) > 0)
				{


					$rowdatasub2=array();
					while($data3 = mysql_fetch_assoc($results3)){
						$rowdatasub2[]=array(
						'name'  => $data3['nom_affichage'],
						'subname'  => $data3['nom'],
						'url'   => $fastpath.$data3['nom_page'].'.php',
						'code' => $data3['code']
						);
					}
					$rowdatasub[]=array(
					'name'  => $data2['nom_affichage'],
					'subname'  => $data2['nom'],
					'sub'=>$rowdatasub2,
					'code' => $data2['code']
					);

				}else{

					$rowdatasub[]=array(
					'name'  => $data2['nom_affichage'],
					'subname'  => $data2['nom'],
					'url'   => $fastpath.$data2['nom_page'].'.php',
					'icon'	=> $data2['icone'],
					'code' => $data2['code']
					);


				}
			}

			$rowdata[]=
			array(
			'name'  => $data['nom_affichage'],
			'subname'  => $data['nom'],
			'icon'  => $data['icone'],
			'code' => $data['code'],
			'sub' =>$rowdatasub
			);
		}
		else{

			if($data['nom_affichage']!='Accueil'){
				$rowdata[]=
				array(
				'name'  => $data['nom_affichage'],
				'subname'  => $data['nom'],
				'icon'  => $data['icone'],
				'code'  => $data['code']
				);
			}



		}
	}
}else{
	$rowdata=array();
}

//print_r($rowdata);


// Global Main Menu
$one->main_nav                     = $rowdata;


function AddPlayTime($times) {

	// loop throught all the times
	foreach ($times as $time) {
		list($hour, $minute) = explode(':', $time);
		$minutes += $hour * 60;
		$minutes += $minute;
	}

	$hours = floor($minutes / 60);
	$minutes -= $hours * 60;

	// returns the time already formatted
	return sprintf('%02d H :%02d min', $hours, $minutes);
}
function get_ip() {
	// IP si internet partagé
	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	}
	// IP derrière un proxy
	elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	// Sinon : IP normale
	else {
		return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
	}
}
include('deconnexion.php');
