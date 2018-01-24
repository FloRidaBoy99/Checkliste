<?php

	class DB
	{
		private $verbindung;

		function __construct($options) {
			@$this -> verbindung = new mysqli($options["servername"], $options["username"], $options["password"], $options["dbname"]);
			if ($this -> verbindung ->connect_error) {
			    die("Etwas funktioniert nicht");
			}
		}

		public function query($queryString = '') {
			$erg = $this -> verbindung -> query($queryString);
			return $erg;
		}

		public function checkLogin($data) {
			if (empty($data)) { return false; }

			$sql = "SELECT * FROM lehrer WHERE lehrerid = ".$data["lehrerid"]." AND passwort = '".$data["passwort"]."' AND kuerzel = '".$data["kuerzel"]."'";
			$result = $this -> verbindung -> query($sql);

			if ($result !== NULL && $result -> num_rows === 1) {
				return true;
			} else {
				return false;
			}
		}

		public function getID()
		{
			return $this -> verbindung -> insert_id;
		}

		public function getConn()
		{
			return $this -> verbindung;
		}
	}

	$db = new DB(array(
		"servername" => "localhost",
		"username" => "root",
		"password" => "",
		"dbname" => "DBCheckliste"
	));

?>
