<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$notes = $client->notes->index();
// Now our $notes object has a count of notes and iterable set of notes

echo "\nDisplaying {$notes->count} records:\n";
foreach($notes as $note) {
    echo $note->body . "\n";
}