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
     * This handles creating the resource which is just a POST behind the scenes.
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

        /** 
         * @todo @internal @risky
         * This is one of the oddities.. the vast majority of the time, you'll
         *   get a 201 Created as a result of this API call execept when you
         *   create a Contact. Then you get back a 200 OK and the fully
         *   qualified resource just like you had done a view (GET).
         */
        if ('contacts.json' == $this->_create_uri && 200 == $this->_client->response_code) {
            $this->_client->response_json = substr($this->_client->response_json, 
                    strpos($this->_client->response_json, '{"id"'));
            $tmp_obj = json_decode($this->_client->response_json);
            $id = $tmp_obj->id;
            $new_uri = str_replace('<id>', $id, $this->_client->getUri() . $this->_show_uri);
            $this->_client->response_obj->location = $new_uri;
            $this->_client->response_obj->status = 201;            
        }

        return $this->_client->response_obj;
    }

    public function delete($id = 0)
    {
        $this->delete = str_replace('<id>', $id, $this->_delete_uri);
        $this->_client->delete($this->_client->getUri() . $this->delete, array('id' => $id));

        return (200 == $this->_client->response_code) ? true : false;
    }
}