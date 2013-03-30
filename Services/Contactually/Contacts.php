<?php

class Services_Contactually_Contacts extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/contacts.json';
    protected $_search_uri = 'https://www.contactually.com/api/v1/contacts/search.json';

    /**
     * @todo TODO: implement pagination and additional filters: bucket_id, page,
     *       limit, unbucketed, full, tag, updated_since
     */
    protected $_data = 'contacts';
    protected $_class = 'Services_Contactually_Contact';

    /**
     * @todo TODO: implement pagination: page, limit, full
     */
    public function search($term, $myArray = array())
    {
        $myArray['term'] = $term;

        $this->client->get($this->_search_uri, $myArray);

        $object = $this->client->response_obj;

        $this->_json = $this->client->response_json;
        $this->_obj  = $object->{$this->_data};
        $this->count = $object->count;

        return $this;
    }
}