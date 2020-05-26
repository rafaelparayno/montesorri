<?php

class Fee
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($syid, $semid)
    {
        $result = $this->db->con->query("SELECT fee_id,tfPerUnits,misc,school_year,semterm 
                                        FROM `fees` LEFT JOIN schoolyear ON fees.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON fees.semid = sem.semid
                                        WHERE fees.syid = {$syid} AND fees.semid = {$semid}");

        $items =  mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $items;
    }

    public function checkIfEmpty($syid, $semid)
    {
        $sql = "SELECT * FROM fees WHERE syid = {$syid} AND semid = {$semid}";
        $result =  $this->db->con->query($sql);

        $row = mysqli_num_rows($result);

        if ($row > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function insertData($params = null, $table = "fees")
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
        $tf,
        $msc,
        $syid,
        $semid
    ) {

        $sql = "UPDATE fees SET tfPerUnits = {$tf},misc = {$msc} WHERE syid = {$syid} AND semid = {$semid}";

        $result = $this->db->con->query($sql);
        //echo $sql;
        return $result;
    }

    public function addfee(
        $tfee,
        $misc,
        $syid,
        $semid
    ) {

        $params = array(
            'tfPerUnits' => $tfee,
            'misc' =>  $misc,
            'syid' =>  $syid,
            'semid' => $semid
        );


        $isEmpty = $this->checkIfEmpty($syid, $semid);

        if ($isEmpty) {
            $result = $this->insertData($params);
        } else {
            $this->editFamily(
                $tfee,
                $misc,
                $syid,
                $semid
            );
        }
    }
}
