<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "mobilepay";

    $conn = mysqli_connect($hostname, $username, $password, $database) OR DIE("failed to connect!");
?>