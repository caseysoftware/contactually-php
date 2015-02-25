<?php

namespace Contactually;

class Contacts extends \Contactually\Resources\Base
{
    protected $resource = 'contacts';
    protected $dataname = 'contacts';
    protected $postname = 'contact';

    public function search($term, $parameters = array())
    {
        $parameters['term'] = $term;

        $results = $this->client->get($this->resource . '/search.json', $parameters);

        $this->data = $results[$this->dataname];
        $this->count = $results['count'];

        return $this;
    }

    public function statistics($id)
    {
        $results = $this->client->get($this->resource . '/' . $id . '/statistics.json');
        $this->bind($results);

        return $this;
    }

    public function bucket($bucket_id)
    {
        $parameters = array('grouping_id' => $bucket_id);

        $results = $this->client->post($this->resource . '/' . $this->id . '/groupings.json', $parameters);

        return $results;
    }

    public function unbucket($bucket_id)
    {
        $results = $this->client->delete($this->resource . '/' . $this->id . '/groupings/' . $bucket_id . '.json');

        return $results;
    }

    public function tag(array $tags)
    {
        $parameters = array('tags' => implode(',', $tags));

        $results = $this->client->post($this->resource . '/' . $this->id . '/tags.json', $parameters);

        return $results;
    }
}