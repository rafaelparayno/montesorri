<?php

$strands = $strand->getData();
?>
<main>

    <div class="container-fluid ">
        <div class="form-group mt-5">
            <label for="Course">Strand</label>
            <select name="Course" class="form-control " id="courseselect">

                <?php array_map(function ($strand) { ?>
                    <option value="<?= $strand['strand_id'] ?>"><?= $strand['strand_name'] . '-' . $strand['strandcode'] ?></option>
                <?php }, $strands) ?>
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


        </div>

    </div>
</main>