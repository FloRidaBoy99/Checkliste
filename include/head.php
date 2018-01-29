<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="author" content="Florian Kry, Lukas Küster, Niklas Grimm, Alexander Stein" />
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.php/index.scss" />

		<?php if (strpos($_SERVER["PHP_SELF"], "logout.php") !== false) : ?>
  		<meta http-equiv="refresh" content="2; URL=login.php" />
		<?php endif; ?>

		<title>Checkliste</title>
	</head>
	<body>
		<?php
		$loginPage = strpos($_SERVER["PHP_SELF"], "login.php");
		$indexPage = strpos($_SERVER["PHP_SELF"], "index.php");
		$RegistrierenPage = strpos($_SERVER["PHP_SELF"], "lehrer_registrieren.php");

		if ($loginPage === false && $indexPage === false && $RegistrierenPage === false) : ?>
		<ul class="oberleiste">
			<li class="dropdown">
				<a href="checklisten_uebersicht.php">Alle Checklisten</a>

				<div class="dropdown-inhalt">
					<a href="checkliste_neu.php">Neue Checkliste</a>
				</div>
			</li>
			<li class="dropdown">
				<a href="schueler_uebersicht.php">Alle Schüler</a>

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

			<?php if (!empty($_SESSION) && $_SESSION["admin"] === "1"): ?>
				<li class="dropdown">
					<a href="admin.php">Administration</a>
			  </li>
			<?php endif; ?>
			<li class="logout">
				<a href="skripte/logout.php">Ausloggen</a>
			</li>
		</ul>
	<?php endif; ?>
