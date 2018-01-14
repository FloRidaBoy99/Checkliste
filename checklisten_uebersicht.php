<?php
	include 'include/head.php';
	include 'include/mysql.php';

	$sql = "SELECT * FROM checkliste";

	$checklisten = $db -> query($sql);
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
				<?php $i = 0;
					while ($row = $checklisten -> fetch_assoc()) :
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["titel"]; ?></td>
					<td><?php echo $row["erstelldatum"]; ?></td>
					<td><?php echo $row["deadline"]; ?></td>
					<td><?php echo $row["status"]; ?></td>
				</tr>
			<?php	$i++; endwhile; ?>
			</table>
		<?php endif; ?>
	</div>

<?php include 'include/footer.php'; ?>
