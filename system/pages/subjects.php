<?php
include('header.php');
include('navigation.php');

$schoolYearArgs = $schoolYear->schoolYear();
$semList = $sem->getSemActivate();
$courseList = $course->getData();
//$course = 1;
// $semList = $sem->getData();

$syids = $schoolYearArgs['sy_id'];
$subjectlist = $subject->getData($syids, $semList['semid']);

if (isset($_POST['submitEditSub'])) {
    $id = $_POST['strandId'];
    $name = $_POST['subnameEdit'];
    $code =  $_POST['subcodeEdit'];
    $yr = $_POST['subyrEdit'];
    $units = $_POST['subunitEdit'];

    $subject->editSubjects($id, $name, $code, $yr, $units);

    echo "<script>window.location='/mpc/system/pages/subjects.php';</script>";
}


?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Subjects</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Subjects</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Subjects
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#addModalSubjects">Add Subjects</button>

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Subject Name</th>
                                <th>Subject code</th>
                                <th>Year</th>
                                <th>Course</th>
                                <th>Sem </th>
                                <th>School Year</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Subject Name</th>
                                <th>Subject code</th>
                                <th>Year</th>
                                <th>course</th>
                                <th>Sem </th>
                                <th>School Year</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($subject) use ($syids) { ?>
                                <tr>
                                    <td><?= $subject['subject_id'] ?></td>
                                    <td><?= $subject['subjectname'] ?></td>
                                    <td><?= $subject['subjectcode'] ?></td>
                                    <td><?= $subject['subyr'] ?></td>
                                    <td><?= $subject['coursesName'] ?></td>
                                    <td><?= $subject['semterm'] ?></td>
                                    <td><?= $subject['school_year'] ?></td>




                                    <td>


                                        <a class="btn btn-block btn-info" data-toggle="modal" data-target="#editModalSubjects" data-yr="<?php echo $subject['subyr']; ?>" data-units="<?php echo $subject['subject_units']; ?>" data-course="<?php echo $subject['coursesName']; ?>" data-name="<?php echo $subject['subjectname']; ?>" data-code="<?php echo $subject['subjectcode']; ?>" data-subid="<?php echo $subject['subject_id']; ?>" href="">Edit</a>

                                    </td>
                                </tr>
                            <?php }, $subjectlist) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="addModalSubjects" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="subFunction.php" method="POST">
                        <div class="form-row">
                            <label for="subname">Subject Name</label>
                            <input id="subname" type="text" name="subname" />
                        </div>
                        <div class="form-group">
                            <label for="subcode">Subject Code</label>
                            <input id="subcode" type="text" name="subcode" />
                        </div>
                        <div class="form-group">
                            <label for="subyr">Sub Year Level</label>
                            <input id="subyr" type="number" min="1" max="4" name="subyr" />
                        </div>
                        <div class="form-group">
                            <label for="subunit">Subjects Units</label>
                            <input id="subunit" type="number" min="1" max="5" name="subunit" />
                        </div>
                        <div class="form-group">
                            <label for="Course">Course</label>
                            <select name="Course" class="form-control" id="exampleFormControlSelect1">

                                <?php array_map(function ($course) { ?>
                                    <option value="<?= $course['courses_id'] ?>"><?= $course['coursesName'] . '-' . $course['coursesCode'] ?></option>
                                <?php }, $courseList) ?>
                            </select>
                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>
                        <div class="form-group">
                            <label for="Semester">Semester</label>
                            <input id="Semester" value="<?= $semList['semterm'] ?>" type="text" name="Semester" disabled />
                        </div>
                        <div class="form-group">
                            <label for="schoolyear">School Year</label>
                            <input id="schoolyear" value="<?= $schoolYearArgs['school_year'] ?>" type="text" name="schoolyear" disabled />
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="<?= $semList['semid'] ?>" name="semid" />
                    <input type="hidden" value="<?= $schoolYearArgs['sy_id'] ?>" name="syid" />
                    <button type="Submit" name="submitaddSub" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="editModalSubjects" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-row">
                            <label for="subnameEdit">Subject Name</label>
                            <input id="subnameEdit" type="text" name="subnameEdit" />
                        </div>
                        <div class="form-group">
                            <label for="subcodeEdit">Subject Code</label>
                            <input id="subcodeEdit" type="text" name="subcodeEdit" />
                        </div>
                        <div class="form-group">
                            <label for="subyrEdit">Sub Year Level</label>
                            <input id="subyrEdit" type="number" min="1" max="4" name="subyrEdit" />
                        </div>
                        <div class="form-group">
                            <label for="subunitEdit">Subjects Units</label>
                            <input id="subunitEdit" type="number" min="1" max="5" name="subunitEdit" />
                        </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" value="<?= $semList['semid'] ?>" name="semid" />
                    <input type="hidden" value="<?= $schoolYearArgs['sy_id'] ?>" name="syid" />
                    <input type="hidden" name="strandId" />
                    <button type="Submit" name="submitEditSub" class="btn btn-primary">Save</button>
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