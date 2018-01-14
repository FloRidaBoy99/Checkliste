<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) :
		header("Location:login.php?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	endif;
?>


<?php include 'include/footer.php'; ?>
