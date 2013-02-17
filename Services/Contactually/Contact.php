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
    protected $_ignore_uri = 'https://www.contactually.com/api/v1/contacts/<id>/ignore.json';

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

    /**
     * This allows for you to flag Contacts as being 'ignored' but the
     *   parameters are a little screwy. According to the docs, the 'temp'
     *   parameter denotes whether this ignore should be permenant or temporary.
     *   In the API, 'true' means 'permenant' and 'false' means temporary, but
     *   since the parameter name is 'temp' it gets super-confusing..
     *   because temp=true actually means it's permenant while temp=false means
     *   temporary.
     *
     * To preserve some sanity, I've flipped it in this method so if you set
     *   temporary=true then it is truly temporary.
     *
     * NOTE: And to keep things interesting.. the API returns a 404 whether
     *   this works or not.
     * NOTE: There doesn't appear to be a way to remove this.. ?
     *
     * @param type $contact_id
     * @param type $temporary
     * @param type $task_id
     * @return type 
     */
    public function ignore($contact_id, $temporary = true, $task_id = 0)
    {
        $this->ignore = str_replace('<id>', $contact_id, $this->_ignore_uri);

        $params = array('id' => $contact_id, 'temp' => !$temporary, 'task_id' => $task_id);
        $this->client->post($this->ignore, $params);

        return (200 == $this->client->status) ? true : false;
    }
}