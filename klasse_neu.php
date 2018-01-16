<?php
	include 'include/head.php';
	include 'include/mysql.php';

	if ($db -> checkLogin($_SESSION)) :
		$lehrer_sql = "SELECT lehrerid, kuerzel FROM lehrer ORDER BY kuerzel ASC";
		$lehrer = $db -> query($lehrer_sql);
	endif;
?>
<div class="content">

<h1>Neue Klasse erstellen</h1>
<form action="skripte/klasse_neu.php" method="post">
	<label>
		Klassenbezeichnung:
		<input type="text" name="bezeichnung" value="">
	</label>

	<label>
		Klassenlehrer:
		<select name="klassenlehrer">
			<option value="" selected disabled>Wählen Sie etwas aus</option>
			<?php while($row = $lehrer -> fetch_assoc()) : ?>
				<option value="<?php echo $row["lehrerid"]; ?>"><?php echo $row["kuerzel"]; ?></option>
			<?php endwhile; ?>
		</select>
	</label>

	<input type="submit" value="Absenden">
</form>
</div>
<?php include 'include/footer.php'; ?>
