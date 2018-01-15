<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if ($db -> checkLogin($_SESSION) && $_SESSION["admin"] === "1") {
		$lehrer_sql = "SELECT lehrerid, vorname, nachname, kuerzel FROM lehrer";
		$lehrer = $db -> query($lehrer_sql);
	} else {
		header("Location:checklisten_uebersicht.php?msg=".urlencode("Fehler: Sie besitzen nicht die nötigen Rechte"));
	}

?>

	<div class="content">
		<?php if ($lehrer !== false) : ?>
			<table>
				<tr>
					<th>ID</th>
					<th>Vorname</th>
					<th>Nachname</th>
					<th>Kuerzel</th>
				</tr>
				<?php while ($row = $lehrer -> fetch_assoc()) : ?>
					<tr>
						<td><?php echo $row["lehrerid"]; ?></td>
						<td><?php echo $row["vorname"]; ?></td>
						<td><?php echo $row["nachname"]; ?></td>
						<td><?php echo $row["kuerzel"]; ?></td>
					</tr>
				<?php endwhile; ?>
			</table>
		<?php endif; ?>

		<h2>Neuen Lehrer erstellen</h2>
		<form action="skripte/lehrer_neu.php" method="post">
			<label>
				Vorname:
				<input type="text" name="vorname">
			</label>
			<label>
				Nachname:
				<input type="text" name="nachname">
			</label>
			<label>
				Passwort:
				<input type="text" name="password">
			</label>
			<label>
				Kürzel:
				<input type="text" name="kuerzel">
			</label>
			<input type="submit" value="Absenden">
		</form>
	</div>

<?php include 'include/footer.php'; ?>
