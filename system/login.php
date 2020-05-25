<?php
include('./templates/header.php');
include('./templates/navigationhome.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['loginSumb'])) {
        $users->login($_POST['username'], $_POST['password']);
    }
    $log = true;
}
?>

<main>
    <div class="container">

        <div class="m-5">
            <form method="post" class="border p-5">
                <div class="form-group">
                    <?php
                    if (isset($log)) {
                    ?>
                        <div class="text-center" style="color:red">Wrong Password or Username</div>
                    <?php } ?>
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="username">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="loginSumb" class="btn mr-2 btn-primary">Login</button>

                    <a href="./pages/dashboard.php">Forgot Password?</a>
                </div>

            </form>
        </div>
    </div>
</main>
<?php

include('./templates/footer.php');
?>