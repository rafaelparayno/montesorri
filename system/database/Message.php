<?php


class Message
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($table = 'message')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataRawQuery($sql)
    {
        $result = $this->db->con->query($sql);

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
        //   SELECT * FROM `message` WHERE sno NOT in (SELECT acc_id FROM users)
    }



    public function deleteData($condition, $key)
    {
        $result = $this->db->con->query("DELETE FROM message WHERE {$condition} = '{$key}' ");

        return $result;
    }


    public function getDatabySearching($condtion, $searchKey)
    {
        $result = $this->db->con->query("SELECT * FROM message WHERE {$condtion} = '{$searchKey}' ");



        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function insertData($params = null, $table = "message")
    {
        if ($this->db->con != null) {
            if ($params != null) {

                $columns = implode(',', array_keys($params));
                // print_r($columns);
                $values = implode(',', array_values($params));
                //   print_r($values);

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                // echo $query_string;
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    public function addMessage($message, $subject, $sender, $receive, $attch)
    {
        $params = array(
            'subject' => "'{$subject}'",
            'message' => "'{$message}'",
            'sender_id' => "'{$sender}'",
            'receiver_id ' =>  "'{$receive}'",
            'attach' => "'{$attch}'"
        );

        $this->insertData($params);
    }
}
