<?php
include "connection.php";
$number = $_POST['number'];
$password = $_POST['password'];

session_start();

if(isset($_SESSION['U_id'])){
    header("Location: home.php");
}
else{
    $query1 = "select User_ID, Name, Phone_number from registration where Phone_number = $number and Password = '$password'";
    $result1 = mysqli_query($conn, $query1);
    $data1 = mysqli_fetch_assoc($result1);

    if (empty ($data1)){
        $_SESSION['login_error'] = 'true';
        echo "<script>location.href='login.php'</script>";

    }
    else{
        $_SESSION['U_id'] = $data1['User_ID'];
        $_SESSION['U_name'] = $data1['Name'];
        $_SESSION['U_number'] = $data1['Phone_number'];

        header("Location: MobilePay.php"); 
    } 
}

?>