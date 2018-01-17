<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$klasseid = $_POST["klasseid"];
	$bezeichnung = $_POST["bezeichnung"];

	$sql = "DELETE FROM klasse WHERE klasseid = $klasseid AND bezeichnung = '$bezeichnung'";

	$erg = $db -> query($sql);

	print_r($erg);

	header("Location:../klasse_uebersicht.php");
?>
