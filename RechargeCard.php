<?php
include("connection.php");
session_id("session1");
session_start();
if(!isset($_SESSION['U_id']) && !isset($_SESSION['logged_in'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Recharge Card</title>
    <link rel="stylesheet" href="Scss/home.css?ts=<?=time()?>">
    <link rel="stylesheet" href="Scss/switch.css?ts=<?=time()?>"> 
    <link rel="stylesheet" title="recharge" href="Scss/RechargeCard.css?ts=<?=time()?>">
    <link rel="stylesheet" href="Scss/home.css?ts=<?=time()?>">
    <link rel="stylesheet" href="Scss/slidingmenu.css?ts=<?=time()?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>
    <!--nav section-->
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
    </section><!--nav section ends-->
    <section>
        <div id="menu__panel1">
            <i class="menu__close fa fa-angle-left fa-2x" onClick="showMenu(false,'#menu__panel1')"></i>
            <ul>
                <li class="menu-item 1"><a href="#">Profile</a></li>
                <li class="menu-item 1">
                    <a>
                        <label for="">Dark Mode</label>
                        <label class="switch" >
                            <input id = "check" type="checkbox" onclick="dark_mode_status()">
                            <span class="slider round"></span>
                        </label>
                    </a>
                </li>
                <li class="menu-item 1"><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div id="menu__panel2">
            <i class="menu__close fa fa-angle-left fa-2x" onClick="showMenu(false,'#menu__panel2')"></i>
            <ul>
                <li class="menu-item"><a href="home.php"><i class="fa-solid fa-house"></i>Home</a></li>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-coins"></i>Services</a></li>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-calendar-check"></i>Bookings</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-user"></i>Account</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-wallet"></i>Wallet</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-building-columns"></i>Bank Link</a></li>
                <li class="menu-item"><a href='Transaction_history.php'><i class="fa-solid fa-clock"></i>Transaction History</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-gift"></i>Coupon</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-hand-holding-dollar"></i>Loyalty</a></li>
            </ul>
        </div>
        <div id="menu_panel_curtain" onClick="showMenu(false,'#menu__panel1'),showMenu(false,'#menu__panel2')"></div>

        <div  class="main-container">
            <!--side-menu ends-->
            <!----------------------------------------------------------------------------------------------------------------->
            <!--info-panal-->
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
                                <div class="amount">
                                    <span>Rs. </span><?php echo $data['tb']?>
                                </div>
                            </div> 
                            <a class="load-button" href = "LoadFund.php">
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
                                <div class="main-balance">
                                    Main Balance
                                </div>
                                <div class="amount">
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
                                <div class="amount">
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
                                <div class="amount">
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
            <!------------------------------------------------------------------------------------------>
            <!--main section-->
            <div class="service-panal">
                <form method="POST" action = "RCardLoad.php">
                    <div class="segment">
                        <h1>Card Transfer</h1>
                    </div>
                    
                    <label class="label">
                        <input type="tel" placeholder="Card Number" name = "card_number" required/>
                    </label>
                    <div class="error_php">
                        <?php
                        if(isset($_SESSION['card_accepted']) && isset($_SESSION['card_used']) && isset($_SESSION['card_not_found'])){
                            if($_SESSION['card_accepted'] == 'true'){
                                echo "<p style = 'color: green;'>This card has been accepted.</p>";
                                $_SESSION['card_accepted'] = 'false';
                            }
                            if($_SESSION['card_used'] == 'true'){
                                echo "<p style = 'color: red;'>This card has been used already.</p>";
                                $_SESSION['card_used'] = 'false';
                            }
                            elseif($_SESSION['card_not_found'] == 'true'){
                                echo "<p style = 'color: red;'>This card number is incorrect.</p>";
                                $_SESSION['card_not_found'] = 'false';
                            }
                        }
                        ?>
                    </div>
                    <!-- <label>
                        <input type="number" placeholder="Amount"/>
                    </label> -->
                    <div class="cardForm-buttons">
                        <button class="card-button" type="submit"> Load </button>
                        <button class="card-button" type="button">Cancel </button>
                    </div>
                </form>
            </div>
        </div>
    </section> <!--main-service section-->
    <?php
        unset($_SESSION['card_used']);
    ?>
    
    <script src = "script/darkmode.js"></script>
    <script src = "script/slidingmenu.js"></script>
    <script src="https://kit.fontawesome.com/91d850ff13.js" crossorigin="anonymous"></script>
</body>
</html>
