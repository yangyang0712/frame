<?php
require_once __DIR__ . "/../function.php";

class DB
{
    public $host;
    public $username;
    public $password;
    public $database;
    public $table = "";

    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        try {
            $this->mysql = new mysqli(
                db('mysql_server', $host),
                db('mysql_username', $username),
                db('mysql_password', $password),
                db('mysql_database', $database)
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    private function ternary($sting = "*")
    {
        return is_array($sting) ? implode(",", $sting) : $sting;
    }

    public function select(...$select)
    {
        $this->select = $this->ternary($select);
        return $this;
    }

    public function where(...$where)
    {
        $data = [];
        foreach ($where as $value) {
            $data[] = $value;
        }
        $this->where[] = $this->adorn($data);
        return $this;
    }

    private function adorn($value)
    {
        $where = "";
        $array = ["!=", ">", "<"];
        foreach ($value as $k => $item) {
            if ($k == 1) {
                if (in_array($item, $array)) {
                    $where .= $item;
                } else {
                    $where .= "=" . $item;
                }
            } else {
                $where .= $item;
            }
        }
        return $where;
    }

    public function get()
    {
        $select = isset($this->select) ? $this->select : "*";
        $where = isset($this->where) ? implode(' and ', $this->where) : 1;
        $select = "SELECT $select FROM $this->table WHERE $where";
        $this->data = mysqli_query($this->mysql, $select);
        $data = [];
        while($row = mysqli_fetch_array($this->data)){
            $data [] = $row['title'];
        }
        dd($data);
        return $this->data;
    }
}