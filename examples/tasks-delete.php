<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$task = new Services_Contactually_Task($client);

$result = $task->delete(5153164);

print_r($result);
//https://www.contactually.com/tasks/5153164