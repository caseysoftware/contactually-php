<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$followup = new Services_Contactually_Followup($client);

$result = $followup->show(2999438);

print_r($result);