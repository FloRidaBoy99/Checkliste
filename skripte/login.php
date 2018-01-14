<?php
	session_start();
	include '../include/mysql.php';

	$kuerzel = $_POST["kuerzel"];
	$passwort = $_POST["passwort"];

	$erg = $db -> query("SELECT lehrerid, kuerzel, passwort FROM lehrer WHERE kuerzel = '$kuerzel' AND passwort = '$passwort'");

	if ($erg -> num_rows === 1) {
		$user = $erg -> fetch_assoc();

		$_SESSION["kuerzel"] = $user["kuerzel"];
		$_SESSION["lehrerid"] = $user["lehrerid"];
		$_SESSION["passwort"] = $user["passwort"];
		header("Location:../index.php");

	} else {
		header("Location:../login.php?msg=".urlencode("Fehler bei der Anmeldung"));
	}
?>
