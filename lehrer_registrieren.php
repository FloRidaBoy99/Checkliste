<?php
	include 'include/head.php';
	include 'include/mysql.php';

?>
<div class="content">
<h1>Registrieren eines neuen Lehrers</h1>
<?php if(!empty($_GET["msg"])) : ?>
	<div class="alert">
		<?php echo $_GET["msg"]; ?>
	</div>
<?php endif; ?>
<form action="skripte/lehrer_registrieren.php" method="post">
	<label>
		Vorname:
		<input type="text" name="vorname" value="">
	</label>
	<label>
		Nachname:
		<input type="text" name="nachname" value="">
	</label>
	<label>
		Kürzel:
		<input type="text" name="kuerzel" value="">
	</label>
  <label>
    Passwort:
    <input type="password" name="passwort" value="">
	</label>
	<label>
		Passwort bestätigen
		 <input type="password" name="passwort2" value="">
	 </label>
		<input type="submit" value="Absenden">
</form>
</div>
<?php include 'include/footer.php'; ?>
