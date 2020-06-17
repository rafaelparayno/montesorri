<?php
require('../database/DBController.php');

require('../database/Section.php');


$db = new DBController();

$sect = new Section($db);

if (isset($_POST['submitaddSect'])) {

    $sy = $_POST['syid'];
    $semid = $_POST['semid'];
    $sectname = $_POST['sectname'];
    $Course = $_POST['Course'];
    $sectyr = $_POST['sectyr'];
    $sect->addSection($sectname, $Course, $sy, $semid, $sectyr);

    header('Location: ./sections.php');
}

// if (isset($_GET['syid']) || isset($_GET['semid'])) {
//     $syid = $_GET['syid'];
//     $semid = $_GET['semid'];
//     $sem->activateSem($syid, $semid);
//     header('Location: ./sem.php');
// }
