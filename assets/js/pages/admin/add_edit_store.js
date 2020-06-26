$(".day_select, .month_select, .year_select").attr("disabled", true);
$("#end_add_mod_store").attr("disabled", true);

$("#add_create_mag_formulaire input").on("blur", function() {
    if ($("#add_create_mag_formulaire").valid()) {
        $('#end_add_mod_store').prop('disabled', false);
    } else {
        $('#end_add_mod_store').prop('disabled', true);
    }
});

$("#add_create_mag_formulaire input").attr("readonly", true);
$(".add_create_mag_select").attr("disabled", true);

$("#mag_create_day, #mag_create_month, #mag_create_year").attr("disabled", true);
$("#end_add_mod_store").attr("disabled", true);
$(".selectpicker").selectpicker();



// Jquery Form Validate
$("#add_create_mag_formulaire").validate({
    rules: {
        add_mod_code_mag: 'required',
        add_mod_adresse_ip: 'required',
        add_mod_nom_mag: 'required',
        add_mod_nom_global_mag: 'required',
        add_mod_opening_date_mag: 'required',
        add_mod_status: 'required',
        add_mod_type: 'required',
        // add_mod_adresse_1: 'required',
        // add_mod_adresse_2: 'required',
        add_mod_code_postale: 'required',
        add_mod_ville: 'required',
        add_mod_telephone: 'required',
        add_mod_telephone_portable: 'required',
        // add_mod_fax: 'required',
        // add_mod_email: 'required',
        // add_mod_latitude: 'required',
        // add_mod_longitude: 'required',
    }
});


$(function () {
    // année en cour -15 ans
    for (i = new Date().getFullYear()-15 ; i > 1899; i--) {
        $('.year_select').append($('<option />').val(i).html(i));
    }

    for (i = 1; i < 13; i++) {
        $('.month_select').append($('<option />').val(i).html(i));
    }

    for (i = 1; i < 32; i++) {
        $('.day_select').append($('<option />').val(i).html(i));
    }
});


// --------------------------------------------------------------------------------------------------------------------------------------------------------------------
// JAVASCRIPTS FOR AJOUT/MODIF MAGASIN
// THIS FUNCTION DISABLE THE FORM
function disabledAddModMagForm() {
    var form = $("#add_create_mag_formulaire");

    form.validate().resetForm(); // clear out the validation errors
    form[0].reset(); // clear out the form data

    $("#add_create_mag_formulaire input").attr("readonly", true);

    $(".day_select, .month_select, .year_select").attr("disabled", true);

    $(".add_create_mag_select").attr("disabled", true);
    $(".add_create_mag_select").selectpicker('refresh');

}

// THIS FUNCTION RESET THE FORM
function resetAddModMagForm() {
    var form = $("#add_create_mag_formulaire");

    form.validate().resetForm(); // clear out the validation errors
    form[0].reset(); // clear out the form data

    $("#add_create_mag_formulaire input").attr("readonly", false);

    $(".day_select, .month_select, .year_select").attr("disabled", false);

    $(".add_create_mag_select").attr("disabled", false);
    $(".add_create_mag_select").selectpicker('refresh');

}

// ON CLICK SWITCH
function editCreateMag() {
    if ($(".custom_switch .switch-input").prop('checked') == true) {
        disabledAddModMagForm();

        $("#add_mod_enseingne_select").val('999');
        $('#add_mod_enseingne_select').selectpicker('refresh');

        $("#add_mod_form_title").text("Modifications du magasin");
        $("#end_add_mod_store").text("Valider les modifications");

    } else {
        disabledAddModMagForm();

        $("#add_mod_enseingne_select").val('999');
        $('#add_mod_enseingne_select').selectpicker('refresh');

        $("#add_mod_form_title").text("Créer un nouveau magasin");
        $("#end_add_mod_store").text("Valider la création");

        $("#add_mod_code_mag").attr("disabled", false);

        $("#add_mod_magasin_select").html(" ");
        $("#add_mod_magasin_select").prop('disabled', true);
        $('#add_mod_magasin_select').selectpicker('refresh');

    }
}

function AddCreateSelectCompany1(idsoc) {
    var enseigne_id = idsoc.value;
    var enseigne_name = $('#add_mod_enseingne_select option[value=' + enseigne_id + ']').attr("data-name");

    if ($(".custom_switch .switch-input").prop('checked') == true) {
        if (enseigne_id != 999) {
            disabledAddModMagForm();

            $.ajax({
                type: 'GET',
                url: './ajax/ajax_function_store.php',
                data: 'param1=4' + '&param2=' + enseigne_id,
                dataType: 'json',
                success: function(data) {
                    $("#add_mod_magasin_select").prop('disabled', false);

                    $("#add_mod_magasin_select").html('<option value="00">Choix magasin...</option>');

                    $.each(data, function(index, element) {
                        $("#add_mod_magasin_select").append('<option  value="' + element.id + '">' + element.id + ' - ' + element.name + '</option>');
                    });

                    $('#add_mod_magasin_select').selectpicker('refresh');
                }

            });

        } else if (enseigne_id == 999) {
            disabledAddModMagForm();

            $("#add_mod_magasin_select").html(" ");
            $("#add_mod_magasin_select").prop('disabled', true);
            $('#add_mod_magasin_select').selectpicker('refresh');

        }

    } else {
        if (enseigne_id != 999) {
            resetAddModMagForm();

            $("#add_mod_nom_global_mag").val(enseigne_name);

        } else if (enseigne_id == 999) {
            disabledAddModMagForm();

        }
    }
}

