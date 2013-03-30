<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$followups = $client->followups->index($page = 1, $limit = 10);
// Now our $followups object has a count of followups and iterable set of followups

echo "\nDisplaying {$followups->count} records per page:\n";
echo "\nPage: " . $followups->page . ' of ' . $followups->getPageCount() . "\n";

foreach($followups as $followup) {
    echo $followup->title . " " . $followup->due_date . "\n";
}

while ($followups->hasMorePages()) {
    $itempage = $followups->getNextPage();

    echo "\nPage: " . $followups->page . ' of ' . $followups->getPageCount() . "\n";
    foreach($itempage as $followup) {
        echo $followup->title . " " . $followup->due_date . "\n";
    }
}