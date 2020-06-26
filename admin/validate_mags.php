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
    <span class="titlemodule" id="validate_mags">Magasins en attente de validation</span>

    <div class="row backgroundmodule">
        <div class="row col-sm-12" id="store_table2">
            <table id="mags_to_validate" class="table table-striped table-bordered" data-page-length="15">
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>nom</th>
                    </tr>
                </thead>
                <tbody>
                    <td></td>

                </tbody>
            </table>

        </div>

        <button type="button" class="btn btn-info btn-lg btn-block" id="end_add_mod_store" onclick="addCreateMagValid()" style="margin-top: 2em">Valider la création</button>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

    $("#mags_to_validate").DataTable({
        "processing": true,
        "columnDefs": [ {
            "orderable": false,
            "className": 'select-checkbox',
            "targets":   0
        } ],
        "select": {
            "style":    'multi',
            "selector": 'td:first-child'
        },
        "order": [[ 1, 'asc' ]],
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
            "url": "./ajax/ajax_function_store_json.php?param1=2",
            "dataSrc": ""
        },
        "columns": [
            { "defaultContent": "" },
            { "data": "id" },
            { "data": "name" }]

        });
});


</script>
