<?php

class Section
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($syid, $semid)
    {
        $result = $this->db->con->query("SELECT section_id,section_yr,section_name,coursesName,school_year,semterm FROM `sections` LEFT JOIN schoolyear ON sections.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON sections.semid = sem.semid 
                                        LEFT JOIN courses ON sections.course_id = courses.courses_id 
                                        WHERE sections.syid = {$syid} AND sections.semid = {$semid}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataSearchCourse($syid, $semid, $course_id)
    {
        $result = $this->db->con->query("SELECT section_id,section_yr,section_name,coursesName,school_year,semterm FROM `sections` LEFT JOIN schoolyear ON sections.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON sections.semid = sem.semid 
                                        LEFT JOIN courses ON sections.course_id = courses.courses_id 
                                        WHERE sections.syid = {$syid} AND sections.semid = {$semid} AND sections.course_id = {$course_id} ");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataSearchYearlvl($syid, $semid, $yearlvl)
    {
        $result = $this->db->con->query("SELECT section_id,section_yr,section_name,coursesName,school_year,semterm FROM `sections` LEFT JOIN schoolyear ON sections.syid = schoolyear.sy_id 
                                        LEFT JOIN sem ON sections.semid = sem.semid 
                                        LEFT JOIN courses ON sections.course_id = courses.courses_id 
                                        WHERE sections.syid = {$syid} AND sections.semid = {$semid} AND sections.section_yr = {$yearlvl} ");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function insertData($params = null, $table = "sections")
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

    public function addSection(
        $section_name,
        $course_id,
        $syid,
        $semid,
        $sect_yr
    ) {

        $params = array(
            'section_name' => "'{$section_name}'",
            'course_id ' =>  $course_id,
            'syid' =>  $syid,
            'semid' => $semid,
            'section_yr' => $sect_yr
        );


        $result = $this->insertData($params);

        //   return $result;
    }


    public function editSection($id, $name, $yr)
    {
        $queryString = "UPDATE sections SET section_name = '{$name}', 
                        section_yr = '{$yr}' WHERE section_id = {$id}";



        $result = $this->db->con->query($queryString);
        return $result;
    }
}
