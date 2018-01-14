<?php
	include '../include/mysql.php';

	$vorname = $_POST["vorname"];
	$nachname = $_POST["nachname"];
	$password = $_POST["password"];
	$kuerzel = $_POST["kuerzel"];

	$sql = "INSERT INTO lehrer (vorname, nachname, passwort, kuerzel) VALUES ('$vorname', '$nachname', '$password', '$kuerzel')";

	$erg = $db -> query($sql);

	if ($erg) {
		header("Location:../admin.php");
	}

?>
