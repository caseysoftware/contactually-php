<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$buckets = $client->buckets->index();
// Now our $buckets object has a count of buckets and iterable set of buckets

echo "\nDisplaying {$buckets->count} records:\n";
foreach($buckets as $bucket) {
    echo $bucket->name . "\n";
}