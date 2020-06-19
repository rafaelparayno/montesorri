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
