<?php
require('../database/DBController.php');

require('../database/Subject.php');


$db = new DBController();

$subj = new Subject($db);

if (isset($_POST['submitaddSub'])) {

    $sy = $_POST['syid'];
    $semid = $_POST['semid'];
    $subname = $_POST['subname'];
    $subcode = $_POST['subcode'];
    $Course = $_POST['Course'];
    $subyr = $_POST['subyr'];
    $subunit = $_POST['subunit'];
    $subj->addSubjects($subname, $subcode, $subyr, $Course, $sy, $semid, $subunit);
    header('Location: ./subjects.php');
}

// if (isset($_GET['syid']) || isset($_GET['semid'])) {
//     $syid = $_GET['syid'];
//     $semid = $_GET['semid'];
//     $sem->activateSem($syid, $semid);
//     header('Location: ./sem.php');
// }
