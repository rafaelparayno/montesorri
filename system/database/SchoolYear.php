<?php


class SchoolYear
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($table = 'schoolyear')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function schoolYear()
    {
        $result = $this->db->con->query("SELECT * FROM `schoolyear` WHERE sy_status = 'activate'");
        $schoolYear = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $schoolYear;

        //return $;
    }


    public function insertData($params = null, $table = "schoolyear")
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

    public function activateSy(
        $id
    ) {
        $sql = "UPDATE schoolyear SET sy_status ='disable' WHERE sy_status = 'activate'";
        $this->db->con->query($sql);

        $sql = "UPDATE schoolyear SET sy_status = 'activate' WHERE sy_id = {$id}";

        $result = $this->db->con->query($sql);
        //echo $sql;
        return $result;
    }


    public function addSY(
        $sy_year
    ) {


        $params = array(
            'school_year' => "'{$sy_year}'",
            'sy_status' => "'disable'"
        );


        $result = $this->insertData($params);

        return $result;
    }
}
