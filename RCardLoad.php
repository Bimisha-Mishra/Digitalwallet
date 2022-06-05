<?php
include 'connection.php';
session_id("session1");
session_start();
if(!isset($_SESSION['U_id']) && !isset($_SESSION['logged_in'])){
    header("Location: login.php");
}
elseif($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['U_id'];
    $user_number = $_SESSION['U_number'];
    $card_number = $_POST['card_number'];
    $_SESSION['card_accepted'] = 'false';
    $_SESSION['card_used'] = 'false';
    $_SESSION['card_not_found'] = 'false';
    
    $query = "select Value, Used from recharge_card where id = $card_number";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    
    if(!empty($data)) 
    {
        if($data['Used'] == 0){
            $query2 = "Update balance set Main_balance = (Main_balance + ($data[Value])), 
            Total_balance = (Main_balance + Bonus_balance + Easy_points)  WHERE id = $user_id";
            
            $query3 = "Update recharge_card set Used = 1 where id = $card_number";        
            
            $query4 = "Insert into  history ( Sender_number, Receiver_number, Amount, Purpose, Send) values ( $card_number, $user_number, $data[Value], 'Recharge Card', false)";
            mysqli_query($conn, $query4);
            $result3 = mysqli_query($conn, $query3);
            $result2 = mysqli_query($conn, $query2);
            
            $_SESSION['card_accepted'] = 'true';
        }
        else{
            $_SESSION['card_used'] = 'true';
        }
    }
    else{
        $_SESSION['card_not_found'] = 'true';
    }
    header("Location: RechargeCard.php");
}
else{
    header("Location: RechargeCard.php");
}
?>