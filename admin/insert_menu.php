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
                    <div class="col-sm-10">
                        <select class="selectpicker" id="">
                            <option value="999" selected>Menu principal...</option>
                            <option value="">Choix</option>
                            <option value="">Choix</option>

                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-4">
                    <div class="col-sm-10">
                        <select class="selectpicker" id="">
                            <option value="999" selected>Sous-menus...</option>
                            <option value="">Choix</option>
                            <option value="">Choix</option>

                        </select>
                    </div>
                </div>

                <div class="form-group row col-sm-4">
                    <div class="col-sm-10">
                        <select class="selectpicker" id="">
                            <option value="999" selected>Rubriques...</option>
                            <option value="">Choix</option>
                            <option value="">Choix</option>

                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-info btn-lg btn-block" type="button" name="button" style="margin-top:2vh;">Modifier</button>
        </div>

    </div>

    <span class="titlemodule" id="add_mod_form_title">Menus</span>
    <div class="row backgroundmodule menus_edit_table">
        <div class="row" id="edit_menu_tb_container">
            <table id="menu_submenus_table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <th>Column 2</th>
                        <th>Column 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>tutu</td>
                        <td>Row 1 Data 2</td>
                        <td><button type="button" name="button">toto</button></td>
                        <td><button type="button" name="button">toto</button></td>
                    </tr>
                    <tr>
                        <td>titi</td>
                        <td>Row 2 Data 2</td>
                        <td><button type="button" name="button">toto</button></td>
                        <td><button type="button" name="button">toto</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script type="text/javascript">
    $('.selectpicker').selectpicker();

    $('#menu_submenus_table').DataTable({
        "language": {
            "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
            "search" :   "Rechercher&nbsp;:",
            "info":           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            "infoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "paginate": {
                "previous": "Page précédente",
                "next": "Suivant",
                "last":"Dernier"

            },
            "aria": {
                "sortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sortDescending": ": activer pour trier la colonne par ordre décroissant"
            }
        },
    });
</script>
