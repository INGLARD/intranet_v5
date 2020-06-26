<?php if (session_id() == "") {session_start();}

include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_society.php');
include('../inc/functions_php/functions_store.php');

$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);

?>

<div class="contentint">
    <button id="myBtnTop" title="Go to top"><i class="icon-elusive-up"></i></button>

    <div class='row search_nav'>
        <div class="block-content backgroundflitre">

            <div class="custom_switch">
                <label class="switch switch-left-right">
                    <input class="switch-input" type="checkbox" onClick="editCreateMag()">
                    <span class="switch-label" data-on="Modifier" data-off="Créer"></span><span class="switch-handle"></span>
                </label>
            </div>
            <div class="row">

                <div class="form-group row col-sm-6">
                    <label class="col-sm-2 col-form-label crt_mag_lb" for="add_mod_enseingne_select">Enseigne</label>
                    <div class="col-sm-10 crt_mag_inpt">
                        <select class="selectpicker" id="add_mod_enseingne_select" data-live-search="true" onchange="AddCreateSelectCompany1(this)">
                            <option value="999" selected>Choix Enseigne...</option>

                            <?php
                            // from functions_society.php
                            $enseigne = getSociety($dbconn2, 0);

                            foreach($enseigne as $item){
                                $society_id = $item['id'];
                                $name = $item['name'];
                                echo '<option  value="'.$society_id.'" data-name="'.$name.'">'.$name.'</option>';

                            }

                            ?>

                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-6">
                    <label class="col-sm-2 col-form-label crt_mag_lb" for="add_mod_magasin_select">Magasin</label>
                    <div class="col-sm-10 crt_mag_inpt">
                        <select class="selectpicker" id="add_mod_magasin_select" data-size="10" data-live-search="true" onchange="AddCreateSelectStore1(this)" disabled>
                            <!-- <option selected>Choix Magasin...</option> -->
                            <!-- from ajax_function_store.php -->
                            <!-- getSociety($dbconn2, $param1, $param2); values append here -->

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span class="titlemodule" id="add_mod_form_title">Créer un nouveau magasin</span>

    <form id="add_create_mag_formulaire">
        <div class="row backgroundmodule add_create_mag_form">
            <div class="col-md-12 col-lg-6" style="background-color:white;">
                <div class="form-group row">
                    <label for="add_mod_code_mag" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_code_mag" name="add_mod_code_mag" placeholder="Code magasin...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_adresse_ip" class="col-sm-2 col-form-label">Adresse IP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_adresse_ip" name="add_mod_adresse_ip" placeholder="Adresse IP...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_nom_mag" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_nom_mag" name="add_mod_nom_mag" placeholder="Nom...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_nom_global_mag" class="col-sm-2 col-form-label">Nom global</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_nom_global_mag" name="add_mod_nom_global_mag" placeholder="Nom global...">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-4">
                        <select class="selectpicker add_create_mag_select" id="add_mod_status" name="add_mod_status">
                            <option>Status...</option>
                            <?php
                            // from functions_society.php
                            $mag_status = getMag($dbconn2, 5);

                            foreach($mag_status as $item){
                                $status_id = $item['id'];
                                $status_name = $item['long_name'];

                                echo '<option  value="'.$status_id.'">'.$status_name.'</option>';
                            }

                            ?>
                        </select>
                    </div>

                    <div class="row col-sm-6">
                        <div class="col-sm-3">
                            <label class="col-form-label">Type</label>
                        </div>
                        <div class="col-sm-9  p-0">
                            <select class="selectpicker add_create_mag_select" id="add_mod_type" name="add_mod_type">
                                <option>Types...</option>
                                <?php
                                // from functions_society.php
                                $mag_types = getMag($dbconn2, 6);

                                foreach($mag_types as $item){
                                    $type_id = $item['id'];
                                    $type_name = $item['long_name'];

                                    echo '<option  value="'.$type_id.'">'.$type_name.'</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row date_select_container">
                    <label for="add_mod_opening_date_mag" class="col-sm-2 col-form-label">Date d'ouverture</label>
                    <div class="col-sm-10">
                        <p>Jour </p><select class="day_select" id="mag_open_days">
                            <option value="00">00</option>
                        </select>
                        <p>Mois </p><select class="month_select" id="mag_open_months">
                            <option value="00">00</option>
                        </select>
                        <p>Année </p><select class="year_select" id="mag_open_years">
                            <option value="00">0000</option>
                        </select>
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">

                    </div>
                </div> -->

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Manager sect.</label>
                    <div class="col-sm-10">
                        <select class="selectpicker add_create_mag_select" id="add_mod_mag_manag_sect" name="add_mod_mag_manag_sect">
                            <option>Manager de Secteur...</option>
                            <?php
                            // from functions_society.php
                            // $mag_types = getMag($dbconn2, 6);
                            //
                            // foreach($mag_types as $item){
                            //     $type_id = $item['id'];
                            //     $type_name = $item['long_name'];
                            //
                            //     echo '<option  value="'.$type_id.'">'.$type_name.'</option>';
                            // }

                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gestionnaire Paie</label>
                    <div class="col-sm-10">
                        <select class="selectpicker add_create_mag_select" id="add_mod_mag_gest_paie" name="add_mod_gest_paie">
                            <option>Gestionnaire Paie...</option>
                            <?php
                            // from functions_society.php
                            // $mag_types = getMag($dbconn2, 6);
                            //
                            // foreach($mag_types as $item){
                            //     $type_id = $item['id'];
                            //     $type_name = $item['long_name'];
                            //
                            //     echo '<option  value="'.$type_id.'">'.$type_name.'</option>';
                            // }

                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Relais métier</label>
                    <div class="col-sm-10">
                        <select class="selectpicker add_create_mag_select" id="add_mod_mag_rel_metier" name="add_mod_mag_rel_metier">
                            <option>Relais métier...</option>
                            <?php
                            // from functions_society.php
                            // $mag_types = getMag($dbconn2, 6);
                            //
                            // foreach($mag_types as $item){
                            //     $type_id = $item['id'];
                            //     $type_name = $item['long_name'];
                            //
                            //     echo '<option  value="'.$type_id.'">'.$type_name.'</option>';
                            // }

                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Resp. de magasin</label>
                    <div class="col-sm-10">
                        <select class="selectpicker add_create_mag_select" id="add_mod_mag_resp_mag" name="add_mod_mag_resp_mag">
                            <option>Responsable de magasin...</option>
                            <?php
                            // from functions_society.php
                            // $mag_types = getMag($dbconn2, 6);
                            //
                            // foreach($mag_types as $item){
                            //     $type_id = $item['id'];
                            //     $type_name = $item['long_name'];
                            //
                            //     echo '<option  value="'.$type_id.'">'.$type_name.'</option>';
                            // }

                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Caisse</label>
                    <div class="col-sm-4">
                        <select class="selectpicker add_create_mag_select" id="add_mod_cashier" name="add_mod_cashier">
                            <option>Caisse...</option>
                            <?php
                            // from functions_society.php

                            ?>
                        </select>
                    </div>

                    <div class="row col-sm-6">
                        <div class="col-sm-3">
                            <label class="col-form-label">Taux</label>
                        </div>
                        <div class="col-sm-9  p-0">
                            <select class="selectpicker add_create_mag_select" id="add_mod_rate" name="add_mod_rate">
                                <option>Taux...</option>
                                <?php
                                // from functions_society.php

                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TVA</label>
                    <div class="col-sm-10">
                        <select class="selectpicker add_create_mag_select" id="add_mod_mag_tax" name="add_mod_mag_tax">
                            <option>tva...</option>
                            <?php
                            // from functions_society.php
                            // $mag_types = getMag($dbconn2, 6);
                            //
                            // foreach($mag_types as $item){
                            //     $type_id = $item['id'];
                            //     $type_name = $item['long_name'];
                            //
                            //     echo '<option  value="'.$type_id.'">'.$type_name.'</option>';
                            // }

                            ?>
                        </select>
                    </div>
                </div>


            </div>

            <div class="col-md-12 col-lg-6" style="background-color:white;">
                <div class="form-group row">
                    <label for="add_mod_adresse_1" class="col-sm-2 col-form-label">Adresse 1</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_adresse_1" name="add_mod_adresse_1" placeholder="Adresse 1...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_adresse_2" class="col-sm-2 col-form-label">Adresse 2</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_adresse_2" name="add_mod_adresse_2" placeholder="Adresse 2...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_code_postale" class="col-sm-2 col-form-label">Code Postal</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="add_mod_code_postale" name="add_mod_code_postale" placeholder="Code Postal">
                    </div>
                    <div class="row col-sm-8">
                        <div class="col-sm-2">
                            <label for="add_mod_ville" class="col-form-label">Ville</label>
                        </div>
                        <div class="col-sm-10 p-0">
                            <input type="text" class="form-control" id="add_mod_ville" name="add_mod_ville" placeholder="Ville...">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_telephone" class="col-sm-2 col-form-label">Tel</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_telephone" name="add_mod_telephone" placeholder="Telephone...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_telephone_portable" class="col-sm-2 col-form-label">Tel portable</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_telephone_portable" name="add_mod_telephone_portable" placeholder="Telephone portable...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_fax" class="col-sm-2 col-form-label">Fax</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_fax" name="add_mod_fax" placeholder="Fax...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_modem" class="col-sm-2 col-form-label">Modem/ADSL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_modem" name="add_mod_modem" placeholder="Modem/ADSL...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="add_mod_email" name="add_mod_email" placeholder="E-mail...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_latitude" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_latitude" name="add_mod_latitude" placeholder="Latitude...">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_longitude" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_longitude" name="add_mod_longitude" placeholder="Longitude...">
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-info btn-lg btn-block" id="end_add_mod_store" onclick="addCreateMagValid()" style="margin-top: 2em">Valider la création</button>
        </div>
    </form>
</div>

<script src="./assets/js/pages/admin/add_edit_store.js" charset="utf-8"></script>
