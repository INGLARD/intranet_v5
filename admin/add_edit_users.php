<?php if (session_id() == "") {session_start();}

include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_society.php');
include('../inc/functions_php/functions_user.php');

$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);

?>

<div class="contentint" onscroll="onScrollContentint()">
    <button id="myBtnTop" title="Go to top"><i class="icon-elusive-up"></i></button>

    <div class='row search_nav'>
        <div class="block-content backgroundflitre">

            <div class="add_mod_user_switch">
                <label class="switch switch-left-right">
                    <input class="switch-input" type="checkbox" onClick="editCreateUser()">
                    <span class="switch-label" data-on="Modifier" data-off="Créer"></span><span class="switch-handle"></span>
                </label>
            </div>

            <div class="users_livesearch_container">
                <input class="users_livesearch_input" type="text" placeholder="Rechercher dans tous les utilisateurs..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Rechercher dans tous les utilisateurs...'" onkeyup="addEditUsersLivesearch(this)">
                <div class="users_livesearch_results">
                    <ul>

                    </ul>
                </div>
            </div>
            <div class="row">

                <div class="form-group row col-sm-3">
                    <div class="col-sm-12 crt_usr_inpt">
                        <select class="selectpicker" id="add_mod_enseingneUser_select" onchange="editCreateUserSociety(this)">
                            <option value="N" selected>Enseigne...</option>
                            <?php
                            // from functions_society.php
                            $enseigne = getSociety($dbconn2, 0);

                            foreach($enseigne as $item){
                                $society_id = $item['id'];
                                $name = $item['name'];
                                echo '<option  value="'.$society_id.'">'.$name.'</option>';
                            }

                            ?>

                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-3">
                    <div class="col-sm-12 crt_usr_inpt">
                        <select class="selectpicker" id="add_mod_typeUser_select" onchange="editCreateUserType(this)" disabled>
                            <option value="N" selected>Typologie...</option>

                        </select>
                    </div>
                </div>

                <!-- <div class="form-group row col-sm-3">
                    <div class="col-sm-12 crt_usr_inpt">
                        <select class="selectpicker" id="add_mod_functionUser_select" data-size="10" data-live-search="true" onchange="editCreateUserFunction(this)" disabled>
                            <option value="N" selected>Fonction...</option>
                        </select>
                    </div>
                </div> -->

                <div class="form-group row col-sm-3">
                    <div class="col-sm-12 crt_mag_inpt">
                        <select class="selectpicker" id="add_mod_magUser_select" data-size="10" data-live-search="true" onchange="editCreateUserStore(this)" disabled>
                            <option value="N" selected>Magasin...</option>

                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-3">
                    <div class="col-sm-12 crt_usr_inpt">
                        <select class="selectpicker" id="add_mod_user_select" data-size="10" data-live-search="true" onchange="" disabled>
                            <option value="N" selected>Utilisateur...</option>

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span class="titlemodule" id="add_mod_user_form_title">Créer un nouvelle utilisateur</span>

    <form id="add_create_user_formulaire">
        <div class="row backgroundmodule add_createuser_form">

            <div class="col-md-12 col-lg-6">
                <div class="row col-sm-12 add_createuser_info">
                    <div class="col-sm-2">
                        <i class="glyph-icon icon-iconic-user"></i>
                    </div>

                    <div class="col-sm-10">
                        <div class="form-group row" id="add_mod_user_nom_container">
                            <label for="add_mod_user_nom" id="add_mod_user_nom_label" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10" id="add_mod_user_nom_input_container">
                                <input type="text" class="form-control" id="add_mod_user_nom" name="add_mod_user_nom" placeholder="Nom...">
                            </div>
                        </div>

                        <div class="form-group row" id="add_mod_user_prenom_container">
                            <label for="add_mod_user_prenom" id="add_mod_user_prenom_label" class="col-sm-2 col-form-label">Prénom</label>
                            <div class="col-sm-10" id="add_mod_user_prenom_input_container">
                                <input type="text" class="form-control" id="add_mod_user_prenom" name="add_mod_user_prenom" placeholder="Prénom...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="add_mod_user_maidename" class="col-sm-2 col-form-label">Nom de jeune fille</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_user_maidename" name="add_mod_user_maidename" placeholder="Nom de jeune fille...">
                    </div>
                </div>

                <div class="form-group row" id="add_mod_user_civilite_select">
                    <label for="add_mod_user_civilite" class="col-sm-2 col-form-label">Civilité</label>
                    <div class="col-sm-10">
                        <select class="selectpicker" id="add_mod_user_civilite" disabled>
                            <option value="" selected>Civilité...</option>

                            <?php
                            // from functions_user.php
                            $user_civility = getUser($dbconn2, 5);

                            foreach($user_civility as $item){
                                $civility_id = $item['id'];
                                $name = $item['name'];
                                echo '<option  value="'.$civility_id.'">'.$name.'</option>';
                            }

                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row date_select_container">
                    <label for="add_mod_user_birthday" class="col-sm-2 col-form-label">Date de naissance</label>
                    <div class="col-sm-10">
                        <p>Jour </p><select class="day_select" id="user_birth_days">
                            <option value="">00</option>
                        </select>
                        <p>Mois </p><select class="month_select" id="user_birth_months">
                            <option value="">00</option>
                        </select>
                        <p>Année </p><select class="year_select" id="user_birth_years">
                            <option value="">0000</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="col-md-12 col-lg-6">
                <div class="form-group row col-sm-12">
                    <label for="add_mod_user_login" class="col-sm-2 col-form-label">Login</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_user_login" name="add_mod_user_login" placeholder="Login...">
                    </div>
                </div>

                <div class="form-group row col-sm-12">
                    <label for="add_mod_user_password" class="col-sm-2 col-form-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_user_password" name="add_mod_user_password" placeholder="Mot de passe...">
                    </div>
                </div>

                <div class="form-group row col-sm-12">
                    <label for="add_mod_user_cp" class="col-sm-2 col-form-label">Accès Intranet</label>
                    <div class="col-sm-10 pt-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="add_mod_user_autorisation" id="user_int_access1" value="option1">
                            <label class="form-check-label" for="user_int_access1">Accès autorisé</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="add_mod_user_autorisation" id="user_int_access2" value="option2">
                            <label class="form-check-label" for="user_int_access2">Accès non autorisé</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row col-sm-12 user_pass_type_container">
                    <label for="add_mod_user_pass_type" class="col-sm-2 col-form-label">Nouveau mdp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_mod_user_pass_type" name="add_mod_user_pass_type" placeholder="Nouveau mdp...">
                    </div>
                </div>

                <div class="form-group row col-sm-12">
                    <label id="add_mod_user_active_status" class="col-sm-2 col-form-label">Inactive</label>
                    <div class="col-sm-10">
                        <label class="switch_user_active">
                            <input class="switch_user_active_input" type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 add_mod_user_tab_container">
                <div class="add_mod_user_tab">
                    <button type="button" class="user_subform active" onclick="openSubForm(event, 'user_access_form')">
                        <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <h4>Info Secu.</h4>
                    </button>

                    <button type="button" class="user_subform" onclick="openSubForm(event, 'user_contrat_form')">
                        <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <h4>Contrat</h4>
                    </button>

                    <button type="button" class="user_subform" onclick="openSubForm(event, 'user_coffre_form')">
                        <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <h4>Coffre</h4>
                    </button>

                    <button type="button" class="user_subform" onclick="openSubForm(event, 'user_coords_form')">
                        <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <h4>Coordonnées personnelles</h4>
                    </button>

                    <button type="button" class="user_subform user_abs_duration_container" onclick="openSubForm(event, 'user_absence_form')">
                        <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <h4>Absence longue durée</h4>
                    </button>

                    <button type="button" class="user_subform" onclick="openSubForm(event, 'user_emergency_coords_form')">
                        <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <h4>Appel en cas d'urgence</h4>
                    </button>
                </div>

                <!-- ________________________________________________________________SUBFORM SEPARATOR________________________________________________________________ -->
                <div id="user_access_form" class="tabcontent" style="display:block;">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label for="add_mod_user_secu_type" class="col-sm-2 col-form-label">N° secu. sociale parents</label>
                                <div class="col-sm-10 pt-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="add_mod_user_p_secu_type" id="user_secu_parent_type1" value="option1" checked>
                                        <label class="form-check-label" for="user_secu_parent_type1">Non</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="add_mod_user_p_secu_type" id="user_secu_parent_type2" value="option2">
                                        <label class="form-check-label" for="user_secu_parent_type2">Oui</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="add_mod_user_secu" class="col-sm-2 col-form-label">N° sécurité sociale</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="add_mod_user_secu" name="add_mod_user_secu" placeholder="N° sécurité sociale...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ________________________________________________________________SUBFORM SEPARATOR________________________________________________________________ -->
                <div id="user_contrat_form" class="tabcontent">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_contractT" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_contractT" name="add_mod_user_contractT" placeholder="Nom...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_contractH" class="col-sm-2 col-form-label">Heures</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_contractH" name="add_mod_user_contractH" placeholder="Prénom...">
                                </div>
                            </div>

                            <div class="form-group row date_select_container">
                                <label id="add_mod_user_birthday" class="col-sm-2 col-form-label">Date début</label>
                                <div class="col-sm-10">
                                    <p>Jour </p><select class="day_select" id="user_ct_start_days">
                                        <option value="">00</option>
                                    </select>
                                    <p>Mois </p><select class="month_select" id="user_ct_start_months">
                                        <option value="">00</option>
                                    </select>
                                    <p>Année </p><select class="year_select" id="user_ct_start_years">
                                        <option value="">0000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row date_select_container">
                                <label id="add_mod_user_birthday" class="col-sm-2 col-form-label">Date fin</label>
                                <div class="col-sm-10">
                                    <p>Jour </p><select class="day_select" id="user_ct_end_days">
                                        <option value="">00</option>
                                    </select>
                                    <p>Mois </p><select class="month_select" id="user_ct_end_months">
                                        <option value="">00</option>
                                    </select>
                                    <p>Année </p><select class="year_select" id="user_ct_end_years">
                                        <option value="">0000</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_mt_sage" class="col-sm-2 col-form-label">Matricule sage</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_mt_sage" name="add_mod_user_mt_sage" placeholder="Matricule sage...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ________________________________________________________________SUBFORM SEPARATOR________________________________________________________________ -->
                <div id="user_coffre_form" class="tabcontent">
                    <div class="row col-sm-6">
                        <div class="form-group row col-sm-12">
                            <label for="add_mod_user_coffre" class="col-sm-3 col-form-label">Numero coffre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="add_mod_user_coffre" name="add_mod_user_coffre" placeholder="Numero coffre...">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ________________________________________________________________SUBFORM SEPARATOR________________________________________________________________ -->
                <div id="user_coords_form" class="tabcontent">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_addr1" class="col-sm-2 col-form-label">Address 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_addr1" name="add_mod_user_addr1" placeholder="Address 1...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_addr2" class="col-sm-2 col-form-label">Address 2</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_addr2" name="add_mod_user_addr2" placeholder="Address 2...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_cp" class="col-sm-2 col-form-label">Code Postal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_cp" name="add_mod_user_cp" placeholder="Code Postal...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_ville" class="col-sm-2 col-form-label">Ville</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_ville" name="add_mod_user_ville" placeholder="Ville...">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_tel" class="col-sm-2 col-form-label">Tel.</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_tel" name="add_mod_user_tel" placeholder="Tel...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_portable" class="col-sm-2 col-form-label">Tel. portable</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_portable" name="add_mod_user_portable" placeholder="Portable...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_mail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_mail" name="add_mod_user_mail" placeholder="Portable...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ________________________________________________________________SUBFORM SEPARATOR________________________________________________________________ -->
                <div id="user_absence_form" class="tabcontent">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <h4>Absence 1</h4>

                            <div class="form-group row date_select_container">
                                <label id="add_mod_user_abs1_start" class="col-sm-2 col-form-label">Date début</label>
                                <div class="col-sm-10">
                                    <p>Jour </p><select class="day_select" id="user_abs1_start_days">
                                        <option value="">00</option>
                                    </select>
                                    <p>Mois </p><select class="month_select" id="user_abs1_start_months">
                                        <option value="">00</option>
                                    </select>
                                    <p>Année </p><select class="year_select" id="user_abs1_start_years">
                                        <option value="">0000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row date_select_container">
                                <label id="add_mod_user_abs1_end" class="col-sm-2 col-form-label">Date fin</label>
                                <div class="col-sm-10">
                                    <p>Jour </p><select class="day_select" id="user_abs1_end_days">
                                        <option value="">00</option>
                                    </select>
                                    <p>Mois </p><select class="month_select" id="user_abs1_end_months">
                                        <option value="">00</option>
                                    </select>
                                    <p>Année </p><select class="year_select" id="user_abs1_end_years">
                                        <option value="">0000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_abs_type1" class="col-sm-2 col-form-label">Motif</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_abs_type1" name="add_mod_user_abs_type1" placeholder="motif...">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <h4>Absence 2</h4>

                            <div class="form-group row date_select_container">
                                <label id="add_mod_user_abs2_start" class="col-sm-2 col-form-label">Date début</label>
                                <div class="col-sm-10">
                                    <p>Jour </p><select class="day_select" id="user_abs2_start_days">
                                        <option value="">00</option>
                                    </select>
                                    <p>Mois </p><select class="month_select" id="user_abs2_start_months">
                                        <option value="">00</option>
                                    </select>
                                    <p>Année </p><select class="year_select" id="user_abs2_start_years">
                                        <option value="">0000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row date_select_container">
                                <label id="add_mod_user_abs2_end" class="col-sm-2 col-form-label">Date fin</label>
                                <div class="col-sm-10">
                                    <p>Jour </p><select class="day_select" id="user_abs2_end_days">
                                        <option value="">00</option>
                                    </select>
                                    <p>Mois </p><select class="month_select" id="user_abs2_end_months">
                                        <option value="">00</option>
                                    </select>
                                    <p>Année </p><select class="year_select" id="user_abs2_end_years">
                                        <option value="">0000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_user_abs_type2" class="col-sm-2 col-form-label">Motif</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_user_abs_type2" name="add_mod_user_abs_type2" placeholder="motif...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ________________________________________________________________SUBFORM SEPARATOR________________________________________________________________ -->
                <div id="user_emergency_coords_form" class="tabcontent">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <h4>Contact principal</h4>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_nom" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_nom" name="add_mod_contact_nom" placeholder="Nom contact...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_prenom" class="col-sm-2 col-form-label">Prénom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_prenom" name="add_mod_contact_prenom" placeholder="Nom prénom...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_kindship" class="col-sm-2 col-form-label">Lien de parenté</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_kindship" name="add_mod_contact_kindship" placeholder="Nom prénom...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_mobilephone" class="col-sm-2 col-form-label">Tel. portable</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_mobilephone" name="add_mod_contact_mobilephone" placeholder="Tel. portable...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_phone" class="col-sm-2 col-form-label">Téléphone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_phone" name="add_mod_contact_phone" placeholder="Téléphone...">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <h4>Contact secondaire</h4>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_nom2" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_nom2" name="add_mod_contact_nom2" placeholder="Nom contact...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_prenom2" class="col-sm-2 col-form-label">Prénom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_prenom2" name="add_mod_contact_prenom2" placeholder="Nom prénom...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_kindship2" class="col-sm-2 col-form-label">Lien de parenté</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_kindship2" name="add_mod_contact_kindship2" placeholder="Nom prénom...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_mobilephone2" class="col-sm-2 col-form-label">Tel. portable</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_mobilephone2" name="add_mod_contact_mobilephone2" placeholder="Tel. portable...">
                                </div>
                            </div>

                            <div class="form-group row col-sm-12">
                                <label for="add_mod_contact_phone2" class="col-sm-2 col-form-label">Téléphone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add_mod_contact_phone2" name="add_mod_contact_phone2" placeholder="Téléphone...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" id="end_add_mod_user" class="btn btn-info btn-lg btn-block" style="margin-top: 1em">Valider la création</button>
        </div>

    </form>
</div>

<script src="./assets/js/pages/admin/add_edit_users.js" charset="utf-8"></script>
