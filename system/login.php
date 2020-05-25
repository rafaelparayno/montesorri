<?php
    include('./templates/header.php');
    include('./templates/navigationhome.php');
?>

<main>
        <div class="container">
            <div class="m-5">
                <form class="border p-5">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" onClick="" class="btn mr-2 btn-primary">Login</button>

                        <a href="./pages/dashboard.php">Forgot Password?</a>
                    </div>

                </form>
            </div>
        </div>
    </main>
<?php
   
    include('./templates/footer.php');
?>