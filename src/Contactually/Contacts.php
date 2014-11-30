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
}