function AddCreateSelectStore1(idmag) {
    var id_magasin = idmag.value;

    if (id_magasin != 00) {
        resetAddModMagForm();

        $.ajax({
            type: 'GET',
            url: './ajax/ajax_function_store.php',
            data: 'param1=3' + '&param2=' + id_magasin,
            dataType: 'json',
            success: function(data) {
                $.each(data, function(index, element) {
                    $("#add_mod_code_mag").val(element.id);
                    $("#add_mod_code_mag").attr("disabled", true);

                    $("#add_mod_adresse_ip").val(element.ip_store);

                    $("#add_mod_nom_mag").val(element.name);
                    $("#add_mod_nom_global_mag").val(element.name_detail);

                    $("#add_mod_status option[value=" + element.status + "]").attr("selected", "selected");
                    $('#add_mod_status').selectpicker('refresh');

                    $("#add_mod_type option[value=" + element.id_type + "]").attr("selected", "selected");
                    $('#add_mod_type').selectpicker('refresh');

                    $("#add_mod_adresse_1").val(element.address1);
                    $("#add_mod_adresse_2").val(element.address2);
                    $("#add_mod_code_postale").val(element.zip_code);
                    $("#add_mod_ville").val(element.city);
                    $("#add_mod_telephone").val(element.phone);
                    $("#add_mod_telephone_portable").val(element.mobile_phone);
                    $("#add_mod_fax").val(element.fax);

                });
            }
        });

    } else if (id_magasin == 00) {
        disabledAddModMagForm();

    }
}


// CREATING OR EDITING MAG
function addCreateMagValid() {
    // main fields for creation
    var code_mag = $("#add_mod_code_mag").val();
    var id_enseigne_mag = $("#add_mod_enseingne_select").val();
    var adresse_ip_mag = $("#add_mod_adresse_ip").val();
    var nom_mag = $("#add_mod_nom_mag").val();
    var nom_global_mag = $("#add_mod_nom_global_mag").val();
    var status_mag = $("#add_mod_status").val();
    var type_mag = $("#add_mod_type").val();
    var adresse_1_mag = $("#add_mod_adresse_1").val();
    var adresse_2_mag = $("#add_mod_adresse_2").val();
    var code_postale_mag = $("#add_mod_code_postale").val();
    var ville_mag = $("#add_mod_ville").val();
    var telephone_mag = $("#add_mod_telephone").val();
    var telephone_portable_mag = $("#add_mod_telephone_portable").val();
    var fax_mag = $("#add_mod_fax").val();
    var email_mag = $("#add_mod_email").val();
    var latitude_mag = $("#add_mod_latitude").val();
    var longitude_mag = $("#add_mod_longitude").val();

    // extra fields for editing

    if ($(".custom_switch .switch-input").prop('checked') == true) {
        // modification form
        $.ajax({
            type: 'POST',
            url: './ajax/ajax_edit_store.php',
            dataType: 'html',
            data: 'code_mag=' + code_mag + '&id_enseigne_mag=' + id_enseigne_mag + '&adresse_ip_mag=' + adresse_ip_mag + '&nom_mag=' + nom_mag + '&nom_global_mag=' + nom_global_mag + '&status_mag=' + status_mag +
                '&type_mag=' + type_mag + '&adresse_1_mag=' + adresse_1_mag + '&adresse_2_mag=' + adresse_2_mag + '&code_postale_mag=' + code_postale_mag + '&ville_mag=' + ville_mag + '&telephone_mag=' + telephone_mag +
                '&telephone_portable_mag=' + telephone_portable_mag + '&fax_mag=' + fax_mag + '&email_mag=' + email_mag + '&latitude_mag=' + latitude_mag + '&longitude_mag=' + longitude_mag,
            success: function(data) {
                alert(data);
            }
        });

    } else {
        // création form
        $.ajax({
            type: 'POST',
            url: './ajax/ajax_create_store.php',
            dataType: 'html',
            data: 'code_mag=' + code_mag + '&id_enseigne_mag=' + id_enseigne_mag + '&adresse_ip_mag=' + adresse_ip_mag + '&nom_mag=' + nom_mag + '&nom_global_mag=' + nom_global_mag + '&status_mag=' + status_mag +
                '&type_mag=' + type_mag + '&adresse_1_mag=' + adresse_1_mag + '&adresse_2_mag=' + adresse_2_mag + '&code_postale_mag=' + code_postale_mag + '&ville_mag=' + ville_mag + '&telephone_mag=' + telephone_mag +
                '&telephone_portable_mag=' + telephone_portable_mag + '&fax_mag=' + fax_mag + '&email_mag=' + email_mag + '&latitude_mag=' + latitude_mag + '&longitude_mag=' + longitude_mag,
            success: function(data) {
                alert(data);
            }
        });
    }
}
