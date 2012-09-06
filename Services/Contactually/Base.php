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

    public function index($params = array())
    {
        $myObject = $this->service->get($this->index, $params);
//TODO: This is a nasty hack because of the inconsistent property names :(
$property_name = $this->name;
$property_name = ('buckets' == $property_name) ? 'user_buckets' : $property_name;
$property_name = ('contact_histories' == $property_name) ? 'email_histories' : $property_name;
$property_name = ('followups' == $property_name) ? 'today' : $property_name;

        $dataSet = $myObject->{$property_name};

        foreach($dataSet as $key => $values) {
            $newObject = clone $this;
            $dataSet[$key] = $newObject->bind($values);
        }
        return $dataSet;
    }

    public function show($id = 0)
    {
        $this->show = str_replace('<id>', $id, $this->show);
        $myObject = $this->service->get("{$this->show}", array('id' => $id));

        return $this->bind($myObject);
    }

    public function create($params = array())
    {
        
    }
}