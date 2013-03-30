<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$notes = $client->notes->index($page = 1, $limit = 10);
// Now our $notes object has a count of notes and iterable set of notes

echo "\nDisplaying {$notes->count} records per page:\n";
echo "\nPage: " . $notes->page . ' of ' . $notes->getPageCount() . "\n";

foreach($notes as $note) {
    echo $note->body . "\n";
}

while ($notes->hasMorePages()) {
    $itempage = $notes->getNextPage();

    echo "\nPage: " . $notes->page . ' of ' . $notes->getPageCount() . "\n";
    foreach($itempage as $note) {
        echo $note->body . "\n";
    }
}