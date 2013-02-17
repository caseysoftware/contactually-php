<?php

abstract class Services_Contactually_Base
{
    protected $client = null;

    public function __construct(Services_Contactually $client)
    {
        $this->client = $client;
    }

    public function bind($properties)
    {
        foreach($properties as $property => $value) {
            $this->$property = $value;
        }

        return $this;
    }

    public function show($id = 0)
    {
        $this->show = str_replace('<id>', $id, $this->_show_uri);
        $json = $this->client->get("{$this->show}", array('id' => $id));

        return $this->bind(json_decode($json, true));
    }

    public function create(array $params)
    {
        $properties = array();

        foreach($params as $key => $value) {
            $properties[$this->_resource . "[$key]"] = $value;
        }

        $this->client->post($this->_create_uri, $properties);

        return (201 == $this->client->status) ? true : false;
    }

    public function delete($id = 0)
    {
        $this->delete = str_replace('<id>', $id, $this->_delete_uri);
        $json = $this->client->delete("{$this->delete}", array('id' => $id));

        return (200 == $this->client->status) ? true : false;
    }
}