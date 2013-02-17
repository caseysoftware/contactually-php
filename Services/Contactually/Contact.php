<?php

class Services_Contactually_Contact extends Services_Contactually_Base
{
    public $id = '';
    public $first_name = '';
    public $last_name = '';
    public $title = '';
    public $company = '';
    public $visible = '';
    public $avatar = '';
    public $first_contacted = '';
    public $last_contacted = '';
    public $hits = '';
    public $user_bucket_id = '';
    public $address = '';
    public $phone = '';

    protected $_show_uri  = 'https://www.contactually.com/api/v1/contacts/<id>.json';
    protected $_create_uri = 'https://www.contactually.com/api/v1/contacts.json';

    protected $_delete_uri = 'https://www.contactually.com/api/v1/contacts/<id>.json';

    public function create(array $params)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }
}