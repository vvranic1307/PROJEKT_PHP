<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'cvece_biljke';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Pogreška pri povezivanju s bazom: " . $conn->connect_error);
}

header('Content-Type: application/json');

$sql = "SELECT * FROM plants";
$result = $conn->query($sql);

$plants = [];
while ($row = $result->fetch_assoc()) {
    $plants[] = $row;
}

echo json_encode($plants);
?>
