<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$contacts = $client->contacts->index();

foreach($contacts as $contact) {
    echo $contact->first_name . " " . $contact->last_name . "\n";
}