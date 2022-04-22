<?php
    include 'connection.php';
    $card_number = $_POST['card_number'];
    
    $query = "select Value from recharge_card where id = $card_number and Used = 0";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    if(!empty($query)) 
    {
        $query2 = "Update balance set Main_balance = (Main_balance + ($data[Value])),
                                Total_balance = (Main_balance + Bonus_balance + Easy_points)  WHERE id = 1";
        
        $result2 = mysqli_query($conn, $query2);
                     
        $query3 = "Update recharge_card set Used = 1 where id = $card_number";

        $result3 = mysqli_query($conn, $query3);
    }

    header("Location: RechargeCard.php");


       

?>