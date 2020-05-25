<?php
include('header.php');
include('navigation.php');
$sno = $_GET['sid'];

$studentinfo = $personal->getDatabySno('sno', $sno);


if ($studentinfo == "" || $studentinfo == null) {
    header('Location: ./students.php');
}
print_r($studentinfo);

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Students</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Students</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-user mr-1"></i>Add Students

            </div>
            <p style="font-size: 16px" class='text-danger text-center mt-3'>Just Put N/a In the field if no info in that field</p>
            <div class="card-body">
                <div class="container">
                    <form id="regForm" method="POST">
                        <div style="text-align:center">
                            <span class="step"></span>
                            <span class="step"></span>

                        </div>

                        <div class="tab">

                            <h2 class="text-center">Student Basic Info</h2>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="hidden" name="sno" value="<?= $sno ?>" />
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
                                <input type="text" value="<?= $studentinfo['Course'] ?>" name="Course" class="form-control" id="Course" placeholder="Course">
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
                        </div>


                        <div class="tab">
                            <h2 class="text-center">Family Details</h2>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Fname">Father Name</label>
                                    <input type="text" name="Fname" class="form-control" id="Fname">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fo">Father Occupation</label>
                                    <input type="text" name="fo" class="form-control" id="MiddleName">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fcno">Father's Contact Number</label>
                                    <input type="text" name="fcno" class="form-control" id="fcno">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="mname">Mother Name</label>
                                    <input type="text" name="mname" class="form-control" id="mname">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mo">Mother Occupation</label>
                                    <input type="text" name="mo" class="form-control" id="MiddleName">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mcno">Mother's Contact Number</label>
                                    <input type="text" name="mcno" class="form-control" id="mcno">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="gname">Guardian's Name</label>
                                    <input type="text" name="gname" class="form-control" id="mname">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gno">Guardian Contact Number</label>
                                    <input type="text" name="gno" class="form-control" id="MiddleName">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="grel">Guardians's Rel</label>
                                    <input type="text" name="grel" class="form-control" id="grel">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gadd">Guardian's Address </label>
                                <input type="text" name="gadd" class="form-control" id="gadd" placeholder="Guardian Address">
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-primary btn-lg px-5">Prev</button>
                            <button id="submitButtonAddStud" type="button" name="addSubmit" id="nextBtn" class="btn btn-primary btn-lg px-5" onclick="nextPrev(1)">Next</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include('footer.php');
?>