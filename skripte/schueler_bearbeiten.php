<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$schuelerid = $_POST["schuelerid"];
	$vorname = $_POST["vorname"];
	$nachname = $_POST["nachname"];
	$geburtsdatum = $_POST["geburtsdatum"];
	$klasse = $_POST["klasse"];

	$sql = "UPDATE schueler SET vorname = '$vorname', nachname = '$nachname', geburtsdatum = '$geburtsdatum', klasse = $klasse WHERE schuelerid = $schuelerid";

	$erg = $db -> query($sql);

	print_r($sql);
	print_r($erg);

	if ($erg) {
		header("Location:../schueler.php?id=".$schuelerid);
	}

?>
