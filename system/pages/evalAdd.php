<?php
require('../database/DBController.php');

require('../database/Studentsinfo.php');
require('../database/Subject.php');
require('../database/SchoolYear.php');
require('../database/Sem.php');


$db = new DBController();

$stud = new Studentsinfo($db);
$subject = new Subject($db);
$sem = new Sem($db);
$schoolYear = new SchoolYear($db);


if (isset($_POST['addEval'])) {

    $schoolYearArgs = $schoolYear->schoolYear();
    $semList = $sem->getSemActivate();
    $syids = $schoolYearArgs['sy_id'];
    $courseid = $_POST['courseid'];
    $yearlevel = $_POST['yearlevel'];
    $sno = $_POST['sno'];
    $sectionsSelect = $_POST['sectionsSelect'];
    $yearlevel = $_POST['yearlevel'];
    $unitsallow = $_POST['unitsallow'];
    $studType = $_POST['studType'];
    $evalStatus = $_POST['evalStatus'];

    if ($studType == 1) {
        $subjectslist = $subject->returnUnitsForCourse($courseid, $yearlevel, $semList['semid'], $syids);
        $TotalUnitsEnrolled = array_reduce($subjectslist, function ($accumulator, $item) {
            return  $accumulator + (float) $item['subject_units'];
        });
        $unitsallow = $TotalUnitsEnrolled;
    }




    $stud->addStudentsInfo($sno, $sectionsSelect, $yearlevel, $unitsallow, $studType, $evalStatus);

    header('Location: ./students.php');
}
