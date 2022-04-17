<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "digital_wallet";

    $conn = mysqli_connect($hostname, $username, $password, $database) OR DIE("failed to connect!");
?>