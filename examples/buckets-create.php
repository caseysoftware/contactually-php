<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$bucket = new Services_Contactually_Bucket($client);

$result = $bucket->show(53000);

print_r($result);