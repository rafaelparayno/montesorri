<?php

require('../database/DBController.php');

require('../database/PersonalData.php');
require('../database/FamilyData.php');
require('../database/SchoolYear.php');
require('../database/Sem.php');
require('../database/Section.php');
require('../database/Course.php');
require('../database/User.php');
require('../database/Subject.php');
require('../database/Fee.php');
require('../database/Studentsinfo.php');
require('../database/Message.php');
require('../database/Account.php');
require('../database/Strand.php');


$db = new DBController();

$personal = new PersonalData($db);
$family = new FamilyData($db);

$schoolYear = new SchoolYear($db);
$sem = new Sem($db);
$course = new Course($db);
$section = new Section($db);
$subject = new Subject($db);
$fee = new Fee($db);
$studentsinfo = new Studentsinfo($db);
$users = new User($db);
$message = new Message($db);
$account = new Account($db);
$strand = new Strand($db);
