<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$lehrerid = $_POST["lehrerid"];

	// $sql_eintraege = "DELETE FROM checklisteneintrag WHERE checkliste = (SELECT checklistenid FROM )"
	// $sql_schueler = "DELETE FROM schueler WHERE klasse = (SELECT klasseid FROM klasse WHERE istklassenlehrer = $lehrerid GROUP BY istklassenlehrer)";
	// $sql_klasse = "DELETE FROM klasse WHERE istklassenlehrer = $lehrerid";

	$erg_schueler = $db -> query($sql_schueler);
	$erg_klasse = $db -> query($sql_klasse);

	print_r($erg_schueler);
	print_r($erg_klasse);

	// header("Location:../klasse_uebersicht.php");
?>
