<?php
include "connection.php";
include "connection2.php";

$number = $_POST['number'];
$amount = $_POST['amount'];
$purpose = $_POST['purpose'];

session_start();
$user_id = $_SESSION['U_id'];
$user_number = $_SESSION['U_number'];

$query = "select  r.User_ID as uid, r.Phone_number, b.Total_balance from balance b inner join registration r on r.User_ID = b.User_ID where r.Phone_number = $number";
$result = mysqli_query($conn2, $query);
$recepient = mysqli_fetch_assoc($result);


$query1 = "select b.Main_balance, r.Mobile_Number as mb from balance b inner join registration r on r.User_ID = b.User_ID where b.User_ID = $user_id and b.Main_balance >= $amount ";
$result1 = mysqli_query($conn, $query1);
$data1 = mysqli_fetch_assoc($result1);
if(!empty($recepient)){
    if (!empty($data1)){
        $query2 = "Update balance set Main_balance = (Main_balance - ($amount)), 
        Total_balance = (Main_balance + Bonus_balance + Easy_points)  WHERE id = $user_id";
        

        $query3 = "Update balance set Total_balance = (Total_balance + ($amount)) where User_ID = $recepient[uid]";
        

        $query4 = "Insert into  history ( Mobile_number, Amount, Purpose, Send) values ($number, $amount, '$purpose', true)";


        $query5 = "Insert into  history ( Mobile_number, Amount, Purpose, Send) values ($data1[mb], $amount, '$purpose', false)";
        mysqli_query($conn2, $query5);
        mysqli_query($conn, $query4);
        mysqli_query($conn2, $query3);
        mysqli_query($conn, $query2);
    }
}

?>