<?php


require('./../../database/DBController.php');

require('./../../database/SchoolYear.php');
require('./../../database/Sem.php');
require('./../../database/Section.php');
require('./../../database/Course.php');
require('./../../database/Subject.php');

$db = new DBController();

$section = new Section($db);
$sem = new Sem($db);
$schoolYear = new SchoolYear($db);

if (isset($_POST['coursesid'])) {
    $schoolYearArgs = $schoolYear->schoolYear();
    $semList = $sem->getSemActivate();

    $syids = $schoolYearArgs['sy_id'];

    $results = $section->getDataSearchCourse($syids, $semList['semid'], $_POST['coursesid']);
    echo json_encode($results);
}
