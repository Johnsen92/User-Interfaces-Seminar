<?php
class Device{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "Device";

    // table columns
    public $DeviceID;
    public $Location;
    public $UserID;

    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create(){
        //$query = "INSERT INTO " . $this->table_name . "(Location, UserID) VALUES (" . $this->Location . " " . $this->UserID . ")";
        $query = "INSERT INTO " . $this->table_name . " (Location, UserID) VALUES (?, ?)";
        $stmt = $this->connection->prepare($query);
        if ($stmt == false) {
            die(PHP_EOL."error");
        }

        $stmt->bind_param("si", $this->Location, $this->UserID);

        return $stmt->execute();
        
    }
    //R
    public function read(){
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}