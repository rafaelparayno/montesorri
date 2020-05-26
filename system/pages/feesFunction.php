<?php
require('../database/DBController.php');

require('../database/Fee.php');


$db = new DBController();

$fee = new Fee($db);

if (isset($_POST['subtmidTf'])) {

    $tf = $_POST['perUnits'];
    $misc = $_POST['misc'];
    $sy = $_POST['syid'];
    $semid = $_POST['semid'];

    $fee->addfee($tf, $misc, $sy, $semid);
    header('Location: ./fees.php');
}
