<?php
/**
 * Author: Waruna Nissanka
 * Email: warunanissanka44@gmail.com
 * Description: Request Send Method
 */

include 'IdeaBizAPIHandler.php';

class RequestSend
{
  var $auth;

  function __construct()
  {
    $this->auth = new IdeaBizAPIHandler();
  }


  function sendRequest($url, $method, $body)
  {
    switch($method)
    {
      case "GET":
        $setMethod = RequestMethod::GET;
        break;
      case "POST":
        $setMethod = RequestMethod::POST;
        break;
      case "PUT":
        $setMethod = RequestMethod::PUT;
        break;
      case "DELETE":
        $setMethod = RequestMethod::DELETE;
        break;
      default:
        throw new MethodException("Invalid Request Method");   
    }

    return $this->auth->sendAPICall($url, $setMethod, $body);
  }



}
