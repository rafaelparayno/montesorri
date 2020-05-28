<?php
include('header.php');
include('navigation.php');


$studentC = $personal->getDatabySearching('sno', $_GET['sno']);
// $log = true;
?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Evaluate</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Evaluate</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-user mr-1"></i>Evaluate Set

            </div>

            <div class="card-body">
                <div class="container">
                    <form action="evalAdd.php" method="POST">




                        <h2 class="text-center">Student No:<?= $_GET['sno'] ?></h2>
                        <input type="hidden" name="sno" value="<?= $_GET['sno'] ?>" />
                        <input type="hidden" name="courseid" value="<?= $studentC['Course'] ?>" />
                        <div class="form-group">
                            <label for="studType">Student Type</label>
                            <select name="studType" class="form-control" id="studType">
                                <option value="1">Regular</option>
                                <option value="2" selected>Irregular</option>

                            </select>
                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>

                        <div class="form-group">
                            <label for="yearLevelSelect">YEAR LEVEL</label>
                            <select name="yearlevel" class="form-control" id="yearLevelSelect">
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>

                            </select>

                        </div>


                        <div class="form-group">
                            <label for="sectionsSelect">Sections</label>
                            <select name="sectionsSelect" class="form-control" id="sectionsSelect" disabled>
                                <!-- <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option> -->

                            </select>
                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>

                        <div id="unitsDiv" class="form-group">
                            <label for="courseSelect">Units Allowed for Irreg</label>
                            <input type="number" name="unitsallow" />
                        </div>

                        <div class="form-group">
                            <label for="evalStatus">Evaluation Status</label>
                            <select name="evalStatus" class="form-control" id="evalStatusSelect">
                                <option value="1">Okay</option>
                                <option value="2">rejected</option>
                            </select>

                        </div>
                        <button type="submit" name="addEval" class="btn btn-block btn-info">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include('footer.php');
?>