<?php if (session_id() == "") {session_start();}

include('../inc/connection/connexion_pdo.php');
include('../inc/functions_php/functions_society.php');

$mycode =$_SESSION['codeutilisateur'];
$typeuser=$_SESSION['typeutilisateur'];
$codemag = $_SESSION['magutilisateur'];
$codeens=$_SESSION['codeenseigne'];
$ncenseigne=mb_strtolower($_SESSION['ncenseigneutilisateur']);

$dateactu=date('d/m/Y');
setlocale(LC_TIME, "fr_FR");
?>

<style media="screen">
#mapid {
    height: 65vh;
}
</style>

<div class="contentint">
    <div class="row">
        <div class='row search_nav_maps col-sm-12 col-lg-4'>
            <div class="block-content backgroundflitre">
                <div class="row">
                    <div class="form-group row col-sm-12">
                        <label class="col-sm-2 col-form-label" for="inline_form_enseingne_select">Ville:</label>
                        <div class="col-sm-6">
                            <select class="custom-select" id="" >
                                <option  value="99999" selected>Ville...</option>
                                <option  value="0">france</option>
                                <?php
                                // from functions_society.php
                                $ville = getTowns($dbconn2);

                                foreach($ville as $item){
                                    $name = $item['nom'];
                                    echo '<option>'.$name.'</option>';

                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" id="" class="btn btn-info btn-lg btn-block">Chercher</button>
                        </div>
                    </div>

                    <div class="form-group row col-sm-12">
                        <label class="col-sm-2 col-form-label" for="inline_form_enseingne_select">Région:</label>
                        <div class="col-sm-6">
                            <select class="custom-select" id="" >
                                <option  value="99999" selected>Région...</option>
                                <option  value="0">france</option>
                                <?php
                                // from functions_society.php
                                $ville = getTowns($dbconn2);

                                foreach($ville as $item){
                                    $name = $item['nom'];
                                    echo '<option>'.$name.'</option>';

                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" id="" class="btn btn-info btn-lg btn-block">Chercher</button>
                        </div>
                    </div>

                    <div class="form-group row col-sm-12">
                        <label class="col-sm-4 col-form-label" for="inline_form_enseingne_select">Mes boulangeries:</label>
                        <div class="col-sm-8">
                            <button type="button" id="" class="btn btn-info btn-lg btn-block">Chercher</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-sm-12 col-lg-8" id="mapid"></div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        var map = L.map('mapid', {
            center: [46.71109, 1.7191036],
            zoom: 6
        });

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marieBlachereIcon = L.icon({
            iconUrl: './assets/img/logo_mb.png',


            iconSize:     [25, 25], // size of the icon
            // shadowSize:   [50, 64], // size of the shadow
            // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            // shadowAnchor: [4, 62],  // the same for the shadow
            // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        // test
        // var markertest = L.marker([46.71109, 1.7191036], {icon: marieBlachereIcon}).addTo(map);

        // var markertest = L.marker([46.71109, 1.7191036]).addTo(map);
        // markertest.bindPopup("<b>Hello world!</b><br>I am a popup.");

        <?php
        // Connexion à MySQL

        $db = mysql_connect('192.168.100.155', 'info', 'i03@intranet');
        mysql_query("SET NAMES UTF8");
        mysql_select_db('intranet',$db);

        $sql = "SELECT code, nom, latitude, longitude, adresse1, adresse2, cp, ville, num_tel, num_fax, email FROM pri_magasins WHERE latitude != 0 and longitude != 0 and latitude is not null and longitude is not null ORDER BY ville";

        // on envoie la requ�te
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
        $rows = mysql_num_rows($req);
        // on fait une boucle qui va faire un tour pour chaque enregistrement
        while($data = mysql_fetch_array($req))
        {
            $nom = $data['nom'];
            $latitude = $data['latitude'];
            $longitude = $data['longitude'];
            $adresse1 = $data['adresse1'];
            $adresse2 = $data['adresse2'];
            $code = $data['code'];
            $tel = $data['num_tel'];
            $num_fax = $data['num_fax'];
            $email = $data['email'];

            // $toremove = array("'", "\"");
            //
            // $test8 = str_replace("'", "\"", $adresse1);
            // $test9 = str_replace("'", "", $test8);

            echo 'var marker = L.marker(['.$latitude.', '.$longitude.'], {icon: marieBlachereIcon}).addTo(map);';
            echo 'marker.bindPopup("<b>'.$nom.'</b><i></i><p>tel: '.$tel.'</p><p>fax: '.$num_fax.'</p><p>email: '.$email.'</p>");';

        }
        // on ferme la connexion mysql
        mysql_close();

        ?>
    });
</script>

<!-- "<b>'.$nom.'</b><p>tel: '.$tel.'</p><p>email: '.$email.'</p>" -->
<!-- <b>'.$nom.'</b><br><i>'.$adresse1.'</i><p>tel: '.$tel.'</p><p>email: '.$email.'</p> -->
