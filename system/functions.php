<?php

require('./database/DBController.php');
require('./database/PersonalData.php');
require('./database/FamilyData.php');
require('./database/User.php');
require('./database/Course.php');



$db = new DBController();

$personalData = new PersonalData($db);
$family = new FamilyData($db);
$course = new Course($db);

// print_r($personalData->getData());
$users =  new User($db);


/* Set the mail sender. */
// $mail->smtpConnect($config);
