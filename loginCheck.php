<?php
include "connection.php";
$number = $_POST['number'];
$encrypted_password =  sha1($_POST['Password']);
session_id("session1");
session_start();
$_SESSION['login_error'] = 'false';

if(isset($_SESSION['U_id'])){
    header("Location: home.php");
}
else{
    $query1 = "select User_ID, Name, Mobile_number, Email from registration where Mobile_number = $number and Password = '$encrypted_password'";
    $result1 = mysqli_query($conn, $query1);
    $data1 = mysqli_fetch_assoc($result1);

    if (!empty($data1)){
        $_SESSION['U_id'] = $data1['User_ID'];
        $_SESSION['U_name'] = $data1['Name'];
        $_SESSION['U_email'] = $data1['Email'];
        $_SESSION['U_number'] = $data1['Mobile_number'];

        header("Location: OTP.php");
    }
    else{
        $_SESSION['login_error'] = 'true';
        echo "<script>location.href='login.php'</script>";
    } 
}

?>

//<?php
//         $to = "xyz@somedomain.com";
//         $subject = "This is subject";
//         
//         $message = "<b>This is HTML message.</b>";
//         $message .= "<h1>This is headline.</h1>";
//         
//         $header = "From:abc@somedomain.com \r\n";
//         $header .= "Cc:afgh@somedomain.com \r\n";
//         $header .= "MIME-Version: 1.0\r\n";
//         $header .= "Content-type: text/html\r\n";
//         
//         $retval = mail ($to,$subject,$message,$header);
//         
//         if( $retval == true ) {
//            echo "Message sent successfully...";
//         }else {
//            echo "Message could not be sent...";
//         }
//      ?>
