<?php
class Workout {

    // Connection instance
    private $connection;

    // table name
    private $table_name = "workoutlog";

    // table columns
    public $WorkoutID;
    public $UserID;
    public $SessionID;
    public $ExerciseID;
    public $Reps;
    public $Weight;
    public $RPE;
    public $Timestamp;

    public $errorMessage = "Empty";

    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create(){
        //$query = "INSERT INTO " . $this->table_name . "(Location, UserID) VALUES (" . $this->Location . " " . $this->UserID . ")";
        $query = "INSERT INTO " . $this->table_name . "(UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES (?, ?, ?, ?, ? ,?, ?)";
        $stmt = $this->connection->prepare($query);
        $this->errorMessage = $this->connection->errno;
        if ($stmt == false) {
            die(PHP_EOL."error");
        }
        $this->errorMessage = $this->connection->errno;

        $stmt->bind_param("iiiidii", $this->UserID, $this->SessionID, $this->ExerciseID, $this->Reps, $this->Weight, $this->RPE, $this->Timestamp);
        $this->errorMessage = $this->connection->errno;
        
        $return = $stmt->execute();
        $this->errorMessage = $stmt->errno;
        return $return; 
        
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