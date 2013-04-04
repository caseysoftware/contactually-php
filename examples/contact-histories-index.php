<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$contact_histories = $client->contact_histories->index($page = 1, $limit = 10);
// Now our $accounts object has a count of accounts and iterable set of accounts

echo "\nDisplaying {$contact_histories->count} records per page:\n";
echo "\nPage: " . $contact_histories->page . ' of ' . $contact_histories->getPageCount() . "\n";

foreach($contact_histories as $contact_history) {
    echo $contact_history->email . "\n";
    echo $contact_history->subject . "\n";
}

while ($contact_histories->hasMorePages()) {
    $itempage = $contact_histories->getNextPage();

    echo "\n\nPage: " . $contact_histories->page . ' of ' . $contact_histories->getPageCount() . "\n";
    foreach($itempage as $contact_history) {
        echo $contact_history->email . "\n";
        echo $contact_history->subject . "\n";
    }
}