<?php
	session_start();
	include '../include/mysql.php';
	require '../include/password.php';

	if (!$db -> checkLogin($_SESSION) && $_SESSION["admin"] !== "1") {
		header("Location:../checklisten_uebersicht.php?msg=".urlencode("Fehler: Sie besitzen nicht die nötigen Rechte"));
		exit;
	}

	$vorname = $_POST["vorname"];
	$nachname = $_POST["nachname"];
	$passwort = $_POST["passwort"];
	$kuerzel = $_POST["kuerzel"];

	$hash = password_hash($passwort, PASSWORD_DEFAULT);

	$sql = "INSERT INTO lehrer (vorname, nachname, passwort, kuerzel) VALUES ('$vorname', '$nachname', '$hash', '$kuerzel')";

	$erg = $db -> query($sql);

	if ($erg) {
		header("Location:../admin.php");
	}

?>
