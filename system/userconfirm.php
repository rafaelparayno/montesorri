<?php
include('./templates/header.php');
include('./templates/navigationhome.php');

?>


<main>

    <div class="container-fluid">
        <form action="acceptConfirm.php" class="m-5" method="POST">
            <div class="form-row">

                <input type="hidden" value="<?= $_GET['id'] ?>" name="sno" />
                <input type="hidden" value="<?= $_GET['email'] ?>" name="ead" />
                <div class="form-group col-md-6">
                    <label for="password">password</label>
                    <input require name="password" id="password" type="password" class="form-control"">
                    <span id='message2'></span>
                </div>
                <div class=" form-group col-md-6">
                    <label for="confirm_password">Confirm Password</label>
                    <input require type="password" name="confirm_password" id="confirm_password" class="form-control">
                    <span id='message'></span>
                </div>
            </div>


            <div class="text-center">
                <button type="submit" name="confirmEmail" id="buttonConfirm" class="btn btn-primary py-3 btn-block" disabled>Save</button>
            </div>

        </form>
    </div>
</main>
<?php

include('./templates/footer.php');
?>