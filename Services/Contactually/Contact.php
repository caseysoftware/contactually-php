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

    protected $_bucket_uri = 'https://www.contactually.com/api/v1/contacts/<id>/bucket.json';

    public function create(array $params)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }

    public function bucket($contact_id, $bucket_id)
    {
        $this->bucket = str_replace('<id>', $contact_id, $this->_bucket_uri);

        $params = array('id' => $contact_id, 'bucket_id' => $bucket_id);

        $this->client->post($this->bucket, $params);

        return (200 == $this->client->status) ? true : false;
    }
}