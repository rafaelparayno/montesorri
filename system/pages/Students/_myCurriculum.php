<?php

$sno =  $_SESSION['id'];

$personal = $personal->getDatabySearching('sno', $sno);
$studinfo = $studentsinfo->getDataSearch('sno', $sno);

$myGrades = $studentGrade->getData2($sno);


$curriculum = $subject->getCurriculumStudent($sno);

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

function firstYearFilt($value)
{
    if ($value['subyr'] == 1) {
        return $value;
    }
}

function SecondYearFilt($value)
{
    if ($value['subyr'] == 2) {
        return $value;
    }
}

function thirdYearFilt($value)
{
    if ($value['subyr'] == 3) {
        return $value;
    }
}



$firstYearSubjects = array_filter($curriculum, 'firstYearFilt');
$secondYearSubjects = array_filter($curriculum, 'SecondYearFilt');
$thirdYearSubjects = array_filter($curriculum, 'thirdYearFilt');

?>
<main class="">
    <div class="container my-5">
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>My Course Curriculum
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">


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
                                        <th>Done</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Units</th>


                                        <th>Semester</th>
                                        <th>Done</th>
                                    </tr>
                                </tfoot>
                                <tbody id="table1Cur">
                                    <?php array_map(function ($cur1) { ?>
                                        <tr>
                                            <td><?= $cur1['subjectcode'] ?></td>
                                            <td><?= $cur1['subjectname'] ?></td>
                                            <td><?= $cur1['subject_units'] ?></td>
                                            <td><?= $cur1['schoolterm'] ?></td>
                                            <td><?php
                                                if ($cur1['prelim'] != null) {
                                                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                                }
                                                ?></td>

                                        </tr>
                                    <?php }, $firstYearSubjects) ?>

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
                                        <th>Done</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Units</th>


                                        <th>Semester</th>
                                        <th>Done</th>
                                    </tr>
                                </tfoot>
                                <tbody id="table2Cur">
                                    <?php array_map(function ($cur1) { ?>
                                        <tr>
                                            <td><?= $cur1['subjectcode'] ?></td>
                                            <td><?= $cur1['subjectname'] ?></td>
                                            <td><?= $cur1['subject_units'] ?></td>
                                            <td><?= $cur1['schoolterm'] ?></td>
                                            <td><?php
                                                if ($cur1['prelim'] != null) {
                                                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                                }
                                                ?></td>
                                        </tr>
                                    <?php }, $secondYearSubjects) ?>


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
                                        <th>Done</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>


                                        <th>Units</th>
                                        <th>Semester</th>
                                        <th>Done</th>
                                    </tr>
                                </tfoot>
                                <tbody id="table3Cur">
                                    <?php array_map(function ($cur1) { ?>
                                        <tr>
                                            <td><?= $cur1['subjectcode'] ?></td>
                                            <td><?= $cur1['subjectname'] ?></td>
                                            <td><?= $cur1['subject_units'] ?></td>
                                            <td><?= $cur1['schoolterm'] ?></td>
                                            <td><?php
                                                if ($cur1['prelim'] != null) {
                                                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                                }
                                                ?></td>
                                        </tr>
                                    <?php }, $thirdYearSubjects) ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>