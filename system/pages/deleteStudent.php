<?php
require('../database/DBController.php');

require('../database/PersonalData.php');
require('../database/FamilyData.php');

$db = new DBController();

$personal = new PersonalData($db);
$family = new FamilyData($db);

$sno = $_GET['sno'];
$personal->deleteData('sno', $sno);
$family->deleteData('sno', $sno);

header('Location: ./students.php');
