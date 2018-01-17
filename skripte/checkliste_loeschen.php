<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$checklisteid = $_POST["checklisteid"];

	$sql_eintraege = "DELETE FROM checklisteneintrag WHERE checkliste = $checklisteid";
	$sql = "DELETE FROM checkliste WHERE checklisteid = $checklisteid";

	$erg_eintraege = $db -> query($sql_eintraege);
	$erg = $db -> query($sql);

	print_r($erg_eintraege);
	print_r($erg);

	header("Location:../checklisten_uebersicht.php");
?>
