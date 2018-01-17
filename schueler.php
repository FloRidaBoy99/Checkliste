<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if ($db -> checkLogin($_SESSION)) :
		$id = $_GET["id"];

		$schueler_sql = "SELECT * FROM schueler WHERE schuelerid = $id";
		$schuelerResult = $db -> query($schueler_sql);
		$schueler = $schuelerResult -> fetch_assoc();

		$klasse_sql = "SELECT klasseid, bezeichnung FROM klasse ORDER BY bezeichnung ASC";
		$klasse = $db -> query($klasse_sql);
	else :
		header("Location:login.php?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	endif;
?>

<div class="content">
	<h1>Schüler <?php echo $schueler["Vorname"]." ".$schueler["Nachname"]; ?> bearbeiten</h1>
	<form action="skripte/schueler_bearbeiten.php" method="post">
		<label>
			Vorname:
			<input type="text" name="vorname" value="<?php echo $schueler["Vorname"]; ?>">
		</label>
		<label>
			Nachname:
			<input type="text" name="nachname" value="<?php echo $schueler["Nachname"]; ?>">
		</label>
		<label>
			Geburtsdatum:
			<input type="date" name="geburtsdatum" value="<?php echo $schueler["Geburtsdatum"]; ?>">
		</label>

		<label>
			Klasse:
			<select name="klasse">
				<option value="" selected disabled>Wählen Sie eine Klasse aus</option>
				<?php while($row = $klasse -> fetch_assoc()) : ?>
					<option value="<?php echo $row["klasseid"]; ?>"
						<?php if ($row["klasseid"] === $schueler["Klasse"]) echo " selected"; ?>
					><?php echo $row["bezeichnung"]; ?></option>
				<?php endwhile; ?>
			</select>
		</label>
		<input type="hidden" name="schuelerid" value="<?php echo $schueler["SchuelerID"]; ?>">
		<input type="submit" value="Absenden">
	</form>


	<h1>Schüler <?php echo $schueler["Vorname"]." ".$schueler["Nachname"]; ?> Löschen</h1>
	<form action="skripte/schueler_loeschen.php" method="post">
		<input type="hidden" name="schuelerid" value="<?php echo $schueler["SchuelerID"]; ?>">
		<input type="submit" value="Absenden">
	</form>

</div>


<?php include 'include/footer.php'; ?>
