<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Assign POST data
$term = $_POST['term'];
$query = urlencode($term);
$ch = curl_init();

// get url and and append POST data
curl_setopt($ch, CURLOPT_URL, "http://www.google.com/search?hl=en&tbo=d&site=&source=hp&q=".$query);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

$output = curl_exec($ch);

// Error if things dont go as planned
if ($output === FALSE) {
	echo "cURL Error: " . curl_error($ch);
}


curl_close($ch);
// debug
// print_r($output);