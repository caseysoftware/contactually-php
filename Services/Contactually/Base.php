<?php

abstract class Services_Contactually_Base
{
    public function bind($properties)
    {
        foreach($properties as $property => $value) {
            $this->$property = $value;
        }

        return $this;
    }
}