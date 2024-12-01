<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'projekt';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Pogreška pri povezivanju s bazom: " . $conn->connect_error);
}
?>
