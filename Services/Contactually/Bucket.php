<?php

class Services_Contactually_Bucket extends Services_Contactually_Base
{
    public $id = '';
    public $bucket_id = '';
    public $name = '';
    public $sync_to_crm = '';
    public $share_with_team = '';
    public $team_bucket_id = '';
    public $num_days_to_followup = '';
    public $num_days_to_respond = '';

    protected $_show_uri = 'https://www.contactually.com/api/v1/buckets/<id>.json';
    protected $_create_uri = 'https://www.contactually.com/api/v1/buckets.json';

    public function create(array $params)
    {
        $bucket = array();

        foreach($params as $key => $value) {
            $bucket["bucket[$key]"] = $value;
        }

        $this->client->post($this->_create_uri, $bucket);

        return (201 == $this->client->status) ? true : false;
    }
}