<?php

abstract class Services_Contactually_Resources_Base
{
    protected $cookie_path = '';

    public function get($uri, $params = array())
    {
        $uri .= (count($params)) ? '?'.http_build_query($params) : '';

        $curl_opts = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $uri,
            CURLOPT_COOKIEFILE => $this->cookie_path,
        );

        return $this->_execute($curl_opts);
    }

    public function post($uri, $params = array())
    {
        $curl_opts = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $uri,
            CURLOPT_POST => count($params),
            CURLOPT_POSTFIELDS => $params,
/* TODO: This handles the cookie-based auth. Will need refactoring later.*/
            CURLOPT_COOKIEJAR => $this->cookie_path,
            CURLOPT_COOKIEFILE => $this->cookie_path, //saved cookies
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
        $this->_json = curl_exec($connection);

//TODO:  We have the response code, we should probably do something with it.
        $this->status = curl_getinfo($connection, CURLINFO_HTTP_CODE);

        curl_close($connection);

        return $this;
    }
}