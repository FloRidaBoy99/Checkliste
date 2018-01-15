<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	$titel = $_POST["titel"];
	$deadline = $_POST["deadline"];
	$klasse = $_POST["klasse"];
	$lehrer = $_SESSION["lehrerid"];

	$sql = "INSERT INTO checkliste (titel, deadline, erstelldatum, klasse, lehrer) VALUES ('$titel', '$deadline', CURRENT_TIMESTAMP(), '$klasse', '$lehrer')";

	$erg = $db -> query($sql);

	print_r($erg);

	$checklisteid = $db -> getID();
	print_r($checklisteid);


	if ($erg) {

		$schueler_sql = "SELECT * FROM schueler WHERE klasse = $klasse";
		$alle_schueler = $db -> query($schueler_sql);

		while ($schueler = $alle_schueler -> fetch_assoc()) {
			$schuelerid = $schueler["SchuelerID"];

			$eintrag_sql = "INSERT INTO checklisteneintrag (schueler, checkliste) VALUES ($schuelerid, $checklisteid)";
			$eintrag = $db -> query($eintrag_sql);
		}

		header("Location:../checkliste.php?id=".$checklisteid);
	}

?>
