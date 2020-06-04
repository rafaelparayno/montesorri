<?php
require('../database/DBController.php');
require('../database/Sem.php');
require('../database/SchoolYear.php');
require('../database/ShsPersonal.php');




$db = new DBController();
$sem = new Sem($db);
$school = new SchoolYear($db);
$shspersonal = new ShsPersonal($db);


if (isset($_GET['sno'])) {

    $schoolYearArgs = $school->schoolYear();
    $semList = $sem->getSemActivate();
    $shspersonal->updateEnrolled($_GET['sno'], $semList['semid'], $schoolYearArgs['sy_id']);
}
