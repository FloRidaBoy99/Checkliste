<?php
	include '../include/mysql.php';

	$name = $_POST["username"];
	$password = $_POST["password"];

	$erg = $db -> query("SELECT 1+1");
	print_r($erg);
?>
