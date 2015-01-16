<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$contact = $client->contacts->load(14184603);

print_r($contact);