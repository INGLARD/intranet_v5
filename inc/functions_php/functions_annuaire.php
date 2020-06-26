<?php
// GET STORES
function getAnnuaire(PDO $dbconn2, $param1, $param2){
    // --------------------------------------------MAIN REQUEST------------------------------------------------------------

    // Param1: Condition dans laquel on veut entrer
    // Param2: Le WHERE qu'on souhaite definir

    // Param = 0 pour entrer dans cette condition,
    // Renvoie toutes les sociétés existantes
    if ($param1 == 0) {
        $resultats_annuaire=$dbconn2->prepare("SELECT * FROM principal.pri_company ORDER BY id ASC");
        $resultats_annuaire->execute();

        return $resultats_annuaire->fetchAll(PDO::FETCH_ASSOC);

        $resultats_annuaire = null;

    }
    // // Param = 1 pour entrer dans cette condition,
    // // Renvoie touts les magasins par type de société
    elseif ($param1 == 1) {
        $resultats_annuaire=$dbconn2->prepare("SELECT * FROM principal.pri_store WHERE id_company = $param2 order by id");
        $resultats_annuaire->execute();

        $json_data=array();//create the array

        foreach($resultats_annuaire as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['name']=$rec['name'];

            //here pushing the values in to an array
            array_push($json_data,$json_array);
        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_annuaire = null;

    }
    // Param1 = 2 pour entrer dans cette condition,
    // Renvoie touts les fonction utilisateur par type de société
    elseif ($param1 == 2) {
        $resultats_annuaire=$dbconn2->prepare("SELECT * FROM intranet.int_employee_function WHERE id_society = $param2 ORDER BY ordre ASC");
        $resultats_annuaire->execute();

        $json_data=array();//create the array

        foreach($resultats_annuaire as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['id_society']=$rec['id_society'];
            $json_array['name']=$rec['name'];

            //here pushing the values in to an array
            array_push($json_data,$json_array);
        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_annuaire = null;
    }
    elseif ($param1 == 3) {
         $resultats_user=$dbconn2->prepare("SELECT * FROM principal.pri_users WHERE id_enseigne_mysql=$param2 ORDER BY login ASC");
        $resultats_user->execute();

        $json_data=array();//create the array

        foreach($resultats_user as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['id_enseigne_mysql']=$rec['id_enseigne_mysql'];
            $json_array['login']=$rec['login'];

            //here pushing the values in to an array
            array_push($json_data,$json_array);
        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_user = null;
    }
}




?>
