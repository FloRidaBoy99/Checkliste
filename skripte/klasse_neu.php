<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$bezeichnung = $_POST["bezeichnung"];
	$klassenlehrer = $_POST["klassenlehrer"];

	if (empty($klassenlehrer)) {
		$sql = "INSERT INTO klasse (bezeichnung) VALUES ('$bezeichnung')";
	} else {
		$sql = "INSERT INTO klasse (bezeichnung, istklassenlehrer) VALUES ('$bezeichnung', '$klassenlehrer')";
	}

	$erg = $db -> query($sql);

	print_r($erg);

	if ($erg) {
		header("Location:../klasse.php?id=".$db->getID());
	}

?>
