<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.1/vue-router.common.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
</head>
<body>
<h1>Great Test!</h1>
<?php
    include_once 'api/config/database.php';
    $database = new Database();
    $db = $database->getConnection();

    $listdbtables = array_column(mysqli_fetch_all($db->query('SHOW TABLES FROM business_db')),0);
    var_dump($listdbtables);
?>
</body>
</html>