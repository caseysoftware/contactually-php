<?php

function Services_Contactually_autoload($className) {
    $library_name = 'Services_Contactually';
    
    if (substr($className, 0, strlen($library_name)) != $library_name) {
        return false;
    }
    $file = str_replace('_', '/', $className);
    $file = str_replace('Services/', '', $file);
    return include dirname(__FILE__) . "/$file.php";
}

spl_autoload_register('Services_Contactually_autoload');

/**
 * Contactually API client interface.
 *
 * @package  Services\Contactually
 * @author   Keith Casey <contrib@caseysoftware.com>
 * @license  http://creativecommons.org/licenses/MIT/ MIT
 */
class Services_Contactually extends Services_Contactually_Resources_Base
{
    const USER_AGENT = 'contactually-php/0.0.1';
//TODO: I don't like having to enumerate these up front. The library should allow the API to inform on available resources.
    protected $resources = array(
                    'accounts' => 'Accounts',
                    'buckets' => 'Buckets',
                    'contact_histories' => 'ContactHistories',
                    'contacts' => 'Contacts',
                    'followups' => 'Followups',
                    'notes' => 'Notes',
                    'tasks' => 'Tasks',
                    'users' => 'Users'
                );

    /*
     * Authentication derived from the docs: http://developers.contactually.com/
     *   and influenced by PSR-0 and Twilio's PHP library.
     */
    public function __construct($params)
    {
        $this->cookie_path = getcwd() . '/cookie.txt';

        if (isset($params['apikey'])) {
            //do nothing, move along
        } elseif (isset($params['email']) && isset($params['password'])) {
            foreach($params as $param => $value) {
                unset($params[$param]);
                $params["user[$param]"] = $value;
            }
        } else {
            throw new Services_Contactually_Exception_Authentication(
                    "To authenticate, you must include either an API Key or an email and password");
        }

        $this->_authenticate($params);
    }

    public function __get($name)
    {
        $object = null;

        if (isset($this->resources[$name])) {
            $classname = 'Services_Contactually_'.$this->resources[$name];
            $object = new $classname($this);
        }

        return $object;
    }

    protected function _authenticate($params)
    {
        $auth_url = 'https://www.contactually.com/users/sign_in.json';
        $success = array(200 => 'OK', 201 => 'Created', 202 => 'Accepted');

        $this->post($auth_url, $params);

        if (!isset($success[$this->status])) {
            throw new Services_Contactually_Exception_Authentication(
                    "Authentication failed - " . $this->_obj->error);
        }
    }
}