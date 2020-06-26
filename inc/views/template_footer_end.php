<?php
/**
 * template_footer_end.php
 *
 * Author: pixelcave
 *
 * The last block of code used in every page of the template
 *
 * We put it in a separate file for consistency. The reason we separated
 * template_footer_start.php and template_footer_end.php is for enabling us
 * put between them extra javascript code needed only in specific pages
 *
 */
?>

<script type="text/javascript">

function mafoonction(var1,var2,var3,var4){

    var varb1=var4;
    var var1=var1;
    var var2=var2;
    var var3=var3;
    // url='internpage.php?varmenu='+varb1;
    //$( location ).attr("href", url);
    $.redirect('internpage.php', {'var1': var1, 'var2': var2,'var3': var3,'varmenu':varb1});
}




/* Screenfull */
if(document.getElementById('fullscreen-btn')) {
    document.getElementById('fullscreen-btn').addEventListener('click', function () {
        if (screenfull.enabled) {
            screenfull.request();
        }
    });
}

var menuLeft = document.getElementById( 'kleft_nav' ),body = document.body;
showLeft.onclick = function() {
    classie.toggle( this, 'active' );
    classie.toggle( this, 'std' );
    classie.toggle( menuLeft, 'cbp-spmenu-open');
    disableOther( 'showLeft' );
};

function disableOther( button ) {
    if( button !== 'showLeft' ) {
        classie.toggle( showLeft, 'disabled' );
    }

}

// ADD SLIDEUP ANIMATION TO DROPDOWN //
$('#only-one [data-accordion]').accordion();

$('.dropdown').on('show.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
});

$('.dropdown').on('hide.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
});


// Quand on clique sur le menu niv 1
$( ".multi" ).click(function() {

    $('.submenuside ').removeClass( "activeleftsub" );
    //$('.glyph-icon.icon-angle-down').removeClass('icon-angle-down').addClass('icon-angle-right');
    //$('i.glyph-icon.icon-caret-down').removeClass('icon-caret-down').addClass('icon-caret-right');

    if (!$(this).hasClass('activeleft')){
        $('.multi').addClass( "collapsed" );
        //$('.multi').attr("aria-expanded","false");
        //$('.panel-collapse').removeClass( "show" );

        $('.multi').removeClass( "activeleft" );

        //$('.multi .glyph-icon').removeClass('icon-angle-down');
        $( this ).toggleClass( "activeleft" );
        $('icon-angle-right',this).toggleClass('icon-angle-down');
        $('.glyph-icon.icon-angle-right',this).removeClass('icon-angle-right').addClass('icon-angle-down');
    }else{
        $('.glyph-icon.icon-angle-down',this).removeClass('icon-angle-down').addClass('icon-angle-right');
    }

});


$(document).ready(function() {

    $('.submenusidesub').on('click',function(){
        var classie = $(this).attr('data-class');
        var link=$(this).attr('data-href');

        $(".side_menu_left").find('.submenusidesub').attr('style', ' ');
        $(this).css("color", "var(--"+ classie +"-text)");

        $.ajax({
            type: 'POST',
            url: link,
            dataType: 'html',
            success: function(data){
                $('.containerinternpage').html(data);
            }
        });
    });


// --------------------------------------------------------------------------------------------------------------
// A PASSER EN fonction

    $(".btmenu").click(function() {
        var menu = $(this).attr('name');
        var ut = <?php echo $mycode; ?>;
        var codem = $(this).attr('data-code');
        var titlemenu= $(this).attr('data-title');
        var subname= $(this).attr('data-subname');


        $.ajax({
            type: 'GET',
            url: 'ajax/main_menu_ajax.php',
            data: 'menu=' + menu + '&ut=' + ut + '&codem=' + codem +'&titlemenu='+titlemenu+'&subname='+subname,
            dataType: 'html',
            success: function(data) {
                $(".main_icon").fadeOut( 500 );
                $(".submenus_trigger2").html(" ");
                $(".submenus_trigger2").append(data);
                $(".submenus_trigger2").show("slide", 1000);
                $(".submenus_trigger2").scrollTop(0);
            }
        });

    });

// --------------------------------------------------------------------------------------------------------------


    // nav($name,$code_enseigne,$typ_util,$mag_util,$id,$mycode,$codemd5,1);

    //changement de profil
    $(".prof").click(function () {
        var idprofil=$(this).attr('id');

        $.ajax({
            type: 'GET',
            url: 'ajax/profile_menu_ajax.php',
            data: 'idprofil='+idprofil,
            dataType: 'html',
            success: function(data){
                $('#content_rows').html( data);
            }
        });



    });


    //sub sub menu

    $(".white_sub_sub").hide();
    $(".Trigger2").click(function () {

        if ($(this).parent('div').find(".white_sub_sub").is(":hidden")){
            $(this).parent('div').find(".white_sub_sub").fadeIn();
        }
        else{
            $(".white_sub_sub").fadeOut();
        }


    })


});
var toDay=new Date(),hrf=<?php
date_default_timezone_set('Europe/Paris');
echo date("H"); ?>;
var dec=hrf-toDay.getUTCHours();


function hms(){
    var today=new Date();
    var hrs=today.getUTCHours()+dec,mns=today.getUTCMinutes(),scd=today.getUTCSeconds();
    var str=(hrs<10?"0"+hrs:hrs)+"H"+(mns<10?"0"+mns:mns)+" min";
    $("#clock").html("<div class='date'><?php echo $date ?> <span class='heure'>"+str+"</span></div>");
    setTimeout(hms,1000);
}
hms();

</script>
<!-- Footer -->
<!-- <div id='footer' class='fixed-bottom'> -->
    <!-- </div> -->
    <!-- Footer -->
</div>
<footer id='footer' class='fixed-bottom'>
    <div class="copyright">
        <!-- CONTAINER -->
        <div class="">
            <div class="copyright_inf">
                <span>DSI © 2018</span> |
                <span>Theme by DSI</span> |

            </div>
        </div><!-- //CONTAINER -->
    </div><!-- copyright -->
    <!-- </div> -->
</footer>
</body>
</html>
