<?php

class Services_Contactually_Tasks extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/tasks.json';

    /**
     *
     * @todo TODO: implement pagination and additional filters: contact_id, week, page, limit
     *
     * @return \Services_Contactually_Notes
     */
    public function index()
    {
        $json = $this->client->get($this->_index_uri);
        $object = json_decode($json);

        $this->_json = $json;
        $this->_obj  = $object->tasks;
        $this->count = $object->count;

        return $this;
    }

    public function getObject($index = 0)
    {
        $params = array();

        if (isset($this->_obj[$index])) {
            $params = $this->_obj[$index];
        }

        $item = new Services_Contactually_Task($this->client);
        return $item->bind($params);
    }
}