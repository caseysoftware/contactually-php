<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('api_key' => $apiKey));

$bucket = new Services_Contactually_Bucket($client);

$params = array('name' => 'test bucket', 'num_days_to_followup' => 30, 'num_days_to_respond' => 45);

$result = $bucket->create($params);

print_r($result);