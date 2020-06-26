<?php

function nav($name,$enseigne,$typutil,$mag,$id,$codeutil,$codemd5,$codem,$icons_images_val,$niveau){


	$query2 = "SELECT h.parent_id, h.name,h.id,h.mtime,h.mime FROM elfinder_droits p, elfinder_file h WHERE h.id=p.id and (code_enseigne=".$enseigne." or code_enseigne=0) and (type_user='".$typutil."' or type_user='') and (id_magasin=".$mag." or id_magasin=0) and (id_user=".$codeutil." or id_user=0) and niveau=1 and h.parent_id  = ".$id." and h.id in (select parent_id from elfinder_file) union SELECT  h.parent_id, h.name,h.id,h.mtime,h.mime FROM  elfinder_file h WHERE  h.parent_id  = ".$id." and mime != 'directory'";

	$results2 = mysql_query($query2) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$resultscustom = mysql_query($query2) or die('Erreur SQL2 !<br>'.$sql.'<br>'.mysql_error());
	if (mysql_num_rows($results2) > 0)
	{

		// $datejm=date('d-m-Y H:i:s',strtotime('-10 day'));
		// $datejma=date('Y-m-d',strtotime('-10 day'));
		// $datejm2=date('h,i,s,m,d,Y', strtotime($datejm));
		//
		// $timestamp = gmmktime($datejm2);

		if ($icons_images_val == 1) {
			echo '<table class="docs_table">
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th>
							<div class="dropdown">
							  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-elusive-th-list display_docs_sizes"></i>
							  </button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#" onClick="loadDocsList('.$codem.','.$id.')">List</a>
								<a class="dropdown-item" href="#" onClick="loadDocsImages('.$codem.','.$id.')">Petites icones</a>
								<a class="dropdown-item display_docs_large" href="#">Grandes icones</a>
							  </div>
							</div>
						</th>
					</tr>
					</table>';

			echo '<div class="files_display">';
			echo '<div>
					<i class="icon-elusive-left-circled" onClick="returnToParentFolder('.$codem.')"></i>
				</div>';

			while($dataCustom = mysql_fetch_assoc($resultscustom))
			{
				$name=$dataCustom["name"];
				$id=$dataCustom["id"];
				$p_id = $dataCustom["parent_id"];
				$name2="'$name'";


				if ($dataCustom['mime'] == 'directory') {
					echo '<div>
							<i class="format-folder" onClick="docsAndQhseNavConstruct('.$name2.','.$id.','.$p_id.','.$codem.')"></i>
							<p>'.$name.'</p>
						</div>';
				}
				else {
					echo '<div>
							<img src="ajax/img.php?id='.$id.'">
							<p>'.$name.'</p>
						</div>';
					}
				}
				echo '</div>';
		}
		else {

			echo '<table class="docs_table">
					<tr>
						<th>Type</th>
						<th>Nom</th>
						<th>Date de mise en ligne</th>
						<th>
							<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="icon-elusive-th-list display_docs_sizes"></i>
							</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#" onClick="loadDocsList('.$codem.','.$id.')">List</a>
								<a class="dropdown-item" href="#" onClick="loadDocsImages('.$codem.','.$id.')">Petites icones</a>
								<a class="dropdown-item" href="#">Grandes icones</a>
								</div>
							</div>
						</th>
					</tr>';


				echo '<tr>
						<th><i class="icon-elusive-left-circled" onClick="returnToParentFolder('.$codem.')"></i></th>
						<th><a class="returnParentFolder">. .</a></th>
						<th></th>
						<th></th>
					</tr>';

			while($data2 = mysql_fetch_assoc($results2))
			{
				$name=$data2["name"];
				$id=$data2["id"];
				$date_creation = $data2["mtime"];
				$p_id = $data2["parent_id"];

				$name2="'$name'";
				if ($data2['mime'] == 'directory') {
					echo '<tr>
					<td><i class="format-folder"></i></td>
					<td><a href="#" class="folder_files2" onClick="docsAndQhseNavConstruct('.$name2.','.$id.','.$p_id.','.$codem.')">'. $name .'</a>
					</td>
					<td>'. date('d/m/Y', $date_creation).'</td>
					<td></td>
					</tr>';
				}
				else
				{
					if ($data2['mime'] == 'application/pdf') {
						$list_icon = '<i class="format-pdf-file-format-symbol pdf_file_color"></i>';
					}
					elseif ($data2['mime'] == 'application/msword') {
						$list_icon = '<i class="format-doc-file-format word_file_color"></i>';
					}
					elseif ($data2['mime'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
						$list_icon = '<i class="format-doc-file-format word_file_color"></i>';
					}
					elseif ($data2['mime'] == 'application/vnd.ms-excel') {
						$list_icon = '<i class="format-xlsx-file-format-extension exel_file_color"></i>';
					}
					elseif ($data2['mime'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
						$list_icon = '<i class="format-xlsx-file-format-extensionl exel_file_color"></i>';
					}
					elseif ($data2['mime'] == 'application/zip') {
						$list_icon = '<i class="format-zip-file-format zip_file_color"></i>';
					}
					elseif ($data2['mime'] == 'image/jpeg' || $data2['mime'] == 'image/png') {
						$list_icon = '<i class="format-frame-landscape image_file_color"></i>';
					}
					else {
						$list_icon = '<i class="icon-iconic-help unknown_file_color"></i>';
					}

					echo '<tr>
					<td>'. $list_icon .'</td>
					<td><a class="doclive" target="_blank" href="#" data-toggle="modal" data-target=".bd-example-modal-lg" onClick="displayPdfContent('.$id.')">'. $name .'</a></td>
					<td>'. date('d/m/Y',$date_creation ).'</td>
					<td><i class="icon-elusive-download-alt view_download_icon"></i></td>
					</tr>';

				}
			}
		}


			$querymag="SELECT d.id FROM elfinder_droits e, elfinder_file d WHERE d.id=e.id and (code_enseigne=".$code_enseigne." or code_enseigne=0) and (type_user='".$typ_util."' or type_user='') and (id_magasin=".$mag_util." or id_magasin=0) and (id_user=".$code_util." or id_user=0)";
			$resultsquerymag = mysql_query($querymag);
			$lstmag="";

			while($datamag = mysql_fetch_assoc($resultsquerymag)){
				$lstmag=$lstmag.$datamag["id"].',';
			}

			$lstmag=substr($lstmag,0,strlen($lstmag)-1);

			$query3 ="select h.parent_id,h.id,h.mtime from elfinder_file h where h.parent_id in (".$lstmag.") and CAST(FROM_UNIXTIME(h.mtime) as date) >='".$datejma."' and h.mime!='directory'";

			$results3 = mysql_query($query3);
			if (mysql_num_rows($results3) > 0)
			{
				$varnum=mysql_num_rows($results3);
				while($data3 = mysql_fetch_assoc($results3)){

					if( ($data2["id"]==$data3["id"])){
						echo '<div  class="newdoc1">1</div>';
					}
				}
			}
	}
	echo '</table>';
}


function bip($enseigne,$typutil,$mag,$codeutil,$datejma,$id){
	$querymag="SELECT d.id FROM elfinder_droits e, elfinder_file d WHERE d.id=e.id and (code_enseigne=".$enseigne." or code_enseigne=0) and (type_user='".$typutil."' or type_user='') and (id_magasin=".$mag." or id_magasin=0) and (id_user=".$codeutil." or id_user=0)";
	$resultsquerymag = mysql_query($querymag);
	$lstmag="";

	while($datamag = mysql_fetch_assoc($resultsquerymag)){

		$lstmag=$lstmag.$datamag["id"].',';
	}
	$lstmag=substr($lstmag,0,strlen($lstmag)-1);

	$query3 ="select parent_id,id,mtime from elfinder_file where id=".$id." and parent_id in (".$lstmag.") and  mime='directory'";

	$results3 = mysql_query($query3);
	if (mysql_num_rows($results3) > 0)
	{

		while($data3 = mysql_fetch_assoc($results3)){

			$list=$list.','.$data3['parent_id'];
			bip($enseigne,$typutil,$mag,$codeutil,$datejma,$data3['parent_id']);
			return $list;
		}
	}
}
?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="height:95vh">
    </div>
  </div>
</div>
