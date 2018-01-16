<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) :
		header("Location:login.php?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	endif;

	$klassen_sql = 'SELECT
		k.klasseid,
		k.bezeichnung,
		s.vorname,
		s.nachname,
		s.schuelerid,
		l.kuerzel
	FROM
		klasse k LEFT JOIN schueler s
		ON s.schuelerid = k.istklassensprecher
		LEFT JOIN lehrer l
		ON k.istklassenlehrer = l.lehrerid';
	$klasse = $db -> query($klassen_sql);
?>
<div class="content">

<h1>Alle Klassen</h1>
<?php if ($klasse -> num_rows > 0): ?>
	<table>
		<tr>
			<th>Nr</th>
			<th>Klassenbezeichnung</th>
			<th>Klasensprecher</th>
			<th>Klassenlehrer</th>
		</tr>
			<?php
				$i = 1;
				while($row = $klasse -> fetch_assoc()):
			?>
				<tr>
					<td><?php echo $i; $i++; ?></td>

					<td>
						<a href="klasse.php?id=<?php echo $row["klasseid"]; ?>">
							<?php echo $row["bezeichnung"]; ?>
						</a>
					</td>

					<td>
						<?php if ($row["schuelerid"] !== null): ?>
							<a href="schueler.php?id=<?php echo $row["schuelerid"]; ?>">
								<?php echo $row["vorname"]." ".$row["nachname"]; ?>
							</a>
						<?php else: ?>
							/
						<?php endif; ?>
					</td>

					<td>
						<?php if ($row["kuerzel"] !== null):
							echo $row["kuerzel"];
						else: ?>
							/
						<?php endif; ?>
					</td>

				</tr>
			<?php endwhile; ?>
	</table>
</div>
<?php endif; ?>

<?php include 'include/footer.php'; ?>
