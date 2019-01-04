<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/workout.php';

$dbclass = new Database();
$connection = $dbclass->getConnection();

$workout = new Workout($connection);

$stmt = $workout->read();

$result= $stmt->get_result();
$count = $result->num_rows;
if($count > 0){

    $workouts = array();
    $workouts["body"] = array();
    $workouts["count"] = $count;

    while ($row = $result->fetch_assoc()){

        extract($row);

        $p  = array(
            "WorkoutID" => $WorkoutID,
            "UserID"   => $UserID,
            "SessionID" => $SessionID,
            "ExerciseID" => $ExerciseID,
            "Reps" => $Reps,
            "Weight" => $Weight,
            "RPE" => $RPE,
            "Timestamp" => $Timestamp
        );

        array_push($workouts["body"], $p);
    }
  
    echo json_encode($workouts);
} else {
    echo '{';
        echo '"message": "Unable to read database or no matches found."';
    echo '}';
}


//else {
//
    //echo json_encode(
        //array("body" => array(), "count" => 0);
    //);
//}
?>

