<?php
if (session_id() == "") {session_start();}
$codeens=$_SESSION['codeenseigne'];
//les dates


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr-FR" xml:lang="fr">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Intranet du groupe Blachère</title>
  <link rel="stylesheet" href="assets/css/additionalcss.css">
  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">

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
     <link href="assets/css/login.css" rel="stylesheet" type="text/css" />
     <link href="https://fonts.googleapis.com/css?family=Abel|Julius+Sans+One|Quicksand:300|Open+Sans+Condensed:300" rel="stylesheet">
</head>
<style>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
    transition: background-color 5000s ease-in-out 0s;
    -webkit-text-fill-color: #000 !important;
}
</style>	
<?php

setlocale(LC_TIME, 'fr_FR.UTF8');

//$date=date('%A j F Y h:i:s A');
$date=strftime("%A, %d %B %Y");
$heure = date("H:i");

?>


<body>


<div class="cont">
<nav class="navbar bg-dark2 navv">
	
	
	 <div class="header-nav-left" style="width:100%"><p class="date2">Intranet du Groupe Blachere</p>
	
	 </p>
	<span id="clock"><?php echo $date ?></span>
	 </div>

	
</nav>

  <div class="demo">
 
    <div class="login">
  
      <div class="" style="text-align: center !important;"><svg   style="width:30vh;height:15vh; margin-top:5%;">
 <image id="Objet_dynamique_vectoriel" data-name="Objet dynamique vectoriel" x="0" y="0" width="100%" height="100%" style="width:30vh;height:15vh;"  xlink:href="data:img/png;base64,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"  />
</svg>
<p style="font-size: 2.5vh;
color: rgba(255,255,255,0.93);text-shadow: 3px 5px 9px rgba(0, 0, 0, 0.52);margin-top:2vh">Identification</p>
 </div>
      <div class="login__form">
      
      <form class="" action="loginnew.php" method="post" name="login" id="target">
			        <div class="login__row">
			        
			          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
			            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
			          </svg>
			          <input type="text" class="login__input name" id="form_login" name="username" placeholder="Username" autocomplete="on"/>
			        </div>
			        <div class="login__row">
			          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
			            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
			          </svg>
			          <input type="password" class="login__input pass" id="form_password" name="password" placeholder="Password" autocomplete="on"/>
			        </div>
        <button type="button" class="login__submit">Entrez</button>
       <!-- <p class="login__signup">Don't have an account? &nbsp;<a>Sign up</a></p>-->
        </form>
      </div>
    </div>
  
  </div>
  
  
</div>


<script type="text/javascript" script src="assets/js/jquery.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
  
 
var toDay=new Date(),hrf=<?php
        date_default_timezone_set('Europe/Paris');
        echo date("H"); ?>;
var dec=hrf-toDay.getUTCHours();
 
 
function hms(){
    var today=new Date();
    var hrs=today.getUTCHours()+dec,mns=today.getUTCMinutes(),scd=today.getUTCSeconds();
    var str=(hrs<10?"0"+hrs:hrs)+"H"+(mns<10?"0"+mns:mns)+"min";
    $("#clock").html("<div class='date'><?php echo $date ?></div><div class='heure'>"+str+"</div>");
    setTimeout(hms,1000);
}
  hms();
 
 

  
  
  var animating = false,
      submitPhase1 = 1100,
      submitPhase2 = 400,
      logoutPhase1 = 800,
      $login = $(".login"),
      $app = $(".app");
  
  function ripple(elem, e) {
    $(".ripple").remove();
    var elTop = elem.offset().top,
        elLeft = elem.offset().left,
        x = e.pageX - elLeft,
        y = e.pageY - elTop;
    var $ripple = $("<div class='ripple'></div>");
    $ripple.css({top: y, left: x});
    elem.append($ripple);
  };
  
  $(document).on("click", ".login__submit", function(e) {
    if (animating) return;
    animating = true;
    var that = this;
    ripple($(that), e);
    $(that).addClass("processing");
    setTimeout(function() {
      $(that).addClass("success");
      setTimeout(function() {
        $app.show();
        $app.css("top");
        $app.addClass("active");
      }, submitPhase2 - 70);
      setTimeout(function() {
        
        $login.hide();
        $login.addClass("inactive");
        animating = false;
        $(that).removeClass("success processing");
        $( "#target" ).submit();
      }, submitPhase2);
    }, submitPhase1);
  });
  
  $(document).on("click", ".app__logout", function(e) {
    if (animating) return;
    $(".ripple").remove();
    animating = true;
    var that = this;
    $(that).addClass("clicked");
    setTimeout(function() {
      $app.removeClass("active");
      $login.show();
      $login.css("top");
      $login.removeClass("inactive");
    }, logoutPhase1 - 120);
    setTimeout(function() {
      $app.hide();
      animating = false;
      $(that).removeClass("clicked");
    }, logoutPhase1);
  });
  
});

</script>
</body>
</html>