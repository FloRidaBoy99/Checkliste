<?php
	include 'include/head.php';
	include 'include/mysql.php';

?>
<div class="content">
<h1>Registrieren eines neuen Lehrers</h1>
<form action="skripte/schueler_neu.php" method="post">
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
		<label>passwort bestätigen
		 <input type="password" name="passwort2" value="">
	 </label>
	<input type="submit" value="Absenden">
</form>
</div>
<?php include 'include/footer.php'; ?>
