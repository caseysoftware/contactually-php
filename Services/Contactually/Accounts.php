<?php

class Services_Contactually_Accounts extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/accounts.json';

    public function index()
    {
        $client = $this->client->get($this->_index_uri);

        $this->_obj = json_decode($client->_json);
        $this->count = $this->_obj->count;

        return $this;
    }

    public function getObject($index = 0)
    {
        $params = array();

        if (isset($this->_obj->accounts[$index])) {
            $params = $this->_obj->accounts[$index];
        }

        $item = new Services_Contactually_Account($this->client);
        return $item->bind($params);
    }
}