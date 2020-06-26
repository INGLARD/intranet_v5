// INTERNE PAGE HIDE SECONDARY NAV
// NOT WORKING WELL!!!
// $(document.body).mouseover(function() {
//     $(".contentint").on('scroll',function(){
//         var actualPosition = $(this).scrollTop();
//
//         if (actualPosition > 0) {
//             // $(".contentint").css("margin-bottom", "20vh");
//             $(".contentint").css("overflow", "scroll");
//
//             $(".navbar").slideUp("slow");
//             $("#page").css("top", "0vh");
//             // $(".toptitleimage").hide("scale");
//             $("#myBtnTop").show();
//         } else {
//             $(".contentint").css("overflow", "auto");
//
//             $(".navbar").slideDown("fast");
//             $("#page").css("top", "7vh");
//             // $(".toptitleimage").show("scale");
//             $("#myBtnTop").hide();
//         }
//
//     });
//
//     $("#myBtnTop").click(function() {
//         $(".contentint").scrollTop(0);
//     });
// });

$(".submenusidesub").click(function() {
    var code_nom = $(this).attr('data-code-nom');
    var code_nom2 = $(this).attr('data-code-nom2');
    var code_nom3 = $(this).attr('data-code-nom3');
    var code_classe = $(this).attr('data-class');

    $.ajax({
        type: 'GET',
        url: 'inc/views/base_secondary_nav.php',
        data: '&code_nom=' + code_nom + '&code_nom2=' + code_nom2 + '&code_nom3=' + code_nom3+ '&code_classe=' + code_classe,
        dataType: 'html',
        success: function(data) {

            $(".secondary_nav_ajax").html(" ");
            $(".secondary_nav_ajax").append(data);
        }
    });

});
