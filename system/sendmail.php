<?php

use PHPMailer\PHPMailer\PHPMailer;

require('./database/DBController.php');
require('./database/PersonalData.php');
require('./database/FamilyData.php');
require('./database/SchoolYear.php');
require('./database/Sem.php');
require('./database/Course.php');
require('./database/Subject.php');
require('./database/Fee.php');

require('./database/User.php');

require './libraries/PHPMailer.php';
require './libraries/SMTP.php';
require './libraries/Exception.php';


$db = new DBController();

$personalData = new PersonalData($db);
$family = new FamilyData($db);

$schoolYear = new SchoolYear($db);
$sem = new Sem($db);
$course = new Course($db);
$subject = new Subject($db);
$fee = new Fee($db);

$user = new User($db);


$mail = new PHPMailer(); // create a new object
// print_r($personalData->getData());






if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['addSubmit'])) {
        $personalData->addToPersonal(
            $_POST['FirstName'],
            $_POST['LastName'],
            $_POST['MiddleName'],
            $_POST['Course'],
            $_POST['Pob'],
            $_POST['Dob'],
            $_POST['Gender'],
            $_POST['Civil'],
            $_POST['Nat'],
            $_POST['Address'],
            $_POST['ContactNo'],
            $_POST['email'],
            $_POST['Rel'],
            $_POST['age'],
            $_POST['sno'],
            0
        );



        $result = $family->addFamily(
            $_POST['Fname'],
            $_POST['fo'],
            $_POST['fcno'],
            $_POST['mname'],
            $_POST['mo'],
            $_POST['mcno'],
            $_POST['gname'],
            $_POST['gno'],
            $_POST['grel'],
            $_POST['Fname'],
            $_POST['sno']
        );


        $schoolYearArgs = $schoolYear->schoolYear();
        $semList = $sem->getSemActivate();

        $syids = $schoolYearArgs['sy_id'];

        $subjectslist = $subject->getDataSearchFresh($syids, $semList['semid'], $_POST['Course']);
        $firstname = $_POST['FirstName'];
        $lastname =  $_POST['LastName'];
        $courseArgs = $course->getDatabySearching('courses_id', $_POST['Course']);
        $courseName = $courseArgs['coursesName'];

        $fees = $fee->getData($syids, $semList['semid']);
        $tfPerUnit = (float) $fees['tfPerUnits'];
        $misc = (float) $fees['misc'];

        $slist = "";
        $slist = array_map(function ($subs) {
            return  $subs['subjectname'];
        }, $subjectslist);

        $totalUnits = array_reduce($subjectslist, function ($accumulator, $item) {
            return  $accumulator + (float) $item['subject_units'];
        });

        $totalTf = $totalUnits *   $tfPerUnit;

        $totalPayment = $totalTf + $misc;

        $subjectimplode = implode(',', array_values($slist));

        $subjectexplode = explode(',', $subjectimplode);
        $printSubj = "";
        foreach ($subjectexplode as $item) {
            $printSubj .= $item . '<br/>';
        }

        $tenPercent = $totalPayment * .10;
        $totalPaymentPercent = $totalPayment + $tenPercent;
        $sno = $_POST['sno'];
        $ead = $_POST['email'];


        $body =
            "<h2 style='text-align:center; padding: 0 200px;'>Hi, $firstname $lastname</h2>" .
            "<p style='text-align:center; padding: 0 200px;'>Thank you for registering in our Montessori Enrollment. To complete your registration with us, 
please click the button below and confirm your e-mail address." .
            "<br><br>"
            . "<div style='text-align:center; padding: 0 200px;border:1px solid black;-webkit-box-shadow: -7px -3px 58px -16px rgba(0,0,0,0.73);
            -moz-box-shadow: -7px -3px 58px -16px rgba(0,0,0,0.73);
            box-shadow: -7px -3px 58px -16px rgba(0,0,0,0.73);border-radius: 10px 10px 10px 10px;'>"
            . "<h4 style='font-size:24px'>  {$courseName}</h4>"
            . "<h4 style='font-size:24px'> -- Subjects -- </h4>"
            . "<p style='font-size:18'>" . $printSubj . "</p>" .
            "<p style='font-size:18'>" . "FULLPAYMENT
                                        TUITION FEE {$totalUnits} X {$tfPerUnit}  = {$totalTf}<br/>
                                        MISC                                 = {$misc}<br/>
                                        TOTAL                                = {$totalPayment}<br/>
                                        EVENTS                                      <br/>
                                        <span style='color:red;'>NO EVENTS    </span><br/>
                                        TOTAL FULL PAYMENTS & EVENTS      = {$totalPayment}<br/>


                                        <br/>
                                        <br/>
                                        <br/>
                                        INSTALLMENT
                                        <br/>
                                        <br/>
                                        TUITION FEE {$totalUnits} X {$tfPerUnit}  = {$totalTf}<br/>
                                        MISC                                 = {$misc}<br/>
                                        TOTAL                                = {$totalPayment}<br/>
                                        10%                                  = {$tenPercent}<br/>
                                        
                                        EVENTS                                      <br/>
                                        <span style='color:red;'>NO EVENTS    </span><br/>
                                        TOTAL FULL PAYMENTS & EVENTS      = {$totalPayment}<br/>
                                        DOWNPAYMENT / MONTHLY      =    {$totalPaymentPercent}

            " . "</p>" .
            "<a style='background-color: #4CAAD8; border: none; color: white; padding: 15px 32px; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' href='localhost/mpc/system/userconfirm.php?id={$sno}&email={$ead}'>Confirm E-mail Address</a></b></br></br>"

            . " </div>"

            . "<hr>"
            . "<br>"
            . "<div style='text-align:center; text-decoration: none;'>"
            . "<a style='text-decoration:none; margin:15px;' href='#'>Facebook</a>"
            . "<a style='text-decoration:none; margin:15px;' href='#'>Twitter</a>"
            . "<a style='text-decoration:none; margin:15px;' href='#'>Instagram</a>"
            . "</div>"
            . "<br>"
            . "<div style='text-align:center'>"
            . "<small style='display: block'><bold>Questions? Contact Us!</bold></small>"
            . "<small style='display: block'><a href='#'>marketing@montessori.com</a></small>";


        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "inventory.noreply23@gmail.com";
        $mail->Password = "frnizinrjutxjfyl";
        $mail->SetFrom("inventory.noreply23@gmail.com");
        $mail->Subject = "Confirm Email and Check Tuition Fee for Downpayment for specific Course";
        $mail->Body = $body;
        $mail->AddAddress($_POST['email']);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
            echo "<script>window.location='/mpc';</script>";
        }
    }
}
