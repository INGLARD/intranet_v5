<?php

$idprofil=$_GET['idprofil'];


?>

		<div class="row justify-content-center">
			<?php 
		if ($idprofil=="boulprofil"){
			 
					echo	'<div class="Trigger" id="menu1" name="main01">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu01.png"></div>
<div class="ff caret" ></div>
</div>
<!-- fruits et legumes -->
<div class="Trigger" id="menu2" name="main02">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu02.png"></div>
<div class="ff caret" ></div>
</div>
<!-- plannings -->
<div class="Trigger" id="menu3" name="main03">
<div class="col-sm" style="width:119px;height:auto"><img src="assets/img_menu/menu03.png"></div>
<div class="ff caret" ></div>
</div>
<!-- compta --> 
<div class="Trigger" id="menu4" name="main04">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu04.png"></div>
<div class="ff caret" ></div>
</div>
<div class="Trigger " id="menu5" name="main05">
<div class="col-sm" style=" width:119px;height:auto"><img src="assets/img_menu/menu05.png"></div>
<div class="ff caret" style=""></div>
</div>   ';
					
		}
		?>
		</div>


