<?php

class Services_Contactually_Contacts extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/contacts.json';
    protected $_search_uri = 'https://www.contactually.com/api/v1/contacts/search.json';

    /**
     * @todo TODO: implement additional filters: bucket_id, unbucketed, full,
     *    tag, updated_since
     */
    protected $_data = 'contacts';
    protected $_class = 'Services_Contactually_Contact';

    /**
     * @todo TODO: implement the "full" parameter to allow for complete/deep
     *    data to be returned
     */
    public function search($term, $page = 1, $limit = 100)
    {
        $this->term = $term;
        $this->page = max($page, 1);
        $this->limit = min($limit, 100);

        $params = array('term' => $this->term, 'page' => $this->page, 'limit' => $this->limit);
        $this->client->get($this->_search_uri, $params);

        $object = $this->client->response_obj;

        $this->_json = $this->client->response_json;
        $this->_obj  = $object->{$this->_data};

        $this->count = $object->count;
        $this->_total = $object->total_count;
        $this->_page_count = ceil($this->_total / $this->limit);

        return $this;
    }
}