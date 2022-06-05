<?php
include "connection.php";
session_id("session1");
session_start();

if(isset($_SESSION['U_id']) && isset($_SESSION['logged_in'])){
  header("Location: home.php");
}
elseif($_SERVER["REQUEST_METHOD"] == "POST"){
  $number = $_POST['number'];
  $_SESSION['wrong_number'] = 'false';
  $_SESSION['email_sent'] = 'false';
  
  $query1 = "select Name, Mobile_Number, Email, Activation_Code from registration where Mobile_Number = '$number'";
  $result1 = mysqli_query($conn, $query1);
  $data1 = mysqli_fetch_assoc($result1);
  
  if (!empty($data1)){
    $baseurl='localhost/Prototype/wallet/';
    $to = $data1['Email'];
    $subject = "Forgot Password";
    
    $message = 'Dear '.$data1['Name'].',<br>';
    $message .= 'Open this link to change your password:-<br>';
    $message .= '<a href='.$baseurl.'changepw.php?activation_code='.$data1['Activation_Code'].'>Click Here</a><br>';
    $message .= "<p> Best Regards, EasyPay </p><br>";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: EasyPay Wallet<easypaywallet01@gmail.com>' . "\r\n";
    
    if(mail($to,$subject,$message,$headers)){      
      $_SESSION['email_sent'] = 'true';
    }
  }
  else{
    $_SESSION['wrong_number'] = 'true';
  }
  header("Location: forgotpw.php");
}
else{
  header("Location: forgotpw.php");
}
?>
