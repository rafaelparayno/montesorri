<?php

use PHPMailer\PHPMailer\PHPMailer;

require('./database/DBController.php');
require('./database/ShsPersonal.php');
require('./database/FamilyData.php');
require('./database/SchoolYear.php');
require('./database/Sem.php');
require('./database/Strand.php');

require('./database/User.php');

require './libraries/PHPMailer.php';
require './libraries/SMTP.php';
require './libraries/Exception.php';


$db = new DBController();

$personalData = new ShsPersonal($db);
$family = new FamilyData($db);

$schoolYear = new SchoolYear($db);
$sem = new Sem($db);

$user = new User($db);


$mail = new PHPMailer(); // create a new object
// print_r($personalData->getData());

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['addSubmitShs'])) {

        $res =  $personalData->addToPersonal(
            $_POST['FirstName'],
            $_POST['LastName'],
            $_POST['MiddleName'],
            $_POST['strand'],
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
            0,
            0,
            0
        );


        // $result = $family->addFamily(
        //     $_POST['Fname'],
        //     $_POST['fo'],
        //     $_POST['fcno'],
        //     $_POST['mname'],
        //     $_POST['mo'],
        //     $_POST['mcno'],
        //     $_POST['gname'],
        //     $_POST['gno'],
        //     $_POST['grel'],
        //     $_POST['Fname'],
        //     $_POST['sno']
        // );


        //         $schoolYearArgs = $schoolYear->schoolYear();
        //         $semList = $sem->getSemActivate();

        //         $syids = $schoolYearArgs['sy_id'];

        $firstname = $_POST['FirstName'];
        $lastname =  $_POST['LastName'];

        $sno = $_POST['sno'];
        $ead = $_POST['email'];


        $body =
            "<h2 style='text-align:center; padding: 0 200px;'>Hi, $firstname $lastname</h2>" .
            "<p style='text-align:center; padding: 0 200px;'>Thank you for registering in our Montessori Enrollment. To complete your registration with us, 
        please click the button below and confirm your e-mail address." .
            "<br><br>"
            . "<div style='text-align:center; padding: 0 200px;border:1px solid black;-webkit-box-shadow: -7px -3px 58px -16px rgba(0,0,0,0.73);
                    -moz-box-shadow: -7px -3px 58px -16px rgba(0,0,0,0.73);
                    box-shadow: -7px -3px 58px -16px rgba(0,0,0,0.73);border-radius: 10px 10px 10px 10px;'>" .
            // . "<h4 style='font-size:24px'>  {$courseName}</h4>" .
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
        $mail->Password = "pifxwhutjjypgsbg";
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
