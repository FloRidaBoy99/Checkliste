<?php

	class DB
	{
		private $verbindung;

		function __construct($options)
		{
			$verbindung = new mysqli($options["servername"], $options["username"], $options["password"], $options["dbname"]);
			if ($verbindung->connect_error) {
			    die("Die MySQL Verbindung funzt net: " . $verbindung->connect_error);
			}
		}

		public function query($queryString = '')
		{
			$erg = $verbindung -> query($queryString);
			return $erg -> fetch_assoc();
		}
	}

	$db = new DB(array(
		"servername" => "localhost",
		"username" => "root",
		"password" => "",
		"dbname" => "DBCheckliste"
	));

?>
