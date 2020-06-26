<?php
if (session_id() == "") {session_start();}

// DOSSIER POUR AFFICHER LES DOSSIER RACINES AUTORISE POUR L'UTILISATEUR
function documentsGenerator(PDO $dbconn2, $param, $code_enseigne, $type_user, $code_mag, $mycode) {
    // DOSSIER PRINCIPAL AUQUEL LE USER A DROIT
    $resultats_main_folders=$dbconn2->prepare("SELECT f.id
                                                FROM intranet.elfinder_droits d, intranet.elfinder_file f
                                                WHERE d.id = f.id
                                                AND niveau = 0
                                                AND (code_enseigne=$code_enseigne or code_enseigne=0)
                                                AND (type_user=$type_user or type_user='')
                                                AND (id_magasin=$code_mag or id_magasin=0)
                                                AND (id_user=$mycode or id_user=0)
                                                ORDER BY f.id");

    $resultats_main_folders->execute();
    $resultats_main_folders->setFetchMode(PDO::FETCH_OBJ);
    $main_folder_ids = "";

    while($folder = $resultats_main_folders->fetch())
    {
        $folder_id=$folder->id;
        $main_folder_ids = $main_folder_ids.$folder_id.',';
    }

    $main_folder_ids=rtrim($main_folder_ids,", ");
    $resultats_main_folders = null;

    // DOSSIER AUTORISE POUR L'UTILISATEUR
    $sql_query = "";
    // PARAM = 0 for DOCUMENTS
    if ($param == 0) {
        $sql_query = "SELECT f.id, f.parent_id, f.name, f.mime, f.mtime, 1 AS order
                        FROM intranet.elfinder_droits d, intranet.elfinder_file f
                        WHERE d.id = f.id
                        AND niveau = 1
                        AND f.parent_id in ($main_folder_ids)
                        AND (code_enseigne=$code_enseigne or code_enseigne=0)
                        AND (type_user=$type_user or type_user='')
                        AND (id_magasin=$code_mag or id_magasin=0)
                        AND (id_user=$mycode or id_user=0)
                        GROUP BY f.id

                        UNION

                        SELECT f.id, f.parent_id, f.name, f.mime, f.mtime, 2 AS order
                        FROM intranet.elfinder_droits d, intranet.elfinder_file f
                        WHERE f.parent_id in ($main_folder_ids)
                        AND mime != 'directory'
                        AND (code_enseigne=$code_enseigne or code_enseigne=0)
                        AND (type_user=$type_user or type_user='')
                        AND (id_magasin=$code_mag or id_magasin=0)
                        AND (id_user=$mycode or id_user=0)
                        GROUP BY f.id

                        ORDER BY 6, mime, name";

    }
    // PARAM = 1 for QHSE
    elseif ($param == 1) {
        $sql_query = "SELECT f.id, f.parent_id, f.name, f.mime, f.mtime
                        FROM intranet.elfinder_droits d, intranet.elfinder_file f
                        WHERE d.id = f.id
                        AND niveau = 1
                        AND f.name='QHSE'
                        AND parent_id in ($main_folder_ids)
                        AND (code_enseigne=$code_enseigne or code_enseigne=0)
                        AND (type_user=$type_user or type_user='')
                        AND (id_magasin=$code_mag or id_magasin=0)
                        AND (id_user=$mycode or id_user=0)
                        ORDER BY f.id";
    }

    $resultats_documents_folders=$dbconn2->prepare($sql_query);
    $resultats_documents_folders->execute();
    return $resultats_documents_folders->fetchAll(PDO::FETCH_ASSOC);
    $resultats_documents_folders = null;
}


// --------------------------------------------------------------------------------------------------------------
// FONCTION POUR OUVRIR LES DOSSIER
function documentFolderOpener(PDO $dbconn2, $folder_id, $code_enseigne, $type_user, $code_mag, $mycode)
{
    // SOUS-DOSSIER AUQUEL LE USER A DROIT
    $resultats_folder_content = $dbconn2->prepare("SELECT f.id, f.parent_id, f.name, f.mime, f.mtime
                                                    FROM intranet.elfinder_droits d, intranet.elfinder_file f
                                                    WHERE f.parent_id = $folder_id
                                                    AND d.niveau = 1
                                                    AND (d.code_enseigne=$code_enseigne or d.code_enseigne=0)
                                                    AND (d.type_user=$type_user or d.type_user='')
                                                    AND (d.id_magasin=$code_mag or d.id_magasin=0)
                                                    AND (d.id_user = $mycode or d.id_user=0)

                                                    AND (((
                                                    	SELECT COUNT(g.*)
                                                    	FROM intranet.elfinder_file g
                                                    	WHERE g.parent_id = f.id

                                                    ) > 0) OR (f.mime <> 'directory'))

                                                    GROUP BY f.id, f.name
                                                    ORDER BY
                                                        CASE WHEN mime = 'directory' then mime END ASC");


    $resultats_folder_content->execute();
    return $resultats_folder_content->fetchAll(PDO::FETCH_ASSOC);
    $resultats_folder_content = null;
}

?>
