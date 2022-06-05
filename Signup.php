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
    <form class="login" action = "registration.php" method = "POST">
      <svg class="login-sides">
        <line class="top-right first" x1="50%" x2="100%" y1="0" y2="0"/>
        <line class="top-left first" x1="50%" x2="0" y1="0" y2="0"/>
        <line class="right second" x1="100%" x2="100%" y1="0" y2="100%"/>
        <line class="left second" x1="0" x2="0" y1="0" y2="100%"/> 
        <line class="bottom-left third" x1="0" x2="50%" y1="100%" y2="100%"/>
        <line class="bottom-right third" x1="100%" x2="50%" y1="100%" y2="100%"/>
      </svg>
      <fieldset class="login-fieldset">
        <input type="text" placeholder="Full Name" class="login-fieldset-field" name = "Full_name"required>  
        <input type="number" placeholder="Phone Number" class="login-fieldset-field" name = "Number" required>
        <input type="text" placeholder="Email" class="login-fieldset-field" name = "Email"  required>
        <input type="password" placeholder="Password" class="login-fieldset-field" name = "Password" required>
        <input type="password" placeholder="confirm Password" class="login-fieldset-field" name = "conform_Password" required>
        <div class="error_php">
          <?php
          if(isset($_SESSION['number_exists']) && isset($_SESSION['email_exists']) && isset($_SESSION['conformation_failed']) && isset($_SESSION['match_fail'])  && isset($_SESSION['registered'])){
              if($_SESSION['number_exists'] == 'true'){
                  echo "<p style = 'color: red; font-size: medium;'>The Mobile number already exists and cannot be registered.</p>";
                  $_SESSION['number_exists'] = 'false';
              }
              elseif($_SESSION['email_exists'] == 'true'){
                  echo "<p style = 'color: red; font-size: medium;'>The email already exists and cannot be registered.</p>";
                  $_SESSION['email_exists'] = 'false';
              }
              elseif($_SESSION['conformation_failed'] == 'true'){
                  echo "<p style = 'color: red; font-size: medium;'>Verification code could not be sent to this email.</p>";
                  $_SESSION['conformation_failed'] = 'false';
              }
              elseif($_SESSION['match_fail'] == 'true'){
                  echo "<p style = 'color: red; font-size: medium;'>The password doesnot match.</p>";
                  $_SESSION['match_fail'] = 'false';
              }
              elseif($_SESSION['registered'] == 'true'){
                echo "<p style = 'color: green; font-size: medium;'>Account has been registered.</p>";
                $_SESSION['registered'] = 'false';
              }
          }
          ?>
        </div>
        <button type="submit" class="login-fieldset-submit">
          Register
        </button>
      </fieldset>
    </form>
  </main>
  <script src = "script/darkmode.js"></script>
</body>
</html>