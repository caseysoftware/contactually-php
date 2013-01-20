<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$tasks = $client->tasks->index();
// Now our $notes object has a count of notes and iterable set of notes

foreach($tasks as $task) {
    echo $task->title . "\n";
    echo $task->due_date . "\n";
}