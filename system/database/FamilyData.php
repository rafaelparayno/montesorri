<?php


class FamilyData
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }


    public function insertData($params = null, $table = "famdata")
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

    public function editFamily(
        $fn,
        $fo,
        $fcno,
        $mn,
        $mo,
        $mcno,
        $gname,
        $gno,
        $gadd,
        $grel,
        $sno
    ) {

        $sql = "UPDATE famdata SET fname = '{$fn}', fcno = '{$fcno}',fo='{$fo}', 
        mname = '{$mn}' ,mcno = '{$mcno}', mo ='{$mo}', gname='{$gname}', gno ='{$gno}',
        gadd = '{$gadd}',grel= '{$grel}' WHERE sno = '{$sno}'";

        $result = $this->db->con->query($sql);
        //echo $sql;
        return $result;
    }

    public function addFamily(
        $fn,
        $fo,
        $fcno,
        $mn,
        $mo,
        $mcno,
        $gname,
        $gno,
        $gadd,
        $grel,
        $sno
    ) {


        $params = array(
            'fname' => "'{$fn}'",
            'fcno' => "'{$fcno}'",
            'fo' => "'{$fo}'",
            'mname' => "'{$mn}'",
            'mcno' => "'{$mcno}'",
            'mo' => "'{$mo}'",
            'gname' => "'{$gname}'",
            'gno' => "'{$gno}'",
            'gadd' => "'{$gadd}'",
            'grel' => "'{$grel}'",
            'sno' => "'{$sno}'",
        );


        $result = $this->insertData($params);
        // if ($result) {
        //     header('Location:' . $_SERVER['PHP_SELF']);
        // }
        return $result;
    }

    public function getDatabySearching($condtion, $searchKey)
    {
        $result = $this->db->con->query("SELECT * FROM famdata WHERE {$condtion} = '{$searchKey}' ");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);



        return $result;
    }
}
