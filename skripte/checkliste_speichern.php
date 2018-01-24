<?php
	session_start();

	include '../include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:../login?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	}

	function checkStatus($arr)
	{
		foreach ($arr as $value) {
			if ($value === 0) {
				return false;
			}
		}
		return true;
	}

	$checkliste = $_POST["checklisteid"];
	$status = array();

	$alle_eintraege_sql = "SELECT checklisteneintragid FROM checklisteneintrag WHERE checkliste = $checkliste";
	$alle_eintraege = $db -> query($alle_eintraege_sql);

	while ($eintrag = $alle_eintraege -> fetch_assoc()) {
		$id = $eintrag["checklisteneintragid"];

		if (!empty($_POST["abgehakt"])) {
			$abgehakt = !empty($_POST["abgehakt"][$id]) && $_POST["abgehakt"][$id] === "on" ? 1 : 0;
		} else {
			$abgehakt = 0;
		}

		array_push($status, $abgehakt);

		$eintrag_neu_sql = "UPDATE checklisteneintrag SET abgehakt = $abgehakt WHERE checklisteneintragid = $id";
		$eintrag_neu = $db -> query($eintrag_neu_sql);
	}


	if (checkStatus($status)) {
		$status_sql = "UPDATE checkliste SET status = 1 WHERE checklisteid = $checkliste";
		$status = $db -> query($status_sql);
	} else {
		$status_sql = "UPDATE checkliste SET status = 0 WHERE checklisteid = $checkliste";
		$status = $db -> query($status_sql);
	}

	header("Location:../checklisten_uebersicht.php");


?>
