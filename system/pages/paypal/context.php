<?php

$composerAutoload = dirname(dirname(dirname(__DIR__))) . '\vendor\autoload.php';


require $composerAutoload;


use PayPal\Auth\OAuthTokenCredential;


use PayPal\Rest\ApiContext;


$clientId = 'SECRET';
$clientSecret = 'SECRET';

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        $clientId,
        $clientSecret
    )
);
