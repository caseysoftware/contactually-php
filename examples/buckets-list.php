<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$buckets = $client->buckets->list();
// Now our $buckets object has a count of buckets and iterable set of buckets

foreach($buckets as $bucket) {
    echo $bucket->title . "\n";
}