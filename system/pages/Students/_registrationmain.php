<?php

$sno =  $_SESSION['id'];


$yearSy = $schoolYear->schoolYear();
$semyr = $sem->getSemActivate();
$personal = $personal->getDatabySearching('sno', $sno);
$studinfo = $studentsinfo->getDataSearch('sno', $sno);

$courseName = $course->getDatabySearching('courses_id', $personal['Course']);

?>

<main class="">
    <div class="container my-5">
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="card card-block p-3 text-center">
                    <strong class="d-block mb-2 ">Student Name</strong>
                    <?= $personal['firstname'] . ' ' . $personal['lastname'] ?>
                    <hr />
                    <strong class="d-block mb-2 ">Student No</strong>
                    <?= $sno  ?>
                    <hr />
                    <strong class="d-block mb-2 ">Year Level</strong>
                    <?php
                    echo  isset($studinfo['year_level']) ?  $studinfo['year_level'] : 1;
                    ?>
                    <hr />
                    <strong class="d-block mb-2 ">Course </strong>
                    <?= $courseName['coursesName'] ?>
                    <hr />
                    <strong class="d-block mb-2 ">Section </strong>
                    <?php
                    echo  isset($studinfo['sect_enrolled']) ?  $studinfo['sect_enrolled'] : "Freshmen Not enrolled with the school";
                    ?>
                    <hr />
                    <strong class="d-block mb-2 ">Status</strong>
                    <?php
                    echo  isset($studinfo['eval_status']) ?  $studinfo['eval_status'] : "Freshmen Not enrolled with the school";
                    ?>
                    <hr />
                    <strong class="d-block mb-2 ">School Year</strong>
                    <?= $yearSy['school_year'] ?>
                    <hr />
                    <strong class="d-block mb-2 ">Semester</strong>
                    <?= $semyr['semterm'] ?>
                    <hr />
                    <br />
                    <?php if ($semyr['isOpenReg'] == 0) { ?>
                        <h2 class="text-warning">Registration is not yet Open</h2>
                    <?php } else { ?>
                        <a class="btn btn-block btn-info" href="#">Register</a>
                    <?php }

                    ?>
                </div>
            </div>

        </div>
    </div>

</main>