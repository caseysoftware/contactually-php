<?php

class Services_Contactually_Note extends Services_Contactually_Resources_Base
{
    public $id = '';
    public $body = '';
    public $contact_id = '';
    public $parent_contact_id = '';
    public $timestamp = '';

    protected $_resource = 'note';

    protected $_show_uri   = 'notes/<id>.json';
    protected $_create_uri = 'notes.json';
    protected $_delete_uri = 'notes/<id>.json';

    /**
     * We have to override the base create method because the Notes resource doesn't set a Location header after it successfully creates an item.
     *
     * @todo This should be refactored away once the API returns the header as expected.
     */
    public function create(array $params)
    {
        $result = parent::create($params);

        $payload = $this->_client->response_headers[2];
        $data = json_decode($payload);
        $result->location = 'https://www.contactually.com/api/v1/notes/' . $data->id;

        return $result;
    }
}