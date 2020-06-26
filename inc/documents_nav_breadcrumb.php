<?php
echo '<div ><i class="icon-elusive-cancel submenu_exit" onClick="retourMenuDocQhse('.$codem.')"></i><p class="submenu_htitle">'.$titlemenu.'</p></div>';

echo '<div class="submenu_backsub">
<i class="icon-elusive-home submenu_icomenu" onClick="retourMenuDocQhse('.$codem.')"></i>
<p class="submenu_titlemenu" onClick="retourMenuDocQhse('.$codem.')">MENU</p>

<span class="submenu_separsub"> | </span>
<p class="submenu_titlesubmenu" onClick="retourdocuments('.$codem.','.$titlemenu_str.','.$icons_images_val.')">'.$titlemenu.'</p>

<span class="documents_breadcrumb" style="display: flex;">

</span>

</div>';
?>

<script type="text/javascript">
    $.each(docsQhseNavigationList, function() {
        $(".documents_breadcrumb").html(" ");
        $(".documents_breadcrumb").append(docsQhseNavigationList);
    });
</script>
