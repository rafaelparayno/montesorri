<?php
include('header.php');
include('navigation.php');

$schoolYearArgs = $schoolYear->schoolYear();
$semList = $sem->getSemActivate();

$fees_1 = $fee->getdata($schoolYearArgs['sy_id'], $semList['semid'], 1);
$fees_2 = $fee->getdata($schoolYearArgs['sy_id'], $semList['semid'], 2);
$fees_3 = $fee->getdata($schoolYearArgs['sy_id'], $semList['semid'], 3);
$fees_4 = $fee->getdata($schoolYearArgs['sy_id'], $semList['semid'], 4);

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

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <div class="card p-5">
                                    <div class="card-header">
                                        <h4 class="text-center">1st Year Student</h4>
                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" value="1" name="yrlvl1" />
                                        <label for="Per Units">Tuition fee per Units</label>
                                        <input type="number" min="0" value="<?= (float) $fees_1['tfPerUnits'] ?>" name="perUnit1" class="form-control" id="perUnits" require />
                                    </div>
                                    <div class="form-group">
                                        <label for="misc">Miscelaneous</label>
                                        <input type="number" min="0" value="<?= (float) $fees_1['misc'] ?>" name="misc1" class="form-control" id="misc">
                                    </div>
                                    <button type="submit" name="subtmidTf_1" class="btn btn-primary btn-block">Save</button>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <div class="card p-5">
                                    <div class="card-header">
                                        <h4 class="text-center">2nd Year Student</h4>
                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" value="2" name="yrlvl2" />
                                        <label for="Per Units">Tuition fee per Units</label>
                                        <input type="number" min="0" value="<?= (float) $fees_2['tfPerUnits'] ?>" name="perUnits2" class="form-control" id="perUnits" require />
                                    </div>
                                    <div class="form-group">
                                        <label for="misc">Miscelaneous</label>
                                        <input type="number" min="0" value="<?= (float) $fees_2['misc'] ?>" name="misc2" class="form-control" id="misc">
                                    </div>
                                    <button type="submit" name="subtmidTf_2" class="btn btn-primary btn-block">Save</button>
                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <div class="card p-5">
                                    <div class="card-header">
                                        <h4 class="text-center">3rd Year Student</h4>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="<?= $semList['semid'] ?>" name="semid" />
                                        <input type="hidden" value="<?= $schoolYearArgs['sy_id'] ?>" name="syid" />
                                        <input type="hidden" value="3" name="yrlvl3" />
                                        <label for="Per Units">Tuition fee per Units</label>
                                        <input type="number" min="0" value="<?= (float) $fees_3['tfPerUnits'] ?>" name="perUnits3" class="form-control" id="perUnits" require />
                                    </div>
                                    <div class="form-group">
                                        <label for="misc">Miscelaneous</label>
                                        <input type="number" min="0" value="<?= (float) $fees_3['misc'] ?>" name="misc3" class="form-control" id="misc">
                                    </div>
                                    <button type="submit" name="subtmidTf_3" class="btn btn-primary btn-block">Save</button>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                <div class="card p-5">
                                    <div class="card-header">
                                        <h4 class="text-center">4th Year Student</h4>
                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" value="4" name="yrlvl4" />
                                        <label for="Per Units">Tuition fee per Units</label>
                                        <input type="number" min="0" value="<?= (float) $fees_4['tfPerUnits'] ?>" name="perUnits4" class="form-control" id="perUnits" require />
                                    </div>
                                    <div class="form-group">
                                        <label for="misc">Miscelaneous</label>
                                        <input type="number" min="0" value="<?= (float) $fees_4['misc'] ?>" name="misc4" class="form-control" id="misc">
                                    </div>
                                    <button type="submit" name="subtmidTf_4" class="btn btn-primary btn-block">Save</button>
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