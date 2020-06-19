<?php

$sno =  $_SESSION['id'];

$personal = $personal->getDatabySearching('sno', $sno);
$studinfo = $studentsinfo->getDataSearch('sno', $sno);

if ($studinfo != null) {
    $subjectslist = $subject->getDataNotFresh($sno);
} else {
    $subjectslist = $subject->getDataFresh($sno);
}


?>
<main class="">
    <div class="container my-5">
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>My Subject
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">


                        </div>
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Units</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Units</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php array_map(function ($sub) { ?>
                                        <tr>
                                            <td><?= $sub['subjectcode'] ?></td>
                                            <td><?= $sub['subjectname'] ?></td>
                                            <td><?= $sub['subject_units'] ?></td>

                                        </tr>
                                    <?php }, $subjectslist) ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>