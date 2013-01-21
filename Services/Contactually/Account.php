<?php

class Services_Contactually_Account extends Services_Contactually_Base
{
    public $id = '';
    public $username = '';
    public $remote_id = '';
    public $type = '';
    public $disabled_at = '';

    protected $_show_uri = 'https://www.contactually.com/api/v1/accounts/<id>.json';
}