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

                </div>
            </div>

        </div>
    </div>

</main>