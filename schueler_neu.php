<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if ($db -> checkLogin($_SESSION)) :
		$klasse_sql = "SELECT klasseid, bezeichnung FROM klasse ORDER BY bezeichnung ASC";
		$klasse = $db -> query($klasse_sql);
	endif;
?>

<h1>Neuen Schüler erstellen</h1>
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
		Geburtsdatum:
		<input type="date" name="geburtsdatum" value="">
	</label>

	<label>
		Klasse:
		<select name="klasse">
			<option value="" selected disabled>Wählen Sie eine Klasse aus</option>
			<?php while($row = $klasse -> fetch_assoc()) : ?>
				<option value="<?php echo $row["klasseid"]; ?>"><?php echo $row["bezeichnung"]; ?></option>
			<?php endwhile; ?>
		</select>
	</label>

	<input type="submit" value="Absenden">
</form>

<?php include 'include/footer.php'; ?>
