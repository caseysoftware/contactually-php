<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$user = new Services_Contactually_User($client);

$result = $user->current();

print_r($result);