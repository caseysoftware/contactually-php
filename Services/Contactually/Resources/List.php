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

    public function rewind()
    {
        $this->_index = 0;
    }
    public function current()
    {
        return $this->getObject($this->_index);
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