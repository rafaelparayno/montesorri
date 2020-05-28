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
    $item1->setName('Ground Coffee 40 oz')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setSku("123123") // Similar to `item_number` in Classic API
        ->setPrice(7.5);
    $item2 = new Item();
    $item2->setName('Granola bars')
        ->setCurrency('USD')
        ->setQuantity(5)
        ->setSku("321321") // Similar to `item_number` in Classic API
        ->setPrice(2);

    $itemList = new ItemList();
    $itemList->setItems(array($item1, $item2));

    $details = new Details();
    $details->setShipping(1.2)
        ->setTax(1.3)
        ->setSubtotal(17.50);

    $amount = new Amount();
    $amount->setCurrency("USD")
        ->setTotal(20)
        ->setDetails($details);

    // $amount = new Amount();
    // $amount->setCurrency("PHP")
    //     ->setTotal(13500);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Payment description")
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
    echo "<a href='{$approvalUrl}'>Go to link</a>";
}
