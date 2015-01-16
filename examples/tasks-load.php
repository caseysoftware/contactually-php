<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$task = $client->tasks->load(1939234);

print_r($task);