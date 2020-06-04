<?php

$sno =  $_SESSION['id'];


$yearSy = $schoolYear->schoolYear();
$semyr = $sem->getSemActivate();
$isPaid = $account->checkStudPaid($sno, $yearSy['sy_id'], $semyr['semid']);

$personal = $personal->getDatabySearching('sno', $sno);
$studinfo = $studentsinfo->getDataSearch('sno', $sno);
$courseName = $course->getDatabySearching('courses_id', $personal['Course']);

$totalTf = 0;
$totalPayment = 0;
$totalTenPercent = 0;
$totalPaymentWithPercent = 0;
$downPayment = 0;
$totalunits = 0;



if ($studinfo != null) {

    $fees = $fee->getData($yearSy['sy_id'], $semyr['semid'], $studinfo['year_level']);
    $totalTf = $fees['tfPerUnits'] * $studinfo['allowed_units'];
    $totalPayment =  $fees['misc'] + ($fees['tfPerUnits'] * $studinfo['allowed_units']);
    $totalTenPercent =  ($fees['misc'] + ($fees['tfPerUnits'] * $studinfo['allowed_units'])) * .10;

    $totalPaymentWithPercent =  $totalTenPercent + $totalPayment;
    $downPayment =  $totalPaymentWithPercent / 4;
} else {
    $fees = $fee->getData($yearSy['sy_id'], $semyr['semid'], 1);
    $subjectslist = $subject->getDataSearchFresh($yearSy['sy_id'], $semyr['semid'], $personal['Course']);


    $totalunits = array_reduce($subjectslist, function ($accumulator, $item) {
        return  $accumulator + (float) $item['subject_units'];
    });

    $tfPerUnit = (float) $fees['tfPerUnits'];
    $misc = (float) $fees['misc'];
    $totalTf = $totalunits *   $tfPerUnit;
    $totalPayment = $totalTf + $misc;
    $totalTenPercent = $totalPayment * .10;
    $totalPaymentWithPercent = $totalPayment + $totalTenPercent;
    $downPayment = $totalPaymentWithPercent / 4;
}

?>

<main class="">
    <div class="container my-5">
        <div class="row">
            <?php if ($isPaid == 0) { ?>
                <div class="col-12 align-self-center">
                    <div class="card card-block p-3 text-center">
                        <strong class="d-block mb-2 ">Student Name</strong>
                        <?= $personal['firstname'] . ' ' . $personal['lastname'] ?>
                        <hr />
                        <strong class="d-block mb-2 ">Student No</strong>
                        <?= $sno  ?>
                        <hr />
                        <strong class="d-block mb-2 ">Year Level</strong>
                        <?php
                        echo  isset($studinfo['year_level']) ?  $studinfo['year_level'] : 1;
                        ?>
                        <hr />
                        <strong class="d-block mb-2 ">Course </strong>
                        <?= $courseName['coursesName'] ?>
                        <hr />
                        <strong class="d-block mb-2 ">Total Units </strong>
                        <?php
                        echo  isset($studinfo['allowed_units']) ?  $studinfo['allowed_units'] : "Freshmen Not enrolled with the school";
                        ?>
                        <hr />
                        <strong class="d-block mb-2 ">Section </strong>
                        <?php
                        echo  isset($studinfo['sect_enrolled']) ?  $studinfo['sect_enrolled'] : "Freshmen Not enrolled with the school";
                        ?>
                        <hr />
                        <strong class="d-block mb-2 ">Status Student</strong>
                        <?php
                        echo  isset($studinfo['status_student']) ?  ($studinfo['status_student'] == 1 ? 'Regular' : 'Iregular')
                            : "Freshmen Not enrolled with the school";
                        ?>
                        <hr />
                        <strong class="d-block mb-2 ">School Year</strong>
                        <?= $yearSy['school_year'] ?>
                        <hr />
                        <strong class="d-block mb-2 ">Semester</strong>
                        <?= $semyr['semterm'] ?>
                        <hr />
                        <br />
                        <?php if ($semyr['isOpenReg'] == 0) { ?>
                            <h2 class="text-warning">Registration is not yet Open</h2>
                        <?php } else { ?>
                            <?php if (!isset($studinfo['eval_status'])) {

                            ?>
                                <button class="btn btn-block btn-info" data-toggle="modal" data-target="#RegModal">Register</button>
                                <!-- href="./ViewPayment.php?sno=<?= $sno  ?>" -->
                                <?php } else {
                                if ($studinfo['eval_status'] == 1) {
                                ?>
                                    <button class="btn btn-block btn-info" data-toggle="modal" data-target="#RegModal">Register</button>
                                <?php } else { ?>
                                    <p>Cannot Register</p>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>

                    </div>
                </div>
            <?php } else { ?>
                <h1>Student Already Enrolled</h1>
            <?php } ?>

        </div>
    </div>

    <div id="RegModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registration Details and Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="registration" action="./studentpay.php">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payments" id="radioFull" value="fullRadio" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Full Payment
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payments" id="radioDown" value="downRadio">
                            <label class="form-check-label" for="exampleRadios2">
                                Down Payment
                            </label>
                        </div>
                        <div class="text-center">
                            <input type="hidden" value="<?= $fees['tfPerUnits'] ?>" name="tf">
                            <input type="hidden" value="<?= $fees['misc'] ?>" name="misc">
                            <input type="hidden" value=<?= $totalTf  ?> name="totalTf">
                            <input type="hidden" value=<?= $totalPayment ?> name="totalPay">
                            <input type="hidden" value=<?= $totalTenPercent ?> name="totalTenPercent">
                            <input type="hidden" value=<?= $totalPaymentWithPercent ?> name="totalPayDown">
                            <input type="hidden" value=<?= $downPayment ?> name="downpayment">
                            <div id="reg-full">
                                <label class="d-block">Full Payment </label>
                                <label class="d-block">Tf per units * <?= $fees['tfPerUnits'] ?> Total = <?= $totalTf ?> </label>

                                <label>Misc <?= $fees['misc'] ?></label>

                                <label style="font-weight:bold" class="d-block" l>Total Full Payment: <?= $totalPayment ?></label>
                                <button class="btn btn-block btn-primary" name="ConfirmButtonFullPay" type="submit">Confirm Full Payment</button>
                            </div>
                            <hr />
                            <div id="reg-down" style="display: none;">
                                <label class="d-block">Down Payment </label>
                                <label class="d-block">Tf per units * <?= $fees['tfPerUnits'] ?> Total = <?= $totalTf ?> </label>

                                <label>Misc <?= $fees['misc'] ?></label>

                                <label class="d-block" l>Total: <?= $totalPayment ?></label>
                                <label class="d-block" l>10%:&nbsp; <?= $totalTenPercent ?></label>
                                <label style="font-weight:bold" class="d-block" l>Total Installment Payment:&nbsp; <?= $totalPaymentWithPercent ?></label>
                                <label class="d-block" l>Down payment/Monthly:&nbsp; <?= $downPayment ?></label>
                                <button class="btn btn-block btn-info" name="ConfirmButtonDownPay" type="submit">Confirm Downpayment</button>
                            </div>


                        </div>







                    </form>
                </div>
            </div>
        </div>
    </div>


</main>