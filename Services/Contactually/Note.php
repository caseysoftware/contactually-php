<?php

class Services_Contactually_Note extends Services_Contactually_Base
{
    public $id = '';
    public $body = '';
    public $contact_id = '';
    public $parent_contact_id = '';
    public $timestamp = '';

    protected $_show_uri = 'https://www.contactually.com/api/v1/notes/<id>.json';
    protected $_create_uri = 'https://www.contactually.com/api/v1/notes.json';

    public function create(array $params)
    {
        $note = array();

        foreach($params as $key => $value) {
            $note["note[$key]"] = $value;
        }

        $this->client->post($this->_create_uri, $note);

/*
 * NOTE: Unfortunately after this resource is created, we don't have any idea
 *   of what the new URI or even the id is.
 */
        return (201 == $this->client->status) ? true : false;
    }
}