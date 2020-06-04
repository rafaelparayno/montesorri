<?php
include('header.php');
include('navigation.php');


$schoolYearArgs = $schoolYear->schoolYear();
$semList = $sem->getSemActivate();
$studentsList = $personal->getDataWithSemSyid($semList['semid'], $schoolYearArgs['sy_id']);


?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Students Enrolled in <?= $semList['semterm'] ?> Term SY <?= $schoolYearArgs['school_year'] ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Students</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Students Table
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="./addstudents.php" class="btn btn-md btn-success">Add Student</a>

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Student No</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Place of Birth</th>
                                <th>Birthdate</th>
                                <th>Gender</th>
                                <th>Civil Status</th>
                                <th>Nationality</th>
                                <th>Address</th>
                                <th>Contact No</th>
                                <th>Email Add</th>
                                <th>Religion</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Student No</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Place of Birth</th>
                                <th>Birthdate</th>
                                <th>Gender</th>
                                <th>Civil Status</th>
                                <th>Nationality</th>
                                <th>Address</th>
                                <th>Contact No</th>
                                <th>Email Add</th>
                                <th>Religion</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($student) use ($account) { ?>
                                <tr>
                                    <td><?= $student['sno'] ?></td>
                                    <td><?= $student['firstname'] . ' ' . $student['lastname'] ?></td>
                                    <td><?= $student['Course'] ?></td>
                                    <td><?= $student['pob'] ?></td>
                                    <td><?= $student['dob'] ?></td>
                                    <td><?= $student['gender'] ?></td>
                                    <td><?= $student['civil'] ?></td>
                                    <td><?= $student['nationality'] ?></td>
                                    <td><?= $student['Address'] ?></td>
                                    <td><?= $student['CpNo'] ?></td>
                                    <td><?= $student['EmailAdd'] ?></td>
                                    <td><?= $student['Religion'] ?></td>
                                    <td><?= $student['age'] ?></td>



                                    <td><a class="btn btn-block btn-primary" href="./editStudent.php?sid=<?= $student['sno'] ?>">Edit</a>

                                        <a class="btn btn-block btn-danger" href="./deleteStudent.php?sno=<?= $student['sno'] ?>">Delete</a>
                                        <?php
                                        $isEnrolled = $account->checkStudPaid($student['sno'], $student['syid'], $student['semid']);

                                        if ($isEnrolled == 0) {
                                        ?>
                                            <a class="btn btn-block btn-info" href="./evaluation.php?sno=<?= $student['sno'] ?>">Evaluate</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php }, $studentsList) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete selected ?</p>
                </div>
                <div class="modal-footer">

                    <button type="Submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div> -->
</main>



<?php
include('footer.php');
?>