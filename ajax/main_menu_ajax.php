<?php
if (session_id() == "") {session_start();}

// CONNECTIONS:
include('../connexion.php');
include('../connexion_postgr.php');
include('../inc/connection/connexion_pdo.php');

// INCLUDES:
include('../inc/fonction.php');
include('../inc/functions_php/functions_document_qhse.php');

$code_enseigne= $_SESSION['codeenseigne'] ;
$code_mag=$_SESSION['magutilisateur'] ;
$type_user=$_SESSION['typeutilisateur'];
$type_user_str= "'$type_user'";
$mycode =$_SESSION['codeutilisateur'];

$menu=$_GET['menu'];
$ut=$_GET['ut'];
$codem=$_GET['codem'];
$titlemenu=$_GET['titlemenu'];
$titlemenu_str="'$titlemenu'";
$link_subname=$_GET['subname'];
$icons_images_val=$_GET['pdfImg'];


if($codem==11 or $codem==16){
    include('../inc/documents_nav_breadcrumb.php');

    if ($codem==11) {
        $param = 0;
    }elseif ($codem==16) {
        $param = 1;
    }

    $cache = 'cache/documents_'.$code_mag.'.html';
    $expire = time() -28800 ; // valable une heure

    if($code_enseigne==0){
        $code_enseigne=5;
    }

    if(file_exists($cache) && filemtime($cache) > $expire)
    {
        readfile($cache);
    }
    else
    {
        ob_start();

        // START---------------------------------------------------------------------------------------------------
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
                                <a class="dropdown-item display_docs_list" href="#" onClick="loadDocsList('.$codem.','.$titlemenu_str.')">List</a>
                                <a class="dropdown-item display_docs_small" href="#" onClick="loadDocsImages('.$codem.','.$titlemenu_str.')">Petites icones</a>
                            </div>
                        </div>
                    </th>
                </tr>
            </table>';

            echo '<div class="files_display">';

                $docs_img = documentsGenerator($dbconn2, $param, $code_enseigne, $type_user_str, $code_mag, $mycode);

                foreach ($docs_img as $data) {
                    $id = $data['id'];
                    $parent_id = $data['parent_id'];
                    $name = str_replace("'", " ",$data['name']);
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
                                    <a class="dropdown-item display_docs_list" href="#" onClick="loadDocsList('.$codem.','.$titlemenu_str.')">List</a>
                                    <a class="dropdown-item display_docs_small" href="#" onClick="loadDocsImages('.$codem.','.$titlemenu_str.')">Petites icones</a>
                                </div>
                            </div>
                        </th>

                    </tr>';

                    $docs = documentsGenerator($dbconn2, $param, $code_enseigne, $type_user_str, $code_mag, $mycode);

                    foreach($docs as $data){
                        $id = $data['id'];
                        $parent_id = $data['parent_id'];
                        $name = str_replace("'", " ",$data['name']);
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

                        }else {

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
                // END---------------------------------------------------------------------------------------------------

            }

            mysql_free_result($results2);
            mysql_free_result($results);
            include("../deconnexion.php");
            $page = ob_get_contents(); // copie du contenu du tampon dans une chaîne
            ob_end_clean(); // effacement du contenu du tampon et arrêt de son fonctionnemen
            file_put_contents($cache, $page) ; // on écrit la chaîne précédemment récupérée ($page) dans un fichier ($cache)
            echo $page ; // on affiche notre page :D
        }

        else{
            include('../inc/documents_nav_breadcrumb.php');

            $query2 = "SELECT m.nom, m.icone, m.nom_affichage, m.nom_page , m.code FROM pri_menusV5 m, users_menus u where m.code_menu_maitre=".$_GET['codem']." and u.code_user = ".$ut." and u.code_menu = m.code order by m.ordre";
            $results2 = mysql_query($query2) or die('Erreur2 <br>');



            if (mysql_num_rows($results2) > 0)
            {
                echo '<div class="intranet_submenu_slide">';
                    while($data2 = mysql_fetch_assoc($results2)){
                        $codem2=$data2['code'];
                        $codemenup=$codem;


                        echo '<div class="Trigger2">
                            <div class="Trigger2_content">
                                <div class="Trigger2_content_img '.$link_subname.'">
                                    <img src="assets/img/img_menu/'.$data2['icone'].'">
                                    <div class="Trigger2_triangle"></div>
                                </div>
                                <div class="Trigger2_content_submenus">';
                                    echo '<p class="submenu_tmenu submenu_'.$link_subname.'">'.$data2['nom_affichage'].'</p>';
                                    $query3 = "SELECT m.nom, m.icone, m.nom_affichage, m.nom_page,m.code FROM pri_menusV5 m, users_menus u where m.code_menu_maitre=".$codem2." and u.code_user = ".$mycode." and u.code_menu = m.code order by m.ordre";
                                    $results3 = mysql_query($query3) or die('Erreur3 <br>');

                                    if (mysql_num_rows($results3) > 0)

                                    {
                                        echo '<ul>';
                                            while($data3 = mysql_fetch_assoc($results3)){
                                                $mainmenu_code3 = $data3["code"];

                                                echo '
                                                <li class="submenu_linkmenu"><i class="glyph-icon icon-elusive-right-circled"></i>&nbsp;<a href="#" onclick="mafoonction('.$codemenup.','.$codem2.','.$data3['code'].',this.id);" data-codem="'.$codemenup.'" data-codemenussp="'.$codem2.'" data-menu="'.$data3['code'].'" data-varmenu="'.$data3['nom_page'].'" id="'.$data3['nom_page'].'" class="ssmenuhp">'.$data3['nom_affichage'].'</a></li>';
                                            }
                                            echo '</ul>';
                                        }
                                        echo '</div>
                                        <br>
                                    </div>
                                </div>';
                            }
                            echo '</div>';
                        }

                    }

                    ?>

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" style="height:95vh">
                            </div>
                        </div>
                    </div>
