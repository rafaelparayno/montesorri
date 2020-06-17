<?php

class Subject
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($syid, $semid)
    {
        $result = $this->db->con->query("SELECT subject_id,subjectname,subject_units,subjectcode,subyr,coursesName,school_year,semterm 
                                        FROM `subjectstbl` LEFT JOIN schoolyear ON subjectstbl.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON subjectstbl.semid = sem.semid 
                                        LEFT JOIN courses ON subjectstbl.course_id = courses.courses_id   
                                        WHERE subjectstbl.syid = {$syid} AND subjectstbl.semid = {$semid}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataSearchFresh($syid, $semid, $courseid)
    {
        $result = $this->db->con->query("SELECT * FROM `subjectstbl` WHERE `syid` = {$syid} AND `semid` = {$semid} AND `course_id` = {$courseid} AND `subyr` = 1");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function insertData($params = null, $table = "subjectstbl")
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

    public function addSubjects(
        $subjectname,
        $subjectcode,
        $subjectyr,
        $course_id,
        $syid,
        $semid,
        $subunit
    ) {

        $params = array(
            'subjectname' => "'{$subjectname}'",
            'subjectcode' => "'{$subjectcode}'",
            'subyr' => $subjectyr,
            'course_id ' =>  $course_id,
            'syid' =>  $syid,
            'semid' => $semid,
            'subject_units' => $subunit,
        );


        $result = $this->insertData($params);

        //   return $result;
    }


    public function returnUnitsForCourse($cid, $ylvl, $semid, $syid)
    {
        $result = $this->db->con->query("SELECT * FROM `subjectstbl` WHERE `syid` = {$syid} AND `semid` = {$semid} AND `course_id` = {$cid} AND `subyr` = {$ylvl}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }


    public function editSubjects($id, $name, $code, $yr, $units)
    {

        $queryString = "UPDATE subjectstbl SET subjectname = '{$name}', subjectcode = '{$code}',
                        subject_units = {$units}, subyr = {$yr} WHERE subject_id = $id";

        $result = $this->db->con->query($queryString);
        return $result;
    }
}
