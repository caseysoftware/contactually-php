<?php

namespace Contactually;

class Contacts extends \Contactually\Common\Resource
{
    protected $resource = 'contacts';

    public function show($id)
    {
        $results = $this->client->get($this->resource . '/' . $id . '.json');

        return json_decode(json_encode($results));
    }
}