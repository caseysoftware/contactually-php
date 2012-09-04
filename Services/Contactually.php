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
            'accounts',
            'buckets',
            'contact_histories',
            'contacts',
            'followups',
            'notes',
            'tasks',
            'users'
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

    public function getContacts($limit = 10)
    {
        $contacts_uri = 'https://www.contactually.com/api/v1/contacts.json';
        $contacts_uri .= '?limit=' . (int) $limit;

        return $this->execute($contacts_uri);
    }
    
    public function getAccounts()
    {
        $accounts_url = 'https://www.contactually.com/api/v1/accounts.json';

        return $this->execute($accounts_url);
    }
}