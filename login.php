<?php
include "connection.php";
session_id("session1");
session_start();
if(isset($_SESSION['U_id'])){
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
        <form class="login" action = "loginCheck.php" method = "POST">
          <svg class="login-sides">
            <line class="top-right first" x1="50%" x2="100%" y1="0" y2="0"/>
            <line class="top-left first" x1="50%" x2="0" y1="0" y2="0"/>
            <line class="right second" x1="100%" x2="100%" y1="0" y2="100%"/>
            <line class="left second" x1="0" x2="0" y1="0" y2="100%"/> 
            <line class="bottom-left third" x1="0" x2="50%" y1="100%" y2="100%"/>
            <line class="bottom-right third" x1="100%" x2="50%" y1="100%" y2="100%"/>
          </svg>
          <div class="login-fieldset">
            <input type="number" placeholder="Phone Number" class="login-fieldset-field" name = "number" required>
            <input type="password" placeholder="******" class="login-fieldset-field" name = "password" required>
            <div class="error_php">
              <?php
                if(isset($_SESSION['login_error'])){
                  if($_SESSION['login_error'] == 'true'){
                    echo "<p style = 'color: red; font-size: medium;'>Your Phone number or the password is incorrect.</p>";
                    $_SESSION['login_error'] = 'false';
                  }
                }
              ?>
            </div>
            <button type="submit" class="login-fieldset-submit">
              Login
            </button>
          </div>
        </form>
      </main>
      <?php
        unset($_SESSION['login_error']);
      ?>
      
  <script src = "script/darkmode.js"></script>
</body>
</html>