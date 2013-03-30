<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$contacts = $client->contacts->index($page = 1, $limit = 10);
// Now our $contacts object has a count of contacts and iterable set of contacts

echo "\nDisplaying {$contacts->count} records per page:\n";
echo "\nPage: " . $contacts->page . ' of ' . $contacts->getPageCount() . "\n";

foreach($contacts as $contact) {
    echo $contact->first_name . " " . $contact->last_name . "\n";
}

while ($contacts->hasMorePages()) {
    $itempage = $contacts->getNextPage();

    echo "\nPage: " . $contacts->page . ' of ' . $contacts->getPageCount() . "\n";
    foreach($itempage as $contact) {
        echo $contact->first_name . " " . $contact->last_name . "\n";
    }
}