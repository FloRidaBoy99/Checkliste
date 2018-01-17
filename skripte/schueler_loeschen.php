<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$schuelerid = $_POST["schuelerid"];
	$sql_klasse = "SELECT * FROM Klasse WHERE istklassensprecher = $schuelerid";
	$erg_klasse = $db -> query($sql_klasse);

	if ($erg_klasse -> num_rows === 1) {
		$db -> query("UPDATE klasse SET istKlassensprecher = NULL WHERE istklassensprecher = $schuelerid");
	}

	$sql_eintraege = "DELETE FROM checklisteneintrag WHERE schueler = $schuelerid";
	$sql = "DELETE FROM schueler WHERE schuelerid = $schuelerid";

	$erg1 = $db -> query($sql_eintraege);
	$erg2 = $db -> query($sql);

	print_r($erg1);
	print_r($erg2);

	header("Location:../schueler_uebersicht.php");
?>
