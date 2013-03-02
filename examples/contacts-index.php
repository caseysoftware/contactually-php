<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$contacts = $client->contacts->index();
// Now our $contacts object has a count of contacts and iterable set of contacts

echo "\nDisplaying {$contacts->count} records:\n";
foreach($contacts as $contact) {
    echo $contact->first_name . " " . $contact->last_name . "\n";
}