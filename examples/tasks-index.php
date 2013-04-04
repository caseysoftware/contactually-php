<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$tasks = $client->tasks->index($page = 1, $limit = 10);
// Now our $notes object has a count of notes and iterable set of notes

echo "\nDisplaying {$tasks->count} records per page:\n";
echo "\nPage: " . $tasks->page . ' of ' . $tasks->getPageCount() . "\n";

foreach($tasks as $task) {
    echo $task->title . "\n";
    echo $task->due_date . "\n";
}

while ($tasks->hasMorePages()) {
    $itempage = $tasks->getNextPage();

    echo "\nPage: " . $tasks->page . ' of ' . $tasks->getPageCount() . "\n";
    foreach($itempage as $task) {
        echo $task->title . "\n";
        echo $task->due_date . "\n";
    }
}