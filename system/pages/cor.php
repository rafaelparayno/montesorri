<?php
session_start();
require '../../vendor/autoload.php';


require('../database/DBController.php');
require('../database/Fee.php');
require('../database/PersonalData.php');
require('../database/Studentsinfo.php');
require('../database/Subject.php');
require('../database/SchoolYear.php');
require('../database/Sem.php');
require('../database/Account.php');

use Dompdf\Dompdf;


$sno =  $_SESSION['id'];

$db = new DBController();
$personal = new PersonalData($db);
$fee = new Fee($db);
$studentsinfo = new Studentsinfo($db);
$subject = new Subject($db);
$schoolYear = new SchoolYear($db);
$sem = new Sem($db);
$account = new Account($db);
// 
$studentinfo = $personal->getDatabySearching('sno', $sno);
$schoolYearArgs = $schoolYear->schoolYear();
$semList = $sem->getSemActivate();

$syids = $schoolYearArgs['sy_id'];
$studinfo = $studentsinfo->getDataSearch('sno', $sno);
$accountStud = $account->getStudAccountSin($sno, $syids);
$data = '';
$fees = $fee->getData($syids, $semList['semid'], 1);
$tfPerUnit = 0;
$misc = 0;

$totalTf = 0;
$totalPayment = 0;
$totalTenPercent = 0;
$totalPaymentWithPercent = 0;
$downPayment = 0;
$totalunits = 0;
$yearlevel = 0;
$subjectslist;
if ($studinfo != null) {
    $fees = $fee->getData($syids, $semList['semid'], $studinfo['year_level']);
    $tfPerUnit = (float) $fees['tfPerUnits'];
    $misc = (float) $fees['misc'];
    $subjectslist = $subject->getDataNotFresh($sno);
    $yearlevel =  $studinfo['year_level'];
} else {
    $fees = $fee->getData($syids, $semList['semid'], 1);
    $tfPerUnit = (float) $fees['tfPerUnits'];
    $misc = (float) $fees['misc'];
    $subjectslist = $subject->getDataFresh($sno);

    $yearlevel = 1;
}




$string = "";
foreach ($subjectslist as $value) {
    $string .= '<tr>
                     <td>' . $value['subjectcode'] . ' </td>
                     <td>' . $value['subjectname'] . '</td>
                     <td> ' . $value['subject_units'] . '</td>
                        <td>  PHP ' . $tfPerUnit * $value['subject_units'] . '</td>
                 </tr>';
}

$totalUnits = array_reduce($subjectslist, function ($accumulator, $item) {
    return  $accumulator + (float) $item['subject_units'];
});

$totalTf = $totalUnits *   $tfPerUnit;

$grandtotal = $totalTf + $misc;


$downpayment = $grandtotal / 4;
// $row = array_map(function ($sub) {
//     $datas = "";
//     return  $datas .= '<tr>
//                 <td>' . $sub['subjectcode'] . ' </td>
//                 <td>' . $sub['subjectname'] . '</td>
//                 <td> ' . $sub['subject_units'] . '</td>

//             </tr>';
// }, $subjectslist);

// // instantiate and use the dompdf class
// $page = file_get_contents("Corr.php");

$dompdf = new Dompdf();

$output = '<html>
<head>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<link href="./../css/framework.css" rel="stylesheet" />
</head>
<body>
<div class="container-fluid">
        <header class="mb-2">
            <div class="mb-2">
                <img src="../assets/img/logo2.png" alt="" style="height:50px">
                MONTESORRI PROFESSIONAl COLLEGE
            </div>

            <h2 class="text-center">Certificate of Registration</h2>
            <div class="info">
            <p>
            Name : ' . $studentinfo['firstname'] . ' '  . ' ' . $studentinfo['lastname'] . '<br />
            Student No: ' . $sno . ' <br />
            Address: ' . $studentinfo['Address'] . '<br/>
            Mode Of Payment: ' . $accountStud['mode'] .   '
             </p>
               
            </div>
        </header>
        <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Units</th>
                <th scope="col">Tuition Fee</th>
            </tr>
        </thead>
        <tbody>';
$output .= $string;
$output .= '<tr>
<th>
Total Unit :
</th>
<th>
' .

    $totalUnits
    . '
</th>
<th>
 Total Tuition :
<th>' .
    $totalTf
    . '
</th>
</tr>';


$output .= '<tr>

<th>
&nbsp;
</th>
<th>
&nbsp;
</th>
<th>
Misc : 
</th>
<th>

' .

    $misc
    . '
</th>

</tr>';



$output .= '<tr>

<th>
&nbsp;
</th>
<th>
&nbsp;
</th>
<th>
Grand Total : 
</th>
<th>

' .

    $grandtotal
    . '
</th>

</tr>';

if ($accountStud['mode'] == 'Fullpayment') {
    $output .= '<tr>

    <th>
    &nbsp;
    </th>
    <th>
    &nbsp;
    </th>
    <th>
    Downpayment :
    </th>
    <th>
    ' . $grandtotal . '
    </th>
    </tr>';

    $output .= '<tr>

    <th>
    Monthly Installment
    </th>
    <th>
    0
    </th>
    <th>
    Balance :
    </th>
    <th>
    ' . 0 . '
    </th>
    </tr>';
} else {
    $output .= '<tr>

    <th>
    &nbsp;
    </th>
    <th>
    &nbsp;
    </th>
    <th>
    Downpayment :
    </th>
    <th>
    ' . $downpayment . '
    </th>
    </tr>';


    $output .= '<tr>

    <th>
    Monthly Installment
    </th>
    <th>
    ' . $downpayment . '
    </th>
    <th>
    Balance :
    </th>
    <th>
    ' . ($downpayment * 3) . '
    </th>
    </tr>';
}

$output .= '</tbody>
    </table>
</div>    
</body> ';

$dompdf->loadHtml($output);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Cor", array("Attachment" => 0));
