<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$contact = new Services_Contactually_Contact($client);

$contact_id = 17471066;
$temporary = true;
$task_id = 0;

$result = $contact->ignore($contact_id, $temporary, $task_id);

print_r($result);