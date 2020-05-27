<?php


class Sem
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT semid,sem.syid,semterm,school_year,sem_status FROM `sem` LEFT JOIN schoolyear ON sem.syid = schoolyear.sy_id");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }


    public function getSemActivate()
    {
        $result = $this->db->con->query("SELECT * FROM `sem` WHERE sem_status = 'activate'");
        $sem = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $sem;

        //return $;
    }

    public function insertData($params = null, $table = "sem")
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

    public function addSem(
        $semterm,
        $syid
    ) {

        $params = array(
            'semterm' => $semterm,
            'syid ' => $syid,
            'sem_status' => "'disable'",
            'isOpenReg' =>  0
        );


        $result = $this->insertData($params);

        //   return $result;
    }


    public function activateSem(
        $syid,
        $semid
    ) {
        $sql = "UPDATE sem SET sem_status ='disable' WHERE sem_status = 'activate'";
        $this->db->con->query($sql);

        $sql = "UPDATE sem SET sem_status = 'activate' WHERE syid = {$syid} AND semid = {$semid}";

        $result = $this->db->con->query($sql);

        return $result;
    }
}
