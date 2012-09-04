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
    protected $connection = null;
    protected $cookie_path = '';
    protected $sub_resources = array();

    /*
     * Authentication derived from the docs: http://developers.contactually.com/
     *   and influenced by PSR-0 and Twilio's PHP library.
     */
    public function __construct($params)
    {
        $this->cookie_path = getcwd() . '/cookie.txt';
        $this->sub_resources = array(
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
         * I'm not a fan of this hack, but it seemed the most appropriate for the
         *    time being to keep the rest of the param processing for the API calls the same.
         */
        foreach($params as $param => $value) {
            unset($params[$param]);
            $params["user[$param]"] = $value;
        }
        $auth_url = 'https://www.contactually.com/users/sign_in.json';

        $this->execute($auth_url, $params);
    }

    public function execute($uri, $params = array())
    {
        $fields = '';
        foreach($params as $param => $value) {
            $fields .= "&user[$param]=".urlencode($value);
        }

        //open connection
        $connection = curl_init();
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, TRUE);

        //set the url, number of POST vars, POST data
        curl_setopt($connection,CURLOPT_URL, $uri);
        curl_setopt($connection,CURLOPT_POST, count($params));

        /* This handles the cookie-based auth. Will need refactoring later. */
        curl_setopt($connection, CURLOPT_COOKIEJAR, $this->cookie_path);
        curl_setopt($connection, CURLOPT_COOKIEFILE, $this->cookie_path); //saved cookies
//TODO:  We need to add certificate validation. I've disabled it for now.
curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, false);
        //execute post
        $response = curl_exec($connection);

//TODO:  We have the response code, we should probably do something with it.
        $status = curl_getinfo($connection, CURLINFO_HTTP_CODE);

        curl_close($connection);

        return json_decode($response);        
    }

    /**
     * This handles all the GET index actions for all of the resources. In addition,
     *    it takes the JSON return data and converts it to an array of objects
     *    already cast to a class corresponding to our Resource classes.
     * 
     * I'm not usually a fan of the pseudo-code crap using the 'new $classname()'
     *    sort of stuff but it works quite nicely here..
     * 
     * @param type $name - name of the resource we're retrieving
     * @param type $arguments - filters, etc that we want
     * 
     * @return stdClass 
     */
    public function __call($name, $arguments)
    {
        if(isset($this->sub_resources[$name])) {
            $target_uri = "https://www.contactually.com/api/v1/$name.json";
            $myObject = $this->execute($target_uri, $arguments);

            $classname = 'Services_Contactually_'.$this->sub_resources[$name];

            $dataSet = $myObject->$name;
            foreach($dataSet as $key => $values) {
                $newObject = new $classname();
                $dataSet[$key] = $newObject->bind($values);
            }
            $myObject->$name = $dataSet;

            return $myObject;
        } else {
            echo "nope, didn't work";
            throw new Exception("Method not found", 405);
        }
    }
}