<?php
include 'connection.php';
session_id("session3");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $depoBy_name = $_POST['depoBy_name'];
    $depoBy_number = $_POST['depoBy_number'];
    $depoTo_name = $_POST['userName'];
    $depoTo_number = $_POST['userNumber'];
    $tot_ammount = $_POST['tot_ammount'];
    
    $_SESSION['empty_amount'] = 'false';
    $_SESSION['accepted'] = 'false';
    $_SESSION['no_recep'] = 'false';
    $_SESSION['wrong_name'] = 'true';
    
    if(!(intval($tot_ammount) > 0)){
        $_SESSION['empty_amount'] = 'true';
        header("Location: Voucher.php");
    }
    
    $query = "select User_ID, Name, Mobile_Number from registration where Mobile_Number = $depoTo_number";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    
    if(!empty($data)) {
        if($data['Name'] == $depoTo_name){
            
            $query2 = "Update balance set Main_balance = (Main_balance + ($tot_ammount)), 
            Total_balance = (Main_balance + Bonus_balance + Easy_points)  WHERE User_ID = $data[User_ID]";
            
            $query3 = "Insert into  history ( Sender_number, Receiver_number, Amount, Purpose, Send) values ( 9999999999, $depoTo_number, ($tot_ammount), '{$depoBy_name}, {$depoBy_number}' , false)";
            
            $result3 = mysqli_query($conn, $query3);
            $result2 = mysqli_query($conn, $query2);
            
            $_SESSION['accepted'] = 'true';
            header("Location: Voucher.php");
        }
        else{
            $_SESSION['wrong_name'] = 'true';
            header("Location: Voucher.php");
        }
    }
    else{
        $_SESSION['no_recep'] = 'true';
        header("Location: Voucher.php");
    }
}
?>