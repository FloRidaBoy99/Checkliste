<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$lehrerid = $_POST["lehrerid"];

	$sql_lehrer = "DELETE FROM lehrer WHERE lehrerid = $lehrerid";

	$erg_lehrer = $db -> query($sql_lehrer);

	if (!$erg_lehrer) {
		header("Location:../admin.php?msg=".urlencode("Es gab einen Fehler. Der Lehrer konnte nicht gelöscht werden"));
	} else {
		header("Location:../admin.php?msg=".urlencode("Der Lehrer wurde erfolgreich gelöscht"));
	}

?>
