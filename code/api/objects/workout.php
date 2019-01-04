<?php
class Workout {

    // Connection instance
    private $connection;

    // table name
    private $table_name = "Workoutlog";

    // table columns
    public $WorkoutID;
    public $UserID;
    public $SessionID;
    public $ExerciseID;
    public $Reps;
    public $Weight;
    public $RPE;
    public $Timestamp;

    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create(){
        //$query = "INSERT INTO " . $this->table_name . "(Location, UserID) VALUES (" . $this->Location . " " . $this->UserID . ")";
        $query = "INSERT INTO " . $this->table_name . "(UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES (?, ?, ?, ?, ? ,?, ?)";
        $stmt = $this->connection->prepare($query);
        if ($stmt == false) {
            die(PHP_EOL."error");
        }

        $stmt->bind_param("iiiiiis", $this->UserID, $this->SessionID, $this->ExerciseID, $this->Reps, $this->Weight, $this->RPE, $this->Timestamp);

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