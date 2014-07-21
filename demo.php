<?php

include_once 'creds.php';
include_once 'Services/Contactually.php';

echo '<pre>';
$service = new Services_Contactually(array('api_key' => $apiKey));

$results = $service->contacts(array('limit' => 10));
print_r($results);

//$contact = new Services_Contactually_Contact();
//$contact->show(14184603);
//print_r($contact);