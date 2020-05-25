<?php
include('header.php');
include('navigation.php');
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
                            <tr>
                                <td>Doris Wilder</td>
                                <td>Sales Assistant</td>
                                <td>Sidney</td>
                                <td>23</td>
                                <td>2010/09/20</td>
                                <td>$85,600</td>
                                <td>Doris Wilder</td>
                                <td>Sales Assistant</td>
                                <td>Sidney</td>
                                <td>23</td>
                                <td>2010/09/20</td>
                                <td>$85,600</td>
                                <td>$85,600</td>
                                <td><a class="btn btn-md btn-primary" href="">Edit</a>
                                    <a class="btn btn-md btn-danger" href="">Delete</a>
                                </td>
                            </tr>

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