<?php
// GET STORES
function getMag(PDO $dbconn2, $param1, $param2, $param2){
    // --------------------------------------------MAIN REQUEST------------------------------------------------------------

    // Param1: Condition dans laquel on veut entrer
    // Param2: Le WHERE qu'on souhaite definir

    // Param = 0 pour entrer dans cette condition,
    // Renvoie touts les magasins
    if ($param1 == 0) {
        $resultats_magasin=$dbconn2->prepare("SELECT * FROM principal.pri_store ORDER BY id ASC");
        $resultats_magasin->execute();

        return $resultats_magasin->fetchAll(PDO::FETCH_ASSOC);

        $resultats_magasin = null;
    }
    // Param1 = 1 pour entrer dans cette condition,
    // Param2 = $param2(id du magasin) pour un magasin specifique,
    elseif ($param1 == 1) {
        $resultats_magasin=$dbconn2->prepare("SELECT * FROM principal.pri_store WHERE id = $param2");
        $resultats_magasin->execute();

        return $resultats_magasin->fetchAll(PDO::FETCH_ASSOC);

        $resultats_magasin = null;
    }
    // Param1 = 2 pour entrer dans cette condition,
    // Renvoie toutes les magasins en format json
    elseif ($param1 == 2) {
        $resultats_magasin=$dbconn2->prepare("SELECT * FROM principal.pri_store ORDER BY id ASC");
        $resultats_magasin->execute();

        $json_data=array();//create the array

        foreach($resultats_magasin as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            // $json_array['ip_store']=$rec['short_name'];
            $json_array['name']=$rec['name'];

            //here pushing the values in to an array
            array_push($json_data,$json_array);
        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_magasin = null;
    }
    // Param1 = 3 pour entrer dans cette condition,
    // Param2 = $param2(id du magasin) pour un magasin specifique (format json),
    elseif ($param1 == 3) {
        $resultats_magasin=$dbconn2->prepare("SELECT * FROM principal.pri_store WHERE id = $param2");
        $resultats_magasin->execute();

        $json_data=array();//create the array

        foreach($resultats_magasin as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['ip_store']=$rec['ip_store'];
            $json_array['name']=$rec['name'];
            $json_array['name_detail']=$rec['name_detail'];
            $json_array['phone']=$rec['phone'];
            $json_array['mobile_phone']=$rec['mobile_phone'];
            $json_array['fax']=$rec['fax'];
            $json_array['address1']=$rec['address1'];
            $json_array['address2']=$rec['address2'];
            $json_array['zip_code']=$rec['zip_code'];
            $json_array['city']=$rec['city'];
            $json_array['status']=$rec['status'];
            $json_array['id_type']=$rec['id_type'];

            //here pushing the values in to an array
            array_push($json_data,$json_array);
        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_magasin = null;
    }

    // --------------------------------------------CUSTOM REQUEST------------------------------------------------------------

    // Param1 = 4 pour entrer dans cette condition,
    // Param2 = renvoie les magasins par type d'enseigne
    elseif ($param1 == 4) {
        $resultats_magasin=$dbconn2->prepare("SELECT * FROM principal.pri_store WHERE id_company = $param2 order by id");
        $resultats_magasin->execute();

        $json_data=array();//create the array

        foreach($resultats_magasin as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['id_company']=$rec['id_company'];
            $json_array['name']=$rec['name'];

            //here pushing the values in to an array
            array_push($json_data,$json_array);
        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_magasin = null;
    }

    // Param1 = 5 pour entrer dans cette condition,
    // Renvoie les status du magasin
    elseif ($param1 == 5) {
        $resultats_magasin_status=$dbconn2->prepare("SELECT * FROM principal.pri_status_store order by id");
        $resultats_magasin_status->execute();

        return $resultats_magasin_status->fetchAll(PDO::FETCH_ASSOC);

        $resultats_magasin_status = null;
    }

    // Param1 = 6 pour entrer dans cette condition,
    // Renvoie les types de magasins
    elseif ($param1 == 6) {
        $resultats_magasin_type=$dbconn2->prepare("SELECT * FROM principal.pri_type_store order by id");
        $resultats_magasin_type->execute();

        return $resultats_magasin_type->fetchAll(PDO::FETCH_ASSOC);

        $resultats_magasin_type = null;
    }
}


// ----------------------------------------------------------------------------------------------------------------------------
// CREATE STORES
function createMag(PDO $dbconn2, $code_mag, $id_enseigne_mag, $adresse_ip_mag, $nom_mag, $nom_global_mag,
                            $status_mag, $type_mag, $adresse_1_mag, $adresse_2_mag, $code_postale_mag,
                            $ville_mag, $telephone_mag, $telephone_portable_mag, $fax_mag, $email_mag, $latitude_mag, $longitude_mag)
{
    // Param = 0 pour entrer dans cette condition,
    // Verify if store exists if not create new store
    $resultats_magasin_id = $dbconn2->prepare("SELECT id FROM principal.pri_store WHERE id=?");
    $resultats_magasin_id->execute([$code_mag]);
    $id_mag = $resultats_magasin_id->fetch();



    if ($id_mag) {
        echo "Ce code existe déja veillez en saisir un autre svp!";

    }else {
        // create a new store
        $create_magasin = $dbconn2->prepare("INSERT INTO principal.pri_store(id, id_company, ip_store, name, name_detail, phone, mobile_phone, fax, address1, address2, zip_code, city, status, id_type)
            VALUES (:id, :id_company, :ip_store, :name, :name_detail, :phone, :mobile_phone, :fax, :address1, :address2, :zip_code, :city, :status, :id_type)");

        $create_magasin->bindParam(':id', $code_mag);
        $create_magasin->bindParam(':id_company', $id_enseigne_mag);
        $create_magasin->bindParam(':ip_store', $adresse_ip_mag);
        $create_magasin->bindParam(':name', $nom_mag);
        $create_magasin->bindParam(':name_detail', $nom_global_mag);
        $create_magasin->bindParam(':phone', $telephone_mag);
        $create_magasin->bindParam(':mobile_phone', $telephone_portable_mag);
        $create_magasin->bindParam(':fax', $fax_mag);
        $create_magasin->bindParam(':address1', $adresse_1_mag);
        $create_magasin->bindParam(':address2', $adresse_2_mag);
        $create_magasin->bindParam(':zip_code', $code_postale_mag);
        $create_magasin->bindParam(':city', $ville_mag);
        $create_magasin->bindParam(':status', $status_mag);
        $create_magasin->bindParam(':id_type', $type_mag);

        $create_magasin->execute();
        $create_magasin = null;

        echo "créé avec succès";
    }

}


// ----------------------------------------------------------------------------------------------------------------------------
//EDIT STORES
function editMag(PDO $dbconn2, $code_mag, $id_enseigne_mag, $adresse_ip_mag, $nom_mag, $nom_global_mag,
                            $status_mag, $type_mag, $adresse_1_mag, $adresse_2_mag, $code_postale_mag,
                            $ville_mag, $telephone_mag, $telephone_portable_mag, $fax_mag, $email_mag, $latitude_mag, $longitude_mag)
{



    // update existing store
    $update_magasin = $dbconn2->prepare("UPDATE principal.pri_store
                                        SET id_company= :id_company, ip_store= :ip_store, name= :name, name_detail= :name_detail, phone= :phone, mobile_phone= :mobile_phone, fax= :fax, address1= :address1, address2= :address2, zip_code= :zip_code, city= :city, status= :status, id_type= :id_type
                                        WHERE id= :id");

    $update_magasin->bindParam(':id', $code_mag);
    $update_magasin->bindParam(':id_company', $id_enseigne_mag);
    $update_magasin->bindParam(':ip_store', $adresse_ip_mag);
    $update_magasin->bindParam(':name', $nom_mag);
    $update_magasin->bindParam(':name_detail', $nom_global_mag);
    $update_magasin->bindParam(':phone', $telephone_mag);
    $update_magasin->bindParam(':mobile_phone', $telephone_portable_mag);
    $update_magasin->bindParam(':fax', $fax_mag);
    $update_magasin->bindParam(':address1', $adresse_1_mag);
    $update_magasin->bindParam(':address2', $adresse_2_mag);
    $update_magasin->bindParam(':zip_code', $code_postale_mag);
    $update_magasin->bindParam(':city', $ville_mag);
    $update_magasin->bindParam(':status', $status_mag);
    $update_magasin->bindParam(':id_type', $type_mag);

    $update_magasin->execute();
    $update_magasin = null;

    echo "Magasin mis à jour";
}




?>
