<?php

class Services_Contactually_Bucket extends Services_Contactually_Base
{
    protected $name  = 'buckets';
    protected $index = 'https://www.contactually.com/api/v1/buckets.json';
    protected $show  = 'https://www.contactually.com/api/v1/buckets/<id>.json';
}