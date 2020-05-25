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

    public function getDatabySno($condtion, $searchKey)
    {
        $result = $this->db->con->query("SELECT * FROM personaldata WHERE {$condtion} = '{$searchKey}' ");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);



        return $result;
    }

    public function insertData($params = null, $table = "personaldata")
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

    public function getLastId()
    {
        $result = $this->db->con->query("SELECT personal_id FROM `personaldata` ORDER BY personal_id DESC");
        $lastid = $result->fetch_row();

        return $lastid[0];

        //return $;
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
            'firstname' => "'{$fname}'",
            'lastname' => "'{$lastname}'",
            'middlename' => "'{$middlename}'",
            'Course' => $course,
            'pob' => "'{$pob}'",
            'dob' => "'{$dob}'",
            'gender' => "'{$gender}'",
            'civil' => "'{$civil}'",
            'nationality' => "'{$nat}'",
            'Address' => "'{$add}'",
            'cpNo' => "'{$cno}'",
            'EmailAdd' => "'{$eadd}'",
            'Religion' => "'{$rel}'",
            'age' => $age,
            'sno' => "'{$sno}'"
        );

        $result = $this->insertData($params);
        // if ($result) {
        //     header('Location:' . $_SERVER['PHP_SELF']);
        // }
    }
}
