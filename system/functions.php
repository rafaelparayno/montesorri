<?php

require('./database/DBController.php');

require('./database/PersonalData.php');
require('./database/User.php');


$db = new DBController();

$personalData = new PersonalData($db);

// print_r($personalData->getData());
$users =  new User($db);
