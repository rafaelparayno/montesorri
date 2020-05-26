<?php

use PHPMailer\PHPMailer\PHPMailer;


require('./database/DBController.php');
require('./database/PersonalData.php');
require('./database/FamilyData.php');
require('./database/User.php');
require('./database/Course.php');

require './libraries/PHPMailer.php';
require './libraries/SMTP.php';
require './libraries/Exception.php';


$db = new DBController();

$personalData = new PersonalData($db);
$family = new FamilyData($db);

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
        $firstname = $_POST['FirstName'];
        $lastname =  $_POST['LastName'];

        $body =
            "<h2 style='text-align:center; padding: 0 200px;'>Hi, $firstname $lastname</h2>" .
            "<p style='text-align:center; padding: 0 200px;'>Thank you for registering in our Montessori Enrollment. To complete your registration with us, 
please click the button below and confirm your e-mail address." .
            "<br><br>"
            . "<a style='background-color: #4CAAD8; border: none; color: white; padding: 15px 32px; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;' href='localhost/mpc'>Confirm E-mail Address</a></b></br></br>"
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
        $mail->Password = "okucdsrykkvbcksk";
        $mail->SetFrom("inventory.noreply23@gmail.com");
        $mail->Subject = "Confirm Email and Check Tuition Fee for Downpayment for specific Course";
        $mail->Body = $body;
        $mail->AddAddress($_POST['email']);

        header('location : ./homepage.php');
    }
}
