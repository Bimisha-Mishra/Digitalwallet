<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Scss/navigationBar.css?ts=<?=time()?>">
    <link rel="stylesheet" href="Scss/login.css?ts=<?=time()?>">
    <link rel="stylesheet" href="Scss/OTP.css?ts=<?=time()?>"> 
    <link rel="stylesheet" href="Scss/switch.css?ts=<?=time()?>"> 
    <title>Login-OTP Verification</title>
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
                <li><a href='logout.php' data-item='Login'>Login</a></li>
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
        <form class="login" method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];?>">
          <svg class="login-sides">
            <line class="top-right first" x1="50%" x2="100%" y1="0" y2="0"/>
            <line class="top-left first" x1="50%" x2="0" y1="0" y2="0"/>
            <line class="right second" x1="100%" x2="100%" y1="0" y2="100%"/>
            <line class="left second" x1="0" x2="0" y1="0" y2="100%"/> 
            <line class="bottom-left third" x1="0" x2="50%" y1="100%" y2="100%"/>
            <line class="bottom-right third" x1="100%" x2="50%" y1="100%" y2="100%"/>
          </svg>
          <fieldset class="login-fieldset">
            <input type="number" name='ist' id='ist' maxlength="1" onkeyup="clickEvent(this,'sec')" autofocus required>
            <input type="number" name='sec' id="sec" maxlength="1" onkeyup="clickEvent(this,'third')" required>
            <input type="number" name='third' id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')" required>
            <input type="number" name='fourth' id="fourth" maxlength="1" onkeyup="clickEvent(this,'fifth')" required>
            <input type="number" name='fifth' id="fifth" maxlength="1" required>
            <div class="error_php">
                      <?php
                        if(isset($_SESSION['match_fail']) ){
                          if($_SESSION['match_fail'] == 'true'){
                            echo "<p style = 'color: red;'>Your password doesnot match.</p>";
                            $_SESSION['match_fail'] = 'false';
                          }
                        }
                      ?>
            </div>
            <button type="submit" class="login-fieldset-submit">
              Confirm
            </button>
          </fieldset>
        </form>
      </main>

      <?php
      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $check_otp = $_POST['ist'].$_POST['sec'].$_POST['third'].$_POST['fourth'].$_POST['fifth'];
            $otp = $_SESSION['OTP'];
            
            $_SESSION['match_fail'] = 'false';

            if ($check_otp == strval($otp))
            {
                $_SESSION['logged_in'] = 'true';
                header('Location: home.php');
            }
            else
            {
                $_SESSION['match_fail'] = 'true';
               echo "
               <script>
               console.log(".$_SESSION['match_fail'].");
               console.log(".$otp.");
               console.log(".$check_otp.");
               console.log(". $_SESSION['OTP'].");
               </script>
               ";
            }
        }
      ?>
    <script src = "script/OTP.js"></script>
    <script src = "script/darkmode.js"></script>
</body>
</html>