<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$vorname = $_POST["vorname"];
	$nachname = $_POST["nachname"];
	$geburtsdatum = $_POST["geburtsdatum"];
	$klasse = $_POST["klasse"];

	$sql = "INSERT INTO schueler (vorname, nachname, geburtsdatum, klasse) VALUES ('$vorname', '$nachname', '$geburtsdatum', '$klasse')";

	$erg = $db -> query($sql);

	print_r($erg);

	if ($erg) {
		header("Location:../schueler.php?id=".$db->getID());
	}

?>
