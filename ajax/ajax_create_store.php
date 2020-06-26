<?php
include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_store.php');


$code_mag = $_POST['code_mag'];
$id_enseigne_mag = $_POST['id_enseigne_mag'];
$adresse_ip_mag = $_POST['adresse_ip_mag'];
$nom_mag = $_POST['nom_mag'];
$nom_global_mag = $_POST['nom_global_mag'];
$status_mag = $_POST['status_mag'];
$type_mag = $_POST['type_mag'];
$adresse_1_mag = $_POST['adresse_1_mag'];
$adresse_2_mag = $_POST['adresse_2_mag'];
$code_postale_mag = $_POST['code_postale_mag'];
$ville_mag = $_POST['ville_mag'];
$telephone_mag = $_POST['telephone_mag'];
$telephone_portable_mag = $_POST['telephone_portable_mag'];
$fax_mag = $_POST['fax_mag'];
$email_mag = $_POST['email_mag'];
$latitude_mag = $_POST['latitude_mag'];
$longitude_mag = $_POST['longitude_mag'];


$create_magasin = createMag($dbconn2, $code_mag, $id_enseigne_mag, $adresse_ip_mag, $nom_mag, $nom_global_mag, $status_mag, $type_mag, $adresse_1_mag, $adresse_2_mag, $code_postale_mag, $ville_mag, $telephone_mag, $telephone_portable_mag, $fax_mag, $email_mag, $latitude_mag, $longitude_mag);

?>
