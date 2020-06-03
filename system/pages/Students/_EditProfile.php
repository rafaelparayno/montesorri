<?php

$sno =  $_SESSION['id'];

$studentinfo = $personal->getDatabySearching('sno', $sno);
$courseList = $course->getData();

$faminfo = $family->getDatabySearching('sno', $sno);
//print_r($studentinfo);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['editStudentProfile'])) {
        $result =  $personal->updatePersonalData(
            $_POST['FirstName'],
            $_POST['LastName'],
            $_POST['MiddleName'],
            $_POST['courseid'],
            $_POST['Pob'],
            $_POST['Dob'],
            $_POST['Gender'],
            $_POST['Civil'],
            $_POST['Nat'],
            $_POST['Address'],
            $_POST['ContactNo'],
            $_POST['email'],
            $_POST['Rel'],
            $_POST['age'],
            $_POST['sno']
        );

        $result = $family->editFamily(
            $_POST['Fname'],
            $_POST['fo'],
            $_POST['fcno'],
            $_POST['mname'],
            $_POST['mo'],
            $_POST['mcno'],
            $_POST['gname'],
            $_POST['gno'],
            $_POST['grel'],
            $_POST['Fname'],
            $_POST['sno']
        );
        echo "<script>window.location='/mpc/system/pages/StudentProfile.php';</script>";
    }
}
?>

<main>

    <div class="container-fluid">
        <form action="" class="m-5" method="POST">
            <p style="font-size: 16px" class='text-danger text-center mt-3'>Just Put N/a In the field if no info in that field</p>

            <h2 class="text-center">Student Basic Info</h2>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="hidden" name="sno" value="<?= $sno ?>" />
                    <input type="hidden" name="courseid" value="<?= $studentinfo['Course'] ?>" />
                    <label for="FirstName">First Name</label>
                    <input type="text" value="<?= $studentinfo['firstname'] ?>" name="FirstName" class="form-control" id="FirstName" />
                </div>
                <div class="form-group col-md-4">
                    <label for="MiddleName">Middle Name</label>
                    <input type="text" value="<?= $studentinfo['middlename'] ?>" name="MiddleName" class="form-control" id="MiddleName">
                </div>
                <div class="form-group col-md-4">
                    <label for="LastName">Last Name</label>
                    <input type="text" value="<?= $studentinfo['lastname'] ?>" name="LastName" class="form-control" id="LastName">
                </div>
            </div>
            <div class="form-group">
                <label for="Course">Course</label>
                <select name="Course" class="form-control" id="exampleFormControlSelect1" disabled>
                    <?php array_map(function ($course) use ($studentinfo) { ?>
                        <option value="<?= $course['courses_id']  ?>" <?php
                                                                        $selected = $studentinfo['Course'] == $course['courses_id'] ? 'selected' : '';
                                                                        echo $selected;
                                                                        ?>>
                            <?= $course['coursesName'] . '-' . $course['coursesCode'] ?>
                        </option>
                    <?php }, $courseList) ?>
                </select>

                <!-- <input require type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="Dob">Date of Birth</label>
                    <input type="text" value="<?= $studentinfo['dob'] ?>" name="Dob" class="form-control" id="Dob" placeholder="dd/mm/yyyy">
                </div>
                <div class="form-group col-md-3">
                    <label for="Pob">Place of Birth</label>
                    <input type="text" value="<?= $studentinfo['pob'] ?>" name="Pob" class="form-control" id="Pob">
                </div>
                <div class="form-group col-md-3">
                    <label for="Gender">Gender</label>
                    <input type="text" value="<?= $studentinfo['gender'] ?>" name="Gender" class="form-control" id="Gender">
                </div>
                <div class="form-group col-md-3">
                    <label for="age">Age</label>
                    <input type="number" value="<?= $studentinfo['age'] ?>" name="age" class="form-control" min="0" id="age">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Civil">Civil</label>
                    <input type="text" value="<?= $studentinfo['civil'] ?>" name="Civil" class="form-control" id="Civil">
                </div>
                <div class="form-group col-md-4">
                    <label for="Nat">Nationality</label>
                    <input type="text" value="<?= $studentinfo['nationality'] ?>" name="Nat" class="form-control" id="Nat">
                </div>
                <div class="form-group col-md-4">
                    <label for="Rel">Religion</label>
                    <input type="text" value="<?= $studentinfo['Religion'] ?>" name="Rel" class="form-control" id="Rel">
                </div>

            </div>
            <div class="form-group">
                <label for="inputAddress2">Address </label>
                <input type="text" value="<?= $studentinfo['Address'] ?>" name="Address" class="form-control" id="inputAddress" placeholder="Address">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" value="<?= $studentinfo['EmailAdd'] ?>" name="email" class="form-control" id="email">
                </div>

                <div class="form-group col-md-6">
                    <label for="ContactNo">Contact No</label>
                    <input type="text" value="<?= $studentinfo['CpNo'] ?>" name="ContactNo" class="form-control" id="ContactNo">
                </div>

            </div>


            <h2 class="text-center">Family Details</h2>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Fname">Father Name</label>
                    <input type="text" value="<?= $faminfo['fname'] ?>" name="Fname" class="form-control" id="Fname">
                </div>
                <div class="form-group col-md-4">
                    <label for="fo">Father Occupation</label>
                    <input type="text" value="<?= $faminfo['fo'] ?>" name="fo" class="form-control" id="MiddleName">
                </div>
                <div class="form-group col-md-4">
                    <label for="fcno">Father's Contact Number</label>
                    <input type="text" value="<?= $faminfo['fcno'] ?>" name="fcno" class="form-control" id="fcno">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="mname">Mother Name</label>
                    <input type="text" value="<?= $faminfo['mname'] ?>" name="mname" class="form-control" id="mname">
                </div>
                <div class="form-group col-md-4">
                    <label for="mo">Mother Occupation</label>
                    <input type="text" value="<?= $faminfo['mo'] ?>" name="mo" class="form-control" id="MiddleName">
                </div>
                <div class="form-group col-md-4">
                    <label for="mcno">Mother's Contact Number</label>
                    <input type="text" value="<?= $faminfo['mcno'] ?>" name="mcno" class="form-control" id="mcno">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="gname">Guardian's Name</label>
                    <input type="text" value="<?= $faminfo['gname'] ?>" name="gname" class="form-control" id="mname">
                </div>
                <div class="form-group col-md-4">
                    <label for="gno">Guardian Contact Number</label>
                    <input type="text" value="<?= $faminfo['gno'] ?>" name="gno" class="form-control" id="MiddleName">
                </div>
                <div class="form-group col-md-4">
                    <label for="grel">Guardians's Rel</label>
                    <input type="text" value="<?= $faminfo['grel'] ?>" name="grel" class="form-control" id="grel">
                </div>
            </div>
            <div class="form-group">
                <label for="gadd">Guardian's Address </label>
                <input type="text" value="<?= $faminfo['gadd'] ?>" name="gadd" class="form-control" id="gadd" placeholder="Guardian Address">
            </div>



            <div class="text-center">

                <button type="submit" name="editStudentProfile" class="btn btn-primary py-3 btn-block">Save</button>
            </div>

        </form>
    </div>
</main>