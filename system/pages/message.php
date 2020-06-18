<?php
include('header.php');
include('navigation.php');


$id = $_SESSION['id'];
$role = $_SESSION['lvl'];

// $schoolYearArgs = $schoolYear->schoolYear();
// $semList = $sem->getSemActivate();

$messageList = $message->getDatabySearching('receiver_id', $id);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['saveUserAdmin'])) {
        $pa = "";

        if (isset($_FILES['fileVoice'])) {
            $file_name = $_FILES['fileVoice']['name'];
            $file_size = $_FILES['fileVoice']['size'];
            $file_tmp = $_FILES['fileVoice']['tmp_name'];
            $file_size = $_FILES['fileVoice']['size'];

            move_uploaded_file($file_tmp, "../files/" . $file_name);

            $pa = '../files/' . $file_name;
            if ($file_size == 0) {
                $pa = "";
            }
        }



        $message->addMessage($_POST['text'], $_POST['subjectTxt'], $id, $_POST['receiverId'], $pa);
        echo $_POST['receiverId'];
    }
}

// print_r($messageList);

?>
<main>


    <div class="container-fluid">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Users</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Users Table
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-start mb-3">
                    <button data-toggle="modal" data-target="#messageModal" class="btn btn-md btn-success mr-2">Send Message</button>
                    <!-- <button data-toggle="modal" data-target="#addUserAdmin" class="btn btn-md btn-success">Add User Admin</button> -->

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>From</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Attachment</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>

                                <th>From</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Attachment</th>


                            </tr>
                        </tfoot>
                        <tbody>


                            <?php array_map(function ($message) { ?>
                                <tr>
                                    <td><?= $message['sender_id'] ?></td>
                                    <td><?= $message['subject'] ?></td>
                                    <td><?= $message['message'] ?></td>
                                    <td><?php
                                        if ($message['attach'] != "" ||  $message['attach'] != null) {
                                            echo '<img class="img-responsive" style="width:250px;height:250px;" src="' . $message['attach'] . '" />';
                                        }
                                        ?></td>
                                </tr>
                            <?php }, $messageList) ?>



                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</main>


<div id="messageModal" class="modal fade " tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send To Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div id="divdis" class="form-group">
                        <input type="hidden" value="<?php echo $role == 1 ? 2 : 1 ?>" name="userole" id="userRoleMessage" />
                        <!-- <input type="text" name="receiverId" id="receiverId" /> -->
                        <label> Search To : </label> <input type="text" name="search" id="search" placeholder="Search...." class="form-control" />
                        <div class="text-center border mt-3" id="displayUsersAdmin"></div>
                    </div>
                    <div class="form-group">

                        <!-- <input type="hidden" value="1" name="userole" id="userRoleMessage" /> -->
                        <label> To : </label> <input type="text" name="search" id="toSender" class="form-control" />
                        <!-- <div class="text-center border mt-3" id="displayUsersAdmin"></div> -->
                        <input type="hidden" name="receiverId" id="receiverId" />
                    </div>
                    <div class="form-group">
                        <label> Subject : </label> <input type="text" name="subjectTxt">
                    </div>


                    <div class="custom-file">
                        <input type="file" name="fileVoice" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                    <div class="form-group">
                        <textarea name="text" id="textMessage"></textarea>
                    </div>


            </div>
            <div class="modal-footer">

                <button type="Submit" name="saveUserAdmin" class="btn btn-primary">Send Message</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>



<?php
include('footer.php');
?>