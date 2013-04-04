<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

/**
 * This implementation authenticates immediately upon instantiation instead of
 *    waiting for the first request. This also requires edit access to a locally
 *    stored cookie jar. I'm not a huge fan.
 */
$client = new Services_Contactually(
            array('email' => $email, 'password' => $password)
        );

echo $client->response_code;
echo "\n";
unset($client);

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