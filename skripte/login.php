<?php
	session_start();
	include '../include/mysql.php';

	$kuerzel = $_POST["kuerzel"];
	$passwort = $_POST["passwort"];

	$lehrer = $db -> query("SELECT lehrerid, kuerzel, passwort, admin FROM lehrer WHERE kuerzel = '$kuerzel' AND passwort = '$passwort'");

	if ($lehrer -> num_rows === 1) {
		$user = $lehrer -> fetch_assoc();

		$_SESSION["kuerzel"] = $user["kuerzel"];
		$_SESSION["lehrerid"] = $user["lehrerid"];
		$_SESSION["passwort"] = $user["passwort"];
		$_SESSION["admin"] = $user["admin"];
		header("Location:../index.php");

	} else {
		header("Location:../login.php?msg=".urlencode("Fehler bei der Anmeldung"));
	}
?>
