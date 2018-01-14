<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$klasseid = $_POST["klasseid"];
	$bezeichnung = $_POST["bezeichnung"];
	$klassenlehrer = $_POST["klassenlehrer"];
	$klassensprecher = $_POST["klassensprecher"];

	$sql = "UPDATE klasse SET bezeichnung = '$bezeichnung', istklassenlehrer = '$klassenlehrer', istklassensprecher = '$klassensprecher' WHERE klasseid = $klasseid";

	$erg = $db -> query($sql);

	print_r($sql);
	print_r($erg);

	if ($erg) {
		header("Location:../klasse.php?id=".$klasseid);
	}

?>
