<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$titel = $_POST["titel"];
	$deadline = $_POST["deadline"];
	$checklisteid = $_POST["checklisteid"];

	$sql = "UPDATE checkliste SET titel = '$titel', deadline = '$deadline' WHERE checklisteid = $checklisteid";

	$erg = $db -> query($sql);

	print_r($sql);
	print_r($erg);

	if ($erg) {
		header("Location:../checkliste.php?id=".$checklisteid);
	}

?>
