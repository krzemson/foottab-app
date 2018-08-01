<?php

require_once("config.php");

class Database
{

    public $connection;
    public $db;
    
    __construct() {
        $this->db = $this->open_db_connection();
    }
    
    public function open_db_connection() {
        
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if($this->$connection->connect_errno()){
            
            die("Database connection failed". $this->connection->connect_error);
            
        }
        
        return $this->connection;
    }
    
    public function query($sql) {
        $result = $this->db->query($sql);
        
        $this->confirm_query($result);
        
        return $result;
    }
    
    private function confirm_query($result){
        if(!result){
            die("QUERY FAILED". $this->db->error);
        }
    }
    
    
    
}

$database = new Database();