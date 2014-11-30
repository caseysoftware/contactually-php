<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$templates = $client->email_templates->index();

foreach($templates as $template) {
    echo $template->label . "\n";
}