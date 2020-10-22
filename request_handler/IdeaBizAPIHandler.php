<?php
/**
 * Author: Waruna Nissanka
 * Email: warunanissanka44@gmail.com
 * Description: Request Send API Call
 */

include dirname(__FILE__) . '/lib/Exceptions.php';
include dirname(__FILE__) . '/lib/Authenticator.php';

class IdeaBizAPIHandler
{
    var $auth;

    function __construct()
    {
        $this->auth = new Authenticator();
    }


    /*
     * Send Ideabiz apicall through this methode. it will generate token automatically and call the method
     */
    function sendAPICall($url, $method, $body, $contentType = "application/json", $accept = "application/json")
    {
        if($this->auth->getAccessToken() == null){
            $this->auth->renewToken();
        }

        $r = getHTTP($url, $body, $method, null, array("Content-Type: " . $contentType,
            "Accept: " . $accept, "Authorization: Bearer " . $this->auth->getAccessToken()), null, true);

        if ($r['status'] != "OK")
            return $r;

        if ($r['statusCode'] == 401 && strpos($r['body'], 'Expired') !== false) {
            $this->auth->renewToken();
            $r = getHTTP($url, $body, $method, null, array("Content-Type: " . $contentType,
                "Accept: " . $accept, "Authorization: Bearer " . $this->auth->getAccessToken()), null, true);

        }
        return $r;
    }


}