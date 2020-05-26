<?php
include('header.php');
include('navigation.php');
// $studentsList = $personal->getData();

$schoolYearArgs = $schoolYear->schoolYear();

$semList = $sem->getData();

$syids = $schoolYearArgs['sy_id'];

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Semester</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Semester</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Semester
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#addModalSem">Add School Sem</button>

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Sem Term</th>
                                <th>School Year</th>
                                <th>Sem Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Sem Term</th>
                                <th>School Year</th>
                                <th>Sem Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($sem) use ($syids) { ?>
                                <tr>
                                    <td><?= $sem['semid'] ?></td>
                                    <td><?= $sem['semterm'] ?></td>
                                    <td><?= $sem['school_year'] ?></td>
                                    <td><?= $sem['sem_status'] ?></td>



                                    <td>

                                        <a class="btn btn-block btn-info" href="./semFunction.php?semid=<?= $sem['semid'] . '&syid=' . $syids  ?>">Activate</a>

                                    </td>
                                </tr>
                            <?php }, $semList) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
    </div>
</main>



<?php
include('footer.php');
?>