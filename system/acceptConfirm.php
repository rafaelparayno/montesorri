<?php
session_start();
require('./database/DBController.php');

require('./database/User.php');

$db = new DBController();
$users = new User($db);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['confirmEmail'])) {
        $sno = $_POST['sno'];
        $user = $_POST['ead'];
        $pass = $_POST['password'];
        $users->confirmUser($sno, $user, $pass);
    }
}
