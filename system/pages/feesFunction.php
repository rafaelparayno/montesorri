<?php
require('../database/DBController.php');

require('../database/Fee.php');


$db = new DBController();

$fee = new Fee($db);

if (isset($_POST['subtmidTf_1'])) {

    $tf = $_POST['perUnit1'];
    $misc = $_POST['misc1'];
    $sy = $_POST['syid'];
    $semid = $_POST['semid'];

    $lvl = $_POST['yrlvl1'];

    $fee->addfee($tf, $misc, $sy, $semid, $lvl);
    header('Location: ./fees.php');
}


if (isset($_POST['subtmidTf_2'])) {

    $tf = $_POST['perUnits2'];
    $misc = $_POST['misc2'];
    $sy = $_POST['syid'];
    $semid = $_POST['semid'];

    $lvl = $_POST['yrlvl2'];

    $fee->addfee($tf, $misc, $sy, $semid, $lvl);
    header('Location: ./fees.php');
}


if (isset($_POST['subtmidTf_3'])) {

    $tf = $_POST['perUnits3'];
    $misc = $_POST['misc3'];
    $sy = $_POST['syid'];
    $semid = $_POST['semid'];

    $lvl = $_POST['yrlvl3'];

    $fee->addfee($tf, $misc, $sy, $semid, $lvl);
    header('Location: ./fees.php');
}
