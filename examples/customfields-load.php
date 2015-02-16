<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$customfields = $client->customfields->load(62292);

print_r($customfields);