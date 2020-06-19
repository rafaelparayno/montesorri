<?php

class StudentGrade
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($syid, $semid, $sno)
    {
        $result = $this->db->con->query("SELECT personaldata.sno,Concat(firstname,' ',lastname) AS 'StudentName',
                                        sections.section_name,subjectstbl.subjectname,
                                        subject_units,subjectstbl.subject_id,
                                        prelim,midterm,finals FROM `personaldata` 
                                        LEFT JOIN studentsinfo ON personaldata.sno = studentsinfo.sno
                                        LEFT JOIN sections on sections.section_id = studentsinfo.sect_enrolled
                                        LEFT JOIN subjectstbl ON subjectstbl.course_id 
                                        AND subjectstbl.subyr = studentsinfo.year_level
                                        LEFT JOIN studentgrades ON studentgrades.sno = personaldata.sno
                                        AND studentgrades.subject_id = subjectstbl.subject_id
                                        WHERE personaldata.sno = '{$sno}' AND subjectstbl.semid = {$semid}
                                        AND subjectstbl.syid = {$syid}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }


    public function getData2($sno)
    {
        $result = $this->db->con->query("SELECT personaldata.sno,Concat(firstname,' ',lastname) AS 'StudentName',
                                        sections.section_name,subjectstbl.subjectname,
                                        subject_units,subjectstbl.subject_id,
                                        prelim,midterm,finals FROM `personaldata` 
                                        LEFT JOIN studentsinfo ON personaldata.sno = studentsinfo.sno
                                        LEFT JOIN sections on sections.section_id = studentsinfo.sect_enrolled
                                        LEFT JOIN subjectstbl ON subjectstbl.course_id 
                                        LEFT JOIN studentgrades ON studentgrades.sno = personaldata.sno
                                        AND studentgrades.subject_id = subjectstbl.subject_id
                                        WHERE personaldata.sno = '{$sno}'");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataAddingGrade($subjectid, $sno)
    {
        $result = $this->db->con->query("SELECT personaldata.sno,Concat(firstname,' ',lastname) AS 'StudentName',
                                        sections.section_name,subjectstbl.subjectname,
                                        subject_units,subjectstbl.subject_id,
                                        prelim,midterm,finals FROM `personaldata` 
                                        LEFT JOIN studentsinfo ON personaldata.sno = studentsinfo.sno
                                        LEFT JOIN sections on sections.section_id = studentsinfo.sect_enrolled
                                        LEFT JOIN subjectstbl ON subjectstbl.course_id 
                                        AND subjectstbl.subyr = studentsinfo.year_level
                                        LEFT JOIN studentgrades ON studentgrades.sno = personaldata.sno
                                        AND studentgrades.subject_id = subjectstbl.subject_id
                                        WHERE personaldata.sno = '{$sno}' AND subjectstbl.subject_id = {$subjectid}");



        $grades = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $grades;
    }



    public function insertData($params = null, $table = "studentgrades")
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

    public function addSubjectGrades(
        $sno,
        $prelim,
        $midterm,
        $finals,
        $subjectid
    ) {

        $params = array(
            'sno' => "'{$sno}'",
            'prelim' => $prelim,
            'midterm' => $midterm,
            'finals ' =>  $finals,
            'subject_id' =>  $subjectid

        );

        $isEmpty = $this->HasAlreadyGrade($sno, $subjectid);
        if ($isEmpty) {
            $result = $this->insertData($params);
        } else {
            $this->editGrade(
                $sno,
                $prelim,
                $midterm,
                $finals,
                $subjectid
            );
        }
    }

    public function editGrade(
        $sno,
        $prelim,
        $midterm,
        $finals,
        $subjectid
    ) {

        $queryString = "UPDATE studentgrades SET prelim = {$prelim} , midterm = {$midterm},
                    finals = {$finals} WHERE sno = '{$sno}' AND subject_id = {$subjectid}";

        $result = $this->db->con->query($queryString);
        //echo $sql;
        return $result;
    }
    public function HasAlreadyGrade($sno, $subid)
    {
        $queryString = "SELECT * FROM studentgrades WHERE sno = '{$sno}' AND subject_id = {$subid}";

        $result =  $this->db->con->query($queryString);

        $row = mysqli_num_rows($result);

        if ($row > 0) {
            return false;
        } else {
            return true;
        }
    }
}
