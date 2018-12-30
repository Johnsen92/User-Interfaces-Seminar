<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/device.php';

$dbclass = new Database();
$connection = $dbclass->getConnection();

$device = new Device($connection);

$stmt = $device->read();

$result= $stmt->get_result();
$count = $result->num_rows;
if($count > 0){


    $devices = array();
    $devices["body"] = array();
    $devices["count"] = $count;

    while ($row = $result->fetch_assoc()){

        extract($row);

        $p  = array(
            "DeviceID" => $DeviceID,
            "Location" => $Location,
            "UserID"   => $UserID
        );

        array_push($devices["body"], $p);
    }
  
    echo json_encode($devices);
}

//else {
//
    //echo json_encode(
        //array("body" => array(), "count" => 0);
    //);
//}
?>
