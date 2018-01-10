<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "DBCheckliste";

	class DB
	{
		private $verbindung;

		function __construct()
		{
			$verbindung = new mysqli($servername, $username, $password, $dbname);
			if ($verbindung->connect_error) {
			    die("Die MySQL Verbindung funzt net: " . $conn->connect_error);
			}
		}

		public function query($queryString = '')
		{
			$erg = $verbindung -> query($queryString);
		}
	}

	$db = new DB();

?>
