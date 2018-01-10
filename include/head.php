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
		<ul class="oberleiste">
		  <li class="dropdown">
		    <a href="checklisten_uebersicht.php">Checklisten-Übersicht</a>

				<div class="dropdown-inhalt">
				  <a href="checkliste.php">Checkliste</a>
				</div>
		  </li>
		  <li class="dropdown">
		    <a href="schueler.php"> Schüler verwalten</a>
		  </li>
		  <li class="dropdown">
		    <a href="klasse.php"> Klassen verwalten</a>
		  </li>
		  <li class="dropdown">
		    <a href="klasse-uebersicht.php">Klassen anzeigen</a>
		  </li>
		</ul>
