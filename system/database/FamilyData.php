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
            'maname' => "'{$mn}'",
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


    }
}
