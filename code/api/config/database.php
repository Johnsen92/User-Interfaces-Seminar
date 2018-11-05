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
 
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

            if ($this->conn->connect_error) {
                die("Connection failed:" . $this->conn->connect_error);
            }
 
        return $this->conn;
    }


}
?>