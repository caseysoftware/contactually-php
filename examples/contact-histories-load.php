<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$contact_history = $client->contact_histories->load(27987518);

print_r($contact_history);