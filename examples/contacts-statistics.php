<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$contact = $client->contacts->statistics(14184603);

print_r($contact);