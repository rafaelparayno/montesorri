<?php

require('../database/DBController.php');

require('../database/PersonalData.php');
require('../database/FamilyData.php');
require('../database/SchoolYear.php');
require('../database/Sem.php');
require('../database/User.php');


$db = new DBController();

$personal = new PersonalData($db);
$family = new FamilyData($db);

$schoolYear = new SchoolYear($db);
$sem = new Sem($db);
