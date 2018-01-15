<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if ($db -> checkLogin($_SESSION)) :
		$id = $_GET["id"];

		$eintrag_sql = "SELECT
				e.checklisteneintragid,
				e.abgehakt,
				CONCAT(s.vorname, ' ', s.nachname) AS schueler,
				s.schuelerid
			FROM
			checklisteneintrag e LEFT JOIN schueler s
			ON e.schueler = s.schuelerid
			WHERE e.checkliste = $id";
		$eintrag = $db -> query($eintrag_sql);

		$checkliste_sql = "SELECT * FROM checkliste WHERE checklisteid = $id";
		$checklisteResult = $db -> query($checkliste_sql);
		$checkliste = $checklisteResult -> fetch_assoc();

		print_r($checkliste);

	else :
		header("Location:login.php?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	endif;
?>

<div class="content">
	<h1>Checkliste: <?php echo $checkliste["Titel"]; ?></h1>

	<?php if ($eintrag -> num_rows > 0): ?>
		<form action="skripte/checkliste_speichern.php" method="post">
			<table>
				<tr>
					<th>Nr</th>
					<th>Abgehakt</th>
					<th>Schüler</th>
				</tr>
					<?php
						$i = 1;
						while($row = $eintrag -> fetch_assoc()): ?>
						<tr>
							<td><?php echo $i; $i++; ?></td>
							<td>
								<input type="checkbox" name="abgehakt[<?php echo $row["checklisteneintragid"]; ?>]"
									<?php if ($row["abgehakt"]) { echo " checked"; } ?>
								>
							</td>

							<td>
								<?php if ($row["schuelerid"] !== null): ?>
									<a href="schueler.php?id=<?php echo $row["schuelerid"]; ?>">
										<?php echo $row["schueler"]; ?>
									</a>
								<?php else: ?>
									/
								<?php endif; ?>
							</td>

						</tr>
					<?php endwhile; ?>
			</table>
			<input type="hidden" name="checklisteid" value="<?php echo $id; ?>">
			<input type="submit" value="Speichern">
		</form>
	<?php endif; ?>

	<h1>Checkliste bearbeiten</h1>
	<form action="skripte/checkliste_bearbeiten.php" method="post">
		<label>
			Titel:
			<input type="text" name="titel" value="<?php echo $checkliste["Titel"]; ?>">
		</label>
		<label>
			Deadline:
			<input type="date" name="deadline" value="<?php echo $checkliste["Deadline"]; ?>">
		</label>

		<input type="hidden" name="checklisteid" value="<?php echo $checkliste["ChecklisteID"]; ?>">
		<input type="submit" value="Absenden">
	</form>
</div>


<?php include 'include/footer.php'; ?>
