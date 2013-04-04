<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$notes = new Services_Contactually_Note($client);

$result = $notes->show(12475);

print_r($result);