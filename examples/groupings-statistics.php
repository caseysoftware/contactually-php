<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$stats = $client->groupings->statistics(8411530);

print_r($stats);