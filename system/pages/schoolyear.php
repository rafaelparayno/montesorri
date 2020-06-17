<?php
include('header.php');
include('navigation.php');
// $studentsList = $personal->getData();

$sylist = $schoolYear->getData();

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">School Year</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">School Year</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>School Year
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#addModalSy">Add School Year</button>

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>School Year</th>
                                <th>Sy Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>School Year</th>
                                <th>Sy Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($sy) { ?>
                                <tr>
                                    <td><?= $sy['sy_id'] ?></td>
                                    <td><?= $sy['school_year'] ?></td>
                                    <td><?= $sy['sy_status'] ?></td>



                                    <td>

                                        <a class="btn btn-block btn-info" href="./schoolYearFunction.php?syid=<?= $sy['sy_id'] ?>">Activate</a>

                                    </td>
                                </tr>
                            <?php }, $sylist) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="addModalSy" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add School Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="schoolYearFunction.php" method="POST">
                        <div class="form-group">
                            <label for="from">From</label>
                            <input id="from" type="number" min="0" max="9999" name="from" />
                        </div>
                        <div class="form-group">
                            <label for="to">To</label>
                            <input id="to" type="number" min="0" max="9999" name="to" />
                        </div>
                </div>
                <div class="modal-footer">

                    <button type="Submit" name="submitaddSy" class="btn btn-primary">Save</button>
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