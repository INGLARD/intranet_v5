<?php
if (session_id() == "") {session_start();}
$code_enseigne= $_SESSION['codeenseigne'] ;
$code_mag=$_SESSION['magutilisateur'] ;
$type_user=$_SESSION['typeutilisateur'];
$type_user_str= "'$type_user'";
$mycode =$_SESSION['codeutilisateur'];
$codemd5=$_SESSION['md5utilisateur'];

$icons_images_val=$_GET['pdfImg'];
$name=$_GET['name'];
$id=$_GET['id'];
$codem=$_GET['codem'];
$titlemenu=$_GET['titlemenu'];
$titlemenu_str="'$titlemenu'";


include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_document_qhse.php');
include('../inc/documents_nav_breadcrumb.php');


if ($icons_images_val == 1) {

    echo '<input id="filter_docs_qhse_img" type="text" placeholder="Rechercher..." onkeyup="docsQhseSearchImg()">';
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
    <a class="dropdown-item display_docs_list" href="#" onClick="loadDocsList('.$codem.','.$titlemenu_str.','.$id.')">List</a>
    <a class="dropdown-item display_docs_small" href="#" onClick="loadDocsImages('.$codem.','.$titlemenu_str.','.$id.')">Petites icones</a>
    </div>
    </div>
    </th>
    </tr>
    </table>';

    echo '<div class="files_display">';
    echo '<div>
    <i class="icon-elusive-left-circled" onClick="returnToParentFolder('.$codem.','.$titlemenu_str.')"></i>
    </div>';

    $docs_img = documentFolderOpener($dbconn2, $id, $code_enseigne, $type_user_str, $code_mag, $mycode);

    foreach ($docs_img as $data) {
        $id = $data['id'];
        $parent_id = $data['parent_id'];
        $name = $data['name'];
        $name2="'$name'";
        $date_creation = $data["mtime"];
        $mime = $data["mime"];

        if ($mime == 'directory') {
            echo '<div class="parent_id_container docs_qhse_img">
                <i class="format-folder" onClick="docsAndQhseNavConstruct('.$name2.','.$id.','.$parent_id.','.$codem.','.$titlemenu_str.')"></i>
                <p>'.$name.'</p>
            </div>';
        }
        else {
            echo '<div class="docs_qhse_img">
                <img src="ajax/img.php?id='.$id.'">
                <p>'.$name.'</p>
            </div>';
        }
    }

    echo '</div>';
}
else {
    echo '<input id="filter_docs_qhse" type="text" placeholder="Rechercher..." onkeyup="docsQhseSearch()">';
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
                        <a class="dropdown-item display_docs_list" href="#" onClick="loadDocsList('.$codem.','.$titlemenu_str.','.$id.')">List</a>
                        <a class="dropdown-item display_docs_small" href="#" onClick="loadDocsImages('.$codem.','.$titlemenu_str.','.$id.')">Petites icones</a>
                    </div>
                </div>
            </th>

        </tr>';

        echo '<tr>
            <th><i class="icon-elusive-left-circled" onClick="returnToParentFolder('.$codem.','.$titlemenu_str.')"></i></th>
            <th><a class="returnParentFolder">. .</a></th>
            <th></th>
            <th></th>
        </tr>';

        $docs = documentFolderOpener($dbconn2, $id, $code_enseigne, $type_user_str, $code_mag, $mycode);

        foreach($docs as $data){
            $id = $data['id'];
            $parent_id = $data['parent_id'];
            $name = str_replace("'", " ",$data['name']);
            // $name = addslashes($data['name']);
            $name2="'$name'";
            $date_creation = $data["mtime"];
            $mime = $data["mime"];

            if ($mime == 'directory') {
                echo '<tr class="docs_qhse_tr">
                    <td><i class="format-folder"></i></td>
                    <td><a href="#" class="folder_files parent_id_container" onClick="docsAndQhseNavConstruct('.$name2.','.$id.','.$parent_id.','.$codem.','.$titlemenu_str.')">'. $name .'</a>
                    </td>
                    <td>'. date('d/m/Y', $date_creation).'</td>
                    <td></td>
                </tr>';

            }
            else {

                if ($mime == 'application/pdf') {
                    $list_icon = '<i class="format-pdf-file-format-symbol pdf_file_color"></i>';
                }
                elseif ($mime == 'application/msword') {
                    $list_icon = '<i class="format-doc-file-format word_file_color"></i>';
                }
                elseif ($mime == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                    $list_icon = '<i class="format-doc-file-format word_file_color"></i>';
                }
                elseif ($mime == 'application/vnd.ms-excel') {
                    $list_icon = '<i class="format-xlsx-file-format-extension exel_file_color"></i>';
                }
                elseif ($mime == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                    $list_icon = '<i class="format-xlsx-file-format-extensionl exel_file_color"></i>';
                }
                elseif ($mime == 'application/zip') {
                    $list_icon = '<i class="format-zip-file-format zip_file_color"></i>';
                }
                elseif ($mime == 'image/jpeg' || $mime == 'image/png') {
                    $list_icon = '<i class="format-frame-landscape image_file_color"></i>';
                }
                else {
                    $list_icon = '<i class="icon-iconic-help unknown_file_color"></i>';
                }

                echo '<tr class="docs_qhse_tr">
                    <td>'. $list_icon .'</td>
                    <td><a class="doclive" href="#" data-toggle="modal" data-target=".bd-example-modal-lg" onClick="displayPdfContent('.$id.')">'. $name .'</a></td>
                    <td>'. date('d/m/Y',$date_creation) .'</td>
                    <td><i class="icon-elusive-download-alt view_download_icon"></i></td>
                </tr>';
            }

        }

        echo '</table>';

    }

    ?>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="height:95vh">
            </div>
        </div>
    </div>
