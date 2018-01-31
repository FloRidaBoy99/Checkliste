<?php
	session_start();

	include 'include/head.php';

	session_unset();
	session_destroy();

	header("Location:../logout.php");
?>
