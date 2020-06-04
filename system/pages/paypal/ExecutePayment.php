<?php


require  './context.php';
// require '../functions.php';
require('../../database/DBController.php');
require('../../database/Account.php');
require('../../database/SchoolYear.php');
require('../../database/Sem.php');
require('../../database/PersonalData.php');

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


session_start();

$db = new DBController();
$account = new Account($db);
$personal = new PersonalData($db);

$schoolYear = new SchoolYear($db);
$sem = new Sem($db);


if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $schoolYearArgs = $schoolYear->schoolYear();
    $semList = $sem->getSemActivate();
    $syids = $schoolYearArgs['sy_id'];
    $smid = $semList['semid'];
    $sno =  $_SESSION['id'];

    $paymentId = $_GET['paymentId'];
    $payment = Payment::get($paymentId, $apiContext);
    $obj = json_decode($payment, true);


    $Mode = $obj['transactions'][0]['description'];
    $total = $obj['transactions'][0]['amount']['total'];

    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);
    // echo $total;
    if ($Mode == "Downpayment") {
        $rembal = $total * 3;
        $totalbal = $total * 4;
        $account->addAccounts($syids, $smid, $sno, $Mode, $totalbal, $total, $rembal);
    } else {

        $account->addAccounts($syids, $smid, $sno, $Mode, $total, $total, 0);
    }
    $personal->updateEnrolled($sno, $smid, $syids);

    $transaction = new Transaction();


    $execution->addTransaction($transaction);
    echo '<a href="../dashboard.php">Success Payment</a>';

    try {
        $result = $payment->execute($execution, $apiContext);

        // $payoutItemId = $payoutItem->getPayoutItemId();
        try {
            $payment = Payment::get($paymentId, $apiContext);
        } catch (Exception $ex) {
        }
    } catch (Exception $er) {
    }
} else {
    echo '<h1>Failed Payment</h1>';
}
