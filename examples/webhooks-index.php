<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$webhooks = $client->webhooks->index();

foreach($webhooks as $webhook) {
    print_r($webhook);
    //echo $task->title . "\n";
}