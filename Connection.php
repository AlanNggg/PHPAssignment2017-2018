<?php
    $hostname = "127.0.0.1";
    $database = "projectDB";
    $username = "root";
    $password = "";
    $port = "8889";
    $conn = mysqli_connect($hostname, $username, $password, $database, $port);
    
    if ($conn) {
        die("Connection Failed: " . mysqli_connect_error())
    }
?>