<?php
include('header.php');
include('navigation.php');
// $studentsList = $personal->getData();

$schoolYearArgs = $schoolYear->schoolYear();


$semids = $sem->getSemActivate();
$syids = $schoolYearArgs['sy_id'];
$smid = $semids['semid'];

$accountsList = $account->getDataActivated($smid, $syids);

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Student Account</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Student Account</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Students Account
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">

                    <!-- <h3 class="mx-auto">Registration Status: <?php echo $semids['isOpenReg'] == 1 ? "Open" : "Close" ?> </h3>

                    <a class="btn text-white btn-md btn-primary mr-2" href="./semFunction.php?semid=<?= $smid . '&syid=' . $syids . '&isOpen=0'   ?>">Open Registration Schedule</a>
                    <a class="btn text-white btn-md btn-danger mr-2" href="./semFunction.php?semid=<?= $smid . '&syid=' . $syids . '&isOpen=1'   ?>">Close Registration</a>
                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#addModalSem">Add School Sem</button> -->

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>account_id</th>
                                <th>SNO</th>
                                <th>Student Name</th>
                                <th>Mode of Payment</th>
                                <th>Remaining Balance</th>
                                <th>Total Payment</th>
                                <th>Total Balance</th>
                                <th>School Year</th>
                                <th>School Term</th>


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>account_id</th>
                                <th>SNO</th>
                                <th>Student Name</th>
                                <th>Mode of Payment</th>
                                <th>Remaining Balance</th>
                                <th>Total Payment</th>
                                <th>Total</th>
                                <th>School Year</th>
                                <th>School Term</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($account) { ?>
                                <tr>
                                    <td><?= $account['account_id'] ?></td>
                                    <td><?= $account['sno'] ?></td>
                                    <td><?= $account['StudentName'] ?></td>
                                    <td><?= $account['mode'] ?></td>
                                    <td><?= $account['RemBalance'] ?></td>
                                    <td><?= $account['totalPayment'] ?></td>
                                    <td><?= $account['Totalbalance'] ?></td>
                                    <td><?= $account['school_year'] ?></td>
                                    <td><?= $account['semterm'] ?></td>




                                </tr>
                            <?php }, $accountsList) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- 
    <div id="addModalSem" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add School Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="semFunction.php" method="POST">
                        <div class="form-group">
                            <label for="semterm">SemTerm</label>
                            <input id="semterm" type="number" min="1" max="3" name="semterm" />
                        </div>
                        <div class="form-group">
                            <label for="schoolyear">School Year</label>
                            <input id="schoolyear" value="<?= $schoolYearArgs['school_year'] ?>" type="text" name="schoolyear" disabled />
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="<?= $schoolYearArgs['sy_id'] ?>" name="syid" />
                    <button type="Submit" name="submitaddSem" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div> -->
</main>



<?php
include('footer.php');
?>