<?php
//database_connection.php
try {
$connect = new PDO("mysql:host=localhost;dbname=proyecto", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
?>


