<?php
  include "connection.php";
  session_start();
  if(isset($_SESSION['U_id'])){
    header("Location: MobilePay.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Scss/login.css?ts=<?=time()?>">
    <title>Login</title>
</head>
<body>
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
            <input type="text" placeholder="Phone Number" class="login-fieldset-field" name = "number" required>
            <input type="password" placeholder="******" class="login-fieldset-field" name = "password" required>
            <div class="error_php">
              <?php
                if(isset($_SESSION['login_error'])){
                    echo "<p style = 'color: red;'>Your Phone number or the password is incorrect.</p>";
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
</body>
</html>