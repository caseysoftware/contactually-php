<?php

class Services_Contactually_Bucket extends Services_Contactually_Resources_Base
{
    public $id = '';
    public $bucket_id = '';
    public $name = '';
    public $sync_to_crm = '';
    public $share_with_team = '';
    public $team_bucket_id = '';
    public $num_days_to_followup = '';
    public $num_days_to_respond = '';

    protected $_resource = 'bucket';

    protected $_show_uri   = 'buckets/<id>.json';
    protected $_create_uri = 'buckets.json';
    protected $_delete_uri = 'buckets/<id>.json';
}