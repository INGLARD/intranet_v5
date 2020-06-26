<?php if (session_id() == "") {session_start();}
include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_society.php');
include('../inc/functions_php/functions_user.php');

$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);

$dateactu=date('d/m/Y');
setlocale(LC_TIME, "fr_FR");

?>

<div class="contentint">
    <button id="myBtnTop" title="Go to top"><i class="icon-elusive-up"></i></button>

    <div class='row search_nav'>
        <div class="row block-content backgroundflitre">

            <div class="form-group row col-sm-12 col-md-4">
                <label class="col-sm-2 col-form-label" for="usertomag_typeuser_select">Type:</label>
                <div class="col-sm-10">
                    <select class="custom-select" id="usertomag_typeuser_select" onchange="toptototottto(this)">
                        <option  value="999" selected>type d'utilisateur...</option>
                        <option  value="">boss</option>
                        <option  value="">boss</option>
                        <option  value="">boss</option>
                        <option  value="">boss</option>
                        <option  value="">boss</option>

                        <!-- <?php
                        // from functions_user.php
                        // $type_user = getUserType(PDO $dbconn2, 0);
                        //
                        // foreach($type_user as $item){
                        //     $id = $item['id'];
                        //     $name = $item['name'];
                        //     echo '<option  value="'.$id.'">'.$name.'</option>';
                        //
                        // }

                        ?> -->

                    </select>
                </div>
            </div>

            <div class="form-group row col-sm-12 col-md-4">
                <label class="col-sm-2 col-form-label" for="usertomag_form_enseingne_select">Enseigne:</label>
                <div class="col-sm-10">
                    <select class="custom-select" id="usertomag_form_enseingne_select" onchange="ypyoyyoo(this)">
                        <option  value="999" selected>Choix enseigne...</option>

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

            <div class="form-group row col-sm-12 col-md-4">
                <label class="col-sm-2 col-form-label" for="usertomag_user_select">Utilisateur:</label>
                <div class="col-sm-10">
                    <select class="custom-select" id="usertomag_user_select" onchange="toptototottto(this)">
                        <option  value="999" selected>type d'utilisateur...</option>
                        <option  value="">toto</option>
                        <option  value="">toto</option>
                        <option  value="">toto</option>
                        <option  value="">toto</option>
                        <option  value="">toto</option>

                        <!-- <?php
                        // from functions_user.php
                        // $type_user = getUserType(PDO $dbconn2, 0);
                        //
                        // foreach($type_user as $item){
                        //     $id = $item['id'];
                        //     $name = $item['name'];
                        //     echo '<option  value="'.$id.'">'.$name.'</option>';
                        //
                        // }

                        ?> -->

                    </select>
                </div>
            </div>

            <div style="margin-top: 2em; width: 100%;">
                <button type="button" id="teettstets" class="btn btn-info btn-lg btn-block">appliquer les filtres</button>
            </div>
        </div>
    </div>
    <div class="row block-content backgroundmodule">
        <div class="row col-sm-12 col-md-6" id="users_table">
            <table id="user_to_mag" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>$86,000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row col-sm-12 col-md-6">
            <div class="row col-sm-12" id="store_table1">
                <table id="user_mags_info1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>short_name</th>
                            <th>name</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>

            <div class="row col-sm-12" id="store_table2">
                <table id="user_mags_info2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>short_name</th>
                            <th>name</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>

<script type="text/javascript">

// "paging":   false,
// "pageLength": 5,
// "ordering": false,
// "info":     false
// "searching": false

$(document).ready(function() {
    var data = <?php getSociety($dbconn2, 2); ?>;

    $('#user_to_mag').DataTable({
        "columnDefs": [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        "select": {
            style:    'os',
        },
        order: [[ 1, 'asc' ]],

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

    $('#user_mags_info1').DataTable({
        "processing": true,

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
        "ajax": {
            "url": "./ajax/ajax_functions_society.php?param1=2",
            "dataSrc": ""
        },
        "columns": [
        { "data": "id" },
        { "data": "short_name" },
        { "data": "name" }]

    });

    $('#user_mags_info2').DataTable({
        "processing": true,
        
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
        "ajax": {
            "url": "./ajax/ajax_functions_society.php?param1=2",
            "dataSrc": ""
        },
        "columns": [
        { "data": "id" },
        { "data": "short_name" },
        { "data": "name" }]

    });

});

</script>
