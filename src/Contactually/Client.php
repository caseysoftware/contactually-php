<?php

namespace Contactually;

use Guzzle\Http;
use Contactually\Exceptions\InvalidResourceException;

/**
 * Class Client
 * @package Contactually
 *
 * @property-read string $accounts
 * @property-read string $contacts
 * @property-read string $contact_histories
 * @property-read string $email_aliases
 * @property-read string $email_templates
 * @property-read string $followups
 * @property-read string $groupings
 * @property-read string $notes
 * @property-read string $tasks
 */
class Client
{
    const USER_AGENT = 'contactually-php/0.9.0';

    protected $baseURI  = 'https://www.contactually.com/api/v1/';
    protected $apikey   = '';
    protected $client   = null;
    protected $request  = null;

    public $response = null;
    public $statusCode = null;
    public $detail   = null;

    /**
     * @param $apikey
     * @param null $httpClient
     */
    public function __construct($apikey, $httpClient = null)
    {
        $this->apikey = $apikey;
        $this->client = (is_null($httpClient)) ? new Http\Client($this->baseURI) : $httpClient;
        $this->client->setUserAgent($this::USER_AGENT . '/' . PHP_VERSION);
    }

    public function get($uri, $params = array())
    {
        $params['api_key'] = $this->apikey;
        $request = $this->client->get($uri, array(), array('exceptions' => false));
        foreach($params as $key => $value) {
            $request->getQuery()->set($key, $value);
        }

        $this->response = $request->send();
        $this->statusCode = $this->response->getStatusCode();
        $this->detail = $this->response->json();

        return $this->detail;
    }

    public function put($uri, $params = array())
    {

    }

    public function post($uri, $params = array())
    {

    }

    public function delete($uri)
    {
        $request = $this->client->delete($uri, array(), array('exceptions' => false));
        $request->setPostField('api_key', $this->apikey);

        $this->response = $request->send();
        $this->statusCode = $this->response->getStatusCode();
        $this->detail = $this->response->json();

        return $this->response->isSuccessful();
    }

    public function __get($name)
    {
        $classname = ucwords(str_replace("_", " ", $name));
        $fullclass = "Contactually\\" . str_replace(' ', '', $classname);

        if (class_exists($fullclass)) {
            return new $fullclass($this);
        }

        throw new \Contactually\Exceptions\InvalidResourceException('Not supported');
    }
}