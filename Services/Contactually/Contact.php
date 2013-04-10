<?php

class Services_Contactually_Contact extends Services_Contactually_Resources_Base
{
    public $id = '';
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $title = '';
    public $company = '';
    public $visible = '';
    public $avatar = '';
    public $first_contacted = '';
    public $last_contacted = '';
    public $hits = '';
    public $user_bucket_id = '';

    protected $_resource = 'contact';

    protected $_show_uri   = 'contacts/<id>.json';
    protected $_create_uri = 'contacts.json';
    protected $_delete_uri = 'contacts/<id>.json';
    protected $_bucket_uri = 'contacts/<id>/bucket.json';
    protected $_ignore_uri = 'contacts/<id>/ignore.json';

    public function bucket($contact_id, $bucket_id)
    {
        $this->bucket = str_replace('<id>', $contact_id, $this->_bucket_uri);

        $params = array('id' => $contact_id, 'bucket_id' => $bucket_id);
        $this->_client->post($this->_client->getUri() . $this->bucket, $params);

        return (200 == $this->_client->status) ? true : false;
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
        $this->_client->post($this->_client->getUri() . $this->ignore, $params);

        return (200 == $this->_client->status) ? true : false;
    }
}