<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "inventaire";
    $conn = new mysqli($host , $user, $pass, $dbname);
    if($conn->connect_error){
        die("Database Error : " . $conn->connect_error);
    }
?>