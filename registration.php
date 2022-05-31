<?php
include 'connection.php';
session_id("session1");
session_start();
$user_name = $_POST['Full_name'];
$user_number = $_POST['Number'];
$uesr_email = $_POST['Email'];
$password = $_POST['Password'];
$c_password = $_POST['conform_Password'];
$encrypted_password =  sha1($_POST['Password']);
$user_activation_code;

$_SESSION['number_exists'] = 'false';
$_SESSION['email_exists'] = 'false';
$_SESSION['registered'] = 'false';
$_SESSION['conformation_failed'] = 'false';
$_SESSION['match_fail'] = 'false';



if ($password == $c_password)
{
  $check_valid_number = "SELECT Mobile_Number FROM registration WHERE Mobile_Number = $user_number";
  $result = mysqli_query($conn, $check_valid_number);
  $number = mysqli_fetch_assoc($result);
  
  $check_valid_email = "SELECT Email FROM registration WHERE Email = '$uesr_email'";
  $result = mysqli_query($conn, $check_valid_email);
  $email = mysqli_fetch_assoc($result);
  
  if (!empty($number)) {
    $_SESSION['number_exists'] = 'true';
    header("Location: Signup.php");
  }
  elseif (!empty($email)) {
    $_SESSION['email_exists'] = 'true';
    header("Location: Signup.php");
  }
  else{
    do {
      $user_activation_code = sha1(rand());
      $check_valid_code = "SELECT Activation_Code FROM registration WHERE Activation_Code = '$user_activation_code'";
      $result = mysqli_query($conn, $check_valid_code);
      $code = mysqli_fetch_assoc($result);
    } while (!empty($code));
    
    $baseurl='localhost/Prototype%20Bim/wallet/';
    $to = $uesr_email;
    $subject = "Email Verification";
    
    $message = 'Dear '.$user_name.',<br>';
    $message .= 'Open this link to verify your email address:-<br>';
    $message .= $baseurl.'verificationpage.php?activation_code='.$user_activation_code.'<br>';
    $message .= "<p> Best Regards, EasyPay </p><br>";
    
    // // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // $header = "From: broshan18@tbc.edu.np";
    //         $header .= "MIME-Version: 1.0" . "\r\n";
    //         $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    // // More headers
    $headers .= 'From: EasyPay Wallet<easypaywallet01@gmail.com>' . "\r\n";
    // $headers .= 'Cc: myboss@example.com' . "\r\n";
    if(mail($uesr_email,$subject,$message,$headers)){
      //save to database
      $query = "insert into registration (Name, Mobile_Number, Email, Password, Activation_Code, Verified )
      values('$user_name', '$user_number', '$uesr_email', '$encrypted_password', '$user_activation_code', false)";
      mysqli_query($conn, $query);
      
      $query1 = "select max(User_id) as id from registration";
      $result1 = mysqli_query($conn, $query1);
      $data1 = mysqli_fetch_assoc($result1);
      
      $query2 = "insert into balance (Main_balance, Bonus_balance, Easy_points, Total_balance, User_id )
      values (0, 0, 0, 0, $data1[id])";
      mysqli_query($conn, $query2);
      $_SESSION['registered'] = 'true';
      header("Location: login.php");
    }
    else{
      $_SESSION['conformation_failed'] = 'true';
      header("Location: Signup.php");
    }
  }  
}
else
{
  $_SESSION['match_fail'] = 'true';
  header("Location: Signup.php");
}

?>