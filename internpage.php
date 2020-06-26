<?php if (session_id() == "") {session_start();}

$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);
$dateactu=date('d/m/Y');
$varmenu=$_POST['varmenu'];

$varmenup=$_POST['var1'];
$varmenuss=$_POST['var2'];
$menuactif=$_POST['var3'];

?>
<?php require 'inc/config.php'; ?>
<?php
include($fastpath.'connexion.php');
include($fastpath.'connexion_postgr.php');

?>
<?php require 'inc/views/template_head_start.php'; ?>
<?php require 'inc/views/template_head_end.php'; ?>
<?php require 'inc/views/base_head.php'; ?>
<?php require 'inc/views/base_header.php'; ?>
<?php include('inc/views/sidemenuleft.php');?>

<!--  NAV LEFT <nav class="cbp-spmenu-s2 cbp-spmenu cbp-spmenu-bkg cbp-spmenu-vertical2 cbp-spmenu-left2" id="kleft_nav">-->

<div class="secondary_nav_ajax"></div>
<div class="containerinternpage">


</div>

<?php require 'inc/views/template_footer_start.php'; ?>
<?php require 'inc/views/template_footer_end.php'; ?>
<?php
if($varmenu!=''){
	?>
	<script>
	var code_nom3=<?php echo $menuactif; ?>;
	var code_nom=<?php echo $varmenup; ?>;
	var code_nom2=<?php echo $varmenuss; ?>;

	$.ajax({
		type: 'POST',
		url: '<?php echo $varmenu ?>.php',
		dataType: 'html',
		success: function(data){
			$('.containerinternpage').html(data);
		}
	});
	$.ajax({
		type: 'GET',
		url: 'inc/views/base_secondary_nav.php',
		data:'code_nom='+code_nom+'&code_nom2='+code_nom2+'&code_nom3='+code_nom3+'&typ=acc',
		dataType: 'html',
		success: function(data){
			$('.secondary_nav_ajax').html(data);
		}
	});

</script>
<?php
}
?>
