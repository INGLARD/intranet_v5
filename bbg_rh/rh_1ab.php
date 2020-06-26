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
 $queryfactures="Select * from dry_deliveries_h_t where store_id=".$codemag." and etat >= 'A' order by order_id desc";
 $resfac=pg_query($dbconn,$queryfactures) or die("Error in connection 2: " . pg_last_error());

?>
<!-- modif du 13/12-->

<!-- <div class="secondary_nav">

    <div class="toptitleimage submenu_social"><span class="-social"></span></div>
    <h1 class="v5class">Déclaration d'embauche</h1>
</div> -->

<div class="contentint">
    <button id="myBtnTop" title="Go to top"><i class="icon-elusive-up"></i></button>

    <div class='row'>


        <div id="contentlst">
            <div class="alert alert-danger">
                <strong><i class="book-018-alert" ></i> Merci de bien remplir tous les champs de la DPAE</strong>
            </div>
            <span class="titlemodule">Civilité</span>
            <div class="block-content backgroundmodule">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Nom <span class="text-danger">*</span>: </label>
                        <input type="text" class="form-control" id="nom">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Prénom <span class="text-danger">*</span>: </label>
                        <input type="text" class="form-control" id="prenom">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Nom de jeune fille <span class="text-danger">*</span>: </label>
                        <input type="text" class="form-control" id="nomjf">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="datecommande" class="col-form-label">Date de naissance : </label>
                        <div id="sandbox-container">
                            <div class="input-group date">
                                <input type="text" class="form-control" id="datenaissance">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 alertnaissance">
                        <label for="datecommande" class="col-form-label"></label>
                        <div class="alert alert-danger minor">
                            <strong><i class="book-018-alert" ></i></strong> Le condidat est mineur
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Numéro de sécurité sociale <span class="text-danger">*</span>: </label>
                        <input type="text" class="form-control" id="numsecu">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="datecommande" class="col-form-label">Nationalité : </label>
                        <select id="type_comande" class="form-control">
                            <option value="0">Selectionnez votre nationalité <span class="text-danger">*</span></option>
                            <option value="1">Francaise</option>
                            <option value="2">Allemande</option>
                        </select>

                    </div>
                </div>
            </div>

            <span class="titlemodule">Coordonnées</span>
            <div class="block-content backgroundmodule">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Adresse : </label>
                        <input type="text" class="form-control" id="adress">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Adresse suite : </label>
                        <input type="text" class="form-control" id="adress2">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="datecommande" class="col-form-label">Région <span class="text-danger">*</span>: </label>
                        <select id="type_comande" class="form-control">
                            <option value="0">Selectionnez votre région </option>
                            <option value="1">PACA</option>
                            <option value="2">Languedoc-Roussillon</option>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Téléphone portable <span class="text-danger">*</span>: </label>
                        <input type="text" class="form-control" id="mobile">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Téléphone fixe : </label>
                        <input type="text" class="form-control" id="fix">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">E-mail <span class="text-danger">*</span>: </label>
                        <input type="text" class="form-control" id="email">
                    </div>

                </div>
            </div>

            <span class="titlemodule">Personne à prévenir en cas d'accident</span>
            <div class="block-content backgroundmodule">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Nom : </label>
                        <input type="text" class="form-control" id="nom">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Prénom : </label>
                        <input type="text" class="form-control" id="prenom">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Lien de parenté : </label>
                        <select id="type_comande" class="form-control">
                            <option value="0">Lien de parenté </option>
                            <option value="1">Mère</option>
                            <option value="2">Père</option>
                            <option value="2">Autre</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Téléphone : </label>
                        <input type="text" class="form-control" id="nomjf">
                    </div>
                </div>
            </div>
            <span class="titlemodule">Modalités du contrat</span>
            <div class="block-content backgroundmodule">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="nom" class="col-form-label">Type de contrat : </label>
                        <select id="type_comande" class="form-control">
                            <option value="0">Choisissez votre type de contrat </option>
                            <option value="1">CDI</option>
                            <option value="2">CDDR</option>
                            <option value="2">CDDA</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <a class="btn btn-success btn-lg btn-block" style="margin-bottom:30px ;color: white;">PREVISUALISER</a>




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
