<?php

$courseList = $course->getData();
?>
<main>

    <div class="container-fluid ">
        <div class="form-group mt-5">
            <label for="Course">Course</label>
            <select name="Course" class="form-control " id="courseselect">

                <?php array_map(function ($course) { ?>
                    <option value="<?= $course['courses_id'] ?>"><?= $course['coursesName'] . '-' . $course['coursesCode'] ?></option>
                <?php }, $courseList) ?>
            </select>
        </div>
        <div>
            <h3>1st Years</h3>
            <ul id="ul1styears">

            </ul>

            <h3>2nd Years</h3>
            <ul id="ul2ndyears">

            </ul>

            <h3>3rd Years</h3>
            <ul id="ul3rdyears">

            </ul>

            <h3>4th Years</h3>
            <ul id="ul4thyears">

            </ul>
        </div>

    </div>
</main>