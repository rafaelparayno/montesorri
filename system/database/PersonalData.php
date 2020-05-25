<?php


class PersonalData
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($table = 'personaldata')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function insertData($params = null, $table = "personaldata")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    public function addToPersonal(
        $fname,
        $lastname,
        $middlename,
        $course,
        $pob,
        $dob,
        $gender,
        $civil,
        $nat,
        $add,
        $cno,
        $eadd,
        $rel,
        $age,
        $sno

    ) {

        $params = array(
            'firstname' => $fname,
            'lastname' => $lastname,
            'middlename' => $middlename,
            'Course' => $course,
            'pob' => $pob,
            'dob' => $dob,
            'gender' => $gender,
            'civil' => $civil,
            'nationality' => $nat,
            'Address' => $add,
            'cpNo' => $cno,
            'EmailAdd' => $eadd,
            'Religion' => $rel,
            'age' => $age,
            'sno' => $sno
        );

        $result = $this->insertData($params);
        if ($result) {
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }
}
