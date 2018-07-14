<?php
    $hostname = "localhost";
    $database = "projectdb";
    $username = "root";
    $password = "";
   // $port = "80";
    $conn = mysqli_connect($hostname, $username, $password, $database);
    
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }
?>