<?php
session_start();
include("connection.php");
//$user_data = check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Scss/home.css">
    <link rel="stylesheet" href="Scss/slidingmenu.css">
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
                <i class="fas fa-solid fa-bell"></i>
                <i class="fa-solid fa-gear"></i>
            </div>
        </nav>
    </section>
    <!--nav section ends-->
    <!---->
    <section class="main-container">
        <div class="wrapper">
            <aside class="closed" id="sidebar">
                <ul>
                <li><a href="#"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="#"><i class="fa-solid fa-coins"></i>Services</a></li>
                <li><a href="#"><i class="fa-solid fa-calendar-check"></i>Bookings</a></li>
                <li><a href='#'><i class="fa-solid fa-user"></i>Account</a></li>
                <li><a href='#'><i class="fa-solid fa-wallet"></i>Wallet</a></li>
                <li><a href='#'><i class="fa-solid fa-building-columns"></i>Bank Link</a></li>
                <li><a href='#'><i class="fa-solid fa-clock"></i>Transaction History</a></li>
                <li><a href='#'><i class="fa-solid fa-gift"></i>Coupon</a></li>
                <li><a href='#'><i class="fa-solid fa-hand-holding-dollar"></i>Loyalty</a></li>
                </ul>
            </aside>
    
        <main>
            <div class="menu-icon" id="menu-icon" onclick="toggleNav()">
            <span></span>
            </div>
        </main>
    </div>
            <!------------------------------->
            <div class="service-panal">
                    <div class="services-container">
                        
                        <div class="service-box" >
                            <a class="service-icon" href="LoadFund.html">
                                
                                <i class="fa-solid fa-wallet"></i>
                            </a>
                            <div class="service-title">Load</div>
                        </div>
                        
                        <div class="service-box">
                            <div class="service-icon">
                                <i class="fa-solid fa-money-bill-transfer"></i>
                            </div>
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
                <!--   ------   -->
                <ul class="slides">
                    <input type="radio" name="radio-btn" id="img-1" checked />
                    <li class="slide-container">
                        <div class="slide">
                            <img src="http://farm9.staticflickr.com/8072/8346734966_f9cd7d0941_z.jpg" />
                        </div>
                        <div class="nav">
                            <label for="img-6" class="prev">&#x2039;</label>
                            <label for="img-2" class="next">&#x203a;</label>
                        </div>
                    </li>
                    
                    <input type="radio" name="radio-btn" id="img-2" />
                    <li class="slide-container">
                        <div class="slide">
                            <img src="http://farm9.staticflickr.com/8504/8365873811_d32571df3d_z.jpg" />
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
            <!--------------------------->
            <div class="info-panal">
                <table class="balance"> 
                    <tr>
                        <th>
                            <div class="info-container">
                                <div class="title">
                                    Total Balance
                                </div>
                                <div class="amount">
                                    <span>Rs. </span>0
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
                                <div class="main-balance">
                                    Main Balance
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
        </section>
        <script src = "script/slidingmenu.js"></script>
        <script src="https://kit.fontawesome.com/91d850ff13.js" crossorigin="anonymous"></script>
    </body>
    </html>