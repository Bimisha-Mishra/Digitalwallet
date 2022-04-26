<?php
    include 'connection.php';
    $user_id = $_SESSION['U_id'];
    
    $query = "select Main_balance as mb, Bonus_balance as bb, Easy_points as ep, Total_balance as tb from balance where ID = $user_id and User_ID = $user_id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    if(!empty($data)) 
    {
       
    }
    else{
        echo '<script>alert("This card has been used already.")</script>';
    }
?>