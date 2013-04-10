<?php

abstract class Services_Contactually_Resources_Base
{
    protected $_client = null;

    public function __construct(Services_Contactually $client)
    {
        $this->_client = $client;
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
        $this->_client->get($this->_client->getUri() . $this->show, array('id' => $id));

        return $this->bind($this->_client->response_obj);
    }

    /**
     * @internal This is one of the oddities.. sometimes a 200 is used instead
     *    of a 201 to note the create was successful
     *
     * @param array $params
     * @return boolean
     */
    public function create(array $params)
    {
        $properties = array();

        foreach($params as $key => $value) {
            $properties[$this->_resource . "[$key]"] = $value;
        }

        $this->_client->post($this->_client->getUri() . $this->_create_uri, $properties);

        $successCodes = array(200, 201);

        return (in_array($this->_client->response_code, $successCodes)) ? true : false;
    }

    public function delete($id = 0)
    {
        $this->delete = str_replace('<id>', $id, $this->_delete_uri);
        $this->_client->delete($this->_client->getUri() . $this->delete, array('id' => $id));

        return (200 == $this->_client->response_code) ? true : false;
    }
}