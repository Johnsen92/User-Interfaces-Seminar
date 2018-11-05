<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';

include_once '../objects/device.php';

$dbclass = new Database();
$connection = $dbclass->getConnection();

$device = new Device($connection);

$data = json_decode(file_get_contents("php://input"));

$device->Location = $data->Location;
$device->UserID = $data->UserID;

if($device->create()){
    echo '{';
        echo '"message": "Product was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create product."';
    echo '}';
}
?>