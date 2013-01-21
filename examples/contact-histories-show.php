<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$contact_histories = new Services_Contactually_ContactHistory($client);

$result = $contact_histories->show(27987518);

print_r($result);