<?php
	include 'include/head.php';

	session_unset();
	session_destroy();
?>

	<?php if (empty($_SESSION)): ?>
		<h1>Bis bald!</h1>
	<?php else: ?>
		<h1>Irgendetwas hat nicht funktioniert :-(</h1>
	<?php endif; ?>

<?php include 'include/footer.php'; ?>
