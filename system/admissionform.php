<?php
include('./templates/header.php');
include('./templates/navigationhome.php');

$courses = $course->getData();

$lastid = $personalData->getLastId() != "" ? $personalData->getLastId()  : 1;

$sno = '2020-' . $lastid;


// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     if (isset($_POST['addSubmit'])) {
//         $personalData->addToPersonal(
//             $_POST['FirstName'],
//             $_POST['LastName'],
//             $_POST['MiddleName'],
//             $_POST['Course'],
//             $_POST['Pob'],
//             $_POST['Dob'],
//             $_POST['Gender'],
//             $_POST['Civil'],
//             $_POST['Nat'],
//             $_POST['Address'],
//             $_POST['ContactNo'],
//             $_POST['email'],
//             $_POST['Rel'],
//             $_POST['age'],
//             $_POST['sno'],
//             0
//         );

//         $result = $family->addFamily(
//             $_POST['Fname'],
//             $_POST['fo'],
//             $_POST['fcno'],
//             $_POST['mname'],
//             $_POST['mo'],
//             $_POST['mcno'],
//             $_POST['gname'],
//             $_POST['gno'],
//             $_POST['grel'],
//             $_POST['Fname'],
//             $_POST['sno']
//         );
//     }
// }
?>


<main>

    <div class="container-fluid">
        <form action="sendmail.php" class="m-5" method="POST">
            <p style="font-size: 16px" class='text-danger text-center mt-3'>Just Put N/a In the field if no info in that field</p>

            <h2 class="text-center">Student Basic Info</h2>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input require type="hidden" name="sno" value="<?= $sno ?>" />
                    <label for="FirstName">First Name</label>
                    <input require type="text" name="FirstName" class="form-control" id="FirstName" />
                </div>
                <div class="form-group col-md-4">
                    <label for="MiddleName">Middle Name</label>
                    <input require type="text" name="MiddleName" class="form-control" id="MiddleName">
                </div>
                <div class="form-group col-md-4">
                    <label for="LastName">Last Name</label>
                    <input require type="text" name="LastName" class="form-control" id="LastName">
                </div>
            </div>
            <div class="form-group">
                <label for="Course">Course</label>
                <select name="Course" class="form-control" id="exampleFormControlSelect1">

                    <?php array_map(function ($course) { ?>
                        <option value="<?= $course['courses_id'] ?>"><?= $course['coursesName'] . '-' . $course['coursesCode'] ?></option>
                    <?php }, $courses) ?>
                </select>
                <!-- <input require type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="Dob">Date of Birth</label>
                    <input require type="text" name="Dob" class="form-control" id="Dob" placeholder="dd/mm/yyyy">
                </div>
                <div class="form-group col-md-3">
                    <label for="Pob">Place of Birth</label>
                    <input require type="text" name="Pob" class="form-control" id="Pob">
                </div>
                <div class="form-group col-md-3">
                    <label for="Gender">Gender</label>
                    <input require type="text" name="Gender" class="form-control" id="Gender">
                </div>
                <div class="form-group col-md-3">
                    <label for="age">Age</label>
                    <input require type="number" name="age" class="form-control" min="0" id="age">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Civil">Civil</label>
                    <input require type="text" name="Civil" class="form-control" id="Civil">
                </div>
                <div class="form-group col-md-4">
                    <label for="Nat">Nationality</label>
                    <input require type="text" name="Nat" class="form-control" id="Nat">
                </div>
                <div class="form-group col-md-4">
                    <label for="Rel">Religion</label>
                    <input require type="text" name="Rel" class="form-control" id="Rel">
                </div>

            </div>
            <div class="form-group">
                <label for="inputArequire ddress2">Address </label>
                <input require type="text" name="Address" class="form-control" id="inputArequire ddress" placeholder="Address">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input require type="email" name="email" class="form-control" id="email">
                </div>

                <div class="form-group col-md-6">
                    <label for="ContactNo">Contact No</label>
                    <input require type="text" name="ContactNo" class="form-control" id="ContactNo">
                </div>

            </div>



            <h2 class="text-center">Family Details</h2>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Fname">Father Name</label>
                    <input require type="text" name="Fname" class="form-control" id="Fname">
                </div>
                <div class="form-group col-md-4">
                    <label for="fo">Father Occupation</label>
                    <input require type="text" name="fo" class="form-control" id="MiddleName">
                </div>
                <div class="form-group col-md-4">
                    <label for="fcno">Father's Contact Number</label>
                    <input require type="text" name="fcno" class="form-control" id="fcno">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="mname">Mother Name</label>
                    <input require type="text" name="mname" class="form-control" id="mname">
                </div>
                <div class="form-group col-md-4">
                    <label for="mo">Mother Occupation</label>
                    <input require type="text" name="mo" class="form-control" id="MiddleName">
                </div>
                <div class="form-group col-md-4">
                    <label for="mcno">Mother's Contact Number</label>
                    <input require type="text" name="mcno" class="form-control" id="mcno">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="gname">Guardian's Name</label>
                    <input require type="text" name="gname" class="form-control" id="mname">
                </div>
                <div class="form-group col-md-4">
                    <label for="gno">Guardian Contact Number</label>
                    <input require type="text" name="gno" class="form-control" id="MiddleName">
                </div>
                <div class="form-group col-md-4">
                    <label for="grel">Guardians's Rel</label>
                    <input require type="text" name="grel" class="form-control" id="grel">
                </div>
            </div>
            <div class="form-group">
                <label for="gadd">Guardian's Address </label>
                <input require type="text" name="gadd" class="form-control" id="gadd" placeholder="Guardian Address">
            </div>



            <div class="text-center">

                <button type="submit" name="addSubmit" id="nextBtn" class="btn btn-primary py-3 btn-block">Save</button>
            </div>

        </form>
    </div>
</main>
<?php

include('./templates/footer.php');
?>