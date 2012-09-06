<?php

function Services_Contactually_autoload($className) {
    if (substr($className, 0, 21) != 'Services_Contactually') {
        return false;
    }
    $file = str_replace('_', '/', $className);
    $file = str_replace('Services/', '', $file);
    return include dirname(__FILE__) . "/$file.php";
}

spl_autoload_register('Services_Contactually_autoload');

class Services_Contactually
{
    protected $cookie_path = '';
//TODO: I don't like having to enumerate these up front. The library should allow the API to inform on available resources.
    protected $sub_resources = array(
                    'accounts' => 'Account',
                    'buckets' => 'Bucket',
                    'contact_histories' => 'ContactHistory',
                    'contacts' => 'Contact',
                    'followups' => 'Followup',
                    'notes' => 'Note',
                    'tasks' => 'Task',
                    'users' => 'User'
                );

    /*
     * Authentication derived from the docs: http://developers.contactually.com/
     *   and influenced by PSR-0 and Twilio's PHP library.
     */
    public function __construct($params)
    {
        $this->cookie_path = getcwd() . '/cookie.txt';

        /*
         * I'm not a fan of this hack, but it seemed the most appropriate for the
         *    time being to keep the rest of the param processing for the API calls the same.
         */
        foreach($params as $param => $value) {
            unset($params[$param]);
            $params["user[$param]"] = $value;
        }
        $auth_url = 'https://www.contactually.com/users/sign_in.json';

        $this->post($auth_url, $params);

//TODO: I really don't like how this is structured.. why bother declaring all of these subresources/classes if I don't need them?
        foreach($this->sub_resources as $obj => $class) {
            $classname = 'Services_Contactually_'.$class;
            $this->$obj = new $classname($this);
        }
    }

    public function post($uri, $params = array())
    {
        $curl_opts = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $uri,
            CURLOPT_POST => count($params),
            CURLOPT_POSTFIELDS => $params,
/* TODO: This handles the cookie-based auth. Will need refactoring later. */
            CURLOPT_COOKIEJAR => $this->cookie_path,
            CURLOPT_COOKIEFILE => $this->cookie_path, //saved cookies
        );
        
        return $this->_execute($curl_opts);
    }

    public function get($uri, $params = array())
    {
        $uri .= '?'.http_build_query($params);

        $curl_opts = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $uri,
            CURLOPT_COOKIEFILE => $this->cookie_path,
            
        );

        return $this->_execute($curl_opts);
    }

    protected function _execute($curl_params = array())
    {

        //open connection
        $connection = curl_init();
        foreach($curl_params as $option => $value) {
            curl_setopt($connection, $option, $value);
        }
//TODO:  We need to add certificate validation. I've disabled it for now.
curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, false);

        //execute request
        $response = curl_exec($connection);

//TODO:  We have the response code, we should probably do something with it.
        $this->status = curl_getinfo($connection, CURLINFO_HTTP_CODE);

        curl_close($connection);

        return json_decode($response);
    }
}