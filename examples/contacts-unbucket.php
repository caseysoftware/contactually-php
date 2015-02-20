<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$contact = $client->contacts->load(153074584);

$result = $contact->unbucket(14601805);

echo $result;