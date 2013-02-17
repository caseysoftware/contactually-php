<?php

class Services_Contactually_Note extends Services_Contactually_Base
{
    public $id = '';
    public $body = '';
    public $contact_id = '';
    public $parent_contact_id = '';
    public $timestamp = '';

    protected $_show_uri = 'https://www.contactually.com/api/v1/notes/<id>.json';

    protected $_resource = 'note';
    protected $_create_uri = 'https://www.contactually.com/api/v1/notes.json';

    protected $_delete_uri = 'https://www.contactually.com/api/v1/notes/<id>.json';

    public function delete($id = 0)
    {
        $this->delete = str_replace('<id>', $id, $this->_delete_uri);
        $json = $this->client->delete("{$this->delete}", array('id' => $id));

        return (200 == $this->client->status) ? true : false;
    }
}