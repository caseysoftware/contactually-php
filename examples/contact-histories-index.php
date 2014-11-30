<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$histories = $client->contact_histories->index();

foreach($histories as $history) {
    echo $history->email . "\n";
    echo $history->subject . "\n";
}