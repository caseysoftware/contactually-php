<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$followups = $client->followups->index();

foreach($followups as $followup) {
    echo $followup->title . "\n";
    echo $followup->due_date . "\n";
}