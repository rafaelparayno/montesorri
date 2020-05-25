<?php

class User
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }


    public function login($username, $password)
    {
        if ($this->db->con != null) {
            $result = $this->db->con->query("SELECT * FROM users WHERE password = '{$password}' 
                                                AND username = '{$username}' ");
            $row = mysqli_fetch_array($result);
            $numrow = mysqli_num_rows($result);

            if ($numrow > 0) {

                if ($row['username'] == $username && $row['password'] == $password) {

                    $_SESSION['user'] = $username;
                    $_SESSION['id'] = $row['acc_id'];
                    $_SESSION['lvl'] = 1;



                    // header("Location:" . $_SERVER['PHP_SELF']);
                    header("Location:" . './pages/dashboard.php');
                }
            }
        }
    }
}
