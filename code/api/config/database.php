<?php
class Database{
 
    // specify your own database credentials
    private $host = 'mysql';
    private $db_name = 'business_db';
    private $username = "test";
    private $password = "test";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
            //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            //$this->conn = new mysqli($host, $username, $password);
            $this->conn = mysqli_connect($host, $username, $password);

            if ($this->conn->connect_error) {
                die("Connection failed:" . $this->conn->connect_error);
            }
            echo "connect success";
 
        return $this->conn;
    }
}
?>