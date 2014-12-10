<?php

namespace Contactually;

class Contacts extends \Contactually\Common\Resource
{
    protected $resource = 'contacts';
    protected $dataname = 'contacts';

    public function search($term, $parameters = array())
    {
        $parameters['term'] = $term;

        $this->resource = 'contacts/search';

        return parent::index($parameters);
    }

    public function statistics($id)
    {
        $results = $this->client->get($this->resource . '/' . $id . '/statistics.json');

        return json_decode(json_encode($results));
    }
}