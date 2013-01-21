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
}