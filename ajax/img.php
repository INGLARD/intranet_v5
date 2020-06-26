<?php
include('../inc/connection/connexion.php');
$date = gmdate('D, d M Y H:i:s');
$id=$_GET['id'];

$start=0;
$gotten = @mysql_query("select * from elfinder_file where id = ".$id);
//echo "select * from elfinder_file where id = ".$id;
$row = @mysql_fetch_assoc($gotten);
$bytes = $row['content'];
$type=$row['mime'];
$end=$row['size']-1;
$size=$row['size'];
$file=$row['name'];

$color = "red";
$width = "2px";
$height = "2px";

header('Content-type: '.$type);
//echo $bytes;
$image = new Imagick();
$image->readimageblob($bytes);
$image->setFirstIterator(); //renvoie la premier page du pdf
$image->setImageFormat("jpeg");
$image->setSize(80,60);


echo $image;

// $image->setResolution( 300, 300 );
// $image->setImageFormat( "png" );
// $image->writeImage('../assets/img/thumb/newfilename.png');


?>
