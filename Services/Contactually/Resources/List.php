<?php

abstract class Services_Contactually_Resources_List
    implements Iterator
{
    protected $client = null;
    protected $_index = 0;

    public function __construct(Services_Contactually $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $json = $this->client->get($this->_index_uri);
        $object = json_decode($json);

        $this->_json = $json;
        $this->_obj  = $object->{$this->_data};
        $this->count = $object->count;

        return $this;
    }

    protected function _getObject($index = 0)
    {
        $params = array();

        if (isset($this->_obj[$index])) {
            $params = $this->_obj[$index];
        }

        $item = new $this->_class($this->client);
        return $item->bind($params);
    }

    public function rewind()
    {
        $this->_index = 0;
    }
    public function current()
    {
        return $this->_getObject($this->_index);
    }
    public function key()
    {
        return $this->_index;
    }
    public function next()
    {
        $this->_index++;
    }
    public function valid()
    {
        return isset($this->_obj[$this->_index]);
    }
}