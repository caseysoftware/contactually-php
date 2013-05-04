<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

/**
 * This implementation doesn't authenticate until the request is actually made.
 *    I believe it is better fundamentally because it doesn't retain a state
 *    between requests.
 */
$client = new Services_Contactually(array('api_key' => $apiKey));

$buckets = $client->buckets->index();

foreach($buckets as $bucket) {
    echo $bucket->name . "\n";
}