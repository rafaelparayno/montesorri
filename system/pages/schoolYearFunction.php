<?php
require('../database/DBController.php');

require('../database/SchoolYear.php');


$db = new DBController();

$schoolyear = new SchoolYear($db);

if (isset($_POST['submitaddSy'])) {

    $sy = $_POST['from'] . '-' . $_POST['to'];
    $schoolyear->addSY($sy);

    header('Location: ./schoolyear.php');
}

if (isset($_GET['syid'])) {
    $syid = $_GET['syid'];
    $schoolyear->activateSy($syid);
    header('Location: ./schoolyear.php');
}
