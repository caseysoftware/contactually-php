<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$account = new Services_Contactually_Account($client);

$result = $account->discover('keith@example.com');

print_r($result);