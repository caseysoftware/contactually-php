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

    public function create(array $params)
    {
        $contact = array();

        foreach($params as $key => $value) {
            $contact["contact[$key]"] = $value;
        }

        $this->client->post($this->_create_uri, $contact);

        return (201 == $this->client->status) ? true : false;
    }
}