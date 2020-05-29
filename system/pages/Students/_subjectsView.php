<?php

$yearSy = $schoolYear->schoolYear();
$semyr = $sem->getSemActivate();
$subject = $subject->returnUnitsForCourse($_GET['cid'], $_GET['lvl'], $semyr['semid'], $yearSy['sy_id']);
?>
<main>

    <div class="container-fluid ">
        <div class="form-group mt-5">
            <h2>Subjects for <?= $_GET['lvl'] ?> Year</h2>
            <?php array_map(function ($subject) { ?>
                <p class="text-center d-4 "><?= $subject['subjectname'] ?></p>
            <?php }, $subject) ?>
        </div>
    </div>
</main>