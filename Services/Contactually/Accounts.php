<?php

class Services_Contactually_Accounts extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/accounts.json';

    public function index()
    {
        $json = $this->client->get($this->_index_uri);
        $object = json_decode($json);

        $this->_json = $json;
        $this->_obj  = $object->accounts;
        $this->count = $object->count;

        return $this;
    }

    public function getObject($index = 0)
    {
        $params = array();

        if (isset($this->_obj[$index])) {
            $params = $this->_obj[$index];
        }

        $item = new Services_Contactually_Account($this->client);
        return $item->bind($params);
    }
}