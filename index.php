<?php
if (session_id() == "") {session_start();}
include('connexion.php');
include('connexion_postgr.php');

$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);
$dateactu=date('d/m/Y');
setlocale(LC_TIME, "fr_FR");

?>
<?php require 'inc/config.php'; ?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/base_head.php'; ?>
<?php require 'inc/views/base_header.php'; ?>

<div class="container2">

    <?php $one->build_nav(); ?>
    <!--<div class=" btmenu"><img src="assets/img/ico_planning.png">Planning</div>-->

</div>

<?php require 'inc/views/template_footer_start.php'; ?>
<?php require 'inc/views/template_footer_end.php'; ?>
