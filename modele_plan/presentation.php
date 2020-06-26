<?php if (session_id() == "") {session_start();}
include('../connexion.php');
include('../connexion_postgr.php');
$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);

$dateactu=date('d/m/Y');
setlocale(LC_TIME, "fr_FR");
?>
<!--  NAV LEFT <nav class="cbp-spmenu-s2 cbp-spmenu cbp-spmenu-bkg cbp-spmenu-vertical2 cbp-spmenu-left2" id="kleft_nav">-->


<?php
// echo  $queryfactures="Select * from dry_deliveries_h_t where store_id=".$codemag." and etat >= 'A' order by order_id desc";
//  $resfac=pg_query($dbconn,$queryfactures) or die("Error in connection 2: " . pg_last_error());
//  if (pg_num_rows($resfac) > 0){
//
//
//  	while ($data=pg_fetch_array($resfac)){
//  		$name= $data['supplier_id'];
//  	}
//
//
//  }
// ?>
<!-- modif du 13/12-->

<!-- <div class="secondary_nav">

    <div class="toptitleimage submenu_social"><span class="-social"></span></div>
    <h1 class="v5class">Déclaration d'embauche</h1>
</div> -->

<div class="contentint">
    <button id="myBtnTop" title="Go to top"><i class="icon-elusive-up"></i></button>

    <div class='row'>


          <div id="contenpresentation">
            <p class="internp">la création de modèle de planning a été créé pour vous aider à définir des typologies de planning en fonction de la récurrence des horaires et des fonctions Ventes ou Production.  </p>
            <p class="internp">les modèles de planning pourront être appliqué lors de la saisie des Plannings Prévisionnel pour chaque employés en fonction de son contrat de travail.</p>
            <h2 class="pres">Présentation des étapes de création d'un modèle :<?php echo $name;?></h2>

            <div class='row'>
              <div class="col-md-4"><img src="assets/img/image_planning.png" class="img-fluid image" alt="Responsive image"></div>
              <div class="col-md-6">
                <h3 class="pres">1- En vous connectant vous devez remplir les paramètres de votre nouveau modèle</h3>
                <h4 class="pres">1 - 1 Votre nouveau modèle.</h4>

                <p class="pres">
                1- En vous connectant vous devez remplir les paramètres de votre <bold>nouveau modèle</bold>.
                </p>
                <p class="pres">
                2- Les informations qui vous sont demandées concerne  <bold>le temps de travail </bold> et le type d'équipe (Vente ou Production).
                Ensuite un titre vous sera proposé par défaut.
                Mais c'est à vous d' inscrire un titre significatif (exemple : Boulanger matin 35h)...
                </p>
                <p class="pres">
                3- Il ne vous restera plus qu'a remplir le planning et à le <bold>sauvegarder</bold> en cliquant sur enregistrer en bas de page.
                </p>
                <ul class="pres">
                  <li>Un clic sur le bouton Modifier vous enverra sur une page   </li>
                  <li>prérempli ou vous pourrez modifier les données horaires et    </li>
                  <li>titre du planning mais pas le type d'équipe ni le volume horaire.    </li>
                </ul>
                <blockquote class="pres">
                  La création de modèle de planning a été créé pour vous aider à définir des typologies de planning en fonction de la récurrence des horaires et des fonctions Ventes ou Production.
                  les modèles de planning pourront être appliqué lors de la saisie des Plannings Prévisionnel pour chaque employés en fonction de son contrat de travail.
                </blockquote>

              <a class="btn btn-info">INFOS</a>

            </div>
          </div>


        </div>

    </div>



    <script>
        $(document).ready(function() {
            $('.alertnaissance').hide();
            $('#sandbox-container .input-group.date').datepicker({
                language: 'fr',

            });

            $("#datenaissance").change(function() {
                var age=$("#datenaissance").val();

            });

        } );
    </script>
