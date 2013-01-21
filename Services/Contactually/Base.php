<?php

abstract class Services_Contactually_Base
{
    protected $service = null;
    
    public function __construct(Services_Contactually $service)
    {
        $this->service = $service;
    }

    public function bind($properties)
    {
        foreach($properties as $property => $value) {
            $this->$property = $value;
        }

        return $this;
    }

    /**
     * This handles all the GET index actions for all of the resources. In addition,
     *    it takes the JSON return data and converts it to an array of objects
     *    already cast to a class corresponding to our Resource classes.
     * 
     * I'm not usually a fan of the pseudo-code crap using the 'new $classname()'
     *    sort of stuff but it works quite nicely here..
     * 
     * @param type $name - name of the resource we're retrieving
     * @param type $arguments - filters, etc that we want
     * 
     * @return stdClass 
     */
//TODO: break this into separate methods
    public function __call($name, $arguments)
    {
        switch($name) {
            default:
                echo "nope, didn't work";
                throw new Exception("Method not found", 405);
        }
    }

    public function show($id = 0)
    {
        $this->show = str_replace('<id>', $id, $this->_show_uri);
        $json = $this->service->get("{$this->show}", array('id' => $id));
        
        return $this->bind(json_decode($json, true));
    }
}