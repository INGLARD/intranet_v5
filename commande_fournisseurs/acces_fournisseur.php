<?php if (session_id() == "") {session_start();}

$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);
$dateactu=date('d/m/Y');
setlocale(LC_TIME, "fr_FR");
?>
<!--  NAV LEFT <nav class="cbp-spmenu-s2 cbp-spmenu cbp-spmenu-bkg cbp-spmenu-vertical2 cbp-spmenu-left2" id="kleft_nav">-->

<div class="secondary_nav">
    <nav aria-label="breadcrumb" class="breadcrumb">
        <ol class="breadcrumbnav">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item"><a href="#">Boulangerie</a></li>
            <li class="breadcrumb-item active" aria-current="page">Accéder sites de commande</li>
        </ol>
    </nav>
    <div class="toptitleimage submenu_boul"><span class="-boul"></span></div>
    <h1 class="v5class">Accéder sites de commande</h1>
</div>


<div class="row justify-content-md-left">
    <h2><i class="collectionicons2-interview" style="padding-right: 10px;"></i>TOTO</h2>
    <div class="table-responsive">

        <form id="employe" method='post' >

            <select class="custom-select d-block w-100" id="interv-choose-epl" required="">

                <option value="">Choisissez votre employé</option>

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
