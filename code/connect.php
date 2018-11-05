<?php
$host = 'mysql';
$user = "test";
$pass = "test";
$db_name = 'business_db';
 
//$conn = mysqli_connect($host, $user, $pass, $db_name);
$conn = new mysqli($host, $user, $pass, $db_name);
if (!$conn) {
    exit('Connection failed: '.mysqli_connect_error().PHP_EOL);
}
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

$listdbtables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES FROM business_db')),0);
var_dump($listdbtables);
$result = $conn->query("SHOW TABLES from ".$db_name);
$tableName = $result->num_rows;
echo 'TableName: ' .$tableName.PHP_EOL;
echo 'Successful database connection!'.PHP_EOL;
?>