<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$contact_history = new Services_Contactually_ContactHistory($client);

$result = $contact_history->show(27987518);

print_r($result);