<?php if (session_id() == "") {session_start();}

$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);

include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_society.php');
?>

<div class="contentint">
    <button id="myBtnTop" title="Go to top"><i class="icon-elusive-up"></i></button>

    <div class='row search_nav'>
        <div class="block-content backgroundflitre">

            <div class="row">
                <div class="form-group row col-sm-4">
                    <div class="col-sm-12">
                        <select class="selectpicker" id="">
                            <option value="999" selected>Enseigne...</option>
                            <option value="">Choix</option>
                            <option value="">Choix</option>

                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-4">
                    <div class="col-sm-12">
                        <select class="selectpicker" id="">
                            <option value="999" selected>Type utilisateur...</option>
                            <option value="">Choix</option>
                            <option value="">Choix</option>

                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-4">
                    <div class="col-sm-12">
                        <select class="selectpicker" id="">
                            <option value="999" selected>Utilisateur...</option>
                            <option value="">Choix</option>
                            <option value="">Choix</option>

                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <span class="titlemodule" id="">Ajout des Menus pour (user_name)</span>
    <div class="row backgroundmodule">
        <div class="row col-sm-12">
            <div class="row col-sm-4" id="menu_principal_container">
                <label class="edit_menu_users">Menu principal</label>
                <ul>
                    <li>
                        <input type="checkbox" name="vehicle1" value="Bike">
                        <button type="button" class="btn btn-secondary">Info
                        <i class="icon-elusive-play"></i></button>
                    </li>

                    <li>
                        <input type="checkbox" name="vehicle1" value="Bike">
                        <button type="button" class="btn btn-secondary">Info
                        <i class="icon-elusive-play"></i></button>
                    </li>

                    <li>
                        <input type="checkbox" name="vehicle1" value="Bike">
                        <button type="button" class="btn btn-secondary">Info
                        <i class="icon-elusive-play"></i></button>
                    </li>

                    <li>
                        <input type="checkbox" name="vehicle1" value="Bike">
                        <button type="button" class="btn btn-secondary">Info
                        <i class="icon-elusive-play"></i></button>
                    </li>

                    <li>
                        <input type="checkbox" name="vehicle1" value="Bike">
                        <button type="button" class="btn btn-secondary">Info
                        <i class="icon-elusive-play"></i></button>
                    </li>

                    <li>
                        <input type="checkbox" name="vehicle1" value="Bike">
                        <button type="button" class="btn btn-secondary">Info
                        <i class="icon-elusive-play"></i></button>
                    </li>
                </ul>
            </div>

            <div class="row col-sm-4" id="sub_menu_container">
                <label class="edit_menu_users">Sous-menus</label>
            </div>

            <div class="row col-sm-4" id="menu_rubriques_container">
                <label class="edit_menu_users">Rubriques</label>
            </div>
        </div>

        <button type="button" id="teettstets" class="btn btn-info btn-lg btn-block" style="margin-top:2vh;">appliquer les filtres</button>
    </div>

</div>

<script type="text/javascript">
    $('.selectpicker').selectpicker();

</script>
