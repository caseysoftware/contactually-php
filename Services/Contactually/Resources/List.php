<?php

abstract class Services_Contactually_Resources_List
    implements Iterator
{
    protected $client = null;
    protected $_index = 0;
    protected $_total = 1;
    protected $_page_count = 1;

    public $page = 1;
    public $limit = 100;

    public function __construct(Services_Contactually $client)
    {
        $this->client = $client;
    }

    /**
     * This method gets a specified page of results.
     *
     * The API errors if the page < 1 or the limit > 100, so we validate those
     *   here. I'm not sure if that's the best approach but it works.
     *
     * @param type $page
     * @param type $limit
     * @return Services_Contactually_Resources_List 
     */
    public function index($page = 1, $limit = 100)
    {
        $this->page = max($page, 1);
        $this->limit = min($limit, 100);

        $params = array('page' => $this->page, 'limit' => $this->limit);
        $this->client->get($this->_index_uri, $params);

        $object = $this->client->response_obj;
        $this->_obj  = $object->{$this->_data};

        $this->count = $object->count;
        $this->_total = $object->total_count;
        $this->_page_count = ceil($this->_total / $this->limit);

        return $this;
    }

    public function getTotalRecords()
    {
        return $this->_total;
    }

    public function getPageCount()
    {
        return $this->_page_count;
    }

    public function getNextPage()
    {
        $this->page++;
        $this->page = min($this->page, $this->_page_count);

        return $this->index($this->page, $this->limit);
    }

    public function getPreviousPage()
    {
        $this->page--;
        $this->page = max($this->page, 1);

        return $this->index($this->page, $this->limit);
    }
    public function hasMorePages()
    {
        return ($this->page < $this->_page_count);
    }

    protected function _getObject($index = 0)
    {
        $params = array();

        if (isset($this->_obj[$index])) {
            $params = $this->_obj[$index];
        }

        $item = new $this->_class($this->client);
        return $item->bind($params);
    }

    public function rewind()
    {
        $this->_index = 0;
    }
    public function current()
    {
        return $this->_getObject($this->_index);
    }
    public function key()
    {
        return $this->_index;
    }
    public function next()
    {
        $this->_index++;
    }
    public function valid()
    {
        return isset($this->_obj[$this->_index]);
    }
}