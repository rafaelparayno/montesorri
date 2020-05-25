<?php
include('header.php');
include('navigation.php');
$studentsList = $personal->getData();


?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Students Enrolled</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Students Enrolled</li>
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

                            <?php array_map(function ($student) { ?>
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



                                    <td><a class="btn btn-md btn-primary" href="">Edit</a>
                                        <a class="btn btn-md btn-danger" href="">Delete</a>
                                    </td>
                                </tr>
                            <?php }, $studentsList) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include('footer.php');
?>