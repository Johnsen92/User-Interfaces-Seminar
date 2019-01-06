<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/exercise.php';

$dbclass = new Database();
$connection = $dbclass->getConnection();

$exercise = new Exercise($connection);

$stmt = $exercise->read();

$result= $stmt->get_result();
$count = $result->num_rows;
if($count > 0){

    $exercises = array();
    $exercises["body"] = array();
    $exercises["count"] = $count;

    while ($row = $result->fetch_assoc()){

        extract($row);

        $p  = array(
            "ExerciseID" => $ExerciseID,
            "UserID"   => $UserID,
            "ExerciseName" => $ExerciseName,
            "ExerciseType" => $ExerciseType
        );

        array_push($exercises["body"], $p);
    }
  
    echo json_encode($exercises);
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

