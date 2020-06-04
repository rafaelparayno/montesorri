<?php
require('../database/DBController.php');

require('../database/Strand.php');


$db = new DBController();

$strand = new Strand($db);

if (isset($_POST['submitaddStrand'])) {

    $sname = $_POST['strandName'];
    $code = $_POST['strandcode'];
    $strand->addStrand($sname, $code);

    header('Location: ./strands.php');
}

// if (isset($_GET['syid'])) {
//     $syid = $_GET['syid'];
//     $schoolyear->activateSy($syid);
//     header('Location: ./schoolyear.php');
// }
