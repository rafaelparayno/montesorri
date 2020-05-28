<?php


class Studentsinfo
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }


    public function getData($table = 'studentsinfo')
    {
        $result = $this->db->con->query("SELECT * FROM studentsinfo");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataSearch($condition, $searckey)
    {
        $result = $this->db->con->query("SELECT * FROM studentsinfo WHERE {$condition} = '$searckey'");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $result;
    }

    public function addStudentsInfo(
        $sno,
        $sect,
        $yr,
        $units,
        $statusStud,
        $evalStatus
    ) {

        $params = array(
            'sno' => "'{$sno}'",
            'sect_enrolled' => $sect,
            'year_level' => $yr,
            'allowed_units ' =>  $units,
            'status_student' =>  $statusStud,
            'eval_status' => $evalStatus

        );


        $result = $this->insertData($params);
    }


    public function insertData($params = null, $table = "studentsinfo")
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


    // public function login($username, $password)
    // {
    //     if ($this->db->con != null) {
    //         // $result = $this->db->con->query("SELECT * FROM users WHERE password = '{$password}' 
    //         //                                     AND username = '{$username}' ");
    //         // $row = mysqli_fetch_array($result);
    //         // $numrow = mysqli_num_rows($result);
    //         $args = $this->get_pwd_from_info($username);
    //         // print_r($args);
    //         $passwordfromdb = $args['password'];

    //         echo $passwordfromdb;
    //         if (password_verify($password, $passwordfromdb)) {

    //             $_SESSION['user'] = $username;
    //             $_SESSION['id'] = $args['acc_id'];
    //             $_SESSION['lvl'] = $args['userole'];
    //             header("Location:" . './pages/dashboard.php');
    //         }
    //     }
    // }

    // private function get_pwd_from_info($username)
    // {
    //     $result = $this->db->con->query("SELECT * FROM users WHERE username = '{$username}' ");
    //     $args = mysqli_fetch_array($result);

    //     return $args;
    // }
}
