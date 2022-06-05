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
        <form class="login" action = "<?php echo $_SERVER['PHP_SELF'].'?activation_code='.$_GET['activation_code'];?>" method = "POST">
          <svg class="login-sides">
            <line class="top-right first" x1="50%" x2="100%" y1="0" y2="0"/>
            <line class="top-left first" x1="50%" x2="0" y1="0" y2="0"/>
            <line class="right second" x1="100%" x2="100%" y1="0" y2="100%"/>
            <line class="left second" x1="0" x2="0" y1="0" y2="100%"/> 
            <line class="bottom-left third" x1="0" x2="50%" y1="100%" y2="100%"/>
            <line class="bottom-right third" x1="100%" x2="50%" y1="100%" y2="100%"/>
          </svg>
          <div class="login-fieldset">
          <?php
        if(isset($_GET['activation_code']))
        {
            $user_activation_code=$_GET['activation_code'];
            $query="SELECT User_ID FROM registration WHERE Activation_Code= '$user_activation_code'";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result);
            
            if (empty($data)) 
            {
                echo "
                <p>There is no user to change password</p>
                <a href='Signup.php'><button type='button' class='login-fieldset-submit'>Register now</button></a>
                ";
            }
            else{
                ?>
                    <p>Enter your new password.</p>
                    <input type="password" placeholder="Password" class="login-fieldset-field" name = "Password" required>
                    <input type="password" placeholder="confirm Password" class="login-fieldset-field" name = "conform_Password" required>
                    <div class="error_php">
                      <?php
                        if(isset($_SESSION['updated']) && isset($_SESSION['match_fail']) ){
                          if($_SESSION['updated'] == 'true'){
                            echo "<p style = 'color: green;'>Your password has been updated. Try logging in.</p>";
                            $_SESSION['updated'] = 'false';
                          }
                          elseif($_SESSION['match_fail'] == 'true'){
                            echo "<p style = 'color: red;'>Your password doesnot match.</p>";
                            $_SESSION['match_fail'] = 'false';
                          }
                        }
                      ?>
                    </div>
                    <button type="submit" class="login-fieldset-submit">
                      Change Password
                    </button>
            <?php
            } 
        }
        else{
            echo "
            <p>There is no code given.</p>
            <a href='Signup.php'><button type='button' class='login-fieldset-submit'>Register now</button></a>
            ";
        }
        ?>
            
          </div>
        </form>
      </main>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = $_POST['Password'];
            $c_password = $_POST['conform_Password'];
            $_SESSION['updated'] = 'false';
            $_SESSION['match_fail'] = 'false';

            if ($password == $c_password)
            {
                $user_activation_code=$_GET['activation_code'];
                $pw=sha1($password);
                $updatequery="UPDATE registration SET password = '$pw' WHERE Activation_Code = '$user_activation_code'";
                mysqli_query($conn, $updatequery);
                $_SESSION['updated'] = 'true';
            }
            else
            {
                $_SESSION['match_fail'] = 'true';
                
            }
            header('Location:'.$_SERVER["PHP_SELF"].'?activation_code='.$_GET['activation_code']);
        }
      ?>
      
  <script src = "script/darkmode.js"></script>
</body>
</html>