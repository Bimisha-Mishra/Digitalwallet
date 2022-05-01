<?php
include("connection.php");

session_start();
if(!isset($_SESSION['U_id'])){
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Scss/home.css?ts=<?=time()?>">
    <link rel="stylesheet" href="Scss/slidingmenu.css?ts=<?=time()?>">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Easy Pay</title>
</head>
<body>
    <section>
        <nav>
            <div class="logo-container">
                <img src="logo.png" alt="logo">
            </div>
            <div class="search-container">
                <input id= "search-bar" type="text" placeholder="Search">   
                <a href="#" class="search-icon">
                    <img src="Images/search.png">
                </a>             
            </div>
            <div class="icon-container">
                <i class="fas fa-solid fa-bell" style="color:white;"></i>
                <i class="fa-solid fa-gear"  onClick="showMenu(true,'#menu__panel1')" style="color:white;"></i>
                <i class="fa fa-bars"  onClick="showMenu(true,'#menu__panel2')" style="color:white;"></i>
            </div>
        </nav>
    </section>
    <!--nav section ends-->
    <!---->
    <section>
        <div id="menu__panel1">
            <i class="menu__close fa fa-angle-left fa-2x" onClick="showMenu(false,'#menu__panel1')"></i>
            <ul>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-house"></i>Profile</a></li>
                <li class="menu-item"><a href="logout.php"><i class="fa-solid fa-coins"></i>Logout</a></li>
            </ul>
        </div>
        <div id="menu__panel2">
            <i class="menu__close fa fa-angle-left fa-2x" onClick="showMenu(false,'#menu__panel2')"></i>
            <ul>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-house"></i>Home</a></li>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-coins"></i>Services</a></li>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-calendar-check"></i>Bookings</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-user"></i>Account</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-wallet"></i>Wallet</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-building-columns"></i>Bank Link</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-clock"></i>Transaction History</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-gift"></i>Coupon</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-hand-holding-dollar"></i>Loyalty</a></li>
            </ul>
        </div>
        
        <div class="main-container">
            <!------------------------------->
            <div class="info-panal">
                <?php
                    $user_id = $_SESSION['U_id'];
    
                    $query = "select Main_balance as mb, Bonus_balance as bb, Easy_points as ep, Total_balance as tb from balance where ID = $user_id and User_ID = $user_id";
                    $result = mysqli_query($conn, $query);
                    $data = mysqli_fetch_assoc($result);
                ?>
                <table class="balance"> 
                    <tr>
                        <th>
                            <div class="info-container">
                                <div class="title">
                                    Total Balance
                                </div>
                                <div class="amount" id = "t_balance">
                                    <span>Rs. </span><?php echo $data['tb']?>
                                </div>
                            </div> 
                            <a href="#" class="load-button">
                                Load Fund
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="balance-icon">
                                <img src="Images/wallet.png" alt="">
                            </div>
                            <div class="info-container">
                                <div class="main-balance" >
                                    Main Balance
                                </div>
                                <div class="amount" id = "m_balance">
                                    <span>Rs. </span><?php echo $data['mb']?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="balance-icon">
                                <img src="Images/coins.png" alt="">
                            </div>
                            <div class="info-container">
                                <div class="main-balance">
                                    Bonus Balance
                                </div>
                                <div class="amount" id = "b_balance">
                                    <span>Rs. </span>0
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="balance-icon">
                                <img src="Images/trophy.png" alt="">
                            </div>
                            <div class="info-container">
                                <div class="main-balance">
                                    Easy Points
                                </div>
                                <div class="amount" id = "e_points">
                                    <span>Rs. </span>0
                                </div>
                            </div>   
                        </td>
                    </tr>
                </table>
                <table class="contact">
                    <tr>
                        <th>
                            <div class="heading">Contact</div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa-solid fa-phone-volume"></i>
                            <a href='#'>01-1234567</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa-solid fa-phone-volume"></i>
                            <a href='#'>1234-12-1-1234 (Toll Free)</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa-solid fa-mobile-screen"></i>
                            <a href='#'>9876543210</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa-solid fa-envelope"></i>
                            <a href='#'>support@easypay.com</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa-solid fa-circle-question"></i>
                            <a href='#'>FAQS</a>
                        </td>
                    </tr>
                </table>
            </div>
            
     
            <div class="service-panal">    
            <?php
        $number = (int) $_SESSION['U_number'];
        $query2 = "select Sender_number, Receiver_number, Amount, Date, Purpose, Send from history where (Sender_number = $number and Send = 1) or (Receiver_number = $number and Send = 0) ";
        $result2 = mysqli_query($conn, $query2);
        $data2 = array();
        $check_rows = mysqli_num_rows($result2);
        echo $check_rows;
        echo $number;
        for($i = 0; $i<$check_rows; $i++){
          $data2[$i] = mysqli_fetch_assoc($result2);
        }
        for($i=0; $i<$check_rows; $i++){
        ?>
        <div class="single_transcation">
          <div class="icon">
          <?php
          if ($data2[$i]['Send'] = 1){
          ?>
            <i class="fa-solid fa-reply"></i>
          <?php
          }
          else{
          ?>
          <i class="fa-solid fa-share"></i>
          <?php
          }
          ?>
          </div>
          <div class="details">
            <div class="receiver_info">
              <?php
              if($data2[$i]['Send'] = 1){
                echo $data2[$i]['Receiver_number'];
              }
              else{
                echo $data2[$i]['Sender_number'];
              }
              ?>
            </div>
            <div class="transaction_date">
              <?php
                echo $data2[$i]['Date'];
              ?>
            </div>
            <div class="transaction_purpose">
              <?php
                echo $data2[$i]['Purpose'];
              ?>
            </div>
          </div>
          <div class="amount">
          <span>Rs. </span><?php echo $data2[$i]['Amount']?>
          </div>
        </div>
        <?php
        }
        ?>
            </div>
        </div>
    </section>
    
    <script src = "script/slidingmenu.js"></script>
    <script src="https://kit.fontawesome.com/91d850ff13.js" crossorigin="anonymous"></script>
</body>
</html>