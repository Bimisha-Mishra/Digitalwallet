<?php
include "connection.php";
$number = $_POST['number'];
$encrypted_password =  sha1($_POST['password']);
session_id("session1");
session_start();
$_SESSION['login_error'] = 'false';
$_SESSION['verified'] = 'false';

if(isset($_SESSION['U_id'])){
    header("Location: home.php");
}
else{
    $query1 = "select User_ID, Name, Mobile_number, Email, Activation_Code, Verified from registration where Mobile_number = '$number' and Password = '$encrypted_password'";
    $result1 = mysqli_query($conn, $query1);
    $data1 = mysqli_fetch_assoc($result1);
    
    if (!empty($data1)){
        if($data1['Verified'] == 1){
            $_SESSION['U_id'] = $data1['User_ID'];
            $_SESSION['U_name'] = $data1['Name'];
            $_SESSION['U_email'] = $data1['Email'];
            $_SESSION['U_number'] = $data1['Mobile_number'];
            $_SESSION['verified'] = 'true';
            $_SESSION['OTP'] = rand(10000,99999);
            
            $baseurl='localhost/Prototype/wallet/';
            $to = $data1['Email'];
            $subject = "One Time Password";
            
            $message = 'Dear '.$data1['Name'].',<br>';
            $message .= 'Your One time password is:- '.$_SESSION['OTP'].'<br>';
            
            $message .= "<p> Best Regards, EasyPay </p><br>";
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: EasyPay Wallet<easypaywallet01@gmail.com>' . "\r\n";
            mail($to,$subject,$message,$headers);
            
            header("Location: OTP.php");
        }
        else{
            $baseurl='localhost/Prototype/wallet/';
            $to = $data1['Email'];
            $subject = "Email Verification";
            
            $message = 'Dear '.$data1['Name'].',<br>';
            $message .= 'Open this link to verify your email address:-<br>';
            $message .= '<a href='.$baseurl.'verificationpage.php?activation_code='.$data1['Activation_Code'].'>Click Here</a><br>';
            $message .= "<p> Best Regards, EasyPay </p><br>";
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: EasyPay Wallet<easypaywallet01@gmail.com>' . "\r\n";
            mail($to,$subject,$message,$headers);

            header("Location: login.php");
        }
        
    }
    else{
        $_SESSION['login_error'] = 'true';
        echo "<script>location.href='login.php'</script>";
    } 
}

?>
