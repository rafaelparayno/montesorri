<?php

require  './context.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;



if (isset($_POST['ConfirmButtonPay'])) {
    $url = 'http://localhost/mpc/system/pages/paypal/ExecutePayment.php?success=';

    $payer = new Payer();
    $payer->setPaymentMethod("paypal");

    // $item1 = new Item();
    // $item1->setName('Tuition Fee * 19 units = 9500')
    //     ->setCurrency('PHP')
    //     ->setPrice(9500);


    // $item2 = new Item();
    // $item2->setName('Misc Fee  = 4000')
    //     ->setCurrency('PHP')
    //     ->setPrice(4000);

    // $itemList = new ItemList();
    // $itemList->setItems(array($item1, $item2));
    $item1 = new Item();
    $item1->setName('Tution Fee')
        ->setCurrency('PHP')
        ->setQuantity(1)
        ->setSku("123123") // Similar to `item_number` in Classic API
        ->setPrice(9000);
    $item2 = new Item();
    $item2->setName('Misc Fee')
        ->setCurrency('PHP')
        ->setQuantity(1)
        ->setSku("321321") // Similar to `item_number` in Classic API
        ->setPrice(4000);

    $itemList = new ItemList();
    $itemList->setItems(array($item1, $item2));

    $details = new Details();
    $details->setShipping(0)
        ->setTax(0)
        ->setSubtotal(13000);

    $amount = new Amount();
    $amount->setCurrency("PHP")
        ->setTotal(13000)
        ->setDetails($details);

    // $amount = new Amount();
    // $amount->setCurrency("PHP")
    //     ->setTotal(13500);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Tuition fee for Montesorri")
        ->setInvoiceNumber(uniqid());

    // $transaction = new Transaction();
    // $transaction->setAmount($amount)
    //     ->setItemList($itemList)
    //     ->setDescription("Payment description")
    //     ->setInvoiceNumber(uniqid());


    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl($url . 'true')
        ->setCancelUrl($url . 'false');


    $payment = new Payment();
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

    // echo 'wew';
    $request = clone $payment;

    $payment->create($apiContext);


    $approvalUrl = $payment->getApprovalLink();
    //return $payment;
    echo "<div class='text-center border p-5 bg-dark'><a href='{$approvalUrl}'>Go to link</a></div>";
}
