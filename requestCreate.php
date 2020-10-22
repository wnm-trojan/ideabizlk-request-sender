<?php
/**
 * Author: Waruna Nissanka
 * Email: warunanissanka44@gmail.com
 * Description: Request Create Class
 */

include 'createRequestUrl.php';
include 'jsonBodyTemplate.php';
include 'request_handler/requestSend.php';

class RequestCreate
{
    var $url;
    var $body;
    var $auth;

    function __construct()
    {
        $this->url = new CreateRequestUrl();
        $this->body = new JsonRequestBody();
        $this->auth = new RequestSend();
    }


    function createRequest($requestType, $data)
    {
        if(count($data) < 0)
            return false;

        if("payment"==$requestType){

            $obj = (object) $data;

            $get_url = $this->url->paymentUrl($obj->version,$obj->msisdn);

            $get_body = $this->body->paymentJson($obj->correlator,$obj->msisdn,$obj->amount,$obj->currency,$obj->descr,$obj->onbehalf,$obj->categorycode,$obj->channel,$obj->tax,$obj->serviceID,$obj->refCode,$obj->opStatus);

            return $this->auth->sendRequest($get_url, 'POST', $get_body);

        }else if("pin-subscription"==$requestType){
            
            $obj = (object) $data;

            $get_url = $this->url->pinsubscriptionUrl($obj->version);

            $get_body = $this->body->pinsubscriptionJson($obj->method,$obj->msisdn,$obj->serviceId);

            return $this->auth->sendRequest($get_url, 'POST', $get_body);

        }else if("pin-submit"==$requestType){

            $obj = (object) $data;

            $get_url = $this->url->submitPINUrl($obj->version);

            $get_body = $this->body->submitPINJson($obj->pin,$obj->serverRef);

            return $this->auth->sendRequest($get_url, 'POST', $get_body);

        }else{
            return false;
        }
    }

}

?>