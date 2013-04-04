<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$contact = new Services_Contactually_Contact($client);

$result = $contact->show(14184603);

print_r($result);