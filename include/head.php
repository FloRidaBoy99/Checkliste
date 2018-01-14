<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="author" content="Florian Kry, Lukas Küster, Niklas Grimm, Alexander Stein" />
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.php/index.scss" />
		<title>Checkliste</title>
	</head>
	<body>
		<?php print_r($_SESSION); if ($_SERVER["PHP_SELF"] !== "/Checkliste/login.php") : ?>
		<ul class="oberleiste">
			<li class="dropdown">
				<a href="checklisten_uebersicht.php">Alle Checklisten</a>

				<div class="dropdown-inhalt">
					<a href="checkliste_neu.php">Neue Checkliste</a>
				</div>
			</li>
			<li class="dropdown">
				<a href="schueler.php">Alle Schüler</a>

				<div class="dropdown-inhalt">
					<a href="schueler_neu.php">Neuen Schüler erstellen</a>
				</div>
		  </li>
		  <li class="dropdown">
		    <a href="klasse_uebersicht.php">Alle Klassen</a>

				<div class="dropdown-inhalt">
					<a href="klasse_neu.php">Neue Klasse</a>
				</div>
		  </li>
			<li class="logout">
				<a href="logout.php">Ausloggen</a>
			</li>
		</ul>
	<?php endif; ?>
