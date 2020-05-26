<?php
require('../database/DBController.php');

require('../database/Sem.php');


$db = new DBController();

$sem = new Sem($db);

if (isset($_POST['submitaddSem'])) {

    $sy = $_POST['syid'];
    $term = $_POST['semterm'];
    $sem->addSem($term, $sy);

    header('Location: ./sem.php');
}

if (isset($_GET['syid']) || isset($_GET['semid'])) {
    $syid = $_GET['syid'];
    $semid = $_GET['semid'];
    $sem->activateSem($syid, $semid);
    header('Location: ./sem.php');
}
