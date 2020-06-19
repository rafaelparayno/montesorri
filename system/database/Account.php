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
        $result = $this->db->con->query("SELECT account_id,mode,personaldata.sno,CONCAT(personaldata.firstname,' ',personaldata.lastname) AS 'StudentName',
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
        $result = $this->db->con->query("SELECT account_id,mode,personaldata.sno,CONCAT(personaldata.firstname,' ',personaldata.lastname) AS 'StudentName',
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

    public function getStudAccountSin($sno, $syid)
    {
        $result = $this->db->con->query("SELECT account_id,mode,RemBalance,totalPayment,Totalbalance,schoolyear.school_year,sem.semterm FROM `accounts` 
                                        LEFT JOIN schoolyear ON accounts.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON accounts.semid = sem.semid 
                                        LEFT JOIN personaldata ON accounts.sno = personaldata.sno 
                                        WHERE accounts.sno = '{$sno}' AND accounts.syid = {$syid}");

        $acc = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $acc;
    }



    public function getStudAccount($sno)
    {
        $result = $this->db->con->query("SELECT account_id,mode,RemBalance,totalPayment,Totalbalance,schoolyear.school_year,sem.semterm FROM `accounts` 
                                        LEFT JOIN schoolyear ON accounts.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON accounts.semid = sem.semid 
                                         LEFT JOIN personaldata ON accounts.sno = personaldata.sno 
                                         WHERE accounts.sno = '{$sno}'");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }





    public function checkStudPaid($sno, $syid, $semid)
    {
        $result = $this->db->con->query("SELECT * FROM `accounts` WHERE sno = '{$sno}' AND syid = {$syid} AND semid = {$semid}");

        $resultArray = mysqli_num_rows($result);

        return $resultArray;
    }




    public function insertData($params = null, $table = "accounts")
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

    public function addAccounts(
        $syid,
        $semid,
        $sno,
        $mode,
        $Totalbal,
        $totalPay,
        $RemBal
    ) {

        $params = array(
            'syid' => $syid,
            'semid' => $semid,
            'sno' => "'{$sno}'",
            'mode ' =>  "'{$mode}'",
            'Totalbalance' =>  $Totalbal,
            'totalPayment' => $totalPay,
            'RemBalance' => $RemBal,
        );


        $result = $this->insertData($params);
    }
}
