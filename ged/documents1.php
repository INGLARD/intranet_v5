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
header('Content-type: '.$type);

if(($type!='application/pdf') && (substr($type,0,5)!='image')){
	header('Last-Modified: '. $date . ' GMT');
	header('Expires: ' . $date);
	header('Pragma: no-cache');

	$texft=str_replace(' ','',$file);
	header("Content-Disposition: attachment; filename=$texft");
}

//header('Content-disposition: inline; filename="'.row['name'];.'"');
//header('Content-Length: '.$size);
//header('Content-Transfer-Encoding: binary');
//header('Accept-Ranges: bytes');
//header('Content-Range: bytes ' . $start . '-' . $end . '/' . $size);

echo $bytes;
//readfile($bytes);
//echo '<iframe type="application/pdf" src="'.$bytes.'"></iframe>';



  ?>
