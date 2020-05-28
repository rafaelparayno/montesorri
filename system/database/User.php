<?php

class User
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }





    public function getData($table = 'users')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE username  != 'admin'");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataSearch($condition, $searckey)
    {
        $result = $this->db->con->query("SELECT * FROM users WHERE {$condition} = '$searckey'");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $result;
    }

    public function getDataSearchLike($keys, $us)
    {

        $sql =  "SELECT * FROM users WHERE username LIKE '%{$keys}%' and `userole` = {$us}";

        $result = $this->db->con->query($sql);

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
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

    public function addToUsers($accid, $username, $role, $password)
    {

        $crppypass =  password_hash($password, PASSWORD_DEFAULT);
        $params = array(
            'username' => "'{$username}'",
            'password' => "'{$crppypass}'",
            'userole' => $role,
            'acc_id' => "'{$accid}'",
        );

        $result = $this->insertData($params);
        // if ($result) {

        //     //header("Location:" . './pages/users.php');
        // }
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

                //    echo $query_string;
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


            if (password_verify($password, $passwordfromdb)) {

                $_SESSION['user'] = $username;
                $_SESSION['id'] = $args['acc_id'];
                $_SESSION['lvl'] = $args['userole'];
                header("Location:" . './pages/dashboard.php');
            }
        }
    }

    public function resetPassword($userid)
    {
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];
        $crppypass =  password_hash($rand, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = '{$crppypass}' WHERE user_id = {$userid}";

        $this->db->con->query($sql);
        //   echo $sql;
        // echo $rand . ' ' . $crppypass;
        return $rand;
    }

    private function get_pwd_from_info($username)
    {
        $result = $this->db->con->query("SELECT * FROM users WHERE username = '{$username}' ");
        $args = mysqli_fetch_array($result);

        return $args;
    }

    // private function get_pwd_from_useradmin($username, $userole)
    // {
    //     $result = $this->db->con->query("SELECT * FROM users WHERE username = '{$username}' AND userole = {$userole} ");
    //     $args = mysqli_fetch_array($result);

    //     return $args;
    // }
}
