<?php
include "connection.php";
session_id("session1");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Scss/login.css">
  <link rel="stylesheet" href="Scss/navigationBar.css">
  <link rel="stylesheet" href="Scss/switch.css"> 
  <title>Login</title>
  <style>
    .main {
      margin-top: 8vh;
    }
  </style>
</head>
<body>
  <section>
    <nav>
      <img src="logo.png" alt="logo">
      <ul class="menuItems">
        <li><a href='home.html' data-item='Home'>Home</a></li>
        <li><a href='About.html' data-item='About'>About</a></li>
        <li><a href='#' data-item='Services'>Services</a></li>
        <li><a href='#' data-item='Contact'>Contact</a></li>
        <li><a href='login.php' data-item='Login'>Login</a></li>
        <li>
          <a>
            <label class="switch" >
                <input id = "check" type="checkbox" onclick="dark_mode_status()">
                <span class="slider round"></span>
            </label>
          </a>
        </li>
      </ul>
    </nav>
  </section>
  <main class="main">
    <a class="button-twitter" href="#" target="_blank"></a>
    <div class="login">
      <svg class="login-sides">
        <line class="top-right first" x1="50%" x2="100%" y1="0" y2="0"/>
        <line class="top-left first" x1="50%" x2="0" y1="0" y2="0"/>
        <line class="right second" x1="100%" x2="100%" y1="0" y2="100%"/>
        <line class="left second" x1="0" x2="0" y1="0" y2="100%"/> 
        <line class="bottom-left third" x1="0" x2="50%" y1="100%" y2="100%"/>
        <line class="bottom-right third" x1="100%" x2="50%" y1="100%" y2="100%"/>
      </svg>
      <fieldset class="login-fieldset">
        <h2>Account Verification</h2>
        <?php
        if(isset($_GET['activation_code']))
        {
            $user_activation_code=$_GET['activation_code'];
            $query="SELECT User_ID, Name, Verified FROM registration WHERE Activation_Code= '$user_activation_code'";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result);
            
            if (empty($data)) 
            {
                //no user to verify
                echo "
                <p>There is no user to Verify</p>
                <a href='Signup.php'><button type='button' class='login-fieldset-submit'>Register now</button></a>
                ";
                
            }
            else{
                if ($data['Verified'] == 1) {
                    //user already verified
                    echo "
                    <p>Hello, $data[Name]</p>
                    <p>Welcome to EasyPay, You are already verified.</p>
                    <a href='login.php'><button type='button' class='login-fieldset-submit'>Login now</button></a>
                    ";
                }
                else{
                    $updatequery="UPDATE registration SET Verified=true WHERE User_ID=$data[User_ID]";
                    mysqli_query($conn, $updatequery);
                    echo "
                    <p>Hello, $data[Name]</p>
                    <p>Welcome to EasyPay</p>
                    <a href='login.php'><button type='button' class='login-fieldset-submit'>Login now</button></a>
                    ";
                }
            } 
        }
        else{
            echo "
            <p>There is no code given.</p>
            <a href='Signup.php'><button type='button' class='login-fieldset-submit'>Register now</button></a>
            ";
        }
        ?>
      </fieldset>
    </div>
  </main>
  <script src = "script/darkmode.js"></script>
</body>
</html>

