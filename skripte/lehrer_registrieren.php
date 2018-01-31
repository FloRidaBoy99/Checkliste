<?php
	include '../include/mysql.php';
	require '../include/password.php';

	$vorname = $_POST["vorname"];
	$nachname = $_POST["nachname"];
	$passwort = $_POST["passwort"];
	$passwort2 = $_POST["passwort2"];
	$kuerzel = $_POST["kuerzel"];

	if ($passwort === $passwort2) {
		$hash = password_hash($passwort, PASSWORD_DEFAULT);

		$sql = "INSERT INTO lehrer (vorname, nachname, passwort, kuerzel) VALUES ('$vorname', '$nachname', '$hash', '$kuerzel')";

		$erg = $db -> query($sql);

		if ($erg) {
			header("Location:../login.php?msg=".urlencode("Sie wurden registriert. Bitte loggen Sie sich ein."));
		}
	} else {
		header("Location:../lehrer_registrieren.php?msg=".urlencode("Ihre Passwörter stimmten nicht überein du Vollidiot."));
	}

?>
