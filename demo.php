<?php

include_once 'creds.php';
include_once 'Services/Contactually.php';

$service = new Services_Contactually(
            array('email' => $email, 'password' => $password)
        );

