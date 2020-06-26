<?php
if (session_id() == "") {session_start();}
require_once('../inc/connection/connexion_pdo.php');

$mycode = $_SESSION['codeutilisateur'];
$code_enseigne = $_SESSION['codeenseigne'] ;
$mag_util = $_SESSION['magutilisateur'] ;
$typ_util = $_SESSION['typeutilisateur'];

$my_theme_id  = $_GET['test'];
try {
	$stmt2 = $dbconn2->prepare("SELECT * FROM intranet.int_user_theme WHERE id_user=?");
	$stmt2->execute([$mycode]);
	$user = $stmt2->fetch();

	// Check if user exist in data base custom theme
	if ($user) {
		try {

			$stmt = $dbconn2->prepare("UPDATE intranet.int_user_theme SET id_theme= :theme WHERE id_user= :id");

			$stmt->bindParam(':theme', $my_theme_id);
			$stmt->bindParam(':id', $mycode);

			$stmt->execute();

		} catch (PDOException $e) {

			print "Error!: " . $e->getMessage() . "<br/>";
			die();

		}
	} else {
		try {
			$stmt = $dbconn2->prepare("INSERT INTO intranet.int_user_theme(id_user, id_theme) VALUES (:id, :theme)");

			$stmt->bindParam(':id', $mycode);
			$stmt->bindParam(':theme', $my_theme_id);

			$stmt->execute();

		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();

		}
	}
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();

}

$dbconn2 = null;

?>
