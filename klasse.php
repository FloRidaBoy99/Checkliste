<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if ($db -> checkLogin($_SESSION)) :
		
		$id = $_GET["id"];

		$klasse_sql = "SELECT * FROM klasse WHERE klasseid = $id";
		$klasseResult = $db -> query($klasse_sql);
		$klasse = $klasseResult -> fetch_assoc();

		print_r($klasse);

		$lehrer_sql = "SELECT lehrerid, kuerzel FROM lehrer ORDER BY kuerzel ASC";
		$lehrer = $db -> query($lehrer_sql);

		$schueler_sql = "SELECT schuelerid, vorname, nachname FROM schueler WHERE klasse = $id ORDER BY nachname ASC";
		$schueler = $db -> query($schueler_sql);

	else :
		header("Location:login.php?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	endif;
?>


<div class="content">

</div>


<h1>Klasse Bearbeiten</h1>
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
				><?php echo $row["kuerzel"]; ?></option>

			<?php endwhile; ?>
		</select>
	</label>

	<label>
		Klassensprecher:
		<select name="klassenlehrer">
			<option value="" selected disabled>Wählen Sie einen Schüler aus</option>
			<?php while($row = $schueler -> fetch_assoc()) : ?>

				<option value="<?php echo $row["schuelerid"]; ?>"
					<?php if ($klasse["istklassensprecher"] === $row["schuelerid"]) echo " selected";?>
				><?php echo $row["vorname"]." ".$row["nachname"]; ?></option>

			<?php endwhile; ?>
		</select>
	</label>
</form>

<?php include 'include/footer.php'; ?>
