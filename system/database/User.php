<?php

class User
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }


    public function confirmUser($sno, $ead, $password)
    {


        $crppypass =  password_hash($password, PASSWORD_DEFAULT);

        $params = array(
            'username' => "'{$ead}'",
            'password' => "'{$crppypass}'",
            'userole' => 2,
            'acc_id' => "'{$sno}'",
        );


        $result = $this->insertData($params);
        if ($result) {
            $_SESSION['user'] = $ead;
            $_SESSION['id'] = $sno;
            $_SESSION['lvl'] = 2;



            // header("Location:" . $_SERVER['PHP_SELF']);
            header("Location:" . './pages/dashboard.php');
        }
    }


    public function insertData($params = null, $table = "users")
    {
        if ($this->db->con != null) {
            if ($params != null) {

                $columns = implode(',', array_keys($params));
                // print_r($columns);
                $values = implode(',', array_values($params));
                //   print_r($values);

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);


                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }


    public function login($username, $password)
    {
        if ($this->db->con != null) {
            // $result = $this->db->con->query("SELECT * FROM users WHERE password = '{$password}' 
            //                                     AND username = '{$username}' ");
            // $row = mysqli_fetch_array($result);
            // $numrow = mysqli_num_rows($result);
            $args = $this->get_pwd_from_info($username);
            // print_r($args);
            $passwordfromdb = $args['password'];

            echo $passwordfromdb;
            if (password_verify($password, $passwordfromdb)) {

                $_SESSION['user'] = $username;
                $_SESSION['id'] = $args['acc_id'];
                $_SESSION['lvl'] = $args['userole'];
                header("Location:" . './pages/dashboard.php');
            }
        }
    }

    private function get_pwd_from_info($username)
    {
        $result = $this->db->con->query("SELECT * FROM users WHERE username = '{$username}' ");
        $args = mysqli_fetch_array($result);

        return $args;
    }
}
