<?php
include('header.php');
include('navigation.php');

$schoolYearArgs = $schoolYear->schoolYear();
$semList = $sem->getSemActivate();

$fees = $fee->getdata($schoolYearArgs['sy_id'], $semList['semid']);

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Fees <?= $schoolYearArgs['school_year'] . ' ' . $semList['semterm'] . ' Term' ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Fees <?= $schoolYearArgs['school_year'] . ' ' . $semList['semterm'] . ' Term' ?> </li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Fees <?= $schoolYearArgs['school_year'] . ' ' . $semList['semterm'] . ' Term' ?>
            </div>
            <div class="card-body">
                <div class="">
                    <form method="POST" action="feesFunction.php">
                        <div class="container">

                            <div class="form-group">
                                <input type="hidden" value="<?= $semList['semid'] ?>" name="semid" />
                                <input type="hidden" value="<?= $schoolYearArgs['sy_id'] ?>" name="syid" />
                                <label for="Per Units">Tuition fee per Units</label>
                                <input type="number" min="0" value="<?= (float) $fees['tfPerUnits'] ?>" name="perUnits" class="form-control" id="perUnits" require />
                            </div>
                            <div class="form-group">
                                <label for="misc">Miscelaneous</label>
                                <input type="number" min="0" value="<?= (float) $fees['misc'] ?>" name="misc" class="form-control" id="misc">
                            </div>
                            <button type="submit" name="subtmidTf" class="btn btn-primary btn-block">Save</button>
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