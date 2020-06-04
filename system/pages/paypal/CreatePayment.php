<?php

require  'paypal/context.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;



if (isset($_POST['ConfirmButtonFullPay'])) {
    $url = 'http://localhost/mpc/system/pages/paypal/ExecutePayment.php?success=';

    $payer = new Payer();
    $payer->setPaymentMethod("paypal");
    $totalTf = $_POST['totalTf'];
    $misc = $_POST['misc'];
    $totalPay = $_POST['totalPay'];


    $item1 = new Item();
    $item1->setName('Tuition Fee')
        ->setCurrency('PHP')
        ->setQuantity(1)
        ->setPrice($totalTf);

    $item2 = new Item();
    $item2->setName('Misc Fee')
        ->setCurrency('PHP')
        ->setQuantity(1)

        ->setPrice($misc);

    $itemList = new ItemList();
    $itemList->setItems(array($item1, $item2));

    $details = new Details();
    $details->setSubtotal($totalPay);

    $amount = new Amount();
    $amount->setCurrency("PHP")
        ->setTotal($totalPay)
        ->setDetails($details);




    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Fullpayment")
        ->setInvoiceNumber(uniqid());


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
    $link =  "<a class='btn btn-info btn-block' href='{$approvalUrl}'>Go to Paypal</a>";
}



if (isset($_POST['ConfirmButtonDownPay'])) {
    $url = 'http://localhost/mpc/system/pages/paypal/ExecutePayment.php?success=';

    $payer = new Payer();
    $payer->setPaymentMethod("paypal");
    $down = $_POST['downpayment'];
    $totalTf = $_POST['totalTf'];
    $misc = $_POST['misc'];

    $item1 = new Item();
    $item1->setName('Down Payment')
        ->setCurrency('PHP')
        ->setQuantity(1)
        ->setPrice($down);


    $itemList = new ItemList();
    $itemList->setItems(array($item1));

    $details = new Details();
    $details->setSubtotal($down);

    $amount = new Amount();
    $amount->setCurrency("PHP")
        ->setTotal($down)
        ->setDetails($details);




    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Downpayment")
        ->setInvoiceNumber(uniqid());


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
    $link =  "<a class='btn btn-info btn-block' href='{$approvalUrl}'>Go to Paypal</a>";
}



?>

<main style="height: 100vh">

    <div class="container">

        <div style="height:100vh; display:flex;flex-direction:column;align-items:center;justify-content:center;">
            <h2><?php echo isset($_POST['ConfirmButtonDownPay']) ? 'Down Payment' : 'Full Payment' ?></h2>
            <p>Total Tuition Fee: <?= $totalTf ?> </p>
            <p>Misc: <?= $misc ?> </p>
            <?php if (isset($_POST['ConfirmButtonDownPay'])) {
            ?>
                <p>Total Payment: <?= $_POST['totalPayDown'] ?> </p>
                <p>Down Payment/Month: <?= $_POST['downpayment'] ?></p>
            <?php } else {
            ?>
                <p>Total Payment: <?= $totalPay ?> </p>
            <?php } ?>

            <?= $link ?>
        </div>

    </div>
</main>