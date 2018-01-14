<?php
	session_start();

	include '../include/mysql.php';
	print_r($_POST);
	foreach ($_POST["abgehakt"] as $key => $value) {
		print_r($key);
		print_r($value);
	}
		// header("Location:../checkliste.php?id=".$checklisteid);


?>
