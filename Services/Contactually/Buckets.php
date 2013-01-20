<?php

class Services_Contactually_Buckets extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/buckets.json';

    /**
     * @internal This is one of the odd names.. it should be buckets but is user_buckets instead
     */
    public function index()
    {
        $json = $this->client->get($this->_index_uri);
        $object = json_decode($json);

        $this->_json = $json;
        $this->_obj  = $object->user_buckets;
        $this->count = $object->count;

        return $this;
    }

    public function getObject($index = 0)
    {
        $params = array();

        if (isset($this->_obj[$index])) {
            $params = $this->_obj[$index];
        }

        $item = new Services_Contactually_Bucket($this->client);
        return $item->bind($params);
    }
}