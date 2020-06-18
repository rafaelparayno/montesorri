<?php
include('header.php');
include('navigation.php');

$sno = $_GET['sno'];
$subject_id = $_GET['sid'];

$gradesObject = $studentGrade->getDataAddingGrade($subject_id, $sno);

if (isset($_POST['submitGrade'])) {
    $studno = $_POST['sno'];
    $subid = $_POST['subject_id'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];
    $result = $studentGrade->addSubjectGrades($studno, $prelim, $midterm, $finals, $subid);
    //echo "<script>window.location='/mpc/system/pages/StudentGrades.php';</script>";

    echo "<script>window.location='/mpc/system/pages/StudentGrades.php';</script>";
}

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Student Grade</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Student Grade</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><?= $gradesObject['StudentName'] . ' Grade in ' . $gradesObject['subjectname'] ?>
            </div>
            <div class="card-body">
                <div class="">
                    <form method="POST">

                        <div class="row">


                            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                <div class="card p-5">
                                    <div class="card-header">
                                        <h4 class="text-center">Grades</h4>
                                    </div>
                                    <div class="form-group">
                                        <label for="prelim">Prelim Grade</label>
                                        <input type="number" min="65" value="<?php echo $gradesObject['prelim'] == null ? '0' : $gradesObject['prelim']  ?>" name="prelim" class="form-control" id="prelim" require />
                                    </div>
                                    <div class="form-group">
                                        <label for="midterm">Midterm Grade</label>
                                        <input type="number" min="65" value="<?php echo $gradesObject['midterm'] == null ? '0' : $gradesObject['midterm']  ?>" name="midterm" class="form-control" id="midterm" require />
                                    </div>
                                    <div class="form-group">
                                        <label for="finals">Finals Grade</label>
                                        <input type="number" min="65" value="<?php echo $gradesObject['finals'] == null ? '0' : $gradesObject['finals']  ?>" name="finals" class="form-control" id="finals" require />
                                    </div>
                                    <input type="hidden" value="<?= $sno ?>" name="sno" />
                                    <input type="hidden" value="<?= $subject_id ?>" name="subject_id" />
                                    <button type="submit" name="submitGrade" class="btn btn-primary btn-block">Save</button>
                                </div>

                            </div>

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