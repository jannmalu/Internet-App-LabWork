<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','details');

    class DBConnect{
        public $conn;

        public function __construct(){
         $this->conn = new mysqli(DB_SERVER,DB_USER,DB_PASS);  
         
         if($this->conn->connect_error){
             die("Connection failed: " .$this->conn->connect_error);
         }

         mysqli_select_db($this->conn,DB_NAME);
        }

        public function closeDB(){
            $this->conn->close();
        }
    }
?>