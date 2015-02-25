<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$contact = $client->contacts->load(46955899);

$result = $contact->snooze();

print_r($result);