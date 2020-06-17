<?php
include('header.php');
include('navigation.php');
// $studentsList = $personal->getData();

$courseList = $course->getData();


if (isset($_POST['submitEditCourse'])) {
    $id = $_POST['courseidModal'];
    $name = $_POST['courseNameEdit'];
    $code =  $_POST['coursecodeEdit'];

    $course->editCourse($id, $name, $code);

    echo "<script>window.location='/mpc/system/pages/course.php';</script>";
}


?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Course</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Course</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Course
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#addModalCourse">Add Course</button>

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Course Name</th>
                                <th>Course Code</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Course Name</th>
                                <th>Course Code</th>

                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($course) { ?>
                                <tr>
                                    <td><?= $course['courses_id'] ?></td>
                                    <td><?= $course['coursesName'] ?></td>
                                    <td><?= $course['coursesCode'] ?></td>





                                    <td>

                                        <a class="btn btn-block btn-info" data-toggle="modal" data-target="#editModalCourse" data-name="<?php echo $course['coursesName']; ?>" data-code="<?php echo $course['coursesCode']; ?>" data-courseid="<?php echo $course['courses_id']; ?>" href="">edit</a>

                                    </td>
                                </tr>
                            <?php }, $courseList) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="addModalCourse" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Courses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="courseFunction.php" method="POST">
                        <div class="form-group">
                            <label for="courseName">Course Name</label>
                            <input id="courseName" type="text" name="courseName" />
                        </div>
                        <div class="form-group">
                            <label for="coursecode">Course Code</label>
                            <input id="coursecode" type="text" name="coursecode" />
                        </div>
                </div>
                <div class="modal-footer">

                    <button type="Submit" name="submitaddCourse" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="editModalCourse" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Courses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="courseName">Course Name</label>
                            <input id="courseNameEdit" type="text" name="courseNameEdit" />
                        </div>
                        <div class="form-group">
                            <label for="coursecode">Course Code</label>
                            <input id="coursecodeEdit" type="text" name="coursecodeEdit" />
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="courseidModal" value="">
                    <button type="Submit" name="submitEditCourse" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


</main>



<?php
include('footer.php');
?>