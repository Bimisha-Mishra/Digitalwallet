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
                <li class="menu-item"><a href='Transaction_history.php'><i class="fa-solid fa-clock"></i>Transaction History</a></li>
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
            
            <!--------------------------->
            <div class="service-panal">
                <div class="services-container">
                    
                    <div class="service-box" >
                        <a class="service-icon" href="LoadFund.php">
                            
                            <i class="fa-solid fa-wallet"></i>
                        </a>
                        <div class="service-title">Load</div>
                    </div>
                    
                    <div class="service-box">
                        <a class="service-icon" href= "Transfer.php">
                            <i class="fa-solid fa-money-bill-transfer"></i>
                        </a>
                        <div class="service-title">Transfer</div>
                    </div>
                    <div class="service-box">
                        <div class="service-icon">
                            <i class="fas fa-money-check"></i>
                        </div>
                        <div class="service-title">Remittance</div>
                    </div>
                    <div class="service-box">
                        <div class="service-icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="service-title">Bank</div>
                    </div>
                </div>
                <!-------------------------- Banner --------------------------->
                <ul class="slides">
                    <input type="radio" name="radio-btn" id="img-1" checked />
                    <li class="slide-container">
                        <div class="slide">
                            <img src="Images/banner1.jpg" />
                        </div>
                        <div class="nav">
                            <label for="img-6" class="prev">&#x2039;</label>
                            <label for="img-2" class="next">&#x203a;</label>
                        </div>
                    </li>
                    
                    <input type="radio" name="radio-btn" id="img-2" />
                    <li class="slide-container">
                        <div class="slide">
                            <img src="Images/banner2.jpg" />
                        </div>
                        <div class="nav">
                            <label for="img-1" class="prev">&#x2039;</label>
                            <label for="img-3" class="next">&#x203a;</label>
                        </div>
                    </li>
                    
                    <li class="nav-dots">
                        <label for="img-1" class="nav-dot" id="img-dot-1"></label>
                        <label for="img-2" class="nav-dot" id="img-dot-2"></label>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    
    <script src = "script/slidingmenu.js"></script>
    <script src="https://kit.fontawesome.com/91d850ff13.js" crossorigin="anonymous"></script>
</body>
</html>