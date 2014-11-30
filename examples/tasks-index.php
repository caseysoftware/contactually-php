<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$tasks = $client->tasks->index();

foreach($tasks as $task) {
    echo $task->title . "\n";
}