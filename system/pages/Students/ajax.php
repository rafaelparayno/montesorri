<?php


require('./../../database/DBController.php');

require('./../../database/SchoolYear.php');
require('./../../database/Sem.php');
require('./../../database/Section.php');
require('./../../database/Course.php');
require('./../../database/Subject.php');
require('./../../database/PersonalData.php');
require('./../../database/User.php');
require('./../../database/StudentGrade.php');


$db = new DBController();

$section = new Section($db);
$sem = new Sem($db);
$schoolYear = new SchoolYear($db);
$personal = new PersonalData($db);
$studentGrade = new StudentGrade($db);
$subject = new Subject($db);

$user = new User($db);

if (isset($_POST['coursesid'])) {
    $schoolYearArgs = $schoolYear->schoolYear();
    $semList = $sem->getSemActivate();

    $syids = $schoolYearArgs['sy_id'];

    $results = $section->getDataSearchCourse($syids, $semList['semid'], $_POST['coursesid']);
    echo json_encode($results);
}

if (isset($_POST['sectionyr'])) {
    $schoolYearArgs = $schoolYear->schoolYear();
    $semList = $sem->getSemActivate();

    $syids = $schoolYearArgs['sy_id'];

    $results = $section->getDataSearchYearlvl($syids, $semList['semid'], $_POST['sectionyr']);
    echo json_encode($results);
}

if (isset($_POST['studentSno'])) {


    $results = $personal->getDatabySearching('sno', $_POST['studentSno']);
    echo json_encode($results);
}

if (isset($_POST['toMessage'])) {
    $userRole = $_POST['userole'];
    $results = $user->getDataSearchLike($_POST['toMessage'], $userRole);
    // $results = 
    echo json_encode($results);
}

if (isset($_POST['studentSnoGrade'])) {
    $schoolYearArgs = $schoolYear->schoolYear();
    $semList = $sem->getSemActivate();

    $syids = $schoolYearArgs['sy_id'];

    // $userRole = $_POST['userole'];
    $results = $studentGrade->getData($syids, $semList['semid'], $_POST['studentSnoGrade']);
    // // $results = 
    echo json_encode($results);
}


if (isset($_POST['searchCode'])) {


    // $userRole = $_POST['userole'];
    $results = $subject->getCurriculum($_POST['searchCode']);
    // // $results = 
    echo json_encode($results);
}
