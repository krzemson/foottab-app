<?php

namespace TableFootball;

use mysqli;

class Database
{
    public $connection;
    public $db;
    
    public function __construct()
    {
        $this->db = $this->openDbConnection();
    }

    /**
     * @return mysqli
     */
    public function openDbConnection()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->connection->connect_errno) {
            die("Database connection failed". $this->connection->connect_error);
        }
        return $this->connection;
    }

    /**
     * @param $sql
     * @return bool|\mysqli_result
     */
    public function query($sql)
    {
        $result = $this->db->query($sql);
        
        $this->confirmQuery($result);
        
        return $result;
    }

    /**
     * @param $result
     */
    private function confirmQuery($result)
    {
        if (!$result) {
            die("QUERY FAILED". $this->db->error);
        }
    }
}
