<?php 
$dbConnection = new PDO('mysql:dbname=planning_system;host=localhost;charset=utf8', 'root', '');
$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>