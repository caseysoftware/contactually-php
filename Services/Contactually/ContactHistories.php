<?php

class Services_Contactually_ContactHistories extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/contact_histories.json';

    /**
     * @todo TODO: implement pagination and additional filter: contact_id, page, limit
     * @internal This is one of the odd names.. it should be contact_histories but is email_histories instead
     * @return \Services_Contactually_ContactHistories
     */
    public function index()
    {
        $json = $this->client->get($this->_index_uri);
        $object = json_decode($json);

        $this->_json = $json;
        $this->_obj  = $object->email_histories;
        $this->count = $object->count;

        return $this;
    }

    public function getObject($index = 0)
    {
        $params = array();

        if (isset($this->_obj[$index])) {
            $params = $this->_obj[$index];
        }

        $item = new Services_Contactually_ContactHistory($this->client);
        return $item->bind($params);
    }
}