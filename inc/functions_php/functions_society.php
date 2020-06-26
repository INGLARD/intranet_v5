<?php
// --------------------------------------------------------------------------------------------------------
// GET SOCIETIES
function getSociety(PDO $dbconn2, $param1, $param2) {
    // Param = 0 pour entrer dans cette condition,
    // Renvoie toutes les sociétés existantes
    if ($param1 == 0) {
        $resultats_enseigne=$dbconn2->prepare("SELECT * FROM principal.pri_company ORDER BY id ASC");
        $resultats_enseigne->execute();

        return $resultats_enseigne->fetchAll(PDO::FETCH_ASSOC);

        $resultats_enseigne = null;

    }
    // Param1 = 1 pour entrer dans cette condition,
    // Param2 = $param2 pour une société specifique,
    elseif ($param1 == 1) {
        $resultats_enseigne=$dbconn2->prepare("SELECT * FROM principal.pri_company WHERE id = $param2");
        $resultats_enseigne->execute();

        return $resultats_enseigne->fetchAll(PDO::FETCH_ASSOC);

        $resultats_enseigne = null;
    }
    // Param1 = 2 pour entrer dans cette condition,
    // Renvoie toutes les sociétés existantes en JSON
    elseif ($param1 == 2) {
        $resultats_enseigne=$dbconn2->prepare("SELECT * FROM principal.pri_company ORDER BY id ASC");
        $resultats_enseigne->execute();

        $json_data=array();//create the array

        // $resultats_enseigne->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultats_enseigne as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['short_name']=$rec['short_name'];
            $json_array['name']=$rec['name'];
            //here pushing the values in to an array
            array_push($json_data,$json_array);

        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_enseigne = null;
    }
    // Param1 = 3 pour entrer dans cette condition,
    // Param2 = $param2 pour une société specifique (format json),
    elseif ($param1 == 3) {
        $resultats_enseigne=$dbconn2->prepare("SELECT * FROM principal.pri_company WHERE id = $param2");
        $resultats_enseigne->execute();

        $json_data=array();//create the array

        // $resultats_enseigne->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultats_enseigne as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['short_name']=$rec['short_name'];
            $json_array['name']=$rec['name'];
            //here pushing the values in to an array
            array_push($json_data,$json_array);

        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_enseigne = null;
    }
}

?>
