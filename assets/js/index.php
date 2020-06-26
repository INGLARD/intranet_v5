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
include('inc/config.php');



?>
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
<div class="container">

 
                
                    <?php $one->build_nav(); ?>
              
           

</div>


<script type="text/javascript" script src="assets/js/jquery.js"></script>

<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/popover.js"></script>
<script type="text/javascript" src="assets/js/progressbar.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<!-- Screenfull -->
<script type="text/javascript" src="assets/js/screenfull/screenfull.js"></script>
<!-- Content box -->
<script type="text/javascript" src="assets/js/content-box/contentbox.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/tooltip.js" type="module"></script>
<script type="text/javascript">

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
	var ut=<?php echo $mycode; ?>;
	var codem=$(this).attr('data-code');

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
					data: 'menu='+menu+'&ut='+ut+'&codem='+codem,
					dataType: 'html',
					success: function(data){
					
					$(".Actual").each(function(){
						var id=$(this).attr('id');
						setTimeout(function(){$('#'+id).html(data);}, 800);
											});
					
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
 
 

   </script>