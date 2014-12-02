<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$result = $client->contacts->delete(136313160);

echo $client->statusCode . "\n";