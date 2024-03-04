<?php
// Přístupové údaje k databázi (Localhost)
$servername = "localhost";
$username = 'root';
$password = "";
$dbname = "alba";

// Přístupové údaje k databázi
//$servername = "md75.wedos.net";
//$username = 'a237642_alba';
//$password = "af6nkV2W";
//$dbname = "d237642_älba";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Chyba při připojování k databázi: " . $conn->connect_error);
}
?>