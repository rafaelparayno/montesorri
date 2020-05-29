<?php


require  './context.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


if (isset($_GET['success']) && $_GET['success'] == 'true') {


    // $paymentId = $_GET['paymentId'];
    // $payment = Payment::get($paymentId, $apiContext);

    // $execution = new PaymentExecution();
    // $execution->setPayerId($_GET['PayerID']);

    // try {
    //     $result = $payment->execute($execution, $apiContext);
    //     try {
    //         $payment = Payment::get($paymentId, $apiContext);
    //     } catch (Exception $ex) {
    //         //exit(1);
    //     }
    // } catch (Exception $ex) {
    //     // exit(1);
    // }

    // return $payment;

    //fixing

    $paymentId = $_GET['paymentId'];
    $payment = Payment::get($paymentId, $apiContext);

    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);

    $transaction = new Transaction();
    $amount = new Amount();
    $details = new Details();

    $details->setShipping(0)
        ->setTax(0)
        ->setSubtotal(13000);

    $amount->setCurrency('PHP');
    $amount->setTotal(13000);
    $amount->setDetails($details);
    $transaction->setAmount($amount);

    $execution->addTransaction($transaction);

    try {
        $result = $payment->execute($execution, $apiContext);


        try {
            $payment = Payment::get($paymentId, $apiContext);
        } catch (Exception $ex) {


            //   exit(1);
        }
    } catch (Exception $er) {
    }
} else {
    //   exit;
}
