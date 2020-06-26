<?php
/**
* template_head_end.php
*
*
*
* (continue) The first block of code used in every page of the template
*
* The reason we separated template_head_start.php and template_head_end.php
* is for enabling us to include between them extra plugin CSS files needed only in
* specific pages
*
*/
?>

<!--<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/css/bootstrap/bootstrap.css">-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="<?php echo $one->assets_folder; ?>/css/default.css" />

<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/css/additionalcss.css">
<!--<link rel="stylesheet" type="text/css" href="assets/css/default2.css" />-->
<link rel="stylesheet" type="text/css" href="<?php echo $one->assets_folder; ?>/css/component.css" />
<link href="<?php echo $one->assets_folder; ?>/css/tooltip.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/layout.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/badges.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/dropdown.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/boilerplate.css" rel="stylesheet" type="text/css" />

<link href="<?php echo $one->assets_folder; ?>/css/utils.css" rel="stylesheet" type="text/css" />

<link href="<?php echo $one->assets_folder; ?>/css/icons/interview/interview.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/collectionicons/flaticon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/iconic/iconic.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/linecons/linecons.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/qhse/qhse.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/elusive/elusive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/typicons/typicons.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/fontawesome/fontawesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/fruits_vegetables/flaticon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/management/flaticon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/drinkset/flaticon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/shopping/flaticon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/books/flaticon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/format_fichier/format.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/favorites/favorite.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/accueil/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/datacons/datacon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/icons/medical/medical.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/snippets/notification-box.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/snippets/user-profile.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/snippets/login-box.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/snippets/files-box.css" rel="stylesheet" type="text/css" />

<link href="<?php echo $one->assets_folder; ?>/css/elements/content-box.css" rel="stylesheet" type="text/css" />
<!-- <link href="<?php echo $one->assets_folder; ?>/css/elements/buttons.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/elements/menus.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/elements/dashboard-box.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/elements/dashboard-box.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/border-radius.css" rel="stylesheet" type="text/css" />-->
<link href="<?php echo $one->assets_folder; ?>/css/popover.css" rel="stylesheet" type="text/css" />

<!-- <link href="<?php echo $one->assets_folder; ?>/css/components/default.css" rel="stylesheet" type="text/css" />-->
<!-- <link href="<?php echo $one->assets_folder; ?>/css/progressbar.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/snippets/progress-box.css" rel="stylesheet" type="text/css" />-->
<link href="<?php echo $one->assets_folder; ?>/css/btn_index.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $one->assets_folder; ?>/css/datatables.min.css" rel="stylesheet" type="text/css" />

<!-- bootstrap select -->
<link href="<?php echo $one->assets_folder; ?>/js/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>

<!-- Leaflet css -->
<link href="<?php echo $one->assets_folder; ?>/js/plugin/leaflet/leaflet.css" rel="stylesheet" type="text/css"/>

<!-- INTRANET CSS FILES START -->
<link href="<?php echo $one->assets_folder; ?>/css/intranet_css/navbar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $one->assets_folder; ?>/css/intranet_css/main_menu.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $one->assets_folder; ?>/css/intranet_css/main_header.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $one->assets_folder; ?>/css/intranet_css/docs_and_qhse.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $one->assets_folder; ?>/css/intranet_css/p_interne.css" rel="stylesheet" type="text/css" />

<link href="<?php echo $one->assets_folder; ?>/css/colors.css" rel="stylesheet" type="text/css" />

<!-- bootstrap-toggle-css -->
<link rel="stylesheet" href="<?php echo $one->assets_folder; ?>/css/bootstrap-toggle/bootstrap-toggle.min.css" type="text/css">

<link id="theme_id" href="<?php echo $one->assets_folder; ?>/css/intranet_css/themes_variables/<?php echo $theme_css; ?>.css" rel="stylesheet" type="text/css" />
<!-- INTRANET CSS FILES END -->

<!-- OneUI CSS framework
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">-->
<style>
@media only screen and (orientation:portrait){

  body {

    height: 100vw;

    -webkit-transform: rotate(90deg);

    -moz-transform: rotate(90deg);

    -o-transform: rotate(90deg);

    -ms-transform: rotate(90deg);

    transform: rotate(90deg);

  }

}

@media only screen and (orientation:landscape){

  body {

     -webkit-transform: rotate(0deg);

     -moz-transform: rotate(0deg);

     -o-transform: rotate(0deg);

     -ms-transform: rotate(0deg);

     transform: rotate(0deg);

  }

}
</style>
<!-- code modifie le 1701 -->
<!-- END Stylesheets -->
</head>
<body>
    <!-- <div id='page'> -->
