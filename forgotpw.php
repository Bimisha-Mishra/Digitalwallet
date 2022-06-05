<?php
include "connection.php";
session_id("session1");
session_start();
if(isset($_SESSION['U_id']) && isset($_SESSION['logged_in'])){
  header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Scss/login.css?ts=<?=time()?>">
    <link rel="stylesheet" href="Scss/navigationBar.css?ts=<?=time()?>">
    <link rel="stylesheet" href="Scss/switch.css?ts=<?=time()?>"> 
    <title>Login</title>
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
            <li><a href='Signup.php' data-item='Register'>Register</a></li>
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
        <form class="login" action = "forgotpw_email.php" method = "POST">
          <svg class="login-sides">
            <line class="top-right first" x1="50%" x2="100%" y1="0" y2="0"/>
            <line class="top-left first" x1="50%" x2="0" y1="0" y2="0"/>
            <line class="right second" x1="100%" x2="100%" y1="0" y2="100%"/>
            <line class="left second" x1="0" x2="0" y1="0" y2="100%"/> 
            <line class="bottom-left third" x1="0" x2="50%" y1="100%" y2="100%"/>
            <line class="bottom-right third" x1="100%" x2="50%" y1="100%" y2="100%"/>
          </svg>
          <div class="login-fieldset">
            <p>Enter your number to send a link to change your password.</p>
            <input type="number" placeholder="Phone Number" class="login-fieldset-field" name = "number" required>
            <div class="error_php">
              <?php
                if(isset($_SESSION['wrong_number'])  && isset($_SESSION['email_sent']) ){
                  if($_SESSION['wrong_number'] == 'true'){
                    echo "<p style = 'color: red;'>Your Phone number is incorrect.</p>";
                    $_SESSION['wrong_number'] = 'false';
                  }
                  elseif($_SESSION['email_sent'] == 'true'){
                    echo "<p style = 'color: green;'>Plese check your email for the link.</p>";
                    unset($_SESSION['email_sent']);
                  }
                  else{
                    echo "<p style = 'color: red;'>Couldn't send email to this number.</p>";
                    unset($_SESSION['email_sent']);
                  }
                }
              ?>
            </div>
            <button type="submit" class="login-fieldset-submit">
              Submit
            </button>
          </div>
        </form>
    </main>
  <script src = "script/darkmode.js"></script>
</body>
</html>