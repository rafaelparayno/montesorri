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
                            <span class="mr-2">Search Course Code</span>
                            <input type="text" class="form-control" id="searchCourseCur">
                        </div>
                        <button type="button" id="searchBtnCurriculim" class="btn btn-primary mb-2">Search</button>
                    </form>


                </div>
                <div class="table-responsive">
                    <h4>First Year</h4>
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Units</th>


                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Units</th>


                                <th>Semester</th>
                            </tr>
                        </tfoot>
                        <tbody id="table1Cur">


                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <h4>Second Year</h4>
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Units</th>


                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Units</th>


                                <th>Semester</th>
                            </tr>
                        </tfoot>
                        <tbody id="table2Cur">


                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <h4>Third Year</h4>
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Units</th>


                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>


                                <th>Units</th>
                                <th>Semester</th>
                            </tr>
                        </tfoot>
                        <tbody id="table3Cur">


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