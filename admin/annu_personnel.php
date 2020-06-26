<?php if (session_id() == "") {
    session_start();
}
$mycode     = $_SESSION['codeutilisateur'];
$typeuser   = $_SESSION['typeutilisateur'];
$codemag    = $_SESSION['magutilisateur'];
$codeens    = $_SESSION['codeenseigne'];
$ncenseigne = mb_strtolower($_SESSION['ncenseigneutilisateur']);
// include('../connexion.php');
// include('../connexion_postgr.php');
include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_annuaire.php');
include('../inc/functions_php/functions_user.php');

?>

<div class="contentint">
    <button id="myBtnTop" title="Go to top"><i class="icon-elusive-up"></i></button>

    <div class='row search_nav'>
        <div class="block-content backgroundflitre">
            <div class='row'>
                <div class="form-group col-md-2">
                    <select class="selectpicker" id="annuaire_form_enseigne_select"  data-live-search="true" onchange="annuaireSocietySelect(this)">
                        <option  value="999" selected>Choix Enseigne...</option>

                        <?php

                        // from functions_society.php
                        $enseigne = getAnnuaire($dbconn2, 0);

                        foreach ($enseigne as $item) {
                            $society_id = $item['id'];
                            $name       = $item['name'];
                            echo '<option  value="' . $society_id . '">' . $name . '</option>';
                        }

                        ?>

                    </select>

                </div>
                <div class="form-group col-md-2">
                    <select class="selectpicker" id="annuaire_form_mag_select" data-live-search="true" onchange="annuaireMagSelect(this)" disabled>
                        <option  value="999" selected>Choix Magasin...</option>
                        <!-- <option selected>Choix Magasin...</option> -->
                        <!-- from ajax_function_store.php -->
                        <!-- getSociety($dbconn2, $param1, $param2); values append here -->

                    </select>

                </div>
                <div class="form-group col-md-2">
                    <select class="selectpicker" id="inline_form_fonct_select" data-live-search="true" onchange="annuaireFuncSelect(this)" disabled>
                        <option  value="999" selected>Choix Fonction...</option>



                    </select>

                </div>
                <div class="form-group col-md-2">
                    <select class="selectpicker" id="inline_form_ut_select" data-live-search="true" onchange="" disabled>
                        <option  value="999" selected>Choix Utilisateur...</option>



                    </select>

                </div>





                <div class="form-group col-md-2">
                    <select class="selectpicker"  data-live-search="true"  disabled>
                        <option  value="999" selected>Statut</option>
                        <option  value="1">Actif</option>
                        <option  value="2" >Inactif</option>
                    </select>

                </div>
            </div>
            <div style="margin-top: 1em;">
                <button type="button" id="testButton" class="btn btn-info btn-lg btn-block">Rechercher</button>
            </div>
        </div>
    </div>
    <div class='row'>
        <div id="contentlst">




            <table  class="table table-striped datatable display table-bordered js-dataTable-simple3c annuaire" style="width:100%" id="annuaire">
                <thead>
                    <tr>
                        <th class="sorting">Code</th>
                        <th class="sorting">Nom</th>
                        <th class="sorting">Prénom</th>
                        <th class="sorting">Fonction</th>
                        <th class="sorting">Magasin de rattachement</th>
                        <th class="sorting">Identifiants</th>
                        <th class="sorting">Mot de passe</th>
                        <th class="sorting">Statut</th>
                        <th class="sorting">Date entrée</th>
                        <th class="sorting">Date début sommeil</th>
                        <th></th>

                    </thead>
                        <tbody>
                        <?php
                        $user = getUser($dbconn2, 0);

                        foreach ($user as $us) {
                            $iduser= $us['id'];
                            $loguser= $us['login'];
                            $mdpuser= $us['passw'];
                            $statutuser= $us['active'];

                            echo '<tr>';
                            echo '<td data-order="">' .$iduser . '</td>';
                            echo '<td>Nom</td>';
                            echo '<td>Prénom</td>';
                            echo '<td>Fonction</td>';
                            echo '<td>Magasin</td>';
                            echo '<td>' .$loguser.'</td>';
                            echo '<td>' .$mdpuser.'</td>';
                            echo '<td>'.$statutuser.'</td>';
                            echo '<td>Date entrée</td>';
                            echo '<td>Date début sommeil</td>';
                            echo '<td>
                                    <a href="#" class="dotn1" data-toggle="tooltip" data-placement="left" title="Guillaume Breton"></a>';
                                    echo '<a href="#" class="dotmag" data-toggle="tooltip" data-placement="left" data-html="true"
                                    title="<h5>Magasins</h5><ul>
                                    <li>Bollene - 5001</li>
                                    <li>Carcassone - 5002</li>
                                    </ul>"></a>';
                                    echo '<a href="#" id="'.$iduser.'" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="icon-datacon-vision annuaire" ></i></a></td>';

                            echo '</tr>';
                        }
                            // for ($i = 1; $i <= 11; $i++) {
                            //
                            //     echo '<tr>';
                            //         echo '<td data-order="">' . $i . '</td>';
                            //         echo '<td>Nom</td>';
                            //         echo '<td>Prénom</td>';
                            //         echo '<td>Fonction</td>';
                            //         echo '<td>Magasin de rattachement</td>';
                            //         echo '<td>Identifiants</td>';
                            //         echo '<td>Mot de passe</td>';
                            //         echo '<td><span class="dotactif"></span>Actif</td>';
                            //         echo '<td>Date entrée</td>';
                            //         echo '<td>Date début sommeil</td>';
                            //    echo '<td> <span class="dotn1"><i class="icon-elusive-user annuaire" ></i></span> <span class="dotmag"><i class="icon-datacon-store annuaire" ></i></span> <i class="icon-datacon-vision" ></i></td>';
                            //         echo '<td> <a href="#" class="dotn1" data-toggle="tooltip" data-placement="left" title="Guillaume Breton"></a>';
                            //         echo '<a href="#" class="dotmag" data-toggle="tooltip" data-placement="left" data-html="true"
                            //         title="<h5>Magasins</h5><ul>
                            //         <li>Bollene - 5001</li>
                            //         <li>Carcassone - 5002</li>
                            //         </ul>"></a>';
                            //         echo '<a href="#" id="'.$i.'" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="icon-datacon-vision annuaire" ></i></a></td>';
                            //     echo '</tr>';
                            //     }
                                    ?>
                                </tbody>
                                </table>

                            </div>
                        </div>
                        <!--  MODALE-->

                        <!-- modal Informations sur la personne -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content modalcontent">
                                    <div class="container modal-header">
                                        <!--
                                        <h2 class="modale">BOUIS Stephanie</h2>
                                        <h4 class="modalefonc">MANAGER DE MAGASIN</h4> -->
                                        <div class="row">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-1"><span class="modalphoto"><i class="icon-elusive-user modale" ></i></span></div>
                                            <div class="col-sm-7 modale"><h3 class="modale">BOUIS Stephanie - Manager de magasin</h3></div>
                                            <div class="col-sm-4"><h5 class="modale-right">BBG : BOLLENE - 5001</h5>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 modaledivleft">
                                                <div class="modalinfos">
                                                    <h4>Infos personelles :</h4>
                                                    <h5><i class="icon-elusive-phone modaleicon" ></i>Fixe personel : </h5>
                                                    <span class="modalicontext">04 90 56 90 59 </span>
                                                    <h5><i class="collectionicons2-smartphone-call modaleicon" ></i>Mobile personel :</h5>
                                                    <span class="modalicontext">04 90 56 90 59</span>
                                                    <h5><i class="icon-elusive-address-book modaleicon" ></i>Adresse personelle :</h5>
                                                    <span class="modalicontext">04 90 56 90 59</span>
                                                        rue de la boulangerie 84611 BOLLENE
                                                    </span>
                                                    <h5><i class="icon-elusive-mail modaleicon" ></i>E-mail :  </h5>
                                                    <span class="modalicontext">perso@gmail.com</span>
                                                    <h5><i class="icon-elusive-calendar modaleicon" ></i>Date de naissance : </h5>
                                                    <span class="modalicontext"> 02/12/1971</span>
                                                    <h5><i class="collectionicons2-location modaleicon" ></i>Lieu de naissance : </h5>
                                                    <span class="modalicontext">Orange (France)</span>
                                                    <h5><i class="medical-stethoscope modaleicon" ></i>Numéro de sécurité sociale :</h5>
                                                    <span class="modalicontext">2 71 45 644 045 64</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 modaledivright">
                                                <div class="modalinfos">
                                                    <h4>Contrat :</h4>
                                                    <h5><i class="medical-stethoscope modaleicon" ></i>Type de contrat :</h5>
                                                    <span class="modalicontext">CDI </span>
                                                    <h5><i class="icon-elusive-calendar modaleicon" ></i>Date du début de contrat : </h5>
                                                    <span class="modalicontext"> 02/01/2005</span>
                                                    <h5><i class="icon-elusive-calendar modaleicon" ></i>Temps : </h5>
                                                    <span class="modalicontext"> 35H</span>
                                                </div>
                                                <div class="modalinfos">
                                                    <h4>En cas d'urgence :</h4>

                                                    <h5><i class="icon-elusive-user modaleicon" ></i> Personne à contacter :</h5>
                                                    <span class="modalicontext">Dupont Chantal - Mère </span>
                                                    <h5><i class="collectionicons2-smartphone-call modaleicon" ></i>Mobile :</h5>
                                                    <span class="modalicontext">06 75 45 88 88 </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                        <button type="button" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div>
                        </div>

                        <script src="./assets/js/pages/admin/annu_personnel.js" charset="utf-8"></script>
