<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) {
		header("Location:login.php");
	} else {
		header("Location:checklisten_uebersicht.php");
	}
?>

<?php include 'include/footer.php'; ?>
