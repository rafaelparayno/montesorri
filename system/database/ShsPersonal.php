<?php


class ShsPersonal
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($table = 'shspersonal')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataRawQuery($sql)
    {
        $result = $this->db->con->query($sql);

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
        //   SELECT * FROM `shspersonal` WHERE sno NOT in (SELECT acc_id FROM users)
    }


    public function getDataWithSemSyid($semid, $syid)
    {
        $result = $this->db->con->query("SELECT * FROM shspersonal WHERE semid = {$semid} AND syid = {$syid} AND isEnrolled = 1");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function deleteData($condition, $key)
    {
        $result = $this->db->con->query("DELETE FROM shspersonal WHERE {$condition} = '{$key}' ");

        return $result;
    }

    public function updateshspersonal(
        $firstname,
        $lastname,
        $mn,
        $course,
        $pob,
        $dob,
        $gender,
        $civil,
        $nat,
        $add,
        $cp,
        $ead,
        $rel,
        $age,
        $sno
    ) {
        $sql = "UPDATE shspersonal SET firstname = '{$firstname}', lastname = '{$lastname}',middlename='{$mn}', 
            course = {$course} ,pob = '{$pob}', dob ='{$dob}', gender='{$gender}', civil ='{$civil}',
            nationality = '{$nat}',Address= '{$add}', Cpno = '{$cp}', EmailAdd = '{$ead}',
            Religion = '$rel', age = {$age} WHERE sno = '{$sno}'";

        $result = $this->db->con->query($sql);
        //echo $sql;
        return $result;
    }

    public function getDatabySearching($condtion, $searchKey)
    {
        $result = $this->db->con->query("SELECT * FROM shspersonal WHERE {$condtion} = '{$searchKey}' ");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);



        return $result;
    }

    public function insertData($params = null, $table = "shspersonal")
    {
        if ($this->db->con != null) {
            if ($params != null) {

                $columns = implode(',', array_keys($params));
                // print_r($columns);
                $values = implode(',', array_values($params));
                //   print_r($values);

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                // echo $query_string;
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }



    public function addToPersonal(
        $fname,
        $lastname,
        $middlename,
        $strand,
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
        $sno,
        $isE,
        $syid,
        $semid

    ) {

        $params = array(
            'firstname' => "'{$fname}'",
            'lastname' => "'{$lastname}'",
            'middlename' => "'{$middlename}'",
            'strand' => $strand,
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
            'shsno' => "'{$sno}'",
            'isEnrolled' =>   $isE,
            'semid' =>        $semid,
            'syid' => $syid
        );

        $result = $this->insertData($params);
        // if ($result) {
        //     header('Location:' . $_SERVER['PHP_SELF']);
        // }
    }

    public function updateEnrolled($sno, $semid, $syid)
    {
        $sql = "UPDATE shspersonal SET isEnrolled = 1,semid = {$semid}, syid = {$syid} WHERE shsno = '{$sno}'";

        $result = $this->db->con->query($sql);
        //echo $sql;
        return $result;
    }

    public function getLastId()
    {
        $result = $this->db->con->query("SELECT AUTO_INCREMENT as Last_id FROM information_schema.TABLES WHERE TABLE_NAME = 'shspersonal'");
        $lastid = $result->fetch_row();

        return $lastid[0];

        //return $;
    }
}
