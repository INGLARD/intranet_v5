function annuaireSocietySelect(idsoc) {
    var id_society = idsoc.value;


    $.ajax({
        type: 'GET',
        url: './ajax/ajax_function_annuaire_json.php',
        data: 'param1=1' + '&param2='+id_society,
        dataType: 'json',
        success: function(data) {



            $("#annuaire_form_mag_select").prop('disabled', false);

            $("#annuaire_form_mag_select").html('<option value="00">Choix magasin...</option>');

            $.each(data, function(index, element) {
                $("#annuaire_form_mag_select").append('<option  value="'+ element.id +'">'+ element.id +' - '+ element.name +'</option>');
            });

            $('#annuaire_form_mag_select').selectpicker('refresh');
            $('#annuaire_form_enseigne_select').selectpicker('refresh');
        }
    });


        $.ajax({
           type: 'GET',
           url: './ajax/ajax_function_annuaire_json.php',
           data: 'param1=2' + '&param2='+id_society,
           dataType: 'json',
           success: function(data) {
               $("#inline_form_fonct_select").prop('disabled', false);

               $("#inline_form_fonct_select").html('<option value="00">Choix Fonction...</option>');

               $.each(data, function(index, element) {
                   $("#inline_form_fonct_select").append('<option  value="'+ element.id +'">'+ element.name +'</option>');
               });

               $('#inline_form_fonct_select').selectpicker('refresh');
           }

       });


    //
    //
        $.ajax({
            type: 'GET',
            url: './ajax/ajax_utilisateurs_annuaire_json.php',
            data: 'param1=3' + '&param2='+id_society,
            dataType: 'json',
            success: function(data) {
                $("#inline_form_ut_select").prop('disabled', false);

                $("#inline_form_ut_select").html('<option value="00">Choix Utilisateur...</option>');

                $.each(data, function(index, element) {
                    $("#inline_form_ut_select").append('<option  value="'+ element.id +'">'+ element.login +' </option>');
                });

                $('#inline_form_ut_select').selectpicker('refresh');
            }

        });
}
function annuaireMagSelect(idstore) {
    var id_store = idstore.value;


    $.ajax({
        type: 'GET',
        url: './ajax/ajax_utilisateurs_annuaire_json.php',
        data: 'param1=3' + '&param2='+idstore,
        dataType: 'json',
        success: function(data) {
            $("#inline_form_ut_select").prop('disabled', false);

            $("#inline_form_ut_select").html('<option value="00">Choix UUtilisateur...</option>');

            $.each(data, function(index, element) {
                $("#inline_form_ut_select").append('<option  value="'+ element.id +'">'+ element.login +'</option>');
            });

            $('#inline_form_ut_select').selectpicker('refresh');
        }

    });


}


$('.selectpicker').selectpicker();

$('[data-toggle="tooltip"]').tooltip();

$('.dropdown-toggle').dropdown();

$('.js-dataTable-simple3c').DataTable({

    "language": {
        "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
        "search": "Rechercher&nbsp;:",
        "info": "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        "infoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        "paginate": {
            "previous": "Page précédente",
            "next": "Suivant",
            "last": "Dernier"

        },
        "aria": {
            "sortAscending": ": activer pour trier la colonne par ordre croissant",
            "sortDescending": ": activer pour trier la colonne par ordre décroissant"
        }

    },

    "columnDefs": [{
        "targets": 0,
        "searchable": true
    }]

});
