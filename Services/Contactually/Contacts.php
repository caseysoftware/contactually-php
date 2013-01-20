<?php

class Services_Contactually_Contacts extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/contacts.json';

    /**
     *
     * @todo TODO: implement pagination and additional filters: bucket_id, page,
     *       limit, unbucketed, full, tag, updated_since
     *
     * @return \Services_Contactually_Contacts
     */
    public function index()
    {
        $json = $this->client->get($this->_index_uri, $params);
        $object = json_decode($json);

        $this->_json = $json;
        $this->_obj  = $object->contacts;
        $this->count = $object->count;

        return $this;
    }

    public function getObject($index = 0)
    {
        $params = array();

        if (isset($this->_obj[$index])) {
            $params = $this->_obj[$index];
        }

        $item = new Services_Contactually_Contact($this->client);
        return $item->bind($params);
    }
}