$(function() {
    // année en cour -15 ans
    for (i = new Date().getFullYear() - 15; i > 1899; i--) {
        $('.year_select').append($('<option />').val(i).html(i));
    }

    for (i = 1; i < 13; i++) {
        $('.month_select').append($('<option />').val(i).html(i));
    }

    for (i = 1; i < 32; i++) {
        $('.day_select').append($('<option />').val(i).html(i));
    }
});

// display None for create form
$(".user_pass_type_container, .user_abs_duration_container").hide();

// Other functions
$(".selectpicker").selectpicker();

$(".day_select, .month_select, .year_select, .form-check-input, .switch_user_active_input").attr("disabled", true);
$("#add_create_user_formulaire input").attr("readonly", true);
$("#end_add_mod_user").attr("disabled", true);

// --------------------------------------------------------------------------------------------------------------------------------------------------------------------
// JAVASCRIPTS FOR CREATE OR MODIFY A USER
// ON CLICK SWITCH

function disabledAddModUserForm() {
    var form = $("#add_create_user_formulaire");

    form.validate().resetForm(); // clear out the validation errors
    form[0].reset(); // clear out the form data

    $("#add_create_user_formulaire input").attr("readonly", true);
    $("#add_mod_user_civilite").attr("disabled", true);
    $("#end_add_mod_user").attr("disabled", true);
    $(".day_select, .month_select, .year_select, .form-check-input, .switch_user_active_input").attr("disabled", true);

    $("#add_mod_enseingneUser_select").val('N');
    $('#add_mod_enseingneUser_select').selectpicker('refresh');

    $("#add_mod_magUser_select").attr("disabled", true);
    $("#add_mod_magUser_select").html('<option value="N">Magasin...</option>');
    $("#add_mod_magUser_select").selectpicker('refresh');

    $("#add_mod_typeUser_select").attr("disabled", true);
    $("#add_mod_typeUser_select").html('<option value="N">Typologie...</option>');
    $("#add_mod_typeUser_select").selectpicker('refresh');

    $("#add_mod_user_select").attr("disabled", true);
    $("#add_mod_user_select").html('<option value="N">Utilisateur...</option>');
    $("#add_mod_user_select").selectpicker('refresh');
}

// THIS FUNCTION RESET THE FORM
function resetAddModUserForm() {
    var form = $("#add_create_user_formulaire");

    form.validate().resetForm(); // clear out the validation errors
    form[0].reset(); // clear out the form data

    $("#add_create_user_formulaire input").attr("readonly", false);
    $("#end_add_mod_user").attr("disabled", false);
    $("#add_mod_user_civilite").attr("disabled", false);
    $("#add_mod_user_civilite").selectpicker('refresh');
    $(".day_select, .month_select, .year_select, .form-check-input, .switch_user_active_input").attr("disabled", false);

}


function editCreateUser() {
    if ($(".add_mod_user_switch .switch-input").prop('checked') == true) {
        // edit
        disabledAddModUserForm();

        $('.users_livesearch_container').show();
        $('.users_livesearch_input').val("");

        $('.user_pass_type_container, .user_abs_duration_container').show();

        $("#add_mod_user_form_title").text("Modifier un utilisateur");
        $("#end_add_mod_user").text("Valider les modifications");

    } else {
        // create
        disabledAddModUserForm();

        $('.users_livesearch_container').hide();
        $('.users_livesearch_input').val("");

        $(".user_pass_type_container, .user_abs_duration_container").hide();

        $("#add_mod_user_form_title").text("Créer un nouvelle utilisateur");
        $("#end_add_mod_user").text("Valider la création");

        // $("#add_mod_code_mag").attr("disabled", false);
        //
        // $("#add_mod_magasin_select").html(" ");
        // $("#add_mod_magasin_select").prop('disabled', true);
        // $('#add_mod_magasin_select').selectpicker('refresh');

    }
}
//
var selected_user_society = "";

function editCreateUserSociety(idsoc) {
    var enseigne_id = idsoc.value;
    selected_user_society = enseigne_id;

    if ($(".add_mod_user_switch .switch-input").prop('checked') == true) {
        // edition
        if (enseigne_id != "N") {
            $.ajax({
                type: 'GET',
                url: './ajax/ajax_function_user.php',
                data: 'param1=7',
                dataType: 'json',
                success: function(data) {
                    $("#add_mod_typeUser_select").prop('disabled', false);

                    $("#add_mod_typeUser_select").html('<option value="N">Typologie...</option>');

                    $.each(data, function(index, element) {
                        $("#add_mod_typeUser_select").append('<option  value="' + element.id + '">' + element.name + '</option>');
                    });

                    $('#add_mod_typeUser_select').selectpicker('refresh');
                }
            });

        } else if (enseigne_id == "N") {
            disabledAddModUserForm();
        }

    } else {
        // creation
        if (enseigne_id != "N") {

            $.ajax({
                type: 'GET',
                url: './ajax/ajax_function_user.php',
                data: 'param1=7',
                dataType: 'json',
                success: function(data) {
                    $("#add_mod_typeUser_select").prop('disabled', false);

                    $("#add_mod_typeUser_select").html('<option value="N">Typologie...</option>');

                    $.each(data, function(index, element) {
                        $("#add_mod_typeUser_select").append('<option  value="' + element.id + '">' + element.name + '</option>');
                    });

                    $('#add_mod_typeUser_select').selectpicker('refresh');
                }
            });

        } else if (enseigne_id == "N") {
            disabledAddModUserForm();

        }
    }
}


