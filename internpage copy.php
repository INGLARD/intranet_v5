

<style type="text/css"> 
.custom-select {
    display: inline-block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem 1.75rem .375rem .75rem;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background: #fff ;
        background-size: auto auto;
    background-size: 8px 10px;
    border: 1px solid #ced4da;
        border-top-color: rgb(206, 212, 218);
        border-right-color: rgb(206, 212, 218);
        border-bottom-color: rgb(206, 212, 218);
        border-left-color: rgb(206, 212, 218);
    border-radius: .25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;	
	
	.custom-select.is-valid, .form-control.is-valid, .was-validated .custom-select:valid, .was-validated .form-control:valid {
    border-color: #28a745;
}

html body.cbp-spmenu-push div.containerintern div.containerinternpage div.row.justify-content-md-left div.table-responsive table.table tbody tr td div.row div.col-md-8.order-md-2 form.needs-validation div.row div.col-md-6.mb-3 input#firstName.form-control.controo{
height: 30px!important;

}

</style>
<!--  NAV LEFT <nav class="cbp-spmenu-s2 cbp-spmenu cbp-spmenu-bkg cbp-spmenu-vertical2 cbp-spmenu-left2" id="kleft_nav">-->
	<?php include("inc/sidemenuleft.php"); ?>
	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
			<h3>MES FAVORIS</h3>
			<a href="#"><img src="assets/img_menu/ico_transgourmet.png">Les commandes Transgourmet</a>
			<a href="#"><img src="assets/img_menu/ico_etat_dpae.png">Etat DPAE</a>
			<a href="#"><img src="assets/img_menu/ico_embauche.png">Fiche d'embauche</a>
			<a href="#"><img src="assets/img_menu/ico_planning.png">Les plannings</a>
	
	</nav>
	<!--<nav class="cbp-spmenu2 cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s3">
			<h3>MES TACHES</h3>
			<a href="#"><img src="assets/img_menu/ico_transgourmet.png">Les commandes Transgourmet</a>
			<a href="#"><img src="assets/img_menu/ico_etat_dpae.png">Etat DPAE</a>
			
	
	</nav>-->
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
                <input class="form-control controo" id="firstName" placeholder="" value="" required="" type="text">
                
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
 <div class="menutask">
						<ul class="menu-items">
							<li class="menu-item">
								<button class="menu-item-button">
									<i class="menu-item-icon icon icon-reply"></i>
								</button>
								<div class="menu-item-bounce"></div>
							</li>
							<li class="menu-item">
								<button class="menu-item-button">
									<i class="menu-item-icon icon icon-box"></i>
								</button>
								<div class="menu-item-bounce"></div>
							</li>
							<li class="menu-item">
								<button class="menu-item-button">
									<i class="menu-item-icon icon icon-trash"></i>
								</button>
								<div class="menu-item-bounce"></div>
							</li>
							<li class="menu-item">
								<button class="menu-item-button">
									<i class="menu-item-icon icon icon-trash"></i>
								</button>
								<div class="menu-item-bounce"></div>
							</li>
						</ul>
						<button class="menu-toggle-button">
							<i class="fa fa-plus menu-toggle-icon"></i>
						</button>
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
<script src="assets/js/TweenMax.min.js"></script>
<script src="assets/js/menu.js"></script>
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
	
	$('#interv-choose-epl').on('change',function(){
	   $("#employe").submit();
   });   
 
 //side menu toogle
var menuRight = document.getElementById( 'cbp-spmenu-s2' ),body = document.body;
   
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

//menu de gauche	 
var menuLeft = document.getElementById( 'kleft_nav' ),body = document.body;
showLeft.onclick = function() {
classie.toggle( this, 'active' );
classie.toggle( this, 'std' );
classie.toggle( menuLeft, 'cbp-spmenu-open' );				
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
//$('.glyph-icon.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-right');
//$('i.glyph-icon.icon-caret-down').removeClass('icon-caret-down').addClass('icon-caret-right');

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
//$('.glyph-icon.icon-caret-right',this).removeClass('icon-caret-right').addClass('icon-caret-down');
$( this ).toggleClass( "activeleftsub" );
}else{
$('.submenuside ').removeClass( "activeleftsub" );
//$('.glyph-icon.icon-caret-down',this).removeClass('icon-caret-down').addClass('icon-caret-right');
}


});

//$( ".submenusidesub" ).click(function() {.side_menu_left.card.open ul div li.open a.submenuside.activeleftsub ins.sfm-sm-indicator i.glyph-icon.icon-caret-down
  //$( this ).toggleClass( "activeleftsubsub" );
//});



$('#interv-choose-epl').on('change',function(){
var codemp = $('#interv-choose-epl option:selected').val()
alert(codemp);
});  

	
// Menu de droite version Alain	   
	 //$("#cbp-spmenu-s3").hide();
	 //$("#cbp-spmenu-s2").hide();
	 //$("#showRight2").hide();
	 //$("#showRight3").hide();
//$("#showRight").click(function () {
//$("#cbp-spmenu-s2").show();
//$("#cbp-spmenu-s3").hide();
//$("#showRight").hide();
//$("#showRight2").show();
		  
//});
//$("#showRight2").click(function () {
//$("#cbp-spmenu-s3").show();
//$("#cbp-spmenu-s2").hide();
//$("#showRight").hide();
//$("#showRight2").hide();
//$("#showRight3").show();

//});
//$("#showRight3").click(function () {
//$("#cbp-spmenu-s3").hide();
//$("#cbp-spmenu-s2").hide();
//$("#showRight").show();
//$("#showRight2").hide();
//$("#showRight3").hide();
//});

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