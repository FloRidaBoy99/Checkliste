<?php include 'include/head.php'; ?>

<h1>Anmeldung - Checkliste</h1>

<form action="skripte/login.php" method="post">

	<label>
		Name:
		<input type="text" name="username">
	</label>

	<label>
		Passwort:
		<input type="password" name="password">
	</label>

	<input type="submit" value="Absenden">
</form>

<?php include 'include/footer.php'; ?>
