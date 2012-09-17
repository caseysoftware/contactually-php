<?php

class Services_Contactually_Contact extends Services_Contactually_Base
{
    protected $name  = 'contacts';

    public $id              = null;
    public $first_name      = '';
    public $last_name       = '';
    public $title           = '';
    public $company         = '';
    public $visible         = false;
    public $avatar          = '';
    public $first_contacted = null;
    public $last_contacted  = null;
    public $hits            = 0;
    public $user_bucket_id  = 0;
    public $address         = 0;
    public $phone           = 0;
}