<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if ($db -> checkLogin($_SESSION)) :

		$id = $_GET["id"];

		$klasse_sql = "SELECT * FROM klasse WHERE klasseid = $id";
		$klasseResult = $db -> query($klasse_sql);
		$klasse = $klasseResult -> fetch_assoc();

		$lehrer_sql = "SELECT lehrerid, vorname, nachname FROM lehrer ORDER BY kuerzel ASC";
		$lehrer = $db -> query($lehrer_sql);

		$schueler_sql = "SELECT schuelerid, vorname, nachname FROM schueler WHERE klasse = $id ORDER BY nachname ASC";
		$schueler = $db -> query($schueler_sql);

	else :
		header("Location:login.php?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	endif;
?>


<div class="content">
	<h1>Klasse <?php echo $klasse["Bezeichnung"]; ?></h1>
	<h2>Alle Schüler der Klasse</h2>
	<?php if ($schueler -> num_rows > 0): ?>
		<table>
			<tr>
				<th>Nr.</th>
				<th>Nachname</th>
				<th>Vorname</th>
				<th>Extras</th>
			</tr>
			<?php $i = 1; while ($row = $schueler -> fetch_assoc()) : ?>
				<tr>
					<td><?php echo $i; $i++; ?></td>
					<td><?php echo $row["nachname"] ?></td>
					<td><?php echo $row["vorname"] ?></td>
					<td><?php if ($klasse["istKlassensprecher"] === $row["schuelerid"]) { echo "Klassensprecher"; } ?></td>
				</tr>
			<?php endwhile; ?>
		</table>
	<?php else: ?>
		<p>Sie haben noch keine Schüler hinzugefügt.</p>
	<?php endif; ?>

	<h2>Klasse <?php echo $klasse["Bezeichnung"]; ?> Bearbeiten</h2>
	<form action="skripte/klasse_bearbeiten.php" method="post">
		<label>
			Bezeichnung:
			<input type="text" name="bezeichnung" value="<?php echo $klasse["Bezeichnung"]?>">
		</label>

		<label>
			Klassenlehrer:
			<select name="klassenlehrer">
				<option value="" selected disabled>Wählen Sie einen Lehrer aus</option>
				<?php while($row = $lehrer -> fetch_assoc()) : ?>

					<option value="<?php echo $row["lehrerid"]; ?>"
						<?php if ($klasse["istKlassenlehrer"] === $row["lehrerid"]) echo " selected";?>
					><?php echo $row["vorname"]." ".$row["nachname"]; ?></option>

				<?php endwhile; ?>
			</select>
		</label>

		<label>
			Klassensprecher:
			<select name="klassensprecher">
				<option value="" selected disabled>Wählen Sie einen Schüler aus</option>
				<?php $schueler -> data_seek(0);
					while($row = $schueler -> fetch_assoc()) : ?>

					<option value="<?php echo $row["schuelerid"]; ?>"
						<?php if ($klasse["istKlassensprecher"] === $row["schuelerid"]) echo " selected";?>
					><?php echo $row["vorname"]." ".$row["nachname"]; ?></option>

				<?php endwhile; ?>
			</select>
		</label>
		<input type="hidden" name="klasseid" value="<?php echo $klasse["KlasseID"]; ?>">
		<input type="submit" value="Absenden">
	</form>


	<h2>Klasse <?php echo $klasse["Bezeichnung"]; ?> Löschen</h2>
	<form action="skripte/klasse_loeschen.php" method="post">
		<input type="hidden" name="bezeichnung" value="<?php echo $klasse["Bezeichnung"]?>">
		<input type="hidden" name="klasseid" value="<?php echo $klasse["KlasseID"]; ?>">
		<input type="submit" value="Löschen">
	</form>



</div>


<?php include 'include/footer.php'; ?>
