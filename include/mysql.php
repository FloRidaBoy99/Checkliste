<?php

	class DB
	{
		private $verbindung;

		function __construct($options)
		{
			$this -> verbindung = new mysqli($options["servername"], $options["username"], $options["password"], $options["dbname"]);
			if ($this -> verbindung ->connect_error) {
			    die("Die MySQL Verbindung funzt net: " . $this -> verbindung -> connect_error);
			}
		}

		public function query($queryString = '')
		{
			$erg = $this -> verbindung -> query($queryString);
			return $erg;
		}
	}

	$db = new DB(array(
		"servername" => "localhost",
		"username" => "root",
		"password" => "",
		"dbname" => "DBCheckliste"
	));

?>
