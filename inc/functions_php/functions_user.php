<?php
// GET USERS
function getUser(PDO $dbconn2, $param1, $param2, $param3){
    // --------------------------------------------MAIN REQUEST------------------------------------------------------------

    // Param1: Condition dans laquel on veut entrer
    // Param2: Le WHERE qu'on souhaite definir

    // Param = 0 pour entrer dans cette condition,
    // Renvoie toutes les users
    if ($param1 == 0) {
        $resultats_user=$dbconn2->prepare("SELECT * FROM principal.pri_users ORDER BY id ASC");
        $resultats_user->execute();

        return $resultats_user->fetchAll(PDO::FETCH_ASSOC);

        $resultats_user = null;
    }
    // Param1 = 1 pour entrer dans cette condition,
    // Renvoie un user specifique
    elseif ($param1 == 1) {

    }
    // Param = 2 pour entrer dans cette condition,
    // Renvoie toutes les users en format json
    elseif ($param1 == 2) {

    }
    // Param = 3 pour entrer dans cette condition,
    // Renvoie un user specifique en format json
    elseif ($param1 == 3) {

    }

    // --------------------------------------------CUSTOM REQUEST------------------------------------------------------------

    // Param = 4 pour entrer dans cette condition,
    // Renvoie les fonctions des users
    elseif ($param1 == 4) {
        $resultats_user_function=$dbconn2->prepare("SELECT * FROM intranet.int_employee_function ORDER BY ordre ASC");
        $resultats_user_function->execute();

        return $resultats_user_function->fetchAll(PDO::FETCH_ASSOC);

        $resultats_user_function = null;
    }
    // Param = 4 pour entrer dans cette condition,
    // Renvoie les civilites des users
    elseif ($param1 == 5) {
        $resultats_user_civility=$dbconn2->prepare("SELECT * FROM intranet.int_civility ORDER BY ordre ASC");
        $resultats_user_civility->execute();

        return $resultats_user_civility->fetchAll(PDO::FETCH_ASSOC);

        $resultats_user_civility = null;
    }
    // Param = 6 pour entrer dans cette condition,
    // Renvoie les typologies des users
    elseif ($param1 == 6) {
        $resultats_user_type=$dbconn2->prepare("SELECT * FROM intranet.int_user_type ORDER BY name ASC");
        $resultats_user_type->execute();

        return $resultats_user_type->fetchAll(PDO::FETCH_ASSOC);

        $resultats_user_type = null;
    }
    // Param = 7 pour entrer dans cette condition,
    // Renvoie les typologies des users en format JSON
    elseif ($param1 == 7) {
        $resultats_user_type=$dbconn2->prepare("SELECT * FROM intranet.int_user_type ORDER BY name ASC");
        $resultats_user_type->execute();

        $json_data=array();//create the array

        foreach($resultats_user_type as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['name']=$rec['name'];

            //here pushing the values in to an array
            array_push($json_data,$json_array);
        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_user_type = null;
    }
    // Param = 8 pour entrer dans cette condition,
    // Renvoie les typologies des users en format JSON
    elseif ($param1 == 8) {
        $resultats_user=$dbconn2->prepare("SELECT * FROM principal.pri_users_detail
                                            WHERE id_society = $param2
                                            AND id_function = $param3
                                            ORDER BY name ASC");
        $resultats_user->execute();

        $json_data=array();//create the array

        foreach($resultats_user as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['name']=$rec['name'];
            $json_array['first_name']=$rec['first_name'];

            //here pushing the values in to an array
            array_push($json_data,$json_array);
        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_user = null;
    }
    // Param = 9 pour entrer dans cette condition,
    // Renvoie les typologies des users en format JSON
    elseif ($param1 == 9) {
        $resultats_user=$dbconn2->prepare("SELECT id, name, first_name, id_store, id_function
                                            FROM principal.pri_users_detail
                                            WHERE (name ILIKE '$param2%')
                                            OR (first_name ILIKE '$param2%')");

        $resultats_user->execute();

        $json_data=array();//create the array

        foreach($resultats_user as $rec)//foreach loop
        {
            $json_array['id']=$rec['id'];
            $json_array['name']=$rec['name'];
            $json_array['first_name']=$rec['first_name'];
            $json_array['id_store']=$rec['id_store'];
            $json_array['id_function']=$rec['id_function'];

            //here pushing the values in to an array
            array_push($json_data,$json_array);
        }

        //built in PHP function to encode the data in to JSON format
        echo json_encode($json_data);

        $resultats_user = null;
    }
}


?>
