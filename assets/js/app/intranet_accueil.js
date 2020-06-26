function retourmenu() {
    $(".submenus_trigger2").hide("slide", 500);
    $(".main_icon").delay(300).fadeIn(500);
}


// CLOSING SIDEMENU
// $( "#closesideleft" ).click(function() {
//     $('#kleft_nav').removeClass('cbp-spmenu-open');
// });

$("#page").click(function(e) {
    var container = $("#kleft_nav");
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        $('#kleft_nav').removeClass('cbp-spmenu-open');
    }
});


// SHOW AND HIDE HEADER MENU ICON
if (window.location.href.indexOf("index.php") > -1) {
    $(".intranet_menu_dropdown").hide()
} else {
    $(".intranet_menu_dropdown").show()
}


// SIDE MENU HOVER COLOR
$('.side_menu_left').hover(function() {
    var classie = $(this).attr('data-noms');
    // var classie2 = $(this).attr('data-noms')+"Click";

    $(this).find('.side_menu_in').toggleClass(classie);
    // $(this).find('.side_menu_in').toggleClass("activeleft collapsed");

});


// Quand on clique sur le menu niv 1
$(".side_menu_left").click(function() {
    var classie = $(this).attr('data-noms')+"Click";
    $(".side_menu_left").find('.side_menu_in').attr('class', 'side_menu_in multi');
    $(this).find('.side_menu_in').toggleClass(classie);
});


// Quand on clique sur le menu niv 2
$(".submenuside").click(function() {
    var classie = $(this).closest('.side_menu_left').attr('data-noms')+"Transparent";

    $('.submenuside').attr('class', 'submenuside');
    $(this).toggleClass(classie);

    if (!$(this).hasClass('activeleftsub')){
        $('.submenuside').removeClass( "activeleftsub" );
        $( this ).toggleClass( "activeleftsub" );

    }else{
        $('.submenuside').removeClass( "activeleftsub" );
    }
});


document.getElementById('fullscreen-btn').addEventListener('click', function() {
  toggleFullscreen();
});


//---------------------------------------------------------------------------------------------------------------------------------------------------------
//FUNCTION CUSTOM THEME
function gestionTheme(theme_id, theme_css){
    var theme_id = theme_id;
    var theme_css = theme_css;

    $(".settings-button").hide();

    $.ajax({
        type: 'GET',
        url: 'ajax/ajax_themes.php',
        data: 'test=' + theme_id ,
        dataType: 'html',
        success: function(data) {

        }
    });
}

//FUNCTION CUSTOM BACKGROUND
function bgChangeDefault(){
      $('body').css('background-image', 'url(assets/img/backgrounds/default_background.jpg)');
}

function bgChange1(){
  $('body').css('background-image', 'url(assets/img/backgrounds/01_background.jpg)');
}
