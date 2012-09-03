<?php

function Services_Contactually_autoload($className) {
    if (substr($className, 0, 15) != 'Services_Contactually') {
        return false;
    }
    $file = str_replace('_', '/', $className);
    $file = str_replace('Services/', '', $file);
    return include dirname(__FILE__) . "/$file.php";
}

spl_autoload_register('Services_Contactually_autoload');

class Services_Contactually
{
    protected $connection = null;
    protected $auth_url   = 'https://www.contactually.com/users/sign_in.json';

    /*
     * Authentication derived from the docs: http://developers.contactually.com/
     *   and influenced by PSR-0 and Twilio's PHP library.
     */
    public function __construct($params)
    {
        $fields = '';
        foreach($params as $param => $value) {
            $fields .= "&user[$param]=".urlencode($value);
        }

        //open connection
        $connection = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($connection,CURLOPT_URL, $this->auth_url);
        curl_setopt($connection,CURLOPT_POST, count($params));
curl_setopt($connection,CURLOPT_HEADER, true);
curl_setopt($connection, CURLOPT_VERBOSE, true);
        curl_setopt($connection,CURLOPT_POSTFIELDS, $fields);

        //execute post
        $result = curl_exec($connection);

print_r($result);
//TODO: get cookie for later interactions
    }
}