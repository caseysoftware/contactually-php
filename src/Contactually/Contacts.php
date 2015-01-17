<?php

namespace Contactually;

class Contacts extends \Contactually\Resources\Base
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
        $this->bind($results);

        return $this;
    }
}