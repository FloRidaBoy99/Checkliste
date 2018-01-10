<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DBCheckliste";

$db = new mysqli($servername, $username, $password, $dbname);
if ($db->connect_error) {
    die("Die MySQL Verbindung funzt net: " . $conn->connect_error);
}

?>
