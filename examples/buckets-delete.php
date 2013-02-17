<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$bucket = new Services_Contactually_Bucket($client);

$result = $bucket->delete(178437);

print_r($result);