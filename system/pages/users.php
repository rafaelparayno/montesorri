<?php
include('header.php');
include('navigation.php');


$schoolYearArgs = $schoolYear->schoolYear();
$semList = $sem->getSemActivate();
$studentsList = $personal->getDataRawQuery('SELECT * FROM `personaldata` WHERE sno NOT in (SELECT acc_id FROM users)');

$usersList = $users->getData();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['saveUserStudent'])) {
        $username = $_POST['studentuser'];
        $passwordStud = $_POST['passwordStud'];
        $users->addToUsers(
            $_POST['snoForm'],
            $username,
            2,
            $passwordStud
        );
        echo "<script>window.location='/mpc/system/pages/users.php';</script>";
    }


    if (isset($_POST['saveUserAdmin'])) {
        $username = $_POST['adminuser'];
        $passwordStud = $_POST['passwordAdmin'];
        $users->addToUsers(
            $passwordStud,
            $username,
            1,
            $passwordStud
        );
        echo "<script>window.location='/mpc/system/pages/users.php';</script>";
    }

    if (isset($_POST['resetPassword'])) {
        $id = $_POST['useridModalReset'];
        $password = $users->resetPassword($id);
        // echo "<script>window.location='/mpc/system/pages/users.php';</script>";
    }
}

?>
<main>

    <?php if (isset($password)) { ?>
        <div class="text-center text-info display-4">New Password for the user : <?= $password ?></div>
    <?php   } ?>
    <div class="container-fluid">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Users</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Users Table
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button data-toggle="modal" data-target="#addUserStudent" class="btn btn-md btn-success mr-2">Add user Student</button>
                    <button data-toggle="modal" data-target="#addUserAdmin" class="btn btn-md btn-success">Add User Admin</button>

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>Account ID</th>
                                <th>User name</th>
                                <th>User Role</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>

                                <th>Account ID</th>
                                <th>User name</th>
                                <th>User Role</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($user) { ?>
                                <tr>
                                    <td><?= $user['acc_id'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?php echo $user['userole'] == 1 ? 'Admin' : 'Student' ?></td>




                                    <td>
                                        <button data-toggle="modal" data-target="#resetPassword" data-userid="<?php echo $user['user_id']; ?>" href="" class="btn btn-block btn-info">
                                            Reset Password
                                        </button>
                                        <!-- <a class="btn btn-block btn-info" href="./evaluation.php?sno=<?= $user['sno'] ?>">Reset Password</a> -->
                                    </td>
                                </tr>
                            <?php }, $usersList) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="addUserStudent" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adding User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="snoForm">Student No</label>
                            <select name="snoForm" class="form-control" id="snoStudentSelect">

                                <?php array_map(function ($snoStud) { ?>
                                    <option value="<?= $snoStud['sno'] ?>"><?= $snoStud['sno'] ?></option>
                                <?php }, $studentsList) ?>
                            </select>
                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>
                        <div class="form-group">
                            <label for="studentuser">Student Username</label>
                            <input type="text" name="studentuser" id="studentuser" />
                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>

                        <div class="form-group">
                            <label for="password">Generated Password</label>
                            <input type="text" name="passwordStud" id="generatedPass" />
                            <button type="button" class="btn btn-md btn-info mt-2" id="generatePass">Generate Password</button>
                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>


                </div>
                <div class="modal-footer">

                    <button type="Submit" name="saveUserStudent" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="addUserAdmin" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adding Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="adminuser">Admin Username</label>
                            <input type="text" name="adminuser" id="adminuser" />

                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>
                        <div class="form-group">
                            <label for="password">Generated Password</label>
                            <input type="text" name="passwordAdmin" id="generatedPassAdmin" />
                            <button type="button" class="btn btn-md btn-info mt-2" id="generatePass2">Generate Password</button>
                            <!-- <input type="text" name="Course" class="form-control" id="Course" placeholder="Course"> -->
                        </div>


                </div>
                <div class="modal-footer">

                    <button type="Submit" name="saveUserAdmin" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>


    <div id="resetPassword" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Reset Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Reset selected User Password ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="useridModalReset" value="">
                        <button type="Submit" name="resetPassword" class="btn btn-primary">Reset Password</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</main>



<?php
include('footer.php');
?>