<?php

$sno =  $_SESSION['id'];


$yearSy = $schoolYear->schoolYear();
$semyr = $sem->getSemActivate();
$accountList = $account->getStudAccount($sno);

?>

<main class="">
    <div class="container my-5">
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>My Accounts
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">


                        </div>
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Mode Of Payment</th>
                                        <th>Total Balance</th>
                                        <th>Payment</th>
                                        <th>Remaining Balance</th>
                                        <th>Sem </th>
                                        <th>School Year</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Mode Of Payment</th>
                                        <th>Total Balance</th>
                                        <th>Payment</th>
                                        <th>Remaining Balance</th>
                                        <th>Sem </th>
                                        <th>School Year</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php array_map(function ($acc) { ?>
                                        <tr>
                                            <td><?= $acc['account_id'] ?></td>
                                            <td><?= $acc['mode'] ?></td>
                                            <td><?= $acc['Totalbalance'] ?></td>
                                            <td><?= $acc['totalPayment'] ?></td>
                                            <td><?= $acc['RemBalance'] ?></td>
                                            <td><?= $acc['semterm'] ?></td>
                                            <td><?= $acc['school_year'] ?></td>





                                        </tr>
                                    <?php }, $accountList) ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>