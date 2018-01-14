<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if ($db -> checkLogin($_SESSION)) :

		$schueler_sql = 'SELECT
			s.schuelerid,
			s.vorname,
			s.nachname,
			s.geburtsdatum,
			k.bezeichnung
			FROM
			schueler s LEFT JOIN klasse k
			ON s.klasse = k.klasseid';
		$schueler = $db -> query($schueler_sql);
	else :
		header("Location:login.php?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	endif;
?>

<div class="content">
	<h1>Alle Schüler</h1>

	<?php if ($schueler -> num_rows > 0): ?>
		<table>
			<tr>
				<th>Nr.</th>
				<td>Nachname</td>
				<td>Vorname</td>
				<td>Geburtsdatum</td>
				<td>Klasse</td>
			</tr>
			<?php $i = 1; while ($row = $schueler -> fetch_assoc()) : ?>
				<tr>
					<td>
						<a href="schueler.php?id=<?php echo $row["schuelerid"]; ?>">
							<?php echo $i; $i++; ?>
						</a>
					</td>
					<td><?php echo $row["nachname"]; ?></td>
					<td><?php echo $row["vorname"]; ?></td>
					<td><?php echo $row["geburtsdatum"]; ?></td>
					<td><?php echo $row["bezeichnung"]; ?></td>
				</tr>
			<?php endwhile; ?>
		</table>
	<?php endif; ?>

</div>


<?php include 'include/footer.php'; ?>