function editCreateUserType(idtype) {
    var user_type_id = idtype.value;
    var user_type_id_str = "'" + user_type_id + "'";

    if ($(".add_mod_user_switch .switch-input").prop('checked') == true) {
        // modification
        if (user_type_id != "N") {
            // USERS WITH NO SPECIFIC STORE
            if (user_type_id == "ADMIN" || user_type_id == "RH") {
                alert("user sans magasain");

                $.ajax({
                    type: 'GET',
                    url: './ajax/ajax_function_user.php',
                    data: 'param1=8' + '&param2=' + selected_user_society + '&param3=' + user_type_id_str,
                    dataType: 'json',
                    success: function(data) {
                        $("#add_mod_user_select").prop('disabled', false);

                        $("#add_mod_user_select").html('<option value="N">Utilisateur...</option>');

                        $.each(data, function(index, element) {
                            $("#add_mod_user_select").append('<option  value="' + element.id + '">' + element.name + ' ' + element.first_name + '</option>');
                        });

                        $('#add_mod_user_select').selectpicker('refresh');
                    }
                });
            }
            // USERS WITH SPECIFIC STORE
            else {
                alert("user avec magasain");

                $.ajax({
                    type: 'GET',
                    url: './ajax/ajax_function_store.php',
                    data: 'param1=4' + '&param2=' + selected_user_society,
                    dataType: 'json',
                    success: function(data) {
                        $("#add_mod_magUser_select").prop('disabled', false);

                        $("#add_mod_magUser_select").html('<option value="00">Choix magasin...</option>');

                        $.each(data, function(index, element) {
                            $("#add_mod_magUser_select").append('<option  value="' + element.id + '">' + element.id + ' - ' + element.name + '</option>');
                        });

                        $('#add_mod_magUser_select').selectpicker('refresh');
                    }
                });
            }


        } else if (user_type_id == "N") {
            disabledAddModUserForm();
        }
    } else {
        // creation
        if (user_type_id != "N") {
            // USERS WITH NO SPECIFIC STORE
            if (user_type_id == "ADMIN" || user_type_id == "RH") {
                alert("user sans magasain");

            }

            // USERS WITH SPECIFIC STORE
            else {
                alert("user avec magasain");
            }


        } else if (user_type_id == "N") {
            disabledAddModUserForm();
        }
    }
}


function closeLivesearchResult() {
    $(".users_livesearch_input").blur(function() {
        $(".users_livesearch_input").val("");
        $(".users_livesearch_results").hide();
        $(".users_livesearch_results ul").html("");
    });
}


function addEditUsersLivesearch(text) {
    var input_data = text.value;

    if (input_data) {
        $.ajax({
            type: 'GET',
            url: './ajax/ajax_function_user.php',
            data: 'param1=9' + '&param2=' + input_data,
            dataType: 'json',
            success: function(data) {

                if (data.length > 0) {
                    $(".users_livesearch_results ul").html("");

                    $.each(data, function(index, element) {
                        $(".users_livesearch_results ul").append('<li onmousedown="usersLivesearchClick()">' + element.name + ' ' + element.first_name + ' - (' + element.id_function + ') magasin: ' + element.id_store + '</li>');
                    });

                    $(".users_livesearch_results").show();

                    closeLivesearchResult();

                } else {
                    $(".users_livesearch_results ul").html("");
                    $(".users_livesearch_results ul").append('<strong>Pas de resultats</strong>');
                    $(".users_livesearch_results").show();

                    closeLivesearchResult();

                }
            }
        });
    } else {
        $(".users_livesearch_results ul").html("");
        $(".users_livesearch_results").hide();
    }
}


function usersLivesearchClick() {
    alert("user clicked");
}


// $(".users_livesearch_input").focusout(function() {
// })

// function editCreateUserStore(idstore) {
//     var store_id = idstore.value;
//
//     if ($(".add_mod_user_switch .switch-input").prop('checked') == true) {
//         // edit
//         if (enseigne_id != "N") {
//             // disabledAddModMagForm();
//             $.ajax({
//                 type: 'GET',
//                 url: './ajax/ajax_function_annuaire_json.php',
//                 data: 'param1=2' + '&param2=' + enseigne_id,
//                 dataType: 'json',
//                 success: function(data) {
//                     $("#add_mod_functionUser_select").prop('disabled', false);
//
//                     $("#add_mod_functionUser_select").html('<option value="00">Fonction...</option>');
//
//                     $.each(data, function(index, element) {
//                         $("#add_mod_functionUser_select").append('<option  value="' + element.id + '">' + element.name + '</option>');
//                     });
//
//                     $('#add_mod_functionUser_select').selectpicker('refresh');
//                 }
//             });
//
//         } else if (enseigne_id == "N") {
//             disabledAddModUserForm();
//
//         }
//     }
// }
