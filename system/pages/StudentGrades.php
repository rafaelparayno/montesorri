<?php
include('header.php');
include('navigation.php');

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Student Grades</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Student Grades</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Student Grades
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-start mb-3">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <span class="mr-2">Search Student Number</span>
                            <input type="text" class="form-control" id="searchStudentNo">
                        </div>
                        <button type="button" id="searchBtnGrade" class="btn btn-primary mb-2">Search</button>
                    </form>


                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Student No</th>
                                <th>Student Name</th>
                                <th>Subject Name</th>
                                <th>Section Name</th>
                                <th>Units</th>
                                <th>Prelim</th>
                                <th>Midterm</th>
                                <th>Finals</th>
                                <th>Final Grade</th>
                                <th>Grade Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Student No</th>
                                <th>Student Name</th>
                                <th>Subject Name</th>
                                <th>Section Name</th>
                                <th>Units</th>
                                <th>Prelim</th>
                                <th>Midterm</th>
                                <th>Finals</th>
                                <th>Final Grade</th>
                                <th>Grade Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody id="tableGrades">


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