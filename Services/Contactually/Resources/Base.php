<?php

abstract class Services_Contactually_Resources_Base
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
        $this->client->get("{$this->show}", array('id' => $id));

        return $this->bind($this->client->response_obj);
    }

    public function create(array $params)
    {
        $properties = array();

        foreach($params as $key => $value) {
            $properties[$this->_resource . "[$key]"] = $value;
        }

        $this->client->post($this->_create_uri, $properties);

// TODO: Oddity, sometimes a 200 is used instead of a 201 to note the create was successful
        $successCodes = array(200, 201);

        return (in_array($this->client->response_code, $successCodes)) ? true : false;
    }

    public function delete($id = 0)
    {
        $this->delete = str_replace('<id>', $id, $this->_delete_uri);
        $this->client->delete("{$this->delete}", array('id' => $id));

        return (200 == $this->client->response_code) ? true : false;
    }
}