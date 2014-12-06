<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$groupings = $client->groupings->minimal_index();

foreach($groupings as $grouping) {
    echo $grouping->type . "\n";
    echo $grouping->name . "\n";
}