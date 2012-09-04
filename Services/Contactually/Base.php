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
    public function __call($name, $arguments)
    {
        switch($name) {
            case 'index':
                $myObject = $this->service->get($this->index, $arguments[0]);
                $dataSet = $myObject->{$this->name};

                foreach($dataSet as $key => $values) {
                    $newObject = clone $this;
                    $dataSet[$key] = $newObject->bind($values);
                }
                //$myObject->{$this->name} = $dataSet;
                
                return $dataSet;
                break;
            default:
                echo "nope, didn't work";
                throw new Exception("Method not found", 405);
        }
    }
}