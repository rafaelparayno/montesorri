<?php
include('header.php');
include('navigation.php');
// $studentsList = $personal->getData();

$schoolYearArgs = $schoolYear->schoolYear();
$semList = $sem->getSemActivate();
$courseList = $course->getData();

// $semList = $sem->getData();

$syids = $schoolYearArgs['sy_id'];


$sectionList = $section->getData($syids, $semList['semid']);


if (isset($_POST['submitEditSect'])) {
    $id = $_POST['sectIdEdit'];
    $name = $_POST['sectnameEdit'];
    $yr =  $_POST['sectyrEdit'];

    $section->editSection($id, $name, $yr);

    echo "<script>window.location='/mpc/system/pages/sections.php';</script>";
}


?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Section</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Section</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Section
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#addModalSections">Add Section</button>

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Section Name</th>
                                <th>Section Year Level</th>
                                <th>Course Name</th>
                                <th>Sem </th>
                                <th>School Year</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Section Name</th>
                                <th>Section Year Level</th>
                                <th>Course Name</th>
                                <th>Sem </th>
                                <th>School Year</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($section) use ($syids) { ?>
                                <tr>
                                    <td><?= $section['section_id'] ?></td>
                                    <td><?= $section['section_name'] ?></td>
                                    <td><?= $section['section_yr'] ?></td>
                                    <td><?= $section['coursesName'] ?></td>
                                    <td><?= $section['semterm'] ?></td>
                                    <td><?= $section['school_year'] ?></td>




                                    <td>

                                        <!-- <a class="btn btn-block btn-info" href="./sectionFunction.php?sectionid=<?= $section['semid'] . '&syid=' . $syids  ?>">Edit</a> -->
                                        <a class="btn btn-block btn-info" data-toggle="modal" data-yr="<?= $section['section_yr'] ?>" data-sectid="<?= $section['section_id'] ?>" data-name="<?= $section['section_name'] ?>" data-target="#editModalSections" href="">Edit</a>

                                    </td>
                                </tr>
                            <?php }, $sectionList) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="addModalSections" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Sections</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="sectFunction.php" method="POST">
                        <div class="form-group">
                            <label for="sectname">Section Name</label>
                            <input id="sectname" type="text" name="sectname" />
                        </div>
                        <div class="form-group">
                            <label for="sectyr">Section Year Level</label>
                            <input id="sectyr" type="number" min="1" max="4" name="sectyr" />
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
                    <button type="Submit" name="submitaddSect" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="editModalSections" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="sectnameEdit">Section Name</label>
                            <input id="sectnameEdit" type="text" name="sectnameEdit" />
                        </div>
                        <div class="form-group">
                            <label for="sectyrEdit">Section Year Level</label>
                            <input id="sectyrEdit" type="number" min="1" max="4" name="sectyrEdit" />
                        </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="sectIdEdit" />
                    <button type="Submit" name="submitEditSect" class="btn btn-primary">Save</button>
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