<?php
/**
 * Author: Waruna Nissanka
 * Email: warunanissanka44@gmail.com
 * Description: Request Url Create Class
 */

class CreateRequestUrl
{
    function __construct()
    {
        
    }
    

    function paymentUrl($version,$msisdn)
    {
        return "https://ideabiz.lk/apicall/payment/$version/tel:+$msisdn/transactions/amount";
    }

    function pinsubscriptionUrl($version, $type="subscribe")
    {
        return "https://ideabiz.lk/apicall/pin/subscription/$version/$type";
    }

    function submitPINUrl($version, $type="submitPin")
    {
        return "https://ideabiz.lk/apicall/pin/subscription/$version/$type";
    }

    function subscriptionUrl($version, $type="subscribe")
    {
        return "https://ideabiz.lk/apicall/subscription/$version/$type";
    }





}




?>