<?php
    include 'connection.php';
    $user_name = $_POST['Full_name'];
    $number = $_POST['Number'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    if (!empty($user_name) && !empty($number) && !empty($email) && !empty($password))
    {
        //save to database
        $query = "insert into registration (Name, Mobile_Number, Email, Password)
        values('$user_name', $number, '$email', '$password')";

        $query1 = "select max(User_id) as id from registration";

        $result1 = mysqli_query($conn, $query1);
         $data1 = mysqli_assoc_fetch($result1);

        $query2 = "insert into balance (Main_balance, Bonus_balance, Easy_points, Total_balance, User_id )
        values (0, 0, 0, 0, $data1[id])";


        mysqli_query($conn, $query);
       
    }
    header("Location: login.php");

?>