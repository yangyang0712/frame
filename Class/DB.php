<?php
require_once __DIR__ . "/../function.php";

class DB
{
    public $host;
    public $username;
    public $password;
    public $database;

    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
//        try {
//            $this->mysql = new mysqli(
//                db('mysql_server', $host),
//                db('mysql_username', $username),
//                db('mysql_password', $password),
//                db('mysql_database', $database)
//            );
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//        }
    }

    public function table($table)
    {
        return $table;
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
        $this->where = $this->adorn($data);
        return $this;
    }

    private function adorn($value)
    {
        dd($value);
        return $this;
    }
}