<?php

class Services_Contactually_Buckets extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    /**
     * @internal This is one of the odd names.. it should be buckets but is user_buckets instead
     */
    protected $_data = 'user_buckets';
    protected $_class = 'Services_Contactually_Bucket';
 
    protected $_index_uri = 'buckets.json';
    protected $_list_uri  = 'buckets/list.json';

    public function __call($name, $params)
    {
        /**
         * @internal The list() method has to be implemented this way because
         *    list is a function name in PHP.
         *
         * @todo Note that the field names here are *not* the same as the field
         *   names in the normal $buckets->index() method call. In that case,
         *   the property is called 'user_buckets' but here it's called 'bucketzs'
         */
        if ('list' == $name) {
            $this->client->get($this->client->getUri() . $this->_list_uri);

            $object = $this->client->response_obj;
            $this->_obj  = $object->bucket_sets;

            $this->count = $object->count;
            $this->_total = $object->count;
            $this->_page_count = 1;

            return $this;
        }
    }

    public function getTotalRecords()
    {
        return $this->_total;
    }

    public function getPageCount()
    {
        return 1;
    }

    public function getNextPage()
    {
        return $this->index(1);
    }

    public function getPreviousPage()
    {
        return $this->index(1);
    }
    public function hasMorePages()
    {
        return false;
    }
}