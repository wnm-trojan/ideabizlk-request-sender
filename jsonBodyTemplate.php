<?php
/**
 * Author: Waruna Nissanka
 * Email: warunanissanka44@gmail.com
 * Description: Request Body Create Class
 */

class JsonRequestBody
{
    function __construct()
    {
        
    }

    function paymentJson($correlator='',$msisdn,$amount,$currency,$descr,$onbehalf,$categorycode,$channel='WAP',$tax=0,$serviceID=null,$refCode='',$opStatus='Charged')
    {
        return '{
            "amountTransaction": {
                "clientCorrelator": "'.$correlator.'",
                "endUserId": "tel:+'.$msisdn.'",
                "paymentAmount": {
                    "chargingInformation": {
                        "amount": '.$amount.',
                        "currency": "'.$currency.'",
                        "description": "'.$descr.'"
                    },
                    "chargingMetaData": {
                        "onBehalfOf": "'.$onbehalf.'",
                        "purchaseCategoryCode": "'.$categorycode.'",
                        "channel": "'.$channel.'",
                        "taxAmount": "'.$tax.'",
                        "serviceID": "'.$serviceID.'"
                    }  
                },
                "referenceCode": "'.$refCode.'",
                "transactionOperationStatus": "'.$opStatus.'"
            }
        }';
    }

    function pinsubscriptionJson($method,$msisdn,$serviceId)
    {
        if($serviceId==''){

            return '{
                "method":"'.$method.'",
                "msisdn":"'.$msisdn.'"
            }';

        }else{

            return '{
                "method":"'.$method.'",
                "msisdn":"'.$msisdn.'",
                "serviceId" : "'.$serviceId.'"
            }';

        }
        
    }

    function submitPINJson($pin, $serverRef)
    {
        return '{
            "pin": "'.$pin.'",
            "serverRef": "'.$serverRef.'"
          }';
    }

    function subscribe($method,$msisdn)
    {
        return '{
            "method":"'.$method.'",      
            "msisdn": "tel:+'.$msisdn.'"
        }';
    }

    function unsubscribe($method,$msisdn)
    {
        return '{
            "method":"'.$method.'",      
            "msisdn": "tel:+'.$msisdn.'"
        }';
    }


}


?>