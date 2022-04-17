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

        echo $query;

        mysqli_query($conn, $query);
        header("Location: login.php");
        die;
    }
    else{
        echo "Please enter some valid information!";
    }

?>