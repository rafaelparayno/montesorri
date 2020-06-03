<?php


class Account
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT account_id,personaldata.sno,CONCAT(personaldata.firstname,' ',personaldata.lastname) AS 'Student Name',
                                        RemBalance,totalPayment,Totalbalance,schoolyear.school_year,sem.semterm FROM `accounts` 
                                        LEFT JOIN schoolyear ON accounts.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON accounts.semid = sem.semid 
                                        LEFT JOIN personaldata ON accounts.sno = personaldata.sno");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataActivated($semid, $syid)
    {
        $result = $this->db->con->query("SELECT account_id,personaldata.sno,CONCAT(personaldata.firstname,' ',personaldata.lastname) AS 'Student Name',
                                        RemBalance,totalPayment,Totalbalance,schoolyear.school_year,sem.semterm FROM `accounts` 
                                        LEFT JOIN schoolyear ON accounts.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON accounts.semid = sem.semid 
                                         LEFT JOIN personaldata ON accounts.sno = personaldata.sno 
                                         WHERE accounts.semid = {$semid} AND accounts.syid = {$syid}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
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
}
