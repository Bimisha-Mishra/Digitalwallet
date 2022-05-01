<?php
    include 'connection.php';
    $user_name = $_POST['Full_name'];
    $number = $_POST['Number'];
    $password = $_POST['Password'];

    if (!empty($user_name) && !empty($number) && !empty($password))
    {
        //save to database
        $query = "insert into registration (Name, Phone_number, Password)
        values('$user_name', $number, '$password')";

        mysqli_query($conn, $query);

        $query1 = "select max(User_id) as id from registration";

        $result1 = mysqli_query($conn, $query1);
         $data1 = mysqli_fetch_assoc($result1);

        $query2 = "insert into balance (Total_balance, User_ID )
        values (0, $data1[id])";


        mysqli_query($conn, $query2);
       
    }
    header("Location: login.php");

?>