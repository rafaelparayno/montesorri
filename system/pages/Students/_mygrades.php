<?php

$sno =  $_SESSION['id'];

$personal = $personal->getDatabySearching('sno', $sno);
$studinfo = $studentsinfo->getDataSearch('sno', $sno);

$myGrades = $studentGrade->getData2($sno);


function getStatus($finalGrade)
{
    $results = "";

    if ($finalGrade > 3) {
        $results = 'Failed';
    } else {
        $results = 'Passed';
    }

    return $results;
}

function computeGradeAvg($prelim, $midterm, $final)
{
    $avgGrade = ($prelim + $midterm + $final) / 3;
    $finalGrade = 0;

    if ($avgGrade < 75) {
        $finalGrade = 5.0;
    } else if ($avgGrade < 80) {
        $finalGrade = 3.0;
    } else if ($avgGrade < 84) {
        $finalGrade = 2.5;
    } else if ($avgGrade < 88) {
        $finalGrade = 2.25;
    } else if ($avgGrade < 92) {
        $finalGrade = 2.0;
    } else if ($avgGrade < 96) {
        $finalGrade = 1.5;
    } else if ($avgGrade < 100) {
        $finalGrade = 1.25;
    }
    return $finalGrade;
}
?>
<main class="">
    <div class="container my-5">
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>My Grades
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">


                        </div>
                        <div class="table-responsive">

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Student No</th>
                                        <th>Student Name</th>
                                        <th>Subject Name</th>

                                        <th>Units</th>
                                        <th>Prelim</th>
                                        <th>Midterm</th>
                                        <th>Finals</th>
                                        <th>Final Grade</th>
                                        <th>Grade Status</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Student No</th>
                                        <th>Student Name</th>
                                        <th>Subject Name</th>

                                        <th>Units</th>
                                        <th>Prelim</th>
                                        <th>Midterm</th>
                                        <th>Finals</th>
                                        <th>Final Grade</th>
                                        <th>Grade Status</th>

                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php array_map(function ($grades) { ?>
                                        <tr>
                                            <?php
                                            $results = "No Grade";
                                            $finalGrade = 0;
                                            if ($grades['prelim'] != null) {
                                                $finalGrade = computeGradeAvg($grades['prelim'], $grades['midterm'], $grades['finals']);
                                                $results = getStatus($finalGrade);
                                            }

                                            ?>
                                            <td><?= $grades['sno'] ?></td>
                                            <td><?= $grades['StudentName'] ?></td>
                                            <td><?= $grades['subjectname'] ?></td>
                                            <td><?= $grades['section_name'] ?></td>
                                            <td><?= $grades['prelim'] ?></td>
                                            <td><?= $grades['midterm'] ?></td>
                                            <td><?= $grades['finals'] ?></td>
                                            <td><?= $finalGrade ?></td>
                                            <td><?= $results ?></td>

                                        </tr>
                                    <?php }, $myGrades) ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>