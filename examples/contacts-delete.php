<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$contact = new Services_Contactually_Contact($client);

$result = $contact->delete(28074400);

print_r($result);