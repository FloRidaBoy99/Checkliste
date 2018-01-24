<?php
	session_start();
	include '../include/mysql.php';

	$kuerzel = $_POST["kuerzel"];
	$passwort = $_POST["passwort"];

	$lehrer = $db -> query("SELECT lehrerid, kuerzel, passwort, admin FROM lehrer WHERE kuerzel = '$kuerzel'");
	$user = $lehrer -> fetch_assoc();

	if (password_verify($passwort, $user["passwort"]) && $lehrer -> num_rows === 1) {
		$_SESSION["kuerzel"] = $user["kuerzel"];
		$_SESSION["lehrerid"] = $user["lehrerid"];
		$_SESSION["admin"] = $user["admin"];
		header("Location:../index.php");
	} else {
		header("Location:../login.php?msg=".urlencode("Fehler bei der Anmeldung"));
	}
?>
