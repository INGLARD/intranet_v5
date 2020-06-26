<?php if (session_id() == "") {session_start();}
include('../connexion.php');
include('../connexion_postgr.php');
$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);

$dateactu=date('d/m/Y');
setlocale(LC_TIME, "fr_FR");
?>
<!--  NAV LEFT <nav class="cbp-spmenu-s2 cbp-spmenu cbp-spmenu-bkg cbp-spmenu-vertical2 cbp-spmenu-left2" id="kleft_nav">-->

<?php
 $queryfactures="Select * from dry_deliveries_h_t where store_id=".$codemag." and etat >= 'A' order by order_id desc";
 $resfac=pg_query($dbconn,$queryfactures) or die("Error in connection 2: " . pg_last_error());
?>

<div class="contentint">
    <button id="myBtnTop" title="Go to top"><i class="icon-elusive-up"></i></button>

    <div class='row search_nav'>
        <div class="block-content backgroundflitre">
            <div class='row'>
                <div class="form-group col-md-2">
                    <label for="datecommande" class="col-form-label">Date de commande : </label>
                    <div id="sandbox-container">
                        <div class="input-group date">
                            <input type="text" class="form-control"><span class="input-group-addon">
                            <i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>

                </div>

                <div class="form-group col-md-2">
                    <label for="type_commande" class="col-form-label">Type de commande : </label>

                    <select id="type_comande" class="form-control">
                        <option value="0">Choisissez le type de commande</option>
                        <option value="Televente">Televente</option>
                        <option value="Internet">Internet</option>
                    </select>

                </div>

                <div class="form-group col-md-2">
                    <label for="commande" class="col-form-label">Numéro de commande : </label>
                    <input type="text" class="form-control" id="commande">

                </div>
            </div>
            <div style="margin-top: 1em;">
                <button type="button" id="testButton" class="btn btn-info btn-lg btn-block">Rechercher</button>
            </div>
        </div>
    </div>

    <div class='row'>
        <div id="contentlst">


<?php
if (pg_num_rows($resfac) > 0){

		echo '<table  class="table table-striped datatable display table-bordered js-dataTable-simple3c commande" style="width:100%">';
		echo '<thead>';
		echo '<tr>';
		echo '<th class="sorting">Date de la commande</th>';
		echo '<th class="sorting">N° de commande</th>';
		echo '<th class="sorting">Type de commande</th>';
		echo '<th class="sorting">Etat de la commande</th>';
		echo '	</thead>';
		echo '<tbody>';
		while ($row = pg_fetch_array($resfac)) {
		echo '<tr>';
		echo '<td data-order="'.strtotime($row['order_date']).'">'.date('d/m/Y',strtotime($row['order_date'])).'</td>';
		echo '<td><a href="#" class="comm" id="'.$row['order_id'].'">'.$row['order_id'].'</a></td>';
		echo '<td>'.$row['order_type'].'</td>';
		echo '<td>';
		if($row['etat']=='A'){
					echo '<span class="txtblue">Commande en cours </span>';
				}
				if($row['etat']=='B'){
					echo '<span class="txtrouge">Commande livrée et BL validé avec litige</span>';
				}
				if($row['etat']=='C'){
					echo '<span class="txtprup">Commande livrée et BL validé sans litige</span>';
				}
				if($row['etat']=='D'){
					echo '<span class="txtgreen">Commande et BL validés et intégrés</span>';
				}

		echo'</td>';
		echo '</tr>';

		}

		echo '</tbody>';
		echo '</table>';
		}else{

		echo 'il n\'y a pas de factures';
		}
?>

</div>

</div>
</div>

<script>
$(document).ready(function() {



    $('#sandbox-container .input-group.date').datepicker({
        language: 'fr',
    });
    $('.js-dataTable-simple3c').DataTable( {
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 2 ],
            orderData: [ 2, 0 ]
        }]
    });

});
</script>
