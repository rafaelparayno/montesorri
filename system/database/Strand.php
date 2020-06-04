<?php


class Strand
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM strand");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDatabySearching($condtion, $searchKey)
    {
        $result = $this->db->con->query("SELECT * FROM strand WHERE {$condtion} = '{$searchKey}' ");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);



        return $result;
    }

    public function insertData($params = null, $table = "strand")
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

    public function addStrand(
        $strand,
        $code
    ) {

        $params = array(
            'strand_name' => "'{$strand}'",
            'strandcode ' => "'{$code}'",

        );


        $result = $this->insertData($params);

        //   return $result;
    }
}
