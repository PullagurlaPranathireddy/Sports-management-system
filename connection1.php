<?php

define('DB_HOST','localhost');
define('DB_USER','views');
define('DB_PASS','123');
define('DB_NAME','sports');
// Establish database connection.

$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $stmnt = $conn->prepare("SELECT * FROM sports_events");
        $stmnt->execute();

        $num = $stmnt->rowCount();

?>
