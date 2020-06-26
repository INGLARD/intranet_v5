function openSubForm(evt, cityName) {
    var tabcontent = $(".tabcontent");

    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    var user_subform = $(".user_subform");
    for (i = 0; i < user_subform.length; i++) {
        user_subform[i].className = user_subform[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------
// JAVASCRIPTS FOR INSERT USER TO MAGASIN

// --------------------------------------------------------------------------------------------------------------------------------------------------------------------
// JAVASCRIPTS FOR GESTION UTILISATEUR INTRANET
function annuaireSocietySelect(idsoc) {
    var id_society = idsoc.value;
    $.ajax({
        type: 'GET',
        url: './ajax/ajax_function_store.php',
        data: 'param1=4' + '&param2='+id_society,
        dataType: 'json',
        success: function(data) {
            $("#annuaire_form_mag_select").prop('disabled', false);

            $("#annuaire_form_mag_select").html('<option value="00">Choix magasin...</option>');

            $.each(data, function(index, element) {
                $("#annuaire_form_mag_select").append('<option  value="'+ element.id +'">'+ element.id +' - '+ element.name +'</option>');
            });

            $('#annuaire_form_mag_select').selectpicker('refresh');
        }

    });
}
