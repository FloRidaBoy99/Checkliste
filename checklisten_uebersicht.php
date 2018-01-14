<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if (!$db -> checkLogin($_SESSION)) :
		header("Location:login.php?msg=".urlencode("Fehler: Sie sind nicht eingeloggt"));
		exit;
	endif;

	$checklisten_sql = "SELECT
	c.checklisteid,
	c.titel,
	c.erstelldatum,
	c.deadline,
	k.bezeichnung,
	IF(status = 0, 'Noch nicht fertig', 'Fertig') AS status
	FROM checkliste c INNER JOIN klasse k
	ON c.klasse = k.klasseid;";

	$checklisten = $db -> query($checklisten_sql);

	print_r($checklisten);

?>
	<h1>Alle Checklisten</h1>

	<div class="content">
		<?php if ($checklisten !== false) : ?>
			<table>
				<tr>
					<th>Nr.</th>
					<th>Titel</th>
					<th>Erstelldatum</th>
					<th>Deadline</th>
					<th>Status</th>
				</tr>
				<?php $i = 1;
					while ($row = $checklisten -> fetch_assoc()) :
				?>
				<tr>
					<td><?php echo $i; $i++; ?></td>
					<td>
						<a href="checkliste.php?id=<?php echo $row["checklisteid"]; ?>">
							<?php echo $row["titel"]; ?>
						</a>
					</td>
					<td><?php echo $row["erstelldatum"]; ?></td>
					<td><?php echo $row["deadline"]; ?></td>
					<td><?php echo $row["status"]; ?></td>
				</tr>
			<?php endwhile; ?>
			</table>
		<?php endif; ?>
	</div>

<?php include 'include/footer.php'; ?>
