<?php include 'include/head.php'; ?>

	<div class="content">
	<?php if (empty($_SESSION)): ?>
		<h1>Bis bald!</h1>
	<?php else: ?>
		<h1>Irgendetwas hat nicht funktioniert :-(</h1>
	<?php endif; ?>
</div>

<?php include 'include/footer.php'; ?>
