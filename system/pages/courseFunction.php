<?php
require('../database/DBController.php');

require('../database/Course.php');


$db = new DBController();

$course = new Course($db);

if (isset($_POST['submitaddCourse'])) {

    $cname = $_POST['courseName'];
    $code = $_POST['coursecode'];
    $course->addCourse($cname, $code);

    header('Location: ./course.php');
}

// if (isset($_GET['syid'])) {
//     $syid = $_GET['syid'];
//     $schoolyear->activateSy($syid);
//     header('Location: ./schoolyear.php');
// }
