<?php
header('Content-Type: application/json');


$searchQuery = isset($_GET['query']) ? urlencode($_GET['query']) : 'tomato';


$apiUrl = "https://openfarm.cc/api/v1/crops?filter={$searchQuery}";


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $apiUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if (curl_errno($curl)) {
    
    echo json_encode(['error' => 'Greška pri dohvaćanju podataka: ' . curl_error($curl)]);
} else {

    echo $response;
}

curl_close($curl);
?>
