<?php

$composerAutoload = dirname(dirname(dirname(__DIR__))) . '\vendor\autoload.php';


require $composerAutoload;


use PayPal\Auth\OAuthTokenCredential;


use PayPal\Rest\ApiContext;


$clientId = 'Ae1CzR_e7WWZhF1-VGr4tnNp4fiPN7PolsNDLtxXWvTAvUC7DUEAox6YQ20X7O0D9049dga5N2xZ3qFV';
$clientSecret = 'ELgksb_UShYf1Ydm5SZXcINb0FT5kPXRcUuw9ef5vqw4Co0wiCznhLbxEnG90yIYgxmDUk6Ce0e9pE0P';

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        $clientId,
        $clientSecret
    )
);


//$auth = new OAuthTokenCredential($clientId, $clientSecret);
//$apiContext = getApiContext($clientId, $clientSecret);

// $auth = new OAuthTokenCredential($clientId, $clientSecret);
// $apicon = new ApiContext($auth);


// function getApiContext($clientId, $clientSecret)
// {

//     // #### SDK configuration
//     // Register the sdk_config.ini file in current directory
//     // as the configuration source.
//     /*
//     if(!defined("PP_CONFIG_PATH")) {
//         define("PP_CONFIG_PATH", __DIR__);
//     }
//     */


//     // ### Api context
//     // Use an ApiContext object to authenticate
//     // API calls. The clientId and clientSecret for the
//     // OAuthTokenCredential class can be retrieved from
//     // developer.paypal.com

//     $apiContext = new ApiContext(
//         new OAuthTokenCredential(
//             $clientId,
//             $clientSecret
//         )
//     );

//     // Comment this line out and uncomment the PP_CONFIG_PATH
//     // 'define' block if you want to use static file
//     // based configuration

//     $apiContext->setConfig(
//         array(
//             'mode' => 'sandbox',
//             'log.LogEnabled' => true,
//             'log.FileName' => '../PayPal.log',
//             'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
//             'cache.enabled' => true,
//             //'cache.FileName' => '/PaypalCache' // for determining paypal cache directory
//             // 'http.CURLOPT_CONNECTTIMEOUT' => 30
//             // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
//             //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
//         )
//     );

//     // Partner Attribution Id
//     // Use this header if you are a PayPal partner. Specify a unique BN Code to receive revenue attribution.
//     // To learn more or to request a BN Code, contact your Partner Manager or visit the PayPal Partner Portal
//     // $apiContext->addRequestHeader('PayPal-Partner-Attribution-Id', '123123123');

//     return $apiContext;
// }
