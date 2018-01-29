<?php include 'include/head.php'; ?>

<div class="content">
	<h1>Anmeldung - Checkliste</h1>

	<?php if(!empty($_GET["msg"])) : ?>
		<div class="alert">
			<?php echo $_GET["msg"]; ?>
		</div>
	<?php endif; ?>

	<form action="skripte/login.php" method="post">

		<label>
			Kürzel:
			<input type="text" name="kuerzel">
		</label>

		<label>
			Passwort:
			<input type="password" name="passwort">
		</label>

		<input type="submit" value="Login">
		<a href="lehrer_registrieren.php"><button type="button" name="button" id="buttonRegistrieren">Registrieren</button></a>
	</form>
</div>
<?php include 'include/footer.php'; ?>
